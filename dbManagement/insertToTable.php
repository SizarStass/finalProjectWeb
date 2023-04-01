<?php
function insertToTable($hn, $un, $pw, $db, $fname, $lname, $userName)
{
    //Make the form data available for the other functions 
    $collected = array(
        'fname' => $fname,
        'lname' => $lname,
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

    //If connect to the DB succeeds
    //3-Insert data to the Table 
    //If insert data to the Table failed, display try again and error, and stop
    if (executeSqlQuery($con, sqlInsertCommand()['InsertInPlayer']) === FALSE) {
        echo "<a href=\"index.php\"><input type=\"submit\" value=\"Try again!\"></a>";
        die(messages()['error']['InsertToTab'] . mySQLiError(''));
    }

    //4-Disconnect to the DBMS
    disconnectToDBMS($con);
}
