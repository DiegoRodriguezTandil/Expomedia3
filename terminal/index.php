<html>
    <head> 
        <meta charset="utf-8">
        <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="bower_components/timer.jquery/dist/timer.jquery.js"></script>
   
        <link rel="stylesheet" href="app/css/material.indigo-pink.min.css">
        <link rel="stylesheet" type="text/css" href="app/css/main_terminal.css"/>
        <script src="app/js/mainComp.js"></script>
        <script type="text/javascript" src="app/js/viajes.js"></script>
    </head>
    <body>
        <div class="container">
            <top>
                <img src="images/tandil_logo.png" style="margin-top: 0.3em;" />
                <span>TERMINAL TANDIL - Movimiento diario
                <!--<div class="Timer"></div>-->
                </span>   
            </top>
            <br>
            <table class="table-striped table-mc-light-blue mdl-data-table mdl-js-data-table  mdl-shadow--2dp">
                <thead class="thead-inverse">
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">Hora</th>
                        <th class="mdl-data-table__cell--non-numeric">Empresa</th>
                        <th class="mdl-data-table__cell--non-numeric">Procedencia</th>
                        <th class="mdl-data-table__cell--non-numeric">Destino</th>
                    </tr>
                </thead>
                <tbody id="viajes">                    
                    
                </tbody>
            </table>     
            <footer>
                <div class="Timer"></div>
                <img src="images/logo-qwavee-blanco.png" width="200px" style="margin-bottom: 3em; margin-right: 4em"  />
            </footer>
        </div>   
    </body>
</html>