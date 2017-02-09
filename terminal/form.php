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
    
    if ($action && ($action == 'actualizar')) {
        include_once 'funciones.php';
        $arrayViajes = loadFromFile();
        // var_dump($id);
        // // var_dump($arrayViajes);die();
        if(array_key_exists($id, $arrayViajes)){
            $row = $arrayViajes[$id];
        }else{
              // ERROR
                echo "Error,404";
                echo "<a href="."listar.php>Volver a Listar</a><span></span>";
                die();
             }
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
            <form id="meetingForm" class="form-horizontal"
                  data-fv-framework="bootstrap"
                  data-fv-icon-valid="glyphicon glyphicon-ok"
                  data-fv-icon-invalid="glyphicon glyphicon-remove"
                  data-fv-icon-validating="glyphicon glyphicon-refresh" 
                  method="GET" 
                  action=<?php echo "listar.php" ?> >
                <div clas="col-md-6 col-md-offset-6" style="margin-top:5%; margin-left:15%;">
                    <input type="hidden" value="guardar" name="r">
                    <input type="hidden" value="<?php echo $id ?>" name="id">
                    <div class="row">

                        <div class="col-lg-2">
                            <label for="Hora">Hora</label>
                            <!--<input type="text" class="form-control" id="Hora" placeholder="Ingrese un Horario">-->
                            <input type="text" class="form-control" name="hora" placeholder="HH:mm"
                                   pattern="^(2[0-3]|[01]?[0-9]):([0-5]?[0-9])$" id="Hora"
                                   data-fv-regexp-message="La hora debe ser de la forma 19:34" value="<?php echo $row['hora']?>" >
                        </div>
                        <div class="col-lg-3">
                            <label for="empresa">Empresa</label>
                            <input type="text" class="form-control" name="empresa" id="Empresa" placeholder="Ingrese Nombre de la Empresa" value="<?php echo $row['empresa']?>">
                        </div>

                         <div class="col-lg-3">
                                <label for="empresa">Procedencia</label>
                                <input type="text" class="form-control" id="Procedencia" placeholder="Ingrese Procedencia" name="procedencia" value="<?php echo $row['procedencia']?>">
                            </div>
                            <div class="col-lg-3">
                                <label for="empresa">Destino</label>
                                <input type="text" class="form-control" id="Destino" placeholder="Ingrese Destino" name="destino" value="<?php echo $row['destino']?>">
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
                                    <input type="checkbox" class="form-control" id="Dia-lunes" name="lunes" <?php echo $row['dia']['lunes']==1?'checked':''?> value="1">
                                </div> 
                                <div class="col-lg-1 inputDias">
                                    <label for="dia-">Martes</label>
                                    <input type="checkbox" class="form-control" id="dia-martes" name="martes" <?php echo $row['dia']['martes']==1?'checked':''?> value="1">
                                </div> 
                                <div class="col-lg-1 inputDias">
                                    <label for="dia-">Miércoles</label>
                                    <input type="checkbox" class="form-control" id="dia-miercoles" name="miercoles" <?php echo $row['dia']['miercoles']==1?'checked':''?> value="1">
                                </div> 
                                <div class="col-lg-1 inputDias">
                                    <label for="dia-">Jueves</label>
                                    <input type="checkbox" class="form-control" id="dia-jueves" name="jueves" <?php  echo $row['dia']['jueves']==1?'checked':''?> value="1">
                                </div> 
                                <div class="col-lg-1 inputDias">
                                    <label for="dia-">Viernes</label>
                                    <input type="checkbox" class="form-control" id="dia-viernes" name="viernes" <?php  echo $row['dia']['viernes']==1?'checked':''?> value="1">
                                </div> 
                                <div class="col-lg-1 inputDias">
                                    <label for="dia-">Sabado</label>
                                    <input type="checkbox" class="form-control" id="dia-sabado" name="sabado" <?php  echo $row['dia']['sabado']==1?'checked':''?> value="1">
                                </div> 
                                <div class="col-lg-1 inputDias">
                                    <label for="dia-">Domingo</label>
                                    <input type="checkbox" class="form-control" id="dia-domingo" name="domingo" <?php  echo $row['dia']['domingo']==1?'checked':''?> value="1">
                                </div> 
                                <div class="col-lg-1 inputDias">
                                    <label for="dia-">Feriado</label>
                                    <input type="checkbox" class="form-control" id="dia-feriado" name="feriado" <?php  echo $row['dia']['feriado']==1?'checked':''?> value="1">
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
  <script>
$(document).ready(function() {
    $('#meetingForm').formValidation();
});
</script>
</html>