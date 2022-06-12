<?php
include_once "../app/models/cat.utils.php";
include_once  "../app/models/auth.utils.php";

class Cat extends Controller
{
    public function index()
    { 
        $this->view('cat/cat-page');
    }

    public function profile($name='')
    { 
        $user=getLoggedInUser();
        $cat_data=getAllData($name);
        if($cat_data){
        // var_dump($cat_data);
        $avgRank=AvgRanking($cat_data);
        $noPodiums=nrPodiums($cat_data);
        $this->view('cat/cat-page',["user"=>$user, "cat_data"=>$cat_data,"avgRank"=>$avgRank, "noPodiums"=>$noPodiums]);}
    else  $this->view('home/403',[]);
    }

}
