<?php
include_once "../app/models/auth.utils.php";

class Race extends Controller
{
    public function index()
    {
        $user = getLoggedInUser();

        if($user) {
            // $this->view('race/connected-race', ["user" => $user]);
            header("Location: ../race/connected_race");
        } else {
            header("Location: ../race/race");
        }
    }

    public function logout() {
        $_SESSION["username"] = null;
        $this->view('home/index', []);
        header("Location: ../home/index");
       
    }

    public function connected_race(){

        $user = getLoggedInUser();
        
        $this->view('race/connected-race', ["user" => $user]);
    }

    public function race(){

        $user = getLoggedInUser();
        
        $this->view('race/race', ["user" => $user]);

    }

    public function live_races(){

        $user = getLoggedInUser();

        $this->view('race/live-races', ["user" => $user]);
    }

    public function schedule(){

        $user = getLoggedInUser();

        $this->view('race/schedule', ["user" => $user]);

    }

    public function changePassword(){

        $user = getLoggedInUser();
        if(isset($_POST['old_password']) && isset($_POST['new_password'])){
            updatePassword($_POST['old_password'], $_POST['new_password'], $user);
            header("Location: ../profile/index");
        }
    }




}
