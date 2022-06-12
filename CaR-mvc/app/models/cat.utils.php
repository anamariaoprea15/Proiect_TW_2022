<?php
include_once "../app/models/Feline.php";

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
function resultToArray($result)
{
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}
function getAllData($name)
{
    global $conn;
    $felines = array();


    $queryStmt = $conn->prepare('Select * from felines where name = ?');
    $queryStmt->bind_param('s', $name);

    $queryStmt->execute();
    $result = $queryStmt->get_result();

    // $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $rows = resultToArray($result);
        // var_dump($rows); // Array of rows
        foreach ($rows as $row) {
            $felines[] = new Feline($row["id"], $row["name"], $row["type"], $row["size"], $row["breed"], $row["rank"], $row["comp_name"]);
        }
        $result->free();

        return $felines;
    } else {
        return null;
    }
}

function AvgRanking($cat_data)
{
    $avgRank = 0;
    $nr = 0;
    foreach ($cat_data as $cat) {
        $avgRank += $cat->rank;
        $nr++;
    }
    return $avgRank / $nr;
}

function nrPodiums($cat_data)
{
    $nr = 0;
    foreach ($cat_data as $cat) {
        if ($cat->rank >= 1 && $cat->rank <= 3) {
            $nr++;
        }
    }

    return $nr;
}

function getData($comp_name){
    //query baza de date
    global $conn;

    $queryStmt = $conn->prepare('Select finish from competitions where name = ?');
    $queryStmt->bind_param('s',$comp_name ); 

    $queryStmt->execute();
    $results = $queryStmt->get_result();
    $queryStmt->close();

    if ($results->num_rows == 1) {
        $row = $results->fetch_assoc();
        return $row["finish"];
    }
    return null;


}
