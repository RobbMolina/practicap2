<?php 

include("../db.php");

if(isset($_POST['save'])) { //si existe save, guardar en cada variable los datos ingresados por el usuario
    if(empty($_POST['Servicio']) || empty($_POST['Codigo']) || empty($_POST['Precio'])) {
        $_SESSION['message'] = "Por favor complete todos los campos.";
        $_SESSION['message_type'] = 'danger';
        header("Location: ventas_trabajador.php");
        exit(); // detener la ejecución del script para evitar que se procesen datos vacíos
    }
    //guardo cada dato ingredado
    $Servicio=$_POST['Servicio'];
    $Codigo=$_POST['Codigo'];
    $Precio=$_POST['Precio'];
    $Fecha=$_POST['Fecha'];

    $query = mysqli_query($conn,"SELECT * FROM inventario WHERE Codigo = $Codigo");
    $array = mysqli_fetch_assoc($query);

    $Producto = $array['Nombre_producto'];

    $query="INSERT INTO servicios(servicio, producto, precio, fecha) VALUES ('$Servicio', '$Producto', '$Precio', '$Fecha')"; //guardo cada variable en la tabla usuario de mi base de datos
    $result=mysqli_query($conn, $query); 

    if (!$result) { //si result no es cierto dar un mensaje de fail
        die("Fail");
    }
    

    $_SESSION['message'] = "Guardado con éxito.";
    $_SESSION['message_type'] = 'success';


    header("Location: ventas_trabajador.php");


}

?>