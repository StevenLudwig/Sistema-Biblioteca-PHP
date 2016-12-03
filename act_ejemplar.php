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
        ?>

            <form method="post" action="act_show_ejemplar.php">

        <?php
                
                // Realizando una consulta SQL
                $result = pg_query($dbconn,"select * from ejemplar;") or die('La consulta fallo:'.pg_last_error());
                
                echo "<br><label>Clave de ejemplar:</label>";
                echo "<select name='claveejemplar' required='required'>";
                echo "<option selected='selected' value=''>-Selecciona una clave de ejemplar-</option>";
                while($row=pg_fetch_array($result)){
                    echo "<option value='".$row['claveejemplar']."'>".$row['claveejemplar']."</option>";
                    }
                echo "</select>";

                // Liberando el conjunto de resultados
                pg_free_result($result);

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
                <br><label>Nº de orden</label><input type="number" name="numeroorden" required="requiered">
                <!-- Validar que no sean caracteres extraños -->
                <br><label>Edicion </label><input type="number" name="edicion" required="requiered">
                <!--Validar que no se usen caracteres ajenos a los que debe llevar la direccion-->
                <br>
                <label>Ubicacion:</label>
                <select name="ubicacion" required="required">
                    <option selected="Selected" value="">-Selecciona una ubicacion-</option>
                    <option value="Literatura">Literatura</option>
                    <option value="Ocio">Ocio</option>
                    <option value="Investigacion">Investigacion</option>
                    <option value="Profesional">Profesional</option>
                    <option value="Educ.Superior">Educacion Superior</option>
                    <option value="Educ.Media">Educacion Media</option>
                    <option value="Educ.Primaria">Educacion Primaria</option>
                    <option value="Preescolar">Preescolar</option>
                </select>
                <br>
                <label>Categoria:</label>
                <select name="categoria" required="required">
                    <option selected="Selected" value="">-Selecciona una categoria-</option>
                    <option value="E">Especial</option>
                    <option value="N">Normal</option>
                    <option value="C">Clasico</option>
                </select>
                <br>        
                <!-- pattern="[(][0-9]{3}[)][-][0-9]{3}[-][0-9]{2}[-][0-9]{2}"  agregamos patrones hay de 2 formas -->
                <input class="ui-btn ui-btn-b ui-btn-inline" type="submit" name="enviar" value="Actualizar">
                <input class="ui-btn ui-btn-b ui-btn-inline" type="reset" name="new" value="Editar otro socio"><br><br><br>
                <br>
                <a href='menu_admin.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-home ui-btn-b ui-mini'>Menu principal</a>
                <a href='logout.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-power ui-btn-b ui-mini'>Salir</a
            </form> 
        </div>
    </body>
</html>

