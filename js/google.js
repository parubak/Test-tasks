{

    let map;
    let marker;
    let autocomplete;
    let form;
    let flag;
    let geocoder;
    let infowindow;



    // Document load event
    document.addEventListener('DOMContentLoad', () => {
        // window.initMap = initMap;



    });

    window.addEventListener('load', function () {
        flag = false;
        form = document.getElementById('frmAdd');
        form.addEventListener('submit', validation);

    });

    // Initialize and add the map
    function initMap() {
        const center = new google.maps.LatLng(50.4502453, 30.5227775);

        const options = {
            zoom: 4,
            center: center,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        geocoder = new google.maps.Geocoder();
        infowindow = new google.maps.InfoWindow();
        map = new google.maps.Map(document.getElementById('map'), options);
        autocomplete = new google.maps.places.Autocomplete(
            document.getElementById("autocomplete"), {
                types: ["country"],
                fields: ['place_id', 'geometry', 'formatted_address']
            }
        );

        function geocodeLatLng(plat, plng) {

            const latlng = {
                lat: parseFloat(plat),
                lng: parseFloat(plng),
            };

            geocoder
                .geocode({ location: latlng })
                .then((response) => {
                    if (response.results[0]) {
                        map.setZoom(11);

                        const marker = new google.maps.Marker({
                            position: latlng,
                            map: map,
                        });

                        infowindow.setContent(response.results[0].formatted_address);
                        infowindow.open(map, marker);
                    } else {
                        window.alert("No results found");
                    }
                })
                .catch((e) => window.alert("Geocoder failed due to: " + e));
        }




        autocomplete.addListener("place_changed", addUserLocation);


    }

    function addUserLocation() {
        // Get the place details from the autocomplete object.

        place = autocomplete.getPlace();


        if (place["name"] != undefined) {
            alert(place["name"]);
            if (marker!==undefined){
                marker.setMap(null);
            }
            flag = false;
            return;
        }


        // Add a marker to the map.
        marker = new google.maps.Marker({
            map: map,
            draggable: true,
        });


        marker.setLabel("?");
        marker.setPosition(place.geometry.location);

        console.log(marker.position.lat());
        // Zoom the map to the marker.
        map.panTo(place.geometry.location);
        map.setZoom(6);
        flag = true;
    }

    window.initMap = initMap;


    function validation(e) { // Устанавливаем событие отправки для формы с id=form

        form.classList.add('was-validated');
        e.preventDefault();
        e.stopPropagation();
        setValidationResponse();
        if(flag===true && form.checkValidity() === true){

            let formData = new FormData(form);

            // добавить к пересылке ещё пару ключ - значение
            formData.append("lat", marker.position.lat());
            formData.append("lng", marker.position.lng());
            // отослать
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "add");
            xhr.send(formData);
            alert("ok!");

        }

    }

    function setValidationResponse() {

        var title = document.getElementById("title").value;
        var inputDate = document.getElementById("inputDate").value;

        if (title.length<2||title.length>255) {
            markAsInvalid("title", "required (min: 2, max:255 символов)");
        } else {
            markAsValid("title");
        }

        if (inputDate == "") {
            markAsInvalid("inputDate", "no date selected");
        } else {
            markAsValid("inputDate");
        }
        if (flag===false) {
            markAsInvalid("country", "country not selected");
        } else {
            markAsValid("country");
        }

    }

    function markAsValid(id) {
        document.getElementById(id+"-info").style.display = "none";
    }

    function markAsInvalid(id, feedback) {
        document.getElementById(id+"-info").style.display = "inline";
        document.getElementById(id+"-info").innerText = feedback;
    }


    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    //let map= google.maps.Map;
    //let service= google.maps.places.PlacesService;
    //let infowindow= google.maps.InfoWindow();

    //function initMap() {
    //  const sydney = new google.maps.LatLng(-33.867, 151.195);
    //
    //  infowindow = new google.maps.InfoWindow("");
    //
    //  let map = new google.maps.Map(document.getElementById("map"),{
    //    center: sydney,
    //    zoom: 15,
    //  });
    //
    //  const request = {
    //    query: "Museum of Contemporary Art Australia",
    //    fields: ["name", "geometry"],
    //  };
    //
    //  service = new google.maps.places.PlacesService(map);
    //
    //  service.findPlaceFromQuery(
    //    request,
    //    (
    //      results=google.maps.places.PlaceResult ,
    //      status=google.maps.places.PlacesServiceStatus
    //    ) => {
    //      if (status === google.maps.places.PlacesServiceStatus.OK && results) {
    //        for (let i = 0; i < results.length; i++) {
    //          createMarker(results[i]);
    //        }
    //
    //        map.setCenter(results[0].geometry.location);
    //      }
    //    }
    //  );
    //}
    //
    //function createMarker(place=google.maps.places.PlaceResult) {
    //  if (!place.geometry || !place.geometry.location) return;
    //
    //  const marker = new google.maps.Marker({
    //    map,
    //    position: place.geometry.location,
    //  });
    //
    //  google.maps.event.addListener(marker, "click", () => {
    //    infowindow.setContent(place.name || "");
    //    infowindow.open(map);
    //  });
    //}
    //
    //
    //
    //
    //window.initMap = initMap;
    //
    //
    //
    //
    //


    //window.initMap = iniMap;
    //
    //function iniMap() {
    //    // The location of Uluru
    //    const uluru = {
    //        lat: 50.4502453,
    //        lng: 30.5227775
    //    };
    //    // The map, centered at Uluru
    //    const map = new google.maps.Map(document.getElementById("map"), {
    //        zoom: 8,
    //        center: uluru,
    //    });
    //
    //    // The marker, positioned at Uluru
    //    const marker = new google.maps.Marker({
    //        position: uluru,
    //        map: map,
    //        draggable: true,
    //    });
    //
    //    google.maps.event.addListener(marker, 'dragend', function (e) {
    //        document.getElementById("addressLat").value = e['latLng'].lat();
    //        document.getElementById("addressLng").value = e['latLng'].lng();
    //    });


    //            google.maps.event.addListener(map, 'dragend', function() { checkBounds(); });

    //// Initialize and add the map
    //function initMap() {
    //  // The location of Uluru
    //  const uluru = { lat: -20.344, lng: 131.031 };
    //  // The map, centered at Uluru
    //  const map = new google.maps.Map(document.getElementById("map"), {
    //    zoom: 4,
    //    center: uluru,
    //  });
    //  // The marker, positioned at Uluru
    //  const marker = new google.maps.Marker({
    //    position: uluru,
    //    map: map,
    //    draggable: true,
    //  });
    //}
    //
    //
    //window.initMap = initMap;

    // */
}
