<?php if (!isset($_SESSION)) { session_start(); } 
$rol = 1;
// $rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : '';
?>

<?php require_once HEADER; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $titulo; ?></title>
</head>
<body>
    <h1><?php echo $titulo; ?></h1>
    <?php if (isset($_SESSION['mensaje'])) { ?>
        <div class="alert alert">
            <?php echo $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?>
        </div>
    <?php } ?>
    <a href="index.php?c=Propiedades&f=view_new">Nueva Propiedad</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Dirección</th>
            <th>Precio</th>
            <th>Habitaciones</th>
            <th>Baños</th>
            <th>Superficie</th>
            <th>Estado Alquiler</th>
            <?php if ($rol == 1){ ?>
            <th>Acciones</th>
            <?php } ?>
        </tr>
        <?php foreach ($resultados as $prop) { ?>
            <tr>
                <td><?php echo $prop['id']; ?></td>
                <td><?php echo $prop['direccion']; ?></td>
                <td><?php echo $prop['precio']; ?></td>
                <td><?php echo $prop['num_habitaciones']; ?></td>
                <td><?php echo $prop['num_banos']; ?></td>
                <td><?php echo $prop['superficie']; ?></td>
                <td><?php echo $prop['estado_alquiler']; ?></td>
                <?php if ($rol == 1){ ?>
                <td>
                    <a href="index.php?c=Propiedades&f=delete&id=<?php echo $prop['id']; ?>">Eliminar</a>
                    <a href="index.php?c=Propiedades&f=view_edit&id=<?php echo $prop['id']; ?>">Editar</a>
                </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php require_once FOOTER; ?>
