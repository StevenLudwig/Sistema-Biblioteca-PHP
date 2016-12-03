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
            <h1 align="center"><p>Menu</p></h1>

            <button class="ui-btn ui-icon-user ui-btn-icon-left ui-shadow-icon ui-btn-a ui-mini">Socios</button>
            
            <a href="show_socios.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-search ui-btn-b ui-mini">Consultar</a>
            <a href="add_socios.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-plus ui-btn-b ui-mini">Agregar</a>
            <a href="act_socio.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-refresh ui-btn-b ui-mini">Actualizar</a>
            <a href="del_socio.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-delete ui-btn-b ui-mini">Eliminar</a>
            <div style="width:450px">

                <hr>
                <button class="ui-btn ui-icon-eye ui-btn-icon-left ui-shadow-icon ui-btn-a ui-mini">Contraseña</button>

                <a href="add_pass.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-plus ui-btn-b ui-mini">Agregar</a>
                <a href="act_pass.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-refresh ui-btn-b ui-mini">Actualizar</a>
                <hr>
            </div>

            <button class="ui-btn ui-icon-tag ui-btn-icon-left ui-shadow-icon ui-btn-a ui-mini">Editoriales</button> 

            <a href="show_editorial.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-search ui-btn-b ui-mini">Consultar</a>
            <a href="add_editoriales.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-plus ui-btn-b ui-mini">Agregar</a>
            <a href="act_editorial.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-refresh ui-btn-b ui-mini">Actualizar</a>
            <a href="del_editorial.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-delete ui-btn-b ui-mini">Eliminar</a>
            
            <button class="ui-btn ui-icon-mail ui-btn-icon-left ui-shadow-icon ui-btn-a ui-mini">Autores</button>

            <a href="show_autor.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-search ui-btn-b ui-mini">Consultar</a>
            <a href="add_autores.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-plus ui-btn-b ui-mini">Agregar</a>
            <a href="act_autor.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-refresh ui-btn-b ui-mini">Actualizar</a>
            <a href="del_autor.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-delete ui-btn-b ui-mini">Eliminar</a>

            <button class="ui-btn ui-icon-location ui-btn-icon-left ui-shadow-icon ui-btn-a ui-mini">Temas</button>

            <a href="show_tema.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-search ui-btn-b ui-mini">Consultar</a>
            <a href="add_temas.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-plus ui-btn-b ui-mini">Agregar</a>
            <a href="act_tema.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-refresh ui-btn-b ui-mini">Actualizar</a>
            <a href="del_tema.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-delete ui-btn-b ui-mini">Eliminar</a>

            <button class="ui-btn ui-icon-star ui-btn-icon-left ui-shadow-icon ui-btn-a ui-mini">Libros</button>

            <a href="show_libro.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-search ui-btn-b ui-mini">Consultar</a>
            <a href="add_libros.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-plus ui-btn-b ui-mini">Agregar</a>
            <a href="act_libro.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-refresh ui-btn-b ui-mini">Actualizar</a>
            <a href="del_libro.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-delete ui-btn-b ui-mini">Eliminar</a>
            <div style="width:450px">
                <hr>
                <button class="ui-btn ui-icon-plus ui-btn-icon-left ui-btn-a ui-mini">Agregar tema a libros</button>

                <a href="show_trata_sobre.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-search ui-btn-b ui-mini">Consultar</a>
                <a href="add_trata_sobre.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-plus ui-btn-b ui-mini">Agregar</a>
                <a href="act_trata_sobre.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-refresh ui-btn-b ui-mini">Actualizar</a>                
                <hr>

                <button class="ui-btn ui-icon-plus ui-btn-icon-left ui-btn-a ui-mini">Agregar autores a libros</button>

                <a href="show_escritor.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-search ui-btn-b ui-mini">Consultar</a>
                <a href="add_escritor.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-plus ui-btn-b ui-mini">Agregar</a>
                <a href="act_escritor.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-refresh ui-btn-b ui-mini">Actualizar</a>
                <hr>
            </div>

            <button class="ui-btn ui-icon-grid ui-btn-icon-left ui-shadow-icon ui-btn-a ui-mini">Ejemplares</button>

            <a href="show_ejemplar.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-search ui-btn-b ui-mini">Consultar</a>
            <a href="add_ejemplares.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-plus ui-btn-b ui-mini">Agregar</a>
            <a href="act_ejemplar.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-refresh ui-btn-b ui-mini">Actualizar</a>
            <a href="del_ejemplar.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-delete ui-btn-b ui-mini">Eliminar</a>


            <button class="ui-btn ui-icon-mail ui-btn-icon-left ui-shadow-icon ui-btn-a ui-mini">Prestamos</button>

            <a href="show_prestamo.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-search ui-btn-b ui-mini">Consultar</a>
            <a href="add_prestamos.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-plus ui-btn-b ui-mini">Agregar</a>
            <a href="act_prestamo.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-refresh ui-btn-b ui-mini">Actualizar</a>
            <a href="del_prestamo.php" class="ui-btn ui-btn-icon-right ui-btn-inline ui-icon-delete ui-btn-b ui-mini">Eliminar</a>

            <br><br>
            <br><hr>
            <a href='logout.php' class='ui-btn ui-btn-icon-right ui-btn-inline ui-icon-power ui-btn-b ui-mini'>Salir</a>
        </div>
    </body>
</html




    
