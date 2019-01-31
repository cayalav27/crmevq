<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/reportes.php';

class ReportesGerenteController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new reportes();
    }

    public function Index(){
        require_once 'view/gerente/header.php';
        require_once 'view/gerente/reportes/reportes.php';
        require_once 'view/footer.php';
    }

    public function ListRepEft(){
        $Seg = new reportes();

        //Captura de los datos del formulario (vista).
        $Seg->TxtCodPrfGe = $_REQUEST['TxtCodPrfGe'];
        $Seg->TxtCodEmp = $_REQUEST['TxtCodEmp'];
        $Seg->TxtFIni = $_REQUEST['TxtFIni'];
        $Seg->TxtFFin = $_REQUEST['TxtFFin'];
            
            $this->model->RepListEft($Seg->TxtCodEmp, $Seg->TxtFIni, $Seg->TxtFFin);
            require_once 'view/gerente/header.php';
            require_once 'view/gerente/reportes/detalles/detreport1.php';
            require_once 'view/footer.php';

    }

    public function ListRepRnt(){
        $Seg = new reportes();

        //Captura de los datos del formulario (vista).
        $Seg->TxtCodPrfGe = $_REQUEST['TxtCodPrfGe'];
        $Seg->TxtCodEmp = $_REQUEST['TxtCodEmp'];
        $Seg->TxtFIni = $_REQUEST['TxtFIni'];
        $Seg->TxtFFin = $_REQUEST['TxtFFin'];
        $Seg->TxtIndicador = $_REQUEST['TxtIndicador'];
            
        if( $Seg->TxtCodPrfGe == '2' && $Seg->TxtCodEmp == '0' && $Seg->TxtIndicador == '0') {
        $this->model->RentList1($Seg->TxtFIni, $Seg->TxtFFin);
        require_once 'view/gerente/header.php';
        require_once 'view/gerente/reportes/detalles/detreport2.php';
        require_once 'view/footer.php';
        }

        else if( $Seg->TxtCodPrfGe == '2' && $Seg->TxtCodEmp != '0' && $Seg->TxtIndicador == '0') {
            $this->model->RentList2($Seg->TxtCodEmp, $Seg->TxtFIni, $Seg->TxtFFin);
            require_once 'view/gerente/header.php';
            require_once 'view/gerente/reportes/detalles/detreport3.php';
            require_once 'view/footer.php';
        }

        else if( $Seg->TxtCodPrfGe == '2' && $Seg->TxtCodEmp == '0' && $Seg->TxtIndicador != '0') {
            $this->model->RentList3($Seg->TxtFIni, $Seg->TxtFFin, $Seg->TxtIndicador);
            require_once 'view/gerente/header.php';
            require_once 'view/gerente/reportes/detalles/detreport4.php';
            require_once 'view/footer.php';
        }

        else {
            $this->model->RentList4($Seg->TxtCodEmp, $Seg->TxtFIni, $Seg->TxtFFin, $Seg->TxtIndicador);
            require_once 'view/gerente/header.php';
            require_once 'view/gerente/reportes/detalles/detreport5.php';
            require_once 'view/footer.php';
        }

    }
}