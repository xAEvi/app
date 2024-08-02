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

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            color: #333;
            margin-bottom: 5px;
        }

        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-group input[type="file"] {
            padding: 3px;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .btn {
            background-color: #f06292;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-back {
            background-color: #ccc;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><?php echo $titulo; ?></h1>
        </div>
        
        <form action="index.php?c=Propiedades&f=edit" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $prop['id']; ?>">
            
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" value="<?php echo $prop['titulo']; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="tipo_propiedad">Tipo de Propiedad:</label>
                <select name="tipo_propiedad" id="tipo_propiedad" required>
                    <option value="Casa" <?php echo ($prop['tipo_propiedad'] == 'Casa') ? 'selected' : ''; ?>>Casa</option>
                    <option value="Departamento" <?php echo ($prop['tipo_propiedad'] == 'Departamento') ? 'selected' : ''; ?>>Departamento</option>
                    <option value="Oficina" <?php echo ($prop['tipo_propiedad'] == 'Oficina') ? 'selected' : ''; ?>>Oficina</option>
                    <option value="Penthouse" <?php echo ($prop['tipo_propiedad'] == 'Penthouse') ? 'selected' : ''; ?>>Penthouse</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion" required><?php echo $prop['descripcion']; ?></textarea>
            </div>
            
            <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input type="file" name="imagen" id="imagen">
                <?php if ($prop['imagen']): ?>
                    <br>
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($prop['imagen']); ?>" alt="Imagen de la propiedad" style="width: 200px; height: auto; margin-top: 10px;">
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" name="direccion" id="direccion" value="<?php echo $prop['direccion']; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="text" name="precio" id="precio" value="<?php echo $prop['precio']; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="num_habitaciones">Habitaciones:</label>
                <input type="number" name="num_habitaciones" id="num_habitaciones" value="<?php echo $prop['num_habitaciones']; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="num_banos">Baños:</label>
                <input type="number" name="num_banos" id="num_banos" value="<?php echo $prop['num_banos']; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="superficie">Superficie:</label>
                <input type="number" name="superficie" id="superficie" value="<?php echo $prop['superficie']; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="estado_alquiler">Estado Alquiler:</label>
                <select name="estado_alquiler" id="estado_alquiler" required>
                    <option value="Disponible" <?php echo ($prop['estado_alquiler'] == 'Disponible') ? 'selected' : ''; ?>>Disponible</option>
                    <option value="Alquilado" <?php echo ($prop['estado_alquiler'] == 'Alquilado') ? 'selected' : ''; ?>>Alquilado</option>
                </select>
            </div>
            
            <div class="btn-container">
                <button type="submit" class="btn">Actualizar</button>
                <a href="index.php?c=Propiedades&f=index" class="btn btn-back">Atrás</a>
            </div>
        </form>
    </div>
</body>
</html>

<?php require_once FOOTER; ?>
