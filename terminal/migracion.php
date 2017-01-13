<?php

$handle = fopen("horarios-sinacentos.csv", "r");
$aux = [];
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $a = explode(';', $line);
        $aux[$a[0].'##'.$a[1]] = [
            "hora"    =>  $a[0],
            "empresa" =>  $a[1],
            "procedencia" =>  $a[2],
            "destino"     =>  $a[3],
            "dia"     => [
                "lunes"   =>  $a[4],
                "martes"  =>  $a[5],
                "miercoles"   =>  $a[6],
                "jueves"  =>  $a[7],
                "viernes" =>  $a[8],
                "sabado"  =>  $a[9],
                "domingo" =>  $a[10],
                "feriado" =>  $a[11],
            ]
        ];
    }
    $json = json_encode($aux);
    file_put_contents('horarios.json', $json);
    fclose($handle);
} else {
    // error opening the file.
} 