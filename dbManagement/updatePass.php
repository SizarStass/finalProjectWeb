<?php
include "functions.php"; //done
function updatePass($hn, $un, $pw, $db, $userName, $userPass)
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

    $query = executeSqlQuery($con, sqlAuthenicatorCommands()['selectRegOrder']);
    $number_of_rows = $query->num_rows;

    if ($number_of_rows < 1) {
        echo "There is no Player with this username";
    } else {
        if (executeSqlQuery($con, sqlAuthenicatorCommands()['updatePass']) === FALSE) {
            echo "<a href=\"index.php\"><input type=\"submit\" value=\"Try again!\"></a>";
            die(messages()['error']['InsertToTab'] . mySQLiError(''));
        }

        echo "Password has been successfully updated ";
    }
}
