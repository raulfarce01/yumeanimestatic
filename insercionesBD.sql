USE yumeanimedb;

INSERT INTO user(nombre, alias, correo, passwd, administrador) VALUES ('arce', 'arce', 'arce', 'arce', 1);
INSERT INTO user(nombre, alias, correo, passwd, administrador) VALUES ('raul', 'raul', 'raul', 'raul', 1);
INSERT INTO user(nombre, alias, correo, passwd, administrador) VALUES ('otro', 'otro', 'otro', 'otro', 0);

INSERT INTO noticia(titulo, idUser) VALUES ('SPY x FAMILY: Yor Forger inspira su primera figura erótica
', 1);
INSERT INTO noticia(titulo, idUser) VALUES ('El anime Isekai Yakkyoku confirma su estreno en julio con un nuevo visual
', 2);
INSERT INTO noticia(titulo, idUser) VALUES ('Gotoubun no Hanayome: Las quintillizas van al cine en una nueva colaboración
', 2);
INSERT INTO noticia(titulo, idUser) VALUES ('Kimetsu no Yaiba: Un par de figuras de dudosa calidad se vuelven virales
', 1);
INSERT INTO noticia(titulo, idUser) VALUES ('SPY x FAMILY: Piden requisitos imposibles para interpretar a Anya Forger en la obra
', 2);
INSERT INTO noticia(titulo, idUser) VALUES ('La versión para Nintendo Switch de Genshin Impact sigue en desarrollo
', 1);
INSERT INTO noticia(titulo, idUser) VALUES ('Boku no Hero Academia tendrá dos nuevos OVAs este verano
', 2);
INSERT INTO noticia(titulo, idUser) VALUES ('Miyuki y Chika rapean en el nuevo ending de Kaguya-sama: Love is War – Ultra Romantic
', 1);

INSERT INTO parrafo(contenido, idNoticia) VALUES ('La fabricante Atlas Studio anunció el lanzamiento de una figura erótica y no oficial a escala 1/6 basada en el personaje Yor Forger de la franquicia de SPY x FAMILY para el cuarto trimestre del año 2022 (Octubre-Diciembre). El producto está disponible a través de distintos distribuidores en todo el mundo, aunque a diferentes precios según la compañía.', 1);
INSERT INTO parrafo(contenido, idNoticia) VALUES ('El producto tiene una altura de aproximadamente 337 mm y se encuentra disponible para reservación a través de distintos distribuidores en todo el mundo, contando con distintos precios que varían de acuerdo con el distribuidor. Por ejemplo, Favor GK lo lista con un precio de 135 dólares estadounidenses. La figura está disponible en dos versiones, una estándar y una deluxe, con la segunda ofreciendo la posibilidad de desnudar al personaje.', 1);
INSERT INTO parrafo(contenido, idNoticia) VALUES ('El personaje es descrito como sigue: «Yor Forger es uno de los tres personajes principales de la serie SPY x FAMILY. Trabaja como empleada en el Ayuntamiento de Berlint, pero en secreto es una hábil asesina que actúa bajo el nombre en clave de Thorn Princess. Yor posee una fuerza y una resistencia impresionantes para su delgado cuerpo, capaz de atravesar fácilmente el cráneo de un humano con sus armas y de destruir una calabaza con el simple empuje de su mano desnuda. Acepta hacerse pasar por la esposa de Loid y la madre de Anya para ayudarle a alcanzar sus objetivos y los suyos propios. A Yor se le da siempre mal la cocina y suele dejarla en manos de Loid. Tiene un hermano menor llamado Yuri, que es funcionario y siente un amor excesivo por ella».', 1);
INSERT INTO parrafo(contenido, idNoticia) VALUES ('En el sitio oficial para la adaptación al anime de las novelas ligeras escritas por Liz Takayama e ilustradas por Keepout, Isekai Yakkyoku (Alternate World Pharmacy), se publicó una nueva imagen promocional del proyecto. El comunicado de prensa confirmó también que el estreno está programado para el próximo mes de julio y que los temas musicales serán los siguientes:', 2);
INSERT INTO parrafo(contenido, idNoticia) VALUES ('Kaori Ishihara interpretará el tema de apertura titulado “Musouteki Chronicle (Dreamlike Chronicle)”, mientras que Little Black Dress interpretará el tema de cierre titulado “Haku’u (Light Rain on a Sunny Day)”.', 2);
INSERT INTO parrafo(contenido, idNoticia) VALUES ('En el sitio oficial para la lotería japonesa DMM SCRATCH se anunció una colaboración con la franquicia multimedia de Gotoubun no Hanayome (The Quintessential Quintuplets), específicamente con la adaptación cinematográfica, que dará inicio el próximo 10 de mayo en distintas tiendas de conveniencia de todo el país.', 3);
INSERT INTO parrafo(contenido, idNoticia) VALUES ('La colaboración se realizará en el periodo comprendido del 10 de mayo al 10 de junio de este año en Japón, y el método de participación consiste en un panel de lotería en el que el cliente rasca una limitada cantidad de casillas para ver qué premio consigue. Todos los productos están basados en ilustraciones completamente nuevas de las Quintillizas Nakano en una ida al cine, e incluyen desde papeles tapiz, stands acrílicos, carpetas plásticas, medallones metálicos, entre otros.', 3);
INSERT INTO parrafo(contenido, idNoticia) VALUES ('Una publicación de venta a través de la plataforma Mercado Libre se volvió tendencia recientemente luego de mostrar un par de figuras de dudosa calidad basadas en los personajes Tanjiro Kamado y Nezuko Kamado de la franquicia de Kimetsu no Yaiba. Las figuras se volvieron tendencia debido a que su diseño difícilmente se parece al personaje original.', 4);
INSERT INTO parrafo(contenido, idNoticia) VALUES ('Con una altura de aproximadamente 280 mm, el set de figuras está disponible a un precio de 394 pesos mexicanos (alrededor de 19 dólares estadounidenses) y ha registrado un total de cinco unidades vendidas al momento de la publicación de este artículo. Según la descripción, el producto es hecho en México e incluye la figura del personaje, dos espadas, la caja transportadora de Nezuko y a la propia Nezuko, quien ha sido esculpida en su tamaño infantil y cuya apariencia es todavía más peculiar que la de Tanjiro.', 4);
INSERT INTO parrafo(contenido, idNoticia) VALUES ('El popular manga escrito e ilustrado por Tatsuya Endo, SPY x FAMILY, está inspirando una adaptación al anime actualmente en emisión, pero también tiene anunciada una adaptación a obra teatral que debutará en la temporada de Primavera-2023 (Abril-Junio). Por supuesto, todo el casting queda en manos del encargado de esa sección, excepto un rol para el cual se realizarán audiciones: Anya Forger. Sin embargo, parece que el sueño de muchas niñas ha quedado enterrado ahora que se han anunciado los requisitos.', 5);
INSERT INTO parrafo(contenido, idNoticia) VALUES ('Comentarios destacados incluyen: «Hasta 90 cm sigue estando en el rango de los bebés»; «Las condiciones son tan absurdas que los fanáticos del manga original no tienen más que ansiedad»; «Solo Nono-chan, la cantante japonesa más joven de la historia, mide esos 90 cm»; «70 cm de altura es una media de unos 6 meses a 1 año, pero me pregunto si pueden encontrar un actor infantil con esto».', 5);
INSERT INTO parrafo(contenido, idNoticia) VALUES ('Han pasado más de dos años desde que miHoYo, ahora conocido como HoYoverse, anunció la versión para Nintendo Switch del videojuego Genshin Impact. Las noticias sobre este port han sido escasas desde entonces, pero la compañía confirmó recientemente que el proyecto sigue en desarrollo. Durante la larga espera de la versión para Nintendo Switch, algunos jugadores empezaron a dudar de la posible finalización del proyecto, y teorizaban que HoYoverse había abandonado el proyecto debido a las limitaciones técnicas de la consola. La compañía, sin embargo, ha hecho un comunicado para asegurar a los jugadores que el proyecto sigue en marcha.', 6);
INSERT INTO parrafo(contenido, idNoticia) VALUES ('«La versión para Nintendo Switch aún está en desarrollo, y publicaremos más información a medida que avancemos», dijo un representante a GoNintendo. No se revelaron más detalles al respecto. Aunque todavía no se conoce la fecha de lanzamiento de la versión para Nintendo Switch, el equipo de Genshin Impact ha sido constante en la actualización del videojuego cada seis semanas (aparte de un paréntesis actualmente inexplicable). Recientemente, HoYoverse presentó la versión 2.6, que introdujo el nuevo personaje Kamisato Ayato y una expansión de Liyue llamada “The Chasm”. La versión 2.6 también profundizó en la historia del Clan Kamisato, una familia muy querida de la tierra de Inazuma en el juego.', 6);
INSERT INTO parrafo(contenido, idNoticia) VALUES ('En la edición más reciente de la revista Weekly Shonen Jump se anunció oficialmente que la franquicia de Boku no Hero Academia (My Hero Academia) tendrá dos nuevos OVAs que debutarán en cines de Japón entre el 16 y el 19 de junio de este año, para después estrenarse en plataformas de streaming durante la temporada de Verano-2022 (Julio-Septiembre).', 7);
INSERT INTO parrafo(contenido, idNoticia) VALUES ('Uno de los OVAs tendrá una historia original centrada en los héroes profesionales amantes del béisbol que forman la Hero League Baseball (HLB). Esta temporada, los “Orcas”, liderados por Gang Orca, y los Lionels, liderados por Shishido, compiten por el primer puesto. Ambos equipos están decididos a ganar, por lo que piden el apoyo de los estudiantes de la Academia U.A. Todos los jugadores pueden utilizar sus habilidades especiales en el próximo partido. Por otra parte, Shueisha revelará más detalles del segundo OVA más adelante.', 7);
INSERT INTO parrafo(contenido, idNoticia) VALUES ('En la cuenta oficial de Twitter para la adaptación al anime del manga Kaguya-sama: Love is War (Kaguya-sama wa Kokurasetai: Tensai-tachi no Renai Zunousen) se compartió la nueva secuencia de cierre utilizada (quizás por única ocasión) en el quinto episodio de la tercera temporada del proyecto, titulada como Kaguya-sama: Love Is War – Ultra Romantic. El video cuenta con el tema “My Nonfiction“, interpretado por Makoto Furukawa y Konomi Kohara, las voces de Miyuki Shirogane y Chika Fujiwara. (El video original está bloqueado fuera de Japón).', 8);
INSERT INTO parrafo(contenido, idNoticia) VALUES ('La cuenta también compartió una variedad de ilustraciones para celebrar la emisión del quinto episodio de esta tercera temporada. La primera, segunda y tercera fueron realizadas por Kii Tanaka, quien se encarga de la dirección de animación del proyecto.', 8);

INSERT INTO userGustaNoticia(idNoticia, idUser) VALUES (2, 1);
INSERT INTO userGustaNoticia(idNoticia, idUser) VALUES (2, 2);
INSERT INTO userGustaNoticia(idNoticia, idUser) VALUES (2, 3);
INSERT INTO userGustaNoticia(idNoticia, idUser) VALUES (8, 1);
INSERT INTO userGustaNoticia(idNoticia, idUser) VALUES (8, 2);
INSERT INTO userGustaNoticia(idNoticia, idUser) VALUES (5, 3);
INSERT INTO userGustaNoticia(idNoticia, idUser) VALUES (6, 1);
INSERT INTO userGustaNoticia(idNoticia, idUser) VALUES (1, 2);
INSERT INTO userGustaNoticia(idNoticia, idUser) VALUES (4, 2);

INSERT INTO lista(nombreL, descL, idUser) VALUES ("Mis Favoritos", "Aquí se encuentran los animes que más me han gustado desde que empecé a visualizar los mismos. Por cierto, el mejor es Zero no Tsukaima, a pesar de ser antiguo me sacó lagrimones a mis 12 añitos cuando me lo vi :)", 1);
INSERT INTO lista(nombreL, descL, idUser) VALUES ("Acción", "AMis animes de acción que más me han gustado y me han hecho vivirlo con intensidad durante la visualizzación", 1);
INSERT INTO lista(nombreL, descL, idUser) VALUES ("Romances", "Los animes de romance que recomiendo, ya sea porque te saquen una lágrima o porque pienses: 'Ojalá mi pareja y yo seamos así en un futuro', algo que nunca va a pasar, por cierto, para que no te ilusiones y te decepciones también, que los cuentos son solo cuentos", 1);
INSERT INTO lista(nombreL, descL, idUser) VALUES ("Misterio", "¿Te gusta el mundo de los detectives? Aquí tienes tu lista con las herramientas necesarias para convertirte en uno :P", 1);
INSERT INTO lista(nombreL, descL, idUser) VALUES ("Actuales", "Si eres más fan de los animes que están en emisión actualmente, esta lista tiene lo necesario para que te sientas completo", 1);
INSERT INTO lista(nombreL, descL, idUser) VALUES ("Lloros, muchos lloros", "Si has venido aquí con ganas de llorar te recomiendo que hables con algún amigo, los animes no curan las penas, pero sí te ayudan a cargarlas, pero si sigues con ganas y piensas que estás estupendo psicológicamente hablando pero se te antoja echar una lagrimilla, bienvenido a casa, hermano <3", 1);
INSERT INTO lista(nombreL, descL, idUser) VALUES ("Don Comedia", "Animes que provocan risas, algunos no tanto, pero te hacen sentir que te lo estás pasando bien, para que los malos días se vuelvan buenos, y los bueno, en mejores", 1);
INSERT INTO lista(nombreL, descL, idUser) VALUES ("Don Comedia para Adultos", "Lo mismo que Don Comedia versión normal, pero con chistes subiditos de tono ;)", 1);

INSERT INTO animeLista(idAnime, idLista) VALUES (101922, 8);
INSERT INTO animeLista(idAnime, idLista) VALUES (21355, 8);
INSERT INTO animeLista(idAnime, idLista) VALUES (1195, 8);

INSERT INTO animeLista(idAnime, idLista) VALUES (21355, 9);
INSERT INTO animeLista(idAnime, idLista) VALUES (101922, 9);
INSERT INTO animeLista(idAnime, idLista) VALUES (140960, 9);

INSERT INTO animeLista(idAnime, idLista) VALUES (1195, 10);
INSERT INTO animeLista(idAnime, idLista) VALUES (20665, 10);
INSERT INTO animeLista(idAnime, idLista) VALUES (100675, 10);
INSERT INTO animeLista(idAnime, idLista) VALUES (101921, 10);
INSERT INTO animeLista(idAnime, idLista) VALUES (108489, 10);

INSERT INTO animeLista(idAnime, idLista) VALUES (21234, 11);
INSERT INTO animeLista(idAnime, idLista) VALUES (101291, 11);

INSERT INTO animeLista(idAnime, idLista) VALUES (141014, 12);
INSERT INTO animeLista(idAnime, idLista) VALUES (142074, 12);
INSERT INTO animeLista(idAnime, idLista) VALUES (127911, 12);
INSERT INTO animeLista(idAnime, idLista) VALUES (140960, 12);

INSERT INTO animeLista(idAnime, idLista) VALUES (20665, 13);
INSERT INTO animeLista(idAnime, idLista) VALUES (5114, 13);
INSERT INTO animeLista(idAnime, idLista) VALUES (129874, 13);
INSERT INTO animeLista(idAnime, idLista) VALUES (2167, 13);

INSERT INTO animeLista(idAnime, idLista) VALUES (101921, 14);
INSERT INTO animeLista(idAnime, idLista) VALUES (108511, 14);
INSERT INTO animeLista(idAnime, idLista) VALUES (124080, 14);

INSERT INTO animeLista(idAnime, idLista) VALUES (100675, 15);
INSERT INTO animeLista(idAnime, idLista) VALUES (102976, 15);
INSERT INTO animeLista(idAnime, idLista) VALUES (21776, 15);