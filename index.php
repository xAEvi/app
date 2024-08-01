    <?php
        require_once 'config/config.php';
        
        $controlador = (!empty($_REQUEST['c']))?htmlentities($_REQUEST['c']):'Index';
       
        $controlador = ucwords(strtolower($controlador))."Controller";

        $funcion = (!empty($_REQUEST['f']))?htmlentities($_REQUEST['f']):'Index';
        
        require_once 'controller/' . $controlador . '.php';
     
        $cont = new  $controlador();// creacion del objeto controlador 
        $cont->$funcion();// llamada a la funcion del controlador
    ?>
