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
                <p>Agregar contraseña</p>
            </h1>
            <form method="post" action="add_password.php">
            <?php
                include "db.php";    
                // Realizando una consulta SQL
                $result = pg_query($dbconn,"select * from socio;") or die('La consulta fallo:'.pg_last_error());
                
                echo "<br><label>Clave de socio:</label>";
                echo "<select name='clavesocio' required='required'>";
                echo "<option selected='selected' value=''>-Selecciona una clave de socio-</option>";
                while($row=pg_fetch_array($result)){
                    echo "<option value='".$row['clavesocio']."'>".$row['clavesocio']."</option>";
                    }
                echo "</select>";

                // Liberando el conjunto de resultados
                pg_free_result($result);
                
                // Cerrando la conexión
                pg_close($dbconn);
            ?>    
                <br><label>Contraseña </label><input type="password" name="password" required="requiered"><br>
                <input class="ui-btn ui-btn-b ui-btn-inline" type="submit" name="enviar" value="Agregar">
                <input class="ui-btn ui-btn-b ui-btn-inline" type="reset" name="new" value="Agregar de nuevo">
                <br><br><br>
                <a href='menu_admin.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-home ui-btn-b ui-mini'>Menu principal</a>
                <a href='logout.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-power ui-btn-b ui-mini'>Salir</a>
            </form> 
        </div>
    </body>
</html>

