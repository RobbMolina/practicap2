<?php 

include("../db.php");

if(isset($_POST['save'])) { //si existe save, guardar en cada variable los datos ingresados por el usuario
    if(empty($_POST['Nombre_producto']) || empty($_POST['Codigo']) || empty($_POST['Descripcion']) || empty($_POST['Precio_compra']) || empty($_POST['Precio_venta']) || empty($_POST['Categoria']) || empty($_POST['Cantidad'])) {
        $_SESSION['message'] = "Por favor complete todos los campos.";
        $_SESSION['message_type'] = 'danger';
        header("Location: inventario_trabajador.php");
        exit(); // detener la ejecución del script para evitar que se procesen datos vacíos
    }

    $Nombre_producto=$_POST['Nombre_producto'];  //guardo cada dato ingredado
    $Codigo=$_POST['Codigo'];
    $Descripcion=$_POST['Descripcion']; 
    $Precio_compra=$_POST['Precio_compra'];
    $Precio_venta=$_POST['Precio_venta'];
    $Categoria=$_POST['Categoria'];
    $Cantidad=$_POST['Cantidad'];

    $query="INSERT INTO inventario(Nombre_producto, Codigo, Descripcion, Precio_compra, Precio_venta,Categoria, Cantidad) VALUES ('$Nombre_producto', '$Codigo', '$Descripcion', '$Precio_compra', '$Precio_venta', '$Categoria', '$Cantidad')"; //guardo cada variable en la tabla usuario de mi base de datos
    $result=mysqli_query($conn, $query); 

    if (!$result) { //si result no es cierto dar un mensaje de fail
        die("Fail");
    }
    

    $_SESSION['message'] = "Guardado con éxito.";
    $_SESSION['message_type'] = 'success';


    header("Location: inventario_trabajador.php");
}

?>