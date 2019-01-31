<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/agenda.php';

class AgendaController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new agenda();
    }


    //Llamando a la vista-Tabla-Agenda
    public function Index(){
        $agn = new agenda();
        
        //Se obtienen los datos de la agenda a editar.
        if(isset($_REQUEST['CodVnt'])){
            $agn = $this->model->ObtVnt($_REQUEST['CodVnt']);
        }

        //Llamado de las vistas.
        require_once 'view/especialistacomercial/header.php';
        require_once 'view/especialistacomercial/layout/menu_vnt.php';
        require_once 'view/especialistacomercial/agenda/agenda.php';
        require_once 'view/footer.php';
    }

    public function Evento(){
        $agn = new agenda();
        
        //Se obtienen los datos de la agenda a editar.
        if(isset($_REQUEST['CodAgn'])){
            $agn = $this->model->ObtVntAgn($_REQUEST['CodAgn']);
        }

        //Llamado de las vistas.
        require_once 'view/especialistacomercial/header.php';
        require_once 'view/especialistacomercial/layout/menu_vnt.php';
        require_once 'view/especialistacomercial/agenda/evento.php';
        require_once 'view/footer.php';
    }


    //Método que registrar al modelo un nueva agenda.
    public function RegAgn(){
        $agn = new agenda();

        //Captura de los datos del formulario (vista).
        $agn->TxtFIniAgn = $_REQUEST['TxtFIniAgn'];
        $agn->TxtFFinAgn = $_REQUEST['TxtFFinAgn'];
        $agn->TxtDscTAgn = $_REQUEST['TxtDscTAgn'];
        $agn->TxtDscFAgn = $_REQUEST['TxtDscFAgn'];
        $agn->TxtCodVnt = $_REQUEST['TxtCodVnt'];
        $agn->TxtCodAvn = $_REQUEST['TxtCodAvn'];
        $agn->TxtCodStk = $_REQUEST['TxtCodStk'];

        //Registro al modelo agenda.
        $this->model->RegAgn($agn);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: '.urlencode('agenda&a=Index&CodVnt=').$_REQUEST['TxtCodVnt']);
    }

     //Método que modifica el modelo de una agenda de agenda.
    public function UpdAgn(){
        $agn = new agenda();

        $agn->TxtCodAgn = $_REQUEST['TxtCodAgn'];
        $agn->TxtFIniAgn = $_REQUEST['TxtFIniAgn'];
        $agn->TxtFFinAgn = $_REQUEST['TxtFFinAgn'];
        $agn->TxtDscTAgn = $_REQUEST['TxtDscTAgn'];
        $agn->TxtDscFAgn = $_REQUEST['TxtDscFAgn'];
        $agn->TxtCodAvn = $_REQUEST['TxtCodAvn'];
        $agn->TxtCodStk = $_REQUEST['TxtCodStk'];
        
        $this->model->UpdAgn($agn);

       header('Location: '.urlencode('agenda&a=Evento&CodAgn=').$_REQUEST['TxtCodAgn']);
    }

    //Método que elimina la tupla agenda con el CodAgn dado.
    public function DltAgn(){
        $this->model->DltAgn($_REQUEST['CodAgn']);
        header('Location: venta');
    }

}