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
            <h1 align="center">
                <p>Eliminar libros</p>
            </h1>
        <?php
            include "db.php";
            // Realizando una consulta SQL
            $result = pg_query($dbconn,"select * from libro;") or die('La consulta fallo:'.pg_last_error());
            echo "<table>";
                echo "<tr><th>Clave de libro</th><th>Titulo</th><th>Idioma</th><th>Formato</th><th>Clave de editorial</th></tr>";
            while($row=pg_fetch_assoc($result)){
                echo "<tr>";
                    echo "<td align='center' width='200'>" . $row['clavelibro'] . "</td>";
                    echo "<td align='center' width='200'>" . $row['titulo'] . "</td>";
                    echo "<td align='center' width='200'>" . $row['idioma'] . "</td>";
                    echo "<td align='center' width='200'>" . $row['formato'] . "</td>";
                    echo "<td align='center' width='200'>" . $row['claveeditorial'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            // Liberando el conjunto de resultados
            pg_free_result($result);

        ?>
            <form method="post" action="del_show_lib.php">
        <?php
            
            // Realizando una consulta SQL
            $result = pg_query($dbconn,"select * from libro;") or die('La consulta fallo:'.pg_last_error());
            echo "<br><label>Clave de libro:</label>";
            echo "<select name='clavelibro' required='required'>";
            echo "<option selected='selected' value=''>-Selecciona una clave de libro-</option>";
            while($row=pg_fetch_array($result)){
                echo "<option value='".$row['clavelibro']."'>".$row['clavelibro']."</option>";
                }
            echo "</select>";
            
            // Liberando el conjunto de resultados
            pg_free_result($result);
            // Cerrando la conexión
            pg_close($dbconn);

        ?>
                <br><input class="ui-btn ui-btn-b ui-btn-inline" type="submit" name="enviar" value="Eliminar">
                <input class="ui-btn ui-btn-b ui-btn-inline" type="reset" name="new" value="Introducir otra clave"><br><br><br><br>
                <a href='menu_admin.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-home ui-btn-b ui-mini'>Menu principal</a>
                <a href='logout.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-power ui-btn-b ui-mini'>Salir</a>
            </form> 
        </div>
    </body>
</html>

