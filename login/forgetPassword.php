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

            <h1>Change password</h1>
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


            <br>
            <input id="submitbutton1" type="submit" name="send" value="Modify" />
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
}
?>

</html>