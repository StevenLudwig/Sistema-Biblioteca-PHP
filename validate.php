<?php

	$clave = $_POST['clave'];
	$password = $_POST['password'];

	include "db.php";
        if (CRYPT_BLOWFISH == 1) {
            $crypt = crypt($password,'$2y$07$SteveLudwigDeJesusBeltranFlorentino$');
        } 


    $total = pg_num_rows(pg_query("select clavesocio from usuarios where clavesocio = $clave and clavesocio notnull;"));
    if($total==0)
        {
        echo "<script>alert('Socio no registrado');</script>";
        echo "<script>window.location='index.php';</script>";
        }
    else
        {
            
        session_start();
        $_SESSION['clavesocio'] = $clave;
    
        if(empty($_SESSION['clavesocio'])) 
            {
            header('Location: index.php');
            }
        else
            {
            // Realizando una consulta SQL
            $result = pg_query($dbconn,"select clavesocio,password from usuarios where clavesocio = $clave and password = '$crypt';") or die('La consulta fallo:'.pg_last_error());
            
            while($row = pg_fetch_array($result))
                {
               	if($row['clavesocio'] == SS & $row['password'] == $crypt)
                	{
                		header('Location: http://localhost/Sistema_Biblioteca/menu_admin.php');exit;
                	}
         		else
         			{
         				header('Location: http://localhost/Sistema_Biblioteca/socio.php');exit;
         			} 
                }
            }      	
        }
                        
                              
    // Liberando el conjunto de resultados
    pg_free_result($result);

    // Cerrando la conexión
    pg_close($dbconn);                
?>