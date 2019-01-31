<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/indicadores.php';

class ReportesformController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new indicadores();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/formulador/header.php';
        require_once 'view/formulador/reportes/reportes.php';
        require_once 'view/footer.php';
    }
}