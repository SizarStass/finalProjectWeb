<?php
include "../dbManagement/functions.php"; //done

function insertToScore($hn, $un, $pw, $db, $userName, $result, $livesUsed)
{
    //1-Connect to the DBMS
    $con = connectToDBMS($hn, $un, $pw);
    verfiyConnectionToDBMS($con);

    //If connect to the DBMS succeeds
    //2-Connect to the DB
    verfiyConnectionDb($con, $db);


    //Make the form data available for the other functions 
    $collected = array(
        'result' => $result,
        'livesUsed' => $livesUsed,
        'userName' => $userName,
    );

    shareFormData($collected);
    $collected['registrationOrder'] = getRegistrationOrder($con);
    shareFormData($collected);

    //If connect to the DB succeeds
    //3-Insert data to the Table 
    //If insert data to the Table failed, display try again and error, and stop

    if (executeSqlQuery($con, sqlInsertCommandScore()['InsertInScore']) === FALSE) {
        echo "<a href=\"index.php\"><input type=\"submit\" value=\"Try again!\"></a>";
        die(messages()['error']['InsertToTab'] . mySQLiError(''));
    }

    //4-Disconnect to the DBMS
    disconnectToDBMS($con);
}
