// Variables globales.
var REFRESH_TIME = 30000;
var map;

$(function() {

    map = new Maplace({
        map_options: {
            set_center: [-37.328241, -59.135563],
            zoom: 14,
            controls_on_map: false,
            show_markers: true,
        }
    }).Load();
    
    GoogleMapUpdate();

    
});

function GoogleMapUpdate() {
    var rq_id = $('#gmap').data('rqid');
  //  console.log(rq_id);
    $.ajax({
        url: "service.maps.php",
        method: "POST",
        data: {
            rq_id: rq_id,
        },
        dataType: "json",
        async: false,
        success: function(response) {
           // debugger;
            $('#gmap').data('rqid',response.rq_id);
            map.Load({
                locations: response.positions,
                type: "marker",
                map_options: {
                    set_center: [response.zone.center[0],response.zone.center[1]],
                    zoom: response.zone.zoom,
                }
            });            
        }
    });
    
    setTimeout(
            GoogleMapUpdate,
            REFRESH_TIME
    );
    
}