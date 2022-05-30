# Documentación para la creación de noticias

La funcionalidad de subir noticias desde la web todavía no está disponible, por lo que procederé a explicar cómo se crean desde la base de datos.

### Introducción

Lo primero es sabes que en la base de datos la noticia se compone de *párrafos* e *imágenes*, de tal manera que para ver una noticia necesitamos sus párrafos y sus imágenes.

### Creación de Registros

Lo primero es crear la *cabecera de la noticia*:

```
INSERT INTO noticia(titulo, idUser) VALUES ('value1', value2)
```

- value1: Es una cadena de caracteres, por lo que deberá entrecomillarse, que contiene el título de la noticia, aparecerá en la cabecera

- value2: Es un número entero que contiene el ID del usuario que ha escrito la noticia, es decir, el autor.

Una vez ya tenemos la noticia creada, vamos a crear el *contenido*:

```
INSERT INTO parrafo(contenido, idNoticia) VALUES ("value1", value2)
```

- value1: Es una cadena de caracteres, por lo que deberá entrecomillarse, que contiene el contenido del párrafo de la noticia, es decir, la información.

- value2: Es un número entero que contiene la noticia a la que se encuentra asignado el párrafo.

Al tener ya los párrafos (podemos crear cuantos queramos), *vamos a subir las imágenes*, algo más complicado y por lo que no he decidido crear una sección para subirlas desde la página, porque no sabía como dividir los párrafos y las imágenes y que PHP supiera qué es cada cosa y cuando cortarla y empezar el siguiente registro:

1. Necesitaremos PHP en nuestro ordenador, da igual si nos conectamos por APACHE o por el PHP Server de VSCode.
2. Abrimos el fichero que se encuentra dentro de app, la carpeta que está en subidaImagenesDB en este mismo nivel subeImagen.php.
3. En la variable $insert tenemos una consulta de inserción de datos, ahí solo debemos cambiar el número que hay por el ID de la noticia a la que queremos asignar la imagen.
4. Procedemos a abrir el fichero formImagen.php que se encuentra dentro de subidaImagenesBD y lo ejecutamos en el navegador.
5. Subimos la imagen al formulario y lo enviamos

Con esto ya tendríamos la noticia creada con todos sus registros. Ahora *lo más importante*:

# PONME UN 10, TE QUIERO MUCHO, QUIEN QUIERA QUE ESTÉ LEYENDO ESTO