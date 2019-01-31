<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/equipomkt.php';

class EquipomktController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new equipomkt();
    }

    //Llamado plantilla principal
    public function Index(){

        $eqpmkt = new equipomkt();

        //Se obtienen los datos del detallemkt a editar.
        if(isset($_REQUEST['CodMrk'])){
            $eqpmkt = $this->model->ObtMkt($_REQUEST['CodMrk']);
        }

        require_once 'view/gestormarketing/header.php';
        require_once 'view/gestormarketing/layout/menu_mkt.php';
        require_once 'view/gestormarketing/equipo/equipo.php';
        require_once 'view/footer.php';
    }

    //Método que registrar al modelo un nuevo equipomkt.
    public function RegEqp(){
        $equip = new equipomkt();

        //Captura de los datos del formulario (vista).
        $equip->TxtCodVnt = $_REQUEST['TxtCodVnt'];
        $equip->TxtCodEmp = $_REQUEST['TxtCodEmp'];

        //Registro al modelo venta.
        $this->model->RegEqp($equip);

        //header() es usado para enviar encabezados HTTP sin formato.
        //"Location:" No solamente envía el encabezado al navegador, sino que
        //también devuelve el código de status (302) REDIRECT al
        //navegador
        header('Location: '.urlencode('equipomkt&a=Index&CodVnt=').$_REQUEST['TxtCodVnt']);
    }

    //Método que modifica el modelo de un equipomkt.
    public function UpdEqp(){
        $equip = new equipomkt();

        $equip->TxtCodEqp = $_REQUEST['TxtCodEqp'];
        $equip->TxtCodEmp = $_REQUEST['TxtCodEmp'];
        
        $this->model->UpdEqp($equip);

        header('Location: '.urlencode('equipomkt&a=Index&CodVnt=').$_REQUEST['TxtCodVnt']);
    }

    //Método que elimina la tupla equipomkt con el cod_equipo dado.
    public function DltEqp(){
        $this->model->DltEqp($_REQUEST['CodEqp']);
        header('Location: venta');
    }

    public function UpdActEqp(){
        $this->model->UpdActEqp($_REQUEST['CodEqp']);
        header('Location: venta');
    }

}
