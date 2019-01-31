<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/consorcio.php';

class ConsorcioController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new consorcio();
    }

    public function Index(){

         $cont = new consorcio();

        //Se obtienen los datos del consorcio a editar.
        if(isset($_REQUEST['CodCli'])){
            $cont = $this->model->ObtCli($_REQUEST['CodCli']);
        }

        require_once 'view/especialistacomercial/header.php';
        require_once 'view/especialistacomercial/layout/menu_cli.php';
        require_once 'view/especialistacomercial/corporativo/cliente/consorcio.php';
        require_once 'view/footer.php';
    }

    //Método que modifica el modelo de un consorcio.
    public function UpdCliCns(){
        $cont = new consorcio();

        $cont->TxtCodCli = $_REQUEST['TxtCodCli'];
        $cont->TxtCodCliCns = $_REQUEST['TxtCodCliCns'];

        $this->model->UpdCliCns($cont);

        header('Location: '.urlencode('consorcio&a=Index&CodCli=').$_REQUEST['TxtCodCliCns']);
    }

    public function UpdDltCliCns(){
        $this->model->UpdDltCliCns($_REQUEST['CodCli']);
    }
}
