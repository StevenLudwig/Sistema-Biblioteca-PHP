<?php
include "sesion.php";

// Conectando y seleccionado la base de datos  
$dbconn = pg_connect("host=localhost dbname=misdatos user=sl password=qwerty") or die ('No se ha podido conectar:'.pg_last_error());
define('SS',7777777);//Clave unica de Administrador
?>
