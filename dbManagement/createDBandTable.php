<?php
include "functions.php"; //done
function createDBandTable($hn, $un, $pw, $db)
{
    //1-Connect to the DBMS
    $con = connectToDBMS($hn, $un, $pw);

    //If connect to the DBMS failed, display try again and error, and stop
    if ($con === false) {
        echo "<a href=\"index.php\"><input type=\"submit\" value=\"Try again!\"></a>";
        die(messages()['error']['ErrDBMS'] . mySQLiError(''));
    }
    //If connect to the DBMS succeeds

    //If connection to the DB failed
    //2-Create the DB
    if (connectToDb($con, $db) === FALSE) {
        // If create the DB failed, display try again and error, and stop
        if (executeSqlQuery($con, sqlCommands()['createDB']) === false) {
            echo "<a href=\"index.php\"><input type=\"submit\" value=\"Try again!\"></a>";
            die(messages()['error']['CreateDB'] . mySQLiError(''));
        } else {
            if (connectToDB($con, $db) === FALSE) {
                echo "<a href=\"index.php\"><input type=\"submit\" value=\"Try again!\"></a>";
                die(messages()['error']['CreateDB'] . mySQLiError(''));
            }
        }
    }

    //If describe the Table failed
    //3-Create the Table
    if (executeSqlQuery($con, sqlCommands()['descPlayer']) === false) {
        //If create the Table failed, display try again and error, and stop
        if (executeSqlQuery($con, sqlCommands()['createTabPlayer']) === false) {
            echo " hey";
            echo "<a href=\"index.php\"><input type=\"submit\" value=\"Try again!\"></a>";
            die(messages()['error']['CreateTab'] . mySQLiError(''));
        }
    }




    //4-Disconnect to the DBMS
    disconnectToDBMS($con);
}
