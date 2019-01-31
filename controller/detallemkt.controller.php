<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/detallemkt.php';

class DetallemktController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new detallemkt();
    }

    //Llamando a la vista-Tabla-detallemkts
    public function Index(){
        $dtmkt = new detallemkt();

        //Se obtienen los datos del detallemkt a editar.
        if(isset($_REQUEST['CodMrk'])){
            $dtmkt = $this->model->ObtMkt($_REQUEST['CodMrk']);
        }

        //Llamado de las vistas.
        require_once 'view/gestormarketing/header.php';
        require_once 'view/gestormarketing/layout/menu_mkt.php';
        require_once 'view/gestormarketing/Marketing/detallemkt/detallemkt.php';
        require_once 'view/footer.php';
    }
    
    //Método que registrar al modelo un nuevo detallemkt.
    public function RegDetAte(){
        $dtmkt = new detallemkt();

        //Captura de los datos del formulario (vista).
        $FcrDetAte = date("Y-m-d H:i:s");
        $FupDetAte = date("Y-m-d H:i:s");

        //Captura de los datos del formulario (vista).
        $dtmkt->TxtFecDetAte = $_REQUEST['TxtFecDetAte'];
        $dtmkt->TxtFcrDetAte = $FcrDetAte;
        $dtmkt->TxtFupDetAte = $FupDetAte;
        $dtmkt->TxtRptDetAte = $_REQUEST['TxtRptDetAte'];
        $dtmkt->TxtReiDetAte = $_REQUEST['TxtReiDetAte'];
        $dtmkt->TxtComDetAte = $_REQUEST['TxtComDetAte'];
        $dtmkt->TxtCodMrk = $_REQUEST['TxtCodMrk'];
        $dtmkt->TxtCodEmp = $_REQUEST['TxtCodEmp'];

        //Registro al modelo detallemkt.
        $this->model->RegDetAte($dtmkt);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: '.urlencode('detallemkt&a=Index&CodMrk=').$_REQUEST['TxtCodMrk']);
    }

    //Método que modifica el modelo de un detallemkt de detallemkt.
    public function UpdDetVnt(){
        $dtmkt = new detallemkt();

        $FupDetAte = date("Y-m-d H:i:s");

        $dtmkt->TxtFecDetAte = $_REQUEST['TxtFecDetAte'];
        $dtmkt->TxtReiDetAte = $_REQUEST['TxtReiDetAte'];
        $dtmkt->TxtRptDetAte = $_REQUEST['TxtRptDetAte'];
        $dtmkt->TxtComDetAte = $_REQUEST['TxtComDetAte'];
        $dtmkt->TxtCodMrk = $_REQUEST['TxtCodMrk'];
        $dtmkt->TxtCodEmp = $_REQUEST['TxtCodEmp'];
        $dtmkt->FupDetAte = $FupDetAte;
        
        $this->model->UpdDetVnt($dtmkt);

        header('Location: '.urlencode('detallemkt&a=detallemkt&CodDetMkt=').$_REQUEST['TxtCodDetAte'].urlencode('&CodMrk=').$_REQUEST['TxtCodMrk']);
    }
    
    //Método que elimina la tupla detallemkt con el CodDetMkt dado.
    public function DltDetVnt(){
        $this->model->DltDetVnt($_REQUEST['CodDetMkt']);
    }

}