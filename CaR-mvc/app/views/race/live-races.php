<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/race-style.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/live-races-style.css">
    <title>Races</title>
</head>

<body>

    <header>
        <div class="header-top">
            <div class="logo">
                <img src="../images/logo.png" alt="logo">
                <h3>Cat Race</h3>
            </div>

            <button class="form-btn" onclick="openForm()">
                Login</button>
        </div>


        <nav class="top-menu">
            <a href="race.html"> Cat </a>
            <a href="race.html"> Tiger </a>
            <a href="race.html"> Puma </a>
            <a href="race.html"> Cheetah </a>
            <a href="race.html"> Jaguar </a>
        </nav>
    </header>

    <main>
        <div class="container">
            <div class="left">
                <div class="categories">
                    <h3>Categories </h3>
                    <a href="race.html">Small sized cats</a> <br>
                    <a href="race.html">Medium sized cats</a> <br>
                    <a href="race.html">Large cats</a> <br>
                </div>
                <div class="schedule">
                    <h3>Schedule </h3>
                    <a href="schedule.html">Schedule</a> <br>
                    <a href="">Races</a> <br>

                </div>
            </div>

            <div class="right">
                <button type="button" class="collapsible">See ongoing races</button>

                <div class="content">
                    <p>Pisica - talie medie - data - ora </p>
                    <table>
                        <tr>
                            <th>Feline name</th>
                            <th>Breed</th>
                            <th>Betting Odds</th>
                        </tr>
                        <tr>
                            <td>Felina 1</td>
                            <td>sfinx</td>
                            <td><button class="odds-btn" onclick="placeBet()">
                                    2.0</button></td>
                        </tr>
                        <tr>
                            <td>Felina 2</td>
                            <td>siameza</td>
                            <td><button class="odds-btn" onclick="placeBet()">
                                    2.75</button></td>
                        </tr>
                        <tr>
                            <td>Felina 3</td>
                            <td>british shorthair</td>
                            <td><button class="odds-btn" onclick="placeBet()">
                                    21.0</button></td>
                        </tr>

                    </table>

                    <p>Tigru - data - ora </p>
                    <table>
                        <tr>
                            <th>Feline name</th>
                            <th>Breed</th>
                            <th>Betting Odds</th>
                        </tr>
                        <tr>
                            <td>Tiger 1</td>
                            <td>tiger</td>
                            <td><button class="odds-btn" onclick="placeBet()">
                                    2.0</button></td>
                        </tr>
                        <tr>
                            <td>Tiger 2</td>
                            <td>tiger</td>
                            <td><button class="odds-btn" onclick="placeBet()">
                                    2.75</button></td>
                        </tr>
                        <tr>
                            <td>Tiger 3</td>
                            <td>tiger</td>
                            <td><button class="odds-btn" onclick="placeBet()">
                                    17.5</button></td>
                        </tr>

                    </table>
                </div>


                <button type="button" class="collapsible">See past races</button>

                <div class="content">
                    <p>Felina - data - ora </p>
                    <table>
                        <tr>
                            <th>Place</th>
                            <th>Feline name</th>
                            <th>Breed</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Felina 1</td>
                            <td>sfinx</td>

                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Felina 2</td>
                            <td>siameza</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Felina 3</td>
                            <td>british shorthair</td>
                        </tr>

                    </table>

                    <p>Pisica - talie - data - ora </p>
                    <table>
                        <tr>
                            <th>Place</th>
                            <th>Feline name</th>
                            <th>Breed</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Felina 1</td>
                            <td>sfinx</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Felina 2</td>
                            <td>siameza</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Felina 3</td>
                            <td>british shorthair</td>
                        </tr>

                    </table>
                </div>


                <button type="button" class="collapsible">See future races</button>

                <div class="content">
                    <p>Pisica - talie medie - data - ora </p>
                    <table>
                        <tr>
                            <th>Feline name</th>
                            <th>Breed</th>
                            <th>Betting Odds</th>
                        </tr>
                        <tr>
                            <td>Felina 1</td>
                            <td>sfinx</td>
                            <td><button class="odds-btn" onclick="placeBet()">
                                    2.0</button></td>
                        </tr>
                        <tr>
                            <td>Felina 2</td>
                            <td>siameza</td>
                            <td><button class="odds-btn" onclick="placeBet()">
                                    2.75</button></td>
                        </tr>
                        <tr>
                            <td>Felina 3</td>
                            <td>british shorthair</td>
                            <td><button class="odds-btn" onclick="placeBet()">
                                    21.0</button></td>
                        </tr>

                    </table>

                    <p>Tigru - data - ora </p>
                    <table>
                        <tr>
                            <th>Feline name</th>
                            <th>Breed</th>
                            <th>Betting Odds</th>
                        </tr>
                        <tr>
                            <td>Tiger 1</td>
                            <td>tiger</td>
                            <td><button class="odds-btn" onclick="placeBet()">
                                    2.0</button></td>
                        </tr>
                        <tr>
                            <td>Tiger 2</td>
                            <td>tiger</td>
                            <td><button class="odds-btn" onclick="placeBet()">
                                    2.75</button></td>
                        </tr>
                        <tr>
                            <td>Tiger 3</td>
                            <td>tiger</td>
                            <td><button class="odds-btn" onclick="placeBet()">
                                    17.5</button></td>
                        </tr>

                    </table>
                </div>
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
        <form action="#" class="form-container" id="loginContainer">
            <h2>Login</h2>

            <label for="username"><b>Username</b></label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>

            <label for="password"><b>Password</b></label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            <div class="description">
                Don't have an account?
                <span class="form-link" onclick="goRegister()">Register now!</span>
            </div>


            <button type="submit" class="btn">Login</button>


            <button type="button" class="btn" onclick="closeForm()">Close</button>
        </form>

        <form action="#" class="form-container" id="registerContainer">
            <h2>Sign Up</h2>

            <label for="email"><b>Email</b></label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>


            <label for="username"><b>Username</b></label>
            <input type="text" name="username" placeholder="Enter your username" required>

            <label for="password"><b>Password</b></label>
            <input type="password" name="password" placeholder="Enter your password" required>
            <div class="description">
                Already have an account?
                <span class="form-link" onclick="goLogin()">Log in now!</span>
            </div>


            <button type="submit" class="btn">Sign Up</button>


            <button type="button" class="btn" onclick="closeForm()">Close</button>
        </form>
    </div>


    <script src="../js/form-script.js"> </script>

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

    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }
    </script>
</body>

</html>