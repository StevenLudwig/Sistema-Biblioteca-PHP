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
                <p>Actualizar ejemplar</p>
            </h1>
            <?php
                include "db.php";
                        
                $claveejemplar = $_POST['claveejemplar'];
                $clavelibro = $_POST['clavelibro'];
                $numeroorden = $_POST['numeroorden'];
                $ubicacion = $_POST['ubicacion'];
                $categoria = $_POST['categoria'];

                // Realizando una consulta SQL
                $query = "update ejemplar set clavelibro=$clavelibro,numeroorden='$numeroorden',ubicacion='$ubicacion',categoria='$categoria' where claveejemplar=$claveejemplar;";
                $result = pg_query($query) or die('La consulta fallo:'.pg_last_error());

                if ($dbconn) 
                    echo "</br><h1>Datos actualizados con exito</h1><br>";
                
                // Realizando una consulta SQL
                $result = pg_query($dbconn,"select * from ejemplar;") or die('La consulta fallo:'.pg_last_error());
                
                echo "<table>";
                echo "<tr><th>Clave de ejemplar</th><th>Clave de libro</th><th>Nº de orden</th><th>Edicion</th><th>Ubicacion</th><th>Categoria</th></tr>";
                while($row=pg_fetch_assoc($result)){
                    echo "<tr>";
                        echo "<td align='center' width='200'>" . $row['claveejemplar'] . "</td>";
                        echo "<td align='center' width='200'>" . $row['clavelibro'] . "</td>";
                        echo "<td align='center' width='200'>" . $row['numeroorden'] . "</td>";
                        echo "<td align='center' width='200'>" . $row['edicion'] . "</td>";
                        echo "<td align='center' width='200'>" . $row['ubicacion'] . "</td>";
                        echo "<td align='center' width='200'>" . $row['categoria'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";

                // Liberando el conjunto de resultados
                pg_free_result($result);

                // Cerrando la conexión
                pg_close($dbconn);

                echo "<br><br>";
                echo "<a href='menu_admin.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-home ui-btn-b ui-mini'>Menu principal</a>";
                echo "<a href='act_ejemplar.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-back ui-btn-b ui-mini'>Regresar</a>";
                echo "<a href='logout.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-power ui-btn-b ui-mini'>Salir</a>";
            ?>   
        </div>
    </body>
</html>