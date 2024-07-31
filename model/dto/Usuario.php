<?php
class Usuario {
    private $id;
    private $nombre;
    private $contrasena;
    private $username;
    private $imagen;
    private $correo;
    private $direccion;
    private $rol;
    private $estado;

    // Getters y setters
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    
    public function getNombre() { return $this->nombre; }
    public function setNombre($nombre) { $this->nombre = $nombre; }

    
    public function getContrasena() { return $this->contrasena; }
    public function setContrasena($contrasena) { $this->contrasena =$contrasena; }

    public function getUsername() { return $this->username; }
    public function setUsername($username) { $this->username = $username; }
    
    public function getImagen() { return $this->imagen; }
    public function setImagen($imagen) { $this->imagen = $imagen; }

    public function getCorreo() { return $this->correo; }
    public function setCorreo($correo) { $this->correo = $correo; }

    public function getDireccion() { return $this->direccion; }
    public function setDireccion($direccion) { $this->direccion = $direccion; }

    public function getRol() { return $this->rol; }
    public function setRol($rol) { $this->rol = $rol; }

    public function getEstado() { return $this->estado; }
    public function setEstado($estado) { $this->estado = $estado; }

}
?>
