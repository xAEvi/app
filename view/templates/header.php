<?php if (!isset($_SESSION)) { session_start(); }
// $rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : null; 
$rol = 1;
?>
<!DOCTYPE html>
<html lang="es">
<body>
    <nav>
        <ul>
            <li><a href="index.php?c=Index&f=index">Inicio</a></li>
            <li><a href="index.php?c=Propiedades&f=index">Propiedades</a></li>
            <li><a href="index.php?p=contacto">Contacto</a></li>
            <li><a href="index.php?c=Perfil&f=index">Perfil</a></li>
            <?php if ($rol == 1 || $rol == 2) { ?>
                <li><a href="index.php?c=Pedidos&f=index">Pedidos</a></li>
            <?php } ?>
            <?php if ($rol == 1) { ?>
                <li><a href="index.php?c=Mantenimientos&f=index">Mantenimientos</a></li>
            <?php } ?>
        </ul>
    </nav>
</body>
</html>
