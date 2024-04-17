<?php
    include('../db.php');

    if (isset($_GET['ID_venta'])) {
        $ID_venta = $_GET['ID_venta'];
        $query = "DELETE FROM venta WHERE ID_venta = $ID_venta"; //eliminar lo que esté almacenado en el ID_venta que me da la variable
        $result = mysqli_query($conn, $query);

        if (!$result) {

            die("Fail"); //si no existe resultado mostrar mensaje fail
        }
            // si si existe mostar un mensaje y volver a la pàgina principal

        $_SESSION['message'] = 'Los datos se eliminaron satisfactoriamente.';
        $_SESSION['message_type'] = 'danger'; //color del mensaje
        header('Location: ventas_trabajador.php');  
    }

?>

