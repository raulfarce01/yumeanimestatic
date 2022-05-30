
/**
 * 
 * Cuando pulsas la flechita del header de tu perfil cuando has iniciado sesión muestra el cuadro de "mi perfil" desde donde accedes a editar tu perfil y a las listas que todavía no puedes tener
 * 
 */

flechita.addEventListener("click", function (){
    console.log(contenedorPerfil.style.display); 
    console.log("aaaa");
    if(contenedorPerfil.style.display == 'none' || contenedorPerfil.style.display == ''){

        contenedorPerfil.style.display = 'flex';

        console.log("holaFlecha");
    }else if(contenedorPerfil.style.display == 'flex'){

        contenedorPerfil.style.display='none';
        console.log("adiosFlecha");
    }
});