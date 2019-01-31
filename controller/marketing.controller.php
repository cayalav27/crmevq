<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/marketing.php';

class MarketingController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new marketing();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/gestormarketing/header.php';
        require_once 'view/gestormarketing/layout/menu_mkt.php';
        require_once 'view/gestormarketing/marketing/marketing.php';
        require_once 'view/footer.php';
    }

    //Método que registrar al modelo un nuevo marketing.
    public function RegMkt(){
        $mkt = new marketing();

        $FinMrk = date("Y-m-d H:i:s");
        $FupMrk = date("Y-m-d H:i:s");

        //Captura de los datos del formulario (vista).
        $mkt->TxtFecMrk = $_REQUEST['TxtFecMrk'];
        $mkt->TxtAsuMrk = $_REQUEST['TxtAsuMrk'];
        $mkt->TxtFinMrk = $FinMrk;
        $mkt->TxtFupMrk = $FupMrk;
        $mkt->TxtCodCli = $_REQUEST['TxtCodCli'];
        $mkt->TxtCodEmp = $_REQUEST['TxtCodEmp'];
        $mkt->TxtCodTipInf = $_REQUEST['TxtCodTipInf'];
        $mkt->TxtCodCan = $_REQUEST['TxtCodCan'];
        $mkt->TxtCodCont = $_REQUEST['TxtCodCont'];

        //Registro al modelo marketing.
        $this->model->RegMkt($mkt);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: marketing');
    }

    //Método que modifica el modelo de un marketing.
    public function UpdMkt(){
        $mkt = new marketing();

        $FupMrk = date("Y-m-d H:i:s");

        //Captura de los datos del formulario (vista).
        $mkt->TxtCodMrk = $_REQUEST['TxtCodMrk'];
        $mkt->TxtAsuMrk = $_REQUEST['TxtAsuMrk'];
        $mkt->TxtFupMrk = $FupMrk;
        $mkt->TxtCodCli = $_REQUEST['TxtCodCli'];
        $mkt->TxtCodEmp = $_REQUEST['TxtCodEmp'];
        $mkt->TxtCodTipInf = $_REQUEST['TxtCodTipInf'];
        $mkt->TxtCodCan = $_REQUEST['TxtCodCan'];
        $mkt->TxtCodCont = $_REQUEST['TxtCodCont'];

        $this->model->UpdMkt($mkt);

        header('Location: '.urlencode('detallemkt&a=Index&CodMrk=').$_REQUEST['TxtCodMrk']);
    }

    //Método que elimina la tupla marketing con el CodMrk dado.
    public function DltMkt(){
        $this->model->DltMkt($_REQUEST['CodMrk']);
        header('Location: marketing');
    }

}
