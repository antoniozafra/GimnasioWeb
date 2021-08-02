<!--AUTOR: ANTONIO JESUS ZAFRA ARIAS -->
<!--PROYECTO FINAL DESARROLLO DE APLICACIONES WEB -->
<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario - Panel de Control - COCOSPORT</title>

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
        <h1 class="titulo_paginas">ELIMINAR USUARIO</h1>



        <div id="anadir_rutina">
            
            
            <!--FORMULARIO PARA ELIMINAR USUARIO -->
            <form id="anadir_rutina_form" name="anadir_rutina" method="post" action="eliminar_usuario.php" class="animated zoomInUp delay-0s">
                <!--ID DE LA RECETA-->
                <label for="id_usuario">Id_usuario</label>
                <input type="number" name="id_usuario" id="id_usuario" required>
                
                <!--BOTÓN PARA ENVIAR LOS DATOS DEL FORMULARIO -->
                <button id="boton_admin" type="submit">ELIMINAR </button>


                <!--BOTÓN ATRÁS -->
            <br><p id='boton_atras'><a href='maqueta_administrador_registrado.php'>Atrás</a>
            </form>
        </div>
        
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
        
        //DATOS DE ACCESO DEL SERVIDOR
            $mysql_server="localhost";
            $mysql_login="root";
            $mysql_pass="";
            @$id_usuario= $_POST["id_usuario"];
            //COMPROBAMOS SI EL FORMULARIO ESTÁ VACÍO PARA NO ENVIAR LOS DATOS
            if(empty($id_usuario)){
                exit();
            }
        
        
            //CONECTAMOS CON LA BASE DE DATOS
            $c= mysqli_connect($mysql_server,$mysql_login,$mysql_pass);
        
        //COMPROBAMOS SI TENEMOS CONEXION Y REALIZAMOS LAS OPERACIONES
        if($c){
             //USAMOS LA BASE DE DATOS GIMNASIO
                mysqli_query($c, "use gimnasio");
            
            //GUARDAMOS EN UNA VARIABLE EL VALOR DE LA CONSULTA
            $consulta="delete from usuario where id_usuario='".$id_usuario."' ";
            
            
            //COMPROBAMOS QUE LA CONSULTA SE REALIZA CORRECTAMENTE
            if(mysqli_query($c,$consulta)){
                //MOSTRAMOS MENSAJE DE VALIDACIÓN
                echo "<p id='correcto'>USUARIO ELIMINADO CORRECTAMENTE</p>";

            } 
            else {
                //MOSTRAMOS MENSAJE DE ERROR
                echo "<p id='error_cuestionario'>ERROR AL ELIMINAR AL USUARIO, INTÉNTELO DE NUEVO</p>";
                echo $consulta;
                
            }
            
        }//FIN IF CONEXION
        //SI LA CONEXIÓN FALLA...
        else{
                //MOSTRAMOS MENSAJE DE ERROR EN LA CONEXION
                echo "<p id='error_cuestionario'>NO HA PODIDO REALIZARSE LA CONEXION A LA BASE DE DATOS</p>";            
        }
        //FIN ELSE CONEXION
        
        
        ?>
