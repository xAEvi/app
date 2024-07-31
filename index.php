<?php
require_once 'controller/PropiedadesController.php';
require_once 'config/config.php';

$c = 'Propiedades';
$f = 'index';

if (isset($_REQUEST['c'])) {
    $c = $_REQUEST['c'];
}

if (isset($_REQUEST['f'])) {
    $f = $_REQUEST['f'];
}

$controlador = $c . 'Controller';
$controlador = new $controlador();
$controlador->$f();
?>
