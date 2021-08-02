<!--AUTOR: ANTONIO JESUS ZAFRA ARIAS -->
<!--PROYECTO FINAL DESARROLLO DE APLICACIONES WEB -->
<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Panel de Control - COCOSPORT</title>

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
                    <a href="cliente.php" id="roja">Cerrar Sesion</a>
                </li>
            </nav>
        </div>
        <!--ZONA CLIENTES -->
        <h1 class="titulo_paginas">PANEL DE CONTROL</h1>

        <!--PRINCIPALES FUNCIONALIDADES DE NUESTRA APLICACION -->
        <div id="funcionalidad_admin" class="animated zoomIn delay-0s">

            <!--GESTOR DE RECETAS -->
            <div class="desplegar">
                <button class="boton_desplegar">RUTINAS</button>
                <div class="contenido">
                    <a href="anadir_rutina.php">AÑADIR</a>
                    <a href="modificar_rutina.php">MODIFICAR</a>
                    <a href="eliminar_rutina.php">ELIMINAR</a>
                    <a href="ver_rutina.php">VER TODAS</a>

                </div>
            </div>

            <!--GESTOR DE RUTINAS -->
            <div class="desplegar">
                <button class="boton_desplegar">DIETAS</button>
                <div class="contenido">
                    <a href="anadir_dieta.php">AÑADIR</a>
                    <a href="modificar_dieta.php">MODIFICAR</a>
                    <a href="eliminar_dieta.php">ELIMINAR</a>
                    <a href="ver_dieta.php">VER TODAS</a>

                </div>
            </div>

            <!--GESTOR DE DIETAS -->
            <div class="desplegar">
                <button class="boton_desplegar">EJERCICIOS</button>
                <div class="contenido">
                    <a href="anadir_ejercicio.php">AÑADIR</a>
                    <a href="modificar_ejercicio.php">MODIFICAR</a>
                    <a href="eliminar_ejercicio.php">ELIMINAR</a>
                    <a href="ver_ejercicio.php">VER TODOS</a>

                </div>
            </div>

            <!--GESTOR DE EJERCICIOS -->
            <div class="desplegar">
                <button class="boton_desplegar">RECETAS</button>
                <div class="contenido">
                    <a href="anadir_receta.php">AÑADIR</a>
                    <a href="modificar_receta.php">MODIFICAR</a>
                    <a href="eliminar_receta.php">ELIMINAR</a>
                    <a href="ver_receta.php">VER TODAS</a>

                </div>
            </div>

            <!--GESTOR DE USUARIOS -->
            <div class="desplegar">
                <button class="boton_desplegar">USUARIOS</button>
                <div class="contenido">
                    <a href="anadir_usuario.php">AÑADIR</a>
                    <a href="modificar_usuario.php">MODIFICAR</a>
                    <a href="eliminar_usuario.php">ELIMINAR</a>
                    <a href="ver_usuario.php">VER TODOS</a>

                </div>
            </div>

        </div>


    </div><!--FIN CONTENEDOR PRINCIPAL-->

    <!--PIE DE PÁGINA -->
    <footer>
        <div id="pie">
            <p>Copyright © 2020 <a href="https://www.orobcode.com">Orob Code</a> | Creado por Antonio Zafra</p>

        </div>
    </footer>
</body>

</html>
