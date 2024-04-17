<?php

//connect to database
$db=mysqli_connect('localhost','root','','materiales guzman');
if($db)
{
  if(isset($_POST['loginbutton']))
  {
      $username=mysqli_real_escape_string($db,$_POST['username']);
      $password=mysqli_real_escape_string($db,$_POST['password']);
      //$password=md5($password); 
      $sql="SELECT * FROM usuarios WHERE  usuario='$username' AND contraseña='$password'";
      $result=mysqli_query($db,$sql); 
      
      if($result)
      {     
        if( mysqli_num_rows($result)>=1)
        {
          session_start();
          $sql="SELECT ID,usuario,jerarquia FROM usuarios WHERE  usuario='$username' AND contraseña='$password'";
          $result=mysqli_query($db,$sql); 
          while($fila=$result->fetch_assoc()){
            $_SESSION['jerarquia']=$fila['jerarquia'];
            $_SESSION['id']=$fila['ID'];
            $_SESSION['usuario']=$fila['usuario'];
            $_SESSION['auth']=true;

          }
          switch(intval($_SESSION['jerarquia'])){
            case 1:
              header("location:../Inicio/inicio_admin.php");
              break; 
            case 2:
                header("location:../Inicio/inicio_propietario.php");
                break; 
            case 3:
              header("location:../Inicio/inicio_trabajador.php");
              break;
             
          }
        }
        }
       else
       {
          $_SESSION['alert']="Usuario o contraseña incorrecta";
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
    <title>Iniciar sesion </title>
    <link rel="stylesheet" href="diseño_login.css">
    <script src="https://kit.fontawesome.com/11955708c4.js" crossorigin="anonymous"></script>
</head>

<body>
    
    <div class="login-container">
        <div>
            <img src="../media/ferimglogo.jpg" width="300px" height="300px">
        </div>

        <form method="post" action="login.php">
            <p>Usuario</p>
            <i class="fa-solid fa-user" style="color: #3d485c;"></i>
            <input class="inputs" placeholder="Usuario" name="username">
            <p>Contraseña</p>
            <i class="fa-solid fa-lock" style="color: #3d485c;"></i>
            <input class="inputs" type ="password" placeholder="Contraseña" name="password">
            <?php
              if (isset($_SESSION['alert'])) {
                echo "<div class='alerta'>".$_SESSION['alert']."</div>";
                unset($_SESSION['alert']); 
              }
            ?> 
            <button class="boton-login" name="loginbutton"> Iniciar sesion </button>
        </form>
    </div>
 
</body>
</html>
