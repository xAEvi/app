<!-- Autor: Xavier Molina Cisneros -->

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

        .box {
            width: 300px;
            height: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
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

        .profile-card {
            display: flex;
            align-items: center;
            padding: 15px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 15px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .profile-card img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
        }

        .profile-info {
            flex-grow: 1;
        }

        .profile-info h2 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }

        .profile-info p {
            margin: 5px 0 0;
            font-size: 14px;
            color: #666;
        }

        .profile-actions {
            display: flex;
            gap: 10px;
        }

        .profile-actions a {
            color: #f06292;
            text-decoration: none;
            font-size: 16px;
        }

        .alert {
            padding: 15px;
            background-color: #ffcccb;
            color: #333;
            border-radius: 5px;
            margin-bottom: 20px;
        }

                .search-form {
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .search-form input[type="text"] {
            width: 300px;
            height: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px;
        }

        .search-form button {
            background-color: #f06292;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
        }

        .search-form button:hover {
            background-color: #e91e63;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><?php echo $titulo; ?></h1>
            <?php if ($rol == 1){ ?>
            <a href="index.php?c=Propiedades&f=view_new"><i class="fas fa-plus"></i> Nueva Propiedad</a>
            <?php } ?>
        </div>
        
        <?php if (isset($_SESSION['mensaje'])) { ?>
            <div class="alert">
                <?php echo $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?>
            </div>
        <?php } ?>

        <div class="search-form">
            <form action="index.php?c=Propiedades&f=search" method="POST">
                <input type="text" name="b" id="busqueda" placeholder="Buscar..."/>
                <button type="submit"><i class="fas fa-search"></i> Buscar</button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Dirección</th>
                    <th>Precio</th>
                    <th>Habitaciones</th>
                    <th>Baños</th>
                    <th>Superficie</th>
                    <th>Estado Alquiler</th>
                    <?php if ($rol == 1){ ?>
                    <th>Acciones</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultados as $prop) { ?>
                    <tr>
                        <td><?php echo $prop['tipo_propiedad']; ?></td>
                        <td><?php echo $prop['descripcion']; ?></td>
                        <td>
                            <a href="index.php?c=Propiedades&f=view&id=<?php echo $prop['id']; ?>">
                                <?php if ($prop['imagen']) { ?>
                                    <img src="data:image/jpeg;base64,<?php echo base64_encode($prop['imagen']); ?>" alt="Imagen" style="width: 100px; height: auto;">
                                <?php } else { ?>
                                    No Disponible
                                <?php } ?>
                            </a>
                        </td>
                        <td><?php echo $prop['direccion']; ?></td>
                        <td><?php echo $prop['precio']; ?></td>
                        <td><?php echo $prop['num_habitaciones']; ?></td>
                        <td><?php echo $prop['num_banos']; ?></td>
                        <td><?php echo $prop['superficie']; ?></td>
                        <td><?php echo $prop['estado_alquiler']; ?></td>
                        <?php if ($rol == 1){ ?>
                        <td>
                            <a href="index.php?c=Propiedades&f=delete&id=<?php echo $prop['id']; ?>"><i class="fas fa-trash-alt"></i></a>
                            <a href="index.php?c=Propiedades&f=view_edit&id=<?php echo $prop['id']; ?>"><i class="fas fa-edit"></i></a>
                        </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>    
        </table>
    </div>
</body>
</html>

<?php require_once FOOTER; ?>
