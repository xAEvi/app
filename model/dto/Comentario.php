<?php
class Comentario {
    private $id;
    private $id_usuario;
    private $id_propiedad;
    private $titulo; // Nuevo campo
    private $comentario;
    private $fecha;
    private $valoracion_costo;
    private $valoracion_ubicacion;
    private $valoracion_estado;
    private $estado;
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

    public function getComentario() { return $this->comentario; }
    public function setComentario($comentario) { $this->comentario = $comentario; }

    public function getFecha() { return $this->fecha; }
    public function setFecha($fecha) { $this->fecha = $fecha; }

    public function getValoracionCosto() { return $this->valoracion_costo; }
    public function setValoracionCosto($valoracion_costo) { $this->valoracion_costo = $valoracion_costo; }

    public function getValoracionUbicacion() { return $this->valoracion_ubicacion; }
    public function setValoracionUbicacion($valoracion_ubicacion) { $this->valoracion_ubicacion = $valoracion_ubicacion; }

    public function getValoracionEstado() { return $this->valoracion_estado; }
    public function setValoracionEstado($valoracion_estado) { $this->valoracion_estado = $valoracion_estado; }

    public function getEstado() { return $this->estado; }
    public function setEstado($estado) { $this->estado = $estado; }

    public function getNombreUsuario() { return $this->nombre_usuario; }
    public function setNombreUsuario($nombre_usuario) { $this->nombre_usuario = $nombre_usuario; }
}
?>
