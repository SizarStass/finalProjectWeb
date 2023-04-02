<?php
function verfiyLogin($hn, $un, $pw, $db, $userName, $userPass)
{
    $collected = array(
        'userName' => $userName
    );
    shareFormData($collected);
    //1-Connect to the DBMS
    $con = connectToDBMS($hn, $un, $pw);

    //If connect to the DBMS failed, display try again and error, and stop
    if ($con === false) {
        echo "<a href=\"index.php\"><input type=\"submit\" value=\"Try again!\"></a>";
        die(messages()['error']['ErrDBMS'] . mySQLiError(''));
    }

    //If connect to the DBMS succeeds
    //2-Connect to the DB
    if (connectToDb($con, $db) === FALSE) {
        echo "<a href=\"index.php\"><input type=\"submit\" value=\"Try again!\"></a>";
        die(messages()['error']['CreateDB'] . mySQLiError(''));
    }

    $registrationOrder = getRegistrationOrder($con);

    $collected = array(
        'registrationOrder' => $registrationOrder,
        'userPass' => $userPass
    );
    shareFormData($collected);


    $query = executeSqlQuery($con, sqlAuthenicatorCommands()['selectPassCodeAndRegOrder']);
    $number_of_rows = $query->num_rows;
    disconnectToDBMS($con);

    if ($number_of_rows == 1) {
        return true;
    } else {
        return false;
    }
}
