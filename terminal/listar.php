<html>
    <head> 
              <?php $arrayViajes= array('10:00*pp'=>array(
                                                    'hora'=>'22',
                                                    'empresa'=>'el rapido',
                                                    'procedencia'=>'Lapida',
                                                    'destino'=>'Azul',
                                                    'dia'=>array(
                                                            'lunes'=>'1',
                                                            'martes'=>'0',                                                            'lunes'=>'si',
                                                            'miercoles'=>'1',                                                            'lunes'=>'si',
                                                            'jueves'=>'0',                                                            'lunes'=>'si',
                                                            'viernes'=>'0',                                                            'lunes'=>'si',
                                                            'sabado'=>'0',                                                            'lunes'=>'si',
                                                            'domingo'=>'0',                                                            'lunes'=>'si',
                                                            'feriado'=>'1',
                                                            )
                                                    ),'11:00*pp'=>array(
                                                    'hora'=>'14',
                                                    'empresa'=>'Rio Parana',
                                                    'procedencia'=>'Juarez',
                                                    'destino'=>'Azul',
                                                    'dia'=>array(
                                                            'lunes'=>'1',
                                                            'martes'=>'0',                                                            'lunes'=>'si',
                                                            'miercoles'=>'1',                                                            'lunes'=>'si',
                                                            'jueves'=>'0',                                                            'lunes'=>'si',
                                                            'viernes'=>'0',                                                            'lunes'=>'si',
                                                            'sabado'=>'0',                                                            'lunes'=>'si',
                                                            'domingo'=>'0',                                                            'lunes'=>'si',
                                                            'feriado'=>'1',
                                                            )
                                                    )
                                        );?>
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
                <link rel="stylesheet" type="text/css" href="app/css/main_terminal.css"/>
            <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.css"/>
            <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.min.css"/>


                
                <script src="app/js/jquery.mCustomScrollbar.min.js"></script>
                <script src="app/js/ideaboxNews.js"></script>
                <script src="app/js/ideaboxWeather.js"></script>
                    <script src="app/js/mainComp.js"></script>
    </head>
    <body class="admin">
        <div class="container">
            
    <div class="container">
    <div class="row">
         <top class="admin">
                <img src="images/tandil_logo.png" style="margin-top: 0.3em;" />
                <span>TERMINAL TANDIL - Movimiento diario
                <div class="Timer"></div></span>
            </top>
    
      </div>

      <div class"row">
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
                            <?=  "<a href="."index.php?r=actualizar&id=".$t.">Actualizar</a><span></span>" ?> 
                            <?=  "<a href="."index.php?r=eliminar&id=".$t.">Elimnar</a>" ?>    
                        </td>                                     
                        <?php 
                        foreach($param as $p=>$v){
                            if(!is_array($v)){ ?>
                                <td>
                                <?=$v;?>
                                </td>   
                        <?php }else { 
                                    foreach($v as $d=>$dv){ ?>
                                            <td>
                                            <?= $dv; ?>
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


        </div>
        <footer>
            <img src="images/logo-qwavee-blanco.png" width="200px" style="margin-top: 0.3em;"  />
        </footer>
    </body>
    

</html>
