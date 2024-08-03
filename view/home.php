<?php require_once HEADER; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <style>
        body {
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h4 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .section {
            margin-bottom: 20px;
        }

        .section h5 {
            color: #f06292;
            margin-bottom: 10px;
        }

        .section p {
            color: #333;
            line-height: 1.6;
        }

        .testimonials {
            background-color: #ffcccb;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .testimonials h5 {
            color: #d8000c;
        }

        .btn-primary {
            display: block;
            width: 200px;
            margin: 20px auto;
            background-color: #f06292;
            color: #fff;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-primary:hover {
            background-color: #e91e63;
        }
    </style>
</head>
<body>
    <div class="container">
        <h4>Bienvenido a Nuestro Sitio de Propiedades</h4>

        <div class="section">
            <h5>Propósito</h5>
            <p>Ofrecemos una plataforma intuitiva y eficiente para buscar y alquilar propiedades que se ajusten a tus necesidades. Nuestro objetivo es simplificar el proceso de encontrar el hogar ideal para ti y tu familia.</p>
        </div>

        <div class="section">
            <h5>Misión</h5>
            <p>Proporcionar un servicio de búsqueda de propiedades que sea accesible, confiable y fácil de usar. Queremos facilitar la conexión entre arrendadores y arrendatarios para que encuentren lo que buscan de manera rápida y efectiva.</p>
        </div>

        <div class="section">
            <h5>Visión</h5>
            <p>Ser el líder en soluciones de búsqueda de propiedades, ofreciendo la mejor experiencia de usuario y las herramientas más avanzadas para que cada cliente pueda encontrar su propiedad ideal sin complicaciones.</p>
        </div>

        <div class="section testimonials">
            <h5>Testimonios</h5>
            <p>"Encontré mi hogar perfecto gracias a esta plataforma. ¡La búsqueda fue rápida y fácil!" - Ana Pérez</p>
            <p>"Excelente servicio. El equipo me ayudó a encontrar un lugar que se ajustaba a todas mis necesidades." - Juan Martínez</p>
        </div>

        <a href="index.php?c=Propiedades&f=index" class="btn-primary">Ver Propiedades Ahora</a>
    </div>
</body>
</html>

<?php require_once FOOTER; ?>
