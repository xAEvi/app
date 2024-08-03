<?php
require_once 'model/dao/PedidosDAO.php';
require_once 'model/dto/Pedido.php';
require_once 'model/dao/PropiedadesDAO.php'; // Asegúrate de tener este DAO para actualizar propiedades

class PedidosController {
    private $model;
    private $propiedadModel;

    public function __construct() {
        $this->model = new PedidosDAO();
        $this->propiedadModel = new PropiedadesDAO(); // Inicializa el DAO de propiedades
    }

    public function Index() {
        $pedidos = $this->model->listar();
        require_once 'view/pedidos/list.php';
    }

    public function New() {
        $id_propiedad = $_REQUEST['id_propiedad'];
        require_once 'view/pedidos/new.php';
    }

    public function Save() {
        $pedido = new Pedido();
        $pedido->setIdUsuario($_POST['id_usuario']);
        $pedido->setIdPropiedad($_POST['id_propiedad']);
        $pedido->setFechaPedido($_POST['fecha_pedido']);
        $pedido->setDuracionAlquiler($_POST['duracion_alquiler']);
        $pedido->setEstadoPedido('Pendiente'); // Estado inicial es Pendiente
        $pedido->setFechaInicio($_POST['fecha_inicio']);
        $pedido->setTipoPago($_POST['tipo_pago']);
        $pedido->setComentario($_POST['comentario']);
        $pedido->setEstado('Activo');

        $this->model->registrar($pedido);
        header('Location: index.php?c=Pedidos');
    }

    public function Edit() {
        $id = $_REQUEST['id'];
        $pedido = $this->model->obtener($id);
        require_once 'view/pedidos/edit.php';
    }

    public function Update() {
        $pedido = new Pedido();
        $pedido->setId($_POST['id']);
        $pedido->setIdUsuario($_POST['id_usuario']);
        $pedido->setIdPropiedad($_POST['id_propiedad']);
        $pedido->setFechaPedido($_POST['fecha_pedido']);
        $pedido->setDuracionAlquiler($_POST['duracion_alquiler']);
        $pedido->setEstadoPedido($_POST['estado_pedido']);
        $pedido->setFechaInicio($_POST['fecha_inicio']);
        $pedido->setTipoPago($_POST['tipo_pago']);
        $pedido->setComentario($_POST['comentario']);
        $pedido->setEstado($_POST['estado']);

        $this->model->actualizar($pedido);

        // Actualizar estado de la propiedad si el pedido es aceptado
        if ($pedido->getEstadoPedido() == 'Aceptado') {
            $this->propiedadModel->actualizarEstadoAlquiler($pedido->getIdPropiedad(), 'Alquilado');
        }

        header('Location: index.php?c=Pedidos');
    }

    public function Delete() {
        $id = $_REQUEST['id'];
        $this->model->eliminar($id);
        header('Location: index.php?c=Pedidos');
    }

    public function View() {
        $id = $_REQUEST['id'];
        $pedido = $this->model->obtener($id);
        require_once 'view/pedidos/view.php';
    }

    public function ChangeStatus() {
        $id = $_REQUEST['id'];
        $estado = $_REQUEST['estado'];
        $pedido = $this->model->obtener($id);
        $pedido->setEstadoPedido($estado);

        if ($estado == 'Aceptado') {
            $this->propiedadModel->actualizarEstadoAlquiler($pedido->getIdPropiedad(), 'Alquilado');
        }

        $this->model->actualizar($pedido);
        header('Location: index.php?c=Pedidos');
    }
}
?>
