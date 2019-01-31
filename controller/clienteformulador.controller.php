<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/cliente.php';

class ClienteFormuladorController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new cliente();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/formulador/header.php';
        require_once 'view/formulador/corporativo/cliente/cliente.php';
        require_once 'view/footer.php';
    }

    //Método que registrar al modelo un nuevo cliente.
    public function RegCli(){
        $cli = new cliente();

        $FcrCli = date("Y-m-d H:i:s");
        $FupCli = date("Y-m-d H:i:s");

        //Captura de los datos del formulario (vista).
        $cli->TxtRucCli = $_REQUEST['TxtRucCli'];
        $cli->TxtNomCli = $_REQUEST['TxtNomCli'];
        $cli->TxtDirCli = $_REQUEST['TxtDirCli'];
        $cli->TxtTlfCli = $_REQUEST['TxtTlfCli'];
        $cli->TxtEmlCli = $_REQUEST['TxtEmlCli'];
        $cli->TxtEstCli = $_REQUEST['TxtEstCli'];
        $cli->TxtCnsCli = $_REQUEST['TxtCnsCli'];
        $cli->TxtFcrCli = $FcrCli;
        $cli->TxtFupCli = $FupCli;
        $cli->TxtUcrCli = $_REQUEST['TxtCodEmp'];
        $cli->TxtUupCli = $_REQUEST['TxtCodEmp'];
        $cli->TxtCodTip = $_REQUEST['TxtCodTip'];
        $cli->TxtCodAct = $_REQUEST['TxtCodAct'];
        $cli->TxtCodOgn = $_REQUEST['TxtCodOgn'];
        $cli->TxtCodCiu = $_REQUEST['TxtCodCiu'];

        //Registro al modelo cliente.
        $this->model->RegCli($cli);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: clienteformulador');
    }

    //Método que modifica el modelo de un cliente.
    public function UpdCli(){
        $cli = new cliente();

        $FupCli = date("Y-m-d H:i:s");

        $cli->TxtCodCli = $_REQUEST['TxtCodCli'];
        $cli->TxtNomCli = $_REQUEST['TxtNomCli'];
        $cli->TxtDirCli = $_REQUEST['TxtDirCli'];
        $cli->TxtTlfCli = $_REQUEST['TxtTlfCli'];
        $cli->TxtEmlCli = $_REQUEST['TxtEmlCli'];
        $cli->TxtEstCli = $_REQUEST['TxtEstCli'];
        $cli->TxtCnsCli = $_REQUEST['TxtCnsCli'];
        $cli->TxtFupCli = $FupCli;
        $cli->TxtUupCli = $_REQUEST['TxtCodEmp'];
        $cli->TxtCodTip = $_REQUEST['TxtCodTip'];
        $cli->TxtCodAct = $_REQUEST['TxtCodAct'];
        $cli->TxtCodOgn = $_REQUEST['TxtCodOgn'];
        $cli->TxtCodCiu = $_REQUEST['TxtCodCiu'];

        $this->model->UpdCli($cli);

        header('Location: '.urlencode('contactoformulador&a=Index&CodCli=').$_REQUEST['TxtCodCli']);
    }

    //Método que elimina la tupla cliente con el CodCli dado.
    public function DltCli(){
        $this->model->DltCli($_REQUEST['CodCli']);
        header('Location: clienteformulador');
    }

    public function validarRucController($validarRuc){
        $datos = $validarRuc;

        $respuesta = $this->model->validarRucController($datos);

        if(count($respuesta["RucCli"]) > 0){
            echo 0;
        }
        else{
            echo 1;
        }
    }
}
