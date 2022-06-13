<!-- PHP code to establish connection with the localserver -->
<?php
// Username is root
$servername = "localhost";
$username = "root";
$password = "";
$database = "catrace";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " .  $connection->connect_error);
}
$mysqli = new mysqli(
    $servername,
    $username,
    $password,
    $database
);
// SQL query to select data from database
$sql = " SELECT * FROM competitions ";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Competitions</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }

        h1 {
            text-align: center;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
                ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        td {
            font-weight: lighter;
        }
    </style>
</head>

<body>
    <section>
        <h1>Competitions</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Competition name</th>
                <th>Feline type</th>
                <th>Feline size</th>
                <th>Start date</th>
                <th>Finish date</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
            while ($rows = $result->fetch_assoc()) {
            ?>
                <tr>
                    <!-- FETCHING DATA FROM EACH
                                    ROW OF EVERY COLUMN -->
                    <td><?php echo $rows["name"]; ?></td>
                    <td><?php echo $rows["type"]; ?></td>
                    <td><?php echo $rows["size"]; ?></td>
                    <td><?php echo $rows["start"]; ?></td>
                    <td><?php echo $rows["finish"]; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </section>
</body>

</html>