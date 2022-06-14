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

            <?php if ($data["user"] == null) { ?>
                <button class="form-btn" onclick="openForm()">
                    Login</button>
            <?php } else if ($data["user"]->username != null) { ?>
                <div>
                    <a href="../profile/index" class="form-btn">Profile</a>
                    <a href="../profile/logout" class="form-btn">Logout</a>
                </div>

            <?php }  ?>


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
                <div class="categories">
                    <h3>Categories </h3>
                    <a href="race.html">Small sized cats</a> <br>
                    <a href="race.html">Medium sized cats</a> <br>
                    <a href="race.html">Large cats</a> <br>
                </div>
                <div class="schedule">
                    <h3>Schedule </h3>
                    <a href="../race/schedule">Schedule</a> <br>
                    <a href="../race/live_races">Races</a> <br>

                </div>
            </div>

            <div class="right">
                <button type="button" class="collapsible">See ongoing races</button>

                <div class="content">


                    <?php
                    $current_races = $data["current_races"];
                    if ($current_races != null) {
                        foreach ($current_races as $race) {
                            echo "<p>" . $race->name . " - " . $race->type . " - " . $race->size . " </p>";
                            echo "<p>  [" . $race->start . "] -  [" . $race->finish . "] </p>";

                    ?>
                    <table>
                        <tr>
                            <th>Feline name</th>
                            <th>Breed</th>
                            <th>Betting Odds</th>
                        </tr>
                        <tr>
                    <?php
                            $felines = $data["felines"];
                            if ($felines != null) {
                                foreach ($felines as $feline){
                                    if($feline->comp_name == $race->name){
                                        // echo "SUNT AICI";
                                        // is in this competition ?>
                                     <tr>
                                        <td> <?php echo $feline->name ?> </td>
                                        <td> <?php echo $feline->breed ?> </td>
                                       
                                         <?php if ($data["user"] == null) { ?>
                                        <td><button class="odds-btn" onclick="loginForBet()">
                                        <?php echo rand(1,10); ?>
                                                </button></td>
                                    <?php } else if ($data["user"]->username != null) { ?>
                                        
                                        <?php $rand_cota =mt_rand(1 * 100, 10 * 100) / 100; ?>
                                        <td><button class="odds-btn" onclick="placeBet(<?php echo $feline->id; ?>,  <?php echo $rand_cota; ?>)">
                                        <?php echo $rand_cota; ?>
                                       </button></td>
                                        </form>
                                    <?php }  ?>
                                    </tr>
                      
                    <?php
                                    }
                                }
                            } 
                    ?>
                    </table>
                    <?php
                        }
                    } ?>
                    
                </div>


                <button type="button" class="collapsible">See past races</button>

                 <div class="content">
                    <?php
                    $past_races = $data["past_races"];
                    if ($past_races != null) {
                        foreach ($past_races as $race) {
                            echo "<p>" . $race->name . " - " . $race->type . " - " . $race->size . " </p>";
                            echo "<p>  [" . $race->start . "] -  [" . $race->finish . "] </p>";

                    ?>
                    <table>
                        <tr>
                            <th>Place</th>
                            <th>Feline name</th>
                            <th>Breed</th>
                        </tr>
                        <tr>
                    <?php
                            $felines = $data["felines"];
                            if ($felines != null) {
                                foreach ($felines as $feline){
                                    if($feline->comp_name == $race->name){
                                        // echo "SUNT AICI";
                                        // is in this competition ?>
                                     <tr>
                                        <td> <?php echo $feline->rank ?> </td> 
                                        <td><a href="../cat/profile/<?php echo $feline->name ?> " > <?php echo $feline->name ?> </a>  </td>
                                        <td> <?php echo $feline->breed ?> </td>
                                    </tr>
                      
                    <?php
                                    }
                                }
                            } 
                    ?>
                    </table>
                    <?php
                        }
                    } ?>
                    
                </div>



                <button type="button" class="collapsible">See future races</button>

                <div class="content">
                    <?php
                    $future_races = $data["future_races"];
                    if ($future_races != null) {
                        foreach ($future_races as $race) {
                            echo "<p>" . $race->name . " - " . $race->type . " - " . $race->size . " </p>";
                            echo "<p>  [" . $race->start . "] -  [" . $race->finish . "] </p>";

                    ?>
                    <table>
                        <tr>
                           <th>Feline name</th>
                            <th>Breed</th>
                            <th>Betting Odds</th>
                        </tr>
                        <tr>
                    <?php
                            $felines = $data["felines"];
                            if ($felines != null) {
                                foreach ($felines as $feline){
                                    if($feline->comp_name == $race->name){
                                        // echo "SUNT AICI";
                                        // is in this competition ?>
                                     <tr>
                                        <td><a href="../cat/index" <?php echo $feline->name ?> >  </td>
                                        <td> <?php echo $feline->breed ?> </td>
                                        <?php if ($data["user"] == null) { ?>
                                        <td><button class="odds-btn" onclick="loginForBet()">
                                    
                                                2.0</button></td>
                                    <?php } else if ($data["user"]->username != null) { ?>
                                        <td><button class="odds-btn" onclick="placeBet()">
                                                2.0</button></td>

                                    <?php }  ?>
                                    </tr>
                      
                    <?php
                                    }
                                }
                            } 
                    ?>
                    </table>
                    <?php
                        }
                    } ?>
                    
                </div>
               
            </div>
        </div>

    </main>

    <div class="bet-popup" id="bettingForm">
        <form method="POST" action="../race/place_bet" class="bet-container">
            <h3>Place bet</h3>
            <label for="betting-sum">Bet sum</label>
            <input type="number" id="betting-sum" name="betting-sum" min="1" required>

            <input type="hidden" name="id_bet" id="id_bet"  value="<?php echo $feline->name ?>"> 
            <input type="hidden" name="cota" id="cota"  value="7">        
        
            <button type="submit" class="odds-btn" >Bet</button>


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
        <form method="POST" action="../race/login" class="form-container" id="loginContainer">
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

        <form method="POST" action="../race/register" class="form-container" id="registerContainer">
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
        function placeBet(id, cota) {
            document.getElementById("bettingForm").style.display = "block";
            document.getElementById("id_bet").value = id;
            document.getElementById("cota").value = cota;
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
            coll[i].addEventListener("click", function() {
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