<?php 
include "sesion.php";
include "db.php";
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
        <script type="text/javascript" src="JS/prestamo.js"></script>
    </head>
</head>
<body>
    <div class="center" align="center">
    	<h1 align="center"><p>Prestamos</p></h1>
        	<form id="frm_filtro" method="post" action="">
                <label class="letra">Clave de socio:</label>
                    <select name="clavesocio" class="letra">
                        <option selected="selected" value="">-Todos-</option>
                    <?php
                        $query = pg_query("SELECT clavesocio FROM socio") or die('La consulta fallo:'.pg_last_error()); 
                        while($row = pg_fetch_array($query)){
                        ?>
                        <option value="<?=$row['clavesocio']?>">
                            <?=$row['clavesocio']?>
                        </option>
                    <?php
                            }
                        pg_free_result($query);
                    ?>
                    </select>                
                <label class="letra">Clave de ejemplar:</label>
                <select name="claveejemplar" class="letra">
                    <option selected="selected" value="">-Todos-</option>
                <?php
                    $query = pg_query("SELECT claveejemplar FROM ejemplar") or die('La consulta fallo:'.pg_last_error()); 
                    while($row = pg_fetch_array($query)){
                ?>
                    <option value="<?=$row['claveejemplar']?>">
                        <?=$row['claveejemplar']?>
                    </option>
                <?php
                        }
                    pg_free_result($query);
                    pg_close($dbconn)
                ?>
                </select><br>                	
                <button class="ui-btn-b ui-btn ui-btn-inline ui-mini" type="button" id="btnfiltrar">Buscar</button>
                <button class="ui-btn-b ui-btn ui-btn-inline ui-mini" type="button" id="btncancel">Todos</button>
            </form>
        <table cellpadding="0" cellspacing="0" id="data">
        	<thead>
            	<tr>
                    <th><span title="clavesocio">Clave de socio</span></th>
                    <th><span title="claveejemplar">Clave de ejemplar</span></th>
                    <th><span title="numeroorden">N° Orden</span></th>
                    <th><span title="fecha_prestamo">Fecha de prestamo</span></th>
                    <th><span title="fecha_devolucion">Fecha de devolucion</span></th>
                    <th><span title="notas">Notas</span></th>
                </tr>
            </thead>
            <tbody>
            	
            </tbody>
        </table>

        <br><br>
    <a href='menu_admin.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-home ui-btn-b ui-mini'>Menu principal</a>
    <a href='logout.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-power ui-btn-b ui-mini'>Salir</a>
	</div>    
</body>
</html>
