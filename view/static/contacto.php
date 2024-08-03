<?php require_once HEADER; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto</title>
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

        .contact-info {
            font-size: 14px;
            color: #333;
        }

        .contact-info p {
            margin-bottom: 15px;
        }

        .contact-info h2 {
            font-size: 18px;
            color: #f06292;
            margin-bottom: 10px;
        }

        .contact-form {
            margin-top: 20px;
        }

        .contact-form .form-group {
            margin-bottom: 15px;
        }

        .contact-form .form-group label {
            display: block;
            font-size: 14px;
            color: #333;
            margin-bottom: 5px;
        }

        .contact-form .form-group input,
        .contact-form .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .contact-form .form-group textarea {
            resize: vertical;
            height: 100px;
        }

        .contact-form .btn {
            background-color: #f06292;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Contacto</h1>
        </div>
        
        <div class="contact-info">
            <h2>Información de Contacto</h2>
            <p><strong>Teléfono:</strong> +123 456 789</p>
            <p><strong>Correo Electrónico:</strong> contacto@example.com</p>
            <p><strong>Dirección:</strong> Calle Falsa 123, Ciudad, País</p>
        </div>
        
        <div class="contact-info">
            <h2>Horario de Atención</h2>
            <p><strong>Lunes a Viernes:</strong> 9:00 AM - 6:00 PM</p>
            <p><strong>Sábados:</strong> 10:00 AM - 2:00 PM</p>
            <p><strong>Domingos:</strong> Cerrado</p>
        </div>
        
        <div class="contact-info">
            <h2>Redes Sociales</h2>
            <p><strong>Facebook:</strong> <a href="https://facebook.com">facebook.com/nuestrapagina</a></p>
            <p><strong>Twitter:</strong> <a href="https://twitter.com">twitter.com/nuestrapagina</a></p>
            <p><strong>Instagram:</strong> <a href="https://instagram.com">instagram.com/nuestrapagina</a></p>
        </div>
    </div>
</body>
</html>

<?php require_once FOOTER; ?>
