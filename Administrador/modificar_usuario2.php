<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador/modificar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style_admin.css">
</head>

<body>
    <!--COMIENZA EL APARTADO DE LA BARRA LATERAL-->
    <div class="sidebar">
        <ul>
            <li onclick="location.href='../Inicio/inicio_admin.php'">Inicio</li>
            <li onclick="location.href='../Administrador/Crear_usuarios.php'">Crear usuario</li>
            <li onclick="location.href='../Administrador/eliminar_usuario.php'"> Eliminar usuario </li>
            <li onclick="location.href='../Administrador/modificar_usuario.php'"> Modificar usuario </li>
            <li class="cerrarsesion" onclick="location.href='../Login y Logout/logout.php'"> Cerrar sesión</li>
        </ul>
    </div>
    <!--APARTADO DE LA BARRA SUPERIOR-->
    <div class="container">
        <div class="navbar">
            <div  id="icon" class="logo">
                <span>&#9776;</span>
            </div>
            <h1>Materiales Guzman | Modificar usuario</h1>
        </div>
        <!--TODO EL CONTENIDO SE DEBE DE PONER DENTRO DE LA CLASS MAIN, YA QUE ES LA QUE HACE QUE SE ADAPTE AL MOVIMIENTO DE LA BARRA-->
        <div class="main">  
            <div class="botones2">
                <img src="usuario.png" alt="">
            </div>   
            <div class="boxmain2"> 
                <div>Permiso 1: <input type="text"><button class="boton-crear2" name="create"> Activado </button></div>
                <div>Permiso 2: <input type="text"><button class="boton-crear2" name="create"> Activado </button></div>
                <div>Permiso 3: <input type="text"><button class="boton-crear2" name="create"> Activado </button></div>
                <div>Permiso 4: <input type="text"><button class="boton-crear2" name="create"> Activado </button></div>
            </div>
            <a href="modificar_usuario.php"><button class="boton-crear2" name="create" style="margin-left:1000px"> Regresar </button></a>
            <a href="modificar_usuario.php"><button class="boton-crear2" name="cancel"> Continuar </button></a>
        </div>
            
            
    </div>
    <div class="backdrop"></div>

    <script src="../funcionesV2.js" charset="UTF-8"> </script>
</body>
</html>