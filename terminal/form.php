<?php

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
    
    
    $row = [
        'hora'=>'',
        'empresa'=>'',
        'procedencia'=>'',
        'destino'=>'',
        'dia'=> [
                'lunes'=>'1',
                'martes'=>'1',
                'miercoles'=>'1',
                'jueves'=>'1',
                'viernes'=>'1',
                'sabado'=>'1',
                'domingo'=>'1',
                'feriado'=>'1',
        ]
    ];
    
    if ($action && ($action = 'actualizar')) {
        include_once 'funciones.php';
        $arrayViajes = loadFromFile();
        if(array_key_exists($id, $arrayViajes)){
            $row = $arrayViajes[$id];
        }
        die('CLAVE NO EXISTE. NO ES POSIBLE MODIFICAR');
    }


?>    
<html>    
    <head> 
        <meta charset="utf-8">
            <script type="text/javascript" src="bower_components/bootstrap/dist/bootstrap.min.js"></script>
            <script type="text/javascript" src="bower_components/bootstrap/dist/bootstrap.js"></script>
                
            <link rel="stylesheet" type="text/css" href="app/css/main.css"/>
            <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.css"/>
            <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.min.css"/>
            
            <script src="app/js/mainComp.js"></script>
    </head>
  <body>
    
    <div class="container">
    <h2>Crear / Actualizar movimiento </h2>
      <div class="row">
        <div class="col-lg-12"></div>
      </div>
    </div>
    <div class="container" >
      <div class"row">
          <div clas="col-md-6 col-md-offset-6" style="margin-top:5%; margin-left:15%;">
              <form class="col-lg-10" method="GET" action=<?php echo "listar.php?r=guardar&id={$id}" ?> >
                 <div class="row">
                        <div class="col-lg-2">
                            <label for="Hora">Hora</label>
                            <input type="text" class="form-control" id="Hora" placeholder="Ingrese un Horario" value="<?php=$row['hora']?>" >
                         </div>
                        <div class="col-lg-3">
                            <label for="empresa">Empresa</label>
                            <input type="text" class="form-control" id="Empresa" placeholder="Ingrese Nombre de la Empresa" value="<?php=$row['empresa']?>">
                         </div>
                        <div class="col-lg-3">
                            <label for="empresa">Procedencia</label>
                            <input type="text" class="form-control" id="Procedencia" placeholder="Ingrese Procedencia" value="<?php=$row['procedencia']?>">
                        </div>
                        <div class="col-lg-3">
                            <label for="empresa">Destino</label>
                            <input type="text" class="form-control" id="Destino" placeholder="Ingrese Destino" value="<?php=$row['destino']?>">
                        </div>
                    </div>  
                    <div class="row">                            
                            <h3 style="margin-top:5%; margin-button:5%; ">Selecione los días </h3>
                            <style type="text/css">
                                .inputDias{
                                    margin-left:10px;
                                }
                            </style>
                            <div class="col-lg-1">
                                <label for="dia-lunes">Lunes</label>
                                <input type="checkbox" class="form-control" id="Dia-lunes" <?php=$row['dia']['lunes']==1?'checked':''?> >
                            </div> 
                            <div class="col-lg-1 inputDias">
                                <label for="dia-">Martes</label>
                                <input type="checkbox" class="form-control" id="dia-martes" <?php=$row['dia']['martes']==1?'checked':''?>>
                            </div> 
                            <div class="col-lg-1 inputDias">
                                <label for="dia-">Miércoles</label>
                                <input type="checkbox" class="form-control" id="dia-miercoles" <?php=$row['dia']['miercoles']==1?'checked':''?>>
                            </div> 
                            <div class="col-lg-1 inputDias">
                                <label for="dia-">Jueves</label>
                                <input type="checkbox" class="form-control" id="dia-jueves" <?php=$row['dia']['jueves']==1?'checked':''?>>
                            </div> 
                            <div class="col-lg-1 inputDias">
                                <label for="dia-">Viernes</label>
                                <input type="checkbox" class="form-control" id="dia-viernes" <?php=$row['dia']['viernes']==1?'checked':''?>>
                            </div> 
                            <div class="col-lg-1 inputDias">
                                <label for="dia-">Sabado</label>
                                <input type="checkbox" class="form-control" id="dia-sabado" <?php=$row['dia']['sabado']==1?'checked':''?>>
                            </div> 
                            <div class="col-lg-1 inputDias">
                                <label for="dia-">Domingo</label>
                                <input type="checkbox" class="form-control" id="dia-domingo" <?php=$row['dia']['domingo']==1?'checked':''?>>
                            </div> 
                            <div class="col-lg-1 inputDias">
                                <label for="dia-">Feriado</label>
                                <input type="checkbox" class="form-control" id="dia-feriado" <?php=$row['dia']['feriado']==1?'checked':''?>>
                            </div>                                                                                                                                             

                      </div>  
                </div>            
                <div class="row">
                     <div class="col-lg-12" style="margin-top:2%;  float: left;">
                        <button type="submit" class="btn btn-default">Guardar</button>
                    </div>
                 </div>
              </form>
          </div>
     </div>

    </div><!-- /.container -->
  </body>
</html>