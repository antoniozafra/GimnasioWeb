<!--AUTOR: ANTONIO JESUS ZAFRA ARIAS -->
<!--PROYECTO FINAL DESARROLLO DE APLICACIONES WEB -->
<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zona Cliente</title>

    <!--ICONO DE LA WEB -->
    <link rel="icon" type="image/png" href="media/imagenes/logo.png">

    <!--HOJA DE ESTILOS -->
    <link rel="stylesheet" href="estilos/estilos.css">

    <!--FUNCIONES JS -->
    <script type="text/javascript" src="funciones/funciones.js"></script>
</head>

<body>
    <!--CONTENEDOR PRINCIPAL -->
    <div id="contenedor_principal">

        <!--MENU PRINCIPAL DE NAVEGACION -->
        <div id="menu">
            <nav>
                <li>
                    <a><img src="media/imagenes/logo.png"></a>
                    <a href="index.php" id="roja">Cerrar Sesion</a>
                </li>
            </nav>
        </div>
        <!--ZONA CLIENTES -->
        <h1 class="titulo_paginas">AÑADIR USUARIO</h1>

        <!--FORMULARIO PARA AÑADIR USUARIO-->
        <form id="anadir_rutina_form" action="anadir_usuario.php" method="post" class="animated zoomInUp delay-0s">
            <!--NOMBRE Y APELLIDOS -->
            <div id="nombre_apellidos">
                <!--NOMBRE DEL USUARIO -->
                <input id="nombre" name="nombre" type="text" maxlength="50" placeholder="Nombre*" required autofocus>
                <input id="apellidos" name="apellidos" type="text" placeholder="Apellidos" maxlength="50" required>

            </div>


            <!--ALTURA Y PESO -->
            <div id="altura_peso">
                <input id="altura" name="altura" type="number" placeholder="Altura*" min="100" max="300" required>

                <input id="peso" name="peso" type="number" placeholder="Peso" min="40" max="500" required>
            </div>

            <!--SEXO Y EDAD -->
            <div id="sexo_edad">
                <select id="sexo" name="sexo" required>Sexo:
                    <option id="hombre">Hombre</option>
                    <option id="mujer">Mujer</option>
                </select>

                <input id="edad" name="edad" type="number" placeholder="Edad*" required>
            </div>


            <!--FECHA DE NACIMIENTO -->
            <div id="fecha_nacimiento">
                <input id="fecha_nac" name="fecha_nacimiento" type="date" max="2000-01-01" required>
            </div>

            <div id="envio_datos">
                <!--USUARIO Y CONTRASEÑA -->
                <div id="usuario_contrasena_anadir">
                    <input type="text" id="usuario" name="usuario" placeholder="Usuario*" maxlength="20" required>
                    <input type="password" id="contrasenia" name="contrasenia" placeholder="Contraseña*" maxlength="20" minlength="4" required>
                </div>



            </div>
            <!--BOTÓN PARA ENVIAR LOS DATOS DEL FORMULARIO-->
            <button id="boton_admin" type="submit">AÑADIR USUARIO </button>

            <br>
            <!--BOTÓN ATRÁS-->
            <p id='boton_atras'><a href='maqueta_administrador_registrado.php'>Atrás</a>
            <p></p>

        </form>
        <br><br><br><br><br><br>
    </div>


    <!--PIE DE PAGINA -->
    <footer>
        <div id="pie">
            <p>Copyright © 2020 <a href="https://www.orobcode.com">Orob Code</a> | Creado por Antonio Zafra</p>

        </div>
    </footer>
</body>

</html>

<?php
//RECOGEMOS TODAS LAS VARIABLES INTRODUCIDAS EN EL FORMULARIO    
                @$nombre = $_POST["nombre"];
                /*COMPROBAMOS QUE EL FORMULARIO ESTA VACÍO PARA NO ENVIAR LOS DATOS AL SERVIDOR*/
                if(empty($nombre)){
                    exit();
                    }
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

                }//fin else
                }//fin if conexion correcta    
            
	           else{
                   //MOSTRAMOS MENSAJE DE ERROS AL USUARIO
		          echo "<h1 id='error_cuestionario'>NO HA PODIDO REALIZARSE LA CONEXION A LA BASE DE DATOS</h1>";
		      exit();
                }
                //FIN ELSE CONEXION  
?>
