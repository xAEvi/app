<!--autor: Vélez Pulido Christopher Jeremy-->

<?php require_once HEADER; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($titulo); ?></title>
    <style>
        body {
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1100px;
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

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #f06292;
            color: #fff;
            border: none;
            cursor: pointer;
            padding: 15px 20px;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #e35781;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #f06292;
            font-size: 16px;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><?php echo htmlspecialchars($titulo); ?></h1>
            <a href="index.php?c=Mantenimientos&f=index"><i class="fas fa-arrow-left"></i> Atrás</a>
        </div>

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
    </div>
</body>
</html>

<?php require_once FOOTER; ?>
