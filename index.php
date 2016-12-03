<?php
    session_start(); 
    session_destroy(); 
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
            <h1 align="center">
                <p>Iniciar Sesion</p>
            </h1>
            <form method="post" action="validate.php">
                <label>Clave de usuario</label><br>
                <input type="number" name="clave" required="requiered" placeholder="12345678" autocomplete="off">
                <br><label>Contraseña</label><br>
                <input type="password" name="password" required="requiered" placeholder="Contraseña" autocomplete="off"><br><br>
                <input class="ui-btn ui-inline ui-btn-b" type="submit" name="Iniciar" value="Enviar">
                <input class="ui-btn ui-inline ui-btn-b" type="reset" name="limpiar" value="Intentar de nuevo">
            </form> 
        </div>
    </body>
</html>        