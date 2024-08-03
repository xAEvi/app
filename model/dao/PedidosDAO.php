<?php
require_once 'config/conexion.php';
require_once 'model/dto/Pedido.php';

class PedidosDAO {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

    public function selectByPropiedad($id_propiedad) {
        $sql = "
            SELECT c.*, p.titulo AS titulo
            FROM pedido c
            JOIN propiedad p ON c.propiedad = p.id
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
            $pedido->setTipoPago($row['tipo_pago']);
            $pedido->setNombreUsuario($row['nombre_usuario']); // Establecer el nombre del usuario
            $pedidos[] = $pedido;
        }

        return $pedidos;
    }
}
?>
