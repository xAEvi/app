<?php
//autor: Quinto Veloz Jhon Henry
session_start();
require_once 'model/dao/ComentarioDAO.php';
require_once 'model/dto/Comentario.php';

class ComentarioController
{

  public function add()
  {
    $id_propiedad = isset($_GET['id_propiedad']) ? intval($_GET['id_propiedad']) : 0;
    require 'view/comentarios/new.php';
  }

  public function create()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : '';
      $comentario = isset($_POST['comentario']) ? $_POST['comentario'] : '';
      $valoracion_costo = isset($_POST['valoracion_costo']) ? intval($_POST['valoracion_costo']) : 0;
      $valoracion_ubicacion = isset($_POST['valoracion_ubicacion']) ? intval($_POST['valoracion_ubicacion']) : 0;
      $valoracion_estado = isset($_POST['valoracion_estado']) ? intval($_POST['valoracion_estado']) : 0;
      $id_propiedad = isset($_POST['id_propiedad']) ? intval($_POST['id_propiedad']) : 0;
      $id_usuario = $_SESSION['user_id'];

      if (empty($titulo) || empty($comentario) || $valoracion_costo < 1 || $valoracion_ubicacion < 1 || $valoracion_estado < 1) {
        $_SESSION['mensaje'] = 'Por favor complete todos los campos correctamente.';
        header('Location: index.php?c=Comentario&f=add&id_propiedad=' . $id_propiedad);
        exit;
      }

      $comentarioDTO = new Comentario();
      $comentarioDTO->setTitulo($titulo);
      $comentarioDTO->setComentario($comentario);
      $comentarioDTO->setValoracionCosto($valoracion_costo);
      $comentarioDTO->setValoracionUbicacion($valoracion_ubicacion);
      $comentarioDTO->setValoracionEstado($valoracion_estado);
      $comentarioDTO->setIdPropiedad($id_propiedad);
      $comentarioDTO->setIdUsuario($id_usuario);
      $comentarioDTO->setEstado('Activo');

      $comentarioDAO = new ComentarioDAO();
      if ($comentarioDAO->insert($comentarioDTO)) {
        $_SESSION['mensaje'] = 'Comentario agregado exitosamente.';
      } else {
        $_SESSION['mensaje'] = 'Hubo un error al agregar el comentario. Intente nuevamente.';
      }

      header('Location: index.php?c=Propiedades&f=view&id=' . $id_propiedad);
      exit;
    }
  }
  public function edit()
  {
    if (isset($_GET['id'])) {
      $id = intval($_GET['id']);
      $comentarioDAO = new ComentarioDAO();
      $comentario = $comentarioDAO->selectById($id);

      if ($comentario) {
        require_once 'view/comentarios/edit.php';
      } else {
        $_SESSION['mensaje'] = "Comentario no encontrado.";
        header("Location: index.php?c=Propiedades&f=index");
        exit;
      }
    } else {
      $_SESSION['mensaje'] = "ID de comentario no proporcionado.";
      header("Location: index.php?c=Propiedades&f=index");
      exit;
    }
  }



  public function update()
  {
    $comentario = new Comentario();
    $comentario->setId($_POST['id']);
    $comentario->setTitulo($_POST['titulo']);
    $comentario->setComentario($_POST['comentario']);
    $comentario->setFecha($_POST['fecha']);
    $comentario->setValoracionCosto($_POST['valoracion_costo']);
    $comentario->setValoracionUbicacion($_POST['valoracion_ubicacion']);
    $comentario->setValoracionEstado($_POST['valoracion_estado']);
    $comentario->setEstado($_POST['estado']);

    $comentarioDAO = new ComentarioDAO();
    if ($comentarioDAO->update($comentario)) {
      $_SESSION['mensaje'] = 'Comentario actualizado exitosamente.';
    } else {
      $_SESSION['mensaje'] = 'Error al actualizar el comentario.';
    }

    header('Location: index.php?c=Propiedades&f=view&id=' . $_POST['id_propiedad']);
  }
  public function delete()
  {
    $comentario = new Comentario();
    $comentario->setId($_GET['id']);
    $comentarioDAO = new ComentarioDAO();
    if ($comentarioDAO->delete($comentario->getId())) {
      $_SESSION['mensaje'] = 'Comentario eliminado exitosamente.';
    } else {
      $_SESSION['mensaje'] = 'Error al eliminar el comentario.';
    }
    header("Location: index.php?c=Propiedades&f=view&id=3");
  }
}
