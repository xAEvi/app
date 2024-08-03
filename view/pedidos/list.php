<?php if (!isset($_SESSION)) { session_start(); } ?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Pedidos</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
    <h2>Lista de Pedidos</h2>
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
                    <?php if (isset($_SESSION['rol']) && ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2)) { ?>
                        <a href="index.php?c=Pedidos&f=aceptarPedido&id=<?php echo $pedido->getId(); ?>" onclick="return confirm('¿Está seguro de aceptar este pedido?')">Aceptar</a>
                        <a href="index.php?c=Pedidos&f=rechazarPedido&id=<?php echo $pedido->getId(); ?>" onclick="return confirm('¿Está seguro de rechazar este pedido?')">Rechazar</a>
                    <?php } ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
