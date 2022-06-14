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
            $felines[] = new Feline($row["id"], $row["name"], $row["type"], $row["size"], $row["breed"], $row["rank"], $row["comp_name"]);
        }
        $result->free();

        return $felines;
    } else {
        return null;
    }
}

function getFelineByID($id)
{


    //query baza de date
    global $conn;

    $queryStmt = $conn->prepare('Select * from felines where id = ?');
    $queryStmt->bind_param('i', $id); //i= int value

    $queryStmt->execute();
    $results = $queryStmt->get_result();
    $queryStmt->close();

    if ($results->num_rows == 1) {
        $row = $results->fetch_assoc();
        //echo $row["username"] . ' ' . $row["password"];
        return new Feline($row["id"], $row["name"], $row["type"], $row["size"], $row["breed"], $row["rank"], $row["comp_name"]);
    }
    return null;
}

function addToBetHistory($betting_sum, $feline_id, $cota, $username)
{

    global $conn;

    $feline = getFelineByID($feline_id);
    if ($feline) {
        $queryStmt = $conn->prepare("INSERT INTO betting_history (bet_sum, cota, feline_id, feline_name, comp_name, date, username) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $queryStmt->bind_param('idissss', $betting_sum, $cota, $feline_id, $feline->name, $feline->comp_name, date("Y-m-d"), $username);
        $queryStmt->execute();
        $queryStmt->close();
    }
}

function generateXML()
{

    $con = mysqli_connect("localhost", "root", "", "catrace");

    if (!$con) {
        echo "DB not Connected...";
    } else {
        $result = mysqli_query($con, "Select * from competitions");
        if ($result->num_rows > 0) {
            $xml = new DOMDocument("1.0");

            // It will format the output in xml format otherwise
            // the output will be in a single row
            $xml->formatOutput = true;
            $catrace = $xml->createElement("competitions");
            $xml->appendChild($catrace);
            while ($row = mysqli_fetch_array($result)) {
                $competition = $xml->createElement("competition");
                $catrace->appendChild($competition);

                $name = $xml->createElement("name", $row['name']);
                $competition->appendChild($name);

                $type = $xml->createElement("type", $row['type']);
                $competition->appendChild($type);

                $start = $xml->createElement("start", $row['start']);
                $competition->appendChild($start);

                $finish = $xml->createElement("finish", $row['finish']);
                $competition->appendChild($finish);
            }
            //echo "<xmp>".$xml->saveXML()."</xmp>";
            $xml->save("../public/export/report.xml");
        } else {
            echo "error";
        }
    }
}


function generateICalendar()
{

    class ICS
    {
        var $data;
        var $name;
        function ICS($start, $end, $name, $type)
        {
            $this->name = $name;
            $this->data = "BEGIN:VCALENDAR\n
            VERSION:2.0\n
            METHOD:PUBLISH\n
            BEGIN:VEVENT\n
            DTSTART:" . date("Ymd\THis\Z", strtotime($start)) . "\n
            DTEND:" . date("Ymd\THis\Z", strtotime($end)) . "\n
            TRANSP: OPAQUE\n
            SEQUENCE:0\n
            UID:\n
            DTSTAMP:" . date("Ymd\THis\Z") . "\n
            SUMMARY:" . $name . "\
            nDESCRIPTION:" . $type . "\n
            PRIORITY:1\n
            CLASS:PUBLIC\n
            BEGIN:VALARM\n
            TRIGGER:-PT10080M\nACTION:DISPLAY\nDESCRIPTION:Reminder\nEND:VALARM\nEND:VEVENT\nEND:VCALENDAR\n";
        }
        function save()
        {
            file_put_contents("../public/export/calendar.ics", $this->data);
        }
    }

    $event = new ICS("2022-06-13 09:00", "2022-06-13 10:00", "Test Event", "type");
    $event->save();
}

function updatePosition($feline_name, $comp_name, $rank)
{
    echo $rank . " - ";
    echo $feline_name . " - ";
    echo $comp_name . " - ";
    global $conn;

    $sql = "UPDATE felines SET rank=? WHERE name like ? and comp_name like ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $rank, $feline_name, $comp_name);
    $stmt->execute();
    $stmt->close();
}

function racePositions($race)
{

    $felines = getAllContenstants();
    $count = 0;

    foreach ($felines as $feline) {
        if ($feline->comp_name == $race->name) { //feline is in finished competition
            //then compute place
            $count++;
        }
    }

    // echo "count=" . $count;
    $array = range(1, $count);

    foreach ($felines as $feline) {
        if ($feline->comp_name == $race->name) {
            $value = array_rand($array);
           // echo "value = " . $array[$value] . "\n";
            $feline->rank = $array[$value];
          //  echo "feline rank =  " . $feline->rank;
            // update database
            updatePosition($feline->name, $feline->comp_name, $feline->rank);
            unset($array[$value]);
        }
    }
}
