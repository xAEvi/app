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

        <label for="duracion_alquiler">Duración Alquiler:</label>
        <input type="number" name="duracion_alquiler" required><br>

        <label for="fecha_inicio">Fecha Inicio:</label>
        <input type="date" name="fecha_inicio" required><br>

        <label for="tipo_pago">Tipo Pago:</label>
        <select name="tipo_pago" required>
            <option value="semanal">Semanal</option>
            <option value="mensual">Mensual</option>
            <option value="bimensual">Bimensual</option>
            <option value="trimestral">Trimestral</option>
            <option value="semestral">Semestral</option>
            <option value="anual">Anual</option>
        </select><br>

        <label for="comentario">Comentario:</label>
        <textarea name="comentario" required></textarea><br>

        <input type="submit" value="Guardar">
    </form>
</body>
</html>



<?php require_once FOOTER; ?>
