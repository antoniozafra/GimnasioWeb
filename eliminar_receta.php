<!--AUTOR: ANTONIO JESUS ZAFRA ARIAS -->
<!--PROYECTO FINAL DESARROLLO DE APLICACIONES WEB -->
<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control - Elimibar Receta - COCOSPORT</title>

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
        <h1 class="titulo_paginas">ELIMINAR RECETA</h1>

        <div id="anadir_rutina" class="animated zoomInUp delay-0s">
            
            
            <!--FORMULARIO PARA ELIMINAR RECETA-->
            <form id="anadir_rutina_form" name="anadir_rutina" method="post" action="eliminar_receta.php">
                <!--ID DE LA RECETA-->
                <label for="id_receta">Id_receta</label>
                <input type="number" name="id_receta" id="id_receta" required>

                <!--BOTÓN PARA ENVIAR LOS DATOS DEL FORMULARIO-->
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
            @$id_receta= $_POST["id_receta"];
            //COMPROBAMOS QUE EL FORMULARIO ESTÁ VACÍO PARA NO ENVIAR LOS DATOS DEL SERVIDOR
            if(empty($id_receta)){
                exit();
            }
        
        
            //CONECTAMOS CON LA BASE DE DATOS
            $c= mysqli_connect($mysql_server,$mysql_login,$mysql_pass);
        
        //COMPROBAMOS SI TENEMOS CONEXION Y REALIZAMOS LAS OPERACIONES
            if($c){
             //USAMOS LA BASE DE DATOS GIMNASIO
                mysqli_query($c, "use gimnasio");
            
            //PREPARAMOS EN UNA VARIABLE EL VALOR DE LA CONSULTA
            $consulta="delete from receta where id_receta='".$id_receta."' ";
            
            
            //COMPROBAMOS QUE LA RUTINA SE PUEDE INSERTAR CORRECTAMENTE
            if(mysqli_query($c,$consulta)){
                //MOSTRAMOS MENSAJE DE VALIDACIÓN
                echo "<p id='correcto'>RECETA ELIMINADA CORRECTAMENTE</p>";

            } 
            else {
                //MOSTRAMOS MENSAJE DE EROS
                echo "<p id='error_cuestionario'>NO SE HA PODIDO ELIMINAR LA RECETA</p>";
            }
            
        }//FIN IF CONEXION
        //SI LA CONEXIÓN FALLA...
        else{
                //MOSTRAMOS MENSAJE DE ERROR EN LA CONEXION
                echo "<p id='error_cuestionario'>NO HA PODIDO REALIZARSE LA CONEXION A LA BASE DE DATOS</p>";            
        }
        //FIN ELSE CONEXION
        
        ?>
