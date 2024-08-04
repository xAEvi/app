<!-- Autor: WALTER ALEJANDRO DUCHI RIVERA -->

<?php require_once HEADER; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Ver Pedido</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
    <h2>Ver Pedido</h2>
    <table>
        <tr>
            <th>ID</th>
            <td><?php echo $pedido->getId(); ?></td>
        </tr>
        <tr>
            <th>ID Usuario</th>
            <td><?php echo $pedido->getIdUsuario(); ?></td>
        </tr>
        <tr>
            <th>ID Propiedad</th>
            <td><?php echo $pedido->getIdPropiedad(); ?></td>
        </tr>
        <tr>
            <th>Fecha Pedido</th>
            <td><?php echo $pedido->getFechaPedido(); ?></td>
        </tr>
        <tr>
            <th>Duración Alquiler</th>
            <td><?php echo $pedido->getDuracionAlquiler(); ?></td>
        </tr>
        <tr>
            <th>Estado Pedido</th>
            <td><?php echo $pedido->getEstadoPedido(); ?></td>
        </tr>
        <tr>
            <th>Fecha Inicio</th>
            <td><?php echo $pedido->getFechaInicio(); ?></td>
        </tr>
        <tr>
            <th>Tipo Pago</th>
            <td><?php echo $pedido->getTipoPago(); ?></td>
        </tr>
        <tr>
            <th>Comentario</th>
            <td><?php echo $pedido->getComentario(); ?></td>
        </tr>
        <tr>
            <th>Estado</th>
            <td><?php echo $pedido->getEstado(); ?></td>
        </tr>
    </table>
    <a href="index.php?c=Pedidos">Regresar</a>
</body>
</html>

<?php require_once FOOTER; ?>