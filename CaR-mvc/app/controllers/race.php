<?php
include_once "../app/models/auth.utils.php";
include_once "../app/models/race.utils.php";

class Race extends Controller
{
    public function index()
    {
        $user = getLoggedInUser();

        if ($user) {
            // $this->view('race/connected-race', ["user" => $user]);
            header("Location: ../race/connected_race");
        } else {
            header("Location: ../race/race");
        }
    }

    public function logout()
    {
        $_SESSION["username"] = null;
        $this->view('home/index', []);
        header("Location: ../home/index");
    }

    public function connected_race()
    {

        $user = getLoggedInUser();

        $this->view('race/connected-race', ["user" => $user]);
    }

    public function race()
    {

        $user = getLoggedInUser();

        $this->view('race/race', ["user" => $user]);
    }

    public function live_races()
    {

        $user = getLoggedInUser();

        $past_races = getPastRaces();
        //echo "past";
        //var_dump($past_races);
        // foreach($races as $race){
        //     var_dump($race->id);
        // }

        //echo "---current---";
        $current_races = getCurrentRaces();
        //var_dump($current_races);

        //echo "---future---";
        $future_races = getFutureRaces();
        //var_dump($future_races);

        $felines = getAllContenstants();
        $this->view('race/live-races', ["user" => $user, "past_races" => $past_races, "current_races" => $current_races, "future_races" => $future_races, "felines" => $felines]);
    }

    public function schedule()
    {
        $user = getLoggedInUser();


        $data_csv[0] = array('competition', 'start', 'finish', 'feline_name');

        $current_races = getCurrentRaces();
        $felines = getAllContenstants();


        foreach ($current_races as $race) {
            foreach ($felines as $feline) {
                if ($feline->comp_name == $race->name) {
                    $data_csv[] = array($race->name, $race->start, $race->finish, $feline->name);
                }
            }
        }

        $filename = '../public/export/schedule.csv';

        // open csv file for writing
        $f = fopen($filename, 'w');

        if ($f === false) {
            die('Error opening the file ' . $filename);
        }

        // write each row at a time to a file
        foreach ($data_csv as $row) {
            fputcsv($f, $row);
        }

        // close the file
        fclose($f);
        $this->view('race/schedule', ["user" => $user]);
    }

    public function changePassword()
    {

        $user = getLoggedInUser();
        if (isset($_POST['old_password']) && isset($_POST['new_password'])) {
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

        if (!$user) {
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

    public function place_bet()
    {

        //get the betting sum and the id of the contestant on which we bet
        if (isset($_POST["betting-sum"]) and isset($_POST["id_bet"])) {
            echo $_POST["betting-sum"];

            echo $_POST["id_bet"];

            echo "===" . $_POST["cota"] . "===";

            $user = getLoggedInUser();

            echo $user->username;
            addToBetHistory($_POST["betting-sum"], $_POST["id_bet"], $_POST["cota"], $user->username);
        }

        //  header("Location: ../race/live_races");
    }
}
