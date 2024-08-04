<?php

// Autor: Xavier Molina Cisneros

require_once 'model/dao/PropiedadesDAO.php';
require_once 'model/dao/ComentarioDAO.php';
require_once 'model/dto/Comentario.php';
require_once 'model/dto/Propiedad.php';

class PropiedadesController {
    private $model;
    
    public function __construct() {
        $this->model = new PropiedadesDAO();
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    private function checkRole() {
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 1) {
            error_log("Acceso denegado. Rol de sesión: " . (isset($_SESSION['rol']) ? $_SESSION['rol'] : 'no definido'));

            header('Location: index.php?op=cerrar&num=12');
            exit();
        }
    }

    public function index() {
        if (!isset($_SESSION)) {
            session_start();
        }

        $resultados = $this->model->selectAll();

        $titulo = "Lista de propiedades";
        require_once VPROP . 'list.php';
    }

    public function view_new() {
        $titulo = "Nueva propiedad";
        require_once VPROP . 'new.php';
    }

    public function search() {
        $parametro = isset($_POST['b']) ? htmlentities($_POST['b']) : '';
        
        $resultados = $this->model->selectAll($parametro);
        
        $titulo = "Lista de propiedades";
        require_once VPROP . 'list.php';
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
    public function view() {
      $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
      $propiedad = $this->model->selectOne($id);

      $comentarioDAO = new ComentarioDAO();
      $comentarios = $comentarioDAO->selectByPropiedad($id);


      $titulo = "Detalles de Propiedad";
      require_once VPROP . 'view.php';
  }


    public function new() {
        $this->checkRole(); 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $prop = new Propiedad();
            $prop->setTitulo(htmlentities($_POST['titulo']));
            $prop->setTipoPropiedad(htmlentities($_POST['tipo_propiedad']));
            $prop->setDescripcion(htmlentities($_POST['descripcion']));
            $prop->setImagen(file_get_contents($_FILES['imagen']['tmp_name']));
            $prop->setDireccion(htmlentities($_POST['direccion']));
            $prop->setPrecio(htmlentities($_POST['precio']));
            $prop->setNumHabitaciones(htmlentities($_POST['num_habitaciones']));
            $prop->setNumBanos(htmlentities($_POST['num_banos']));
            $prop->setSuperficie(htmlentities($_POST['superficie']));
            $prop->setEstadoAlquiler(htmlentities($_POST['estado_alquiler']));
            $prop->setEstado('Activo');

            $exito = $this->model->insert($prop);

            $msj = 'Propiedad guardada exitosamente';
            if (!$exito) {
                $msj = "No se pudo realizar el guardado";
            }
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['mensaje'] = $msj;

            header('Location:index.php?c=Propiedades&f=index');
        }
    }

    public function delete() {
        $this->checkRole(); 
        $prop = new Propiedad();
        $prop->setId(htmlentities($_REQUEST['id']));

        $exito = $this->model->delete($prop);
        $msj = 'Propiedad eliminada exitosamente';
        if (!$exito) {
            $msj = "No se pudo eliminar la propiedad";
        }
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['mensaje'] = $msj;

        header('Location:index.php?c=Propiedades&f=index');
    }

    public function view_edit() {
        $this->checkRole(); 
        $id = $_GET['id'];
        $prop = $this->model->selectOne($id);
        $titulo = "Editar propiedad";
        require_once VPROP . 'edit.php';
    }
    

    public function edit() {
        $this->checkRole(); 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $prop = new Propiedad();
            $prop->setId(htmlentities($_POST['id']));
            $prop->setTitulo(htmlentities($_POST['titulo']));
            $prop->setTipoPropiedad(htmlentities($_POST['tipo_propiedad']));
            $prop->setDescripcion(htmlentities($_POST['descripcion']));
            
            if ($_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
                $prop->setImagen(file_get_contents($_FILES['imagen']['tmp_name']));
            } else {
                $prop->setImagen(null); // Indicar que no hay una nueva imagen
            }

            $prop->setDireccion(htmlentities($_POST['direccion']));
            $prop->setPrecio(htmlentities($_POST['precio']));
            $prop->setNumHabitaciones(htmlentities($_POST['num_habitaciones']));
            $prop->setNumBanos(htmlentities($_POST['num_banos']));
            $prop->setSuperficie(htmlentities($_POST['superficie']));
            $prop->setEstadoAlquiler(htmlentities($_POST['estado_alquiler']));

            $exito = $this->model->update($prop);
            $msj = 'Propiedad actualizada exitosamente';
            if (!$exito) {
                $msj = "No se pudo actualizar la propiedad";
            }
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['mensaje'] = $msj;

            header('Location:index.php?c=Propiedades&f=index');
        }
    }

}
?>
