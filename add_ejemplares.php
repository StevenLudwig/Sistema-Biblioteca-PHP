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
                <p>Agregar ejemplares</p>
            </h1>
            <form method="post" action="add_ejemplar.php">
                <br><label>Clave de ejemplar</label><input type="number" name="claveejemplar" required="required" required placeholder="1504000001" pattern="[0-9]{10}" maxlength="10">
                <br><label>Clave de libro:</label>
                <?php
                include "db.php";
                // Realizando una consulta SQL
                $result = pg_query($dbconn,"select * from libro;") or die('La consulta fallo:'.pg_last_error());
                echo "<select name='clavelibro' required='required'>";
                echo "<option selected='selected' value=''>-Selecciona una clave del libro-</option>";
                while($row=pg_fetch_array($result)){
                    echo "<option value='".$row['clavelibro']."'>".$row['clavelibro']."</option>";
                    }
                echo "</select>";
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
                    <option value="Educacion Superior">Educacion Superior</option>
                    <option value="Educacion Media">Educacion Media</option>
                    <option value="Educacion Primaria">Educacion Primaria</option>
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
                <input class="ui-btn ui-btn-b ui-btn-inline" type="submit" name="enviar" value="Agregar">
                <input class="ui-btn ui-btn-b ui-btn-inline" type="reset" name="new" value="Agregar otro">
                <br><br>
                <a href='menu_admin.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-home ui-btn-b ui-mini'>Menu principal</a>
                <a href='logout.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-power ui-btn-b ui-mini'>Salir</a>
            </form> 
        </div>
    </body>
</html>

