
/**
 * 
 * Tos estos console.logs son porque me estaba dando un por culo tremendo, hasta que me di cuenta de que no podía acceder a cosas de PHP desde JS, a no ser que use Node, pero no me da tiempo en dos semanas a aprender Node, así que de momento esta funcionalidad queda inactiva
 * 
 */

console.log("1"+botonRegistroLista);
console.log("2"+detallesLista);
console.log("4"+crearLista);
console.log("6"+addAnimeLista);
console.log("3"+masButtonLista);
console.log("5"+contenedorListas);

/**
 * 
 * Esto es porque cuando en estilo pongo el display en "none" javascript parece que no sabe leer esa palabra y me dice que es nulo, así que se lo explico personalmente pa que lo entienda
 * https://pbs.twimg.com/media/BNNH8gSCAAAC5Tc.jpg
 * 
 */
if(contenedorListas.style.display = ''){
    contenedorListas.style.display = 'none';
}

/**
 * 
 * Abre el contenedor que almacena las listas al pulsar el boton de añadir anime a una lista
 * 
 */
addAnimeLista.addEventListener("click", function(){
    console.log(contenedorListas.style.display);
    contenedorListas.style.display = 'flex';
});

/**
 * 
 * Abre el contenedor para crear una lista si se pulsa en crear lista
 * 
 */
botonRegistroLista.addEventListener("click", function (){
        crearLista.style.display = 'none';
        contenedorListas.style.display = 'flex';
});

/**
 * Muestra más listas en el contenedor
 */
masButtonLista.addEventListener("click", function(){
        crearLista.style.display = "flex";
        contenedorListas.style.display = 'none';
});
