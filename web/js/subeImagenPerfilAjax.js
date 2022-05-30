/**
 * 
 * En principio iba a subir la imagen de perfil a la BD por AJAX, pero me encontré con que la URL era demasiado larga, así que nanai
 * @param {*} img contiene el blob de la imagen
 * @param {*} idUser contiene el usuario al que le vamos a asignar esa imagen de perfil
 */

function subeImagen(img, idUser) {

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
    xhttp.open("GET", "../model/subeImagenUser.php?cambiaFoto="+img+"&idUser="+idUser);
    xhttp.send();

}