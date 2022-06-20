<?php

include_once "../app/models/auth.utils.php";

class Home extends Controller
{

    public function index($name = '')
    {
        // $user = $this->model('User');
        // $user->name = $name;

        $this->view('home/index');
    }

    public function test()
    {
        echo 'test';
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

        // check if user is in database
        $user = getUser($username, $password);


        if (!$user) {
            //  echo "Missing account!";
            $this->view('home/403', []);
            // $this -> view('errors/wrong-credentials', []);
        } else {
            //login din auth-utils
            //retine user si parola in sesiune
            login($username, $password);

            //schimba path-ul (controller)
            header("Location: ../profile/index");
        }
    }

    public function register()
    {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = md5($_POST["password"]);

        // check if user is in database
        $user = existsUser($username, $email);
        if (!$user) {
            addUser($username, $email, $password);
        }
        header("Location: ../home/index");
    }
}
