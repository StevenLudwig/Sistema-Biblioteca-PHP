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
                <p>Agregar de autor</p>
            </h1>
            <?php
                include "db.php";
                        
                $clave = $_POST['clave'];
                $nombre = $_POST['nombre'];
                
                echo "<table>";
                echo "<tr><th>Clave de autor</th><th>Nombre</th></tr>";
                echo "<tr><td>".$clave."</td><td>".$nombre."</td></tr>";
                echo "</table>";
                
                // Realizando una consulta SQL
                $query = "insert into autor (claveautor,nombre) values ($clave,'$nombre');";
                $result = pg_query($query) or die('La consulta fallo:'.pg_last_error());

                if ($dbconn) 
                    echo "</br><h5>Datos guardados satisfactoriamente en la base de datos</h5>";
                
                // Liberando el conjunto de resultados
                pg_free_result($result);

                // Cerrando la conexión
                pg_close($dbconn);
                
                echo "<br><br><br>";
                echo "<a href='menu_admin.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-home ui-btn-b ui-mini'>Menu principal</a>";
                echo "<a href='add_autores.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-back ui-btn-b ui-mini'>Regresar</a>";
                echo "<a href='logout.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-power ui-btn-b ui-mini'>Salir</a>";
        
            ?>   
        </div>
    </body>
</html>