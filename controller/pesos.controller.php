<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/pesos.php';

class PesosController{

	private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new pesos();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/administrador/header.php';
        require_once 'view/administrador/calificaciones/pesos/pesos.php';
        require_once 'view/footer.php';
    }

    //Método que registrar al modelo un nuevo pesos.
    public function RegPesCal(){
        $pes = new pesos();

        //Captura de los datos del formulario (vista).
        $pes->TxtPs1PesCal = $_REQUEST['TxtPs1PesCal'];
        $pes->TxtPs2PesCal = $_REQUEST['TxtPs2PesCal'];
        $pes->TxtPs3PesCal = $_REQUEST['TxtPs3PesCal'];
        $pes->TxtPs4PesCal = $_REQUEST['TxtPs4PesCal'];
        $pes->TxtPs5PesCal = $_REQUEST['TxtPs5PesCal'];
        $pes->TxtPs6PesCal = $_REQUEST['TxtPs6PesCal'];
        $pes->TxtPs7PesCal = $_REQUEST['TxtPs7PesCal'];
        $pes->TxtPs8PesCal = $_REQUEST['TxtPs8PesCal'];
        $pes->TxtPs9PesCal = $_REQUEST['TxtPs9PesCal'];
        $pes->TxtPs10PesCal = $_REQUEST['TxtPs10PesCal'];
        $pes->TxtPs11PesCal = $_REQUEST['TxtPs11PesCal'];
        $pes->TxtPs12PesCal = $_REQUEST['TxtPs12PesCal'];
        $pes->TxtCodPrf = $_REQUEST['TxtCodPrf'];

        //Registro al modelo calificaciones.
        $this->model->RegPesCal($pes);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: pesos');
    }

    //Método que modifica el modelo de un peso
    public function UpdPesCal(){
        $pes = new pesos();

        $pes->TxtCodPesCal = $_REQUEST['TxtCodPesCal'];
        $pes->TxtPs1PesCal = $_REQUEST['TxtPs1PesCal'];
        $pes->TxtPs2PesCal = $_REQUEST['TxtPs2PesCal'];
        $pes->TxtPs3PesCal = $_REQUEST['TxtPs3PesCal'];
        $pes->TxtPs4PesCal = $_REQUEST['TxtPs4PesCal'];
        $pes->TxtPs5PesCal = $_REQUEST['TxtPs5PesCal'];
        $pes->TxtPs6PesCal = $_REQUEST['TxtPs6PesCal'];
        $pes->TxtPs7PesCal = $_REQUEST['TxtPs7PesCal'];
        $pes->TxtPs8PesCal = $_REQUEST['TxtPs8PesCal'];
        $pes->TxtPs9PesCal = $_REQUEST['TxtPs9PesCal'];
        $pes->TxtPs10PesCal = $_REQUEST['TxtPs10PesCal'];
        $pes->TxtPs11PesCal = $_REQUEST['TxtPs11PesCal'];
        $pes->TxtPs12PesCal = $_REQUEST['TxtPs12PesCal'];
        $pes->TxtIndicador = $_REQUEST['TxtIndicador'];

        $this->model->UpdPesCal($pes);

        header('Location: pesos');
    }

    //Método que elimina la tupla contacto con el CodPesCal dado.
    public function DltPesCal(){
        $this->model->DltPesCal($_REQUEST['CodPesCal']);
        header('Location: pesos');
    }
}