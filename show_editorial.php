<?php
    include "sesion.php";
?>
<!DOCTYPE html>
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
        <script type="text/javascript" src="JS/editorial.js"></script>
    </head>
	<body> 
		<div class="center" align="center">
        <h1 align="center"><p>Editoriales</p></h1>
        	<form id="frm_filtro" method="post" action="">

                <label class="letra">Editorial:</label>
                    <select name="nombre" class="letra">
                        <option selected="selected" value="">-Todos-</option>
                    <?php
                    	include "db.php";

                        $query = pg_query("SELECT nombre FROM editorial") or die('La consulta fallo:'.pg_last_error()); 
                        while($row = pg_fetch_array($query)){
                        ?>
                        <option value="<?=$row['nombre']?>">
                            <?=$row['nombre']?>
                        </option>
                    <?php
                            }
                        pg_free_result($query);
                    ?>
                    </select>

                <label class="letra">Clave de editorial:</label>
                <select name="claveeditorial" class="letra">
                    <option selected="selected" value="">-Todos-</option>
                <?php
                    $query = pg_query("SELECT claveeditorial FROM editorial") or die('La consulta fallo:'.pg_last_error()); 
                    while($row = pg_fetch_array($query)){
                ?>
                    <option value="<?=$row['claveeditorial']?>">
                        <?=$row['claveeditorial']?>
                    </option>
                <?php
                        }
                    pg_free_result($query);
                ?>
                </select>                	
                <button class="ui-btn-b ui-btn ui-btn-inline ui-mini" type="button" id="btnfiltrar">Buscar</button>
                <button class="ui-btn-b ui-btn ui-btn-inline ui-mini" type="button" id="btncancel">Todos</button>

            </form>
        <table cellpadding="0" cellspacing="0" id="data">
        	<thead>
            	<tr>
                    <th><span title="claveeditorial">Clave de editorial</span></th>
                    <th><span title="nombre">Nombre</span></th>
                    <th><span title="direccion">Direccion</span></th>
                    <th><span title="telefono">Telefono</span></th>
                </tr>
            </thead>
            <tbody>
            	
            </tbody>
        </table>
        <a href='menu_admin.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-home ui-btn-b ui-mini'>Menu principal</a>
        <a href='logout.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-power ui-btn-b ui-mini'>Salir</a>
	</body>
</html> 