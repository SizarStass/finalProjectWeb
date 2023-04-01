<!DOCTYPE html>

<html>

<head>

    <title>Game</title>
    <link rel="stylesheet" href="../login/index.css">

</head>

<body>
    <!--Form-->
    <section>
        <form id="form1" method="post" action="">
            <!--Beginning form tag-->

            <h1>Sign up</h1>
            <div>
                <label for="UserName">UserName:</label>
                <br>
                <input id="inputUserName" type="text" name="userName" placeholder="" required="required">

            </div>
            <div>
                <label for="password">Password:</label>
                <br>
                <input id="inputPass" type="text" name="password" placeholder="" required="required">

            </div>
            <div>
                <label for="cpassword">Confirm Password:</label>
                <br>
                <input id="inputConfirmPass" type="text" name="cpassword" placeholder="" required="required">

            </div>
            <div>
                <label for="fName">First Name:</label>
                <br>
                <input id="inputFName" type="text" name="fName" placeholder="" required="required">

            </div>
            <div>
                <label for="lName">Last Name:</label>
                <br>
                <input id="inputLNmae" type="text" name="lName" placeholder="" required="required">

            </div>

            <br>
            <input id="submitbutton1" type="submit" name="send" value="Create" />
            <br>
            <button onclick="location.href= 'index.php'"> Sign in</button>


            <!--Submit button to send form data-->

    </section>
    </form>
    <!--Closing form tag-->

</body>

<?php

if (isset($_POST['send'])) {
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $cPassword = $_POST['cpassword'];
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];

    //Load files
    require_once "../dbManagement/createDBandTable.php"; //done
    require_once "../dbManagement/insertToTable.php"; //done
    require_once "../dbManagement/login_info.php"; //done
    // // require_once "../dbManagement/functions.php"; //done



    createDBandTable(
        $hostname,
        $dbUsername,
        $password,
        $database,
    );

    // insertToTable(
    //     $hostname,
    //     $dbUsername,
    //     $password,
    //     $database,
    //     $fName,
    //     $lName,
    //     $userName
    // );
}
?>

</html>