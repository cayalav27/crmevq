<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/mapa.php';

class MapaController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new mapa();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/especialistacomercial/header.php';
        require_once 'view/especialistacomercial/layout/menu_map.php';
        require_once 'view/especialistacomercial/mapa/mapa.php';
        require_once 'view/footer.php';
        
    }
}