<?php
session_start();
$userName = $_SESSION['userName'];
$livesRemaining = $_SESSION['MaxLives'] - $_SESSION['livesUsed'];
?>
<nav>
    <ul>
        <li><a href="#">UserName: <?php echo $userName ?> </a></li>
        <li><a href="#">Lives remaining: <?php echo $livesRemaining ?> </a></li>
    </ul>
    <ul>
        <li id="logout"><a href="../login/index.php">Logout</a></li>
    </ul>
</nav>