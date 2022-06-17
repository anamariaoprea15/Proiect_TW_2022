<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/race-style.css">
    <link rel="stylesheet" href="../../css/header.css">

    <title>Cat Race</title>
</head>

<body>

    <header>
        <div class="header-top">
            <div class="logo">
                <img src="../../images/logo.png" alt="logo">
                 <a class="btn" href="../public/home"><h3>Cat Race</h3></a>
            </div>

            <?php if ($data["user"] == null) { ?>
                <button class="form-btn" onclick="openForm()">
                    Login</button>
            <?php } else if ($data["user"]->username != null) { ?>
                <div>
                    <a href="../../profile/index" class="form-btn">Profile</a>
                    <a href="../../profile/logout" class="form-btn">Logout</a>
                </div>

            <?php }  ?>


        </div>


        <nav class="top-menu">
            <a href="../../race/race/cat"> Cat </a>
            <a href="../../race/race/tiger"> Tiger </a>
            <a href="../../race/race/puma"> Puma </a>
            <a href="../../race/race/cheetah"> Cheetah </a>
            <a href="../../race/race/jaguar"> Jaguar </a>
        </nav>
    </header>

    <main>
        <div class="container">
            <div class="left">
                <div class="schedule">
                    <h3>Schedule </h3>
                    <a href="../../race/schedule">Schedule</a> <br>
                    <a href="../../race/live_races">Races</a> <br>

                </div>
            </div>
            <div class="right">
                <table>
                    <tr>
                        <th>Feline name</th>
                        <th>Type</th>
                        <th>Size</th>
                        <th>Breed</th>
                        <th>Competition</th>
                    </tr>
                    <tr>
                        <?php
                        $felines = $data["felines"];
                        if ($felines != null) {
                            foreach ($felines as $feline) {
                                if ($feline->comp_name) {
                                    // echo "SUNT AICI";
                                    // is in this competition 
                        ?>
                    <tr>
                        <td><a href="../../cat/profile/<?php echo $feline->name ?> "> <?php echo $feline->name; ?> </a> </td>
                        <td> <?php echo $feline->type; ?> </td>
                        <td> <?php echo $feline->size; ?> </td>
                        <td> <?php echo $feline->breed; ?> </td>
                        <td> <?php echo $feline->comp_name; ?> </td>
                    </tr>

        <?php
                                }
                            }
                        }
        ?>
                </table>

            </div>
        </div>

    </main>

    <div class="bet-popup" id="bettingForm">
        <form action="#" class="bet-container">
            <h3>Place bet</h3>
            <label for="betting-sum">Bet sum</label>
            <input type="number" id="betting-sum" name="betting-sum" min="1" required>


            <button type="submit" class="odds-btn" onclick="loginForBet()">Bet</button>


            <button type="button" class="odds-btn" onclick="closeBet()">close</button>

        </form>
    </div>

    <div class="bet-popup" id="mustLogin">
        <div class="bet-container">
            Your bet wasn't placed!
            Log in and try again. <br> <br>

            <button class="odds-btn" onclick="openForm()">
                Log in for placing the bet</button>
            <button type="button" class="odds-btn" onclick="closePopup()">close</button>

        </div>

    </div>



    <div class="form-popup" id="formPopup">
        <form method="POST" action="../../race/login" class="form-container" id="loginContainer">
            <h2>Login</h2>

            <label for="username"><b>Username</b></label>
            <input type="text" name="username" placeholder="Enter your username" required>

            <label for="password"><b>Password</b></label>
            <input type="password" name="password" placeholder="Enter your password" required>
            <div class="description">
                Don't have an account?
                <span class="form-link" onclick="goRegister()">Register now!</span>
            </div>


            <button type="submit" class="btn">Login</button>


            <button type="button" class="btn" onclick="closeForm()">Close</button>
        </form>

        <form method="POST" action="../../race/register" class="form-container" id="registerContainer">
            <h2>Sign Up</h2>

            <label for="email"><b>Email</b></label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>


            <label for="username"><b>Username</b></label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>

            <label for="password"><b>Password</b></label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            <div class="description">
                Already have an account?
                <span class="form-link" onclick="goLogin()">Log in now!</span>
            </div>


            <button type="submit" class="btn">Sign Up</button>


            <button type="button" class="btn" onclick="closeForm()">Close</button>
        </form>
    </div>


    <script src="../../js/form-script.js"> </script>

    <script>
        function placeBet() {
            document.getElementById("bettingForm").style.display = "block";
        }

        function closeBet() {
            document.getElementById("bettingForm").style.display = "none";
        }

        function loginForBet() {

            document.getElementById("mustLogin").style.display = "block";
            document.getElementById("bettingForm").style.display = "none";
        }

        function closePopup() {
            document.getElementById("mustLogin").style.display = "none";

        }
    </script>
</body>

</html>