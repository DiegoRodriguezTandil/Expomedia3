<?php
    error_reporting(-1);
    ini_set('display_errors', 'On');
    
    include_once 'RssReader.php';

    //file_put_contents('params.log', var_dump($_GET));
    $rta = array();
    
    if(
        array_key_exists('display_id', $_GET)
        &&($_GET['display_id'] == 1)
    )
    {
        $rta['layout'] = '/infoLayouts';
    }
    else
    if(
        array_key_exists('action', $_GET)
        &&($_GET['action'] == 'travel')
    )
    {
        $rta['viajes'] = array(
            array(
                'hora' => '08:10',
                'origen' => 'Tandil',
                'destino'=> 'Mar del Plata',
                'empresa'=> 'El Rapido'
            ),
            array(
                'hora' => '09:00',
                'origen' => 'Tandil',
                'destino'=> 'Azul',
                'empresa'=> 'Condor'
            ),
            array(
                'hora' => '09:10',
                'origen' => 'Azul',
                'destino'=> 'La Plata',
                'empresa'=> 'Rio Paraná'
            ),
            array(
                'hora' => '09:30',
                'origen' => 'Tandil',
                'destino'=> 'Retiro',
                'empresa'=> 'El Rapido'
            ),
            array(
                'hora' => '09:50',
                'origen' => 'Balcarce',
                'destino'=> 'Bahia Blanca',
                'empresa'=> 'Rio Paraná'
            ),
            array(
                'hora' => '10:10',
                'origen' => 'Tandil',
                'destino'=> 'La Plata',
                'empresa'=> 'Río Paraná'
            ),
            array(
                'hora' => '10:30',
                'origen' => 'Tandil',
                'destino'=> 'Mar del Plata',
                'empresa'=> 'El Rapido'
            ),
            array(
                'hora' => '11:10',
                'origen' => 'Tandil',
                'destino'=> 'Balcarce',
                'empresa'=> 'Condor'
            ),
        );
    }
    else 
    {
        if(
            array_key_exists('action', $_GET)
            &&($_GET['action'] == 'noticias')
        )
        {
            // DIARIO CLARIN
            $rss = new RssReader('http://www.clarin.com/rss/sociedad');
            foreach ($rss->rss->channel->item as $item)
            {
                $rta[] = array(
                    'channel' => 'clarin',
                    //'news' => htmlspecialchars($item->title),//.': '.htmlspecialchars($item->description),//(string)$item->title,//$noticia,
                    'news' => (string)$item->title,
                    'image' => (string)$rss->rss->channel->image->url,
                    'pubDate' => $item->pubDate,
                );
            }//foreach
/*            
            // DIARIO OLE
            $rss = new RssReader('http://www.ole.clarin.com/diario/hoy/home.rss');
            foreach ($rss->rss->channel->item as $item)
            {
                $rta[] = array(
                    'channel' => 'ole',
                    //'news' => htmlspecialchars($item->title),//.': '.htmlspecialchars($item->description),//(string)$item->title,//$noticia,
                    'news' => $item->title,
                    'image' => (string)$rss->rss->channel->image->url,
                    'pubDate' => $item->pubDate,
                );
            }//foreach
            
            // DIARIO LA NACION
            $rss = new RssReader('http://contenidos.lanacion.com.ar/herramientas/rss/origen=2');
            if(!$rss->rss->error)
            {
                foreach ($rss->rss->entry as $item)
                {
                    $rta[] = array(
                        'channel' => 'lanacion',
                        //'news' => htmlspecialchars($item->title),//': '.htmlspecialchars($item->content->div),//(string)$item->title,//$noticia,
                        'news' => $item->title,
                        'image' => (string)$rss->rss->icon,
                        'pubDate' => $item->updated,
                    );
                }//foreach
            }
*/
        }//if
    }
    
    echo json_encode($rta);
    die();

?>