let map;
let form;
let country;
let infoWindow;


window.addEventListener('load', async function () {
    form = document.getElementById('frmInfo');
    country = document.getElementById('country');


    await fetch("https://restcountries.com/v2/alpha/" + arrayContent.country)
        .then((resp) => resp.json()).then(function (data) {

            country.value = data.name;

            if (arrayContent.map_lat != null && arrayContent.map_lng != null) {

                const position = new google.maps.LatLng(arrayContent.map_lat, arrayContent.map_lng);
                map.setCenter(position)

                const marker = new google.maps.Marker({
                    position: position,
                    map: map
                });

                infoWindow.setContent(' <img alt="flag" src=' + data.flag + ' width="80" height="50"> ' +
                    '<h5 class="mx-2 pt-2 pb-0">' + data.name + '</h5>');
                infoWindow.open(map, marker);

            } else {
                console.log(data.name + 2);
                const position = new google.maps.LatLng(data.latlng[0], data.latlng[1]);
                map.setCenter(position);

            }

        })
        .catch(function () {
            console.log("Error loading country!!!");//    Error
        });


});

// Initialize and add the map
function initMap() {
    const options = {
        zoom: 6,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    infoWindow = new google.maps.InfoWindow();
    map = new google.maps.Map(document.getElementById('map'), options);

}

