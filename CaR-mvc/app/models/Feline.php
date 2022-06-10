<?php 
class Feline {
    public $name;
    public $type;
    public $size;
    public $breed;
    public $rank;
    public $comp_name;
    

    public function __construct($name, $type, $size, $breed, $rank, $comp_name)
    {
        $this -> name = $name;
        $this -> type = $type;
        $this -> size = $size;
        $this -> breed = $breed;
        $this -> rank = $rank;
        $this -> comp_name = $comp_name;
    }
}

?>
