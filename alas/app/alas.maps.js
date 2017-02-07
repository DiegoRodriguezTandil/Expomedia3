// Variables globales.
var REFRESH_TIME = 30000;
var map;
var markers = new Array();

$(function() {

//    map = new Maplace({
//        map_options: {
//            set_center: [-37.328241, -59.135563],
//            zoom: 14,
//            controls_on_map: false,
//            show_markers: true,
//        }
//    }).Load();
//    
    map = new google.maps.Map(document.getElementById('gmap'), {
        center: {lat: -37.328241, lng: -59.135563},
        zoom: 14
    });    

    GoogleMapUpdate();
    
});

function GoogleMapUpdate() {
    var rq_id = $('#gmap').data('rqid');
    
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
            var positions = $.makeArray( response.positions );
            
            // Add new markers from server response            
            $.map(positions, function(position, i) {
                var m = findMarkerByTitle(markers, position.title);
                if(!m) {
                    m = new google.maps.Marker({
                        position: {lat: parseFloat(position.lat), lng: parseFloat(position.lon)},
                        map: map,
                        icon: position.icon,
                        title: position.title
                    });
                    markers.push(m);
                } else {
                    m.setPosition({lat: parseFloat(position.lat), lng: parseFloat(position.lon)});
                    m.setIcon(position.icon);
                }                
            });
            
            // Remove markers not in Server Response
            if(markers.length > 0) {
                var remove = new Array();
                
                $.map(markers, function(marker, i) {
                    var m = findMarkerByTitle(positions, marker.title);
                    if(!m) {
                        marker.setMap(null);
                        remove.push(i);
                    }                
                });                
                
                $.map(remove, function(pos,i) {
                    markers.splice(pos,1);
                });
                
                remove = null;
            }
            
            
        }
    });    

    setTimeout(
            GoogleMapUpdate,
            REFRESH_TIME
    );

}

function findMarkerByTitle(list, title) {
    if(list.length == 0) {
        return false;
    }        
    var r = $.map(list, function(marker) {
        return marker.title == title ? marker : null;
    });
    
    return r[0] == null ? false : r[0];
}

//function GoogleMapUpdate() {
//    var rq_id = $('#gmap').data('rqid');
//  //  console.log(rq_id);
//    $.ajax({
//        url: "service.maps.php",
//        method: "POST",
//        data: {
//            rq_id: rq_id,
//        },
//        dataType: "json",
//        async: false,
//        success: function(response) {
//           // debugger;
//            $('#gmap').data('rqid',response.rq_id);
//            map.Load({
//                locations: response.positions,
//                type: "marker",
//                map_options: {
//                    set_center: [response.zone.center[0],response.zone.center[1]],
//                    zoom: response.zone.zoom,
//                }
//            });            
//        }
//    });
//    
//    setTimeout(
//            GoogleMapUpdate,
//            REFRESH_TIME
//    );
//    
//}