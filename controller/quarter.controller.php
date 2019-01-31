<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/quarter.php';

class QuarterController{

	private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new quarter();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/administrador/header.php';
        require_once 'view/administrador/quarter/quarter.php';
        require_once 'view/footer.php';
    }

    //Método que registrar al modelo un nuevo quarter.
    public function RegQua(){
        $quat = new quarter();

        //Captura de los datos del formulario (vista).
        $quat->TxtQ1IQua = $_REQUEST['TxtQ1IQua'];
        $quat->TxtQ1FQua = $_REQUEST['TxtQ1FQua'];
        $quat->TxtQ2IQua = $_REQUEST['TxtQ2IQua'];
        $quat->TxtQ2FQua = $_REQUEST['TxtQ2FQua'];
        $quat->TxtQ3IQua = $_REQUEST['TxtQ3IQua'];
        $quat->TxtQ3FQua = $_REQUEST['TxtQ3FQua'];
        $quat->TxtQ4IQua = $_REQUEST['TxtQ4IQua'];
        $quat->TxtQ4FQua = $_REQUEST['TxtQ4FQua'];

        //Registro al modelo quarter.
        $this->model->RegQua($quat);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: quarter');
    }

    //Método que modifica el modelo de un quarter
    public function UpdQua(){
        $quat = new quarter();

        $quat->TxtCodQua = $_REQUEST['TxtCodQua'];
        $quat->TxtQ1IQua = $_REQUEST['TxtQ1IQua'];
        $quat->TxtQ1FQua = $_REQUEST['TxtQ1FQua'];
        $quat->TxtQ2IQua = $_REQUEST['TxtQ2IQua'];
        $quat->TxtQ2FQua = $_REQUEST['TxtQ2FQua'];
        $quat->TxtQ3IQua = $_REQUEST['TxtQ3IQua'];
        $quat->TxtQ3FQua = $_REQUEST['TxtQ3FQua'];
        $quat->TxtQ4IQua = $_REQUEST['TxtQ4IQua'];
        $quat->TxtQ4FQua = $_REQUEST['TxtQ4FQua'];
        $quat->TxtIndicador = $_REQUEST['TxtIndicador'];

        $this->model->UpdQua($quat);

        header('Location: quarter');

    }

    //Método que elimina la tupla contacto con el CodQua dado.
    public function DltQua(){
        $this->model->DltQua($_REQUEST['CodQua']);
        header('Location: quarter');
    }
}