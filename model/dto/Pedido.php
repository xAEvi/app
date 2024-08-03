<?php
class Comentario {
    private $id;
    private $id_usuario;
    private $id_propiedad;
    private $titulo; // Nuevo campo
    private $fecha_pedido;
    private $fecha_inicio;
    private $duracion_alquiler;
    private $estado_pedido;
    private $tipo_pago;
    private $nombre_usuario;

    // Getters y setters para todos los atributos
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getIdUsuario() { return $this->id_usuario; }
    public function setIdUsuario($id_usuario) { $this->id_usuario = $id_usuario; }

    public function getIdPropiedad() { return $this->id_propiedad; }
    public function setIdPropiedad($id_propiedad) { $this->id_propiedad = $id_propiedad; }

    public function getTitulo() { return $this->titulo; } // Nuevo getter
    public function setTitulo($titulo) { $this->titulo = $titulo; } // Nuevo setter
    
    public function getFechaPedido() { return $this->fecha_pedido; }
    public function setFechaPedido($fecha_pedido) { $this->fecha_pedido = $fecha_pedido; }
    
    public function getFechaInicio() { return $this->fecha_inicio; }
    public function setFechaInicio($fecha_inicio) { $this->fecha_inicio = $fecha_inicio;}

    public function getDuracionAlquiler() { return $this->duracion_alquiler;}
    public function setDuracionAlquiler($duracion_alquiler) { $this->duracion_alquiler = $duracion_alquiler;}

    public function getEstadoPedido() { return $this->estado_pedido;}
    public function setEstadoPedido($estado_pedido) { $this->estado_pedido = $estado_pedido;}

    public function getTipoPago() { return $this->tipo_pago;}
    public function setTipoPago($tipo_pago) { $this->tipo_pago = $tipo_pago}

    public function getNombreUsuario() { return $this->nombre_usuario;}
    public function setNombreUsuario($nombre_usuario) { $this->nombre_usuario = $nombre_usuario}

    
}
?>
