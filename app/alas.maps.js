// Variables globales.
var REFRESH_TIME = 10000;
var map;

$(function() {

    map = new Maplace({
        map_options: {
            set_center: [-37.328241, -59.135563],
            zoom: 13,
            controls_type: 'list',
            controls_on_map: false,
            show_markers: true,
        }
    }).Load();
    
    setTimeout(
            GoogleMapUpdate,
            REFRESH_TIME
    );
    
});

function GoogleMapUpdate() {
    $.ajax({
        url: "service.maps.php",
        dataType: "json",
        success: function(response) {
            map.Load({
                locations: response.positions,
                type: "marker",
            });            
        }
    });
    
    setTimeout(
            GoogleMapUpdate,
            REFRESH_TIME
    );
    
}