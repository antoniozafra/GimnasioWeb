
/*AUTOR: ANTONIO JESUS ZAFRA ARIAS*/
/*PROYECTO FINAL DESARROLLO DE APLICACIONES WEB*/
/*CREACION DE TABLAS*/

/*CREAMOS LA BASE DE DATOS  GIMNASIO*/
create DATABASE IF NOT EXISTS gimnasio;

/*USAMOS LA BASE DE DATOS GIMNASIO*/
use gimnasio;

/*CREAMOS LA TABLA USUARIO*/
CREATE TABLE if not exists Usuario(
    Id_Usuario INT   NOT NULL AUTO_INCREMENT,
    Nombre varchar(50) NOT NULL,
    Apellidos varchar(50) NOT NULL,
    Altura SMALLINT NOT NULL,
    Peso SMALLINT NOT NULL,
    Sexo VARCHAR(7),
    Edad SMALLINT NOT NULL,
    Fecha_Nacimiento DATE NOT NULL,
    Usuario varchar(20) NOT NULL,
    Contrasenia varchar(20)NOT NULL,
    
    /*AÑADIMOS LA CLAVE PRIMARIA*/
    PRIMARY KEY(Id_Usuario)
    
);


use gimnasio;

/*CREAMOS LA TABLA EJERCICIO*/
CREATE TABLE Ejercicio(
    Id_Ejercicio INT  NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Nombre varchar(100) NOT NULL,
    Zona_Muscular varchar(50) NOT NULL,
    Pasos varchar(2000),
    Nivel_Dificultad varchar(50) NOT NULL,
    Imagen varchar(100) NOT NULL
    
   

);



use gimnasio;

/*CREAMOS LA TABLA RUTINA*/
CREATE TABLE Rutina(
    Id_Rutina INT  NOT NULL AUTO_INCREMENT,
    Id_Usuario int NOT NULL ,
    Anotaciones varchar(250),
    
    /*AÑADIMOS LA CLAVE PRIMARIA*/
    PRIMARY KEY(Id_Rutina),
    
    /*AÑADIMOS LAS CLAVES FORANEAS*/
    
    
    FOREIGN KEY(Id_Usuario) REFERENCES
    Usuario(Id_Usuario)
    ON DELETE CASCADE  
    ON UPDATE CASCADE
    

);



use gimnasio;

/*CREAMOS LA TABLA RECETA*/
CREATE TABLE Receta(
    Id_Receta INT NOT NULL AUTO_INCREMENT,
    Nombre varchar(50) NOT NULL,
    Tipo varchar(25) NOT NULL,
    Ingredientes varchar(500) NOT NULL,
    Pasos varchar(1000) NOT NULL,
    Tiempo_estimado SMALLINT NOT NULL,
    Nivel_Dificultad VARCHAR(50) NOT NULL,
    Imagen varchar(100) NOT NULL,
    
    /*AÑADIMOS LA CLAVE PRIMARIA*/
    PRIMARY KEY(Id_Receta)
);


use gimnasio;

/*CREAMOS LA TABLA DIETA*/
CREATE TABLE Dieta(
    Id_Dieta int NOT NULL UNIQUE AUTO_INCREMENT,
    Id_Usuario int NOT NULL,
    Descripcion varchar(1000) NOT NULL,
    
    /*AÑADIMOS LA CLAVE PRIMARIA*/
    PRIMARY KEY(Id_Dieta),
    FOREIGN KEY(Id_Usuario) REFERENCES Usuario(Id_Usuario)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);


/*CREAMOS LA TABLA ADMINISTRADOR*/
CREATE TABLE Administrador(
    Id_Administrador int NOT NULL auto_increment PRIMARY KEY,
    Usuario varchar(20),
    Contrasenia varchar(20)
    
    
    
);

/*INTRODUCIMOS DATOS DENTRO DE LA TABLA EJERCICIO*/
Insert into Ejercicio(Nombre,Zona_Muscular,Pasos,Nivel_Dificultad,Imagen) 
Values
/*EJERCICIOS PARA LA ESPADA*/

/*EJERCICIO 1*/
("Dominadas","Espalda","1ºAgarra la barra con las palmas en posicion pronadora <br><br>2º Baja hasta lograr tener extendidos los brazos completamente <br><br>3º: Retrae bien las escapulas y sube hasta encima de la barbilla","Difícil","media/imagenes/dominadas.png"),

/*EJERCICIO 2*/
("Remo con mancuernas","Espalda","1º: Comienza tomando una mancuerna con una mano y apoyando la rodilla y la palma de la mano del lado opuesto sobre un banco plano<br><br> 2º: Desde esta posición inicial y conservando la espalda fija, debemos inspirar y tirar de la mancuerna para elevarla hacia la espalda mientras el brazo permanece paralelo al cuerpo, llevando el codo bien atrás para imitar el gesto de remo.<br><br> 3º:Espiramos al final del movimiento mientras descendemos nuevamente el peso, de manera lenta. ","Medio","media/imagenes/remo_con_mancuernas.jpg"),


/*EJERCICIO 3*/
("Peso Muerto","Espalda","1º: Colócate en pie con las rodillas separadas a la anchura de los hombros <br><br> 2º: Flexiona las rodillas manteniendo la espalda totalmente recta <br><br>3º Empieza  a descender utilizando las caderas, intentando que los muslos queden paralelos al suelo","Medio","media/imagenes/peso_muerto.jpg"),


/*EJERCICIO 4*/
("Jalón al Pecho","Espalda","1º: Agarra la barra y estira la espalda manreniendota perpendicular al asiento<br><br>2º: Contrae los brazos hasta llevar la barra al pecho","Facil","media/imagenes/jalon_al_pecho.jpg"),


/*EJERCICIO 5*/
("Remo Horizonal en Polea","Espalda","1º:Para realizar correctamente un remo en polea baja debemos permanecer con la columna extendida en todo momento, sin dejar que la polea arrastre nuestros hombros hacia adelante<br><br>2º: Al final de la fase excéntrica podemos dejar que nuestro torso bascule ligeramente hacia adelante para que nuestro dorsal ancho termine por estirarse. De la misma manera, durante la fase concéntrica podemos volver a bascular el torso ligeramente hacia atrás sin que esto se convierta en una excusa para generar inercia.","Facil","media/imagenes/remo_horizontal_polea.jpg"),


/*EJERCICIOS PARA EL PECTORAL*/

/*EJERCICIO 6*/
("Press de banca con bara","Pectoral","1º: Túmbate boca arriba en el banco<br>2º: Separa las manos ligueramente superior a los hombros y sujeta la barra con los brazos totalmente estirados. Esta será la posición inicial<br><br> 3º: Baja la barra con un movimiento controlado ","Medio","media/imagenes/press_banca.jpg"),

/*EJERCICIO 7*/
("Cruces de polea","Pectoral","1º:Comenzamos el ejercicio con los brazos paralelos al suelo <br><br> 2º: Con los puños cerrados y sin flexionar los codos, movilizamos los brazos desde arriba hacia adelante del torso ientras realizamos un cruce de polea","Facil","media/imagenes/cruces_polea.jpg"),

/*EJERCICIO8*/
("Flexiones","Pectoral","1º: Acuéstese boca abajo<br><br> 2º: Coloque las palmas de las manos en el suelo a la altura de los hombros, ligueramente más ancho que los hombros<br><br>3º: Mantenga su cuerpo ergido <br><br> 4º: Levanta el cuerpo hacia arriba enderezando los brazos, procure mantener una postura del cuerpo erguida","Dificil","media/imagenes/flexion.jpg"),

/*EJERCICIOS PARA HOMBROS*/

/*EJERCICIO 9*/
("Press de Hombros sentado","Hombros","1º: Llevaremos la mancuerna o la barra a la altura de los hombre por los laterales del cuerpo mientras flexionamos los codos y las palmas miran hacia delante<br><br>2º: Luego inspirimamos y elevamos hasta estirar los brazos en vertical completamente","Facil","media/imagenes/press_hombro.jpg"),

/*EJERCICIO 10*/
("Elevaciones Laterales","Hombros","1º: Ponte de pie con los pies separados a la distancia de los hombros, agarra un par de mancuernas con las manos hacia dentro, y colgando de los costados<br><br>2º: Levanta los brazos hacia los costados hasta tenerlos a la altura de los hombros<br><br>3º:  Haz una pausa y regresa a la posición inicial","Medio","media/imagenes/elevaciones_laterales.jpg"),

/*EJERCICIOS PARA BICEPS*/
/*EJERCICIO 11*/
("Curl de biceps","Biceps","1º: Agarra las mancuernas y extiende totalamente tus brazos<br><br> 2º: Sube ambos brazos flexionandolos intentando llegar casi a la altura de los hombros y vuelve a bajar desflexionando <br><br> 3º:Intenta permanecer con la espalda ergida, los hobros relajados y realizando un movimiento lentamente ","Facil","media/imagenes/curl_biceps.jpg"),

/*EJERCICIO12*/
("Curl polea de pie","Biceps","1º: Enganche un accesorio a la polea en la posición mas baja, agarre la barra con agarre supino , los brazos totalmente extendidos y palmas hacia afuera<br><br> 2º: Sin mover la parte superior de los brazos, flexione los cosos y llebe la barra tan cerca de los hombros como le sea posible<br><br>3º: Haga una pausa y luego baje a la posición inicial","Facil","media/imagenes/curl_polea_de_pie.jpg"),

/*EJERCICIOS PARA TRICEPS*/

/*EJERCICIO 13*/
("Press Francés","Triceps","1º: Apoyamos la espalda sobre un banco plano y tomamos con las manos un barra, las palmas deben de ir hacia arriba mientas los brazos están flexionados y la barra queda atrás del cuerpo<br><br> 2º: Extendemos los brazosen forma perpendicular respecto al cuerpo, cuidando no separar los codos del cuerpo durante el recorrido","Medio","media/imagenes/press_frances.jpg"),

/*EJERCICIO 14*/
("Fondos en paralelas","Triceps","1º: Llveamos los hombros hacia atrás y hacia abajo, aprentando las escáppulas y bloqueando totalmente<br><br>2º: Sacamos pecho y comenzamos a bajar hasta que nuestros codos formen un ángulo de 90º<br><br>3º: Subimos lentamente hasta regresar a la posicion inicial","Dificil","media/imagenes/fondos.jpg"),

/*EJERCICIO 15*/
("Jalón de triceps","Triceps","1º: Separa las piernas tanto como el ancho de las caderas<br><br>2º: Agarra una barra recta por encima, con las manos separadas en paralelo a los hombros<br><br>3º: Sin doblar la espalda, junta los brazos a los costados del cuerpo, con los codos flexionados y orientados haca atrás<br><br>4º: Tira de la barra hacia abajo lentamente hasta  que los brazos queden rectos y la barra llegue a los muslos<br><br>5º: Haz una pausa y luego deja que la barra suba despacio hasta la posicion de partida","Medio","media/imagenes/jalon_triceps.jpg"),

/*EJERCICIOS PARA LAS PIERNAS*/

/*EJERCICIO 16*/
("Sentadillas","Piernas","1º: Abre  tus piernas hasta el ancho de tus hombros<br><br> 2º: Junta tus manos o estira tus brazos en un ángulo de 90º<br><br>3º: Haz como si fueras a sentarte en una silla imaginaria y repite el movimiento","Facil","media/imagenes/sentadilla.jpg"),


/*EJERCICIO 17*/
("Prensa","Piernas","1º: Apoya completamente la espalda en la maquina y relaja el cuello<br><br>2º: Flexiona controladamente y con cuidado las piernas, pero nunca pasar de un ángulo de 90 º<br><br>3ºEvita los movientos bruscos y repite el ejercicio","Facil","media/imagenes/prensa_piernas.jpg"),

/*EJERCICIO 18*/
("Peso Muerto Rumano","Piernas","1º:Mantén la cabeza relajada, pecho arriba y justo al comienzo del movimiento , las rodillas a 15º-20º de flexión<br><br>2º: El movimiento comienza empujando las caderas hacia atrás a medida que la barra desciende por nuestros muslos hasta debajo de tus rótulas aproximadamente ","Medio","media/imagenes/peso_muerto_rumano.jpg"),

/*EJERCICIO 19*/
("Curl Femoral Tumbado","Piernas","1º: Separa los pies a la misma distancia que tus hombros<br><br>2º: Flexiona ligeramente las rodillas<br><br>3º: Con los abdominales apretados y la espalda en una posición neutral, procede a coger  el peso desplazando la cadera  hacia atrás mientras continuas con las rodillas ligeramente fleixionada","Facil","media/imagenes/curl_femoral_tumbado.jpg"),

/*EJERCICIO 20*/
("Zancadas","Piernas","1º: La pierna delantera tiene que mantener un ángulo de 90º<br><br>2º: La rodilla trasera deebe de estar a unos centrímetros del suelo, pero nunca el punto de apoyo<br><br>3º: Vuelve, con un impulso, a la misma posición","Medio","media/imagenes/zancadas.jpg"),

/*EJERCICIO 21*/
("Elevaciones de Gemelo","Piernas","1º: Ponte de pie con las piernas separadas a la distancia de los hombros y los dedos de los pies junto al borde de una caja o un step, y los talones y parte central de los pies colgando del borde de manera que notes un estiramiento de los gemelos<br><br>2º: Empuja con los dedos de los pies para levantar los talones, haz una pausa, y luego baja hasta la posición inicial, asegurándote de que notas un estiramiento de los gemelos.","Fácil","media/imagenes/elevacion_gemelos.jpg"),

/*EJERCICIOS PARA EL ABDOMEN*/


/*EJERCICIO 22*/
("Encogimientos de polea","Abdominales","1º: Arrodillarse debajo de la polea que tiene una cuerpa en la que te sostendrás<br><br> 2º:Sujétate con las dos manos de la cuerda hasta que las manos se encuentren al frente de tu cara <br><br>3º: Flexionar la cintura mientras contraes los músculos del abdomen.","Dificil","media/imagenes/encogimientos_polea.jpg"),


/*EJERCICIO 23*/
("Elevacion de piernas colgado","Abdominales","1º: Nos sostenemos de una barra horizontal a fin de que quedemos suspendidos, sin que los pies toquen el suelo<br><br> 2º: Una vez en posición con los brazos completamente extendidos, arqueamos ligeramente la columna lumbar a su punto neutro para acentuar la curva natural de la espalda<br><br> 3º: Inhalamos y mientras contenemos la respiración elevamos las piernas lo más alto posible sin doblar las rodillas<br><br>4º:Para que este ejercicio sea realmente eficaz, las piernas deben elevarse por encima de la horizontal y manteniendo una posición de contracción durante 1 o 2 segundos para asegurarnos de que el acortamiento y la tensión de los músculos abdominales estén es sus valores máximos<br><br>5º:Exhalamos y liberamos el aire a medida que vamos llevando las piernas a la posición inicial. Hacemos una micropausa y volvemos a intentarlo.
  ","","media/imagenes/elevacion_piernas.jpg"),
  
/*EJERCICIO 24*/
("Encogimientos","Abdominales","1º:Apoya la espalda contra el suelo, dobla las rodillas y apoya los pies sobre el suelo.<br><br> 2º:Coloca las manos detrás de la cabeza mientras diriges la mirada hacia el techo.<br><br> 3º:Mientras te elevas, redondea la parte superior de la espalda","Medio","media/imagenes/encogimientos.jpg"),


/*EJERCICIOS PARA EL TRAPECIO*/


/*EJERCICIO 25 */
("Encogimientos con mancuerna","Trapecio","1º Agarra unas mancuerna y deja los brazos totalmente estirados <br><br> 2º: Eleva los hombros con los brazos y la espalda totalmente rectos <br>v 3º: Mantén la posición y vuelve a bajar","Fácil","media/imagenes/encogimientos_trapecio.jpg"),

/*EJERCICIO 26*/
("Remo al cuello","Trapecio","1º: Con la barra cogida, relajamos los brazos y dejamos que el peso se apoye en los muslos para inspirar y comenzar el movimiento<br><br> 2º: Tiramos de la barra hacia el mentón mientras los codos se flexionan y pasan por los lados de la cabeza<br><br> 3º: Espiramos mientras descendemos la barra de manera controlada, evitando impulsos","Medio","media/imagenes/remo_al_cuello.jpg"),

/*EJERCICIOS PARA EL ANTEBRAZO*/

/*EJERCICIO 27*/
("Curl de muñeueca","Antebrazo","1º: Agarra una barra y coloca los codos sobre el banco dejando tus muñecas fuera <br><br> 2º: Controladamente, rota las muñecas hasta que sientas tensión en el antebrazo y mantén la posición<br><br> 3º:Sube las muñecas hasta que queden rectas","Facil","media/imagenes/curl_antebrazos.jpg");

/*FIN INTRODUCCION DATOS DE EJERCICIOS*/


/*ELIMINAMOS POSIBLES VALORES DUPLICADOS EN LA TABLA EJERCICIOS*/
ALTER IGNORE TABLE Ejercicio ADD UNIQUE INDEX(Nombre,Zona_Muscular,Pasos,Nivel_Dificultad,Imagen);








































