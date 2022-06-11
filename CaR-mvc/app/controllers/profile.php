<?php
include_once "../app/models/auth.utils.php";
include_once "../app/models/race.utils.php";

class Profile extends Controller
{
    public function index()
    {
        $user = getLoggedInUser();

        if ($user) {
            if ($user->username == 'admin') { // only form page for admin
                header("Location: ../profile/admin");
            } else {
                header("Location: ../profile/user_dashUpc");
                //$this->view('profile/user_dashUpc', ["user" => $user]);     
            }
        } else {
            $this->view('home/403', []);
        }
    }

    public function user_dashUpc()
    {

        $user = getLoggedInUser();

        if ($user) {
            $this->view('profile/user_dashUpc', ["user" => $user]);
        } else {
            $this->view('home/403', []);
        }
    }

    public function user_dashHistory()
    {

        $user = getLoggedInUser();

        if ($user) {
            $this->view('profile/user_dashHistory', ["user" => $user]);
        } else {
            $this->view('home/403', []);
        }
    }

    public function admin()
    {

        $user = getLoggedInUser();
        if ($user) {
            $this->view('profile/admin-add-competitor', ["user" => $user]);
        } else {
            $this->view('home/403', []);
        }
    }

    public function logout()
    {
        $_SESSION["username"] = null;
        $this->view('home/index', []);
        header("Location: ../home/index");
    }

    public function changePassword()
    {

        $user = getLoggedInUser();
        if (isset($_POST['old_password']) && isset($_POST['new_password'])) {
            updatePassword($_POST['old_password'], $_POST['new_password'], $user);
            header("Location: ../profile/index");
        }
    }


    public function add_competition()
    {
        $name = $_POST["name"];
        $type = $_POST["type"];
        if (isset($_POST['size'])) {
            $size = $_POST["size"];
        } else $size = null;
        $start = $_POST["sdate"];
        $finish = $_POST["fdate"];
        addCompetition($name, $type, $size, $start, $finish);
        //cu mesaj a fost inregistrat cu succes !! sau verificari daca exista deja userul
        header("Location: ../profile/index");
    }


    public function add_feline()
    {

        $name = $_POST["name2"];
        $type = $_POST["type2"];

        if (isset($_POST['size2'])) {
            $size = $_POST["size2"];
        } else $size = null;

        if (isset($_POST['breed'])) {
            $breed = $_POST["breed"];
        } else $breed = null;
        $comp_name =  $_POST["comp-name"];

        addFeline($name, $type, $size, $breed, $comp_name);
        header("Location: ../profile/index");
    }
}
