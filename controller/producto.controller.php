<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/producto.php';

class ProductoController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new producto();
    }

    //Llamado plantilla principal
    public function Index(){

        $prod = new producto();

        //Se obtienen los datos del marcadetalle a editar.
        if(isset($_REQUEST['CodPrf'])){
            $prod = $this->model->ObtMrcDetProd($_REQUEST['CodPrf']);
        }

        require_once 'view/especialistacomercial/header.php';
        require_once 'view/especialistacomercial/layout/menu_pro.php';
        require_once 'view/especialistacomercial/producto/producto.php';
        require_once 'view/footer.php';
    }

    public function IndexDet(){

        $prod = new producto();

        //Se obtienen los datos del marcadetalle a editar.
        if(isset($_REQUEST['CodDetMrc'])){
            $prod = $this->model->ObtMrcProd($_REQUEST['CodDetMrc']);
        }

        require_once 'view/especialistacomercial/header.php';
        require_once 'view/especialistacomercial/layout/menu_pro.php';
        require_once 'view/especialistacomercial/producto/detalleprod.php';
        require_once 'view/footer.php';
    }

}
