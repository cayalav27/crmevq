<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/detallevnt.php';

class DetallevntController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new detallevnt();
    }

    //Llamando a la vista-Tabla-detallevnts
    public function Index(){
        $prec = new detallevnt();

        //Se obtienen los datos del detallevnt a editar.
        if(isset($_REQUEST['CodVnt'])){
            $prec = $this->model->ObtVnt($_REQUEST['CodVnt']);
        }

        //Llamado de las vistas.
        require_once 'view/especialistacomercial/header.php';
        require_once 'view/especialistacomercial/layout/menu_vnt.php';
        require_once 'view/especialistacomercial/ventas/detallevnt/detallevnt.php';
        require_once 'view/footer.php';
    }

    //Llamando a la vista-Tabla-detallevnts
    public function DetalleVnt(){
        $prec = new detallevnt();

        //Se obtienen los datos del detallevnt a editar.
        if(isset($_REQUEST['CodDetVnt'], $_REQUEST['CodVnt'])){
            $prec = $this->model->ObtDetVntProd($_REQUEST['CodDetVnt'], $_REQUEST['CodVnt']);
        }

        //Llamado de las vistas.
        require_once 'view/especialistacomercial/header.php';
        require_once 'view/especialistacomercial/layout/menu_vnt.php';
        require_once 'view/especialistacomercial/ventas/detallevnt/detallevntprod.php';
        require_once 'view/footer.php';
    }

    //Método que registrar al modelo un nuevo detallevnt.
    public function RegDetVnt(){
        $prec = new detallevnt();

        //Captura de los datos del formulario (vista).
        $prec->TxtCntDetVnt = $_REQUEST['TxtCntDetVnt'];
        $prec->TxtCodProd = $_REQUEST['TxtCodProd'];
        $prec->TxtCodVnt = $_REQUEST['TxtCodVnt'];
        $prec->TxtCodFac = $_REQUEST['TxtCodFac'];
        $prec->TxtCodTpCmb = $_REQUEST['TxtCodTpCmb'];
        $prec->TxtCodDsc = $_REQUEST['TxtCodDsc'];
        //Registro al modelo detallevnt.
        $this->model->RegDetVnt($prec);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: '.urlencode('detallevnt&a=Index&CodVnt=').$_REQUEST['TxtCodVnt']);
    }

    //Método que modifica el modelo de un detallevnt de detallevnt.
    public function UpdDetVnt(){
        $prec = new detallevnt();

        $prec->TxtCodDetVnt = $_REQUEST['TxtCodDetVnt'];
        $prec->TxtCntDetVnt = $_REQUEST['TxtCntDetVnt'];
        $prec->TxtCodFac = $_REQUEST['TxtCodFac'];
        $prec->TxtCodTpCmb = $_REQUEST['TxtCodTpCmb'];
        $prec->TxtCodDsc = $_REQUEST['TxtCodDsc'];
        
        $this->model->UpdDetVnt($prec);

        header('Location: '.urlencode('detallevnt&a=DetalleVnt&CodDetVnt=').$_REQUEST['TxtCodDetVnt'].urlencode('&CodVnt=').$_REQUEST['TxtCodVnt']);
    }
    
    //Método que elimina la tupla detallevnt con el CodDetVnt dado.
    public function DltDetVnt(){
        $this->model->DltDetVnt($_REQUEST['CodDetVnt']);
    }

    public function UpdActDetVnt(){
        $this->model->UpdActDetVnt($_REQUEST['CodDetVnt']);
    }

    public function RegDetTot(){
        $prec = new detallevnt();

        //Captura de los datos del formulario (vista).
        $prec->TxtSubTotal = $_REQUEST['TxtSubTotal'];
        $prec->TxtCodVnt = $_REQUEST['TxtCodVnt'];
        //Registro al modelo detallevnt.
        $this->model->RegDetTot($prec);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: '.urlencode('detallevnt&a=Index&CodVnt=').$_REQUEST['TxtCodVnt']);
    }

    public function UpdDetTot(){
        $prec = new detallevnt();

        $prec->TxtSubTotal = $_REQUEST['TxtSubTotal'];
        $prec->TxtCodDetTot = $_REQUEST['TxtCodDetTot'];
        
        $this->model->UpdDetTot($prec);

        header('Location: '.urlencode('detallevnt&a=Index&CodVnt=').$_REQUEST['TxtCodVnt']);
    }

    public function UpdDetTotAut(){
        $this->model->UpdDetTotAut($_REQUEST['CodDetTot']);
    }

    public function UpdDetTotMnl(){
        $this->model->UpdDetTotMnl($_REQUEST['CodDetTot']);
    }

}