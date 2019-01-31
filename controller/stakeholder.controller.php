<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/stakeholder.php';

class StakeholderController{

	private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new stakeholder();
    }

    public function Index(){
        $stk = new stakeholder();

        //Se obtienen los datos de la stakeholder a editar.
        if(isset($_REQUEST['CodVnt'])){
            $stk = $this->model->ObtVnt($_REQUEST['CodVnt']);
        }

        //Llamado de las vistas.
        require_once 'view/especialistacomercial/header.php';
        require_once 'view/especialistacomercial/layout/menu_vnt.php';
        require_once 'view/especialistacomercial/stakeholder/stakeholder.php';
        require_once 'view/footer.php';
    }

    //Método que registrar al modelo un nueva stakeholder.
    public function RegStk(){
        $stk = new stakeholder();

        //Captura de los datos del formulario (vista).
        $stk->TxtNomStk = $_REQUEST['TxtNomStk'];
        $stk->TxtTlfStk = $_REQUEST['TxtTlfStk'];
        $stk->TxtCrgStk = $_REQUEST['TxtCrgStk'];
        $stk->TxtCodRol = $_REQUEST['TxtCodRol'];
        $stk->TxtCodVnt = $_REQUEST['TxtCodVnt'];
        $stk->TxtCodCli = $_REQUEST['TxtCodCli'];

        //Registro al modelo stakeholder.
        $this->model->RegStk($stk);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: '.urlencode('stakeholder&a=Index&CodVnt=').$_REQUEST['TxtCodVnt']);
    }

     //Método que modifica el modelo de una stakeholder de stakeholder.
    public function UpdStk(){
        $stk = new stakeholder();

        $stk->TxtCodStk = $_REQUEST['TxtCodStk'];
        $stk->TxtNomStk = $_REQUEST['TxtNomStk'];
        $stk->TxtTlfStk = $_REQUEST['TxtTlfStk'];
        $stk->TxtCrgStk = $_REQUEST['TxtCrgStk'];
        $stk->TxtCodRol = $_REQUEST['TxtCodRol'];
        $stk->TxtCodCli = $_REQUEST['TxtCodCli'];
        
        $this->model->UpdStk($stk);

       header('Location: '.urlencode('stakeholder&a=Index&CodVnt=').$_REQUEST['TxtCodVnt']);
    }

    //Método que elimina la tupla stakeholder con el TxtCodStk dado.
    public function DltStk(){
        $this->model->DltStk($_REQUEST['CodStk']);
        header('Location: venta');
    }

    public function UpdActStk(){
        $this->model->UpdActStk($_REQUEST['CodStk']);
        header('Location: venta');
    }
}