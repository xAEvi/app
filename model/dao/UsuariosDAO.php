<?php
 //Autor :NARCISA CARRILLO SANCHEZ 
require_once 'config/conexion.php';
require_once 'model/dto/Usuario.php';

class UsuariosDAO {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

    public function authenticate($username, $password) {
        $query = "SELECT * FROM usuario WHERE username = :username AND contrasena = :contrasena";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':contrasena', $password);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function selectAll($parametro = '') {
        $query = "SELECT * FROM usuario WHERE estado = 'Activo'";

        if (!empty($parametro)) {
            $query .= " AND (nombre LIKE :parametro OR correo LIKE :parametro OR username LIKE :parametro)";
        }

        $stmt = $this->conexion->prepare($query);

        if (!empty($parametro)) {
            $likeParam = '%' . $parametro . '%';
            $stmt->bindParam(':parametro', $likeParam, PDO::PARAM_STR);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectOne($id) {
        $query = "SELECT * FROM usuario WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

    public function insert(usuario $user) {
        $query = "INSERT INTO usuario (nombre, contrasena, username, imagen, direccion, correo, rol, estado) VALUES (:nombre, :contrasena, :username, :imagen, :direccion, :correo, :rol, :estado)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindValue(':nombre', $user->getNombre());
        $stmt->bindValue(':contrasena', $user->getContrasena());
        $stmt->bindValue(':username', $user->getUsername());
        $stmt->bindValue(':imagen', $user->getImagen(), PDO::PARAM_LOB);
        $stmt->bindValue(':direccion', $user->getDireccion());
        $stmt->bindValue(':correo', $user->getCorreo());
        $stmt->bindValue(':rol', $user->getRol());
        $stmt->bindValue(':estado', $user->getEstado());
        return $stmt->execute();
    }

    public function update(Usuario $user) {
        $query = "UPDATE usuario SET nombre = :nombre, contrasena = :contrasena, username = :username, direccion = :direccion, correo = :correo, rol = :rol, estado = :estado";
        
        if ($user->getImagen() !== null) {
            $query .= ", imagen = :imagen";
        }

        $query .= " WHERE id = :id";
        $stmt = $this->conexion->prepare($query);

        $stmt->bindValue(':nombre', $user->getNombre());
        $stmt->bindValue(':contrasena', $user->getContrasena());
        $stmt->bindValue(':username', $user->getUsername());
        $stmt->bindValue(':direccion', $user->getDireccion());
        $stmt->bindValue(':correo', $user->getCorreo());
        $stmt->bindValue(':rol', $user->getRol());
        $stmt->bindValue(':estado', $user->getEstado());
        $stmt->bindValue(':id', $user->getId(), PDO::PARAM_INT);

        if ($user->getImagen() !== null) {
            $stmt->bindValue(':imagen', $user->getImagen(), PDO::PARAM_LOB);
        }

        return $stmt->execute();
    }


    public function delete(usuario $user) {
        $query = "UPDATE usuario SET estado = 'Inactivo' WHERE id = :id";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindValue(':id', $user->getId(), PDO::PARAM_INT);
        return $stmt->execute();
    }

    
}
?>
