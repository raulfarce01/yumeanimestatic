/**
 * 
 * ¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡IMPORTANTE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * Qué tal, Manu? Cómo te va la vida?
 * https://depor.com/resizer/gTbWWm0TR67DmjjSR0yOOpuloRU=/1200x1200/smart/filters:format(jpeg):quality(75)/cloudfront-us-east-1.images.arcpublishing.com/elcomercio/OUEPWGHHFBHWDGUQVFI7DU7CPE.jpg
 * 
 */


/**
 * 
 * Aquí se encuentran todas las funciones para abrir los contenedores, vamos a hacer la ruta uno por uno
 * 
 */

/**
 * 
 * Este sirve para que la lupa sirva como submit del formulario para realizar la búsqueda sin tener que pulsar enter siempre (algo ortopédico, pero para gustos los colores, también hay gente a la que le gusta la pizza con piña, qué se le va a hacer, no todos pueden ser tan perfectos como nosotros), además, la lupa queda bonita
 * 
 */
lupaBuscar.addEventListener("click", function (){
    document.getElementById("formBusqueda").submit();
});

/**
 * 
 * Po mira, esto lo que hace es abrir el contenedor del login y cerrar el del registro (si está abierto) cuando pulses el botón login. Fácil o no eh? :v
 * 
 */
try{
botonLoginNav.addEventListener("click", () => {
    if(contenedorLogin.style.display == "none" || contenedorLogin.style.display == ""){

        contenedorLogin.style.display = "flex";

    }else if(contenedorLogin.style.display == "flex"){

        contenedorLogin.style.display = "none";

    }

    if(contenedorRegistro.style.display == "flex"){

        contenedorRegistro.style.display = "none";

    }

    console.log("hola");
    console.log(contenedorLogin.style.display);
    console.log(contenedorRegistro.style.display);
    
});
}catch (error){

    console.log(error);

}
/**
 * 
 * Lo mismo que el de arriba pero para el registro, tú sabe
 * 
 */
try{
botonRegistroNav.addEventListener("click", function (){
    console.log("holaRN");
    if(contenedorRegistro.style.display == "none" || contenedorRegistro.style.display == ""){

        contenedorRegistro.style.display = "flex";

    }else if(contenedorRegistro.style.display == "flex"){

        contenedorRegistro.style.display = "none";

    }

    if(contenedorLogin.style.display == "flex"){

        contenedorLogin.style.display = "none";

    }
});
}catch (error){

    console.log(error);

}

/**
 * Este es exactamente el mismo que el de arriba pero para el botón de registro que hay dentro del formulario de login
 */
try{
botonRegistro.addEventListener("click", function (){
    console.log("holaR");
    if(contenedorRegistro.style.display == "none" || contenedorRegistro.style.display == ""){

        contenedorRegistro.style.display = "flex";

    }else if(contenedorRegistro.style.display == "flex"){

        contenedorRegistro.style.display = "none";

    }

    if(contenedorLogin.style.display == "flex"){

        contenedorLogin.style.display = "none";

    }
});
}catch (error){

    console.log(error);

}

/**
 * 
 * Po este muestra el contenedor del login si pulsas el botón dentro del contenedor de registro
 * 
 */
try{
botonLoginRegistro.addEventListener("click", () => {
    if(contenedorLogin.style.display == "none" || contenedorLogin.style.display == ""){

        contenedorLogin.style.display = "flex";

    }else if(contenedorLogin.style.display == "flex"){

        contenedorLogin.style.display = "none";

    }

    if(contenedorRegistro.style.display == "flex"){

        contenedorRegistro.style.display = "none";

    }

    console.log("hola");
    console.log(contenedorLogin.style.display);
    console.log(contenedorRegistro.style.display);
    
});
}catch (error){

    console.log(error)

}