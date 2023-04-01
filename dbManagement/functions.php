<?php
function messages()
{
    $dbMessage['ErrDBMS'] = "<p>Connection to MySQL failed!</p>";
    $dbMessages['ErrDB'] = "<p>Connection to the DB failed!</p>";
    $dbMessages['CreateDB'] = "<p>Creation of the DB failed!</p>";
    $dbMessages['CreateTab'] = "<p>Creation of the Table failed!</p>";
    $dbMessages['InsertToTab'] = "<p>Data insertion to the Table failed!</p>";
    $dbMessages['SelectFromTab'] = "<p>Data selection from the Table failed!</p>";
    $groupMessages['error'] = $dbMessages;
    return $groupMessages;
}

function shareFormData($collected)
{
    static $data = null;
    if ($collected == null) {
        if ($data == null) {
            return false;
        } else {
            return $data;
        }
    } else {
        $data = $collected;
    }
}

function mySQLiError($msg)
{
    static $message = "<p>No error message found</p>";
    if ($msg == NULL) {
        echo $message;
    } else {
        $message = $msg;
    }
}


function connectToDBMS($hostname, $username, $password)
{
    $message = messages();
    $connection = new mysqli($hostname, $username, $password);
    if ($connection->connect_error) {
        mySQLiError(mysqli_connect_error());
        return false;
    } else {
        return $connection;
    }
}

function connectToDb($connectionDBMS, $database)
{
    $flag = true;
    try {
        $connectionDB = mysqli_select_db($connectionDBMS, $database);
    } catch (Exception $e) {
        mySQLiError($connectionDBMS->error);
        $flag = false;
    } finally {
        return $flag;
    }
}

function sqlCommands()
{
    $sqlCode['createDB'] = "CREATE DATABASE KidsGame;";
    $sqlCode['createTabPlayer'] = "CREATE TABLE Player( 
        fName VARCHAR(50) NOT NULL, 
        lName VARCHAR(50) NOT NULL, 
        userName VARCHAR(20) NOT NULL UNIQUE,
        registrationTime DATETIME NOT NULL,
        id VARCHAR(200) GENERATED ALWAYS AS (CONCAT(UPPER(LEFT(fName,2)),UPPER(LEFT(lName,2)),UPPER(LEFT(userName,3)),CAST(registrationTime AS SIGNED))),
        registrationOrder INTEGER AUTO_INCREMENT,
        PRIMARY KEY (registrationOrder)
    )CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;";
    $sqlCode['descPlayer'] = "DESC player";
    $sqlCode['selectInPlayer'] = "SELECT * FROM player;";
    return $sqlCode;
}

function sqlInsertCommand()
{
    $values = shareFormData('');
    $fn = $values['fname'];
    $ln = $values['lname'];
    $userName = $values['userName'];
    //Create queries
    $sqlCode['InsertInPlayer'] = "INSERT INTO employees (firstname, lastname, userName) VALUES ('$fn', '$ln', '$userName');";
    //Return an array of queries
    return $sqlCode;
}

function executeSqlQuery($connection, $query)
{
    try {
        //Execute the query
        $invokeQuery = $connection->query($query);
    } catch (Exception $e) {
        //If data insertion to the table failed save the system error message
        mySQLiError($connection->error);
        return FALSE;
    }
    return $invokeQuery;
}
function displaySelectData($query)
{
    //Calculate the number of rows available
    $number_of_rows = $query->num_rows;
    //Use a loop to display the rows one by one
    echo "<table>";
    echo "<tr><td>ID</td><td>First Name</td><td>Last Name</td><td>UserName</td></tr>";

    for ($j = 0; $j < $number_of_rows; ++$j) {
        echo "<tr>";
        //Assign the records of each row to an associative array
        $each_row = $query->fetch_array(MYSQLI_ASSOC); // TO CHECK
        //Display each the record corresponding to each column
        foreach ($each_row as $item)
            echo "<td>" . $item . "</td>";
        echo "</tr>";
    }
}


function disconnectToDBMS($connection)
{
    $diconnectDBMS = $connection->close();
    if ($diconnectDBMS == false) {
        mySQLiError($connection->error);
        return FALSE;
    }
}
