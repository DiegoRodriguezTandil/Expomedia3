<html>    
    <head> 
        <meta charset="utf-8">
                <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin-ext' rel='stylesheet' type='text/css'>
                <link href="https://fonts.googleapis.com/css?family=Passion+One|Viga|Satisfy" rel="stylesheet" type='text/css'>
                <script type="text/javascript" src="bower_components/bootstrap/dist/bootstrap.min.js"></script>
                <script type="text/javascript" src="bower_components/bootstrap/dist/bootstrap.js"></script>
                
                <script src="https://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.22&key=AIzaSyBbWhD4UD0AIkDFmxzkVFeSGNr3gSsPvvQ"></script>
                <script src="bower_components/maplace-js/dist/maplace.min.js"></script>        
                <script type="text/javascript" src="app/alas.maps.js"> </script>        
                        <script type="text/javascript" src="bower_components/timer.jquery/dist/timer.jquery.js"></script>
                <link rel="stylesheet" type="text/css" href="app/css/ideaboxWeather.css"/>
                <link rel="stylesheet" type="text/css" href="app/css/ideaboxNews.css"/>
                <link rel="stylesheet" type="text/css" href="app/css/jquery.mCustomScrollbar.min.css"/>      
                <link rel="stylesheet" type="text/css" href="app/css/main.css"/>
            <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.css"/>
            <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.min.css"/>


                
                <script src="app/js/jquery.mCustomScrollbar.min.js"></script>
                <script src="app/js/ideaboxNews.js"></script>
                <script src="app/js/ideaboxWeather.js"></script>
                    <script src="app/js/mainComp.js"></script>
    </head>
  <body>
    
    <div class="container">
    <h2>Crear/Actualizar</h2>
      <div class="row">
        <div class="col-lg-12"></div>
      </div>
    </div>
    <div class="container" >
      <div class"row">
   <?php if(!isset($_GET['id'])){} ?>

          <div clas="col-md-6 col-md-offset-6" style="margin-top:5%; margin-left:15%;">
                <form class="col-lg-10" action="index.php?r=listar">
                 <div class"row">
                    <div class"row">
                        <div class="col-lg-2">
                            <label for="Hora">Hora</label>
                            <input type="text" class="form-control" id="Hora" placeholder="Ingrese un Horario">
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
                      <div class"row">
                            
                                  <h3 style="margin-top:5%; margin-button:5%; ">Selecione los dias </h3>
                            <style type="text/css">
                                .inputDias{
                                    margin-left:10px;
                                }
                            </style>
                            <div class="col-lg-1">
                                <label for="dia-lunes">Lunes</label>
                                <input type="checkbox" class="form-control" id="Dia-lunes" placeholder="Ingrese un Horario">
                            </div> 
                            <div class="col-lg-1 inputDias">
                                <label for="dia-">Martes</label>
                                <input type="checkbox" class="form-control" id="dia-martes" placeholder="Ingrese un Horario">
                            </div> 
                            <div class="col-lg-1 inputDias">
                                <label for="dia-">Miércoles</label>
                                <input type="checkbox" class="form-control" id="dia-miercoles" placeholder="Ingrese un Horario">
                            </div> 
                            <div class="col-lg-1 inputDias">
                                <label for="dia-">Jueves</label>
                                <input type="checkbox" class="form-control" id="dia-jueves" placeholder="Ingrese un Horario">
                            </div> 
                            <div class="col-lg-1 inputDias">
                                <label for="dia-">Viernes</label>
                                <input type="checkbox" class="form-control" id="dia-viernes" placeholder="Ingrese un Horario">
                            </div> 
                            <div class="col-lg-1 inputDias">
                                <label for="dia-">Sabado</label>
                                <input type="checkbox" class="form-control" id="dia-sabado" placeholder="Ingrese un Horario">
                            </div> 
                            <div class="col-lg-1 inputDias">
                                <label for="dia-">Domingo</label>
                                <input type="checkbox" class="form-control" id="dia-domingo" placeholder="Ingrese un Horario">
                            </div> 
                            <div class="col-lg-1 inputDias">
                                <label for="dia-">Feriado</label>
                                <input type="checkbox" class="form-control" id="dia-feriado" placeholder="Ingrese un Horario">
                            </div>                                                                                                                                             

                      </div>  
                 </div>            
                  <div class"row"> 
                     <div class="col-lg-12" style="margin-top:2%; margin-left:75%;   float: right;">
                        <button type="submit" class="btn btn-default">Enviar</button>
                    </div>
                 </div>
              </form>
          </div>
     </div>

    </div><!-- /.container -->




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/bootstrap.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>