<?php require_once HEADER; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Pedido</title>
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

        .form-group input,
        .form-group select,
        .form-group textarea {
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
            <h1>Nuevo Pedido</h1>
        </div>
        <form action="index.php?c=Pedidos&f=Save" method="post">
            <div class="form-group">
                <input type="hidden" name="id_usuario" value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>">
                <input type="hidden" name="id_propiedad" value="<?php echo isset($_REQUEST['id_propiedad']) ? $_REQUEST['id_propiedad'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="duracion_alquiler">Duración Alquiler:</label>
                <input type="number" name="duracion_alquiler" required>
            </div>
            <div class="form-group">
                <label for="fecha_inicio">Fecha Inicio:</label>
                <input type="date" name="fecha_inicio" required>
            </div>
            <div class="form-group">
                <label for="tipo_pago">Tipo Pago:</label>
                <select name="tipo_pago" required>
                    <option value="semanal">Semanal</option>
                    <option value="mensual">Mensual</option>
                    <option value="bimensual">Bimensual</option>
                    <option value="trimestral">Trimestral</option>
                    <option value="semestral">Semestral</option>
                    <option value="anual">Anual</option>
                </select>
            </div>
            <div class="form-group">
                <label for="comentario">Comentario:</label>
                <textarea name="comentario" required></textarea>
            </div>
            <div class="btn-container">
                <input type="submit" value="Guardar" class="btn">
            </div>
        </form>
    </div>
</body>
</html>

<?php require_once FOOTER; ?>
