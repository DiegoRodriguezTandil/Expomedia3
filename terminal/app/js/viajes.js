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
            $.each(response.viajes,function(i,viaje){
                content +='<tr><td class="mdl-data-table__cell--non-numeric importante">'+viaje[i].hora+'</td>'+
                        '<td class="mdl-data-table__cell--non-numeric importante">'+viaje[i].empresa+'</td>'+
                        '<td class="mdl-data-table__cell--non-numeric ">'+viaje[i].procedencia+'</td>'+
                        '<td class="mdl-data-table__cell--non-numeric importante">'+viaje[i].destino+'</td></tr>';
            });
            $('#viajes').append(content);
        }
    });
    
    setTimeout(
        ObtenerViajes,
        REFRESH_TIME
    );
    
}