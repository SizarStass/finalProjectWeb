<?php
require_once "functions.php";

if (isset($_POST['letters'])) {
    $userInput = $_POST['letters'];
    $randLetter = $_POST['randNum'];
    if (checkLettersAccOrder($userInput, $randLetter)) {
        echo "<p>Good Job</p>";
    } else {
        echo "<p>You lost, try again :(</p>";
    }
}
