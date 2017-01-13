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
            <?php
            if (!isset($_GET['id'])) {
                $id = $_GET['id'];
                $action = "index.php?r=crear";
            } else {
                $action = 'index.php?r=actualizar&id=' . $id . "'";
            }
            ?>
            <form id="meetingForm" class="form-horizontal"
                  data-fv-framework="bootstrap"
                  data-fv-icon-valid="glyphicon glyphicon-ok"
                  data-fv-icon-invalid="glyphicon glyphicon-remove"
                  data-fv-icon-validating="glyphicon glyphicon-refresh">
                <div clas="col-md-6 col-md-offset-6" style="margin-top:5%; margin-left:15%;">

                    <div class="row">

                        <div class="col-lg-2">
                            <label for="Hora">Hora</label>
                            <!--<input type="text" class="form-control" id="Hora" placeholder="Ingrese un Horario">-->
                            <input type="text" class="form-control" name="time" placeholder="HH:mm"
                                   pattern="^(2[0-3]|[01]?[0-9]):([0-5]?[0-9])$" id="Hora"
                                   data-fv-regexp-message="La hora debe ser de la forma 19:34" />
                        </div>
                        <div class="col-lg-3">
                            <label for="empresa">Empresa</label>
                            <input type="text" class="form-control" id="Empresa" placeholder="Ingrese Nombre de la Empresa">
                        </div>
                        <div class="col-lg-3">
                            <label for="empresa">Procedencia</label>
                            <input type="text" class="form-control" id="Procedencia" placeholder="Ingrese Procedencia">
                        </div>
                        <div class="col-lg-3">
                            <label for="empresa">Destino</label>
                            <input type="text" class="form-control" id="Destino" placeholder="Ingrese Destino">
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
                            <input type="checkbox" class="form-control" id="Dia-lunes">
                        </div> 
                        <div class="col-lg-1 inputDias">
                            <label for="dia-">Martes</label>
                            <input type="checkbox" class="form-control" id="dia-martes">
                        </div> 
                        <div class="col-lg-1 inputDias">
                            <label for="dia-">Miércoles</label>
                            <input type="checkbox" class="form-control" id="dia-miercoles">
                        </div> 
                        <div class="col-lg-1 inputDias">
                            <label for="dia-">Jueves</label>
                            <input type="checkbox" class="form-control" id="dia-jueves">
                        </div> 
                        <div class="col-lg-1 inputDias">
                            <label for="dia-">Viernes</label>
                            <input type="checkbox" class="form-control" id="dia-viernes">
                        </div> 
                        <div class="col-lg-1 inputDias">
                            <label for="dia-">Sabado</label>
                            <input type="checkbox" class="form-control" id="dia-sabado">
                        </div> 
                        <div class="col-lg-1 inputDias">
                            <label for="dia-">Domingo</label>
                            <input type="checkbox" class="form-control" id="dia-domingo">
                        </div> 
                        <div class="col-lg-1 inputDias">
                            <label for="dia-">Feriado</label>
                            <input type="checkbox" class="form-control" id="dia-feriado">
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
  </body>
  <script>
$(document).ready(function() {
    $('#meetingForm').formValidation();
});
</script>
</html>