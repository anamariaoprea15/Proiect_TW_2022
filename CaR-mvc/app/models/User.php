<?php 
class User {
    public $id;
    public $username;
    public $email;

    public function __construct($id, $username, $email, $credit)
    {
        $this-> id = $id;
        $this -> username = $username;
        $this -> email = $email;
        $this-> credit = $credit;
    }
}

?>