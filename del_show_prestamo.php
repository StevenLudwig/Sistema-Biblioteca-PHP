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
                <p>Eliminar prestamo</p>
            </h1>
            <?php
                include "db.php";
                        
                $clavesocio = $_POST['clavesocio'];
                
                // Realizando una consulta SQL
                $query = "delete from prestamo where clavesocio=$clavesocio;";
                $result = pg_query($query) or die('La consulta fallo:'.pg_last_error());

                // Liberando el conjunto de resultados
                pg_free_result($result);

                // Realizando una consulta SQL
                $query = "update disponible  set status='Disponible' where clavesocio=$clavesocio;";
                $result = pg_query($query) or die('La consulta fallo:'.pg_last_error());

                if ($dbconn) 
                    echo "</br><h1>Eliminado con exito</h1><br>";
                
                // Liberando el conjunto de resultados
                pg_free_result($result);

                // Realizando una consulta SQL
                $result = pg_query($dbconn,"select * from prestamo;") or die('La consulta fallo:'.pg_last_error());
                
                echo "<table>";
                echo "<tr><th>Clave del socio</th><th>Clave del ejemplar</th><th>Nº de Orden</th><th>Fecha de prestamo</th><th>Fecha de devolucion</th><th>Notas</th></tr>";
                while($row=pg_fetch_assoc($result)){
                    echo "<tr>";
                        echo "<td align='center' width='200'>" . $row['clavesocio'] . "</td>";
                        echo "<td align='center' width='200'>" . $row['claveejemplar'] . "</td>";
                        echo "<td align='center' width='200'>" . $row['numeroorden'] . "</td>";
                        echo "<td align='center' width='200'>" . $row['fecha_prestamo'] . "</td>";
                        echo "<td align='center' width='200'>" . $row['fecha_devolucion'] . "</td>";
                        echo "<td align='center' width='200'>" . $row['notas'] . "</td>";

                    echo "</tr>";
                }
                echo "</table>";
           
                // Liberando el conjunto de resultados
                pg_free_result($result);

                // Cerrando la conexión
                pg_close($dbconn);

                echo "<br><br>";
                echo "<a href='menu_admin.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-home ui-btn-b ui-mini'>Menu principal</a>";
                echo "<a href='del_prestamo.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-back ui-btn-b ui-mini'>Regresar</a>";
                echo "<a href='logout.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-power ui-btn-b ui-mini'>Salir</a>";
            ?>   
        </div>
    </body>
</html>