<?php
function insertToTable($hn, $un, $pw, $db, $fname, $lname, $userName, $userPass)
{
    //Make the form data available for the other functions 
    $collected = array(
        'fname' => $fname,
        'lname' => $lname,
        'userName' => $userName,
        'userPass' => $userPass,
    );

    shareFormData($collected);

    //1-Connect to the DBMS
    $con = connectToDBMS($hn, $un, $pw);
    verfiyConnectionToDBMS($con);

    //If connect to the DBMS succeeds
    //2-Connect to the DB
    verfiyConnectionDb($con, $db);


    //If connect to the DB succeeds
    //3-Insert data to the Table 
    //If insert data to the Table failed, display try again and error, and stop

    if (executeSqlQuery($con, sqlInsertCommand()['InsertInPlayer']) === FALSE) {
        echo "<a href=\"index.php\"><input type=\"submit\" value=\"Try again!\"></a>";
        die(messages()['error']['InsertToTab'] . mySQLiError(''));
    }

    $collected['registrationOrder'] = getRegistrationOrder($con);
    shareFormData($collected);


    if (executeSqlQuery($con, sqlInsertCommandAuthen()['InsertInAuthenicator']) === FALSE) {
        echo "<a href=\"index.php\"><input type=\"submit\" value=\"Try again!\"></a>";
        die(messages()['error']['InsertToTab'] . mySQLiError(''));
    }

    //4-Disconnect to the DBMS
    disconnectToDBMS($con);
}
