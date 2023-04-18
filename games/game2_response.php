<?php
require_once "functions.php";
require_once "../dbManagement/insertToScore.php";
require_once "../dbManagement/login_info.php";

if (isset($_POST['letters'])) {
    session_start();
    $userName = $_SESSION['userName'];
    $MaxLives = $_SESSION['MaxLives'];
    $userInput = $_POST['letters'];
    $randLetter = $_POST['randNum'];
    $result = "incomplete";
    if (checkLettersOrder($userInput, $randLetter) == TRUE) {
        echo "<p>Good Job</p>";
        $result = "success";
        insertToScore($hostname, $dbUsername, $password, $database, $userName, $result, $_SESSION['livesUsed']);
        echo "<button onclick=\"location.href='game3.php'\">go to Game lvl 3 -></button>";
    } else {
        echo "<p>You lost,</p>";
        $_SESSION['livesUsed'] += 1;

        if ($_SESSION['livesUsed'] < $MaxLives) {
            echo "<button onclick=\"location.reload();\">Try again :(</button>";
        }
        if ($_SESSION['livesUsed'] == $MaxLives) {
            $result = "failure";
            insertToScore($hostname, $dbUsername, $password, $database, $userName, $result, $_SESSION['livesUsed']);
            $_SESSION['livesUsed'] = 0;
            echo "<p>Game failed,</p>";
            echo "<a href=\"game.php\"><button>Try again FROM LVL1 :(</button></a>";
        }
    }
}
