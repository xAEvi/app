<?php
require_once 'config/conexion.php';
require_once 'model/dto/Comentario.php';

class ComentarioDAO {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

    public function selectByPropiedad($id_propiedad) {
        // Consulta SQL con JOIN para obtener el nombre del usuario
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
            $comentario->setComentario($row['comentario']);
            $comentario->setFecha($row['fecha']);
            $comentario->setValoracionCosto($row['valoracion_costo']);
            $comentario->setValoracionUbicacion($row['valoracion_ubicacion']);
            $comentario->setValoracionEstado($row['valoracion_estado']);
            $comentario->setEstado($row['estado']);
            $comentario->setNombreUsuario($row['nombre_usuario']); // Establecer el nombre del usuario
            $comentarios[] = $comentario;
        }

        return $comentarios;
    }
}
?>
