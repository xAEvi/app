<?php
require_once 'config/conexion.php';
require_once 'model/dto/Propiedad.php';

class PropiedadesDAO {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

    public function actualizarEstadoAlquiler($id_propiedad, $estado_alquiler) {
        try {
            $sql = "UPDATE propiedad SET estado_alquiler = :estado_alquiler WHERE id = :id";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':estado_alquiler', $estado_alquiler);
            $stmt->bindParam(':id', $id_propiedad);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    public function selectAll($parametro = '') {
        $query = "
            SELECT p.* 
            FROM propiedad p
            WHERE p.estado = 'Activo' 
            AND p.estado_alquiler = 'Disponible'
        ";

        if (!empty($parametro)) {
            $query .= " AND (p.titulo LIKE :parametro OR p.descripcion LIKE :parametro)";
        }

        $stmt = $this->conexion->prepare($query);

        if (!empty($parametro)) {
            $likeParam = '%' . $parametro . '%';
            $stmt->bindParam(':parametro', $likeParam, PDO::PARAM_STR);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectAvailable(){
        $query = "SELECT * FROM propiedad WHERE estado_alquiler = 'Disponible' AND estado = 'Activo'
                  AND id NOT in (
                    SELECT id_propiedad 
                    FROM mantenimiento 
                    WHERE CURRENT_DATE BETWEEN fecha_inicio AND fecha_fin
                )";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectOne($id) {
        $query = "SELECT * FROM propiedad WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

    public function insert(Propiedad $prop) {
        $query = "INSERT INTO propiedad (titulo, tipo_propiedad, descripcion, imagen, direccion, precio, num_habitaciones, num_banos, superficie, estado_alquiler, estado) VALUES (:titulo, :tipo_propiedad, :descripcion, :imagen, :direccion, :precio, :num_habitaciones, :num_banos, :superficie, :estado_alquiler, :estado)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindValue(':titulo', $prop->getTitulo());
        $stmt->bindValue(':tipo_propiedad', $prop->getTipoPropiedad());
        $stmt->bindValue(':descripcion', $prop->getDescripcion());
        $stmt->bindValue(':imagen', $prop->getImagen(), PDO::PARAM_LOB);
        $stmt->bindValue(':direccion', $prop->getDireccion());
        $stmt->bindValue(':precio', $prop->getPrecio());
        $stmt->bindValue(':num_habitaciones', $prop->getNumHabitaciones());
        $stmt->bindValue(':num_banos', $prop->getNumBanos());
        $stmt->bindValue(':superficie', $prop->getSuperficie());
        $stmt->bindValue(':estado_alquiler', $prop->getEstadoAlquiler());
        $stmt->bindValue(':estado', $prop->getEstado());
        return $stmt->execute();
    }

    public function update(Propiedad $prop) {
        $query = "UPDATE propiedad SET titulo = :titulo, tipo_propiedad = :tipo_propiedad, descripcion = :descripcion, imagen = :imagen, direccion = :direccion, precio = :precio, num_habitaciones = :num_habitaciones, num_banos = :num_banos, superficie = :superficie, estado_alquiler = :estado_alquiler WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindValue(':titulo', $prop->getTitulo());
        $stmt->bindValue(':tipo_propiedad', $prop->getTipoPropiedad());
        $stmt->bindValue(':descripcion', $prop->getDescripcion());
        $stmt->bindValue(':imagen', $prop->getImagen(), PDO::PARAM_LOB);
        $stmt->bindValue(':direccion', $prop->getDireccion());
        $stmt->bindValue(':precio', $prop->getPrecio());
        $stmt->bindValue(':num_habitaciones', $prop->getNumHabitaciones());
        $stmt->bindValue(':num_banos', $prop->getNumBanos());
        $stmt->bindValue(':superficie', $prop->getSuperficie());
        $stmt->bindValue(':estado_alquiler', $prop->getEstadoAlquiler());
        $stmt->bindValue(':id', $prop->getId(), PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete(Propiedad $prop) {
        $query = "UPDATE propiedad SET estado = 'Inactivo' WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindValue(':id', $prop->getId(), PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function rent(Propiedad $prop) {
        $query = "UPDATE propiedad SET estado_alquiler = 'Alquilado' WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindValue(':id', $prop->getId(), PDO::PARAM_INT);
        return $stmt->execute();
    }

    
}
?>
