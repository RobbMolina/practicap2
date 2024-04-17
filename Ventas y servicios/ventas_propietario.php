<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materiales Guzman Ventas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style_ventas2.css">
    <script src="https://kit.fontawesome.com/11955708c4.js" crossorigin="anonymous"></script>
</head>
<!--COMIENZA EL APARTADO DE LA BARRA LATERAL-->

<body>
    <div class="sidebar">
        <ul>
            <li onclick="location.href='../Inicio/inicio_propietario.php'">Inicio</li>
            <li onclick="location.href='../Inventario/inventario_propietario.php'">Inventario</li>
            <li onclick="location.href='../Ventas y servicios/ventas_propietario.php'"> Registro Ventas </li>
            <li onclick="location.href='../Nueva venta/nueva_venta_propietario.php'"> Nueva Venta </li>
            <li onclick="location.href='../corte/corte.php'"> Cortes </li>
            <li onclick="location.href='../empleados/empleados.php'"> Empleados </li>
            <li class="cerrarsesion" onclick="location.href='../Login y Logout/logout.php'"> Cerrar sesión</li>
        </ul>
    </div>
    <!--APARTADO DE LA BARRA SUPERIOR-->
    <div class="container">
        <div class="navbar">
            <div id="icon" class="logo">
                <span>&#9776;</span>
            </div>
            <h1>Materiales Guzman | Registro de Ventas</h1>
        </div>
        <!--TODO EL CONTENIDO SE DEBE DE PONER DENTRO DE LA CLASS MAIN, YA QUE ES LA QUE HACE QUE SE ADAPTE AL MOVIMIENTO DE LA BARRA-->
        <div class="main">
            <?php include('../db.php'); ?>
            <div class="info">
                <div class="ventas_totales"> Ventas totales del dia: </div>
                <div class="fecha">
                    <script>
                        date = new Date().toLocaleDateString();
                        document.write(date);
                    </script>
                </div>
            </div>
            
            
            <dialog class="modal">
                <div class="btn-cerrar">x</div>
                <div style="font-weight: bold; margin-bottom: 2rem;">Nueva venta</div>
                <div>
                    <form action="save_ventas.php" method="POST">
                        <div class="box_inputs">                            
                            <p>
                                <input type="text" name="Codigo" placeholder="Codigo del producto" autofocus>
                            </p>                            
                            <p>
                                <input type="number" name="Cantidad" placeholder="Cantidad" autofocus>
                            </p>
                            <p>
                                <input type="date" name="Fecha" placeholder="Fecha" autofocus>
                            </p>                            
                        </div>
                        <button type="submit" name='save'>Realizar venta</button>
                    </form>
                </div>
            </dialog>



            
            <div>
                <table id="ventas">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre del producto</th>
                            <th>Código</th>
                            <th>Precio de venta</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th>Fecha</th>                            
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM venta";
                        $result_usuario = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result_usuario)) { ?>
                            <!--recorro mi tabla usuario-->
                            <tr>
                                <td>
                                    <?php echo $row['ID_venta']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Nombre_producto']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Codigo']; ?>
                                </td>
                                <td>
                                    <?php echo '$'.$row['Precio_venta']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Cantidad']; ?>
                                </td>
                                <td>
                                    <?php echo '$'.$row['total']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Fecha']; ?>
                                </td>
                                
                                <td>
    
                                    <a href="delete_ventas.php?ID_venta=<?php echo $row['ID_venta'] ?>"><i class="fa-solid fa-trash" style="color: #ce4040;"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div>
                <table id="servicios" class="hide">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Servicio</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Fecha</th>                           
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM servicios";
                        $result_usuario = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result_usuario)) { ?>
                            <!--recorro mi tabla servicios-->
                            <tr>
                                <td>
                                    <?php echo $row['id']; ?>
                                </td>
                                <td>
                                    <?php echo $row['servicio']; ?>
                                </td>
                                <td>
                                    <?php echo $row['producto']; ?>
                                </td>
                                <td>
                                    <?php echo '$'.$row['precio']; ?>
                                </td>
                                <td>
                                    <?php echo $row['fecha']; ?>
                                </td>                                
                                <td>
                                    <a href="delete_servicios.php?id=<?php echo $row['id'] ?>"><i class="fa-solid fa-trash" style="color: #ce4040;"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="backdrop"></div>
    <script src="../funcionesV2ventas.js" charset="UTF-8"> </script>
</body>

</html>