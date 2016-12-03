<?php
    include "sesion.php";
?>
<!doctype html>
<html>
    <head>
        <title>Sistema de Bibliotecas</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" lang="es">
        <meta author="Steve Ludwig De Jesus Beltran Florentino">
        <link rel="shortcut icon" href="Img/favicon.ico">
        <script type="text/javascript" src="JS/jquery.mobile-1.4.5.min.js"></script> 
        <link type="text/css" href="CSS/jquery.mobile-1.4.5.min.css" rel="stylesheet"/>
        <link type="text/css" href="CSS/style.css" rel="stylesheet"/>
    </head>

    <body>
        <div class="center" align="center">
            <h1 align="center"><p>Sistema de Biblioteca</p></h1>

            <button class="ui-btn ui-icon-user ui-btn-icon-left ui-shadow-icon ui-btn-a ui-mini">Menu de socio</button>
            
            <a href="show_libros_socio.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-search ui-btn-b ui-mini">Consultar libros</a>
            <a href="solicitar.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-plus ui-btn-b ui-mini">Solicitar prestamo</a>
            <a href="actualizar_datos.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-refresh ui-btn-b ui-mini">Actualizar datos</a>
            <br>
            <a href='logout.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-power ui-btn-b ui-mini'>Salir</a>
        </div>
    </body>
</html




    
