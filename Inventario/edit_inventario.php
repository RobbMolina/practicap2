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
    <link rel="stylesheet" href="../Ventas y servicios/style_ventas.css">
</head>
    <!--COMIENZA EL APARTADO DE LA BARRA LATERAL-->
<body>
    <div class="sidebar">
        <ul>
          <li onclick="location.href='../Inicio/inicio_trabajador.php'">Inicio</li>
          <li onclick="location.href='../Inventario/inventario_trabajador.php'">Inventario</li>
          <li onclick="location.href='../Ventas y servicios/ventas_trabajador.php'"> Ventas </li>
          <li class="cerrarsesion" onclick="location.href='../Login y Logout/logout.php'"> Cerrar sesión</li>
        </ul>
    </div>
        <!--APARTADO DE LA BARRA SUPERIOR-->
    <div class="container">
        <div class="navbar">
            <h1>KarClemen Multiservicios  | Editar inventario</h1>
            </div>
<?php
include("../db.php");
$Nombre_producto = '';
$Codigo= '';
$Descripcion = '';
$Precio_compra= '';
$Precio_venta = '';
$Categoria = '';
$Cantidad='';


if  (isset($_GET['Codigo'])) {
  $Codigo = $_GET['Codigo'];
  $query = "SELECT * FROM inventario";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $Nombre_producto = $row['Nombre_producto'];
    $Codigo = $row['Codigo'];
    $Descripcion = $row['Descripcion'];
    $Precio_compra = $row['Precio_compra'];
    $Precio_venta = $row['Precio_venta'];
    $Categoria = $row['Categoria'];
    $Cantidad = $row['Cantidad'];
  }
}
if (isset($_POST['update'])) {
  $Codigo = $_GET['Codigo'];
  $Nombre_producto = $_POST['Nombre_producto'];
    $Codigo_nuevo = $_POST['Codigo'];
    $Descripcion = $_POST['Descripcion'];
    $Precio_compra = $_POST['Precio_compra'];
    $Precio_venta = $_POST['Precio_venta'];
    $Categoria = $_POST['Categoria'];
    $Cantidad = $_POST['Cantidad'];
  $query = "UPDATE inventario set Nombre_producto = '$Nombre_producto', Codigo = '$Codigo_nuevo', Descripcion = '$Descripcion', Precio_compra = '$Precio_compra', Precio_venta= '$Precio_venta', Categoria = '$Categoria', Cantidad = '$Cantidad' WHERE Codigo=$Codigo";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Producto actualizado con exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: inventario_trabajador.php');
}
if (isset($_POST['salir'])) {
  
  header('Location: inventario_trabajador.php');
}

?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_inventario.php?Codigo=<?php echo $_GET['Codigo']; ?>" method="POST">
      <div class="box_editar">
                <form action="edit_inventario.php?Codigo=<?php echo $_GET['Codigo']; ?>" method="POST">
                  <div >
                    <p>
                      <input type="text" name="Nombre_producto" placeholder="Nombre del producto" autofocus>
                    </p>
                    <p>
                      <input type="text" name="Codigo" placeholder="Código" autofocus>
                    </p>
                    <p>
                      <input type="text" name="Descripcion" placeholder="Descripción" autofocus>
                    </p>
                    <p>
                      <input type="text" name="Precio_compra" placeholder="Precio de compra" autofocus>
                    </p>
                    <p>
                      <input type="text" name="Precio_venta" placeholder="Precio de venta" autofocus>
                    </p>
                    <p>
                      <input type="text" name="Categoria" placeholder="Categoría" autofocus>
                    </p>
                    <p>
                      <input type="text" name="Cantidad" placeholder="Cantidad" autofocus>
                    </p>
                  </div>
                  <button class="btn-success" name="update"> Actualizar </button>
                  <button name="salir"> Cancelar </button>
                </form>
              </div>
      </div>
    </div>
  </div>
</div>
