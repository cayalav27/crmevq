<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/pipeline.php';

class PipelineController{

    private $model;
    
    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new pipeline();
    }
    
    //Llamado plantilla principal
    public function Index(){
        require_once 'view/especialistacomercial/header.php';
        require_once 'view/especialistacomercial/layout/menu_pip.php';
        require_once 'view/especialistacomercial/negocio/pipeline/pipeline.php';
        require_once 'view/footer.php';
    }
    
}
