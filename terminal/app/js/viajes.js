// Variables globales.
var REFRESH_TIME = 60000;

$(function() {    
    ObtenerViajes();
});

function ObtenerViajes() {
    $.ajax({
        url: "service.viajes.php",
        dataType: "json",
        data: {
            cantidad_viajes: 10,
        },
        success: function(response) {
            console.log(response);
        }
    });
    
    setTimeout(
        ObtenerViajes,
        REFRESH_TIME
    );
    
}