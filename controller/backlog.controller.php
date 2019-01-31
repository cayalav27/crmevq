<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/backlog.php';

class BacklogController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new backlog();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/especialistacomercial/header.php';
        require_once 'view/especialistacomercial/layout/menu_bak.php';
        require_once 'view/especialistacomercial/backlog/backlog.php';
        require_once 'view/footer.php';
    }

    public function DtIndex(){

        $bag = new backlog();

        //Se obtienen los datos del backlog a editar.
        if(isset($_REQUEST['CodBkl'])){
            $bag = $this->model->ObtBkl($_REQUEST['CodBkl']);
        }

        require_once 'view/especialistacomercial/header.php';
        require_once 'view/especialistacomercial/layout/menu_bak.php';
        require_once 'view/especialistacomercial/backlog/detbacklog.php';
        require_once 'view/footer.php';
    }

    //Método que registrar al modelo un nuevo backlog.
    public function RegBkl(){
        $bag = new backlog();

        //Captura de los datos del formulario (vista).
        $bag->TxtMntBkl = $_REQUEST['TxtMntBkl'];
        $bag->TxtComBkl = $_REQUEST['TxtComBkl'];
        $bag->TxtDtfBkl = $_REQUEST['TxtDtfBkl'];
        $bag->TxtCodCli = $_REQUEST['TxtCodCli'];
        $bag->TxtCodProd = $_REQUEST['TxtCodProd'];
        $bag->TxtCodEmp = $_REQUEST['TxtCodEmp'];
        $bag->TxtCodOgn = $_REQUEST['TxtCodOgn'];

        //Registro al modelo backlog-backlog.
        $this->model->RegBkl($bag);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: backlog');
    }

    //Método que modifica el modelo de un backlog-backlog.
    public function UpdBkl(){
        $bag = new backlog();

        $bag->TxtCodBkl = $_REQUEST['TxtCodBkl'];
        $bag->TxtMntBkl = $_REQUEST['TxtMntBkl'];
        $bag->TxtComBkl = $_REQUEST['TxtComBkl'];
        $bag->TxtDtfBkl = $_REQUEST['TxtDtfBkl'];
        $bag->TxtCodOgn = $_REQUEST['TxtCodOgn'];

        $this->model->UpdBkl($bag);

        header('Location: '.urlencode('backlog&a=DtIndex&CodBkl=').$_REQUEST['TxtCodBkl']);
    }

    //Método que elimina la tupla backlog-backlog con el CodBkl dado.
    public function DltBkl(){
        $this->model->DltBkl($_REQUEST['CodBkl']);
        header('Location: backlog');
    }
}
