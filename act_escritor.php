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
    </head>

    <body>
    	<div class="center" align="center">
            <h1 align="center">
                <p>Actualizar escritor a libros</p>
            </h1>
            <form method="post" action="act_escritores.php">
            <?php
                include "db.php";    

                // Liberando el conjunto de resultados
                pg_free_result($result);

                // Realizando una consulta SQL
                $result = pg_query($dbconn,"select * from libro;") or die('La consulta fallo:'.pg_last_error());
                
                echo "<br><label>Libro:</label>";
                echo "<select name='clavelibro' required='required'>";
                echo "<option selected='selected' value=''>-Selecciona un libro-</option>";
                while($row=pg_fetch_array($result)){
                    echo "<option value='".$row['clavelibro']."'>".$row['titulo']."</option>";
                    }
                echo "</select>";

                // Liberando el conjunto de resultados
                pg_free_result($result);

                // Realizando una consulta SQL
                $result = pg_query($dbconn,"select * from autor;") or die('La consulta fallo:'.pg_last_error());
                
                echo "<br><label>Autor:</label>";
                echo "<select name='claveautor' required='required'>";
                echo "<option selected='selected' value=''>-Selecciona un autor-</option>";
                while($row=pg_fetch_array($result)){
                    echo "<option value='".$row['claveautor']."'>".$row['nombre']."</option>";
                    }
                echo "</select>";

                // Liberando el conjunto de resultados
                pg_free_result($result);
                
                // Cerrando la conexión
                pg_close($dbconn);
            ?>    
                <br>
                <input class="ui-btn ui-btn-b ui-btn-inline" type="submit" name="enviar" value="Actualizar">
                <input class="ui-btn ui-btn-b ui-btn-inline" type="reset" name="new" value="Actualizar de nuevo">
                <br><br><br>
                <a href='menu_admin.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-home ui-btn-b ui-mini'>Menu principal</a>
                <a href='logout.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-power ui-btn-b ui-mini'>Salir</a>
            </form> 
        </div>
    </body>
</html>

