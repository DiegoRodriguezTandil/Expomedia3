<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Alas Screen</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="https://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.22&key=AIzaSyBbWhD4UD0AIkDFmxzkVFeSGNr3gSsPvvQ"></script>
        <script src="bower_components/maplace-js/dist/maplace.min.js"></script>        
        <script type="text/javascript" src="app/alas.maps.js"> </script>
    </head>
    <body>
        <div id="gmap" data-rqid="0" style="with:300px;height:400px;"></div>
    </body>
</html>
