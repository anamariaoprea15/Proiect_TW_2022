<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/add-competitor.css">
    <link rel="stylesheet" href="../css/header.css">
    <title>Admin - add feline</title>

</head>

<body>

    <header>
        <div class="header-top">
            <div class="logo">
                <img src="../images/logo.png" alt="logo">
                <h3>Cat Race</h3>
            </div>

            <!-- <button class="form-btn">
                Admin profile</button> -->
            <div>
            <form method="POST" action="../profile/logout">
                     <button type="submit" class="form-btn"> Logout </button>
                </form> 
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

            <h2>Add competition</h2>

            <form method="POST" action="../profile/add_competition">
                <div class="row">
                    <div class="left">
                        <label for="name">Competition Name</label>
                    </div>
                    <div class="right">
                        <input type="text" id="name" name="name" placeholder="Competition's name.." required>
                    </div>
                </div>
                <div class="row">
                    <div class="left">
                        <label for="type">Type</label>
                    </div>
                    <div class="right">
                        <select id="type" name="type">
                            <option value="cat">cat</option>
                            <option value="tiger">tiger</option>
                            <option value="puma">puma</option>
                            <option value="chetaah">cheetah</option>
                            <option value="jaguar">jaguar</option>
                        </select>
                    </div>
                </div>

                <div class="row" id="showCat">
                    <div class="left">
                        <label for="size">Size</label>
                    </div>
                    <div class="right">
                        <select id="size" name="size">
                            <option value="small">small</option>
                            <option value="medium">medium</option>
                            <option value="large">large</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="left">
                        <label for="sdate">Start date</label>
                    </div>
                    <div class="right">
                        <input type="date" id="sdate" name="sdate" required>
                    </div>
                </div>

                <div class="row">
                    <div class="left">
                        <label for="fdate">Finish date</label>
                    </div>
                    <div class="right">
                        <input type="date" id="fdate" name="fdate" required>
                    </div>
                </div>

                <div class="row">
                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>


        <div class="container">

            <h2>Add feline to competition</h2>

            <form method="POST" action="../profile/add_feline">
                <div class="row">
                    <div class="left">
                        <label for="name2">Name</label>
                    </div>
                    <div class="right">
                        <input type="text" id="name2" name="name2" placeholder="Feline's name.." required>
                    </div>
                </div>
                <div class="row">
                    <div class="left">
                        <label for="type2">Type</label>
                    </div>
                    <div class="right">
                        <select id="type2" name="type2">
                            <option value="cat">cat</option>
                            <option value="tiger">tiger</option>
                            <option value="puma">puma</option>
                            <option value="chetaah">cheetah</option>
                            <option value="jaguar">jaguar</option>
                        </select>
                    </div>
                </div>

                <div class="row" id="showSize">
                    <div class="left">
                        <label for="size2">Size</label>
                    </div>
                    <div class="right">
                        <select id="size2" name="size2">
                            <option value="small">small</option>
                            <option value="medium">medium</option>
                            <option value="large">large</option>
                        </select>
                    </div>
                </div>

                <div class="row" id="showBreed">
                    <div class="left">
                        <label for="breed">Breed</label>
                    </div>
                    <div class="right">
                        <input type="text" id="breed" name="breed" placeholder="Feline's breed...">
                    </div>
                </div>

                <div class="row">
                    <div class="left">
                        <label for="comp-name">Competiton name</label>
                    </div>
                    <div class="right">
                        <input type="text" id="comp-name" name="comp-name" placeholder="Competition..." required>
                    </div>
                </div>

                <div class="row">
                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>
    </main>


    <script>

        document.getElementById('type').addEventListener('change', function () {
            var type = this.value;

            if (type == "cat") {
                document.getElementById('showCat').style.display = "block";
            }
            else { document.getElementById('showCat').style.display = "none";
                   document.getElementById('size').value = null;
            }

        });


        document.getElementById('type2').addEventListener('change', function () {
            var type = this.value;

            if (type == "cat") {
                document.getElementById('showSize').style.display = "block";
                document.getElementById('showBreed').style.display = "block";
            }
            else {
                document.getElementById('showSize').style.display = "none";
                document.getElementById('showBreed').style.display = "none";
                document.getElementById("size2").value = null;
                document.getElementById("breed").value = null;
            }

        });

    </script>
</body>



</html>