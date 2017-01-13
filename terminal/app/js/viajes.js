// Variables globales.
var REFRESH_TIME = 10000;

$(function() {    
    setTimeout(
        ObtenerViajes,
        REFRESH_TIME
    );
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