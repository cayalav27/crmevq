<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/preguntas.php';

class PreguntasController{

	private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new preguntas();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/administrador/header.php';
        require_once 'view/administrador/calificaciones/preguntas/preguntas.php';
        require_once 'view/footer.php';
    }

    //Método que registrar al modelo un nuevo calificaciones.
    public function RegPrgCal(){
        $preg = new preguntas();

        //Captura de los datos del formulario (vista).
        $preg->TxtPg1PrgCal = $_REQUEST['TxtPg1PrgCal'];
        $preg->TxtPg2PrgCal = $_REQUEST['TxtPg2PrgCal'];
        $preg->TxtPg3PrgCal = $_REQUEST['TxtPg3PrgCal'];
        $preg->TxtPg4PrgCal = $_REQUEST['TxtPg4PrgCal'];
        $preg->TxtPg5PrgCal = $_REQUEST['TxtPg5PrgCal'];
        $preg->TxtPg6PrgCal = $_REQUEST['TxtPg6PrgCal'];
        $preg->TxtPg7PrgCal = $_REQUEST['TxtPg7PrgCal'];
        $preg->TxtPg8PrgCal = $_REQUEST['TxtPg8PrgCal'];
        $preg->TxtPg9PrgCal = $_REQUEST['TxtPg9PrgCal'];
        $preg->TxtPg10PrgCal = $_REQUEST['TxtPg10PrgCal'];
        $preg->TxtPg11PrgCal = $_REQUEST['TxtPg11PrgCal'];
        $preg->TxtPg12PrgCal = $_REQUEST['TxtPg12PrgCal'];
        $preg->TxtCodPrf = $_REQUEST['TxtCodPrf'];

        //Registro al modelo calificaciones.
        $this->model->RegPrgCal($preg);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: preguntas');
    }

    //Método que modifica el modelo de un preguntas.
    public function UpdPrgCal(){
        $preg = new preguntas();

        $preg->TxtCodPrgCal = $_REQUEST['TxtCodPrgCal'];
        $preg->TxtPg1PrgCal = $_REQUEST['TxtPg1PrgCal'];
        $preg->TxtPg2PrgCal = $_REQUEST['TxtPg2PrgCal'];
        $preg->TxtPg3PrgCal = $_REQUEST['TxtPg3PrgCal'];
        $preg->TxtPg4PrgCal = $_REQUEST['TxtPg4PrgCal'];
        $preg->TxtPg5PrgCal = $_REQUEST['TxtPg5PrgCal'];
        $preg->TxtPg6PrgCal = $_REQUEST['TxtPg6PrgCal'];
        $preg->TxtPg7PrgCal = $_REQUEST['TxtPg7PrgCal'];
        $preg->TxtPg8PrgCal = $_REQUEST['TxtPg8PrgCal'];
        $preg->TxtPg9PrgCal = $_REQUEST['TxtPg9PrgCal'];
        $preg->TxtPg10PrgCal = $_REQUEST['TxtPg10PrgCal'];
        $preg->TxtPg11PrgCal = $_REQUEST['TxtPg11PrgCal'];
        $preg->TxtPg12PrgCal = $_REQUEST['TxtPg12PrgCal'];
        $preg->TxtIndicador = $_REQUEST['TxtIndicador'];

        $this->model->UpdPrgCal($preg);

        header('Location: preguntas');
    }

    //Método que elimina la tupla contacto con el CodPrgCal dado.
    public function DltPrgCal(){
        $this->model->DltPrgCal($_REQUEST['CodPrgCal']);
        header('Location: preguntas');
    }
}