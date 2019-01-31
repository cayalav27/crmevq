<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/indicadores.php';

class DashboardController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new indicadores();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/administrador/header.php';
        require_once 'view/administrador/dashboard/dashboard.php';
        require_once 'view/footer.php';
    }
}