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
                <p>Datos actualizados</p>
            </h1>
            <?php
                include "db.php";
                        
                $clavesocio = $_SESSION['clavesocio'];
                $nombre = $_POST['nombre'];
                $direccion = $_POST['direccion'];
                $telefono = $_POST['telefono'];
                $password = $_POST['password'];
                
                // Realizando una consulta SQL
                $query = "update socio set nombre='$nombre',direccion='$direccion',telefono='$telefono' where clavesocio=$clavesocio;";
                $result = pg_query($query) or die('La consulta fallo:'.pg_last_error());
                
                // Liberando el conjunto de resultados
                pg_free_result($result);

                if (CRYPT_BLOWFISH == 1) {
                    $crypt = crypt($password,'$2y$07$SteveLudwigDeJesusBeltranFlorentino$');
                    }

                // Realizando una consulta SQL
                $query = "update usuarios set password='$crypt' where clavesocio=$clavesocio;";
                $result = pg_query($query) or die('La consulta fallo:'.pg_last_error());

                // Liberando el conjunto de resultados
                pg_free_result($result);

                if ($dbconn) 
                    echo "</br><h1>Datos actualizados con exito</h1><br>";

                // Realizando una consulta SQL
                $result = pg_query($dbconn,"select * from socio where clavesocio = $clavesocio;") or die('La consulta fallo:'.pg_last_error());
                echo "<table>";
                    echo "<tr><th>Clave</th><th>Nombre</th><th>Direccion</th><th>Telefono</th><th>Categoria</th></tr>";
                while($row=pg_fetch_assoc($result)){
                    echo "<tr>";
                        echo "<td align='center' width='200'>" . $row['clavesocio'] . "</td>";
                        echo "<td align='center' width='200'>" . $row['nombre'] . "</td>";
                        echo "<td align='center' width='200'>" . $row['direccion'] . "</td>";
                        echo "<td align='center' width='200'>" . $row['telefono'] . "</td>";
                        echo "<td align='center' width='200'>" . $row['categoria'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";

                // Liberando el conjunto de resultados
                pg_free_result($result);

                // Cerrando la conexión
                pg_close($dbconn);

                echo "<br><br>";
                echo "<a href='socio.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-home ui-btn-b ui-mini'>Menu principal</a>";
                echo "<a href='actualizar_datos.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-back ui-btn-b ui-mini'>Regresar</a>";
                echo "<a href='logout.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-power ui-btn-b ui-mini'>Salir</a>";
            ?> 
        </div>
    </body>
</html>