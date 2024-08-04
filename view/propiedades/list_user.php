<!-- Autor: NARCISA CARRILLO SANCHEZ  -->

<?php if (!isset($_SESSION)) { session_start(); } 
$rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : 3;
?>

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

        .property-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .property-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            padding: 15px;
        }

        .property-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .property-info {
            padding: 15px;
        }

        .property-info h2 {
            font-size: 18px;
            color: #333;
            margin: 0 0 10px;
        }

        .property-info p {
            margin: 5px 0;
            font-size: 14px;
            color: #666;
        }

        .property-info .price {
            font-size: 20px;
            color: #f06292;
            font-weight: bold;
        }

        .property-info .details {
            display: flex;
            justify-content: space-around;
            margin-top: 10px;
        }

        .property-info .details div {
            text-align: center;
        }

        .property-info .details i {
            display: block;
            font-size: 24px;
            color: #666;
        }

        .alert {
            padding: 15px;
            background-color: #ffcccb;
            color: #333;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 8px 0;
            font-size: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        table thead tr {
            background-color: #ffcccb;
            text-align: left;
            font-weight: bold;
        }

        table th, table td {
            padding: 10px 13px;
        }

        table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        table tbody tr:last-of-type {
            border-bottom: 2px solid #ffcccb;
        }

        table tbody tr:hover {
            background-color: #f3f3f3;
        }

        table th {
            border: none;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><?php echo $titulo; ?></h1>
        </div>
        
        <?php if (isset($_SESSION['mensaje'])) { ?>
            <div class="alert">
                <?php echo $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?>
            </div>
        <?php } ?>

        <div class="property-cards">
            <?php foreach ($resultados as $prop) { ?>
                <div class="property-card">
                    <a href="index.php?c=Propiedades&f=view&id=<?php echo $prop['id']; ?>">
                        <?php if ($prop['imagen']) { ?>
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($prop['imagen']); ?>" alt="Imagen">
                        <?php } else { ?>
                            <img src="no-image-available.png" alt="No Disponible">
                        <?php } ?>
                    </a>
                    <div class="property-info">
                        <h2><?php echo $prop['titulo']; ?></h2>
                        <p class="price">$<?php echo $prop['precio']; ?></p>
                        <div class="details">
                            <div>
                                <i class="fas fa-bed"></i>
                                <p><?php echo $prop['num_habitaciones']; ?> Hab</p>
                            </div>
                            <div>
                                <i class="fas fa-bath"></i>
                                <p><?php echo $prop['num_banos']; ?> Baños</p>
                            </div>
                            <div>
                                <i class="fas fa-ruler-combined"></i>
                                <p><?php echo $prop['superficie']; ?> m²</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>

<?php require_once FOOTER; ?>