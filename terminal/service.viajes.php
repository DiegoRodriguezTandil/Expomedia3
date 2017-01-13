<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

    /**
     * Cantidad de Viajes
     */
    $cantidad_viajes = filter_input(INPUT_GET, "cantidad_viajes", FILTER_VALIDATE_INT, 
            array("options" => array(
                "default" => 10,
                "min_range" => 0
            ))
    );

//    var_dump($cantidad_viajes);
/**
 * Viajes
 * viajes = [
 *  'time' => [
 *      hora    =>  'time',
 *      empresa =>  'string',
 *      procedencia =>  'string',
 *      destino     =>  'string',
 *      dia     => [
 *          lunes   =>  'Boolean',
 *          martes  =>  'Boolean',
 *          miercoles   =>  'Boolean',
 *          jueves  =>  'Boolean',
 *          viernes =>  'Boolean',
 *          sabado  =>  'Boolean',
 *          domingo =>  'Boolean',
 *          feriado =>  'Boolean',
 *      ]
 *  ]
 * ]
 */    
error_reporting(E_ALL);
ini_set("display_errors", 1);    

    function loadFromFile() {
        $file = file_get_contents('horarios.json');
        return json_decode($file,TRUE);
    }    
    
    function ordenar($a, $b){
        $ha = explode('##', $a);
        $ha = $ha[0];
        $hb = explode('##', $b);
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
        uksort($horarios, "ordenar");  

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

    /**
     * 
     */
    $horarios = loadFromFile();
    $horarios_mostrar = loadToShow($horarios, $cantidad_viajes);
    

    echo json_encode([
        "viajes" => $horarios_mostrar
    ]);

    exit;