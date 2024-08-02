<?php if (!isset($_SESSION)) { session_start(); }
$rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : null;

if (empty($_SESSION['user']) || empty($_SESSION['rol'])){
    header("Location:login.php");
    die();
} 
$rol=htmlentities($_SESSION['rol']);
$user_id = $_SESSION['user_id']; // Obtener el ID del usuario logueado

//enviar el parametro por get con empty
$opcion = !empty($_GET["op"])?htmlentities($_GET["op"]):'';
if ($opcion=="cerrar") {
    //session_unset();//elimina las variables
    session_destroy();//elimina la sesion
    header("Location:login.php");
    die(); 
}

?>

<!DOCTYPE html>
<html lang="es">

<body>
    <nav>
        <ul>
            <li><a href="index.php?c=Index&f=index">Inicio</a></li>
            <li><a href="index.php?c=Propiedades&f=index">Propiedades</a></li>
            <li><a href="index.php?p=contacto">Contacto</a></li>
            <?php if ($rol ==1 || $rol == 2) { ?>
                <li><a href="index.php?c=Usuarios&f=index">Usuarios</a></li>
            <?php } ?>
            <li><a href="index.php?c=Usuarios&f=view_profile&id=<?php echo $user_id; ?>">Ver Perfil</a></li>
            <?php if ($rol == 1 || $rol == 2) { ?>
                <li><a href="index.php?c=Pedidos&f=index">Pedidos</a></li>
            <?php } ?>
            <?php if ($rol == 1) { ?>
                <li><a href="index.php?c=Mantenimientos&f=index">Mantenimientos</a></li>
            <?php } ?>
            <li><a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?op=cerrar&num=12">Salir</a></li>
        </ul>
    </nav>
</body>
</html>
