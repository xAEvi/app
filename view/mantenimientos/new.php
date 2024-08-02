<?php require_once HEADER; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($titulo); ?></title>
</head>
<body>
    <h1><?php echo htmlspecialchars($titulo); ?></h1>
    <form action="index.php?c=Mantenimientos&f=create" method="post" enctype="multipart/form-data">
        <label for="id_propiedad">Propiedad:</label>
        <select name="id_propiedad" id="id_propiedad" required>
            <?php if (isset($propiedades) && is_array($propiedades) && !empty($propiedades)) { ?>
                <?php foreach ($propiedades as $pro) { ?>
                    <option value="<?php echo htmlspecialchars($pro['id']); ?>">
                        <?php echo htmlspecialchars($pro['titulo']); ?>
                    </option>
                <?php } ?>
            <?php } else { ?>
                <option value="">No hay propiedades disponibles</option>
            <?php } ?>
        </select><br>

        <label for="fecha_inicio">Fecha Inicio:</label>
        <input type="date" name="fecha_inicio" id="fecha_inicio" required><br>

        <label for="fecha_fin">Fecha Fin:</label>
        <input type="date" name="fecha_fin" id="fecha_fin" required><br>
        
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" required></textarea><br>
        
        <label for="nombre_mantenimiento">Nombre del Mantenimiento:</label>
        <input type="text" name="nombre_mantenimiento" id="nombre_mantenimiento" required><br>
        
        <label for="encargado">Encargado:</label>
        <input type="text" name="encargado" id="encargado" required><br>
        
        <label for="estado">Estado:</label>
        <select name="estado" id="estado" required>
        <option value="Activo">Activo</option>
        <option value="Inactivo">Inactivo</option>
        </select><br>
        
        <label for="costo">Costo:</label>
        <input type="number" name="costo" id="costo" step="0.01" required><br>
        
        <input type="submit" value="Guardar">
    </form>
    <a href="index.php?c=Mantenimientos&f=index">Atrás</a>
</body>
</html>

<?php require_once FOOTER; ?>
