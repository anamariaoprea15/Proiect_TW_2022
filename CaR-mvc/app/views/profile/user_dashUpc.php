<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/race-style.css">
    <link rel="stylesheet" href="../css/user_dashUpc.css">

    <title>Cat Race</title>
</head>

<body>

    <header>
        <div class="header-top">
            <div class="logo">
                <img src="../images/logo.png" alt="logo">
                <h3>Cat Race</h3>
            </div>
            <div>
                <a href="../profile/index" class="form-btn">Profile</a>
                <a href="../profile/logout" class="form-btn">Logout</a>
            </div>
           
        </div>


        <nav class="top-menu">
            <a href="../race/index"> Cat </a>
            <a href="race.html"> Tiger </a>
            <a href="race.html"> Puma </a>
            <a href="race.html"> Cheetah </a>
            <a href="race.html"> Jaguar </a>
        </nav>
    </header>

    <main>
        <div class="container">
            <div class="left">
                <div class="sidenav">
                    <?php
                    $user = getUser($username, $password);
                    
                    <h3>$user</h3>
                    <h3>Sold 1500$</h3><br>
                    ?>
                    <a href="user_dashUpc.html">Upcoming Bets</a>
                    <a href="user_dashHistory.html">History</a>
                    <button class="form-btn1" onclick="openForm()">
                        Settings</button>
                </div>

            </div>
            <div class="right">
                <div class="table_name">
                    <h2>Upcoming Bets</h2>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Feline name</th>
                            <th>Breed</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Money</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $database = "mystore";

                        $connection = new mysqli($servername,$username,$password,$database);
            
                        if($connection->connect_error){
                            die("Connection failed: " .  $connection->connect_error);
                        }
                        $sql = "SELECT * FROM bets WHERE (Date_ > CURDATE() or (Date_ = CURDATE() and Time_ > CURTIME()))";
                        $result = $connection->query($sql);
                        while($row = $result->fetch_assoc()){
                            echo"<tr>
                            <td>" . $row["feline_name"] . "</td>
                            <td>" . $row["Breed"] . "</td>
                            <td>" . $row["Date_"] . "</td>
                            <td>" . $row["Time_"] . "</td>
                            <td>" . $row["Money"] . "</td>
                            </tr>";
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <div class="form-popup" id="formPopup">
        <form method="POST" action="../profile/changePassword" class="form-container" id="loginContainer">
            <h2>Change Password</h2>

            <label for="old_password"><b>Old Password</b></label>
            <input type="password" id="old_password" name="password" placeholder="Enter your old password" required>

            <label for="new_password"><b>New Password</b></label>
            <input type="password" id="new_password" name="password" placeholder="Enter your new password" required>
            <button type="submit" class="btn">Change</button>
            <button type="button" class="btn" onclick="closeForm()">Close</button>
        </form>
    </div>

    <script src="../js/form-script.js"> </script>
</body>

</html>
