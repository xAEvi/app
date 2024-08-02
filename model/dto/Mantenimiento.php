<?php
class Mantenimiento {
    private $id;
    private $id_propiedad;
    private $fecha_inicio;
    private $fecha_fin;
    private $descripcion;
    private $nombre_mantenimiento;
    private $encargado;
    private $estado;
    private $costo;
    // Getters y Setters para cada propiedad
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdPropiedad() {
        return $this->id_propiedad;
    }

    public function setIdPropiedad($id_propiedad) {
        $this->id_propiedad = $id_propiedad;
    }

    public function getFechaInicio() {
        return $this->fecha_inicio;
    }

    public function setFechaInicio($fecha_inicio) {
        $this->fecha_inicio = $fecha_inicio;
    }

    public function getFechaFin() {
        return $this->fecha_fin;
    }

    public function setFechaFin($fecha_fin) {
        $this->fecha_fin = $fecha_fin;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getNombreMantenimiento() {
        return $this->nombre_mantenimiento;
    }

    public function setNombreMantenimiento($nombre_mantenimiento) {
        $this->nombre_mantenimiento = $nombre_mantenimiento;
    }

    public function getEncargado() {
        return $this->encargado;
    }

    public function setEncargado($encargado) {
        $this->encargado = $encargado;
    }

    public function getCosto() {
        return $this->costo;
    }

    public function setCosto($costo) {
        $this->costo = $costo;
    }
    public function setEstado($estado) {
        $this->estado = $estado;
    }

    // También asegúrate de tener un método para obtener el estado si lo necesitas
    public function getEstado() {
        return $this->estado;
    }
}
?>