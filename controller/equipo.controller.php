<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/equipo.php';

class EquipoController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new equipo();
    }

    //Llamado plantilla principal
    public function Index(){

        $equip = new equipo();

        //Se obtienen los datos del venta a editar.
        if(isset($_REQUEST['CodVnt'])){
            $equip = $this->model->ObtVnt($_REQUEST['CodVnt']);
        }

        require_once 'view/especialistacomercial/header.php';
        require_once 'view/especialistacomercial/layout/menu_vnt.php';
        require_once 'view/especialistacomercial/equipo/equipo.php';
        require_once 'view/footer.php';
    }

    //Método que registrar al modelo un nuevo equipo.
    public function RegEqp(){
        $equip = new equipo();

        //Captura de los datos del formulario (vista).
        $equip->TxtCodVnt = $_REQUEST['TxtCodVnt'];
        $equip->TxtCodEmp = $_REQUEST['TxtCodEmp'];

        //Registro al modelo venta.
        $this->model->RegEqp($equip);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: '.urlencode('equipo&a=Index&CodVnt=').$_REQUEST['TxtCodVnt']);
    }

    //Método que modifica el modelo de un equipo.
    public function UpdEqp(){
        $equip = new equipo();

        $equip->TxtCodEqp = $_REQUEST['TxtCodEqp'];
        $equip->TxtCodEmp = $_REQUEST['TxtCodEmp'];
        
        $this->model->UpdEqp($equip);

        header('Location: '.urlencode('equipo&a=Index&CodVnt=').$_REQUEST['TxtCodVnt']);
    }

    //Método que elimina la tupla equipo con el cod_equipo dado.
    public function DltEqp(){
        $this->model->DltEqp($_REQUEST['CodEqp']);
        header('Location: venta');
    }

    public function UpdActEqp(){
        $this->model->UpdActEqp($_REQUEST['CodEqp']);
        header('Location: venta');
    }

}
