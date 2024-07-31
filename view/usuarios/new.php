<?php require_once HEADER; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $titulo; ?></title>
</head>
<body>
    <h1><?php echo $titulo; ?></h1>
    <form action="index.php?c=Propiedades&f=new" method="post" enctype="multipart/form-data">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" required><br>
        
        <label for="tipo_propiedad">Tipo de Propiedad:</label>
        <select name="tipo_propiedad" id="tipo_propiedad" required>
            <option value="Casa">Casa</option>
            <option value="Departamento">Departamento</option>
            <option value="Oficina">Oficina</option>
            <option value="Penthouse">Penthouse</option>
        </select><br>
        
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" required></textarea><br>
        
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen"><br>
        
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="direccion" required><br>
        
        <label for="precio">Precio:</label>
        <input type="text" name="precio" id="precio" required><br>
        
        <label for="num_habitaciones">Habitaciones:</label>
        <input type="number" name="num_habitaciones" id="num_habitaciones" required><br>
        
        <label for="num_banos">Baños:</label>
        <input type="number" name="num_banos" id="num_banos" required><br>
        
        <label for="superficie">Superficie:</label>
        <input type="number" name="superficie" id="superficie" required><br>
        
        <label for="estado_alquiler">Estado Alquiler:</label>
        <select name="estado_alquiler" id="estado_alquiler" required>
            <option value="Disponible">Disponible</option>
            <option value="Alquilado">Alquilado</option>
        </select><br>
        
        <input type="submit" value="Guardar">
    </form>
    <a href="index.php?c=Propiedades&f=index">Atrás</a>
</body>
</html>

<?php require_once FOOTER; ?>