<?php if (!isset($_SESSION)) { session_start(); } ?>

<?php require_once HEADER; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles de Propiedad</title>
</head>
<body>
    <h1>Detalles de Propiedad</h1>
    <?php if (isset($_SESSION['mensaje'])) { ?>
        <div class="alert alert">
            <?php echo $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?>
        </div>
    <?php } ?>
    <?php if ($propiedad) { ?>
        <table border="1">
            <tr>
                <th>Tipo</th>
                <td><?php echo $propiedad['tipo_propiedad']; ?></td>
            </tr>
            <tr>
                <th>Descripción</th>
                <td><?php echo $propiedad['descripcion']; ?></td>
            </tr>
            <tr>
                <th>Imagen</th>
                <td>
                    <?php if ($propiedad['imagen']) { ?>
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($propiedad['imagen']); ?>" alt="Imagen" style="width: 200px; height: auto;">
                    <?php } else { ?>
                        No Disponible
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <th>Dirección</th>
                <td><?php echo $propiedad['direccion']; ?></td>
            </tr>
            <tr>
                <th>Precio</th>
                <td><?php echo $propiedad['precio']; ?></td>
            </tr>
            <tr>
                <th>Habitaciones</th>
                <td><?php echo $propiedad['num_habitaciones']; ?></td>
            </tr>
            <tr>
                <th>Baños</th>
                <td><?php echo $propiedad['num_banos']; ?></td>
            </tr>
            <tr>
                <th>Superficie</th>
                <td><?php echo $propiedad['superficie']; ?></td>
            </tr>
            <tr>
                <th>Estado Alquiler</th>
                <td><?php echo $propiedad['estado_alquiler']; ?></td>
            </tr>
        </table>
    <?php } else { ?>
        <p>Propiedad no encontrada.</p>
    <?php } ?>
    <a href="index.php?c=Propiedades&f=index">Volver a la lista</a>
</body>
</html>

<?php require_once FOOTER; ?>
