<?php 
class Feline {
    public $id;
    public $name;
    public $type;
    public $size;
    public $breed;
    public $rank;
    public $comp_name;
    

    public function __construct($id, $name, $type, $size, $breed, $rank, $comp_name)
    {
        $this -> id = $id;
        $this -> name = $name;
        $this -> type = $type;
        $this -> size = $size;
        $this -> breed = $breed;
        $this -> rank = $rank;
        $this -> comp_name = $comp_name;
    }
}

?>
