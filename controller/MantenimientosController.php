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
            header('Location: index.php');
        } else {
            include 'views/mantenimiento/create.php';
        }
    }
    

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mantenimiento = $this->model->selectOne($id);
            $mantenimiento->setIdPropiedad($_POST['id_propiedad']);
            $mantenimiento->setFechaInicio($_POST['fecha_inicio']);
            $mantenimiento->setFechaFin($_POST['fecha_fin']);
            $mantenimiento->setDescripcion($_POST['descripcion']);
            $mantenimiento->setNombreMantenimiento($_POST['nombre_mantenimiento']);
            $mantenimiento->setEncargado($_POST['encargado']);
            $mantenimiento->setEstado($_POST['estado']);
            $mantenimiento->setCosto($_POST['costo']); // Nuevo campo costo
            $this->model->update($mantenimiento);
            header('Location: index.php');
        } else {
            $mantenimiento = $this->model->selectOne($id);
            include 'views/mantenimiento/edit.php';
        }
    }
    

    public function delete($id) {
        $this->model->delete($id);
        header('Location: index.php');
    }
}
?>