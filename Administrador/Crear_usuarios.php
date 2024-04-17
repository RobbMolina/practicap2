<?php

    $conn=mysqli_connect('localhost','root','','materiales guzman');
    
    if(!empty($_POST["registro"])){
        if(empty($_POST["usuario"]) or empty($_POST["contraseña"]) or empty($_POST["jerarquia"]) or empty($_POST["nombres"])or empty($_POST["apellidos"])or empty($_POST["correo"]) or empty($_POST["telefono"])){
            echo '<div> Uno de los campos esta vacio </div>';
        }else{
            $usuario=$_POST["usuario"];
            $contraseña=$_POST["contraseña"];
            $jerarquia=$_POST["jerarquia"];
            $nombres=$_POST["nombres"];
            $apellidos=$_POST["apellidos"];
            $correo=$_POST["correo"];
            $telefono=$_POST["telefono"];
            $sql=$conn->query(" insert into usuarios(usuario,contraseña,jerarquia,nombres,apellidos,correo,telefono)values('$usuario','$contraseña','$jerarquia','$nombres','$apellidos','$correo','$telefono')");
            if($sql==1){
                echo '<div> Usuario registrado correctamente </div>';
            }else{
                echo '<div> Error al registrar usurio </div>';

            }
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador/crear</title>
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
            <h1>Materiales Guzman | Crear usuario</h1>
        </div>
        <!--TODO EL CONTENIDO SE DEBE DE PONER DENTRO DE LA CLASS MAIN, YA QUE ES LA QUE HACE QUE SE ADAPTE AL MOVIMIENTO DE LA BARRA-->
        <div class="main">  
            <form method="POST" action="" class="forum">
            <div class="tt">DATOS DE USUARIO</div>
            <br>
            <table>
                <tr>
                    <td>Nombre de usuario : </td>
                    <td><input type="text" name="usuario" class="textInput"></td>
                </tr>
                <tr>
                    <td>Contraseña : </td>
                    <td><input type="password" name="contraseña" class="textInput"></td>
                </tr>
                <tr>
                    <td>Tipo de usuario : </td>
                    <td><input type="text" name="jerarquia" class="textInput"></td>
                </tr>
            </table>
            <br>
            <div  class="tt">DATOS PERSONALES</div>
            <br>
            <table> 
                <tr>
                    <td>Nombre(s) : </td>
                    <td><input type="text" name="nombres" class="textInput"></td>
                </tr>
                <tr>
                    <td>Apellido(s) : </td>
                    <td><input type="text" name="apellidos" class="textInput"></td>
                </tr>
                <tr>
                    <td>correo : </td>
                    <td><input type="correo" name="correo" class="textInput"></td>
                </tr>
                <tr>
                    <td>Telefono: </td>
                    <td><input type="text" name="telefono" class="textInput"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="registro"></td>
                </tr>
            </table>

            </form>
            </div>

            </main>
            </div>

            </body>
            </html>
        </div>
    <div class="backdrop"></div>

    <script src="../funcionesV2.js" charset="UTF-8"> </script>
</body>
</html>