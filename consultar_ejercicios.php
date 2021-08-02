<!--AUTOR: ANTONIO JESUS ZAFRA ARIAS -->
<!--PROYECTO FINAL DESARROLLO DE APLICACIONES WEB -->
<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Ejercicios -COCOSPORT</title>

    <!--ICONO DE LA WEB -->
    <link rel="icon" type="image/png" href="media/imagenes/logo.png">

    <!--HOJA DE ESTILOS -->
    <link rel="stylesheet" href="estilos/estilos.css">

    <!--FUNCIONES JS -->
    <script type="text/javascript" src="funciones/funciones.js"></script>

    <!--LIBREÍA JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type='text/javascript'>
        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 150) {
                    $('#scroll').fadeIn();
                } else {
                    $('#scroll').fadeOut();
                }
            });
            $('#scroll').click(function() {
                $("html, body").animate({
                    scrollTop: 0
                }, 600);
                return false;
            });
        });

    </script>


</head>

<body>
    <!--BOTÓN PARA SUBIR HACIA ARRIBA -->
    <a href="javascript:void(0);" id="scroll" title="Subir" style="display: none;">Subir<span></span></a>
    
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
                    <a href="cliente.php">Clientes</a>
                    <a href="consultar_ejercicios.php" class="activo">Consultar Ejercicios</a>
                    <a class="texto_derecha" href="contacto.html">Contacto</a>
                    <!--<p id="texto_logo">COCO-SPORT</p>-->

                </li>
            </nav>
        </div>


        <h1 class="titulo_paginas"> EJERCICIOS</h1>


        <!--FILTROS PARA LOS DIFERENTES EJERCICIOS -->
        <div id="filtros_ejercicios" class="animated  zoomIn delay-0s">

            <!--FORMULARIO PARA LA BUSCA DE EJERCICIOS-->
            <form id="formulario_filtros" method="post" action="consultar_ejercicios.php">

                <!--FILTRO ZONA MUSCULAR -->
                <div id="filtro_zona_muscular">
                    <label><strong>Zona Muscular:</strong></label>
                    <select name="zona_muscular">
                        <option value="sin_seleccionar">Todos</option>
                        <option value="'espalda'">Espalda</option>
                        <option value="'pectoral'">Pecho</option>
                        <option value="'hombros'">Hombros</option>
                        <option value="'piernas'">Piernas</option>
                        <option value="'triceps'">Triceps</option>
                        <option value="'biceps'">Biceps</option>
                        <option value="'abdominales'">Abdomen</option>
                        <option value="'trapecio'">Trapecio</option>
                        <option value="'antebrazo'">Antebrazo</option>
                    </select>
                </div>

                <div id="filtro_dificultad">
                    <!--FILTRO POR DIFICULTAD DEL EJERCICIO -->
                    <label><strong>Dificultad: </strong></label>
                    <select name="nivel_dificultad">
                        <option value="sin_seleccionar">Todos</option>
                        <option value="'facil'">Fácil</option>
                        <option value="'medio'">Media</option>
                        <option value="'dificil'">Difícil</option>
                    </select>
                </div>
                <br>
                <!--BOTÓN PARA ENVIAR LOS DATOS DEL FORMULARIO-->
                <button id="busqueda_filtro">Buscar Ejercicios</button>

            </form>
            
        </div>


        <div id="ver_ejercicios" class='animated  zoomIn delay-0s'>
            <?php
            //MOSTRAMOS LOS EJERCICIOS ALMACENADOS EN LA BASE DE DATOS
            
            //DATOS DE ACCESO DEL SERVIDOR
            $mysql_server="localhost";
            $mysql_login="root";
            $mysql_pass="";
            @$zona_muscular= $_POST["zona_muscular"];
            @$nivel_dificultad = $_POST["nivel_dificultad"];
            
            //CONECTAMOS CON LA BASE DE DATOS
            $c= mysqli_connect($mysql_server,$mysql_login,$mysql_pass);

            
            if($c){
                //USAMOS LA BASE DE DATOS GIMNASIO
                mysqli_query($c, "use gimnasio");
                
                //COMPROBAMOS SI HA SELECCIONADO ALGUNA OPCION
                if($zona_muscular==("sin_seleccionar") && $nivel_dificultad==("sin_seleccionar")){
                   
                
                //GUARDAMOS LA CONSULTA EN UNA VARIABLE
                $consulta = "select nombre,zona_muscular,pasos,nivel_dificultad,imagen from ejercicio";
                //EJECUTAMOS LA CONSULTAS Y LA GUARDAMOS EN LA VARIABLE RESULTADO
                $resultado = mysqli_query($c,$consulta);
                    
                    
                }
                
                
                 else if($zona_muscular==("sin_seleccionar")){
                       
                //GUARDAMOS LA CONSULTA EN UNA VARIABLE
                $consulta = "select nombre,zona_muscular,pasos,nivel_dificultad,imagen from ejercicio where nivel_dificultad=".$nivel_dificultad."";
                //EJECUTAMOS LA CONSULTAS Y LA GUARDAMOS EN LA VARIABLE RESULTADO
                $resultado = mysqli_query($c,$consulta);
                   }
                    else if($nivel_dificultad==("sin_seleccionar")){
                //GUARDAMOS LA CONSULTA EN UNA VARIABLE
                $consulta = "select nombre,zona_muscular,pasos,nivel_dificultad,imagen from ejercicio where zona_muscular=".$zona_muscular."";
                //EJECUTAMOS LA CONSULTAS Y LA GUARDAMOS EN LA VARIABLE RESULTADO
                $resultado = mysqli_query($c,$consulta);    
                        
                    }
                    else{
                    //GUARDAMOS LA CONSULTA EN UNA VARIABLE
                $consulta = "select nombre,zona_muscular,pasos,nivel_dificultad,imagen from ejercicio where zona_muscular=".$zona_muscular." and nivel_dificultad=".$nivel_dificultad."";
                //EJECUTAMOS LA CONSULTAS Y LA GUARDAMOS EN LA VARIABLE RESULTADO
                $resultado = mysqli_query($c,$consulta);    
                       
                                   
                    
                    }
                    
             
                //MOSTRAMOS LA TABLA AL USUARIO
                echo "<table >";
                echo "<tr>";
        
                //MOSTRAMOS EL NOMBRE DE LAS COLUMNAS DE LA TABLA
                echo "<th>NOMBRE</th>";
                echo "<th> ZONA MUSCULAR </th>";
                echo "<th>PASOS </th>";
                echo "<th>NIVEL DIFICULTAD </th>";
                echo "<th>IMAGEN</th>";
                    echo "</tr>";
                //CERRAMOS LA PRIMERA FILA, QUE SOLO CONTENDRÁ EL NOMBRE LOS ENCABEZADOS DE LA TABLA
  
                
                //ABRIMOS UNA NUEVA FILA EN LA TABLA
                 echo "<tr>";
                
                //RECORREMOS LOS DIFERENTES VALORES QUE HEMOS OBTENIDO EN LA CONSULTA
				while(@$v=mysqli_fetch_row ($resultado)){


                foreach($v as $valor){
                    @$contador++;
                     //COMO SABEMOS QUE EL ENCABEZADO IMAGEN ES EL NUMERO5, EJECUTAMOS UN CONDICIONAL PARA SABER SI ESTAMOS EN ESA POSICION, Y SI ES ASÍ INTRODUCIMOS UNA IMAGEN RELACCIONADA CON EL EJERCICIO  QUE ESTAMOS MOSTRANDO POR PANTALLA
                    
                    
                    
                    if($contador==5){
                        //MOSTRAMOS LA IMAGEN POR PANTALLA
                        echo "<td    id='imagen_ejercicio'><img src='$valor'</td>";
                        $contador=0;
                        break;
                    }//FIN IF CONTADOR=5
                    
 
                  //IMPRIMIMOS LAS DEMAS POSICINES QUE NO  SEAN LA ANTERIOR
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
                <p>Copyright © 2020 <a href="https://www.orobcode.com">Orob Code</a> | Creado por Antonio Zafra</p>

            </div>
        </footer>
    </div>
</body>

</html>
