<?php
class Propiedad {
    private $id;
    private $titulo;
    private $tipo_propiedad;
    private $descripcion;
    private $imagen;
    private $direccion;
    private $precio;
    private $num_habitaciones;
    private $num_banos;
    private $superficie;
    private $estado_alquiler;
    private $estado;

    // Getters y setters
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getTitulo() { return $this->titulo; }
    public function setTitulo($titulo) { $this->titulo = $titulo; }

    public function getTipoPropiedad() { return $this->tipo_propiedad; }
    public function setTipoPropiedad($tipo_propiedad) { $this->tipo_propiedad = $tipo_propiedad; }

    public function getDescripcion() { return $this->descripcion; }
    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }

    public function getImagen() { return $this->imagen; }
    public function setImagen($imagen) { $this->imagen = $imagen; }

    public function getDireccion() { return $this->direccion; }
    public function setDireccion($direccion) { $this->direccion = $direccion; }

    public function getPrecio() { return $this->precio; }
    public function setPrecio($precio) { $this->precio = $precio; }

    public function getNumHabitaciones() { return $this->num_habitaciones; }
    public function setNumHabitaciones($num_habitaciones) { $this->num_habitaciones = $num_habitaciones; }

    public function getNumBanos() { return $this->num_banos; }
    public function setNumBanos($num_banos) { $this->num_banos = $num_banos; }

    public function getSuperficie() { return $this->superficie; }
    public function setSuperficie($superficie) { $this->superficie = $superficie; }

    public function getEstadoAlquiler() { return $this->estado_alquiler; }
    public function setEstadoAlquiler($estado_alquiler) { $this->estado_alquiler = $estado_alquiler; }

    public function getEstado() { return $this->estado; }
    public function setEstado($estado) { $this->estado = $estado; }
}
?>
