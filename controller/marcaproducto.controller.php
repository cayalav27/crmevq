<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/marcaproducto.php';

class MarcaProductoController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new marcaproducto();
    }

    //Llamado plantilla principal
    public function Index(){

        $mrcprod = new marcaproducto();

        //Se obtienen los datos del marcaproducto a editar.
        if(isset($_REQUEST['CodDetMrc'])){
            $mrcprod = $this->model->ObtMrcDet($_REQUEST['CodDetMrc']);
        }

        require_once 'view/administrador/header.php';
        require_once 'view/administrador/marcas/marcaproducto/marcaproducto.php';
        require_once 'view/footer.php';
    }

    //Método que registrar al modelo un nuevo marcaproducto.
    public function RegMrcProd(){
        $mrcprod = new marcaproducto();

        //Captura de los datos del formulario (vista).
        $mrcprod->TxtFabProd = $_REQUEST['TxtFabProd'];
        $mrcprod->TxtNomProd = $_REQUEST['TxtNomProd'];
        $mrcprod->TxtPrcProd = $_REQUEST['TxtPrcProd'];
        $mrcprod->TxtCodDetMrc = $_REQUEST['TxtCodDetMrc'];

        //Registro al modelo producto.
        $this->model->RegMrcProd($mrcprod);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: '.urlencode('marcaproducto&a=Index&CodDetMrc=').$_REQUEST['TxtCodDetMrc']);
    }

    //Método que modifica el modelo de un producto.
    public function UpdMrcProd(){
        $mrcprod = new marcaproducto();

        $mrcprod->TxtCodProd = $_REQUEST['TxtCodProd'];
        $mrcprod->TxtFabProd = $_REQUEST['TxtFabProd'];
        $mrcprod->TxtNomProd = $_REQUEST['TxtNomProd'];
        $mrcprod->TxtPrcProd = $_REQUEST['TxtPrcProd'];
        $mrcprod->TxtIndicador = $_REQUEST['TxtIndicador'];

        $this->model->UpdMrcProd($mrcprod);

        header('Location: '.urlencode('marcaproducto&a=Index&CodDetMrc=').$_REQUEST['TxtCodDetMrc']);
    }

    //Método que elimina la tupla producto con el CodDetMrc dado.
    public function DltMrcProd(){
        $this->model->DltMrcProd($_REQUEST['CodProd']);
        header('Location: proveedor');
    }
}
