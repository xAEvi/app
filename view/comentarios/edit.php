<?php
//autor: Quinto Veloz Jhon Henry
if (!isset($_SESSION)) {
  session_start();
} ?>

<?php require_once HEADER; ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Editar Comentario</title>
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

    .header h1 {
      margin: 0;
      font-size: 24px;
      color: #333;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-sizing: border-box;
    }

    .form-group textarea {
      resize: vertical;
      height: 100px;
    }

    .form-group button {
      background-color: #f06292;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      font-size: 14px;
      cursor: pointer;
    }

    .form-group button:hover {
      background-color: #e91e63;
    }

    .button-container {
      margin-top: 20px;
    }

    .back {
      background-color: #f06292;
      color: #fff;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
      font-size: 14px;
    }

    .back:hover {
      background-color: #e91e63;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Editar Comentario</h1>
    <form action="index.php?c=Comentario&f=update" method="POST">
      <input type="hidden" name="id" value="<?php echo $comentario->getId(); ?>">
      <input type="hidden" name="id_propiedad" value="<?php echo $comentario->getIdPropiedad(); ?>">

      <div class="form-group">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($comentario->getTitulo()); ?>" required>
      </div>

      <div class="form-group">
        <label for="comentario">Comentario:</label>
        <textarea id="comentario" name="comentario" required><?php echo htmlspecialchars($comentario->getComentario()); ?></textarea>
      </div>

      <div class="form-group">
        <label for="fecha">Fecha:</label>
        <input type="datetime-local" id="fecha" name="fecha" value="<?php echo date('Y-m-d\TH:i', strtotime($comentario->getFecha())); ?>" required>
      </div>

      <div class="form-group">
        <label for="valoracion_costo">Valoración Costo:</label>
        <input type="number" id="valoracion_costo" name="valoracion_costo" value="<?php echo $comentario->getValoracionCosto(); ?>" min="1" max="5" required>
      </div>

      <div class="form-group">
        <label for="valoracion_ubicacion">Valoración Ubicación:</label>
        <input type="number" id="valoracion_ubicacion" name="valoracion_ubicacion" value="<?php echo $comentario->getValoracionUbicacion(); ?>" min="1" max="5" required>
      </div>

      <div class="form-group">
        <label for="valoracion_estado">Valoración Estado:</label>
        <input type="number" id="valoracion_estado" name="valoracion_estado" value="<?php echo $comentario->getValoracionEstado(); ?>" min="1" max="5" required>
      </div>

      <input type="hidden" name="estado" value="Activo">

      <div class="form-group">
        <button type="submit">Actualizar Comentario</button>
      </div>
    </form>
    <div class="button-container">
      <a class="back" href="index.php?c=Propiedades&f=view&id=<?php echo $comentario->getIdPropiedad(); ?>">Volver</a>
    </div>
  </div>
</body>

</html>

<?php require_once FOOTER; ?>