<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

    /**
     * Cantidad de Viajes
     */
    $cantidad_viajes = filter_input(INPUT_POST, "cantidad_viajes") || 10;

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
    
    /**
     * Load from JSON files
     */
    function loadAllFromFile($cantidad) {
        $file = file_get_contents('horarios.json');
        $horarios = json_decode($file);
        $horarios = uksort($horarios, function($a, $b){
            $t = date("H:i",$a);
            $t1 = date("H:i",$b);
            if($t < $t1) {
                return -1;
            } else if($t == $t1) {
                return 0;
            }
            return 1;
        });
        
    }
    
    
    $viajes = 1;

    echo json_encode([
        "viajes" => $viajes,
    ]);

    exit;