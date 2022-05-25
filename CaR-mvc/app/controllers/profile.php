<?php
include_once "../app/models/auth.utils.php";

class Profile extends Controller
{
    public function index()
    {
        $user = getLoggedInUser();

        if($user) {
            if($user->username == 'admin'){ // only form page for admin
                header("Location: ../profile/admin");
            }
            else{
                header("Location: ../profile/user_dashUpc");
                //$this->view('profile/user_dashUpc', ["user" => $user]);     
            }
               
        } else {
            $this->view('home/403', []);
        }
    }

    public function user_dashUpc(){

        $user = getLoggedInUser();

        if($user) {
            $this->view('profile/user_dashUpc', ["user" => $user]);
        } else {
            $this->view('home/403', []);
        }

    }

    public function user_dashHistory(){
        
        $user = getLoggedInUser();

        if($user) {
            $this->view('profile/user_dashHistory', ["user" => $user]);
        } else {
            $this->view('home/403', []);
        }
    }

    public function admin(){

        $user = getLoggedInUser();
        $this->view('profile/admin-add-competitor', ["user" => $user]);
    }

    public function logout() {
        $_SESSION["username"] = null;
        $this->view('home/index', []);
        header("Location: ../home/index");
       
    }


    public function changePassword(){

        $user = getLoggedInUser();
        if(isset($_POST['old_password']) && isset($_POST['new_password'])){
            updatePassword($_POST['old_password'], $_POST['new_password'], $user);
            header("Location: ../profile/index");
        }
    }




}
