
//Function for checking if competiton already exists in the database.
function checkRace(race) {

    var xhttp;
    if (race != "") {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "../export/actionpage.php?race=" + race, true);
        xhttp.send();
    }
}

function checkFeline(feline) {

    var xhttp;
    if (feline != "") {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo2").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "../export/actionpage.php?feline=" + feline, true);
        xhttp.send();
    }
}