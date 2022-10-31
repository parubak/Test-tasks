// Document load event
window.addEventListener('load', async function () {

    await fetch("https://restcountries.com/v2/all")
        .then((resp) => resp.json()).then(function (data) {

            for (const dataKey in data) {
                listCountry.innerHTML += "<option value='" + data[dataKey].alpha2Code + "'>" + data[dataKey].name + "</option>";
            }

        })
        .catch(function () {
            console.log("Error loading list country!!!") //    Error
        });

});

function sendFormData(form) {
    let formData = new FormData(form);

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
            statusMessage.innerHTML = "Conference added!";

            setTimeout(function () {
                window.location = "/";
            }, 2000);
        } else {
            statusMessage.classList.add("alert-danger");
            statusMessage.innerHTML = "Oops, error!";
            console.log("Server response: ", xhr.statusText);//    Error
        }
    };
    xhr.send(formData);
}