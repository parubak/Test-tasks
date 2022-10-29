// Document load event
window.addEventListener('load', async function () {

    await fetch("https://restcountries.com/v2/all")
        .then((resp) => resp.json()).then(async function (data) {

            for (const dataKey in data) {
                listCountry.innerHTML += "<option value='" + data[dataKey].alpha2Code + "'>" + data[dataKey].name + "</option>";
            }
            listCountry.value = arrayContent.country;

            if (arrayContent.map_lat != null && arrayContent.map_lng != null) {

                const position = new google.maps.LatLng(arrayContent.map_lat, arrayContent.map_lng);

                showMarker.checked = true;
                showMarker.parentElement.style.visibility = 'visible';
                map.panTo(position)
                map.setZoom(6);

                marker.setPosition(position);
                marker.setMap(map);

            } else {
                await changeListCountry();
            }

        })
        .catch(function () {
            console.log("Error loading list country in edit!!!") //    Error
        });

});

function sendFormData(form){

    let formData = new FormData(form);
    formData.append("id", arrayContent.id);

    // добавить к пересылке ещё пару ключ - значение
    if (marker.getMap() != null) {
        formData.append("lat", marker.position.lat());
        formData.append("lng", marker.position.lng());
    }
    // отослать
    let xhr = new XMLHttpRequest();
    xhr.open(form.method, form.action);

    // обработчик получения ответа сервера
    xhr.onload = () => {

        statusMessage.classList.add("alert");
        if (xhr.status === 200) {
            statusMessage.classList.add("alert-success");
            statusMessage.innerHTML = "Conference save!";

            setTimeout(function () {
                window.location = "/conference/info/?id="+arrayContent.id;
            }, 3000);
        } else {
            statusMessage.classList.add("alert-danger");
            statusMessage.innerHTML = "Oops, error!";
            console.log("Server response: ", xhr.statusText);//    Error
        }
    };
    xhr.send(formData);
}


