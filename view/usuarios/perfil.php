<?php
 //Autor :NARCISA CARRILLO SANCHEZ 
// Iniciar sesión
if (!isset($_SESSION)) { 
    session_start(); 
}

require_once HEADER;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil Usuario</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        .profile-container, .orders-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .profile-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .profile-header img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
        }
        .profile-header button, .profile-header a, .btn-back {
            background-color: #f06292;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            border: none;
            cursor: pointer;
            display: inline-block;
            text-align: center;
        }
        .btn-back {
            margin-left: 500px;
            background-color: #ccc;
            color: #333;
        }
        .profile-info, .order-info {
            margin-top: 30px;
        }
        .profile-info div, .order-info div {
            margin-bottom: 15px;
        }
        .profile-info div span, .order-info div span {
            font-weight: bold;
        }
        .orders-container p {
            text-align: center;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($user['imagen']); ?>" alt="Imagen de perfil">
            <a href="index.php?c=Usuarios&f=view_edit&id=<?php echo $user['id']; ?>"><i class="fas fa-edit"></i> Editar</a>
        </div>
        <div class="profile-info">
            <div><span>Nombre de Usuario:</span> <?php echo $user['username']; ?></div>
            <div><span>Nombre:</span> <?php echo $user['nombre']; ?></div>
            <div><span>Correo:</span> <?php echo $user['correo']; ?></div>
            <div><span>Dirección:</span> <?php echo $user['direccion']; ?></div>
        </div>
    </div>
    <div class="orders-container">
        <h2>Lista de pedidos</h2>
        <?php if (!empty($pedidos)) { ?>
            <?php foreach ($pedidos as $pedido) { ?>
                <div class="order-info">
                    <div><span>Propiedad:</span> <?php echo $pedido->getTitulo(); ?></div>
                    <div><span>Duración Alquiler:</span> <?php echo $pedido->getDuracionAlquiler(); ?> meses</div>
                    <div><span>Fecha inicio:</span> <?php echo $pedido->getFechaInicio(); ?></div>
                    <div><span>Tipo Pago:</span> <?php echo $pedido->getTipoPago(); ?></div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p>No hay pedidos para este usuario.</p>
        <?php } ?>
        <a  href="index.php?c=Usuarios&f=index" class="btn-back">Volver </a>
    </div>
</body>
</html>

<?php require_once FOOTER; ?>
