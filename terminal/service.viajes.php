<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

    /**
     * Cantidad de Viajes
     */
    $cantidad_viajes = filter_input(INPUT_POST, "cantidad_viajes", FILTER_VALIDATE_INT, 
            array("options" => array(
                "default" => 10,
                "min_range" => 0
            ))
    );

    var_dump($cantidad_viajes);
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

    include_once 'funciones.php';
    /**
     * 
     */
    $horarios = loadFromFile();
    $horarios_mostrar = loadToShow($horarios, $cantidad_viajes);
    

    echo json_encode([
        "viajes" => $horarios_mostrar,
    ]);

    exit;