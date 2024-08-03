<?php if (!isset($_SESSION)) { session_start(); }
$rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : null;

if (empty($_SESSION['user']) || empty($_SESSION['rol'])){
    require_once LOGIN . 'login.php';
    die();
} 
$rol=htmlentities($_SESSION['rol']);

//enviar el parametro por get con empty
$opcion = !empty($_GET["op"])?htmlentities($_GET["op"]):'';
if ($opcion=="cerrar") {
    session_destroy();//elimina la sesion
    require_once LOGIN . 'login.php';
    die(); 
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sidebar Navigation</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: white;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 15px;
            text-decoration: none;
            font-size: 18px;
            color: #333;
            display: block;
        }

        .sidebar a:hover {
            background-color: #ffcccb;
            color: white;
        }

        .sidebar .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar .logo img {
            width: 50px;
        }

        .sidebar .user-info {
            margin-top: auto;
            padding: 10px;
            text-align: center;
        }

        .sidebar .user-info img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="https://graphicsfamily.com/wp-content/uploads/edd/2020/04/house-apartment-logo-blue-png-transparent.png" alt="Logo">
            <h2>Alquiler de propiedades</h2>
        </div>
        <a href="index.php?c=Index&f=index" class="active">Inicio</a>
        <a href="index.php?c=Propiedades&f=index">Propiedades</a>
        <a href="index.php?p=contacto">Contacto</a>
        <?php if ($rol == 1 || $rol == 2) { ?>
            <a href="index.php?c=Usuarios&f=index">Usuarios</a>
        <?php } ?>
        <a href="index.php?c=Usuarios&f=view_profile&id=<?php echo $_SESSION['user_id']; ?>">Ver Perfil</a>
        <?php if ($rol == 1 || $rol == 2) { ?>
            <a href="index.php?c=Pedidos&f=index">Pedidos</a>
        <?php } ?>
        <?php if ($rol == 3) { ?>
            <a href="index.php?c=Pedidos&f=index">Mis Pedidos</a>
        <?php } ?>
        <?php if ($rol == 1) { ?>
            <a href="index.php?c=Mantenimientos&f=index">Mantenimientos</a>
        <?php } ?>
        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?op=cerrar&num=12">Salir</a>
        <div class="user-info">
            <img style="width: 100px; height: 100px;" src="data:image/jpeg;base64,<?php echo $_SESSION['image']; ?>" alt="Imagen de perfil">
            <p><?php echo $_SESSION['user']; ?></p>
        </div>
    </div>
</body>
</html>
