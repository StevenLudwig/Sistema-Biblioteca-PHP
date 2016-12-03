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
                <p>Agregar prestamo</p>
            </h1>
            <?php
                include "db.php";
                        
                $clavesocio = $_SESSION['clavesocio'];
                $claveejemplar= $_POST['claveejemplar'];
                $numeroorden = $_POST['numeroorden'];
                $fecha_prestamo = date("Y-m-d");
                $fecha_devolucion = $_POST['devolucion'];
                $notas = $_POST['notas'];
                
                // Realizando una consulta SQL
                $query = "insert into prestamo (clavesocio,claveejemplar,numeroorden,fecha_prestamo,fecha_devolucion,notas) values ($clavesocio,$claveejemplar,'$numeroorden','$fecha_prestamo','$fecha_devolucion','$notas');";
                $result = pg_query($query) or die('La consulta fallo:'.pg_last_error());

                if ($dbconn) 
                    echo "</br><h5>Se agrego el prestamo con exito</h5><br>";
                // Liberando el conjunto de resultados
                pg_free_result($result);

                // Cerrando la conexión
                pg_close($dbconn);
                
                echo "<br><br><br>";
                echo "<a href='socio.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-home ui-btn-b ui-mini'>Menu principal</a>";
                echo "<a href='solicitar.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-back ui-btn-b ui-mini'>Regresar</a>";
                echo "<a href='logout.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-power ui-btn-b ui-mini'>Salir</a>";
            ?>   
        </div>
    </body>
</html>