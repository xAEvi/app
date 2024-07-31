<?php require_once HEADER; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $titulo; ?></title>
</head>
<body>
    <h1><?php echo $titulo; ?></h1>
    <form action="index.php?c=Usuarios&f=edit" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $user['nombre']; ?>" required><br>

        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?php echo $user['username']; ?>" required><br>

        <label for="contrasena">Password:</label>
        <input type="text" name="contrasena" id="contrasena" value="<?php echo $user['contrasena']; ?>" required><br>
        
        <label for="correo">Correo:</label>
        <input type="text" name="correo" id="correo" value="<?php echo $user['correo']; ?>" required><br>
        
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen"><br>
        <?php if ($user['imagen']): ?>
            <img src="data:image/jpeg;base64,<?php echo base64_encode($user['imagen']); ?>" alt="Imagen de  user" width="200"><br>
        <?php endif; ?>
        
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="direccion" value="<?php echo $user['direccion']; ?>" required><br>
        
        <input type="submit" value="Actualizar">
        <a href="index.php?c=Usuarios&f=index">Atrás</a>
    </form>
</body>
</html>

<?php require_once FOOTER; ?>
