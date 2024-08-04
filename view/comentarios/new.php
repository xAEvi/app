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
  <title>Nuevo Comentario</title>
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
    .form-group textarea {
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
    <div class="header">
      <h1>Agregar Nuevo Comentario</h1>
    </div>

    <?php if (isset($_SESSION['mensaje'])) { ?>
      <div class="alert">
        <?php echo $_SESSION['mensaje'];
        unset($_SESSION['mensaje']); ?>
      </div>
    <?php } ?>

    <form action="index.php?c=Comentario&f=create" method="post">
      <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" id="titulo" name="titulo" required>
      </div>
      <div class="form-group">
        <label for="comentario">Comentario</label>
        <textarea id="comentario" name="comentario" required></textarea>
      </div>
      <div class="form-group">
        <label for="valoracion_costo">Valoración Costo</label>
        <input type="number" id="valoracion_costo" name="valoracion_costo" min="1" max="5" required>
      </div>
      <div class="form-group">
        <label for="valoracion_ubicacion">Valoración Ubicación</label>
        <input type="number" id="valoracion_ubicacion" name="valoracion_ubicacion" min="1" max="5" required>
      </div>
      <div class="form-group">
        <label for="valoracion_estado">Valoración Estado</label>
        <input type="number" id="valoracion_estado" name="valoracion_estado" min="1" max="5" required>
      </div>
      <input type="hidden" name="id_propiedad" value="<?php echo htmlspecialchars($_GET['id_propiedad']); ?>">
      <div class="form-group">
        <button type="submit">Agregar Comentario</button>
      </div>
    </form>

    <div class="button-container">
      <a class="back" href="index.php?c=Propiedades&f=index">Volver a la lista</a>
    </div>
  </div>
</body>

</html>

<?php require_once FOOTER; ?>