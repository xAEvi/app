<?php
require_once 'config/conexion.php';
require_once 'model/dto/Pedido.php';

class PedidosDAO {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

    public function cambiarEstadoPedido($id, $estado) {
        try {
            $sql = "UPDATE pedido SET estado_pedido = :estado WHERE id = :id";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':estado', $estado);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
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

    public function listarPorUsuario($idUsuario) {
        $stmt = $this->conexion->prepare("SELECT * FROM pedido WHERE id_usuario = :id_usuario");
        $stmt->bindParam(':id_usuario', $idUsuario);
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
        try {
            $sql = "INSERT INTO pedido (id_usuario, id_propiedad, fecha_pedido, duracion_alquiler, estado_pedido, fecha_inicio, tipo_pago, comentario, estado) 
                    VALUES (:id_usuario, :id_propiedad, :fecha_pedido, :duracion_alquiler, :estado_pedido, :fecha_inicio, :tipo_pago, :comentario, :estado)";
            $stmt = $this->conexion->prepare($sql);
            
            $idUsuario = $pedido->getIdUsuario();
            $idPropiedad = $pedido->getIdPropiedad();
            $fechaPedido = $pedido->getFechaPedido();
            $duracionAlquiler = $pedido->getDuracionAlquiler();
            $estadoPedido = $pedido->getEstadoPedido();
            $fechaInicio = $pedido->getFechaInicio();
            $tipoPago = $pedido->getTipoPago();
            $comentario = $pedido->getComentario();
            $estado = $pedido->getEstado();
            
            $stmt->bindParam(':id_usuario', $idUsuario);
            $stmt->bindParam(':id_propiedad', $idPropiedad);
            $stmt->bindParam(':fecha_pedido', $fechaPedido);
            $stmt->bindParam(':duracion_alquiler', $duracionAlquiler);
            $stmt->bindParam(':estado_pedido', $estadoPedido);
            $stmt->bindParam(':fecha_inicio', $fechaInicio);
            $stmt->bindParam(':tipo_pago', $tipoPago);
            $stmt->bindParam(':comentario', $comentario);
            $stmt->bindParam(':estado', $estado);
    
            if ($stmt->execute()) {
                echo "Pedido registrado correctamente.";
            } else {
                echo "Error al registrar el pedido.";
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    public function selectByUsuario($id_usuario) {
        $sql = "
            SELECT c.*, p.titulo AS titulo
            FROM pedido c
            JOIN propiedad p ON c.id_propiedad = p.id
            WHERE c.id_usuario = :id_usuario AND c.estado = 'Activo'
        ";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        $pedidos = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $pedido = new pedido();
            $pedido->setId($row['id']);
            $pedido->setIdUsuario($row['id_usuario']);
            $pedido->setIdPropiedad($row['id_propiedad']);
            $pedido->setTitulo($row['titulo']); // Establecer el nuevo campo titulo
            $pedido->setFechaPedido($row['fecha_pedido']);
            $pedido->setFechaInicio($row['fecha_inicio']);
            $pedido->setDuracionAlquiler($row['duracion_alquiler']);
            $pedido->setEstadoPedido($row['estado_pedido']);
            $pedido->setTipoPago($row['tipo_pago']); // Establecer el nombre del usuario
            $pedidos[] = $pedido;
        }
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
