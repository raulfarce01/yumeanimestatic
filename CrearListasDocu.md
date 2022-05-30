# Documentación para la creación de las listas

La funcionalidad de las listas no está añadida porque al ser JS un lenguaje cliente y PHP uno servidor, al no tener conocimientos de nodeJS no puedo interactuar directamente con el otro, y hacer una página específicamente para las listas, me parece antiestético, ya que quiero que mi interfaz sea agradable para los visitantes.

### Introducción

Lo primero que tenemos que saber es que las listas se componen de muchos animes, por lo que los animes tendrán asociados un ID de lista cuando se añadan dentro de la tabla "animeLista"

### Creación de Registros

Lo primero es crear los registros dentro de la tabla *lista* de la siguiente manera:

```
INSERT INTO lista(nombreL, descL, idUser) VALUES ('value1', 'value2', value3)
```

- value1: Es una cadena de caracteres, por lo que deberá entrecomillarse, que contiene el título/nombre que tendrá la lista

- value2: Es una cadena de caracteres, también entrecomillada, que contiene la descripción que le daremos a la lista

- value3: Es un número entero que almacena el ID del usuario que ha creado la lista

De esta manera ya hemos creado la cabecera de la lista, ahora procedemos a meter los animes, y para ello, es más sencillo que las imágenes de las noticias (*IMPORTANTE SABER QUE LA IMAGEN DE LA LISTA SERÁ LA IMAGEN DE PORTADA DEL PRIMER ANIME QUE SE INSERTE*):

_EL ID del anime lo sacaremos de la página, así que va a tocar navegar por la misma hasta encontrarlo. Lo podemos ver en la URL al entrar en su página dedicada_

```
INSERT INTO animeLista(idAnime, idLista) VALUES(value1, value2)
```

- value1: Es un número entero que contiene el ID del anime que vamos a añadir a la lista.

- value2: Es un número entero que contiene el ID de la lista a la que se va a añadir el anime

Y con esto y un bizcocho vamos a lo más importante:

# PONME UN 10 PERSONA QUE ESTÉ LEYENDO ESTO Y A LA QUE QUIERO MUCHO <3