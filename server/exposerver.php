<?php
    error_reporting(-1);
    ini_set('display_errors', 'On');
    
    const CANTIDAD_VIAJES = 15;
    
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
        include_once 'horarios.php';
        
        $cant = CANTIDAD_VIAJES;
        $now = time();        
        $r = array();
        $manana = array();
        
        $i=0;
        
        while(($i<$cant)&&(count($horarios)>0))
        {
            $h = array_shift($horarios);
            if( $now <= strtotime($h['hora']) )
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
        
        $rta['viajes'] = $r;
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
                    'news' => 'Clarin.com: '.(string)$item->title,
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
*/            
            // DIARIO LA NACION
            $rss = new RssReader('http://contenidos.lanacion.com.ar/herramientas/rss/origen=2');
            if(!$rss->rss->error)
            {
                foreach ($rss->rss->entry as $item)
                {
                    $rta[] = array(
                        'channel' => 'lanacion',
                        //'news' => htmlspecialchars($item->title),//': '.htmlspecialchars($item->content->div),//(string)$item->title,//$noticia,
                        'news' => 'La Nacion Online: '.(string)$item->title,
                        'image' => (string)$rss->rss->icon,
                        'pubDate' => $item->updated,
                    );
                }//foreach
            }

        }//if
    }
    
    echo json_encode($rta);
    die();

?>