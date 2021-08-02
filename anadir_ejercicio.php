<!--AUTOR: ANTONIO JESUS ZAFRA ARIAS -->
<!--PROYECTO FINAL DESARROLLO DE APLICACIONES WEB -->
<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control - Añadir Ejercicio - COCOSPORT</title>

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
        <!--PANEL DE CONTROL/AÑADIR EJERCICIO -->
        <h1 class="titulo_paginas">AÑADIR EJERCICIO</h1>



        <div id="anadir_rutina" class="animated zoomInUp delay-0s">

            <!--FORMULARIO PARA AÑADIR EL EJERCICIO -->
            <form enctype="multipart/form-data" id="anadir_rutina_form" name="anadir_rutina" method="post" action="anadir_ejercicio.php">
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

                <!--BOTÓN PARA EL ENVIO DE LA INFORMACION -->
                <button id="boton_admin" type="submit">AÑADIR </button>


                <br>
                <!--BOTÓN ATRAS -->
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
        
        
        //*COMPROBAMOS QUE ESTA VACIO PARA NO EJECUTAR LOS DATOS DEL SERVIDOR*/
        @$nombre= $_POST["nombre_ejercicio"];
        if(empty($nombre)){
            exit();
        }

        @$zona_muscular = $_POST["zona_muscular"];
        @$pasos = $_POST["pasos_rutina"];
        @$dificultad = $_POST["nivel_dificultad"];
        @$imagen = $_POST["imagen"];
        
        /*DATOS DE LA IMAGEN QUE VAMOS A SUBIR*/
        @$tipo_imagen=$_FILES['imagen']['type'];/*TIPO DE IMAGEN*/
        @$tmp_name = $_FILES['imagen']["tmp_name"];/*RUTA TEMPORAL DE LA IMAGEN*/
        @$name = $_FILES['imagen']["name"];/*NOMBRE DE LA IMAGEN*/
        @$r_relativa="media/imagenes/upload/".$name;/*RUTA RELATIVA EN LA WEB*/
        
        //GUARDAMOS LA EXTENSIÓN DE LA IMAGEN PARA COMPROBAR QUE ES UNA FOTO
        @$extension_imagen = substr($nueva_ruta.$name, -3);
        
        
        /*CREAMOS LA RUTA DONDE VAMOS A GUARDAR LA IMAGEN*/
        $nueva_ruta="C:/xampp/htdocs/proyecto/media/imagenes/upload/";

        
      
        //COMPROBAMOS QUE EL TIPO DE ARCHIVO CORRECPONDA A JPG O PNG
        if($extension_imagen == 'jpg' || $extension_imagen == 'png' )
        {
            //COMPROBAMOS QUE LA IMAGEN SE HAYA SUBIDO CORRECTAMENTE
            if(copy($tmp_name, $nueva_ruta."/".$name."")){
                
                //YA TENEMOS LA FOTO SUBIDA, AHORA COMENZAMOS A INTRODUCIR LOS DATOS EN LA BASE DE DATOS
                
                //GUARDAMOS LA CONSULTA  PARA INTRODUCIR LOS DATOS EN UNA VARIABLE
                $consulta="Insert into Ejercicio(Nombre,Zona_Muscular,Pasos,Nivel_Dificultad,Imagen) 
                Values('".$nombre."','".$zona_muscular."','".$pasos."','".$dificultad."','".$r_relativa."');";
                
                //COMPROBAMOS QUE LA RUTINA SE PUEDE INSERTAR CORRECTAMENTE
                
                //CONECTAMOS CON LA BASE DE DATOS
                
                $c= mysqli_connect($mysql_server,$mysql_login,$mysql_pass);
                
                //USAMOS LA BASE DE DATOS GIMNASIO
                mysqli_query($c, "use gimnasio");
                
                
                if(mysqli_query($c,$consulta)){
                //MOSTRAMOS MENSAJE DE VALIDACIÓN
                echo "<p id='correcto'> EJERCICIO INSERTADO CORRECTAMENTE</p>";
                    echo $consulta;
                }
                else {
                    echo "<p>ERROR AL INSERTAR EJERCICIO</p>";
                }

            
            }
            //FIN IF COMPROBAR COPY
            else {
                echo"<p id='error_cuestionario'>ERROR AL SUBIR LA FOTO SUBIR LA FOTO<p>";
            
            }//FIN ELSE COMPROBAR COPY
            
        
            //DE CONTRARIO, MOSTRAMOS MENSAJE DE ERROR, YA QUE NO VAMOS A SUBIR EL ARCHIVO
        }//FIN IF COMPROBAR TIPO DE IMAGEN
        else{
            echo "<p id='error_cuestionario'>ERROR,INTRODUZCA UNA ARCHIVO 'PNG',``JPEG<br><p>";
        }//FIN ELSE COMPROBAR TIPO DE IMAGEN
        
    
      
   ?>
