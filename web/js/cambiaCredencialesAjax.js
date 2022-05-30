var saveButton = document.getElementById("saveButton");
var paR = document.getElementById("paR");
var errorR = document.getElementById("errorR");

console.log("fumo?");

/**
 * 
 * Función para cambiar la credenciales por AJAX al pulsar el botón guardar en su perfil
 * @param {*} nombreNew contiene el nuevo nombre que vamos a mandar por AJAX para que el usuario pueda cambiar las credenciales
 * @param {*} aliasNew Lo mismo que lo de abajo pero con el alias
 * @param {*} correoNew Lo mismo que el primero pero con el correo
 * 
 * ILLO QUE GUAPO, HE PULSADO /** Y ENTER Y HA SALIDO LO DE ARRIBA, vscode es la polla loco
 */
function cambiaCredenciales(nombreNew, aliasNew, correoNew){

    console.log("hola2");

    console.log(nombreNew);
    console.log(correoNew);
    console.log(aliasNew);

    if(nombreNew == '' || correoNew == '' || aliasNew == ''){
        errorR.innerHTML = "Faltan datos";
    }else{

        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onload = function() {
			if (this.responseText.trim() == '') {
				if (this.readyState == 4 && this.status == 200) paR.innerHTML = 'Registro correcto.';
			}
			else if (this.readyState == 4 && this.status == 200) paR.innerHTML = this.responseText.trim();
		};

        xmlhttp.open("GET","../controller/cambia.php?correo="+correoNew+"&nombre="+nombreNew+"&alias="+aliasNew,true);
		xmlhttp.send();

    }

}

/**
 * 
 * Po esto, tú sabe, almacena los valores de los inputs cuando pulses el boton guardar y lo manda a la función del AJAX
 * 
 */
saveButton.addEventListener("click", function (){

    var nombreNew = document.getElementById("nombre").value;
    var correoNew = document.getElementById("correo").value;
    var aliasNew = document.getElementById("alias").value;

    console.log("hola");

    cambiaCredenciales(nombreNew, aliasNew, correoNew);

});