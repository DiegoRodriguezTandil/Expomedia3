// Variables globales.
var REFRESH_TIME = 60000;

$(function() {    
    ObtenerViajes();
});

function ObtenerViajes() {
    
    
    $.ajax({ 
        url: 'service.viajes.php', 
        data: { cantidad_viajes: '15' }, 
        dataType: 'json',
        success: function (data) {  
            var content = "";
            $.each(data.viajes,function(i,viaje){
                content = content + '<tr><td class="mdl-data-table__cell--non-numeric importante">'+data.viajes[i].hora+'</td>'+
                        '<td class="mdl-data-table__cell--non-numeric importante">'+data.viajes[i].empresa+'</td>'+
                        '<td class="mdl-data-table__cell--non-numeric ">'+data.viajes[i].procedencia+'</td>'+
                        '<td class="mdl-data-table__cell--non-numeric importante">'+data.viajes[i].destino+'</td></tr>';
            });
            $('#viajes').html(content);
        }
    });
    
    setTimeout(
        ObtenerViajes,
        REFRESH_TIME
    );
    
}