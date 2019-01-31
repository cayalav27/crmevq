<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/marketingcc.php';

class MarketingccController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new marketingcc();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/especialistacomercial/header.php';
        require_once 'view/especialistacomercial/layout/menu_mkt.php';
        require_once 'view/especialistacomercial/marketing/marketing.php';
        require_once 'view/footer.php';
    }

    //Llamando a la vista-Tabla-detallevnts
    public function DetalleMkt(){
        $dtmkt = new marketingcc();

        if(isset($_REQUEST['CodMrk'])){
            $dtmkt = $this->model->ObtMkt($_REQUEST['CodMrk']);
        }

        //Llamado de las vistas.
        require_once 'view/especialistacomercial/header.php';
        require_once 'view/especialistacomercial/layout/menu_mkt.php';
        require_once 'view/especialistacomercial/marketing/detallemkt/detallemkt.php';
        require_once 'view/footer.php';
    }


    //Método que registrar al modelo un nuevo detallemkt.
    public function RegDetAte(){
        $dtmkt = new marketingcc();

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

        //Registro al modelo marketingcc.
        $this->model->RegDetAte($dtmkt);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: '.urlencode('marketingcc&a=DetalleMkt&CodMrk=').$_REQUEST['TxtCodMrk']);
    }

    //Método que modifica el modelo de un marketingcc de marketingcc.
    public function UpdDetVnt(){
        $dtmkt = new marketingcc();

        $FupDetAte = date("Y-m-d H:i:s");

        $dtmkt->TxtFecDetAte = $_REQUEST['TxtFecDetAte'];
        $dtmkt->TxtReiDetAte = $_REQUEST['TxtReiDetAte'];
        $dtmkt->TxtRptDetAte = $_REQUEST['TxtRptDetAte'];
        $dtmkt->TxtComDetAte = $_REQUEST['TxtComDetAte'];
        $dtmkt->TxtCodMrk = $_REQUEST['TxtCodMrk'];
        $dtmkt->TxtCodEmp = $_REQUEST['TxtCodEmp'];
        $dtmkt->FupDetAte = $FupDetAte;
        
        $this->model->UpdDetVnt($dtmkt);

        header('Location: '.urlencode('marketingcc&a=DetalleMkt&CodMrk=').$_REQUEST['TxtCodMrk']);
    }
    
}
