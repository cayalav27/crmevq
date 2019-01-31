<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/reportes.php';

class ReportesJefeController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new reportes();
    }

    public function Index(){
        require_once 'view/jefe/header.php';
        require_once 'view/jefe/layout/menu_rpt.php';
        require_once 'view/jefe/reportes/reportes.php';
        require_once 'view/footer.php';
    }

    public function ListRep(){
        $Seg = new reportes();

        //Captura de los datos del formulario (vista).
        $Seg->TxtCodPrfJf = $_REQUEST['TxtCodPrfJf'];
        $Seg->TxtCodEmp = $_REQUEST['TxtCodEmp'];
        $Seg->TxtFIni = $_REQUEST['TxtFIni'];
        $Seg->TxtFFin = $_REQUEST['TxtFFin'];
            
            $this->model->RepListEft($Seg->TxtCodEmp, $Seg->TxtFIni, $Seg->TxtFFin);
            require_once 'view/jefe/header.php';
            require_once 'view/jefe/layout/menu_rpt.php';
            require_once 'view/jefe/reportes/detreport.php';
            require_once 'view/footer.php';

    }
}