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
include_once  "../app/models/Feline.php";


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



function resultToArray($result)
{
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}



function getPastRaces()
{

    global $conn;
    $races = array();
    // select only races that has finished
    $query = 'SELECT * FROM competitions where DATE(start) < DATE(sysdate()) AND DATE(finish) < DATE(sysdate())';
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $rows = resultToArray($result);
        // var_dump($rows); // Array of rows
        foreach ($rows as $row) {
            $races[] = new Competition($row["id"], $row["name"], $row["type"], $row["size"], $row["start"], $row["finish"]);
        }
        $result->free();

        return $races;
    } else {
        return null;
    }
}


function getCurrentRaces()
{

    global $conn;
    $races = array();
    // select only races that has finished
    $query = 'SELECT * FROM competitions where DATE(start) <= DATE(sysdate()) AND DATE(finish) >= DATE(sysdate())';
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $rows = resultToArray($result);
        // var_dump($rows); // Array of rows
        foreach ($rows as $row) {
            $races[] = new Competition($row["id"], $row["name"], $row["type"], $row["size"], $row["start"], $row["finish"]);
        }
        $result->free();

        return $races;
    } else {
        return null;
    }
}

function getFutureRaces()
{
    global $conn;
    $races = array();
    // select only races that has finished
    $query = 'SELECT * FROM competitions where DATE(start) > DATE(sysdate()) AND DATE(finish) > DATE(sysdate())';
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $rows = resultToArray($result);
        // var_dump($rows); // Array of rows
        foreach ($rows as $row) {
            $races[] = new Competition($row["id"], $row["name"], $row["type"], $row["size"], $row["start"], $row["finish"]);
        }
        $result->free();

        return $races;
    } else {
        return null;
    }
}

function getAllContenstants()
{

    global $conn;
    $felines = array();
    // select only races that has finished
    $query = 'SELECT * FROM felines';
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $rows = resultToArray($result);
        // var_dump($rows); // Array of rows
        foreach ($rows as $row) {
            $felines[] = new Feline($row["name"], $row["type"], $row["size"], $row["breed"], $row["rank"], $row["comp_name"]);
        }
        $result->free();

        return $felines;
    } else {
        return null;
    }
}
