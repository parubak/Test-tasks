 function butDelete(e){


     const xhr = new XMLHttpRequest();
// POST-запрос к ресурсу /user
     xhr.open("POST", "/conference/delete/");

// обработчик получения ответа сервера
     xhr.onload = () => {
         if (xhr.status === 200) {
             console.log(xhr.responseText);
             // document.getElementById("demo").innerHTML =
             //            alert(this.responseText) ;
         } else {
             console.log("Server response: ", xhr.statusText);
         }
     };
     xhr.send(e.target.dataset.id);     // отправляем значение user в методе send



 }
 function clickElementList(e){
     e.target.dataset.id

 }