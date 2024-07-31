<?php
class Conexion {
    public static function conectar() {
        $host = '127.0.0.1';
        $db = 'daw';
        $user = 'root';
        $password = '';
        try {
            $conexion = new PDO("mysql:host=$host;dbname=$db", $user, $password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
?>
