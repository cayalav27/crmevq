<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/marca.php';

class MarcaController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new marca();
    }

    //Llamado plantilla principal
    public function Index(){

        $mrc = new marca();

        //Se obtienen los datos del marcadetalle a editar.
        if(isset($_REQUEST['CodProv'])){
            $mrc = $this->model->ObtProv($_REQUEST['CodProv']);
        }

        require_once 'view/administrador/header.php';
        require_once 'view/administrador/marcas/marca/marca.php';
        require_once 'view/footer.php';
    }

    //Método que registrar al modelo un nuevo producto.
    public function RegMrc(){
        $mrc = new marca();

        //Captura de los datos del formulario (vista).
        $mrc->TxtNomMrc = $_REQUEST['TxtNomMrc'];
        $mrc->TxtCodProv = $_REQUEST['TxtCodProv'];

        //Registro al modelo mrcea-producto.
        $this->model->RegMrc($mrc);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: '.urlencode('marca&a=Index&CodProv=').$_REQUEST['TxtCodProv']);
    }

    //Método que modifica el modelo de un linea-producto.
    public function UpdMrc(){
        $mrc = new marca();

        $mrc->TxtCodMrc = $_REQUEST['TxtCodMrc'];
        $mrc->TxtNomMrc = $_REQUEST['TxtNomMrc'];
        $mrc->TxtIndicador = $_REQUEST['TxtIndicador'];

        $this->model->UpdMrc($mrc);

        header('Location: '.urlencode('marca&a=Index&CodProv=').$_REQUEST['TxtCodProv']);
    }

    //Método que elimina la tupla linea-producto con el CodMrc dado.
    public function DltMrc(){
        $this->model->DltMrc($_REQUEST['CodMrc']);
        header('Location: proveedor');
    }
}
