<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materiales Guzman Nueva Venta</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style_nuevaventa.css">
    <script src="https://kit.fontawesome.com/11955708c4.js" crossorigin="anonymous"></script>
</head>
<!--COMIENZA EL APARTADO DE LA BARRA LATERAL-->

<body>
    <div class="sidebar">
        <ul>
            <li onclick="location.href='../Inicio/inicio_trabajador.php'">Inicio</li>
            <li onclick="location.href='../Inventario/inventario_trabajador.php'">Inventario</li>
            <li onclick="location.href='../Ventas y servicios/ventas_trabajador.php'">Registro Ventas </li>
            <li onclick="location.href='../Ventas y servicios/ventas_trabajador.php'"> Nueva Venta </li>
            <li class="cerrarsesion" onclick="location.href='../Login y Logout/logout.php'"> Cerrar sesión</li>
        </ul>
    </div>
    <!--APARTADO DE LA BARRA SUPERIOR-->
    <div class="container">
        <div class="navbar">
            <div id="icon" class="logo">
                <span>&#9776;</span>
            </div>
            <h1>Materiales Guzman | Nueva Venta</h1>
        </div>
        <!--TODO EL CONTENIDO SE DEBE DE PONER DENTRO DE LA CLASS MAIN, YA QUE ES LA QUE HACE QUE SE ADAPTE AL MOVIMIENTO DE LA BARRA-->
        <div class="main" style="flex: 1; display:flex">
            <div class="izquierda">
                <input type="text" placeholder="Buscar" class="searchbar">
                <?php include('../db.php'); ?>
                <table>
                    <thead>
                        <tr>
                            <th>Nombre del producto</th>
                            <th>Código</th>
                            <th>Precio de venta</th>
                            <th>Categoría</th>
                            <th>Disponibles</th>
                        </tr>
                    </thead>
                </table>
                
                <div class="table-wrapper">
                    <table id="content">
                        <tbody id="tablecontent">
                            <?php
                            $query = "SELECT * FROM inventario";
                            $result_usuario = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result_usuario)) { ?>
                                <!--recorro mi tabla usuario-->
                                <tr>
                                    <td>
                                        <?php echo $row['Nombre_producto']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['Codigo']; ?>
                                    </td>
                                    <td>
                                        <?php echo '$' . $row['Precio_venta']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['Categoria']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['Cantidad']; ?>
                                    </td>
                                    <td>
                                        <div class="btn">
                                            Añadir
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>


            </div>

            <div class="derecha">
                <div class="productos">
                    <table>
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="tablecontent">

                        </tbody>
                    </table>

                </div>
                <hr style="width: 100%">
                <div class="cantidades" style="display:flex">
                    <div style="flex-grow:1">
                        <div class="element">
                            Subtotal:
                        </div>
                        <div class="element">
                            IVA:
                        </div>
                        <div class="element">
                            Total:
                        </div>
                    </div>
                    <div>
                        <div class="element">
                            $1000
                        </div>
                        <div class="element">
                            $160
                        </div>
                        <div class="element">
                            $1160
                        </div>
                    </div>
                </div>
                <div class="btn">
                    Realizar venta
                </div>
            </div>
        </div>
    </div>
    <div class="backdrop"></div>
    <script src="../funcionesV2ventas.js" charset="UTF-8"> </script>
</body>

</html>