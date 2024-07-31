    <?php
        require_once 'config/config.php';
        // leer parametros
        $controlador = (!empty($_REQUEST['c']))?htmlentities($_REQUEST['c']):'Index';
       
        // index
        $controlador = ucwords(strtolower($controlador))."Controller";
        //IndexController
        $funcion = (!empty($_REQUEST['f']))?htmlentities($_REQUEST['f']):'Index';
        //f= index
        
        require_once 'controller/' . $controlador . '.php';
     
        $cont = new  $controlador();// creacion del objeto controlador 
        $cont->$funcion();// llamada a la funcion del controlador

