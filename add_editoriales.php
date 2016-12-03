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
    </head>

    <body>
    	<div class="center" align="center">
            <h1 align="center">
                <p>Agregar editorial</p>
            </h1>
            <form method="post" action="add_editorial.php">
                <br><label>Clave de Editorial </label><input type="number" name="clave" required="required" required placeholder="20112015" pattern="[0-9]{8}" maxlength="8">
                <br><label>Nombre </label><input type="text" name="nombre" required="requiered">
                <!-- Validar que no sean caracteres extraños -->
                <br><label>Direccion </label><input type="text" name="direccion" required="requiered">
                <!--Validar que no se usen caracteres ajenos a los que debe llevar la direccion-->
                <br><label>Telefono </label><input type="tel" name="telefono" pattern="\(\d\d\d\)\d\d\d\-\d\d-\d\d" title="Ingresa el numero de telefono con el formato (xxx)xxx-xx-xx" required placeholder="(425)555-00-67" maxlength="15">
                <!-- pattern="[(][0-9]{3}[)][-][0-9]{3}[-][0-9]{2}[-][0-9]{2}"  agregamos patrones hay de 2 formas --></br>
                <input class="ui-btn ui-btn-b ui-btn-inline" type="submit" name="enviar" value="Agregar">
                <input class="ui-btn ui-btn-b ui-btn-inline" type="reset" name="new" value="Agregar de nuevo">
                <br><br><br>
                <a href='menu_admin.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-home ui-btn-b ui-mini'>Menu principal</a>
                <a href='logout.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-power ui-btn-b ui-mini'>Salir</a>
            </form> 
        </div>
    </body>
</html>

