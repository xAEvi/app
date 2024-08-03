<?php //require_once HEADER; ?>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Pedido</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
    <h2>Nuevo Pedido</h2>
    <form action="index.php?c=Pedidos&f=Save" method="post">
        <input type="hidden" name="id_usuario" value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>">
        <input type="hidden" name="id_propiedad" value="<?php echo isset($_REQUEST['id_propiedad']) ? $_REQUEST['id_propiedad'] : ''; ?>">

        <label for="fecha_pedido">Fecha Pedido:</label>
        <input type="date" name="fecha_pedido" required><br>

        <label for="duracion_alquiler">Duración Alquiler:</label>
        <input type="number" name="duracion_alquiler" required><br>

        <label for="fecha_inicio">Fecha Inicio:</label>
        <input type="date" name="fecha_inicio" required><br>

        <label for="tipo_pago">Tipo Pago:</label>
        <input type="text" name="tipo_pago" required><br>

        <label for="comentario">Comentario:</label>
        <textarea name="comentario" required></textarea><br>

        <input type="submit" value="Guardar">
    </form>
</body>
</html>


<?php require_once FOOTER; ?>
