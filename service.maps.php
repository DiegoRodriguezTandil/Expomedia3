<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

/**
 * Script para obtener la posición de los moviles.
 */
    try{
        $connection = new PDO("dblib:host=192.168.1.29;dbname=AutoflotTD", 'sa', 'Ser12345');
        
        $r = $connection->query(""
                . " SELECT nro_movil, latitud as lat, longitud as lon "
                . " FROM AutoflotTD.dbo.MOVILES "
                . " WHERE latitud <> 0 AND longitud <> 0"
                . " AND estado_administrativo='H' and estado_operativo = 'A' "
            , \PDO::FETCH_ASSOC);

        $dbPos = $r->fetchAll(\PDO::FETCH_ASSOC);
        
        $positions = [];
        foreach ($dbPos as $key => $pos) {
            $icon = "http://maps.google.com/mapfiles/markerA.png";
            $positions[] = [ 
                "lat"=>$pos['lat'],
                "lon"=>$pos['lon'],
                "zoom"=> 8,
                "title"=>"Movil: {$pos['nro_movil']}",
//                "html"=>"<h3>Content A1</h3>",
                "icon"=>$icon,
            ];
        }
        
    } catch(PDOException $e){
        throw new Exception('Database: No puede conectar a la base de datos');
    }    

    echo json_encode([
        "positions" => $positions,
    ]);

    exit;