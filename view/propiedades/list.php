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

        }
        .box{

            width: 300px;
            height: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;

        }

        table {
            
            border-collapse: collapse;
            margin: 8px 0;
            font-size: 15px;
            min-width: 200px;
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
</head>
<body>
    <h1><?php echo $titulo; ?></h1>
    <?php if (isset($_SESSION['mensaje'])) { ?>
        <div class="alert alert">
            <?php echo $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?>
        </div>
    <?php } ?>
    <a href="index.php?c=Propiedades&f=view_new">Nueva Propiedad</a>
    <table border="1">
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
                        <a href="index.php?c=Propiedades&f=delete&id=<?php echo $prop['id']; ?>">Eliminar</a>
                        <a href="index.php?c=Propiedades&f=view_edit&id=<?php echo $prop['id']; ?>">Editar</a>
                    </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>    
    </table>
</body>
</html>

<?php require_once FOOTER; ?>
