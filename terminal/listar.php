<?php

    include_once 'funciones.php';
    $arrayViajes = loadFromFile();
    
    $action = filter_input(INPUT_GET, "r", FILTER_SANITIZE_MAGIC_QUOTES, 
            array("options" => array(
                "default" => FALSE
            ))
    );
    
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_MAGIC_QUOTES, 
            array("options" => array(
                "default" => 'NULL'
            ))
    );

    if ($action && ($action == 'guardar')) {
        // LEE DATOS GET
        $hora = filter_input(INPUT_GET, "hora");
        $empresa = filter_input(INPUT_GET, "empresa");        
        if((trim($hora)!='')&&(trim($empresa)!='')) {
            $procedencia = filter_input(INPUT_GET, "procedencia");
            $destino = filter_input(INPUT_GET, "destino");
            $lunes = filter_input(INPUT_GET, "lunes", FILTER_SANITIZE_MAGIC_QUOTES, 
                array("options" => array(
                    "default" => 0
                ))
            );
            $martes  = filter_input(INPUT_GET, "martes", FILTER_SANITIZE_MAGIC_QUOTES, 
                array("options" => array(
                    "default" => 0
                ))
            );
            $miercoles  = filter_input(INPUT_GET, "miercoles", FILTER_SANITIZE_MAGIC_QUOTES, 
                array("options" => array(
                    "default" => 0
                ))
            );
            $jueves  = filter_input(INPUT_GET, "jueves", FILTER_SANITIZE_MAGIC_QUOTES, 
                array("options" => array(
                    "default" => 0
                ))
            );
            $viernes  = filter_input(INPUT_GET, "viernes", FILTER_SANITIZE_MAGIC_QUOTES, 
                array("options" => array(
                    "default" => 0
                ))
            );
            $sabado  = filter_input(INPUT_GET, "sabado", FILTER_SANITIZE_MAGIC_QUOTES, 
                array("options" => array(
                    "default" => 0
                ))
            );
            $domingo = filter_input(INPUT_GET, "domingo", FILTER_SANITIZE_MAGIC_QUOTES, 
                array("options" => array(
                    "default" => 0
                ))
            );
            $feriado = filter_input(INPUT_GET, "feriado", FILTER_SANITIZE_MAGIC_QUOTES, 
                array("options" => array(
                    "default" => 0
                ))
            );
            // NUEVO O ACTUALIZA
            if( ($id != 'NULL') && !array_key_exists($id, $arrayViajes)){
                // ERROR
            }else if($id == 'NULL'){
                $id = $hora.'____'.str_replace(' ', '_',$empresa);
            }
            // ACTUALIZA
            $arrayViajes[$id] = [
                'hora'=>$hora,
                'empresa'=>$empresa,
                'procedencia'=>$procedencia,
                'destino'=>$destino,
                'dia'=> [
                        'lunes'=>$lunes,
                        'martes'=>$martes,
                        'miercoles'=>$miercoles,
                        'jueves'=>$jueves,
                        'viernes'=>$viernes,
                        'sabado'=>$sabado,
                        'domingo'=>$domingo,
                        'feriado'=>$feriado,
                ]
            ];
            saveToFile($arrayViajes);
            
        }
    }
    else if ($action && ($action == 'eliminar')) {
        if( ($id != 'NULL') && array_key_exists($id, $arrayViajes)){
            unset($arrayViajes[$id]);
            saveToFile($arrayViajes);
        }else {
            // ERROR
            echo "Error,404 . ";
            echo "<a href="."listar.php>  Volver a Listar</a><span></span>";
        }        
           
    }
    
?>    
<html>    
    <head> 
        <meta charset="utf-8">
        <script type="text/javascript" src="bower_components/bootstrap/dist/bootstrap.min.js"></script>
        <script type="text/javascript" src="bower_components/bootstrap/dist/bootstrap.js"></script>

        <link rel="stylesheet" type="text/css" href="app/css/main_terminal.css"/>
        <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.min.css"/>

        <script src="app/js/mainComp.js"></script>
    </head>

    <body class="admin">
            
      <div class="container">
      <div class="row">
          <top class="admin">
              <img src="images/tandil_logo.png" style="margin-top: 0.3em;" />
              <span>TERMINAL TANDIL - Movimiento diario
              <div class="Timer"></div></span>
          </top>    
      </div>
          <div class="row">
              <div class="table-responsive col-lg-11" style="margin-bottom: 0.3em;margin-top: 0.3em;">
                  <a class="btn btn-primary" href="form.php" role="button">Nuevo</a>                  
              </div>
          </div>
        <div class="row">
          <div class="table-responsive col-lg-11">
            <table class="table col-lg-8">
              <thead class="thead-inverse">
                <tr>
                <!--<span class=" .fa-pencil-square-o"></span><span class="fa fa-pencil"></span>-->
                  <th>Acciones </th>
                  <th>Hora</th>
                  <th>Empresa</th>
                  <th>Procedencia</th>
                  <th>Destino</th>
                  <th>Lun</th>
                  <th>Mar</th>
                  <th>Mié</th>
                  <th>Jue</th>
                  <th>Vie</th>
                  <th>Sab</th>
                  <th>Dom</th>
                  <th>Feriado</th>
                </tr>
              </thead>
              <tbody>
              <?php  
              foreach($arrayViajes as $t=>$param){ ?>
                  <tr>
                      <td>
                          <?=  "<a href="."form.php?r=actualizar&id=".$t.">Actualizar</a><span></span>" ?> 
                          <?=  "<a href="."listar.php?r=eliminar&id=".$t.">Eliminar</a>" ?>    
                      </td>                                     
                      <?php 
                      foreach($param as $p=>$v){
                          if(!is_array($v)){ ?>
                            <td>
                              <strong>
                                <?=$v;?>
                              </strong>  
                            </td>   
                      <?php }else{ 
                                  foreach($v as $d=>$dv){ ?>
                                          <td>
                                          <?php if($dv==="1")echo "<strong>SI</strong>";
                                                else echo "NO";
                                           ?>
                                          </td>
                              <?php } ?>
                           <?php } ?>
                      <?php } ?>
                  </tr>
           <?php } ?>
              </tbody>
            </table>
           </div>
        </div>
      </div><!-- /.container -->

      <!-- footer>
          <img src="images/logo-qwavee-blanco.png" width="200px" style="margin-top: 0.3em;"  />
      </footer -->
  </body>

</html>
