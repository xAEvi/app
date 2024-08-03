<?php if (!isset($_SESSION)) { session_start(); } ?>

<?php require_once HEADER; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Pedidos</title>
    <style>
        body {
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .btn-back {
            background-color: #f06292;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            margin-bottom: 20px;
            display: inline-block;
        }

        .btn-back:hover {
            background-color: #e91e63;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 8px 0;
            font-size: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        table thead tr {
            background-color: #ffcccb;
            text-align: left;
            font-weight: bold;
        }

        table th, table td {
            padding: 10px 13px;
        }

        table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        table tbody tr:last-of-type {
            border-bottom: 2px solid #ffcccb;
        }

        table tbody tr:hover {
            background-color: #f3f3f3;
        }

        table th {
            border: none;
        }

        a {
            color: #f06292;
            text-decoration: none;
            font-size: 14px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($_SESSION['rol']) && ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2)) { ?>
        <h2>Lista de Pedidos</h2>
        <a class="btn-back" href="index.php">Regresar</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Usuario</th>
                    <th>ID Propiedad</th>
                    <th>Fecha Pedido</th>
                    <th>Duración Alquiler</th>
                    <th>Estado Pedido</th>
                    <th>Fecha Inicio</th>
                    <th>Tipo Pago</th>
                    <th>Comentario</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pedidos as $pedido): ?>
                <tr>
                    <td><?php echo $pedido->getId(); ?></td>
                    <td><?php echo $pedido->getIdUsuario(); ?></td>
                    <td><?php echo $pedido->getIdPropiedad(); ?></td>
                    <td><?php echo $pedido->getFechaPedido(); ?></td>
                    <td><?php echo $pedido->getDuracionAlquiler(); ?></td>
                    <td><?php echo $pedido->getEstadoPedido(); ?></td>
                    <td><?php echo $pedido->getFechaInicio(); ?></td>
                    <td><?php echo $pedido->getTipoPago(); ?></td>
                    <td><?php echo $pedido->getComentario(); ?></td>
                    <td><?php echo $pedido->getEstado(); ?></td>
                    <td>
                        <a href="index.php?c=Pedidos&f=Edit&id=<?php echo $pedido->getId(); ?>">Editar</a>
                        <a href="index.php?c=Pedidos&f=Delete&id=<?php echo $pedido->getId(); ?>" onclick="return confirm('¿Está seguro de eliminar este pedido?')">Eliminar</a>
                        <a href="index.php?c=Pedidos&f=View&id=<?php echo $pedido->getId(); ?>">Ver</a>
                        <a href="index.php?c=Pedidos&f=aceptarPedido&id=<?php echo $pedido->getId(); ?>" onclick="return confirm('¿Está seguro de aceptar este pedido?')">Aceptar</a>
                        <a href="index.php?c=Pedidos&f=rechazarPedido&id=<?php echo $pedido->getId(); ?>" onclick="return confirm('¿Está seguro de rechazar este pedido?')">Rechazar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php } ?>
        
        <?php if (isset($_SESSION['rol']) && ($_SESSION['rol'] == 3)) { ?>
        <h2>Mis Pedidos</h2>
        <a class="btn-back" href="index.php">Regresar</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Propiedad</th>
                    <th>Fecha Pedido</th>
                    <th>Duración Alquiler</th>
                    <th>Estado Pedido</th>
                    <th>Fecha Inicio</th>
                    <th>Tipo Pago</th>
                    <th>Comentario</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($misPedidos as $pedido): ?>
                <tr>
                    <td><?php echo $pedido->getId(); ?></td>
                    <td><?php echo $pedido->getIdPropiedad(); ?></td>
                    <td><?php echo $pedido->getFechaPedido(); ?></td>
                    <td><?php echo $pedido->getDuracionAlquiler(); ?></td>
                    <td><?php echo $pedido->getEstadoPedido(); ?></td>
                    <td><?php echo $pedido->getFechaInicio(); ?></td>
                    <td><?php echo $pedido->getTipoPago(); ?></td>
                    <td><?php echo $pedido->getComentario(); ?></td>
                    <td><?php echo $pedido->getEstado(); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php } ?>
    </div>
</body>
</html>

<?php require_once FOOTER; ?>
