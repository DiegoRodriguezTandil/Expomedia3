<?php

class Viajes {
    
    public $horarios;
    
    public function __construnctor() {
        $file = file_get_contents('horarios.json');
        $this->horarios = json_decode($file);
    }
    
    public function loadToShow($cant) {
        $horarios_ordenados = uksort($this->horarios, function($a, $b){
            $ha = explode('##', $a);
            $ha = $ha[0];
            $hb = explode('##', $b);
            $hb = $hb[0];
            
            $t = date("H:i",$ha);
            $t1 = date("H:i",$hb);
            if($t < $t1) {
                return -1;
            } else if($t == $t1) {
                return 0;
            }
            return 1;
        });        
        
    }
        
}
