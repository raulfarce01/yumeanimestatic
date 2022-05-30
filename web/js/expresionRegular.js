
/**
 * 
 * Pa que no se te cuelen los listos con el correo, tú sabe
 * 
 */

var correo = /[\w+(\-\_\.\/)]+[@][\w]+\.[\w]+/;

/**
 * 
 * Deshabilitamos el botón de registro pa que ningún payaso lo pulse mientras falten credenciales y tal
 * 
 */
submitRegistro.disabled = true;

submitRegistro.style.backgroundColor = 'grey';

/**
 * 
 * Recoge los datos del input de correo cada vez que se pulsa una tecla, para poder comprobarlo a tiempo real
 * 
 */
inputLoginCorreo.addEventListener("keyup", function(){

    var inputLoginCorreoValue = document.getElementById("inputLoginCorreo").value;

    if(!inputLoginCorreoValue.match(correo)){
        inputLoginCorreo.style.border = "1px solid red";
        submitRegistro.disabled = true;
        submitRegistro.style.backgroundColor = 'grey';
    }else{
        inputLoginCorreo.style.border = '1px solid black';
        submitRegistro.disabled = false;
        submitRegistro.style.backgroundColor = '#FAF8F7';
    }

});