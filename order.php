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

        <link type="text/css" href="CSS/jquery.mobile-1.4.5.css" rel="stylesheet"/>
        <link type="text/css" href="CSS/style.css" rel="stylesheet"/>
	
    </head>
	<body> 
		<div class='center' align='center'><h1 align='center'><p>Consultar socios</p></h1>
			<?php
			include "db.php";

			$elemento = $_POST['elemento'];
			// Realizando una consulta SQL
			$result = pg_query($dbconn,"select * from socio order by $elemento;") or die('La consulta fallo:'.pg_last_error());
					
					echo "<caption>Tabla de socios</caption>";
					echo "<table cellpadding='0' cellspacing='0' class='tablesorter'>";
						echo "<thead>";
						echo "<tr>";
							echo "<th>Clave</th>";
							echo "<th>Nombre</th>";
							echo "<th>Direccion</th>";
							echo "<th>Telefono</th>";
							echo "<th>Categoria</th>";
						echo "</tr>";
						echo "</thead>";
					while($row=pg_fetch_assoc($result)){
					    echo "<tbody>";
					    echo "<tr>";
						    echo "<td align='center' width='200'>" . $row['clavesocio'] . "</td>";
						    echo "<td align='center' width='200'>" . $row['nombre'] . "</td>";
						    echo "<td align='center' width='200'>" . $row['direccion'] . "</td>";
						    echo "<td align='center' width='200'>" . $row['telefono'] . "</td>";
						    echo "<td align='center' width='200'>" . $row['categoria'] . "</td>";
					    echo "</tr>";
					    echo "</tbody>";
					}
					echo "</table>";
					
					// Liberando el conjunto de resultados
					pg_free_result($result);
		 			
		 			// Cerrando la conexión
		            pg_close($dbconn);
			?>
			<form method="post" action="order.php">
				<br>
				<label>Ordenar por:</label> 
		        <select name='elemento' required='required'>
		            <option selected='selected' value=''>-Selecciona una clave de libro-</option>
		            <option value='clavesocio'>Clave de socio</option>
		            <option value='nombre'>Nombre</option>
		            <option value='direccion'>Direccion</option>
		            <option value='telefono'>Telefono</option>
		            <option value='categoria'>Categoria</option>    
		        </select>
		        <input class="ui-btn ui-btn-b ui-btn-inline" type="submit" name="order" value="Ordenar">
			</form>
			<br><br><br>
		    <a href='menu_admin.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-home ui-btn-b ui-mini'>Menu principal</a>
		    <a href='logout.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-power ui-btn-b ui-mini'>Salir</a>
		</div>
	</body>
</html> 