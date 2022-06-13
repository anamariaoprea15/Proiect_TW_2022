<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/race-style.css">
    <link rel="stylesheet" href="../css/header.css">

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
            <a href="../race/index"> Tiger </a>
            <a href="../race/index"> Puma </a>
            <a href="../race/index"> Cheetah </a>
            <a href="../race/index"> Jaguar </a>
        </nav>
    </header>

    <main>
        <div class="container">
            <div class="left">
                <!-- <div class="categories">
                    <h3>Categories </h3>
                    <a href="../race/index">Small sized cats</a> <br>
                    <a href="../race/index">Medium sized cats</a> <br>
                    <a href="../race/index">Large cats</a> <br>
                </div> -->
                <div class="schedule">
                    <h3>Schedule </h3>
                    <a href="../race/schedule">Schedule</a> <br>
                    <a href="../race/live_races">Races</a> <br>

                </div>
            </div>
            <div class="right">
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
            </div>
        </div>

    </main>

    <div class="bet-popup" id="bettingForm">
        <form method="POST" action="../race/place_bet" class="bet-container">
            <h3>Place bet</h3>
            <label for="betting-sum">Bet sum</label>
            <input type="number" id="betting-sum" name="betting-sum" min="1" required>


            <button type="submit" class="odds-btn" onclick="placeBet()">Bet</button>


            <button type="button" class="odds-btn" onclick="closeBet()">close</button>

        </form>
    </div>


    <script>
        function placeBet() {
            document.getElementById("bettingForm").style.display = "block";
        }

        function closeBet() {
            document.getElementById("bettingForm").style.display = "none";
        }
    </script>

</body>

</html>