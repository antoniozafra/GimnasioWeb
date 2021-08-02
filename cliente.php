<!--AUTOR: ANTONIO JESUS ZAFRA ARIAS -->
<!--PROYECTO FINAL DESARROLLO DE APLICACIONES WEB -->
<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8">

<head>

    <!--CREAMOS UNA FUNCION CON LA REDIRECCION A LA PAGINA DEL USUARIO -->
    <script languaje="javascript">
        function sesion_iniciada_usuario() {
            window.location.href = "maqueta_usuario_registrado.php";
        }

    </script>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes- COCOSPORT</title>

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
                    <!--LOGO DEL MENU -->
                    <a href="index.php"><img src="media/imagenes/logo.png"></a>
                    <a href="index.php">Inicio</a>
                    <a href="servicios.html">Servicios</a>
                    <a href="cliente.php" class="activo">Clientes</a>
                    <a href="consultar_ejercicios.php" >Consultar Ejercicios</a>

                    <a class="texto_derecha" href="contacto.html">Contacto</a>
                    <!--<p id="texto_logo">COCO-SPORT</p>-->

                </li>
            </nav>
        </div>

        <!--ÁREA CLIENTES -->
        <h1 class="titulo_paginas"><a>ÁREA CLIENTES</a></h1>


        <!--FORMULARIO PRINCIPAL DE INSCRIPCION -->
        <article>
            <!--INICIO DE SESION, USUARIO NORMAL -->
            <div id="formulario_ins" class="animated  slideInRight delay-0s">

                <!--FORMULARIO PARA INICIAR SESION COMO USUARIO NORMAL-->
                <form method="post" action="cliente.php">
                    <!--NOMBRE DEL USUARIO  -->
                    <input class="inicia_sesion" type="text" name="usuario" placeholder="Usuario:" autofocus>

                    <!--CONTRASEÑA DEL USUARIO -->
                    <input class="inicia_sesion" type="password" name="contrasenia" placeholder="Contraseña:">

                    <!--BOTÓN PARA ENVIAR LOS DATOS DEL FORMULARIO -->
                    <input style="margin-left: 5%;font-size:1.10em;height: 2%" id="iniciar_sesion" type="submit" value="INICIAR SESION">

                </form>


                <?php

                //GUARDAMOS EL NOMBRE DE USUARIO COMO COOKIE, PARA POSTERIORMENTE UTILIZARLA PARA MOSTRAR DATOS RELACCIOJNADOS A EL
                @$cookie_nombre_usuario= "nombre_usuario";
                @$valor = $_POST["usuario"];
                  //INICIAMOS LA SESION
                session_start();
                /*CAMBIAMOS EL VALOR DE LA COOKIE POR EL NOMBRE DE USUARIO QUE HA INTRODUCIDO EN EL FORMULARIO DE INICIO DE SESIÓN*/
                setcookie(@$cookie_nombre_usuario, $valor, time() + (86400 * 30), "/")
                ?>

            </div>
        </article>

        <!--ENLACE PARA INCIO DE SESION DE ADMINISTRADOR -->
        <article class="animated  slideInLeft delay-0s">
            <div id="iniciar_sesion_admin">
                <p>o quizás...</p>

                <!--ENLACE PARA INICIAR SESION COMO ADMINISTRADOR -->
                <a href="iniciar_sesion_admin.php">INICIAR SESION COMO ADMINISTRADOR</a>

            </div>

        </article>

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

//EJECUTAMOS LA FUNCION INICIAR SESION
iniciar_sesion();



//CREAMOS LA FUNCION INCIAR SESION
function iniciar_sesion(){
    /*CONECTAMOS CON LA BASE DE DATOS*/
    $c=mysqli_connect("localhost","root","");


    //CAPTURAMOS LOS VALORES INTRODUCIDOS EN EL FORMULARIO
    @$usuario= $_POST["usuario"];
    /*COMPROBAMOS QUE EL FORMULARIO ESTA VACIO PARA NO ENVIAR LOS DATOS DEL SERVIDOR*/
    if(empty($usuario)){
        exit();
    }
    @$contrasenia= $_POST["contrasenia"];

    //COMPROBAMOS CON UNA VARIABLE QUE LA CONEXION ES CORRECTA
    if ($c){
         //CONEXION CON LA BASE DE DATOS CORRECTA

        //COMPROBAMOS QUE NINGUNO DE LOS CAMPOS ESTA VACIO
           if(empty($usuario) or empty($contrasenia)){

        echo "<p id='error_cuestionario' class'animated backInDown

        '>POR FAVOR, RELLENE EL CUESTIONARIO CORRECTAMENTE</p>";
                        exit();
        }//FIN IF COMPROBAR VARIABLES VACIAS
        else{
            //PROCEDEMOS A COMPROBAR SI EL USUARIO ESTA REGISTRADO..

            //GUARDAMOS LA CONSULTA QUE VAMOS A REALIZAR
            $consulta = "select count(usuario) from usuario
            where binary usuario=  '$usuario' and contrasenia =  '$contrasenia'";

            //USAMOS LA BASE DE DATOS GIMNASIO
            mysqli_query($c, "use gimnasio");


            //GUARDAMOS EL RESULTADO DE LA CONSULTA EN UNA VARIABLE
            $resultado = mysqli_query($c,$consulta);

            //APLICAMOS LA FUNCION MYSQLI_FETCH_ROW(), ESTO CONVERTIRA EL RESULTADO DE LA VARIABLE ANTERIOR EN UNA CONSULTA
             $numero_usuarios = mysqli_fetch_row($resultado);


            //COMPROBAMOS CON UN CONDICIONAL SI EL NUMERO DE USUARIOS ES IGUAL A 1, QUE QUIERE DECIR QUE ESTA REGISTRADO
            echo $numero_usuarios[0];

            if ($numero_usuarios[0]>0){
                echo "<h1 id='correcto'>LOGIN CORRECTAMENTE</h1>";

                /*REDIRECCIONAMOS AL USUARIO AL INCIIO DE LA SESION*/
                echo '<script languaje="javascript">
                sesion_iniciada_usuario();
                </script>';


            }//FIN IF NUMERO USUARIOS
            else{
                echo "<h1 id='error_cuestionario' >USUARIO NO  REGISTRADO, INTENTELO DE NUEVO</h1>";
                exit();

            }//FIN ELSE NUMERO USUARIOS


        }//FIN ELSE VARIABLES VACIAS



    }//FIN IF COMPROBAR CONEXION
    else {
        //MOSTRAMOS MENSAJE DE ERROR AL USUARIO
        echo "<h1 id='error_cuestionario' >NO HA PODIDO REALIZARSE LA CONEXION</h1>";

    }//FIN ELSE COMPROBAR CONEXION


}//FIN FUNCION INICIAR SESION


?>
