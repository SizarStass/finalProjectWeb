<?php
function verfiyLogin($hn, $un, $pw, $db, $userName, $userPass)
{
    $collected = array(
        'userName' => $userName
    );
    shareFormData($collected);

    //1-Connect to the DBMS
    $con = connectToDBMS($hn, $un, $pw);
    verfiyConnectionToDBMS($con);

    //If connect to the DBMS succeeds
    //2-Connect to the DB
    verfiyConnectionDb($con, $db);


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
