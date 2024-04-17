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
    <link rel="stylesheet" href="style_inventario.css">
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
            <h1>Materiales Guzman | Inventario</h1>
        </div>
        <!--TODO EL CONTENIDO SE DEBE DE PONER DENTRO DE LA CLASS MAIN, YA QUE ES LA QUE HACE QUE SE ADAPTE AL MOVIMIENTO DE LA BARRA-->
        <div class="main">
            <?php include('../db.php'); ?>
            <div class="opciones">
                <input type="text" placeholder="Buscar" class="searchbar">
                <div class="btn-abrirmodal"> + Producto </div>
            </div>
            
            <dialog class="modal">
                <div class="btn-cerrar">x</div>
                <div style="font-weight: bold; margin-bottom: 2rem;">Nuevo producto</div>
                <div>
                    <form action="save_inventario.php" method="POST">
                        <div>
                            <p>
                                <input type="text" name="Nombre_producto" class="form-control" placeholder="Nombre del producto" autofocus>
                            </p>
                            <p>
                                <input type="text" name="Codigo" class="form-control" placeholder="Código" autofocus>
                            </p>
                            <p>
                                <input type="text" name="Descripcion" class="form-control" placeholder="Descripción" autofocus>
                            </p>
                            <p>
                                <input type="number" name="Precio_compra" class="form-control" placeholder="Precio de compra" autofocus>
                            </p>
                            <p>
                                <input type="number" name="Precio_venta" class="form-control" placeholder="Precio de venta" autofocus>
                            </p>
                            <p>
                                <input type="text" name="Categoria" class="form-control" placeholder="Categoría" autofocus>
                            </p>
                            <p>
                                <input type="number" name="Cantidad" class="form-control" placeholder="Cantidad" autofocus>
                            </p>
                        </div>

                        <button type="submit" name='save'>Guardar</button>
                    </form>
                </div>
            </dialog>
            <table>
                <thead>
                    <tr>
                        <th>Nombre del producto</th>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Precio de compra</th>
                        <th>Precio de venta</th>
                        <th>Categoría</th>
                        <th>Cantidad</th>
                        <th></th>
                    </tr>
                </thead>
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
                                <?php echo $row['Descripcion']; ?>
                            </td>
                            <td>
                                <?php echo '$'.$row['Precio_compra']; ?>
                            </td>
                            <td>
                                <?php echo '$'.$row['Precio_venta']; ?>
                            </td>
                            <td>
                                <?php echo $row['Categoria']; ?>
                            </td>
                            <td>
                                <?php echo $row['Cantidad']; ?>
                            </td>
                            <td>
                                <a href="edit_inventario.php?Codigo= <?php echo $row['Codigo'] ?>"><i class="fa-solid fa-pen-to-square" style="color: #396bc0;"></i></a>
                                <a href="delete_inventario.php?Codigo=<?php echo $row['Codigo'] ?>"><i class="fa-solid fa-trash" style="color: #ce4040;"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <div class="backdrop"></div>
    <script src="../funcionesV2.js" charset="UTF-8"> </script>
</body>

</html>