<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/proveedor.php';

class ProveedorController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new proveedor();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/administrador/header.php';
        require_once 'view/administrador/proveedor/proveedor.php';
        require_once 'view/footer.php';
    }

    //Método que registrar al modelo un nuevo proveedor.
    public function RegProv(){
        $prv = new proveedor();

        //Captura de los datos del formulario (vista).
        $prv->TxtRucProv = $_REQUEST['TxtRucProv'];
        $prv->TxtNomProv = $_REQUEST['TxtNomProv'];
        $prv->TxtDirProv = $_REQUEST['TxtDirProv'];
        $prv->TxtTlfProv = $_REQUEST['TxtTlfProv'];
        $prv->TxtEmlProv = $_REQUEST['TxtEmlProv'];
        $prv->TxtWebProv = $_REQUEST['TxtWebProv'];
        $prv->TxtCodCiu = $_REQUEST['TxtCodCiu'];

        //Registro al modelo proveedor.
        $this->model->RegProv($prv);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: proveedor');
    }

    //Método que modifica el modelo de un proveedor.
    public function UpdProv(){
        $prv = new proveedor();
        
        $prv->TxtCodProv = $_REQUEST['TxtCodProv'];
        $prv->TxtNomProv = $_REQUEST['TxtNomProv'];
        $prv->TxtDirProv = $_REQUEST['TxtDirProv'];
        $prv->TxtTlfProv = $_REQUEST['TxtTlfProv'];
        $prv->TxtEmlProv = $_REQUEST['TxtEmlProv'];
        $prv->TxtWebProv = $_REQUEST['TxtWebProv'];
        $prv->TxtCodCiu = $_REQUEST['TxtCodCiu'];

        $this->model->UpdProv($prv);

        header('Location: '.urlencode('marca&a=Index&CodProv=').$_REQUEST['TxtCodProv']);
    }

    //Método que elimina la tupla proveedor con el TxtCodProv dado.
    public function DltProv(){
        $this->model->DltProv($_REQUEST['CodProv']);
        header('Location: proveedor');
    }
}
