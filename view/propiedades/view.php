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

        .header a:hover {
            background-color: #e91e63;
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

        .alert {
            padding: 15px;
            background-color: #ffcccb;
            color: #333;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .back, .add-comment {
            display: inline-block;
            background-color: #f06292;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .back:hover, .add-comment:hover {
            background-color: #e91e63;
        }

        .actions a {
            color: #f06292;
            text-decoration: none;
            margin: 0 5px;
        }

        .actions a:hover {
            color: #e91e63;
        }

        .actions i {
            font-size: 18px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.9);
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        .modal-content, #caption {
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @keyframes zoom {
            from {transform: scale(0)}
            to {transform: scale(1)}
        }

        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        @media only screen and (max-width: 700px){
            .modal-content {
                width: 100%;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $propiedad['tipo_propiedad']; ?></td>
                        <td><?php echo $propiedad['descripcion']; ?></td>
                        <td>
                            <?php if ($propiedad['imagen']) { ?>
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($propiedad['imagen']); ?>" alt="Imagen" style="max-width: 100px; height: auto;" onclick="openModal(this)">
                            <?php } else { ?>
                                No Disponible
                            <?php } ?>
                        </td>
                        <td><?php echo $propiedad['direccion']; ?></td>
                        <td><?php echo $propiedad['precio']; ?></td>
                        <td><?php echo $propiedad['num_habitaciones']; ?></td>
                        <td><?php echo $propiedad['num_banos']; ?></td>
                        <td><?php echo $propiedad['superficie']; ?></td>
                        <td><?php echo $propiedad['estado_alquiler']; ?></td>
                    </tr>
                </tbody>
            </table>

            <?php if (isset($_SESSION['user_id']) && $_SESSION['rol'] == 3) { ?>
                <a href="index.php?c=Pedidos&f=New&id_propiedad=<?php echo $propiedad['id']; ?>" class="add-comment">Hacer Pedido</a>
            <?php } ?>

            <h2>Comentarios</h2>
            <?php if (!empty($comentarios)) { ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Título</th>
                            <th>Comentario</th>
                            <th>Fecha</th>
                            <th>Valoración Costo</th>
                            <th>Valoración Ubicación</th>
                            <th>Valoración Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                <td class="actions">
                                    <?php if ($_SESSION['user_id'] == $comentario->getIdUsuario()) { ?>
                                        <a href="index.php?c=Comentario&f=edit&id=<?php echo $comentario->getId(); ?>"><i class="fas fa-edit"></i></a>
                                        <a href="index.php?c=Comentario&f=delete&id=<?php echo $comentario->getId(); ?>&id_propiedad=<?php echo $propiedad['id']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este comentario?');"><i class="fas fa-trash-alt"></i></a>
                                    <?php } elseif ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2) { ?>
                                        <a href="index.php?c=Comentario&f=delete&id=<?php echo $comentario->getId(); ?>&id_propiedad=<?php echo $propiedad['id']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este comentario?');"><i class="fas fa-trash-alt"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <p>No hay comentarios para esta propiedad.</p>
            <?php } ?>
        <?php } else { ?>
            <p>Propiedad no encontrada.</p>
        <?php } ?>
        <div class="button-container">
            <a class="back" href="index.php?c=Propiedades&f=index">Volver a la lista</a>
            <a class="add-comment" href="index.php?c=Comentario&f=add&id_propiedad=<?php echo $propiedad['id']; ?>">Añadir Comentario</a>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
    </div>

    <script>
        function openModal(element) {
            var modal = document.getElementById("myModal");
            var modalImg = document.getElementById("img01");
            modal.style.display = "flex";  
            modalImg.src = element.src;
        }

        var span = document.getElementsByClassName("close")[0];
        span.onclick = function() { 
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            var modal = document.getElementById("myModal");
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>

<?php require_once FOOTER; ?>