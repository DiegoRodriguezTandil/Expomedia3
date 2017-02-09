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
    $semana = [
        0 => 'domingo',
        1 => 'lunes',
        2 => 'martes',
        3 => 'miercoles',
        4 => 'jueves',
        5 => 'viernes',
        6 => 'sabado'
    ];
    
    function filtroDiaHoy($dias) {
        global $semana;
        $today_time = new DateTime();
        $today = $today_time->format('w');// 0 Domingo
        return ($dias[$semana[$today]]==1);
    }
    
    function filtroDiaManana($dias) {
        global $semana;
        $today_time = new DateTime();
        $today = $today_time->format('w');// 0 Domingo
        $tomorrow = ($today + 1) % count($semana);
        
        return ($dias[$semana[$tomorrow]]==1);
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
            
            if(( $now <= $t ) && filtroDiaHoy($h['dia']))
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
                if(filtroDiaManana($h['dia'])){
                    array_push($r,$h);
                    $i++;                    
                }
            }            
        }
        
        return $r;
        
        
    }
