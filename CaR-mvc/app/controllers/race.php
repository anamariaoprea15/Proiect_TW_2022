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


    public function login() 
    {
    
        //nu sunt setate din formular   
        if (!isset($_POST["username"]) || !isset($_POST["password"])) {
            $this->view('errors/bad-request', []);
            return;
        }

        $username = $_POST["username"];
        $password = md5($_POST["password"]);

        $user = getUser($username, $password);

        if(!$user) {
            // echo "Missing account!";
           // $this -> view('errors/wrong-credentials', []);
        } else {
            //login din auth-utils
            //retine user si parola in sesiune
            login($username, $password);
          
            //schimba path-ul (controller)
            header("Location: ../race/live_races");
        }
    }

    public function register()
    {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = md5($_POST["password"]);
        addUser($username, $email, $password);
        //cu mesaj a fost inregistrat cu succes !! sau verificari daca exista deja userul
        header("Location: ../race/live_races");
    }


}
