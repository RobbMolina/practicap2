<?php session_start();
if(!$_SESSION['auth']??false && $_SESSION['jerarquia']!='3') {
    header("location: /PROYECTOV2/Landing%20page/landing_page.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio administrador</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style_inicioV2.css">
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
            <h1>Materiales Guzman | Inicio </h1>
        </div>
        <!--TODO EL CONTENIDO SE DEBE DE PONER DENTRO DE LA CLASS MAIN, YA QUE ES LA QUE HACE QUE SE ADAPTE AL MOVIMIENTO DE LA BARRA-->
        <div class="main">  
            <div class="img-con">
            <img src="../MEDIA/icono_perfil-removebg-preview.png" alt="">
            <div class="bienvenido">Bienvenido <?php echo $_SESSION['usuario']?> </div>
            </div>
            
            
    </div>
    <div class="backdrop"></div>

    <script src="../funcionesV2.js" charset="UTF-8"> </script>
</body>
</html>