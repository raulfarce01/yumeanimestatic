
/**
 * 
 * Pa que no se te cuelen los listos con el correo, tú sabe
 * 
 */

var correo = /[\w+(\-\_\.\/)?]+[@][\w]+\.[\w]+/;

/**
 * 
 * Deshabilitamos el botón de registro pa que ningún payaso lo pulse mientras falten credenciales y tal
 * 
 */
saveButton.disabled = true;

saveButton.style.backgroundColor = 'grey';

var inputLoginCorreoPerfil = document.getElementById("correo");

/**
 * 
 * Recoge los datos del input de correo cada vez que se pulsa una tecla, para poder comprobarlo a tiempo real
 * 
 */
inputLoginCorreoPerfil.addEventListener("keyup", function(){

    var inputLoginCorreoPerfilValue = document.getElementById("correo").value;

    console.log(inputLoginCorreoPerfilValue);

    if(!inputLoginCorreoPerfilValue.match(correo)){
        inputLoginCorreoPerfil.style.border = "1px solid red";
        saveButton.disabled = true;
        saveButton.style.backgroundColor = 'grey';
    }else{
        inputLoginCorreoPerfil.style.border = '1px solid black';
        saveButton.disabled = false;
        saveButton.style.backgroundColor = '#0A1940';
    }

});