<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/calificaciones.php';

class CalificacionesController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new calificaciones();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/administrador/header.php';
        require_once 'view/administrador/calificaciones/calificacion/calificacion.php';
        require_once 'view/footer.php';
    }

    //Método que registrar al modelo un nuevo calificaciones.
    public function RegCal(){
        $cali = new calificaciones();

        //Captura de los datos del formulario (vista).
        $cali->TxtPs1Cal = $_REQUEST['TxtPs1Cal'];
        $cali->TxtPs2Cal = $_REQUEST['TxtPs2Cal'];
        $cali->TxtPs3Cal = $_REQUEST['TxtPs3Cal'];
        $cali->TxtPs4Cal = $_REQUEST['TxtPs4Cal'];
        $cali->TxtCodPrf = $_REQUEST['TxtCodPrf'];

        //Registro al modelo calificaciones.
        $this->model->RegCal($cali);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: calificaciones');
    }

    //Método que modifica el modelo de un calificaciones.
    public function UpdCal(){
        $cali = new calificaciones();

        $cali->TxtCodCal = $_REQUEST['TxtCodCal'];
        $cali->TxtPs1Cal = $_REQUEST['TxtPs1Cal'];
        $cali->TxtPs2Cal = $_REQUEST['TxtPs2Cal'];
        $cali->TxtPs3Cal = $_REQUEST['TxtPs3Cal'];
        $cali->TxtPs4Cal = $_REQUEST['TxtPs4Cal'];
        $cali->TxtCodPrf = $_REQUEST['TxtCodPrf'];
        $cali->TxtIndicador = $_REQUEST['TxtIndicador'];

        $this->model->UpdCal($cali);

        header('Location: calificaciones');
    }

    //Método que elimina la tupla contacto con el CodCal dado.
    public function DltCal(){
        $this->model->DltCal($_REQUEST['CodCal']);
        header('Location: calificaciones');
    }

}
