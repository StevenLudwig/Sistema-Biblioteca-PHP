<?php
//-------------------------Steve Ludwig De Jesus Beltran Florentino----------------------------------- 
include "sesion.php";
include "db.php";

if($_GET['action'] == 'listar')
	{
		// valores recibidos por POST
		$claveejemplar   = $_POST['claveejemplar'];
		$nombre = $_POST['nombre'];
		$autor = $_POST['autor'];
		$titulo = $_POST['titulo'];

		$sql = "select * from prueba";	
		
		//validacion de una sola tabla
		
		if ($claveejemplar!='' || $nombre!='' || $titulo!='' || $autor!='') {
			# code...
			$sql.=" where ";

			if ($claveejemplar!='' && $nombre=='' && $autor=='' && $titulo=='') {
				# code...
				$sql.= " claveejemplar=".$claveejemplar.";";
			}
			else if ($nombre!='' && $claveejemplar=='' && $autor=='' && $titulo=='') {
				# code...
				$sql.=" nombre='".$nombre."';";
			}
			else if ($autor!='' && $claveejemplar=='' && $nombre=='' && $titulo=='') {
				# code...
				$sql.=" autor='".$autor."';";
			}
			else if ($titulo!='' && $claveejemplar=='' && $nombre=='' && $autor=='') {
				# code...
				$sql.=" titulo='".$titulo."';";
			}

			//--------------------------------------------------------------------------------
			
			else if ($nombre!='' && $claveejemplar!='' && $titulo=='' && $autor=='') {
				# code...
				$sql.=" nombre='".$nombre."' and claveejemplar=".$claveejemplar.";";
			}
			else if ($nombre!='' && $titulo!='' && $claveejemplar=='' && $autor=='') {
				# code...
				$sql.=" nombre='".$nombre."' and titulo='".$titulo."';";
			}
			else if ($autor!='' && $nombre!='' && $claveejemplar=='' && $titulo=='') {
				# code...
				$sql.=" nombre='".$nombre."' and autor='".$autor."';";
			}
			else if ($autor!='' && $titulo!='' && $claveejemplar=='' && $nombre=='') {
				# code...
				$sql.=" autor='".$autor."' and titulo='".$titulo."';";
			}
			else if ($autor!='' && $claveejemplar!='' && $nombre=='' && $titulo=='') {
				# code...
				$sql.=" autor='".$autor."' and claveejemplar=".$claveejemplar.";";
			}
			else if ($titulo!='' && $claveejemplar!='' && $nombre=='' && $autor=='') {
				# code...
				$sql.=" titulo='".$titulo."' and claveejemplar=".$claveejemplar.";";
			}
			
			//--------------------------------------------------------------------------------

			else if ($nombre!='' && $claveejemplar!='' && $autor!='' && $titulo=='') {
				# code...
				$sql.=" nombre='".$nombre."' and claveejemplar=".$claveejemplar." and autor='".$autor."';";
			}
			else if ($titulo!='' && $claveejemplar!='' && $autor!='' && $nombre=='') {
				# code...
				$sql.=" titulo='".$titulo."' and claveejemplar=".$claveejemplar." and autor='".$autor."';";
			}
			else if ($titulo!='' && $nombre!='' && $autor!='' && $claveejemplar=='') {
				# code...
				$sql.=" nombre='".$nombre."' and titulo='".$titulo."' and autor='".$autor."';";
			}
			else if ($titulo!='' && $nombre!='' && $claveejemplar!='' && $autor=='') {
				# code...
				$sql.=" nombre='".$nombre."' and claveejemplar=".$claveejemplar." and titulo='".$titulo."';";
			}

			//-----------------------------------------------------------------------------------------------------------------------
			
			else if ($claveejemplar!='' && $titulo!='' && $autor!='' && $nombre!='') {
				# code...
				$sql.=" nombre='".$nombre."' and claveejemplar=".$claveejemplar." and autor='".$autor."' and titulo='".$titulo."';";
			}
		}
		else{
			$sql.= "";
		}
		
		// Ordenar por--------------------------
		$vorder = $_POST['orderby'];
		
		if($vorder != ''){
			$sql .= " ORDER BY ".$vorder;
		}
		//---------------------------------------
		
		$query = pg_query($sql);
		$datos = array();
		
		while($row = pg_fetch_array($query))
		{
			if($row['hasta']==null)
			{
				$row['hasta']='Ahora';
			}
			$datos[] = array(
				'claveejemplar'=> $row['claveejemplar'],
				'titulo'       => $row['titulo'],
				'idioma'       => $row['idioma'],
				'formato'      => $row['formato'],
				'nombre'	   => $row['nombre'],
				'autor' 	   => $row['autor'],
				'estado'	   => $row['estado'],
				'hasta'	       => $row['hasta']
			);
		}
		// convertimos el array de datos a formato json
		echo json_encode($datos);
	}
//------------------------------------------------------------------------------------------------------------------------------------------
	else if($_GET['action'] == 'prestar')
	{

		$sql = "select * from prueba where estado='Disponible';";	
		

		// Ordenar por--------------------------
		/*$vorder = $_POST['orderby'];
		
		if($vorder != ''){
			$sql .= " ORDER BY ".$vorder;
		}*/
		//---------------------------------------
		
		$query = pg_query($sql);
		$datos = array();
		
		while($row = pg_fetch_array($query))
		{
			if($row['hasta']==null)
			{
				$row['hasta']='Ahora';
			}
			$datos[] = array(
				'claveejemplar'=> $row['claveejemplar'],
				'titulo'       => $row['titulo'],
				'idioma'       => $row['idioma'],
				'formato'      => $row['formato'],
				'nombre'	   => $row['nombre'],
				'autor' 	   => $row['autor'],
				'estado'	   => $row['estado'],
				'hasta'	       => $row['hasta']
			);
		}
		// convertimos el array de datos a formato json
		echo json_encode($datos);
	}
	//---------------------------------------------------------------------------------------------------------------------------------------
	else if($_GET['action'] == 'trata_sobre')
	{
		// valores recibidos por POST
		$titulo   = $_POST['titulo'];
		$nombre = $_POST['nombre'];

		$sql = "select * from libro_tema";	
		
		//validacion de una sola tabla
		
		if ($titulo!='' || $nombre!='' ) {
			# code...
			$sql.=" where ";
			if ($titulo!='' && $nombre=='') {
				# code...
				$sql.= " titulo='".$titulo."';";
			}
			else if ($nombre!='' && $titulo=='') {
				# code...
				$sql.=" nombre='".$nombre."';";
			}
			else if ($nombre!='' && $titulo!='') {
				# code...
				$sql.=" nombre='".$nombre."' and titulo='".$titulo."';";
			}
		}
		else{
			$sql.= "";
		}
		

		
		// Ordenar por--------------------------
		$vorder = $_POST['orderby'];
		
		if($vorder != ''){
			$sql .= " ORDER BY ".$vorder;
		}
		//---------------------------------------
		
		$query = pg_query($sql);
		$datos = array();
		
		while($row = pg_fetch_array($query))
		{
			$datos[] = array(
				'titulo'       => $row['titulo'],
				'nombre'	   => $row['nombre']
			);
		}
		// convertimos el array de datos a formato json
		echo json_encode($datos);
	}
	//---------------------------------------------------------------------------------------------------------------------------------------
	else if($_GET['action'] == 'escrito_por')
	{
		// valores recibidos por POST
		$titulo   = $_POST['titulo'];
		$nombre = $_POST['nombre'];

		$sql = "select * from libro_autor";	
		
		//validacion de una sola tabla
		
		if ($titulo!='' || $nombre!='' ) {
			# code...
			$sql.=" where ";
			if ($titulo!='' && $nombre=='') {
				# code...
				$sql.= " titulo='".$titulo."';";
			}
			else if ($nombre!='' && $titulo=='') {
				# code...
				$sql.=" nombre='".$nombre."';";
			}
			else if ($nombre!='' && $titulo!='') {
				# code...
				$sql.=" nombre='".$nombre."' and titulo='".$titulo."';";
			}
		}
		else{
			$sql.= "";
		}
		

		
		// Ordenar por--------------------------
		$vorder = $_POST['orderby'];
		
		if($vorder != ''){
			$sql .= " ORDER BY ".$vorder;
		}
		//---------------------------------------
		
		$query = pg_query($sql);
		$datos = array();
		
		while($row = pg_fetch_array($query))
		{
			$datos[] = array(
				'titulo'       => $row['titulo'],
				'nombre'	   => $row['nombre']
			);
		}
		// convertimos el array de datos a formato json
		echo json_encode($datos);
	}

//---------------------------------------------------------------------------------------------------------------------------------------

	else if($_GET['action'] == 'autor')
	{
		// valores recibidos por POST
		$claveautor   = $_POST['claveautor'];
		$nombre = $_POST['nombre'];

		$sql = "select * from autor";	
		
		//validacion de una sola tabla
		
		if ($claveautor!='' || $nombre!='' ) {
			# code...
			$sql.=" where ";

			if ($claveautor!='' && $nombre=='') {
				# code...
				$sql.= " claveautor=".$claveautor.";";
			}
			else if ($nombre!='' && $claveautor=='') {
				# code...
				$sql.=" nombre='".$nombre."';";
			}
			else if ($nombre!='' && $claveautor!='') {
				# code...
				$sql.=" nombre='".$nombre."' and claveautor=".$claveautor.";";
			}
		}
		else{
			$sql.= "";
		}

		// Ordenar por--------------------------
		$vorder = $_POST['orderby'];
		
		if($vorder != ''){
			$sql .= " ORDER BY ".$vorder;
		}
		//---------------------------------------
		
		$query = pg_query($sql);
		$datos = array();
		
		while($row = pg_fetch_array($query))
		{
			$datos[] = array(
				'claveautor'   => $row['claveautor'],
				'nombre'	   => $row['nombre']
			);
		}
		// convertimos el array de datos a formato json
		echo json_encode($datos);
	}

//---------------------------------------------------------------------------------------------------------------------------------------

	else if($_GET['action'] == 'editorial')
	{
		// valores recibidos por POST
		$claveeditorial   = $_POST['claveeditorial'];
		$nombre = $_POST['nombre'];

		$sql = "select * from editorial";	
		
		//validacion de una sola tabla
		
		if ($claveeditorial!='' || $nombre!='' ) {
			# code...
			$sql.=" where ";

			if ($claveeditorial!='' && $nombre=='') {
				# code...
				$sql.= " claveeditorial=".$claveeditorial.";";
			}
			else if ($nombre!='' && $claveeditorial=='') {
				# code...
				$sql.=" nombre='".$nombre."';";
			}
			else if ($nombre!='' && $claveeditorial!='') {
				# code...
				$sql.=" nombre='".$nombre."' and claveeditorial=".$claveeditorial.";";
			}
		}
		else{
			$sql.= "";
		}

		// Ordenar por--------------------------
		$vorder = $_POST['orderby'];
		
		if($vorder != ''){
			$sql .= " ORDER BY ".$vorder;
		}
		//---------------------------------------
		
		$query = pg_query($sql);
		$datos = array();
		
		while($row = pg_fetch_array($query))
		{
			$datos[] = array(
				'claveeditorial'   => $row['claveeditorial'],
				'nombre'	       => $row['nombre'],
				'direccion'	       => $row['direccion'],
				'telefono'	       => $row['telefono']
			);
		}
		// convertimos el array de datos a formato json
		echo json_encode($datos);
	}

//---------------------------------------------------------------------------------------------------------------------------------------

	else if($_GET['action'] == 'ejemplar')
	{
		// valores recibidos por POST
		$claveejemplar   = $_POST['claveejemplar'];

		$sql = "select * from ejemplar";	
		
		//validacion de una sola tabla
		
		if ($claveejemplar!='') {
			# code...
			$sql.= " where claveejemplar=".$claveejemplar.";";
		}
		else{
			$sql.= "";
		}

		// Ordenar por--------------------------
		$vorder = $_POST['orderby'];
		
		if($vorder != ''){
			$sql .= " ORDER BY ".$vorder;
		}
		//---------------------------------------
		
		$query = pg_query($sql);
		$datos = array();
		
		while($row = pg_fetch_array($query))
		{
			$datos[] = array(
				'claveejemplar'=> $row['claveejemplar'],
				'clavelibro'   => $row['clavelibro'],
				'numeroorden'  => $row['numeroorden'],
				'edicion'	   => $row['edicion'],
				'ubicacion'	   => $row['ubicacion'],
				'categoria'	   => $row['categoria']
			);
		}
		// convertimos el array de datos a formato json
		echo json_encode($datos);
	}

//---------------------------------------------------------------------------------------------------------------------------------------

	else if($_GET['action'] == 'temas')
	{
		// valores recibidos por POST
		$clavetema   = $_POST['clavetema'];
		$nombre = $_POST['nombre'];

		$sql = "select * from tema";	
		
		//validacion de una sola tabla
		
		if ($clavetema!='' || $nombre!='' ) {
			# code...
			$sql.=" where ";

			if ($clavetema!='' && $nombre=='') {
				# code...
				$sql.= " clavetema=".$clavetema.";";
			}
			else if ($nombre!='' && $clavetema=='') {
				# code...
				$sql.=" nombre='".$nombre."';";
			}
			else if ($nombre!='' && $clavetema!='') {
				# code...
				$sql.=" nombre='".$nombre."' and clavetema=".$clavetema.";";
			}
		}
		else{
			$sql.= "";
		}

		// Ordenar por--------------------------
		$vorder = $_POST['orderby'];
		
		if($vorder != ''){
			$sql .= " ORDER BY ".$vorder;
		}
		//---------------------------------------
		
		$query = pg_query($sql);
		$datos = array();
		
		while($row = pg_fetch_array($query))
		{
			$datos[] = array(
				'clavetema'   		=> $row['clavetema'],
				'nombre'	       => $row['nombre']
			);
		}
		// convertimos el array de datos a formato json
		echo json_encode($datos);
	}

//---------------------------------------------------------------------------------------------------------------------------------------

	else if($_GET['action'] == 'libro')
	{
		// valores recibidos por POST
		$clavelibro   = $_POST['clavelibro'];
		$titulo = $_POST['titulo'];

		$sql = "select * from libro";	
		
		//validacion de una sola tabla
		
		if ($clavelibro!='' || $titulo!='' ) {
			# code...
			$sql.=" where ";

			if ($clavelibro!='' && $titulo=='') {
				# code...
				$sql.= " clavelibro=".$clavelibro.";";
			}
			else if ($titulo!='' && $clavelibro=='') {
				# code...
				$sql.=" titulo='".$titulo."';";
			}
			else if ($titulo!='' && $clavelibro!='') {
				# code...
				$sql.=" titulo='".$titulo."' and clavelibro=".$clavelibro.";";
			}
		}
		else{
			$sql.= "";
		}

		// Ordenar por--------------------------
		$vorder = $_POST['orderby'];
		
		if($vorder != ''){
			$sql .= " ORDER BY ".$vorder;
		}
		//---------------------------------------
		
		$query = pg_query($sql);
		$datos = array();
		
		while($row = pg_fetch_array($query))
		{
			$datos[] = array(
				'clavelibro'    => $row['clavelibro'],
				'titulo'	    => $row['titulo'],
				'idioma'   		=> $row['idioma'],
				'formato'	    => $row['formato'],
				'claveeditorial'=> $row['claveeditorial']
			);
		}
		// convertimos el array de datos a formato json
		echo json_encode($datos);
	}

//---------------------------------------------------------------------------------------------------------------------------------------

	else if($_GET['action'] == 'prestamos')
	{
		// valores recibidos por POST
		$clavesocio   = $_POST['clavesocio'];
		$claveejemplar = $_POST['claveejemplar'];

		$sql = "select * from prestamo";	
		
		//validacion de una sola tabla
		
		if ($clavesocio!='' || $claveejemplar!='' ) {
			# code...
			$sql.=" where ";

			if ($clavesocio!='' && $claveejemplar=='') {
				# code...
				$sql.= " clavesocio=".$clavesocio.";";
			}
			else if ($claveejemplar!='' && $clavesocio=='') {
				# code...
				$sql.= " claveejemplar=".$claveejemplar.";";
			}
			else if ($claveejemplar!='' && $clavesocio!='') {
				# code...
				$sql.=" claveejemplar=".$claveejemplar." and clavesocio=".$clavesocio.";";
			}
		}
		else{
			$sql.= "";
		}

		// Ordenar por--------------------------
		$vorder = $_POST['orderby'];
		
		if($vorder != ''){
			$sql .= " ORDER BY ".$vorder;
		}
		//---------------------------------------
		
		$query = pg_query($sql);
		$datos = array();
		
		while($row = pg_fetch_array($query))
		{
			$datos[] = array(
				'clavesocio'      => $row['clavesocio'],
				'claveejemplar'   => $row['claveejemplar'],
				'numeroorden'     => $row['numeroorden'],
				'fecha_prestamo'  => $row['fecha_prestamo'],
				'fecha_devolucion'=> $row['fecha_devolucion'],
				'notas'			  => $row['notas']
			);
		}
		// convertimos el array de datos a formato json
		echo json_encode($datos);
	}

//---------------------------------------------------------------------------------------------------------------------------------------

	else if($_GET['action'] == 'socios')
	{
		// valores recibidos por POST
		$clavesocio   = $_POST['clavesocio'];
		$categoria = $_POST['nombre'];

		$sql = "select * from socio";	
		
		//validacion de una sola tabla
		
		if ($clavesocio!='' || $categoria!='' ) {
			# code...
			$sql.=" where ";

			if ($clavesocio!='' && $categoria=='') {
				# code...
				$sql.= " clavesocio=".$clavesocio.";";
			}
			else if ($categoria!='' && $clavesocio=='') {
				# code...
				$sql.= " nombre='".$categoria."';";
			}
			else if ($categoria!='' && $clavesocio!='') {
				# code...
				$sql.=" nombre='".$categoria."' and clavesocio=".$clavesocio.";";
			}
		}
		else{
			$sql.= "";
		}

		// Ordenar por--------------------------
		$vorder = $_POST['orderby'];
		
		if($vorder != ''){
			$sql .= " ORDER BY ".$vorder;
		}
		//---------------------------------------
		
		$query = pg_query($sql);
		$datos = array();
		
		while($row = pg_fetch_array($query))
		{
			$datos[] = array(
				'clavesocio'=> $row['clavesocio'],
				'nombre'    => $row['nombre'],
				'direccion' => $row['direccion'],
				'telefono'  => $row['telefono'],
				'categoria' => $row['categoria']
			);
		}
		// convertimos el array de datos a formato json
		echo json_encode($datos);
	}
?>
				