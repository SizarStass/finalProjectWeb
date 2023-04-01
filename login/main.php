<!DOCTYPE html>
<html>

<head>

    <title>registration</title>
    <link rel="stylesheet" href="index.css">

</head>

<body>
    <!--Form-->
    <section>
        <form id="form1" method="post">
            <hr />

            <?php
            if (isset($_POST['send'])) {

                //Assign data collected from the form
                $theFirstName = $_POST['fname'];
                $theLastName = $_POST['lname'];
                $theEmail = $_POST['email'];
                $userData = array($theFirstName, $theLastName, $theEmail);

                //Load files
                require_once "createDBandTable.php";
                require_once "insertToTable.php";
                require_once "selectFromTable.php";
                require_once "functions.php";
                require_once "login_info.php";

            ?>

            <?php
            }
            ?>
            <div id="back">
                <a href="index.php"><input type="submit" value="Try again!"></a>
            </div>
            </div>
    </section>
</body>

</html>