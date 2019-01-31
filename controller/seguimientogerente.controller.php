<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/seguimiento.php';

class SeguimientoGerenteController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new seguimiento();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/gerente/header.php';
        require_once 'view/gerente/seguimiento/seguimiento.php';
        require_once 'view/footer.php';
    }

    public function ListSeg(){
        $Seg = new seguimiento();

        //Captura de los datos del formulario (vista).
        $Seg->TxtCodPrfGe = $_REQUEST['TxtCodPrfGe'];
        $Seg->TxtCodEmp = $_REQUEST['TxtCodEmp'];
        $Seg->TxtCodPrf = $_REQUEST['TxtCodPrf'];
        $Seg->TxtFIni = $_REQUEST['TxtFIni'];
        $Seg->TxtFFin = $_REQUEST['TxtFFin'];
        $Seg->TxtIndicador = $_REQUEST['TxtIndicador'];

        if( $Seg->TxtCodPrfGe == '2' && $Seg->TxtCodEmp == '0' && $Seg->TxtIndicador == '0' && $Seg->TxtCodPrf == '0') {
            $this->model->SegListEmp1Ge($Seg->TxtFIni, $Seg->TxtFFin);
            require_once 'view/gerente/header.php';
            require_once 'view/gerente/seguimiento/detalles/detalle-L1.php';
            require_once 'view/footer.php';
        }

        else if( $Seg->TxtCodPrfGe == '2' && $Seg->TxtCodEmp == '0' && $Seg->TxtIndicador != '0' && $Seg->TxtCodPrf == '0') {
            $this->model->SegListEmp2Ge($Seg->TxtFIni, $Seg->TxtFIni, $Seg->TxtIndicador);
            require_once 'view/gerente/header.php';
            require_once 'view/gerente/seguimiento/detalles/detalle-L2.php';
            require_once 'view/footer.php';
        }

        else if( $Seg->TxtCodPrfGe == '2' && $Seg->TxtCodEmp != '0' && $Seg->TxtIndicador == '0' && $Seg->TxtCodPrf != '0') {
            $this->model->SegListEmp3($Seg->TxtCodEmp, $Seg->TxtCodPrf, $Seg->TxtFIni, $Seg->TxtFFin);
            require_once 'view/gerente/header.php';
            require_once 'view/gerente/seguimiento/detalles/detalle-L3.php';
            require_once 'view/footer.php';
        }

        else {
            $this->model->SegListEmp4($Seg->TxtCodEmp, $Seg->TxtCodPrf, $Seg->TxtFIni, $Seg->TxtFFin, $Seg->TxtIndicador);
            require_once 'view/gerente/header.php';
            require_once 'view/gerente/seguimiento/detalles/detalle-L4.php';
            require_once 'view/footer.php';
        }

    }


}