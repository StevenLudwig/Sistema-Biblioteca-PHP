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
    
        <script type="text/javascript" src="JS/jquery-1.11.2.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript" src="JS/solicitar.js"></script>
    </head>

    <body>
        <div class="center" align="center">
            <h1 align="center">
                <p>Solicitar prestamos</p>
            </h1>
            <form method="post" action="solicitud.php">                
                <?php
                
                $clavesocio = $_SESSION['clavesocio'];
                
                include "db.php";
                
                // Realizando una consulta SQL
                $result = pg_query($dbconn,"select * from prestamo where clavesocio = $clavesocio;") or die('La consulta fallo:'.pg_last_error());
                
                echo "<h4> Mis prestamos </h4>";
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
                
                //Ver libros
            ?>
            <h1 align="center">
                <p>Libros disponibles</p>
            </h1>  
         <table cellpadding="0" cellspacing="0" id="data">
            <thead>
                <tr>
                    <th><span title="claveejemplar">Clave de ejemplar</span></th>
                    <th><span title="titulo">Titulo</span></th>
                    <th><span title="idioma">Idioma</span></th>
                    <th><span title="formato">Formato</span></th>
                    <th><span title="nombre">Editorial</span></th>
                    <th><span title="autor">Autor</span></th>
                    <th><span title="estado">Estado</span></th>
                    <th><span title="hasta">Disponible</span></th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
            <?php
                
                pg_free_result($result);

                echo "<br><p>Solicitar nuevo prestamo</p>";

                // Realizando una consulta SQL
                $result = pg_query($dbconn,"select * from prueba where estado='Disponible';") or die('La consulta fallo:'.pg_last_error());
                
                echo "<br><label>Clave de ejemplar:</label>";
                echo "<select name='claveejemplar' required=''>";
                echo "<option selected='selected' value=''>-Selecciona una clave de ejemplar-</option>";
                while($row=pg_fetch_array($result)){
                    echo "<option value='".$row['claveejemplar']."'>".$row['claveejemplar']."</option>";
                    }
                echo "</select>";

                pg_free_result($result);

                // Realizando una consulta SQL
                $result = pg_query($dbconn,"select * from ejemplar;") or die('La consulta fallo:'.pg_last_error());
                
                echo "<br><label>Nº de orden:</label>";
                echo "<select name='numeroorden' required=''>";
                echo "<option selected='selected' value=''>-Selecciona un numero de orden-</option>";
                while($row=pg_fetch_array($result)){
                    echo "<option value='".$row['numeroorden']."'>".$row['numeroorden']."</option>";
                    }
                echo "</select>";

                // Liberando el conjunto de resultados
                pg_free_result($result);

                // Cerrando la conexión
                pg_close($dbconn);

                ?>
                <br><label>Fecha de devolucion </label><input type="date" name="devolucion" required="requiered" placeholder="aaaa-mm-dd" pattern="[0-9]{4}[-][0-9]{2}[-][0-9]{2}">
                <br><p>*aaaa(año)-mm(mes)-dd(dia).</p>
                <br><label>Notas</label><br>
                <textarea name="notas" cols="40" rows="5"></textarea>
                <br>                
                <!-- pattern="[(][0-9]{3}[)][-][0-9]{3}[-][0-9]{2}[-][0-9]{2}"  agregamos patrones hay de 2 formas -->
                <input class="ui-btn ui-btn-b ui-btn-inline" type="submit" name="enviar" value="Agregar">
                <input class="ui-btn ui-btn-b ui-btn-inline" type="reset" name="new" value="Borrar">
                <br><br>
                <a href='socio.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-home ui-btn-b ui-mini'>Menu principal</a>
                <a href='logout.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-power ui-btn-b ui-mini'>Salir</a>
            </form> 
        </div>
    </body>
</html>

