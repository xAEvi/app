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
    <a href="index.php?c=Mantenimientos&f=view_new">Nuevo Mantenimiento</a>
    <table border="1">
        <thead>
            <tr>
                
                <th>Propiedad en mantenimiento</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Descripción</th>
                <th>Nombre Mantenimiento</th>
                <th>Encargado</th>
                <th>Estado</th>
                <th>Costo</th>
                <?php if ($rol == 1){ ?>
                <th>Acciones</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultados as $mant) { ?>
                <tr>
                    <td><?php echo $mant['propiedad_titulo']; ?></td>
                    <td><?php echo $mant['fecha_inicio']; ?></td>
                    <td><?php echo $mant['fecha_fin']; ?></td>
                    <td><?php echo $mant['descripcion']; ?></td>
                    <td><?php echo $mant['nombre_mantenimiento']; ?></td>
                    <td><?php echo $mant['encargado']; ?></td>
                    <td><?php echo $mant['estado']; ?></td>
                    <td><?php echo $mant['costo']; ?></td>
                    <?php if ($rol == 1){ ?>
                    <td>
                        
                        <a href="index.php?c=Mantenimientos&f=delete&id=<?php echo $mant['id']; ?>">Eliminar</a>
                        <a href="index.php?c=Mantenimientos&f=view_edit&id=<?php echo $mant['id']; ?>">Editar</a>
                    </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>    
    </table>
</body>
</html>

<?php require_once FOOTER; ?>
