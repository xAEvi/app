<?
 //Autor :NARCISA CARRILLO SANCHEZ 
 if (!isset($_SESSION)) { session_start(); } 

$rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : '';
?>

<?php require_once HEADER; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $titulo; ?></title>
    <style>
        body {
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .header a {
            background-color: #f06292;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .profile-card {
            display: flex;
            align-items: center;
            padding: 15px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 15px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        #profile-info {
            cursor: pointer;
        }
        #profile-info:hover {
            background-color: #f0f0f0; /* Cambia el color de fondo al pasar el mouse */
        }

        .profile-card img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
        }

        .profile-info {
            flex-grow: 1;
        }

        .profile-info h2 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }

        .profile-info p {
            margin: 5px 0 0;
            font-size: 14px;
            color: #666;
        }

        .profile-actions {
            display: flex;
            gap: 10px;
        }

        .profile-actions a {
            color: #f06292;
            text-decoration: none;
            font-size: 16px;
        }
    </style>
    <!-- Puedes incluir Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><?php echo $titulo; ?></h1>
            <a href="index.php?c=Usuarios&f=view_new"><i class="fas fa-user-plus"></i> Nuevo Usuario</a>
        </div>
        
        <?php if (isset($_SESSION['mensaje'])) { ?>
            <div class="alert alert">
                <?php echo $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?>
            </div>
        <?php } ?>

        <?php foreach ($resultados as $user) { ?>
            <div  id="profile-info" class="profile-card" onclick="window.location.href='index.php?c=Usuarios&f=view_profile&id=<?php echo $user['id']; ?>'" >
                <img src="data:image/jpeg;base64,<?php echo base64_encode($user['imagen']); ?>" alt="Imagen de perfil">
                <div  class="profile-info">
                    <h2><?php echo $user['nombre']; ?></h2>
                    <p><?php echo $user['correo']; ?></p>
                    <p><?php echo $user['username']; ?></p>
                    <p><?php echo $user['direccion']; ?></p>
                </div>
                <?php if ($rol == 1 || $rol == 2){ ?>
                    <div class="profile-actions">
                        <?php if ($rol == 1){ ?>
                            <a href="index.php?c=Usuarios&f=view_edit&id=<?php echo $user['id']; ?>"><i class="fas fa-edit"></i></a>
                        <?php } ?>
                        <a href="index.php?c=Usuarios&f=delete&id=<?php echo $user['id']; ?>"><i class="fas fa-trash-alt"></i></a>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
    
</body>
</html>

<?php require_once FOOTER; ?>
