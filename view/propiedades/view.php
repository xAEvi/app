<!-- Autor: Xavier Molina Cisneros -->

<?php if (!isset($_SESSION)) { session_start(); } ?>

<?php require_once HEADER; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles de Propiedad</title>
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

        h1, h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .alert {
            background-color: #ffdddd;
            color: #d8000c;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #ffcccb;
            color: #333;
        }

        img {
            max-width: 200px;
            height: auto;
        }

        .back{
            display: inline-block;
            background-color: #f06292;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            margin-top: 20px;
        }

        a:hover {
            background-color: #e91e63;
        }

        p {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detalles de Propiedad</h1>
        <?php if (isset($_SESSION['mensaje'])) { ?>
            <div class="alert">
                <?php echo $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?>
            </div>
        <?php } ?>
        <?php if ($propiedad) { ?>
            <table>
                <tr>
                    <th>Tipo</th>
                    <td><?php echo $propiedad['tipo_propiedad']; ?></td>
                </tr>
                <tr>
                    <th>Descripción</th>
                    <td><?php echo $propiedad['descripcion']; ?></td>
                </tr>
                <tr>
                    <th>Imagen</th>
                    <td>
                        <?php if ($propiedad['imagen']) { ?>
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($propiedad['imagen']); ?>" alt="Imagen">
                        <?php } else { ?>
                            No Disponible
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <th>Dirección</th>
                    <td><?php echo $propiedad['direccion']; ?></td>
                </tr>
                <tr>
                    <th>Precio</th>
                    <td><?php echo $propiedad['precio']; ?></td>
                </tr>
                <tr>
                    <th>Habitaciones</th>
                    <td><?php echo $propiedad['num_habitaciones']; ?></td>
                </tr>
                <tr>
                    <th>Baños</th>
                    <td><?php echo $propiedad['num_banos']; ?></td>
                </tr>
                <tr>
                    <th>Superficie</th>
                    <td><?php echo $propiedad['superficie']; ?></td>
                </tr>
                <tr>
                    <th>Estado Alquiler</th>
                    <td><?php echo $propiedad['estado_alquiler']; ?></td>
                </tr>
            </table>

            <?php if (isset($_SESSION['user']) && $_SESSION['rol'] == 3) { ?>
                <a href="index.php?c=Pedidos&f=New&id_propiedad=<?php echo $propiedad['id']; ?>">Hacer Pedido</a>
            <?php } ?>

            <h2>Comentarios</h2>
            <?php if (!empty($comentarios)) { ?>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Título</th>
                        <th>Comentario</th>
                        <th>Fecha</th>
                        <th>Valoración Costo</th>
                        <th>Valoración Ubicación</th>
                        <th>Valoración Estado</th>
                    </tr>
                    <?php foreach ($comentarios as $comentario) { ?>
                        <tr>
                            <td><?php echo $comentario->getId(); ?></td>
                            <td><?php echo $comentario->getNombreUsuario(); ?></td>
                            <td><?php echo $comentario->getTitulo(); ?></td>
                            <td><?php echo $comentario->getComentario(); ?></td>
                            <td><?php echo $comentario->getFecha(); ?></td>
                            <td><?php echo $comentario->getValoracionCosto(); ?></td>
                            <td><?php echo $comentario->getValoracionUbicacion(); ?></td>
                            <td><?php echo $comentario->getValoracionEstado(); ?></td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } else { ?>
                <p>No hay comentarios para esta propiedad.</p>
            <?php } ?>
        <?php } else { ?>
            <p>Propiedad no encontrada.</p>
        <?php } ?>
        <a class="back" href="index.php?c=Propiedades&f=index">Volver a la lista</a>
    </div>
</body>
</html>

<?php require_once FOOTER; ?>
