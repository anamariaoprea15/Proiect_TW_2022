<?php 
class Competition {
    public $id;
    public $name;
    public $type;
    public $size;
    public $start;
    public $finish;
    

    public function __construct($id, $name, $type, $size, $start, $finish)
    {
        $this-> id = $id;
        $this -> name = $name;
        $this -> type = $type;
        $this -> size = $size;
        $this -> start = $start;
        $this -> finish = $finish;
    }
}

?>
