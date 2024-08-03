<?php
 //Autor :NARCISA CARRILLO SANCHEZ 
require_once 'model/dao/UsuariosDAO.php';
require_once 'model/dao/PedidosDAO.php';
require_once 'model/dto/Pedido.php';
require_once 'model/dto/Usuario.php';

class UsuariosController {
    private $model;
    
    public function __construct() {
        $this->model = new UsuariosDAO();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = isset($_POST['user']) ? htmlentities($_POST['user']) : '';
            $contra = isset($_POST['contra']) ? htmlentities($_POST['contra']) : '';

            $result = $this->model->authenticate($user, $contra);

            

            if ($result) {
                session_start();
                $_SESSION['user'] = $result['username'];
                $_SESSION['rol'] = $result['rol'];
                $_SESSION['user_id'] = $result['id'];
                $_SESSION['image'] = base64_encode($result['imagen']);
                $_SESSION['mensaje'] = 'Bienvenid@ ' . $result['nombre'];
                header('Location: index.php');
                exit();
            } else {
                $error = 'Usuario o contraseña incorrectos.';
                require_once LOGIN . 'login.php';
            }
        } else {
            require_once LOGIN . 'login.php';
        }
    }

    public function index() {
        if (!isset($_SESSION)) {
            session_start();
        }

        $rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : null;

        if ($rol == 1 || $rol == 2 ){
          $resultados = $this->model->selectAll();
        } else {
            header('Location:index.php');
        }

        $titulo = "Lista de usuarios";
        require_once VUSER . 'list.php';
    }

    public function view_new() {
        $titulo = "Nuevo Usuario";
        require_once VUSER . 'new.php';
    }

    public function view_profile() {
        if (!isset($_SESSION)) {
            session_start();
        }

        $id = isset($_GET['id']) ? $_GET['id'] : $_SESSION['user_id'];
        $user = $this->model->selectOne($id);
        if ($user === false) {
            $_SESSION['mensaje'] = "Usuario no encontrado";
            header('Location:index.php');
            exit();
        }
        $PedidosDAO = new PedidosDAO();
        $pedidos = $PedidosDAO->selectByUsuario($id);

        $titulo = "Perfil de Usuario";
        require_once VUSER . 'perfil.php';
    }

    public function new() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new Usuario();
            $user->setNombre(htmlentities($_POST['nombre']));
            $user->setContrasena(htmlentities($_POST['contrasena']));
            $user->setUsername(htmlentities($_POST['username']));
            $user->setImagen(file_get_contents($_FILES['imagen']['tmp_name']));
            $user->setCorreo(htmlentities($_POST['correo']));
            $user->setDireccion(htmlentities($_POST['direccion']));
            $rol = isset($_POST['rol']) ? htmlentities($_POST['rol']) : 3;
            $user->setRol($rol);
            $user->setEstado('Activo');

            $exito = $this->model->insert($user);

            $msj = 'Usuario guardado exitosamente';
            if (!$exito) {
                $msj = "No se pudo realizar el guardado";
            }
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['mensaje'] = $msj;

            header('Location:index.php?c=Usuarios&f=index');
        }
    }

    public function delete() {
        $user = new Usuario();
        $user->setId(htmlentities($_REQUEST['id']));

        $exito = $this->model->delete($user);
        $msj = 'Usuario eliminado exitosamente';
        if (!$exito) {
            $msj = "No se pudo eliminar al usuario";
        }
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['mensaje'] = $msj;

        header('Location:index.php?c=Usuarios&f=index');
    }

    public function view_edit() {
        $id = $_GET['id'];
        $user = $this->model->selectOne($id);
        if ($user === false) {
            $_SESSION['mensaje'] = "Usuario no encontrado";
            header('Location:index.php?c=Usuarios&f=index');
            exit();
        }
        $titulo = "Editar Usuario";
        require_once VUSER . 'edit.php';
    }
    

    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new Usuario();
            $user->setId(htmlentities($_POST['id']));
            $user->setNombre(htmlentities($_POST['nombre']));
            $user->setContrasena(htmlentities($_POST['contrasena']));
            $user->setUsername(htmlentities($_POST['username']));
            $user->setImagen(file_get_contents($_FILES['imagen']['tmp_name']));
            $user->setCorreo(htmlentities($_POST['correo']));
            $user->setDireccion(htmlentities($_POST['direccion']));
            $user->setRol(htmlentities($_POST['rol']));
            $user->setEstado(htmlentities($_POST['estado']));

            $exito = $this->model->update($user);
            $msj = 'Usuario actualizado exitosamente';
            if (!$exito) {
                $msj = "No se pudo actualizar el usuario";
            }
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['mensaje'] = $msj;

            header('Location:index.php?c=Usuarios&f=index');
        }
    }
}
?>
