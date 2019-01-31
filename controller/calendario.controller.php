<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/agenda.php';

class CalendarioController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new agenda();
    }


    //Llamando a la vista-Tabla-Agenda
    public function Index(){
        //Llamado de las vistas.
        require_once 'view/especialistacomercial/header.php';
        require_once 'view/especialistacomercial/layout/menu_cal.php';
        require_once 'view/especialistacomercial/calendario/calendario.php';
        require_once 'view/especialistacomercial/calendario/footer-calendar.php';
    }

     //Método que modifica el modelo de una agenda de agenda.
    public function UpdCalFec(){
        $agn = new agenda();

        $agn->CodAgn = $_REQUEST['CodAgn'];
        $agn->FIniAgn = $_REQUEST['FIniAgn'];
        $agn->FFinAgn = $_REQUEST['FFinAgn'];        
        $this->model->UpdCalFec($agn);

       header('Location: calendario');
    }

    public function UpdCalSiz(){
        $agn = new agenda();

        $agn->CodAgn = $_REQUEST['CodAgn'];
        $agn->FFinAgn = $_REQUEST['FFinAgn'];        
        $this->model->UpdCalSiz($agn);

       header('Location: calendario');
    }

}