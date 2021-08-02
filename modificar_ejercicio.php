<!--AUTOR: ANTONIO JESUS ZAFRA ARIAS -->
<!--PROYECTO FINAL DESARROLLO DE APLICACIONES WEB -->
<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control - Modificar Ejercicio - COCOSPORT</title>

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
        <h1 class="titulo_paginas">MODIFICAR EJERCICIO</h1>

        <div id="anadir_rutina" class="animated zoomInUp delay-0s">

            <!--FORMULARIO PARA MODIFICAR EJERCICIO-->
            <form enctype="multipart/form-data" id="anadir_rutina_form" name="anadir_rutina" method="post" action="modificar_ejercicio.php">
                <!--ID DEL EJERCICIO A MODIFICAR -->
                <label for="id_ejercicio">Id Ejercicio: </label>
                <input type="number" id="id_ejercicio" name="id_ejercicio" required><br><br>

                <!--NOMBRE DEL EJERCICIO -->
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre_ejercicio" id="nombre_ejercio" required><br>

                <!--ZONA MUSCULAR -->
                <label>Zona Muscular:</label>
                <select name="zona_muscular" required>
                    <option value="espalda">Espalda</option>
                    <option value="pectoral">Pecho</option>
                    <option value="hombros">Hombros</option>
                    <option value="piernas">Piernas</option>
                    <option value="triceps">Triceps</option>
                    <option value="biceps">Biceps</option>
                    <option value="abdominales">Abdomen</option>
                    <option value="trapecio">Trapecio</option>
                    <option value="antebrazo">Antebrazo</option>
                </select>
                <br>

                <!--PASOS DE LA RUTINA -->
                <label for="rutina">Pasos: </label>
                <textarea id="rutina" name="pasos_rutina" required></textarea>

                <!--NIVEL DE DIFICULTAD -->
                <label>Dificultad: </label>
                <select name="nivel_dificultad" required>
                    <option value="facil">Fácil</option>
                    <option value="medio">Media</option>
                    <option value="dificil">Difícil</option>

                </select>
                <br>

                <!--IMAGEN -->
                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" name="imagen" required>
                <br>

                <!--BOTÓN PARA ENVIAR DATOS DEL FORMULARIO -->
                <button id="boton_admin" type="submit">MODIFICAR </button>

                <br>
                <!--BOTÓN ATRÁS-->
                <p id='boton_atras'><a href='maqueta_administrador_registrado.php'>Atrás</a>
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
        
        
        /*GUARDAMOS LAS VARIABLES DEL FORMULARIO*/
        @$id_ejercicio = $_POST["id_ejercicio"];
        /*COMPROBAMOS QUE EL FORMULARIO ESTA VACIO PARA NO ENVIAR LOS DATOS*/
        if(empty($id_ejercicio)){
            exit();
        }
        
        @$nombre= $_POST["nombre_ejercicio"];
        @$zona_muscular = $_POST["zona_muscular"];
        @$pasos = $_POST["pasos_rutina"];
        @$dificultad = $_POST["nivel_dificultad"];
        @$imagen = $_POST["imagen"];
        
        /*DATOS DE LA IMAGEN QUE VAMOS A SUBIR*/
        @$tipo_imagen=$_FILES['imagen']['type'];
        @$tmp_name = $_FILES['imagen']["tmp_name"];
        @$name = $_FILES['imagen']["name"];
        @$r_relativa="media/imagenes/upload/".$name;
        
        //GUARDAMOS LA EXTENSIÓN DE LA IMAGEN PARA COMPROBAR QUE ES UNA FOTO
        @$extension_imagen = substr($nueva_ruta.$name, -3);
        
        
        /*CREAMOS LA RUTA DONDE VAMOS A GUARDAR LA IMAGEN*/
        $nueva_ruta="C:/xampp/htdocs/proyecto/media/imagenes/upload/";
      
        //COMPROBAMOS QUE EL TIPO DE ARCHIVO CORRECPONDA A JPG O PNG
        if($extension_imagen == 'jpg' || $extension_imagen == 'png')
        {
            //COMPROBAMOS QUE LA IMAGEN SE HAYA SUBIDO CORRECTAMENTE
            if(copy($tmp_name, $nueva_ruta."/".$name."")){
            $c= mysqli_connect($mysql_server,$mysql_login,$mysql_pass);

                
                //YA TENEMOS LA FOTO SUBIDA, AHORA COMENZAMOS A INTRODUCIR LOS DATOS EN LA BASE DE DATOS
                mysqli_query($c, "use gimnasio");
                
                //GUARDAMOS EN UNA VARIABLE EL VALOR DE LA CONSULTA
                $consulta="update  ejercicio set nombre='".$nombre."', zona_muscular='".$zona_muscular."', pasos='".$pasos."', nivel_dificultad='".$dificultad."', imagen='".$r_relativa."' where id_ejercicio='".$id_ejercicio."'";
                
                //CONECTAMOS CON LA BASE DE DATOS
                $c= mysqli_connect($mysql_server,$mysql_login,$mysql_pass);
                
                //USAMOS LA BASE DE DATOS GIMNASIO
                mysqli_query($c, "use gimnasio");
                
                
                /*COMPROBAMOS QUE LA CONSULTA ES EJECUTADA CORRECTAMENTE*/
                if(mysqli_query($c,$consulta)){
                //MOSTRAMOS MENSAJE DE VALIDACIÓN
                echo "<p id='correcto'> EJERCICIO INSERTADO CORRECTAMENTE</p>";
                }//FIN IF CONSULTA
                else {
                    echo "<p>ERROR AL INSERTAR EJERCICIO</p>";
                }//FIN ELSE CONSULTA
                    
            
            }//FIN IF COPY
            //FIN IF COMPROBAR COPY
            else {
                echo"<p id='error_cuestionario'>ERROR AL SUBIR LA FOTO SUBIR LA FOTO<p>";
            
            }//FIN ELSE COMPROBAR COPY
           
        
        }//FIN IF COMPROBAR TIPO DE IMAGEN
        else{
            /*MOSTRAMOS MENSAJE DE ERROR*/
            echo "<p id='error_cuestionario'>ERROR,INTRODUZCA UNA ARCHIVO 'PNG',``JPEG<br><p>";
        }//FIN ELSE COMPROBAR TIPO DE IMAGEN
        
        ?>
