<?php 
class catPage {

    public $name;
    public $size;
    public $breed;
    public $rank;
    public $podiums;
    public $race;
    public $date;
    public $positionResult;
    

    public function __construct( $name, $size, $breed, $rank, $podiums,$race,$date,$positionResult)
    {
        $this -> name = $name;
        $this -> size = $size;
        $this -> breed = $breed;
        $this -> rank = $rank;
        $this -> podiums = $podiums;
        $this -> race = $race;
        $this -> date = $date;
        $this -> positionResult = $positionResult;


        
    }
}

?>
