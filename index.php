<html>
    <head> 
        <meta charset="utf-8">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin-ext' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Passion+One|Pacifico|Satisfy" rel="stylesheet" type='text/css'>
        <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
        
        <script src="https://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.22&key=AIzaSyBbWhD4UD0AIkDFmxzkVFeSGNr3gSsPvvQ"></script>
        <script src="bower_components/maplace-js/dist/maplace.min.js"></script>        
        <script type="text/javascript" src="app/alas.maps.js"> </script>        
                <script type="text/javascript" src="bower_components/timer.jquery/dist/timer.jquery.js"></script>
        <link rel="stylesheet" type="text/css" href="app/css/ideaboxWeather.css"/>
        <link rel="stylesheet" type="text/css" href="app/css/ideaboxNews.css"/>
        <link rel="stylesheet" type="text/css" href="app/css/jquery.mCustomScrollbar.min.css"/>      
        <link rel="stylesheet" type="text/css" href="app/css/main.css"/>
        
        <script src="app/js/jquery.mCustomScrollbar.min.js"></script>
        <script src="app/js/ideaboxNews.js"></script>
        <script src="app/js/ideaboxWeather.js"></script>
            <script src="app/js/mainComp.js"></script>
    </head>
    <body>
        <div class="container">
            <div id="top">                
                <div id="textoTop" >
                    <img src="img/logo_blanco.png" style="float:left; margin-left: 1em; margin-top: 0.2em;" onclick="toggleFullScreen(document.body)" />
                    <div class="text">Al servicio de Tandil - Las 24 hs. </div>
                    <div class="textR Timer">                        
                    </div>
                </div>
            </div> 
            <div id='left' style="width:30%; float:left; ">
                <div id='clima' style="width:100%;">
                    <!-- Plugin code start ---------->
                    <div class="ideaboxWeather" id="example5">
                        <h1>Cargando Clima....</h1>
                    </div>
                    <!-- Plugin code end ------------>
                </div>
                
                <div class="ideaboxNews in-easing noticias" id="idx1">
                <h3>Noticias</h3>
                <ul></ul>
                <div class="in-viewer">

                    <div class="in-viewer-header">
                        <img src="trash/img1.jpg">
                        <div>
                            <h2>no title...</h2>
                            <span>no date...</span>
                        </div>
                    </div>
                    <div class="in-viewer-content">
                        no content...                                                
                    </div>
                    <span class="in-viewer-close"></span>
                </div>
            </div>
            </div>
            <div id='right' style="width:69%; float: right;">
                <div id="gmap" data-rqid="0" style="with:300px;height:100%;"></div>
            </div>
            
            
           
           
            
        </div>
        <div style="position: fixed; z-index: -99; width: 100%; height: 100%">
            <iframe frameborder="0" height="100%" width="100%"
            src="https://youtube.com/embed/97fBxHm6Nas?autoplay=1&controls=0&showinfo=0&autohide=1">
            </iframe>
        </div>
    </body>
    

</html>