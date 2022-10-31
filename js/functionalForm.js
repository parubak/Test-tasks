let map;
let marker;
let listCountry;
let geocoder;
let statusMessage;
let showMarker;


document.addEventListener("DOMContentLoaded", function () {

    listCountry = document.getElementById('country');
    showMarker = document.getElementById('marker');
    statusMessage = document.getElementById("statusMessage");

    listCountry.addEventListener("change", changeListCountry)
    showMarker.addEventListener("change", changeShowMarker);

    window.initMap = initMap;
});


// Initialize and add the map
function initMap() {
    const center = new google.maps.LatLng(50.4502453, 30.5227775);

    const options = {
        zoom: 4,
        center: center,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById('map'), options);
    marker = new google.maps.Marker();
    marker.setDraggable(true);
    marker.addListener("dragend", dragendMarker);
    geocoder = new google.maps.Geocoder();
}

function dragendMarker(e) {
    geocoder
        .geocode({
            location: e.latLng,
            region: listCountry.value
        }).then((response) => {

        if (response.results[0]) {
            listCountry.value = response.results[response.results.length - 1].address_components[0].short_name;
        }
    }).catch((e) => console.log("Geocoder failed due to: " + e));  //    Error
}


async function changeShowMarker() {
    if (showMarker.checked) {
        await changeListCountry();

        return;
    }
    marker.setMap(null);
}

async function changeListCountry() {
    if (listCountry.value === "") {
        showMarker.parentElement.style.visibility = 'hidden';

        marker.setMap(null);
        return;
    }
    showMarker.parentElement.style.visibility = 'visible';
    await fetch("https://restcountries.com/v2/alpha/" + listCountry.value)
        .then((resp) => resp.json()).then(function (data) {

            const position = new google.maps.LatLng(data.latlng[0], data.latlng[1]);
            map.panTo(position);
            map.setZoom(6);

            if (showMarker.checked) {
                marker.setPosition(position);
                marker.setMap(map);
            }

        })
        .catch(function () {
            console.log("Error loading list country!!!");//    Error
        });

}


// Устанавливаем событие отправки для формы
function validation(e) {
    e.preventDefault();
    e.stopPropagation();

    if (setValidationResponse() && e.target.checkValidity()) {

        sendFormData(e.target);
        disableForm(e.target, true);
    }
    e.target.classList.add('was-validated');


}

function disableForm(form, disabled) {
    let inputs = form.getElementsByTagName('input');

    for (let i = 0; i < inputs.length; i++) {
        inputs[i].disabled = disabled;
    }

    listCountry.disabled = disabled;
    marker.setDraggable(!disabled);
}


function setValidationResponse() {
    let flag = true;

    let title = document.getElementById("title");
    let inputDate = document.getElementById("inputDate");

    if (title.value.length < 2 || title.value.length > 255) {
        markAsInvalid(title.id, "(required min: 2, max: 255 characters)");
    } else {
        markAsValid(title.id);
    }

    if (inputDate.value === "") {
        markAsInvalid(inputDate.id, "(no date selected)");
    } else {
        const now = new Date();
        const today = Date.UTC(now.getFullYear(), now.getMonth(), now.getDate());

        if (Date.parse(inputDate.value) < today) {
            markAsInvalid(inputDate.id, "(that time has already passed)");
        } else {
            markAsValid(inputDate.id);
        }
    }

    if (listCountry.value === "") {
        markAsInvalid(listCountry.id, "(country not selected)");
    } else {
        markAsValid(listCountry.id);
    }

    function markAsValid(id) {
        document.getElementById(id + "-info").style.display = "none";
    }

    function markAsInvalid(id, feedback) {
        document.getElementById(id + "-info").style.display = "inline";
        document.getElementById(id + "-info").innerText = feedback;
        flag = false;
    }

    return flag;
}
