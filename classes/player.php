<?php
date_default_timezone_set('America/New_York');
class player
{
    private $fName;
    private $lName;
    private $userName;
    private $registrationTime;
    private $id;
    private static $registrationOrder = 0;

    function __construct($fName, $lName, $userName)
    {
        $this->fName = $fName;
        $this->lName = $lName;
        $this->userName = $userName;
        $this->registrationTime = date("Y-m-d H:i:s");
        $this->id = strtoupper(substr($fName, 0, 2) . substr($lName, 0, 2) . substr($userName, 0, 3)) . date("YmdHis", strtotime($this->registrationTime));
        self::$registrationOrder += 1;
    }

    function display()
    {
        echo "fName: $this->fName\n 
              lName: $this->lName\n
              userName: $this->userName\n
              registrationTime: $this->registrationTime\n
              id: $this->id\n
              registrationOrder: " . self::$registrationOrder;
    }
}


?>

<!DOCTYPE html>

<html>

<head>

    <title>Game</title>
    <link rel="stylesheet" href="index.css">

</head>

<body>

    <?php
    $p1 = new player("Zawer", "Deshak", "zaxard");
    $p1->display();
    echo "<br>";
    echo "<br>";
    $p2 = new player("jack", "james", "sshh");
    $p2->display();
    ?>


</body>

</html>