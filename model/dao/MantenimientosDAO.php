<?php
require_once 'config/conexion.php';
require_once 'model/dto/Mantenimiento.php';

class MantenimientoDAO {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

    public function selectAll() {
        $query = "
            SELECT m.*, p.titulo AS propiedad_titulo 
            FROM mantenimiento m
            JOIN propiedad p ON m.id_propiedad = p.id
            WHERE m.estado='Activo'
        ";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function selectOne($id) {
        $query = "SELECT * FROM mantenimiento WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert(Mantenimiento $mantenimiento) {
        $query = "INSERT INTO mantenimiento (id_propiedad, fecha_inicio, fecha_fin, descripcion, nombre_mantenimiento, encargado, estado, costo)
                  VALUES (:id_propiedad, :fecha_inicio, :fecha_fin, :descripcion, :nombre_mantenimiento, :encargado, :estado, :costo)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindValue(':id_propiedad', $mantenimiento->getIdPropiedad(), PDO::PARAM_INT);
        $stmt->bindValue(':fecha_inicio', $mantenimiento->getFechaInicio());
        $stmt->bindValue(':fecha_fin', $mantenimiento->getFechaFin());
        $stmt->bindValue(':descripcion', $mantenimiento->getDescripcion());
        $stmt->bindValue(':nombre_mantenimiento', $mantenimiento->getNombreMantenimiento());
        $stmt->bindValue(':encargado', $mantenimiento->getEncargado());
        $stmt->bindValue(':estado', $mantenimiento->getEstado());
        $stmt->bindValue(':costo', $mantenimiento->getCosto());
        return $stmt->execute();
    }

    public function update($mantenimiento) {
        $query = "UPDATE mantenimiento SET 
                  id_propiedad = :id_propiedad, 
                  fecha_inicio = :fecha_inicio, 
                  fecha_fin = :fecha_fin, 
                  descripcion = :descripcion, 
                  nombre_mantenimiento = :nombre_mantenimiento, 
                  encargado = :encargado, 
                  estado = :estado,
                  costo = :costo 
                  WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindValue(':id', $mantenimiento['id'], PDO::PARAM_INT);
        $stmt->bindValue(':id_propiedad', $mantenimiento['id_propiedad'], PDO::PARAM_INT);
        $stmt->bindValue(':fecha_inicio', $mantenimiento['fecha_inicio']);
        $stmt->bindValue(':fecha_fin', $mantenimiento['fecha_fin']);
        $stmt->bindValue(':descripcion', $mantenimiento['descripcion']);
        $stmt->bindValue(':nombre_mantenimiento', $mantenimiento['nombre_mantenimiento']);
        $stmt->bindValue(':encargado', $mantenimiento['encargado']);
        $stmt->bindValue(':estado', $mantenimiento['estado']);
        $stmt->bindValue(':costo', $mantenimiento['costo']);
        return $stmt->execute();
    }
    

    public function delete($man) {
        $query = "UPDATE mantenimiento SET estado = 'Inactivo' WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindValue(':id', $man->getId(), PDO::PARAM_INT);
        return $stmt->execute();
    }

    
}
?>

