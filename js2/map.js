// Javascript Document
var MAX_MAP_ZOOM = 16;
var MIN_ZOOM_LIMIT = 4;
var json_map = $("#data-map").html();
var data_map = $.parseJSON(json_map);
var tempLat, tempLng;
var cstMap;
var directionsService;
var marker;

function initMap()
{    
    var marker = null, myLatLng = null, content = "", stats = "", key="";
    cstMap = new google.maps.Map(document.getElementById("maps"),{
            center: {lat: -25.2744, lng: 133.7751},
            zoom: MIN_ZOOM_LIMIT
        });
    // var json = $.parseJSON($("#data_stats").html());

    for (var i=0; i<data_map.length; i++) {
         stats = "";
         // key = data_map[i].no_identitas;
         
         // if ($("#chk" + data_map[i].jenis).prop("checked") == true) 
         // {
          stats += "Store Name : <strong>" + data_map[i].store_name+ "</strong><br/>";
          stats += "Address : <strong>" + data_map[i].store_address+ "</strong><br/>";


           // content = "<h4>" + data_map[i].pengguna + " (" + data_map[i].kode_pengguna + ")</h4><br/>" + 
           //           "<strong>Data Statistik</strong><br/>" +
           //           stats +
           //           "<br/><a href='#' onClick=\"setMapLocation('"+data_map[i].latitude + "','" + data_map[i].langitude + "')\"><strong>Lihat Lokasi..</strong></a>";
           // myLatLng = new google.maps.LatLng(data_map[i].latitude, data_map[i].langitude);
           marker = new google.maps.Marker({
               position : myLatLng,
               title : data_map[i].pengguna,
               icon: base_url + '/dist/img/Marker.png',
           });
           // marker.info = new google.maps.InfoWindow({
           //     content : content
           // })
           // // Set Event Listener
           // google.maps.event.addListener(marker, "click", function() {
           //     this.info.open(cstMap, this); 
           // });

           // Add marker to the maps
           marker.setMap(cstMap);
         // }
     }

     directionsService = new google.maps.DirectionsService();
    directionsRenderer = new google.maps.DirectionsRenderer();
    directionsRenderer.setMap(cstMap);

     // Initialize the autocomplete object and link it to the input element
      autocomplete = new google.maps.places.Autocomplete(
          document.getElementById('autocomplete'),
          { types: ['geocode'] }
      );

      // When the user selects an address from the dropdown, navigate the map to that location
      autocomplete.addListener('place_changed', () => {
          const place = autocomplete.getPlace();

          // If the place has a geometry, then present it on the map
          if (place.geometry) {
              const location = place.geometry.location;
              const lat = location.lat();
              const lng = location.lng();

              tempLat = lat;
              tempLng = lng;

              // Center the map on the selected location
              cstMap.setCenter(location);
              cstMap.setZoom(15);

              showBestStore();
              $(".box-location-store").show();

              // Place a marker on the selected location
              if (marker) {
                  marker.setPosition(location);
              } else {
                  marker = new google.maps.Marker({
                      position: location,
                      map: cstMap
                  });
              }
          } else {
              alert("No details available for input: '" + place.name + "'");
          }
      });
}

function calculateRoute(destLat, destLng, target) {
    const sourceLat = tempLat;
    const sourceLng = tempLng;

    // alert(tempLat + " " + tempLng + " " +destLat + " " +destLng);

    const source = new google.maps.LatLng(sourceLat, sourceLng);
    const destination = new google.maps.LatLng(destLat, destLng);

    const request = {
        origin: source,
        destination: destination,
        travelMode: 'DRIVING'
    };

    directionsService.route(request, (result, status) => {
        if (status === 'OK') {
            directionsRenderer.setDirections(result);

            // Calculate the total distance
            const route = result.routes[0];
            let totalDistance = 0;
            for (let i = 0; i < route.legs.length; i++) {
                totalDistance += route.legs[i].distance.value; // distance in meters
            }
            totalDistance = totalDistance / 1000; // convert to kilometers

            $(target).html(totalDistance.toFixed(1) + "KM");
        } else {
            $(target).html(">2,000KM");
        }
    });
}

function showBestStore() {
  for(var i=0;i<data_map.length;i++) {
      calculateRoute(data_map[i].latitude, data_map[i].longitude,".distance[data-id='" + data_map[i].id_store + "']");
  }
  window.setTimeout(function() {
    sortDivsByDistance(".scrollable-content");
  }, 500);
  
}

function sortDivsByDistance(containerSelector) {
    // Select all div elements within the container
    const elements = Array.from(document.querySelectorAll(containerSelector + ' .storeDiv'));
    // Sort the elements based on the data-distance attribute in ascending order
    elements.sort((a, b) => {
        const distanceA = parseInt($(a).find(".distance").html().replaceAll("KM","").replaceAll(",","").replaceAll(">",""));
        const distanceB = parseInt($(b).find(".distance").html().replaceAll("KM","").replaceAll(",","").replaceAll(">",""));
        return distanceA - distanceB;
    });

    // Reorder the div elements in the DOM based on the sorted array
    const container = document.querySelector(containerSelector);
    elements.forEach(element => {
        container.appendChild(element);
    });
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

 function getLocation() {
      if (navigator.geolocation) {

          navigator.geolocation.getCurrentPosition(showPosition, showError);
      } else {
          alert("Geolocation is not supported by this browser.");
      }
  }

  function showPosition(position) {
      const lat = position.coords.latitude;
      const lng = position.coords.longitude;
      
      const latLng = new google.maps.LatLng(lat, lng);
      tempLat = lat;
      tempLng = lng;

      // Center the map on the user's location
      cstMap.setCenter(latLng);
      cstMap.setZoom(15);

      showBestStore();
      
      $(".box-location-store").show();

      // Place a marker on the user's location
      if (marker) {
          marker.setPosition(latLng);
      } else {
          marker = new google.maps.Marker({
              position: latLng,
              map: cstMap
          });
      }
  }

  function showError(error) {
      switch(error.code) {
          case error.PERMISSION_DENIED:
              alert("User denied the request for Geolocation.");
              break;
          case error.POSITION_UNAVAILABLE:
              alert("Location information is unavailable.");
              break;
          case error.TIMEOUT:
              alert("The request to get user location timed out.");
              break;
          case error.UNKNOWN_ERROR:
              alert("An unknown error occurred.");
              break;
      }
  }

  // Initialize the map on window load


$(document).ready(function(e) {
  initMap(); 

  $("body").on("click", "#btCurrentLocation", function(e) {
    getLocation();
  });

  $("body").on("click",".btGetDirection", function(e) {
    var lat = $(this).attr("data-lat");
    var lng = $(this).attr("data-lang");
    window.open("https://maps.google.com/maps?saddr=%28" + tempLat + "%2C%20" + tempLng + "%29&daddr=" + lat + "%2C%20" + lng);
  });

  $("body").on("click",".btOpenHours", function(e) {
    var id = $(this).attr("data-id");
    if ($(".scheduleDiv[data-id='" + id + "']").css("display") == "none")
      $(".scheduleDiv[data-id='" + id + "']").show();
    else
      $(".scheduleDiv[data-id='" + id + "']").hide();
  })
});