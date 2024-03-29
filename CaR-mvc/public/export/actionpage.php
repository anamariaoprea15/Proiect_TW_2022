	
<?php
//check if username/email exists in db using ajax and php

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


//Declaring Variables
$name_error = "";
$email_error = "";
$username = "";
$email = "";

$race_error = "";
$race = "";


$feline_error = "";
$feline = "";

//If username is set
if (isset($_GET['username'])) {
    $username = $_GET['username'];

    $sql = "SELECT * FROM users WHERE username='$username'";

    $res = mysqli_query($conn, $sql);
    //Check number of rows returned from database. 
    //If greater than zero means that username is already submitted/saved in mysql database.
    if (mysqli_num_rows($res) > 0) {
        $name_error = "Username " . $username . " is already taken";
        echo " " . $name_error;
    }
}
//If email is set
if (isset($_GET['email']) && $_GET['email'] != "") {
    $email = $_GET['email'];

    $sql = "SELECT * FROM users WHERE email='$email'";

    $res = mysqli_query($conn, $sql);
    //Check number of rows returned from database. 
    //If greater than zero means that email is already submitted/saved in mysql database.
    if (mysqli_num_rows($res) > 0) {
        $email_error = "Email " . $email . " is already taken";
        echo " " . $email_error;
    }
}


if (isset($_GET['race'])) {
    $race = $_GET['race'];

    $sql = "SELECT * FROM competitions WHERE name='$race'";

    $res = mysqli_query($conn, $sql);
    //Check number of rows returned from database. 
    //If greater than zero means that competition is already submitted/saved in mysql database.
    if (mysqli_num_rows($res) > 0) {
        $race_error = "Competition name " . $race . " is already taken";
        echo " " . $race_error;
    }
}


if (isset($_GET['feline'])) {
    $feline = $_GET['feline'];

    $sql = "SELECT * FROM felines WHERE name='$feline'";

    $res = mysqli_query($conn, $sql);
    //Check number of rows returned from database. 
    //If greater than zero means that feline is already submitted/saved in mysql database.
    if (mysqli_num_rows($res) > 0) {
        $feline_error = "Feline name " . $race . " is already taken";
        echo " " . $feline_error;
    }
}

?>