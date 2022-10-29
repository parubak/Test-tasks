 function onclickDelete(id){

     const xhr = new XMLHttpRequest(id);
// POST-запрос к ресурсу /conference/delete/
     xhr.open("POST", "/conference/delete/",true);

     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
// обработчик получения ответа сервера
     xhr.onload = () => {
         if (xhr.status === 200) {
             window.location.href="/conference/info/?id="+id;
             // document.getElementById("demo").innerHTML =
             //            alert(this.responseText) ;
         } else {
             console.log("Server response: ", xhr.statusText);
         }
     };

     xhr.send('id='+id);     // отправляем значение в методе send
 }

 function onclickSave(id){
     window.location.href = '/conference/info/?id='+id;
 }
 function onclickElementList(id){
     window.location.href = '/conference/info/?id='+id;
 }

 function onclickEdit(id){
     window.location.href = '/conference/edit/?id='+id;
 }