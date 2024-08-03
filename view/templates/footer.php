<!-- Autor: Xavier Molina Cisneros -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Footer</title>
    <style>
        body {
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        footer {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 20px;
        }

        footer p {
            color: #333;
            margin: 5px 0;
        }

        footer a {
            color: #f06292;
            text-decoration: none;
        }

        footer a:hover {
            color: #e91e63;
        }
    </style>
</head>
<body>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Alquiler de Propiedades. Todos los derechos reservados.</p>
        <p><a href="index.php?p=contacto">Contacto</a></p>
    </footer>
</body>
</html>
