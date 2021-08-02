<!--AUTOR: ANTONIO JESUS ZAFRA ARIAS -->
<!--PROYECTO FINAL DESARROLLO DE APLICACIONES WEB -->
<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control- Añadir Receta - COCOSPORT</title>

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
        <h1 class="titulo_paginas">AÑADIR RECETA</h1>



        <div id="anadir_rutina" class="animated zoomInUp delay-0s">
            
            <!--FORMULARIO PARA AÑADIR LA RECETA -->
            <form enctype="multipart/form-data" id="anadir_rutina_form" name="anadir_rutina" method="post" action="anadir_receta.php">
                <!--NOMBRE DE LA RECETA -->
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre_receta" id="nombre_receta" required><br>

                <!--TIPO DE RECETA -->
                <label>Tipo:</label>
                <select name="tipo" required>
                    <option value="DESAYUNO">Desayuno</option>
                    <option value="ALMUERZO">Almuerzo</option>
                    <option value="CENA">Cena</option>
                    <option value="POSTRE">Postre</option>
                    <option value="ENSALADA">Ensalada</option>

                </select>
                <br>

                <!--INGREDIENTES DE LA RECETA -->
                <label for="ingredientes">Ingredientes: </label><br>
                <textarea id="ingredientes" name="ingredientes" required></textarea><br>


                <!--PASOS DE LA RECETA -->
                <label for="pasos">Pasos: </label><br>
                <textarea id="pasos" name="pasos" required></textarea><br>

                <!--TIEMPO DE LA RECETA -->
                <label for="tiempo">Tiempo:
                </label><br>
                <input type="number" name="tiempo" id="tiempo" min="1" required><br>



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
                <p id='boton_atras'><a href='maqueta_administrador_registrado.php'>Atrás</a>


            </form><br><br><br><br>
            <!--FIN DEL FORMULARIO -->

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
            @$nombre_receta= $_POST["nombre_receta"];
            /*COMPROBAMOS QUE EL FORMULARIO ESTA VACÍO PARA NO EJECUTAR EL CODIGO DEL SERVIDOR*/
            if(empty($nombre_receta)){
                exit();
            }
            @$tipo = $_POST["tipo"];
            @$ingredientes = $_POST["ingredientes"];
            @$pasos = $_POST["pasos"];
            @$tiempo = $_POST["tiempo"];
            @$dificultad = $_POST["nivel_dificultad"];
            @$imagen = $_POST["imagen"];

            /*DATOS DE LA IMAGEN QUE VAMOS A SUBIR*/
            @$tipo_imagen=$_FILES['imagen']['type'];
            @$tmp_name = $_FILES['imagen']["tmp_name"];
            @$name = $_FILES['imagen']["name"];
            @$r_relativa="media/imagenes/upload/".$name;
        
       
        
        
        /*CREAMOS LA RUTA DONDE VAMOS A GUARDAR LA IMAGEN*/
        $nueva_ruta="C:/xampp/htdocs/proyecto/media/imagenes/upload/";
        
        
         //GUARDAMOS LA EXTENSIÓN DE LA IMAGEN PARA COMPROBAR QUE ES UNA FOTO
        @$extension_imagen = substr($nueva_ruta.$name, -3);

        
      
        //COMPROBAMOS QUE EL TIPO DE ARCHIVO CORRECPONDA A JPG O PNG
        if($extension_imagen == 'jpg' || $extension_imagen == 'png' )
        {
            //COMPROBAMOS QUE LA IMAGEN SE HAYA SUBIDO CORRECTAMENTE
            if(copy(@$tmp_name, @$nueva_ruta."/".@$name."")){
                
                //YA TENEMOS LA FOTO SUBIDA, AHORA COMENZAMOS A INTRODUCIR LOS DATOS EN LA BASE DE DATOS
                
                //GUARDAMOS LA CONSULTA  PARA INTRODUCIR LOS DATOS EN UNA VARIABLE
                $consulta="Insert into receta(Nombre,Tipo,Ingredientes,Pasos,Tiempo_Estimado,Nivel_dificultad,Imagen) 
                Values('".$nombre_receta."','".$tipo."','".$ingredientes."','".$pasos."','".$tiempo."','".$dificultad."','".$r_relativa."');";
                
                
                //CONECTAMOS CON LA BASE DE DATOS
                
                $c= mysqli_connect($mysql_server,$mysql_login,$mysql_pass);
                
                //USAMOS LA BASE DE DATOS GIMNASIO
                mysqli_query($c, "use gimnasio");
                
                
                if(mysqli_query($c,$consulta)){
                //MOSTRAMOS MENSAJE DE VALIDACIÓN
                echo "<p id='correcto'> RECETA INSERTADA CORRECTAMENTE</p>";
                    
                 echo $consulta;
                }
                else {
                    echo "<p>ERROR AL INSERTAR RECETA</p>";
                }
     
            
            }
            //FIN IF COMPROBAR COPY
            else {
                echo"<p id='error_cuestionario'>ERROR AL SUBIR LA FOTO SUBIR LA FOTO<p>";
                
            
            }//FIN ELSE COMPROBAR COPY
            
        
            //DE CONTRARIO, MOSTRAMOS MENSAJE DE ERROR, YA QUE NO VAMOS A SUBIR EL ARCHIVO
        }//FIN IF COMPROBAR TIPO DE IMAGEN
        else{
            echo "<p id='error_cuestionario'>ERROR,INTRODUZCA UN ARCHIVO 'PNG',``JPEG<br><p>";
            

        }//FIN ELSE COMPROBAR TIPO DE IMAGEN
        
        
        ?>
