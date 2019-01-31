<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/factor.php';

class FactorController{

	private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new factor();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/administrador/header.php';
        require_once 'view/administrador/factor/factor.php';
        require_once 'view/footer.php';
    }

    //Método que registrar al modelo un nuevo factor.
    public function RegFac(){
        $fac = new factor();

        //Captura de los datos del formulario (vista).
        $fac->TxtNomFac = $_REQUEST['TxtNomFac'];
        $fac->TxtNumFac = $_REQUEST['TxtNumFac'];

        //Registro al modelo factor.
        $this->model->RegFac($fac);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: factor');
    }

    //Método que modifica el modelo de un factor
    public function UpdFac(){
        $fac = new factor();

        $fac->TxtCodFac = $_REQUEST['TxtCodFac'];
        $fac->TxtNomFac = $_REQUEST['TxtNomFac'];
        $fac->TxtNumFac = $_REQUEST['TxtNumFac'];
        $fac->TxtIndicador = $_REQUEST['TxtIndicador'];

        $this->model->UpdFac($fac);

        header('Location: factor');
    }

    //Método que elimina la tupla contacto con el CodFac dado.
    public function DltFac(){
        $this->model->DltFac($_REQUEST['CodFac']);
        header('Location: factor');
    }
}