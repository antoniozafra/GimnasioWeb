<!--AUTOR: ANTONIO JESUS ZAFRA ARIAS -->
<!--PROYECTO FINAL DESARROLLO DE APLICACIONES WEB -->
<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Clientes - Inicio - COCOSPORT</title>

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
                    <a ><img src="media/imagenes/logo.png"></a>
                    <a href="cliente.php" id="roja">Cerrar Sesion</a>
                    <!-- --<p id="texto_logo">COCO-SPORT</p>-->
                </li>
            </nav>
        </div>
        <!--ZONA CLIENTES -->
        <h1 class="titulo_paginas">ÁREA CLIENTES</h1>
        
        
        <?php 
            /*CONECTAMOS CON LA BASE DE DATOS*/
            $c = mysqli_connect("localhost","root","");
            
            @$resultado = mysqli_query($c,"SELECT nombre FROM gimnasio.usuario where usuario='".$_COOKIE["nombre_usuario"]."'");
            $valor_consulta = mysqli_fetch_row($resultado);

            /*MENSAJE DE BIENVENIDA AL USUARIO*/
             echo "<p class='animated fadeInDown delay-0s' id='mensaje_bienvenida'><strong>Bienvenido,</strong> ".$valor_consulta[0]."</p>";

        
            $c=mysqli_connect("localhost","root","");
            $consulta = "select nombre from usuario";
            $resultado= mysqli_query($c,$consulta);
        
        ?>

        <!--PRINCIPALES FUNCIONALIDADES DE NUESTRA APLICACION -->
        <div id="menu_funcionalidades" class="animated zoomIn delay-0s">
            <!--GESTOR DE CALORIAS -->
            <div class="funcionalidad">
                <div class="imagen_funcionalidad">
                    <img src="media/imagenes/gestor_kcal.jpg">
                </div>
                <a href="gestor_kcal.html">
                    <h1>GESTOR DE KCAL</h1>
                </a>
            </div>


            <!-- EJERCICIOS -->
            <div class="funcionalidad">
                <div class="imagen_funcionalidad">
                    <img src="media/imagenes/pareja.jpg">
                </div>
                <a href="consultar_ejercicios_usuario_registrado.php">
                    <h1> EJERCICIOS</h1>
                </a>
            </div>

            <!-- DIETAS -->
            <div class="funcionalidad">
                <div class="imagen_funcionalidad">
                    <img src="media/imagenes/gkcal.jpg">
                </div>

                <a href="dietas.php">
                    <h1>DIETA PERSONAL</h1>
                </a>
            </div>

            <!--RUTINAS -->
            <div class="funcionalidad">
                <div class="imagen_funcionalidad">
                    <img src="media/imagenes/rutina.jpg">
                </div>

                <a href="rutinas.php">
                    <h1>RUTINA PERSONAL</h1>
                </a>
            </div>

            <!--RECETAS -->
            <div class="funcionalidad">
                <div class="imagen_funcionalidad">
                    <img src="media/imagenes/recetas.jpg">
                </div>

                <a href="recetas.php">
                    <h1> RECETAS</h1>
                </a>
            </div>
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
