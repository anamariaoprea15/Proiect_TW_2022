<?php


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

include_once  "../app/models/Competition.php";


function addCompetition($name, $type, $size, $start, $finish)
{

    //insert competition in db
    global $conn;
    $queryStmt = $conn->prepare("INSERT INTO competitions (name, type, size, start, finish) VALUES (?, ?, ?, ?, ?)");
    $queryStmt->bind_param('sssss', $name, $type, $size, $start, $finish); 
    $queryStmt->execute();
    $queryStmt->close();
}

function addFeline($name, $type, $size, $breed, $comp_name)
{

     //insert feline in db
     global $conn;
     // !!! first we should check if competition exists
     $queryStmt = $conn->prepare("INSERT INTO felines (name, type, size, breed, comp_name) VALUES (?, ?, ?, ?, ?)");
     $queryStmt->bind_param('sssss', $name, $type, $size, $breed, $comp_name); 
     $queryStmt->execute();
     $queryStmt->close();
}
