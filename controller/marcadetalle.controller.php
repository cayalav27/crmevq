<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/marcadetalle.php';

class MarcaDetalleController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new marcadetalle();
    }

    //Llamado plantilla principal
    public function Index(){

        $mrcdet = new marcadetalle();

        //Se obtienen los datos del marcadetalle a editar.
        if(isset($_REQUEST['CodMrc'])){
            $mrcdet = $this->model->ObtMrc($_REQUEST['CodMrc']);
        }

        require_once 'view/administrador/header.php';
        require_once 'view/administrador/marcas/marcadetalle/marcadetalle.php';
        require_once 'view/footer.php';
    }

    //Método que registrar al modelo un nuevo producto.
    public function RegMrcDet(){
        $mrcdet = new marcadetalle();

        //Captura de los datos del formulario (vista).
        $mrcdet->TxtNomDetMrc = $_REQUEST['TxtNomDetMrc'];
        $mrcdet->TxtCodMrc = $_REQUEST['TxtCodMrc'];
        $mrcdet->TxtCodPrf = $_REQUEST['TxtCodPrf'];

        //Registro al modelo detalle-linea-producto.
        $this->model->RegMrcDet($mrcdet);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: '.urlencode('marcadetalle&a=Index&CodMrc=').$_REQUEST['TxtCodMrc']);
    }

    //Método que modifica el modelo de un detalle-linea-producto.
    public function UpdMrcDet(){
        $mrcdet = new marcadetalle();

        $mrcdet->TxtCodDetMrc = $_REQUEST['TxtCodDetMrc'];
        $mrcdet->TxtNomDetMrc = $_REQUEST['TxtNomDetMrc'];
        $mrcdet->TxtCodPrf = $_REQUEST['TxtCodPrf'];
        $mrcdet->TxtIndicador = $_REQUEST['TxtIndicador'];

        $this->model->UpdMrcDet($mrcdet);

        header('Location: '.urlencode('marcadetalle&a=Index&CodMrc=').$_REQUEST['TxtCodMrc']);
    }

    //Método que elimina la tupla detalle-linea-producto con el CodDetMrc dado.
    public function DltMrcDet(){
        $this->model->DltMrcDet($_REQUEST['CodDetMrc']);
        header('Location: proveedor');
    }
}
