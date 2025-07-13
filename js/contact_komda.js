$('#selectKomda').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var address = $("option:selected",).attr("data-address");
    var latitude = $("option:selected",).attr("data-latitude");
    var langitude = $("option:selected",).attr("data-langitude");
    var title = $("option:selected",).attr("data-title");

    $("#titleKomda").html(title);
    $("#alamatKomda").html('<svg class="icon"><use xlink:href="#map-pin"></use></svg> '+address);
    $(".mapKomda").attr("data-latitude", latitude);
    $(".mapKomda").attr("data-longitude", langitude);

    reloadmap();
});

function reloadmap() {

    const map = $('#map')
    const lat = $('#map').attr("data-latitude");
    const lng = $('#map').attr("data-longitude");
    if (map.length > 0) {

        let apiKey = map.attr('data-api-key'),
            apiURL

        if (apiKey) {
            apiURL = 'https://maps.google.com/maps/api/js?key=' + apiKey + '&sensor=false'
        }

        else {
            apiURL = 'https://maps.google.com/maps/api/js?sensor=false'
        }

        $.getScript(apiURL, function (data, textStatus, jqxhr) {

            map.each(function () {
                const current_map = $(this),

                    latlng = new google.maps.LatLng(lat,lng),

                    point = current_map.attr('data-marker'),

                    center = latlng,

                    markerPos = latlng,

                    myOptions = {
                        zoom: 6,
                        center: center,
                        disableDefaultUI: true,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        mapTypeControl: false,
                        scrollwheel: false,
                        draggable: true,
                        panControl: false,
                        zoomControl: true,
                        disableDefaultUI: true,
                    }

                const map = new google.maps.Map(current_map[0], myOptions)

                const marker = new google.maps.Marker({
                    map: map,
                    icon: {
                        size: new google.maps.Size(59, 69),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(0, 69),
                        url: point,
                    },
                    position: markerPos
                })

                google.maps.event.addDomListener(window, "resize", function () {
                    const center = map.getCenter()
                    google.maps.event.trigger(map, "resize")
                    map.setCenter(center)
                })
            })
        })
    }
}