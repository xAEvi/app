<!DOCTYPE html>
<html>
<head>
    <title>Editar Pedido</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
    <h2>Editar Pedido</h2>
    <form action="index.php?c=Pedidos&f=Update" method="post">
        <input type="hidden" name="id" value="<?php echo $pedido->getId(); ?>">

        <label for="id_usuario">ID Usuario:</label>
        <input type="number" name="id_usuario" value="<?php echo $pedido->getIdUsuario(); ?>" required><br>

        <label for="id_propiedad">ID Propiedad:</label>
        <input type="number" name="id_propiedad" value="<?php echo $pedido->getIdPropiedad(); ?>" required><br>

        <label for="fecha_pedido">Fecha Pedido:</label>
        <input type="date" name="fecha_pedido" value="<?php echo $pedido->getFechaPedido(); ?>" required><br>

        <label for="duracion_alquiler">Duración Alquiler:</label>
        <input type="number" name="duracion_alquiler" value="<?php echo $pedido->getDuracionAlquiler(); ?>" required><br>

        <label for="estado_pedido">Estado Pedido:</label>
        <select name="estado_pedido" required>
            <option value="Pendiente" <?php if($pedido->getEstadoPedido() == 'Pendiente') echo 'selected'; ?>>Pendiente</option>
            <option value="Aceptado" <?php if($pedido->getEstadoPedido() == 'Aceptado') echo 'selected'; ?>>Aceptado</option>
            <option value="Rechazado" <?php if($pedido->getEstadoPedido() == 'Rechazado') echo 'selected'; ?>>Rechazado</option>
        </select><br>

        <label for="fecha_inicio">Fecha Inicio:</label>
        <input type="date" name="fecha_inicio" value="<?php echo $pedido->getFechaInicio(); ?>" required><br>

        <label for="tipo_pago">Tipo Pago:</label>
        <input type="text" name="tipo_pago" value="<?php echo $pedido->getTipoPago(); ?>" required><br>

        <label for="comentario">Comentario:</label>
        <textarea name="comentario" required><?php echo $pedido->getComentario(); ?></textarea><br>

        <label for="estado">Estado:</label>
        <select name="estado" required>
            <option value="Activo" <?php if($pedido->getEstado() == 'Activo') echo 'selected'; ?>>Activo</option>
            <option value="Inactivo" <?php if($pedido->getEstado() == 'Inactivo') echo 'selected'; ?>>Inactivo</option>
        </select><br>

        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
