<?php

session_start();

$CONFIG = [
    'servername' => "localhost",
    'username' => "root",
    'password' => '',
    'db' => 'catrace'
];

global $conn;
$conn = new mysqli($CONFIG["servername"], $CONFIG["username"], $CONFIG["password"], $CONFIG["db"]);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    //echo "Successfully connected to DB";
}

include_once  "../app/models/User.php";


function getUser($username, $password)
{
    /* 
       if($username === "Ana" && $password === md5("aremere")) {
            return new User($username);
        }*/

    //query baza de date
    global $conn;

    $queryStmt = $conn->prepare('Select * from users where username = ? and password = ?');
    $queryStmt->bind_param('ss', $username, $password); //ss= 2 stringuri

    $queryStmt->execute();
    $results = $queryStmt->get_result();
    $queryStmt->close();

    if ($results->num_rows == 1) {
        $row = $results->fetch_assoc();
        //echo $row["username"] . ' ' . $row["password"];
        return new User($row["id"], $row["username"], $row["email"], $row["credit"]);
    }
    return null;
}
function manageCredit($credit)
{
    global $conn;
    $user = getLoggedInUser();
    $updCredit = getCredit() + $credit;

    $sql = "UPDATE users SET credit=? WHERE username like ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $updCredit, $user->username);
    $stmt->execute();
    $stmt->close();
}
function getCredit()
{
    $user = getLoggedInUser();
    global $conn;
    $queryStmt = $conn->prepare('Select * from users where username = ?');
    $queryStmt->bind_param('s', $user->username); //s= 1 string

    $queryStmt->execute();
    $results = $queryStmt->get_result();
    $queryStmt->close();
    $row = $results->fetch_assoc();
    echo $row["credit"];
    return $row["credit"];
}
function addUser($username, $email, $password)
{

    //insert user in baza de date
    global $conn;
    $queryStmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?, ?)");
    $queryStmt->bind_param('sssi', $username, $email, $password, 10000); //sssi= 3 stringuri si int
    $queryStmt->execute();
    $queryStmt->close();
}

function getLoggedInUser()
{
    if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
        return getUser($_SESSION["username"], $_SESSION["password"]);
    }

    return null;
}

function login($username, $password)
{
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;
}



function updatePassword($oldPassword, $newPassword, $user)
{
    global $conn;
    $sql = 'UPDATE users SET password = ' . '"' . md5($newPassword) . '"' . ' WHERE id = ' . $user->id . ' AND password LIKE ' . '"' . md5($oldPassword) . '"';

    echo $sql;

    if ($conn->query($sql) === TRUE) {
        //   echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
