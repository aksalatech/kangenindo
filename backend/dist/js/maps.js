// Javascript Document


var MAX_MAP_ZOOM = 16;
var MIN_ZOOM_LIMIT = 5;
var json_map = $("#mapChart").html();
var json_map2 = $("#mapChart2").html();
var data_map = $.parseJSON(json_map);
var data_map2 = $.parseJSON(json_map2);
var cstMap;
var markers = new Array();

function initMap()
{    

    var marker = null, myLatLng = null, content = "", stats = "", key="";
    cstMap = new google.maps.Map(document.getElementById("maps"),{
            center: {lat: -2.548926, lng: 118.0148634},
            zoom: MIN_ZOOM_LIMIT
        });

    google.maps.event.addListener(cstMap, 'zoom_changed', function() {
        var zoomLevel = cstMap.getZoom();
        // alert(zoomLevel);
        if (zoomLevel >= 7 && markers.length < 100) {
            clearAllMarkers();
            addKabkotMarkers();
        } else if (zoomLevel <= 6 && markers.length > 100) {
            clearAllMarkers();
            addProvMarkers();
        }
    });
    // var json = $.parseJSON($("#data-map").html());
    // console.log("TSET "+data_map);

    addProvMarkers();
}

function clearAllMarkers() {
    markers.forEach(function(marker) {
        marker.setMap(null);
    });

    markers = new Array();
}

function addProvMarkers() {
    for (var i=0; i<data_map.length; i++) 
    {
        if (data_map[i].lat != "" && data_map[i].lon != "")
        {
            stats = "";
            key = data_map[i].name;


            try {
                myLatLng = new google.maps.LatLng(data_map[i].lat, data_map[i].lon);
                var tooltip = "<div id='t" + data_map[i].prov_id + "' class='tooltips dnone' data-placement='top' role='tooltip'><b>" + data_map[i].name + "</b><br/>Total Alumni: <b>" + data_map[i].total + "</b><br/>Total Pria: <b>" + data_map[i].total_male + "</b><br/>Total Wanita: <b>" + data_map[i].total_female + "</b><div class='arrow' data-popper-arrow></div></div>";

                var mapLabel = new markerWithLabel.MarkerWithLabel({
                    position: myLatLng,
                    clickable: true,
                    draggable: false,
                    map: cstMap,
                    key: data_map[i].prov_id,
                    lat: data_map[i].lat,
                    lon: data_map[i].lon,
                    title:data_map[i].name,
                    infoWindowContent: data_map[i].name,
                    icon: base_url + '/dist/img/none.png',
                    labelContent: tooltip + "<div class='labels'><b id='p" + data_map[i].prov_id + "' title='" + data_map[i].name + "'>" + data_map[i].total.toString() + "</b></div>", // can also be HTMLElement
                    labelAnchor: new google.maps.Point(-14, -14),
                    labelClass: "", // the CSS class for the label
                    labelStyle: { opacity: 1.0 },
                });

                google.maps.event.addListener(mapLabel, "click", function() {
                   // alert("x");
                   var lat = $(this).prop("lat");
                   var lon = $(this).prop("lon");
                   var newCenter = new google.maps.LatLng(lat, lon);
                   cstMap.setCenter(newCenter);
                   cstMap.setZoom(8);
                });


                google.maps.event.addListener(mapLabel, "mouseover", function() {
                    console.log("mouseover");
                    console.log($(this).prop("key"));
                    $("#t" + $(this).prop("key")).show();
               });

                 google.maps.event.addListener(mapLabel, "mouseout", function() {
                    console.log("mouseover");
                    console.log($(this).prop("key"));
                    $("#t" + $(this).prop("key")).hide();
               });

                markers.push(mapLabel);

            } catch (e) { }
        }
    }
}

function addKabkotMarkers() {
    for (var i=0; i<data_map2.length; i++) 
    {
        if (data_map2[i].lat != "" && data_map2[i].lon != "")
        {
            stats = "";
            key = data_map2[i].name;


            // try {
                myLatLng = new google.maps.LatLng(data_map2[i].lat, data_map2[i].lon);
                var tooltip = "<div id='tk" + data_map2[i].kabkot_id + "' class='tooltips2 dnone' data-placement='top' role='tooltip'><b>" + data_map2[i].name + ",</b><br/><b>Provinsi " + data_map2[i].prov_name + "</b><br/>Total Alumni: <b>" + data_map2[i].total + "</b><br/>Total Pria: <b>" + data_map2[i].total_male + "</b><br/>Total Wanita: <b>" + data_map2[i].total_female + "</b><div class='arrow' data-popper-arrow></div></div>";

                var mapLabel = new markerWithLabel.MarkerWithLabel({
                    position: myLatLng,
                    clickable: true,
                    draggable: false,
                    map: cstMap,
                    key: data_map2[i].kabkot_id,
                    title:data_map2[i].name,
                    infoWindowContent: data_map2[i].name,
                    icon: base_url + '/dist/img/none.png',
                    labelContent: tooltip + "<div class='labels2'><b id='k" + data_map2[i].kabkot_id + "' title='" + data_map2[i].name + "'>" + data_map2[i].total.toString() + "</b></div>", // can also be HTMLElement
                    labelAnchor: new google.maps.Point(-14, -14),
                    labelClass: "", // the CSS class for the label
                    labelStyle: { opacity: 1.0 },
                });

                google.maps.event.addListener(mapLabel, "click", function() {
                   // alert("x");
                });


                google.maps.event.addListener(mapLabel, "mouseover", function() {
                    console.log("mouseover");
                    console.log($(this).prop("key"));
                    $("#tk" + $(this).prop("key")).show();
               });

                 google.maps.event.addListener(mapLabel, "mouseout", function() {
                    console.log("mouseover");
                    console.log($(this).prop("key"));
                    $("#tk" + $(this).prop("key")).hide();
               });

                markers.push(mapLabel);

            // } catch (e) { }
        }
    }
}

function setMapLocation(latitude, langitude)
{
    cstMap.setCenter(new google.maps.LatLng(latitude, langitude));
    cstMap.setZoom(MAX_MAP_ZOOM);
}

function getLatitudeLangitude(data_map, id)
{
    for (var i=0;i<data_map.length;i++) {
        if (data_map[i].id == id) {
            return data_map[i];
        }
    }
    return null;
}

$(document).ready(function(e) {
  initMap(); 
});