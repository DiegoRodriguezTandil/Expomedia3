<?php

    function loadFromFile() {
        $file = file_get_contents('horarios.json');
        return json_decode($file,TRUE);
    }    
    
    function saveToFile($horarios) {
        file_put_contents('horarios.json', json_encode($horarios));
    }    
    
    function ordenar($a, $b){
        $ha = explode('____', $a);
        $ha = $ha[0];
        $hb = explode('____', $b);
        $hb = $hb[0];

        $dta = DateTime::createFromFormat("H:i", $ha);
        $t = $dta->getTimestamp();
        $dtb = DateTime::createFromFormat("H:i", $hb);
        $t1 = $dtb->getTimestamp();
        if($t < $t1) {
            return -1;
        } else if($t == $t1) {
            return 0;
        }
        return 1;
    }
    
    function loadToShow($horarios, $cant) {        
        uksort($horarios, function ($a, $b){
            $ha = explode('____', $a);
            $ha = $ha[0];
            $hb = explode('____', $b);
            $hb = $hb[0];

            $dta = DateTime::createFromFormat("H:i", $ha);
            $t = $dta->getTimestamp();
            $dtb = DateTime::createFromFormat("H:i", $hb);
            $t1 = $dtb->getTimestamp();
            if($t < $t1) {
                return -1;
            } else if($t == $t1) {
                return 0;
            }
            return 1;
        });  

        date_default_timezone_set('America/Argentina/Buenos_Aires');        
        $now = time();        
        $r = array();
        $manana = array();
        
        $i=0;
        
        while(($i<$cant)&&(count($horarios)>0))
        {
            $h = array_shift($horarios);
            
            $dta = DateTime::createFromFormat("H:i", $h['hora']);
            $t = $dta->getTimestamp();
            
            if( $now <= $t )
            {
                array_push($r,$h);
                $i++;
            }
            else
            {
                array_push($manana, $h);
            }
        }
        
        if($i<$cant)
        {
            while(($i<$cant)&&(count($manana)>0))
            {
                $h = array_shift($manana);
                array_push($r,$h);
                $i++;
            }            
        }
        
        return $r;
        
        
    }
