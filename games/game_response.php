<!DOCTYPE html>

<html>

<head>

    <title>HTML Form and PHP Form Handling</title>

    <style>
        .form {
            color: blue;
        }

        .formhandling {
            color: red;
        }

        .display-name {
            color: green;
        }
    </style>

</head>

<body>

    <h1> <span class="formhandling">Results: </span> </h1>


    <hr>

    <?php

    include("functions.php");
    if (isset($_POST['send'])) {
        $str_nums = $_POST['grades'];
        $arr_nums = explode(",", $str_nums);
        if (numsAscendingOrder($arr_nums) == true) {
            echo "It is good";
        } else {
            echo " It is not good";
        }
    }


    ?>

    <br />
    <a href="http://localhost/finalProjectWeb/game.php">Try again</a>

</body>

</html>