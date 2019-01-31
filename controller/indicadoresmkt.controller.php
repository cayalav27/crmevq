<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/indicadores.php';

class IndicadoresMktController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new indicadores();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/gestormarketing/header.php';
        require_once 'view/gestormarketing/layout/menu_ind.php';
        require_once 'view/gestormarketing/indicadores/indicadores.php';
        require_once 'view/footer.php';
    }
}