<!--AUTOR: ANTONIO JESUS ZAFRA ARIAS -->
<!--PROYECTO FINAL DESARROLLO DE APLICACIONES WEB -->
<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control - Ver Rutinas - COCOSPORT</title>

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
                    <a><img src="media/imagenes/logo.png"></a>
                    <a href="cliente.php" id="roja">Cerrar Sesion</a>
                    <!--<p id="texto_logo">COCO-SPORT</p>-->

                </li>
            </nav>
        </div>


        <h1 class="titulo_paginas"> VER DIETAS</h1>




        <div id="ver_ejercicios" class="animated zoomIn delay-0s">
            <?php
            //MOSTRAMOS LOS EJERCICIOS ALMACENADOS EN LA BASE DE DATOS
            
            //DATOS DE ACCESO DEL SERVIDOR
            $mysql_server="localhost";
            $mysql_login="root";
            $mysql_pass="";
            
            //CONECTAMOS CON LA BASE DE DATOS
            $c= mysqli_connect($mysql_server,$mysql_login,$mysql_pass);
            
            
            if($c){
                //USAMOS LA BASE DE DATOS GIMNASIO
                mysqli_query($c, "use gimnasio");
                
                //GUARDAMOS LA CONSULTA EN UNA VARIABLE
                $consulta = "select id_dieta,id_usuario,descripcion from dieta";
                //EJECUTAMOS LA CONSULTAS Y LA GUARDAMOS EN LA VARIABLE RESULTADO
                $resultado = mysqli_query($c,$consulta);
                    
                
                /*BOTON PARA VOLVER ATRAS*/
                echo " <p id='boton_atras'><a href='maqueta_administrador_registrado.php'>Atr??s</a>";

                
                //MOSTRAMOS LA TABLA AL USUARIO
            echo "<table>"; 
            echo "<tr>";

            /*MOSTRAMOS LAS CABEZERAS DE LA TABLA*/        
            echo "<th>Id_Dieta</th>";
            echo "<th>Id_Usuario </th>";
            echo "<th>Descripci??n </th>";
            
                echo "</tr>";
                //CERRAMOS LA PRIMERA FILA, QUE SOLO CONTENDR?? EL NOMBRE LOS ENCABEZADOS DE LA TABLA
  
                
                //ABRIMOS UNA NUEVA FILA EN LA TABLA
                 echo "<tr>";
                
                
                //RECORREMOS LOS DIFERENTES VALORES QUE HEMOS OBTENIDO EN LA CONSULTA
				while(@$v=mysqli_fetch_row ($resultado)){


                foreach($v as $valor){
                 
                    /*MOSTRAMOS EL VALOR*/
                    echo "<td><p><strong>".$valor."</strong></p></td>";	
         
                }//FIN FOREACH
                    
                    //CERRAMOS LA FILA
                    echo "<tr/>";


                }//FIN WHILE
				
			echo "</table>"; 
                //CERRAMOS LA TABLA 
                
            }//FIN IF CONEXION
            else{
                echo "<p id='error_cuestionario'>NO HA PODIDO REALIZARSE LA CONEXION A LA BASE DE DATOS</p>";
                
            }//FIN ELSE CONEXION
            
            ?>
        </div>


        <!--PIE DE PAGINA -->
        <footer>
            <div id="pie">
                <p>Copyright ?? 2020 <a href="https://www.orobcode.com">Orob Code</a> | Creado por Antonio Zafra</p>

            </div>
        </footer>
    </div>
</body>

</html>
