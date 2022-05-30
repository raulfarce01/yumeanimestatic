var botonRegistroLista = document.getElementById("botonRegistroLista");
var estadoL = document.getElementById("estadoL");

console.log("fumo?");

/**
 * 
 * Función que manda una orden AJAX a PHP para que mande a la base de datos los datos de la lista a introducir para que la cree
 * @param {*} nombre el nombre de la lista a crear
 * @param {*} idUser el id del usuario al que asignar la lista
 * 
 * En serio, esto es increíble ehhh
 */
function creaLista(nombre, idUser){

    console.log("hola2");

    console.log(nombre);
    console.log(idUser);

    if(nombre == ''){
        estadoL.innerHTML = "Faltan datos";
    }else{

        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onload = function() {
			if (this.responseText.trim() == '') {
				if (this.readyState == 4 && this.status == 200) estadoL.innerHTML = 'Lista Creada.';
			}
			else if (this.readyState == 4 && this.status == 200) estadoL.innerHTML = this.responseText.trim();
		};

        xmlhttp.open("GET","../controller/creaLista.php?idUser="+idUser+"&nombreLista="+nombre,true);
		xmlhttp.send();

    }

}

/**
 * 
 * Pulsas el botón y pasan cosas, lo típico, en este caso recoge el valor de lo inputs y lo manda al AJAX, nada nuevo
 * 
 */
botonRegistroLista.addEventListener("click", function (){

    var nombre = document.getElementById("nombreLista").value;
    var idUser = document.getElementById("idUserInput").value;

    console.log("hola");

    creaLista(nombre, idUser);

});