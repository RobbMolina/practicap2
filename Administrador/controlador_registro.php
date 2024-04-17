<?php

    $db=mysqli_connect('localhost','root','','materiales guzman');
    
    if(!empty($_POST["registro"])){
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
    ?>