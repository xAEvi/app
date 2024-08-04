<!--autor: Vélez Pulido Christopher Jeremy-->

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
        
        <form action="index.php?c=Mantenimientos&f=edit&id=<?php echo $mantenimiento['id']; ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $mantenimiento['id']; ?>">
            
            <div class="form-group">
                <label for="id_propiedad">Propiedad:</label>
                <select name="id_propiedad" id="id_propiedad" required>
                    <?php foreach ($propiedades as $propiedad) : ?>
                        <option value="<?php echo $propiedad['id']; ?>" <?php echo ($mantenimiento['id_propiedad'] == $propiedad['id']) ? 'selected' : ''; ?>>
                            <?php echo $propiedad['titulo']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="fecha_inicio">Fecha de Inicio:</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" value="<?php echo $mantenimiento['fecha_inicio']; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="fecha_fin">Fecha de Fin:</label>
                <input type="date" name="fecha_fin" id="fecha_fin" value="<?php echo $mantenimiento['fecha_fin']; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion" required><?php echo $mantenimiento['descripcion']; ?></textarea>
            </div>
            
            <div class="form-group">
                <label for="nombre_mantenimiento">Nombre del Mantenimiento:</label>
                <input type="text" name="nombre_mantenimiento" id="nombre_mantenimiento" value="<?php echo $mantenimiento['nombre_mantenimiento']; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="encargado">Encargado:</label>
                <input type="text" name="encargado" id="encargado" value="<?php echo $mantenimiento['encargado']; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="estado">Estado:</label>
                <select name="estado" id="estado" required>
                    <option value="Activo" <?php echo ($mantenimiento['estado'] == 'Activo') ? 'selected' : ''; ?>>Activo</option>
                    <option value="Inactivo" <?php echo ($mantenimiento['estado'] == 'Inactivo') ? 'selected' : ''; ?>>Inactivo</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="costo">Costo:</label>
                <input type="number" name="costo" id="costo" value="<?php echo $mantenimiento['costo']; ?>" required>
            </div>
            
            <div class="btn-container">
                <button type="submit" class="btn">Actualizar</button>
                <a href="index.php?c=Mantenimientos&f=index" class="btn btn-back">Atrás</a>
            </div>
        </form>
    </div>
</body>
</html>

<?php require_once FOOTER; ?>
