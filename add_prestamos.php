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
        <link type="text/css" href="CSS/jquery.mobile-1.4.5.min.css" rel="stylesheet"/>
        <link type="text/css" href="CSS/style.css" rel="stylesheet"/>
    </head>

    <body>
        <div class="center" align="center">
            <h1 align="center">
                <p>Agregar prestamos</p>
            </h1>
            <form method="post" action="add_prestamo.php">                
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
                
                // Realizando una consulta SQL
                $result = pg_query($dbconn,"select * from ejemplar;") or die('La consulta fallo:'.pg_last_error());
                echo "<br><label>Clave de ejemplar:</label>";
                echo "<select name='claveejemplar' required=''>";
                echo "<option selected='selected' value=''>-Selecciona una clave de ejemplar-</option>";
                while($row=pg_fetch_array($result)){
                    echo "<option value='".$row['claveejemplar']."'>".$row['claveejemplar']."</option>";
                    }
                echo "</select>";

                ?>
                <br><label>Nº de orden</label><input type="text" name="numeroorden" required="requiered">
                <br><label>Fecha de prestamo </label><input type="date" name="edicion" required="requiered" placeholder="aaaa-mm-dd" pattern="[0-9]{4}[-][0-9]{2}[-][0-9]{2}">
                <br><label>Fecha de devolucion </label><input type="date" name="ubicacion" required="requiered" placeholder="aaaa-mm-dd" pattern="[0-9]{4}[-][0-9]{2}[-][0-9]{2}">
                <br><label>Notas</label><br>
                <textarea name="notas" cols="40" rows="5"></textarea>
                <br>                
                <!-- pattern="[(][0-9]{3}[)][-][0-9]{3}[-][0-9]{2}[-][0-9]{2}"  agregamos patrones hay de 2 formas -->
                <input class="ui-btn ui-btn-b ui-btn-inline" type="submit" name="enviar" value="Agregar">
                <input class="ui-btn ui-btn-b ui-btn-inline" type="reset" name="new" value="Agregar otro">
                <br><br>
                <a href='menu_admin.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-home ui-btn-b ui-mini'>Menu principal</a>
                <a href='logout.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-power ui-btn-b ui-mini'>Salir</a>
            </form> 
        </div>
    </body>
</html>

