<?php
//autor: Vélez Pulido Christopher Jeremy

require_once 'config/conexion.php';
require_once 'model/dto/Mantenimiento.php';

class MantenimientoDAO {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

    public function selectAll($parametro = '') {
        $query = "
            SELECT m.*, p.titulo AS propiedad_titulo 
            FROM mantenimiento m
            JOIN propiedad p ON m.id_propiedad = p.id
            WHERE m.estado='Activo' AND (
                p.titulo LIKE :parametro OR 
                m.descripcion LIKE :parametro OR 
                m.nombre_mantenimiento LIKE :parametro OR 
                m.encargado LIKE :parametro
            )
        ";
        
        $stmt = $this->conexion->prepare($query);
        $likeParam = '%' . $parametro . '%';
        $stmt->bindParam(':parametro', $likeParam, PDO::PARAM_STR);
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

    public function update(Mantenimiento $mantenimiento) {
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
        $stmt->bindValue(':id', $mantenimiento->getId());
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
    

    public function delete($man) {
        $query = "UPDATE mantenimiento SET estado = 'Inactivo' WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindValue(':id', $man->getId(), PDO::PARAM_INT);
        return $stmt->execute();
    }

    
}
?>

