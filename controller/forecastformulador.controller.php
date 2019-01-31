<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/forecast.php';

class ForecastFormuladorController{

    private $model;
    
    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new forecast();
    }
    
    //Llamado plantilla principal
    public function Index(){
        require_once 'view/formulador/header.php';
        require_once 'view/formulador/negocio/forecast/forecast.php';
        require_once 'view/footer.php';
    }
    
}
