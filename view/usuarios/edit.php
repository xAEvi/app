<?php require_once HEADER; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $titulo; ?></title>
</head>
<body>
    <h1><?php echo $titulo; ?></h1>
    <form action="index.php?c=Propiedades&f=edit" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $prop['id']; ?>">
        
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="<?php echo $prop['titulo']; ?>" required><br>
        
        <label for="tipo_propiedad">Tipo de Propiedad:</label>
        <select name="tipo_propiedad" id="tipo_propiedad" required>
            <option value="Casa" <?php echo ($prop['tipo_propiedad'] == 'Casa') ? 'selected' : ''; ?>>Casa</option>
            <option value="Departamento" <?php echo ($prop['tipo_propiedad'] == 'Departamento') ? 'selected' : ''; ?>>Departamento</option>
            <option value="Oficina" <?php echo ($prop['tipo_propiedad'] == 'Oficina') ? 'selected' : ''; ?>>Oficina</option>
            <option value="Penthouse" <?php echo ($prop['tipo_propiedad'] == 'Penthouse') ? 'selected' : ''; ?>>Penthouse</option>
        </select><br>
        
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" required><?php echo $prop['descripcion']; ?></textarea><br>
        
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen"><br>
        <?php if ($prop['imagen']): ?>
            <img src="data:image/jpeg;base64,<?php echo base64_encode($prop['imagen']); ?>" alt="Imagen de la propiedad" width="200"><br>
        <?php endif; ?>
        
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="direccion" value="<?php echo $prop['direccion']; ?>" required><br>
        
        <label for="precio">Precio:</label>
        <input type="text" name="precio" id="precio" value="<?php echo $prop['precio']; ?>" required><br>
        
        <label for="num_habitaciones">Habitaciones:</label>
        <input type="number" name="num_habitaciones" id="num_habitaciones" value="<?php echo $prop['num_habitaciones']; ?>" required><br>
        
        <label for="num_banos">Baños:</label>
        <input type="number" name="num_banos" id="num_banos" value="<?php echo $prop['num_banos']; ?>" required><br>
        
        <label for="superficie">Superficie:</label>
        <input type="number" name="superficie" id="superficie" value="<?php echo $prop['superficie']; ?>" required><br>
        
        <label for="estado_alquiler">Estado Alquiler:</label>
        <select name="estado_alquiler" id="estado_alquiler" required>
            <option value="Disponible" <?php echo ($prop['estado_alquiler'] == 'Disponible') ? 'selected' : ''; ?>>Disponible</option>
            <option value="Alquilado" <?php echo ($prop['estado_alquiler'] == 'Alquilado') ? 'selected' : ''; ?>>Alquilado</option>
        </select><br>
        
        <input type="submit" value="Actualizar">
        <a href="index.php?c=Propiedades&f=index">Atrás</a>
    </form>
</body>
</html>

<?php require_once FOOTER; ?>
