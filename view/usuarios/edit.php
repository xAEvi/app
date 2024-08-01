<?php require_once HEADER; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $titulo; ?></title>
</head>
<body>
    <h1><?php echo $titulo; ?></h1>
    <form action="index.php?c=Usuarios&f=edit" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo htmlentities($user['id']); ?>">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo htmlentities($user['nombre']); ?>">
        </div>
        <div>
            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" value="<?php echo htmlentities($user['contrasena']); ?>">
        </div>
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlentities($user['username']); ?>">
        </div>
        <div>
            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" value="<?php echo htmlentities($user['correo']); ?>">
        </div>
        <div>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" value="<?php echo htmlentities($user['direccion']); ?>">
        </div>
        <div>
            <label for="rol">Rol:</label>
            <input type="text" id="rol" name="rol" value="<?php echo htmlentities($user['rol']); ?>">
        </div>
        <div>
            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado" value="<?php echo htmlentities($user['estado']); ?>">
        </div>
        <div>
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen">
            <!-- Aquí podrías mostrar la imagen actual -->
        </div>
        <div>
            <button type="submit">Actualizar</button>
            <a href="index.php?c=Usuarios&f=index">Atrás</a>

        </div>
    </form>
</body>
</html>

<?php require_once FOOTER; ?>
