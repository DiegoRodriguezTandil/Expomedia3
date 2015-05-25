<?php
sleep(3);

    $rta = array();
    $display = $_GET['display_id'];
    
    if($display == 1)
    {
        $rta['layout'] = '/infoLayouts';
    }
    
    echo json_encode($rta);
    die();

?>