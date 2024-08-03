<?php
require_once 'config/conexion.php';
require_once 'model/dto/Pedido.php';

class PedidosDAO {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

    public function actualizarEstadoAlquiler($id_propiedad, $estado_alquiler) {
        $stmt = $this->conexion->prepare("UPDATE propiedad SET estado_alquiler = :estado_alquiler WHERE id = :id");
        $stmt->execute(['estado_alquiler' => $estado_alquiler, 'id' => $id_propiedad]);
    }

    public function listar() {
        $stmt = $this->conexion->prepare("SELECT * FROM pedido");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Pedido');
    }

    public function obtener($id) {
        $stmt = $this->conexion->prepare("SELECT * FROM pedido WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Pedido');
        return $stmt->fetch();
    }

    public function registrar(Pedido $pedido) {
        $stmt = $this->conexion->prepare("INSERT INTO pedido (id_usuario, id_propiedad, fecha_pedido, duracion_alquiler, estado_pedido, fecha_inicio, tipo_pago, comentario, estado) VALUES (:id_usuario, :id_propiedad, :fecha_pedido, :duracion_alquiler, :estado_pedido, :fecha_inicio, :tipo_pago, :comentario, :estado)");
        $stmt->execute([
            'id_usuario' => $pedido->getIdUsuario(),
            'id_propiedad' => $pedido->getIdPropiedad(),
            'fecha_pedido' => $pedido->getFechaPedido(),
            'duracion_alquiler' => $pedido->getDuracionAlquiler(),
            'estado_pedido' => $pedido->getEstadoPedido(),
            'fecha_inicio' => $pedido->getFechaInicio(),
            'tipo_pago' => $pedido->getTipoPago(),
            'comentario' => $pedido->getComentario(),
            'estado' => $pedido->getEstado()
        ]);
    }

    public function actualizar(Pedido $pedido) {
        $stmt = $this->conexion->prepare("UPDATE pedido SET id_usuario = :id_usuario, id_propiedad = :id_propiedad, fecha_pedido = :fecha_pedido, duracion_alquiler = :duracion_alquiler, estado_pedido = :estado_pedido, fecha_inicio = :fecha_inicio, tipo_pago = :tipo_pago, comentario = :comentario, estado = :estado WHERE id = :id");
        $stmt->execute([
            'id' => $pedido->getId(),
            'id_usuario' => $pedido->getIdUsuario(),
            'id_propiedad' => $pedido->getIdPropiedad(),
            'fecha_pedido' => $pedido->getFechaPedido(),
            'duracion_alquiler' => $pedido->getDuracionAlquiler(),
            'estado_pedido' => $pedido->getEstadoPedido(),
            'fecha_inicio' => $pedido->getFechaInicio(),
            'tipo_pago' => $pedido->getTipoPago(),
            'comentario' => $pedido->getComentario(),
            'estado' => $pedido->getEstado()
        ]);
    }

    public function eliminar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM pedido WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    
}
?>
