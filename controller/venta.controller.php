<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/venta.php';

class VentaController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new venta();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/especialistacomercial/header.php';
        require_once 'view/especialistacomercial/layout/menu_vnt.php';
        require_once 'view/especialistacomercial/ventas/venta/venta.php';
        require_once 'view/footer.php';
    }

    //Método que registrar al modelo un nuevo venta.
    public function RegVnt(){
        $vnt = new venta();

        $FcrVnt = date("Y-m-d H:i:s");
        $FupVnt = date("Y-m-d H:i:s");

        //Captura de los datos del formulario (vista).
        $vnt->TxtCptVnt = $_REQUEST['TxtCptVnt'];
        $vnt->TxtFocVnt = $_REQUEST['TxtFocVnt'];
        $vnt->TxtDscVnt = $_REQUEST['TxtDscVnt'];
        $vnt->TxtAliVnt = $_REQUEST['TxtAliVnt'];
        $vnt->TxtFcrVnt = $FcrVnt;
        $vnt->TxtFupVnt = $FupVnt;
        $vnt->TxtUcrVnt = $_REQUEST['TxtCodEmp'];
        $vnt->TxtUupVnt = $_REQUEST['TxtCodEmp'];
        $vnt->TxtCodEmp = $_REQUEST['TxtCodEmp'];
        $vnt->TxtCodCli = $_REQUEST['TxtCodCli'];
        $vnt->TxtCodProd = $_REQUEST['TxtCodProd'];
        $vnt->TxtCodCont = $_REQUEST['TxtCodCont'];
        $vnt->TxtCodAvn = $_REQUEST['TxtCodAvn'];
        $vnt->TxtCodEstVnt = $_REQUEST['TxtCodEstVnt'];

        //Registro al modelo venta.
        $this->model->RegVnt($vnt);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: venta');
    }

    //Método que modifica el modelo de un venta.
    public function UpdVnt(){
        $vnt = new venta();

        $FupVnt = date("Y-m-d H:i:s");

        $vnt->TxtCodVnt = $_REQUEST['TxtCodVnt'];
        $vnt->TxtCptVnt = $_REQUEST['TxtCptVnt'];
        $vnt->TxtFocVnt = $_REQUEST['TxtFocVnt'];
        $vnt->TxtDscVnt = $_REQUEST['TxtDscVnt'];
        $vnt->TxtAliVnt = $_REQUEST['TxtAliVnt'];
        $vnt->TxtFupVnt = $FupVnt;
        $vnt->TxtUupVnt = $_REQUEST['TxtCodEmp'];
        $vnt->TxtCodProd = $_REQUEST['TxtCodProd'];
        $vnt->TxtCodCont = $_REQUEST['TxtCodCont'];
        $vnt->TxtCodAvn = $_REQUEST['TxtCodAvn'];
        $vnt->TxtCodEstVnt = $_REQUEST['TxtCodEstVnt'];
        
        $this->model->UpdVnt($vnt);

       header('Location: '.urlencode('detallevnt&a=Index&CodVnt=').$_REQUEST['TxtCodVnt']);
    }

    //Método que modifica el modelo de un venta.
    public function UpdVntDp(){
        $vnt = new venta();

        $FupVnt = date("Y-m-d H:i:s");

        $vnt->TxtCodVnt = $_REQUEST['TxtCodVnt'];
        $vnt->TxtCptVnt = $_REQUEST['TxtCptVnt'];
        $vnt->TxtFocVnt = $_REQUEST['TxtFocVnt'];
        $vnt->TxtDscVnt = $_REQUEST['TxtDscVnt'];
        $vnt->TxtAliVnt = $_REQUEST['TxtAliVnt'];
        $vnt->TxtFupVnt = $FupVnt;
        $vnt->TxtUupVnt = $_REQUEST['TxtCodEmp'];
        $vnt->TxtCodProd = $_REQUEST['TxtCodProd'];
        $vnt->TxtCodCont = $_REQUEST['TxtCodCont'];
        $vnt->TxtCodAvn = $_REQUEST['TxtCodAvn'];
        $vnt->TxtCodEstVnt = $_REQUEST['TxtCodEstVnt'];
        
        $this->model->UpdVnt($vnt);

       header('Location: '.urlencode('detallevnt&a=DetalleVnt&CodDetVnt=').$_REQUEST['TxtCodDetVnt'].urlencode('&CodVnt=').$_REQUEST['TxtCodVnt']);
    }

    public function UpdVntCal(){
        $vnt = new venta();

        $FupVnt = date("Y-m-d H:i:s");

        $vnt->TxtCodVnt = $_REQUEST['TxtCodVnt'];
        $vnt->TxtCptVnt = $_REQUEST['TxtCptVnt'];
        $vnt->TxtFocVnt = $_REQUEST['TxtFocVnt'];
        $vnt->TxtDscVnt = $_REQUEST['TxtDscVnt'];
        $vnt->TxtAliVnt = $_REQUEST['TxtAliVnt'];
        $vnt->TxtFupVnt = $FupVnt;
        $vnt->TxtUupVnt = $_REQUEST['TxtCodEmp'];
        $vnt->TxtCodProd = $_REQUEST['TxtCodProd'];
        $vnt->TxtCodCont = $_REQUEST['TxtCodCont'];
        $vnt->TxtCodAvn = $_REQUEST['TxtCodAvn'];
        $vnt->TxtCodEstVnt = $_REQUEST['TxtCodEstVnt'];
        
        $this->model->UpdVnt($vnt);

       header('Location: '.urlencode('calificacionvnt&a=Index&CodVnt=').$_REQUEST['TxtCodVnt']);
    }

    public function UpdVntAg(){
        $vnt = new venta();

        $FupVnt = date("Y-m-d H:i:s");

        $vnt->TxtCodVnt = $_REQUEST['TxtCodVnt'];
        $vnt->TxtCptVnt = $_REQUEST['TxtCptVnt'];
        $vnt->TxtFocVnt = $_REQUEST['TxtFocVnt'];
        $vnt->TxtDscVnt = $_REQUEST['TxtDscVnt'];
        $vnt->TxtAliVnt = $_REQUEST['TxtAliVnt'];
        $vnt->TxtFupVnt = $FupVnt;
        $vnt->TxtUupVnt = $_REQUEST['TxtCodEmp'];
        $vnt->TxtCodProd = $_REQUEST['TxtCodProd'];
        $vnt->TxtCodCont = $_REQUEST['TxtCodCont'];
        $vnt->TxtCodAvn = $_REQUEST['TxtCodAvn'];
        $vnt->TxtCodEstVnt = $_REQUEST['TxtCodEstVnt'];
        
        $this->model->UpdVnt($vnt);

       header('Location: '.urlencode('agenda&a=Index&CodVnt=').$_REQUEST['TxtCodVnt']);
    }

    public function UpdVntAgD(){
        $vnt = new venta();

        $FupVnt = date("Y-m-d H:i:s");

        $vnt->TxtCodVnt = $_REQUEST['TxtCodVnt'];
        $vnt->TxtCptVnt = $_REQUEST['TxtCptVnt'];
        $vnt->TxtFocVnt = $_REQUEST['TxtFocVnt'];
        $vnt->TxtDscVnt = $_REQUEST['TxtDscVnt'];
        $vnt->TxtAliVnt = $_REQUEST['TxtAliVnt'];
        $vnt->TxtFupVnt = $FupVnt;
        $vnt->TxtUupVnt = $_REQUEST['TxtCodEmp'];
        $vnt->TxtCodProd = $_REQUEST['TxtCodProd'];
        $vnt->TxtCodCont = $_REQUEST['TxtCodCont'];
        $vnt->TxtCodAvn = $_REQUEST['TxtCodAvn'];
        $vnt->TxtCodEstVnt = $_REQUEST['TxtCodEstVnt'];
        
        $this->model->UpdVnt($vnt);

       header('Location: '.urlencode('agenda&a=Evento&CodAgn=').$_REQUEST['TxtCodAgn']);
    }

    public function UpdVntStk(){
        $vnt = new venta();

        $FupVnt = date("Y-m-d H:i:s");

        $vnt->TxtCodVnt = $_REQUEST['TxtCodVnt'];
        $vnt->TxtCptVnt = $_REQUEST['TxtCptVnt'];
        $vnt->TxtFocVnt = $_REQUEST['TxtFocVnt'];
        $vnt->TxtDscVnt = $_REQUEST['TxtDscVnt'];
        $vnt->TxtAliVnt = $_REQUEST['TxtAliVnt'];
        $vnt->TxtFupVnt = $FupVnt;
        $vnt->TxtUupVnt = $_REQUEST['TxtCodEmp'];
        $vnt->TxtCodProd = $_REQUEST['TxtCodProd'];
        $vnt->TxtCodCont = $_REQUEST['TxtCodCont'];
        $vnt->TxtCodAvn = $_REQUEST['TxtCodAvn'];
        $vnt->TxtCodEstVnt = $_REQUEST['TxtCodEstVnt'];
        
        $this->model->UpdVnt($vnt);

       header('Location: '.urlencode('stakeholder&a=Index&CodVnt=').$_REQUEST['TxtCodVnt']);
    }

    public function UpdVntEqp(){
        $vnt = new venta();

        $FupVnt = date("Y-m-d H:i:s");

        $vnt->TxtCodVnt = $_REQUEST['TxtCodVnt'];
        $vnt->TxtCptVnt = $_REQUEST['TxtCptVnt'];
        $vnt->TxtFocVnt = $_REQUEST['TxtFocVnt'];
        $vnt->TxtDscVnt = $_REQUEST['TxtDscVnt'];
        $vnt->TxtAliVnt = $_REQUEST['TxtAliVnt'];
        $vnt->TxtFupVnt = $FupVnt;
        $vnt->TxtUupVnt = $_REQUEST['TxtCodEmp'];
        $vnt->TxtCodProd = $_REQUEST['TxtCodProd'];
        $vnt->TxtCodCont = $_REQUEST['TxtCodCont'];
        $vnt->TxtCodAvn = $_REQUEST['TxtCodAvn'];
        $vnt->TxtCodEstVnt = $_REQUEST['TxtCodEstVnt'];
        
        $this->model->UpdVnt($vnt);

       header('Location: '.urlencode('equipo&a=Index&CodVnt=').$_REQUEST['TxtCodVnt']);
    }


    //Método que elimina la tupla venta con el CodVnt dado.
    public function DltVnt(){
        $this->model->DltVnt($_REQUEST['CodVnt']);
        header('Location: venta');
    }

    public function UpdVntC(){
        $this->model->UpdVntC($_REQUEST['CodVnt']);
        header('Location: venta');
    }

    public function UpdVntP(){
        $this->model->UpdVntP($_REQUEST['CodVnt']);
        header('Location: venta');
    }

}
