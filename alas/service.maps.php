<?php

/**
 * Request ID param
 */
    $rq_id = filter_input(INPUT_POST, "rq_id");
    $rq_id = $rq_id+1;
/**
 * Zonas
 */    
    $zonas = [
        // Centro
        0 => [
            'center' => [-37.328241, -59.135563],
            'zoom' => 14,
        ],
//        // Arco Iris
//        1 => [ 
//            'center' => [-37.304226, -59.164160],
//            'zoom' => 14,
//        ],
//        // Hipodromo
//        2 => [
//            'center' => [-37.304095, -59.109743],
//            'zoom' => 14,
//        ],
//        // Dique
//        3 => [
//            'center' => [-37.343195, -59.127001],
//            'zoom' => 14,
//        ],
    ];
    $next = $rq_id % count($zonas);
    $zone = $zonas[$next];

/**
 * Script para obtener la posición de los moviles.
 */
    try{
        $connection = new PDO("dblib:host=192.168.1.29;dbname=AutoflotTD", 'sa', 'Ser12345');
        
        $r = $connection->query("
            SELECT 
                    m.nro_movil, 
                    m.latitud as lat, 
                    m.longitud as lon, 
                    CASE WHEN v.nro_movil_asignado IS NOT NULL 
                            THEN 'C'
                            ELSE m.estado_operativo 
                    END as estado
            FROM AutoflotTD.dbo.MOVILES m
            LEFT JOIN AutoflotTD.dbo.VIAJES v ON (m.nro_movil = v.nro_movil_asignado and UPPER(direccion) LIKE '%RODRIGUEZ%467%') 
            WHERE 
                    m.latitud <> 0 AND m.longitud <> 0
                    AND m.estado_administrativo='H' AND m.estado_operativo IN ('O', 'L', 'A', 'I', 'Z');"
            , \PDO::FETCH_ASSOC);

        $dbPos = $r->fetchAll(\PDO::FETCH_ASSOC);
        
        $estados = [
            'A' => "http://maps.google.com/mapfiles/ms/icons/pink-dot.png",
            'F' => "http://maps.google.com/mapfiles/markerF.png",
            'I' => "http://maps.google.com/mapfiles/ms/icons/blue-dot.png",
            'L' => "http://maps.google.com/mapfiles/ms/icons/green-dot.png",
            'O' => "http://maps.google.com/mapfiles/ms/icons/red-dot.png",
            'S' => "http://maps.google.com/mapfiles/markerS.png",
            'Z' => "http://maps.google.com/mapfiles/marker_green.png",
            'C' => "http://maps.google.com/mapfiles/ms/icons/yellow-dot.png",
        ];
        $positions = [];
        foreach ($dbPos as $key => $pos) {
            $icon = $estados[$pos['estado']];
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
        "rq_id" => $rq_id,
        "zone" => $zone,
    ]);

    exit;