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
        return new User($row["id"], $row["username"], $row["email"]);
    }
    return null;
}

function addUser($username, $email, $password)
{

    //insert user in baza de date
    global $conn;
    $queryStmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $queryStmt->bind_param('sss', $username, $email, $password); //sss= 3 stringuri
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



function updatePassword($oldPassword, $newPassword, $user){
    global $conn;
    $sql = 'UPDATE users SET password = ' . '"'. md5($newPassword) . '"' . ' WHERE id = ' . $user->id . ' AND password LIKE ' . '"'. md5($oldPassword) .'"';
   
    echo $sql;

    if ($conn->query($sql) === TRUE) {
        //   echo "Record updated successfully";
       } else {
           echo "Error updating record: " . $conn->error;
       }

       $conn->close();

}
