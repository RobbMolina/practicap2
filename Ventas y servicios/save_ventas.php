<?php 

include("../db.php");

if(isset($_POST['save'])) { //si existe save, guardar en cada variable los datos ingresados por el usuario
    if(empty($_POST['Codigo']) || empty($_POST['Cantidad']) || empty($_POST['Fecha'])) {
        $_SESSION['message'] = "Por favor complete todos los campos.";
        $_SESSION['message_type'] = 'danger';
        header("Location: ventas_trabajador.php");
        exit(); // detener la ejecución del script para evitar que se procesen datos vacíos
    }
    //guardo cada dato ingredado
    $Codigo=$_POST['Codigo'];
    $Cantidad=$_POST['Cantidad'];
    $Fecha=$_POST['Fecha'];

    $query = mysqli_query($conn,"SELECT * FROM inventario WHERE Codigo = $Codigo");
    $array = mysqli_fetch_assoc($query);

    $Nombre = $array['Nombre_producto'];
    $PrecioVenta = $array['Precio_venta'];
    $Total = $PrecioVenta * $Cantidad;



    $query="INSERT INTO venta(Nombre_producto, Codigo, Precio_venta, Cantidad, Fecha, total) VALUES ('$Nombre', '$Codigo', '$PrecioVenta', '$Cantidad', '$Fecha', '$Total')"; //guardo cada variable en la tabla usuario de mi base de datos
    $result=mysqli_query($conn, $query); 

    if (!$result) { //si result no es cierto dar un mensaje de fail
        die("Fail");
    }
    

    $_SESSION['message'] = "Guardado con éxito.";
    $_SESSION['message_type'] = 'success';


    header("Location: ventas_trabajador.php");

    $sql="CALL restarStock('".$_POST['Codigo']."', '".$_POST['Cantidad']."')";
    $result=mysqli_query($conn, $sql);

}

?>