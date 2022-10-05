
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var form = document.getElementById('frmAdd');
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                setValidationResponse();

            }
            form.classList.add('was-validated');

        }, false);

    }, false);

})();
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
    if (inputDate == "") {
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