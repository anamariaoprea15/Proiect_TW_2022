
//Function for checking if username already exists in the database.
function checkUsername(username) {

    var xhttp;
    if (username != "") {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "../export/actionpage.php?username=" + username + "&email=" + '', true);
        xhttp.send();
    }
}
//Function for checking if email already exists in the database.
function checkEmail(email) {

    var xhttp;
    if (email != "") {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo").innerHTML = this.responseText;
            }
        }
    };
    xhttp.open("GET", "../export/actionpage.php?username=" + '' + "&email=" + email, true);
    xhttp.send();
}
