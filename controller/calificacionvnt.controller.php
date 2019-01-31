<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/calificacionvnt.php';

class CalificacionvntController {

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new calificacionvnt();
    }

    //Llamando a la vista-calificacion
    public function Index(){
        $cal = new calificacionvnt();

        //Se obtienen los datos del venta a editar.
        if(isset($_REQUEST['CodVnt'])){
            $cal = $this->model->ListCalVnt($_REQUEST['CodVnt']);
        }

        //Llamado de las vistas.
        require_once 'view/especialistacomercial/header.php';
        require_once 'view/especialistacomercial/layout/menu_vnt.php';
        require_once 'view/especialistacomercial/calificacion/calificacion.php';
        require_once 'view/footer.php';
    }

    public function UpdCalVnt(){
        $cal = new calificacionvnt();

        $cal->TxtCodCalVnt = $_REQUEST['TxtCodCalVnt'];
        $cal->TxtCl1CalVnt = $_REQUEST['TxtCl1CalVnt'];
        $cal->TxtCl2CalVnt = $_REQUEST['TxtCl2CalVnt'];
        $cal->TxtCl3CalVnt = $_REQUEST['TxtCl3CalVnt'];
        $cal->TxtCl4CalVnt = $_REQUEST['TxtCl4CalVnt'];
        $cal->TxtCl5CalVnt = $_REQUEST['TxtCl5CalVnt'];
        $cal->TxtCl6CalVnt = $_REQUEST['TxtCl6CalVnt'];
        $cal->TxtCl7CalVnt = $_REQUEST['TxtCl7CalVnt'];
        $cal->TxtCl8CalVnt = $_REQUEST['TxtCl8CalVnt'];
        $cal->TxtCl9CalVnt = $_REQUEST['TxtCl9CalVnt'];
        $cal->TxtCl10CalVnt = $_REQUEST['TxtCl10CalVnt'];
        $cal->TxtCl11CalVnt = $_REQUEST['TxtCl11CalVnt'];
        $cal->TxtCl12CalVnt = $_REQUEST['TxtCl12CalVnt'];
        
        $this->model->UpdCalVnt($cal);

       header('Location: '.urlencode('calificacionvnt&a=Index&CodVnt=').$_REQUEST['TxtCodVnt']);
    }

}