<!-- Autor: WALTER ALEJANDRO DUCHI RIVERA -->

<?php if (!isset($_SESSION)) { session_start(); } ?>

<?php require_once HEADER; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Pedido</title>
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
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            font-weight: bold;
        }

        input, select, textarea {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"], .btn-back {
            background-color: #f06292;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            margin-top: 20px;
            align-self: flex-start;
            text-decoration: none;
        }

        input[type="submit"]:hover, .btn-back:hover {
            background-color: #e91e63;
        }

        .btn-back {
            margin-left: 10px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <h2>Editar Pedido</h2>
        <form action="index.php?c=Pedidos&f=Update" method="post">
            <input type="hidden" name="id" value="<?php echo $pedido->getId(); ?>">

            <label for="id_usuario">ID Usuario:</label>
            <input type="number" name="id_usuario" value="<?php echo $pedido->getIdUsuario(); ?>" required>

            <label for="id_propiedad">ID Propiedad:</label>
            <input type="number" name="id_propiedad" value="<?php echo $pedido->getIdPropiedad(); ?>" required>

            <label for="fecha_pedido">Fecha Pedido:</label>
            <input type="date" name="fecha_pedido" value="<?php echo $pedido->getFechaPedido(); ?>" required>

            <label for="duracion_alquiler">Duración Alquiler:</label>
            <input type="number" name="duracion_alquiler" value="<?php echo $pedido->getDuracionAlquiler(); ?>" required>

            <label for="estado_pedido">Estado Pedido:</label>
            <select name="estado_pedido" required>
                <option value="Pendiente" <?php if($pedido->getEstadoPedido() == 'Pendiente') echo 'selected'; ?>>Pendiente</option>
                <option value="Aceptado" <?php if($pedido->getEstadoPedido() == 'Aceptado') echo 'selected'; ?>>Aceptado</option>
                <option value="Rechazado" <?php if($pedido->getEstadoPedido() == 'Rechazado') echo 'selected'; ?>>Rechazado</option>
            </select>

            <label for="fecha_inicio">Fecha Inicio:</label>
            <input type="date" name="fecha_inicio" value="<?php echo $pedido->getFechaInicio(); ?>" required>

            <label for="tipo_pago">Tipo Pago:</label>
            <input type="text" name="tipo_pago" value="<?php echo $pedido->getTipoPago(); ?>" required>

            <label for="comentario">Comentario:</label>
            <textarea name="comentario" required><?php echo $pedido->getComentario(); ?></textarea>

            <label for="estado">Estado:</label>
            <select name="estado" required>
                <option value="Activo" <?php if($pedido->getEstado() == 'Activo') echo 'selected'; ?>>Activo</option>
                <option value="Inactivo" <?php if($pedido->getEstado() == 'Inactivo') echo 'selected'; ?>>Inactivo</option>
            </select>

            <input type="submit" value="Actualizar">
            <a class="btn-back" href="index.php?c=Pedidos">Regresar</a>
        </form>
    </div>
</body>
</html>

<?php require_once FOOTER; ?>
