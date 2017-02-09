<?php

    date_default_timezone_set('America/Argentina/Buenos_Aires');        
    
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

    function loadFromFile() {
        $file = file_get_contents('horarios.json');
        $horarios = json_decode($file,TRUE);
        uksort($horarios, ordenar);
        return $horarios;
    }    
    
    function saveToFile($horarios) {
        file_put_contents('horarios.json', json_encode($horarios));
    }    
    
    function filtroDia($dias) {
        $today_time = new DateTime();
        $today = $today_time->format('w');// 0 Domingo
        $tomorrow = ($today + 1) % 7;
        
        return 
            ($today == 0 || $tomorrow == 0) && ($dias['domingo']==1)
         || ($today == 1 || $tomorrow == 1) && ($dias['lunes']==1)
         || ($today == 2 || $tomorrow == 2) && ($dias['martes']==1)
         || ($today == 3 || $tomorrow == 3) && ($dias['miercoles']==1)
         || ($today == 4 || $tomorrow == 4) && ($dias['jueves']==1)
         || ($today == 5 || $tomorrow == 5) && ($dias['viernes']==1)
         || ($today == 6 || $tomorrow == 6) && ($dias['sabado']==1);
    }
    
    function loadToShow($horarios, $cant) {        
        uksort($horarios, ordenar);

        $now = time();        
        $r = array();
        $manana = array();
                
        $i=0;
        
        while(($i<$cant)&&(count($horarios)>0))
        {
            $h = array_shift($horarios);
            
            $dta = DateTime::createFromFormat("H:i", $h['hora']);
            $t = $dta->getTimestamp();
            
            if(( $now <= $t ) && filtroDia($h['dia']))
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
