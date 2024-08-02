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
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($user['imagen']); ?>" alt="Imagen de perfil">
            <button><a href="index.php?c=Usuarios&f=view_edit&id=<?php echo $user['id']; ?>">Editar</a></button>
        </div>
        <div class="profile-info">
            <div><span>Nombre de Usuario:</span> <?php echo $user['username']; ?></div>
            <div><span>Nombre:</span> <?php echo $user['nombre']; ?></div>
            <div><span>Correo:</span> <?php echo $user['correo']; ?></div>
            <div><span>Dirección:</span> <?php echo $user['direccion']; ?></div>

            <?php echo "XAVIER ME CAE MAL";
            ?>

            
        </div>
        <div class="profile-social">
            <a href="#"><img src="path_to_facebook_icon" alt="Facebook"></a>
            <a href="#"><img src="path_to_instagram_icon" alt="Instagram"></a>
            <a href="#"><img src="path_to_whatsapp_icon" alt="WhatsApp"></a>
            <a href="#"><img src="path_to_linkedin_icon" alt="LinkedIn"></a>
        </div>
    </div>
</body>
</html>

<?php require_once FOOTER; ?>