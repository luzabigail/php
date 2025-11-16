<?php 

class Coche {
    private $matricula;
    protected $precio;
    public $estado;

    function __construct(string $matricula) {
        $this -> matricula = $matricula;
        $this -> precio = 0;
        $this -> estado = false;
    }

    function __toString() {
        return "INFO: ".$this->matricula.": ".$this->precio;
    }


    function fijarprecio (int $precionuevo) {
        $this -> precio = $precionuevo;
    }

    function mostrarinfo():string {
        return $this -> matricula.": ".$this->precio;
    }
}

$c1 = new Coche("3493XRS");
$c1 -> estado = false;
$c1 -> fijarprecio(4000);
echo "\n".$c1->$mostrarinfo();
echo $c1;
unset($c1);
echo "\n fin de programa";


?>
