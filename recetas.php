<!--AUTOR: ANTONIO JESUS ZAFRA ARIAS -->
<!--PROYECTO FINAL DESARROLLO DE APLICACIONES WEB -->
<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Clientes - Recetas - COCOSPORT</title>

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
                if ($(this).scrollTop() > 100) {
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
    <!--BOTON PARA SUBIR AL PRINCIPIO DE LA PAGINA -->
        <a href="javascript:void(0);" id="scroll" title="Subir" style="display: none;">Subir<span></span></a>

    <!--CONTENEDOR PRINCIPAL -->
    <div id="contenedor_principal">

        <!--MENU PRINCIPAL DE NAVEGACION -->
        <div id="menu">
            <nav>
                <li>
                    <a><img src="media/imagenes/logo.png"></a>
                    <a href="index.php" id="roja">Cerrar Sesion</a>
                    <!-- --<p id="texto_logo">COCO-SPORT</p>-->
                </li>
            </nav>
        </div>
        <h1 class="titulo_paginas"> RECETAS</h1>


        <!--FILTROS PARA LOS DIFERENTES EJERCICIOS -->
        <div id="filtros_ejercicios" class="animated  zoomIn delay-0s">

            <!--FORMULARIO CON LOS FILTROS DE LAS RECETAS-->
            <form id="formulario_filtros" method="post" action="recetas.php">

                <!--FILTRO ZONA MUSCULAR -->

                <div id="filtro_tipo">
                    <label><strong>Tipo:</strong></label>
                    <select name="tipo">
                        <option value="sin_seleccionar">Todos</option>
                        <option value="'desayuno'">Desayuno</option>
                        <option value="'almuerzo'">Almuerzo</option>
                        <option value="'cena'">Cena</option>
                        <option value="'postre'">Postre</option>
                        <option value="'ensalada'">Ensaladas</option>
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
                <!--BOTÓN PARA ENVIAR LOS DATOS-->
                <button onclick="ejemplo()">Buscar Recetas</button>

            </form>
        </div>


        <div id="ver_recetas">
            <?php
            
            
            //MOSTRAMOS LOS EJERCICIOS ALMACENADOS EN LA BASE DE DATOS
            
            //DATOS DE ACCESO DEL SERVIDOR
            $mysql_server="localhost";
            $mysql_login="root";
            $mysql_pass="";
            @$tipo = $_POST["tipo"];
            @$nivel_dificultad = $_POST["nivel_dificultad"];
            
            //CONECTAMOS CON LA BASE DE DATOS
            $c= mysqli_connect($mysql_server,$mysql_login,$mysql_pass);
            
            
            if($c){
                //USAMOS LA BASE DE DATOS GIMNASIO
                mysqli_query($c, "use gimnasio");
                
                //COMPROBAMOS SI HA SELECCIONADO ALGUNA OPCION
                if($tipo==("sin_seleccionar") && $nivel_dificultad==("sin_seleccionar")){
                   
                
                //GUARDAMOS LA CONSULTA EN UNA VARIABLE
                $consulta = "select * from receta";
                //EJECUTAMOS LA CONSULTAS Y LA GUARDAMOS EN LA VARIABLE RESULTADO
                $resultado = mysqli_query($c,$consulta);
                    
                    
                }
                
                
                 else if($tipo==("sin_seleccionar")){
                       
                //GUARDAMOS LA CONSULTA EN UNA VARIABLE
                $consulta = "select * from receta where nivel_dificultad=".$nivel_dificultad."";
                //EJECUTAMOS LA CONSULTAS Y LA GUARDAMOS EN LA VARIABLE RESULTADO
                $resultado = mysqli_query($c,$consulta);
                   }
                    else if($nivel_dificultad==("sin_seleccionar")){
                //GUARDAMOS LA CONSULTA EN UNA VARIABLE
                $consulta = "select * from receta where tipo=".$tipo."";
                //EJECUTAMOS LA CONSULTAS Y LA GUARDAMOS EN LA VARIABLE RESULTADO
                $resultado = mysqli_query($c,$consulta);    
                        
                    }
                    else{
                    //GUARDAMOS LA CONSULTA EN UNA VARIABLE
                $consulta = "select * from receta where tipo=".$tipo." and nivel_dificultad=".$nivel_dificultad."";
                //EJECUTAMOS LA CONSULTAS Y LA GUARDAMOS EN LA VARIABLE RESULTADO
                $resultado = mysqli_query($c,$consulta);    
                                   
                    
                    }
           
                
                
                //MOSTRAMOS LAS CABEZERAS DE LA TABLA
                $cabezeras=mysqli_query($c,"SELECT COLUMN_NAME FROM information_schema.COLUMNS WHERE TABLE_SCHEMA  LIKE 'gimnasio' and TABLE_NAME =  receta");
                $contador=0;
                                echo " <p id='boton_atras'><a href='maqueta_usuario_registrado.php'>Atrás</a>";

                
                //COMENZAMOS A MOSTRAR LA TABLA
                //MOSTRAMOS LA TABLA AL USUARIO
            echo "<table class='animated  zoomIn delay-0s'>"; //la propiedad empty-cells:show; permite visualizar las celdas vacias en la tabla.
           
            #La siguiente instruccion y el siguiente bucle es para mostrar los nombrde los atributos al comienzo de la tabla

            $datos=mysqli_query($c,"select column_name
            from INFORMATION_SCHEMA.COLUMNS
            where TABLE_SCHEMA = 'gimnasio'
            and TABLE_NAME = 'receta'");
                echo "<tr>";
                
                //CREAMOS U BUCLE QUE RECORRA LA LISTA CON LAS DIFERENTES CABEZERAS DE NUESTRA TABLA
                while($v=mysqli_fetch_row($datos)){
                    foreach($v as $valor) {
                        //VAMOS MOSTRANDOLAS EN LA TABLA
                        echo "<th><p>".$valor."</p></th>";
                    }//FIN FOREACH
                    
                }//FIN WHILE MOSTRAR COLUMNAS
                echo "</tr>";
                //CERRAMOS LA PRIMERA FILA, QUE SOLO CONTENDRÁ EL NOMBRE LOS ENCABEZADOS DE LA TABLA
                
                //ABRIMOS UNA NUEVA FILA EN LA TABLA
                 echo "<tr>";
                
                
                //RECORREMOS LOS DIFERENTES VALORES QUE HEMOS OBTENIDO EN LA CONSULTA
				while(@$v=mysqli_fetch_row ($resultado)){

                foreach($v as $valor){
                    $contador++;
                    //COMO SABEMOS QUE EL ENCABEZADO IMAGEN ES EL NUMERO8, EJECUTAMOS UN CONDICIONAL PARA SABER SI ESTAMOS EN ESA POSICION, Y SI ES ASÍ INTRODUCIMOS UNA IMAGEN RELACCIONADA CON EL EJERCICIO  QUE ESTAMOS MOSTRANDO POR PANTALLA
                    
                    if($contador==8){
                        //MOSTRAMOS LA IMAGEN POR PANTALLA
                        echo "<td id='imagen_ejercicio'><img src='$valor'</td>";
                        $contador=0;
                        break;
                    }//FIN IF CONTADOR=8
                    
                    
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
