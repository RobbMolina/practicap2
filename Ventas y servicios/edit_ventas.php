

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KarClemen Ventas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style_ventas.css">
</head>
    <!--COMIENZA EL APARTADO DE LA BARRA LATERAL-->
<body>
    <div class="sidebar">
        <ul>
            <li onclick="location.href='inicio_trabajador.php'">Inicio</li>
            <li>Inventario</li>
            <li onclick="location.href='ventas_trabajador.php'"> Ventas </li>
            <li>Servicios</li>
            <li class="cerrarsesion" onclick="location.href='logout.php'"> Cerrar sesión</li>
        </ul>
    </div>
        <!--APARTADO DE LA BARRA SUPERIOR-->
    <div class="container">
        <div class="navbar">
            <h1>KarClemen Multiservicios  | Editar venta</h1>
            </div>
        <!--TODO EL CONTENIDO SE DEBE DE PONER DENTRO DE LA CLASS MAIN, YA QUE ES LA QUE HACE QUE SE ADAPTE AL MOVIMIENTO DE LA BARRA-->
        <?php
          include("../db.php");
          $Nombre_producto = '';
          $Codigo= '';
          $Precio_venta = '';
          $Cantidad= '';
          $Fecha = '';
          $ID_usuario = '';


          if  (isset($_GET['ID_venta'])) {
            $ID_venta = $_GET['ID_venta'];
            $query = "SELECT * FROM venta";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) == 1) {
              $row = mysqli_fetch_assoc($result);
              $Nombre_producto = $row['Nombre_producto'];
              $Codigo = $row['Codigo'];
              $Precio_venta = $row['Precio_venta'];
              $Cantidad = $row['Cantidad'];
              $Fecha = $row['Fecha'];
              $ID_usuario = $row['ID_usuario'];
            }
          }
          if (isset($_POST['update'])) {
            $ID_venta = $_GET['ID_venta'];
            $Nombre_producto = $_POST['Nombre_producto'];
              $Codigo = $_POST['Codigo'];
              $Precio_venta = $_POST['Precio_venta'];
              $Cantidad = $_POST['Cantidad'];
              $Fecha = $_POST['Fecha'];
              $ID_usuario = $_POST['ID_usuario'];
            $query = "UPDATE venta set Nombre_producto = '$Nombre_producto', Codigo = '$Codigo', Precio_venta = '$Precio_venta', Cantidad = '$Cantidad', Fecha= '$Fecha', ID_usuario = '$ID_usuario'WHERE ID_venta=$ID_venta";
            mysqli_query($conn, $query);
            $_SESSION['message'] = 'Venta modificada con exito';
            $_SESSION['message_type'] = 'warning';
            header('Location: ventas_trabajador.php');
          }
          ?>
              <div class="box_editar">
                <form action="edit_ventas.php?ID_venta=<?php echo $_GET['ID_venta']; ?>" method="POST">
                  <div >
                    <p>
                      <input type="text" name="Nombre_producto" placeholder="Nombre del producto" autofocus>
                    </p>
                    <p>
                      <input type="text" name="Codigo" placeholder="Codigo" autofocus>
                    </p>
                    <p>
                      <input type="text" name="Precio_venta" placeholder="Precio_venta" autofocus>
                    </p>
                    <p>
                      <input type="text" name="Cantidad" placeholder="Cantidad" autofocus>
                    </p>
                    <p>
                      <input type="text" name="Fecha" placeholder="Fecha" autofocus>
                    </p>
                    <p>
                      <input type="text" name="ID_usuario" placeholder="ID_usuario" autofocus>
                    </p>
                  </div>
                  <button name="update"> Actualizar </button>
                  <button onclick="location.href='ventas_trabajador.php'"> Cancelar </button>
                </form>
              </div>
      </body>
    </html>               