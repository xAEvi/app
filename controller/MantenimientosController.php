<?php
require_once 'model/dao/MantenimientosDAO.php';
require_once 'model/dto/Mantenimiento.php';
require_once 'model/dao/PropiedadesDAO.php';
require_once 'model/dto/Propiedad.php';
class MantenimientosController {
    private $model;

    public function __construct() {
        $this->model = new MantenimientoDAO();
    }

    public function index() {
        if (!isset($_SESSION)) {
            session_start();
        }

        $rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : null;

        if ($rol == 1){
          $resultados = $this->model->selectAll();

          $titulo = "Lista de mantenimientos";
        require_once VMANTE . 'list.php';
    } else{ require_once LOGIN . 'login.php';

    }
    }


    public function view_new() {
        
        $titulo = "Nuevo mantenimiento";
        $propiedadesDAO = new PropiedadesDAO();
        $propiedades = $propiedadesDAO->selectAll();
        require_once VMANTE . 'new.php';
    }

    public function view_edit() {
        if (!isset($_SESSION)) {
            session_start();
        }

        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $mantenimiento = $this->model->selectOne($id);

        if ($mantenimiento) {
            $propiedadesDAO = new PropiedadesDAO();
            $propiedades = $propiedadesDAO->selectAll();
            $titulo = "Editar mantenimiento";
            require_once VMANTE . 'edit.php';
        } else {
            echo "Mantenimiento no encontrado.";
        }
    }


    
    public function view() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if ($rol == 1){
        $mantenimiento = $this->model->selectOne($id);
  
        
  
        $titulo = "Detalles de mantenimiento";
        require_once VMANTE . 'view.php';
    } 
}
  

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mantenimiento = new Mantenimiento();
            $mantenimiento->setIdPropiedad($_POST['id_propiedad']);
            $mantenimiento->setFechaInicio($_POST['fecha_inicio']);
            $mantenimiento->setFechaFin($_POST['fecha_fin']);
            $mantenimiento->setDescripcion($_POST['descripcion']);
            $mantenimiento->setNombreMantenimiento($_POST['nombre_mantenimiento']);
            $mantenimiento->setEncargado($_POST['encargado']);
            $mantenimiento->setEstado($_POST['estado']);
            $mantenimiento->setCosto($_POST['costo']); 
            $this->model->insert($mantenimiento);
            header('Location:index.php?c=mantenimientos&f=index');
        } else {
            include 'views/mantenimiento/create.php';
        }
    }
    

    public function edit() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mantenimiento = $this->model->selectOne($id);
    
            if ($mantenimiento) {
                $mantenimiento['id_propiedad'] = $_POST['id_propiedad'];
                $mantenimiento['fecha_inicio'] = $_POST['fecha_inicio'];
                $mantenimiento['fecha_fin'] = $_POST['fecha_fin'];
                $mantenimiento['descripcion'] = $_POST['descripcion'];
                $mantenimiento['nombre_mantenimiento'] = $_POST['nombre_mantenimiento'];
                $mantenimiento['encargado'] = $_POST['encargado'];
                $mantenimiento['estado'] = $_POST['estado'];
                $mantenimiento['costo'] = $_POST['costo'];
                $this->model->update($mantenimiento);
                header('Location:index.php?c=mantenimientos&f=index');
            } else {
                // Manejar el caso en el que no se encuentra el mantenimiento
                echo "No se encontró el mantenimiento con ID $id";
            }
        } else {
            $mantenimiento = $this->model->selectOne($id);
            $propiedadesDAO = new PropiedadesDAO();
            $propiedades = $propiedadesDAO->selectAll();
            $titulo = "Editar mantenimiento";
            require_once VMANTE . 'edit.php';
        }
    }
    

    public function delete() {
        $man = new Mantenimiento();
        $man->setId(htmlentities($_REQUEST['id']));
        $exito = $this->model->delete($man);
        $msj = 'Mantenimiento eliminado exitosamente';
        if (!$exito) {
            $msj = "No se pudo eliminar el mantenimiento";
        }
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['mensaje'] = $msj;
        header('Location:index.php?c=Mantenimientos&f=index');
    }

  
}
?>