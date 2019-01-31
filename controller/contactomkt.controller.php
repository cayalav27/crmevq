<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/contacto.php';

class ContactoMktController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new contacto();
    }

    //Llamado plantilla principal
    public function Index(){

        $cont = new contacto();

        //Se obtienen los datos del contacto a editar.
        if(isset($_REQUEST['CodCli'])){
            $cont = $this->model->ObtCli($_REQUEST['CodCli']);
        }

        require_once 'view/gestormarketing/header.php';
        require_once 'view/gestormarketing/layout/menu_cli.php';
        require_once 'view/gestormarketing/corporativo/contacto/contacto.php';
        require_once 'view/footer.php';
    }

    //Método que registrar al modelo un nuevo contacto.
    public function RegCont(){
        $cont = new contacto();

        //Captura de los datos del formulario (vista).
        $cont->TxtNomCont = $_REQUEST['TxtNomCont'];
        $cont->TxtAreCont = $_REQUEST['TxtAreCont'];
        $cont->TxtCrgCont = $_REQUEST['TxtCrgCont'];
        $cont->TxtTlfCont = $_REQUEST['TxtTlfCont'];
        $cont->TxtEmlCont = $_REQUEST['TxtEmlCont'];
        $cont->TxtCodCli = $_REQUEST['TxtCodCli'];

        //Registro al modelo contacto.
        $this->model->RegCont($cont);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: '.urlencode('contactomkt&a=Index&CodCli=').$_REQUEST['TxtCodCli']);
    }

    //Método que modifica el modelo de un contacto.
    public function UpdCont(){
        $cont = new contacto();

        $cont->TxtCodCont = $_REQUEST['TxtCodCont'];
        $cont->TxtNomCont = $_REQUEST['TxtNomCont'];
        $cont->TxtAreCont = $_REQUEST['TxtAreCont'];
        $cont->TxtCrgCont = $_REQUEST['TxtCrgCont'];
        $cont->TxtTlfCont = $_REQUEST['TxtTlfCont'];
        $cont->TxtEmlCont = $_REQUEST['TxtEmlCont'];

        $this->model->UpdCont($cont);

        header('Location: '.urlencode('contactomkt&a=Index&CodCli=').$_REQUEST['TxtCodCli']);
    }

    //Método que elimina la tupla contacto con el CodCont dado.
    public function DltCont(){
        $this->model->DltCont($_REQUEST['CodCont']);
        header('Location: clientemkt');
    }
}
