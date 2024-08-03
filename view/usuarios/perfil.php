<?php
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
    <style>
        body {
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        .profile-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
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
        .profile-header button {
            background-color: #ff6666;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .profile-header a {
            background-color: #f06292;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }
        .profile-info {
            margin-top: 20px;
        }
        .profile-info div {
            margin-bottom: 10px;
        }
        .profile-info div span {
            font-weight: bold;
        }
    </style>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

            <?php echo "XAVIER ME CAE MAL";
            ?>
        
    </div>
    <div>
        <h2></h2>
            <?php if (!empty($pedidos)) { ?>
                <table border="1">
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Título</th> <!-- Nueva columna para el título -->
                        <th>Duracion</th>
                        <th>Fecha inicio</th>
                        <th>tipo Pago</th>
                    </tr>
                    <?php foreach ($pedidos as $pedido) { ?>
                        <tr>
                            <td><?php echo $pedido->getId(); ?></td>
                            <td><?php echo $pedido->getNombreUsuario(); ?></td>
                            <td><?php echo $pedido->getTitulo(); ?></td> <!-- Mostrar el título del pedido -->
                            <td><?php echo $pedido->getpedido(); ?></td>
                            <td><?php echo $pedido->getFecha(); ?></td>
                            <td><?php echo $pedido->getValoracionCosto(); ?></td>
                            <td><?php echo $pedido->getValoracionUbicacion(); ?></td>
                            <td><?php echo $pedido->getValoracionEstado(); ?></td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } else { ?>
                <p>No hay pedidos para esta propiedad.</p>
            <?php } ?>
        <?php } else { ?>
            <p>Propiedad no encontrada.</p>
        <?php } ?>
        <a href="index.php?c=Propiedades&f=index">Volver a la lista</a>
    </div>
</body>
</html>

<?php require_once FOOTER; ?>