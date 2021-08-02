<!--AUTOR: ANTONIO JESUS ZAFRA ARIAS -->
<!--PROYECTO FINAL DESARROLLO DE APLICACIONES WEB -->
<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--ICONO DE LA WEB -->
    <link rel="icon" type="image/png" href="media/imagenes/logo.png">


    <title>Inicio - COCOSPORT</title>
    <!--HOJA DE ESTILOS -->
    <link rel="stylesheet" href="estilos/estilos.css">

    <!--FUNCIONES JS -->
    <script type="text/javascript" src="funciones/funciones.js"></script>

    <!--FUENTES DE GOOGLE -->
    <!--FUENTE PIZARELLA -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Piazzolla:wght@100&display=swap');

    </style>
    
    
</head>

<body>
    <!--CONTENEDOR PRINCIPAL -->
    <div id="contenedor_principal">

        <!--MENU PRINCIPAL DE NAVEGACION -->
        <div id="menu" >
            <nav>
                <li>
                    <!--LOGO DEL MENU -->
                    <a href="index.php"><img src="media/imagenes/logo.png"></a>
                    <a href="index.php" class="activo">Inicio</a>
                    <a href="servicios.html">Servicios</a>
                    <a href="cliente.php">Clientes</a>
                    <a href="consultar_ejercicios.php">Consultar Ejercicios</a>
                    <a class="texto_derecha" href="contacto.html">Contacto</a>
                    <!--<p id="texto_logo">COCO-SPORT</p>-->

                </li>
            </nav>
            

        </div>

        <!--FORMULARIO PRINCIPAL DE INSCRIPCION -->
        <article class="animated  zoomIn delay-0s">
            <div id="formulario_ins" class="animated bounceInUp delay-0s">
                <form id="registro_usuario" action="index.php" method="post">
                    <!--NOMBRE Y APELLIDOS -->
                    <div id="nombre_apellidos">
                        <!--NOMBRE DEL USUARIO -->
                        <input  id="nombre" name="nombre" type="text" maxlength="50" placeholder="Nombre*" required >
                        <input id="apellidos" name="apellidos" type="text" placeholder="Apellidos*" maxlength="50" required>

                    </div>

                    <!--ALTURA Y PESO -->
                    <div id="altura_peso">
                        <input id="altura" name="altura" type="number" placeholder="Altura*" min="100" max="300" required>
                        <input id="peso" name="peso" type="number" placeholder="Peso*" min="40" max="500" required>
                    </div>

                    <!--SEXO Y EDAD -->
                    <div id="sexo_edad">
                        <select id="sexo" name="sexo" required>Sexo: *
                            <option id="hombre">Hombre</option>
                            <option id="mujer">Mujer</option>
                        </select>
                        <input id="edad" name="edad" type="number" placeholder="Edad*">
                    </div>


                    <!--FECHA DE NACIMIENTO -->
                    <div id="fecha_nacimiento">
                        <input id="fecha_nac" name="fecha_nacimiento" type="date" max="2000-01-01" required>*
                    </div>
                    <!--LETRA PEQUEÑA DE AVISO -->
                    <div id="letra_p">
                        <small>Los campos con (*) deben ser rellenados obligatoriamente </small>

                    </div>


                    <div id="envio_datos">
                        <!--USUARIO Y CONTRASEÑA -->
                        <div id="usuario_contrasena">
                            <input type="text" id="usuario" name="usuario" placeholder="Usuario*" required maxlength="20">
                            <input type="password" id="contrasenia" name="contrasenia" placeholder="Contraseña*" maxlength="20" minlength="4" required>
                        </div>

                        <!--BOTON PARA ENVIAR LOS DATOS DEL FORMULARIO -->
                        <div id="boton_datos">
                            <input type="submit" id="registrar_usuario" value="REGISTRAR USUARIO">

                        </div>

                    </div>
                </form>
            </div>
        </article>



        <!-- UNETE A NOSOTROS-->
        <article>
            <div id="unete" class="animated bounceInDown delay-0s">
                <h1><span class="letra_roja">Ú</span>NETE A <span class="letra_roja">N</span>UESTRO <span class="letra_roja">E</span>QUIPO</h1>

                <!--TABLA CON INFORMACION-->
                <div id="tabla_informacion_unete">
                    <p id="parrafo_unete"><span class="palabra_boton">REGÍSTRATE</span> y comienza a disfrutar de las ventajas de ser cliente:</p>

                    <!--LISTA DE VENTAJAS -->
                    <div id="lista_ventajas" class="texto_informacion">
                        <div id="text_lista_ventajas">
                            <p style="margin-top: 0.15em; margin-bottom: 0px;">Asesorado por los mejores profesionales </p>
                            <p style="margin-top: 0.15em;margin-bottom: 0px;">Sin cuota de matrícula</p>
                            <p style="margin-top: 0.15em;margin-bottom: 0px;">Adaptado a todas las edades</p>
                        </div>

                    </div>
                </div>

            </div>

        </article>


    </div>


    <!--PIE DE PAGINA -->
    <footer>
        <div id="pie" >
            <p>Copyright © 2020 <a href="https://www.orobcode.com">Orob Code</a> | Creado por Antonio Zafra</p>
        </div>
       

    </footer>

</body>

</html>



<!--INTRODUCCION DE LOS DATOS DE REGISTRO DE USUARIO EN LA BASE DE DATOS -->
<?php
                //GUARDAMOS EN LA VARIABLE LA CONEXION A LA BASE DE DATOS
                $c=mysqli_connect("localhost","root","");

                //ANTES DE REGISTRAR AL USUARIO, COMENZAMOS A CREAR LA BASE DE DATOS
                crearbd($c);
                

                /*EJECUTAMOS LA FUNCION REGISTRAR_USUARIO*/
                registrar_usuario();
        

                //GUARDAMOS EN UNA VARIABLE EN NUMERO DE ELEMENTOS      QUE TIENE LA TABLA
                $consulta="SELECT count(id_ejercicio) FROM ejercicio LIMIT 1";
                $consulta2="SELECT count(id_receta) FROM RECETA LIMIT 1";

                $resultado = mysqli_query($c,$consulta);
                $resultado2 = mysqli_query($c,$consulta2);

                $resultado_numero = mysqli_fetch_row($resultado);
                $resultado_numero2 = mysqli_fetch_row($resultado2);


                // SI LA TABLA TIENE DATOS, NO VOLVEMOS A INTRODUCIR MAS
                if( $resultado_numero2[0] >0){
                    exit();                
                }

                    //YA SABEMOS QUE ESTA VACIA, PROCEDEMOS A LA INSERCION DE DATOS
                else{
                    insertardatos($c);

                    
                }
        

                
                //fUNCION REGISTRAR USUARIO
                function registrar_usuario(){
                    
                //RECOGEMOS TODAS LAS VARIABLES INTRODUCIDAS EN EL FORMULARIO    
                @$nombre = $_POST["nombre"];
                @$apellidos = $_POST["apellidos"];
                @$altura = $_POST["altura"];
                @$peso = $_POST["peso"];
                @$sexo = $_POST["sexo"];
                @$edad = $_POST["edad"];
                @$fecha_nacimiento = $_POST["fecha_nacimiento"];
                @$usuario = $_POST["usuario"];
                @$contrasenia = $_POST["contrasenia"];
                    
               //CONECTAMOS CON LA BASE DE DATOS
                $mysql_server="localhost";
                $mysql_login="root";
                $mysql_pass="";
                $c=mysqli_connect($mysql_server,$mysql_login,$mysql_pass);

                    
                //COMPROBAMOS CON UN CONDICIONAL QUE LA CONEXION A SIDO CORRECTA
                if(mysqli_connect($mysql_server,$mysql_login,$mysql_pass)){
                    //CONEXION CORRECTA
                    
                    //COMPROBAMOS QUE NINGUNO DE LOS CAMPOS ESTE VACIO ANTES DE INSERTARLO EN LA BASE DE DATOS
                    if(empty($nombre) or empty($apellidos) or empty($altura) or empty($peso) or empty($sexo) or empty($edad) or empty($fecha_nacimiento) or empty($usuario) or empty($contrasenia)){
                        //SI ALGUNO DE LOS CAMPOS ESTA VACIO, MOSTRAMOS MENSAJE DE ERROS Y SALIMOS
                        
                        exit();
                    }
                    //FIN IF COMPROBAR VARIABLES VACIAS

                    else{
                       //AQUI EL FORMULARIO ESTA RELLENADO CORRECTAMENTE 
                        
                    
                    //GUARDAMOS LA CONSULTA EN UNA VARIABLE
                    $consulta= "select COUNT(Usuario) from Usuario where usuario= '$usuario'";
                    
                    //USAMOS LA BASE DE DATOS GIMNASIO
                    mysqli_query($c,"use gimnasio");
                    
                    //GUARDAMOS EN LA VARIABLE RESULTADO, EL VALOR DE LA CONSULTA
                    $resultado=mysqli_query($c,$consulta);
                    
                    //GUARDAMOS EL RESULTADO DE LA CONSULTA EN OTRA VARIABLE,(LA CONVIERTE EN UN ARRAY, POR ESO LE INDICAREMOS LA POSICION CUANDO QUERAMOS MOSTRAR LA INFORMACION)
                    $numero_usuarios = mysqli_fetch_row($resultado);
                                                
                
                    //COMPROBAMOS QUE EL USUARIO QUE SE QUIERE CREAR NO ESTA YA CREADO
                   if($numero_usuarios[0]>0){
                       //MOSTRAMOS MENSAJE DE ERROR AL USUARIO, Y SALIMOS
                       echo "<h1 id='error_cuestionario'>EL USUARIO YA EXISTE, INTENTELO DE  NUEVO</h1>";
                       exit();
                    }
                    //FIN IF USUARIO REPETIDO
                   
                      
                    
                    //GUARDAMOS EN UNA VARIABLE EL VALOR DE LA CONSULTA
                    $consulta="Insert into Usuario (Nombre,Apellidos,Altura,Peso,Sexo,Edad,Fecha_Nacimiento,Usuario,Contrasenia) VALUES('".$nombre."','".$apellidos."','".$altura."','".$peso."','".$sexo."','".$edad."','".$fecha_nacimiento."','".$usuario."','".$contrasenia."')";
                    
                    //USAMOS LA BASE DE DATOS GIMNASIO
					mysqli_query($c,"use gimnasio");
                     
                    //EJECUTAMOS LA CONSULTA CREADA ANTERIORMENTE PARA INTRODUCIR LOS DATOS DEL USUSARIO EN LA BASE DE DATOS 
                    //COMPROBAMOS CON UN CONDICIONAL QUE LA CONSULTA SE HA EJECUTADO CORRECTAMENTE
                    if (mysqli_query($c, $consulta)){
                        //MOSTRAMOS MENSAJE SATISFACTORIO
                        echo "<h1 id='correcto'>USUARIO REGISTRADO CORRECTAMENTE</h1>";
                    }
                    //FIN IF INSERTAR USUARIO
                    else{
                        //MOSTRAMOS MENSAJE DE ERROR
                        echo "<h1 id='error_cuestionario'>ERROR AL REGISTRAR USUARIO</h1>";
                        exit();
                    }
                    //FIN ELSE
                
                    
                }
                }
                //fin if conexion correcta    
                
            
	           else{
                   //MOSTRAMOS MENSAJE DE ERROS AL USUARIO
		          echo "<h1 id='error_cuestionario'>NO HA PODIDO REALIZARSE LA CONEXION A LA BASE DE DATOS</h1>";
		      exit();
                }
                //FIN ELSE CONEXION    
                    
                
                }
                //FIN FUNCION REGISTRAR USUARIO
                
                
                //FUNCION CREAR BASE DE DATOS
                function crearbd($c){
                    $temp="";
                    //RUTA DEL FICHERO QUE CONTIENE LA CREACION DE TABLAS
                    $ruta_fichero_sql = 'mysql_script/tablas.sql';
                        
                    
                    //CON EL COMANDO FILE,VOLCAMOS  EL CONTENIDO DEL FICHERO EN OTRA VARIABLE
                    $datos_fichero_sql = file($ruta_fichero_sql);
                    //LEEMOS EL FICHERO CON UN BUCLE FOREACH
                    foreach($datos_fichero_sql as $linea_a_ejecutar){
                    //QUITAMOS LOS ESPACIOS DE ALANTE Y DETRÁS DE LA VARIABLE
                    $linea_a_ejecutar = trim($linea_a_ejecutar);      
                        
                    //GUARDAMOS EN LA VARIABLE TEMP EL BLOQUE DE SENTENCIAS QUE VAMOS A EJECUTAR EN MYSQL
                    $temp .= $linea_a_ejecutar." ";
                    //COMPROBAMOS CON UN CONDICIONAL QUE LA LINEA ACABA EN ;, Y SI ES ASI LA EJECUTAMOS
                        if(substr($linea_a_ejecutar, -1, 1) == ';'){
                            mysqli_query($c,$temp);
                            
                            //REINICIAMOS LA VARIABLE TEMPORAL
                            $temp="";
                                
                            }//FIN IF BUSCAR SENTENCIA ACABADA EN ;
                        else{
                            //echo"MAL".$temp."<br><br>";
                        }
                            
                        }//FIN FOREACH
                        
                
                }
                //FIN FUNCION CREAR BD



                function insertardatos($c){
                    $temp="";
                    //RUTA DEL FICHERO QUE CONTIENE LA CREACION DE TABLAS
                    $ruta_fichero_sql = 'mysql_script/datos.sql';
                        
                    
                    //CON EL COMANDO FILE,VOLCAMOS  EL CONTENIDO DEL FICHERO EN OTRA VARIABLE
                    $datos_fichero_sql = file($ruta_fichero_sql);
                    //LEEMOS EL FICHERO CON UN BUCLE FOREACH
                    foreach($datos_fichero_sql as $linea_a_ejecutar){
                    //QUITAMOS LOS ESPACIOS DE ALANTE Y DETRÁS DE LA VARIABLE
                    $linea_a_ejecutar = trim($linea_a_ejecutar);      
                        
                    //GUARDAMOS EN LA VARIABLE TEMP EL BLOQUE DE SENTENCIAS QUE VAMOS A EJECUTAR EN MYSQL
                    $temp .= $linea_a_ejecutar." ";
                    //COMPROBAMOS CON UN CONDICIONAL QUE LA LINEA ACABA EN ;, Y SI ES ASI LA EJECUTAMOS
                        if(substr($linea_a_ejecutar, -1, 1) == ';'){
                            mysqli_query($c,$temp);
                            
                            //REINICIAMOS LA VARIABLE TEMPORAL
                            $temp="";
                                
                            }//FIN IF BUSCAR SENTENCIA ACABADA EN ;
                        else{
                            //echo"MAL".$temp."<br><br>";
                        }
                            
                        }//FIN FOREACH
                        
                
                }
                //FIN FUNCION CREAR BD
                
                
                 
                ?>
