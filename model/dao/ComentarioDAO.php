<?php
//autor: Quinto Veloz Jhon Henry
require_once 'config/conexion.php';
require_once 'model/dto/Comentario.php';

class ComentarioDAO
{
  private $conexion;

  public function __construct()
  {
    $this->conexion = Conexion::conectar();
  }

  public function selectByPropiedad($id_propiedad)
  {
    $sql = "
            SELECT c.*, u.nombre AS nombre_usuario
            FROM comentario c
            JOIN usuario u ON c.id_usuario = u.id
            WHERE c.id_propiedad = :id_propiedad AND c.estado = 'Activo'
        ";
    $stmt = $this->conexion->prepare($sql);
    $stmt->bindParam(':id_propiedad', $id_propiedad, PDO::PARAM_INT);
    $stmt->execute();
    $comentarios = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $comentario = new Comentario();
      $comentario->setId($row['id']);
      $comentario->setIdUsuario($row['id_usuario']);
      $comentario->setIdPropiedad($row['id_propiedad']);
      $comentario->setTitulo($row['titulo']);
      $comentario->setComentario($row['comentario']);
      $comentario->setFecha($row['fecha']);
      $comentario->setValoracionCosto($row['valoracion_costo']);
      $comentario->setValoracionUbicacion($row['valoracion_ubicacion']);
      $comentario->setValoracionEstado($row['valoracion_estado']);
      $comentario->setEstado($row['estado']);
      $comentario->setNombreUsuario($row['nombre_usuario']);
      $comentarios[] = $comentario;
    }

    return $comentarios;
  }

  public function insert(Comentario $comentario)
  {
    $sql = "
            INSERT INTO comentario (id_usuario, id_propiedad, titulo, comentario, fecha, valoracion_costo, valoracion_ubicacion, valoracion_estado, estado)
            VALUES (:id_usuario, :id_propiedad, :titulo, :comentario, :fecha, :valoracion_costo, :valoracion_ubicacion, :valoracion_estado, :estado)
        ";

    $stmt = $this->conexion->prepare($sql);

    $id_usuario = $comentario->getIdUsuario();
    $id_propiedad = $comentario->getIdPropiedad();
    $titulo = $comentario->getTitulo();
    $comentario_texto = $comentario->getComentario();
    $fecha = $comentario->getFecha() ?: date('Y-m-d H:i:s');
    $valoracion_costo = $comentario->getValoracionCosto();
    $valoracion_ubicacion = $comentario->getValoracionUbicacion();
    $valoracion_estado = $comentario->getValoracionEstado();
    $estado = $comentario->getEstado();

    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $stmt->bindParam(':id_propiedad', $id_propiedad, PDO::PARAM_INT);
    $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
    $stmt->bindParam(':comentario', $comentario_texto, PDO::PARAM_STR);
    $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
    $stmt->bindParam(':valoracion_costo', $valoracion_costo, PDO::PARAM_INT);
    $stmt->bindParam(':valoracion_ubicacion', $valoracion_ubicacion, PDO::PARAM_INT);
    $stmt->bindParam(':valoracion_estado', $valoracion_estado, PDO::PARAM_INT);
    $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);

    return $stmt->execute();
  }

  public function update(Comentario $comentario)
  {
    $sql = "
            UPDATE comentario
            SET titulo = :titulo, comentario = :comentario, fecha = :fecha, valoracion_costo = :valoracion_costo, 
                valoracion_ubicacion = :valoracion_ubicacion, valoracion_estado = :valoracion_estado, estado = :estado
            WHERE id = :id
        ";

    $stmt = $this->conexion->prepare($sql);

    $id = $comentario->getId();
    $titulo = $comentario->getTitulo();
    $comentario_texto = $comentario->getComentario();
    $fecha = $comentario->getFecha();
    $valoracion_costo = $comentario->getValoracionCosto();
    $valoracion_ubicacion = $comentario->getValoracionUbicacion();
    $valoracion_estado = $comentario->getValoracionEstado();
    $estado = $comentario->getEstado();
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
    $stmt->bindParam(':comentario', $comentario_texto, PDO::PARAM_STR);
    $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
    $stmt->bindParam(':valoracion_costo', $valoracion_costo, PDO::PARAM_INT);
    $stmt->bindParam(':valoracion_ubicacion', $valoracion_ubicacion, PDO::PARAM_INT);
    $stmt->bindParam(':valoracion_estado', $valoracion_estado, PDO::PARAM_INT);
    $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);

    return $stmt->execute();
  }

  public function selectById($id)
  {
    $sql = "
            SELECT c.*, u.nombre AS nombre_usuario
            FROM comentario c
            JOIN usuario u ON c.id_usuario = u.id
            WHERE c.id = :id AND c.estado = 'Activo'
        ";
    $stmt = $this->conexion->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
      $comentario = new Comentario();
      $comentario->setId($row['id']);
      $comentario->setIdUsuario($row['id_usuario']);
      $comentario->setIdPropiedad($row['id_propiedad']);
      $comentario->setTitulo($row['titulo']);
      $comentario->setComentario($row['comentario']);
      $comentario->setFecha($row['fecha']);
      $comentario->setValoracionCosto($row['valoracion_costo']);
      $comentario->setValoracionUbicacion($row['valoracion_ubicacion']);
      $comentario->setValoracionEstado($row['valoracion_estado']);
      $comentario->setEstado($row['estado']);
      $comentario->setNombreUsuario($row['nombre_usuario']);
      return $comentario;
    } else {
      return null;
    }
  }
  public function delete($id)
  {
    $sql = "
            UPDATE comentario
            SET estado = 'Inactivo'
            WHERE id = :id
        ";

    $stmt = $this->conexion->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    return $stmt->execute();
  }
}
