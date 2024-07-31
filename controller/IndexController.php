<?php
class IndexController {  

    public function index(){
        if(!empty($_GET['p'])){
            $page =  $_GET['p'];
            require_once HEADER;
            require_once 'view/estaticas/'.$page.'.php';
            require_once FOOTER;
        }else{
          require_once 'view/home.php';
        }
    }
 
    
}
?>

