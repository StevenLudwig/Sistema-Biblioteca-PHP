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
                <p>Agregar ejemplar</p>
            </h1>
            <?php
                include "db.php";
                        
                $claveejemplar = $_POST['claveejemplar'];
                $clavelibro= $_POST['clavelibro'];
                $numeroorden = $_POST['numeroorden'];
                $edicion = $_POST['edicion'];
                $ubicacion = $_POST['ubicacion'];
                $categoria = $_POST['categoria'];
                
                // Realizando una consulta SQL
                $query = "insert into ejemplar (claveejemplar,clavelibro,numeroorden,edicion,ubicacion,categoria) values ($claveejemplar,$clavelibro,'$numeroorden','$edicion','$ubicacion','$categoria');";
                $result = pg_query($query) or die('La consulta fallo:'.pg_last_error());

                if ($dbconn) 
                    echo "</br><h5>Se agrego exitosamente</h5><br>";
                
                // Liberando el conjunto de resultados
                pg_free_result($result);

                // Cerrando la conexión
                pg_close($dbconn);
                echo "<br><br><br>";
                echo "<a href='menu_admin.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-home ui-btn-b ui-mini'>Menu principal</a>";
                echo "<a href='add_ejemplares.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-back ui-btn-b ui-mini'>Regresar</a>";
                echo "<a href='logout.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-power ui-btn-b ui-mini'>Salir</a>";
            ?>   
        </div>
    </body>
</html>