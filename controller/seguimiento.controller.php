<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/seguimiento.php';

class SeguimientoController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new seguimiento();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/jefe/header.php';
        require_once 'view/jefe/layout/menu_seg.php';
        require_once 'view/jefe/seguimiento/seguimiento.php';
        require_once 'view/footer.php';
    }

    public function ListSeg(){
        $Seg = new seguimiento();

        //Captura de los datos del formulario (vista).
        $Seg->TxtCodPrfJf = $_REQUEST['TxtCodPrfJf'];
        $Seg->TxtCodEmp = $_REQUEST['TxtCodEmp'];
        $Seg->TxtCodPrf = $_REQUEST['TxtCodPrf'];
        $Seg->TxtFIni = $_REQUEST['TxtFIni'];
        $Seg->TxtFFin = $_REQUEST['TxtFFin'];
        $Seg->TxtIndicador = $_REQUEST['TxtIndicador'];

        if( $Seg->TxtCodPrfJf == '3' && $Seg->TxtCodEmp == '0' && $Seg->TxtIndicador == '0' && $Seg->TxtCodPrf == '0') {
            $this->model->SegListEmp1JIAL($Seg->TxtFIni, $Seg->TxtFFin);
            require_once 'view/jefe/header.php';
            require_once 'view/jefe/layout/menu_seg.php';
            require_once 'view/jefe/seguimiento/detalles/detalle-J1L1IAL.php';
            require_once 'view/footer.php';
        }

        else if( $Seg->TxtCodPrfJf == '3' && $Seg->TxtCodEmp == '0' && $Seg->TxtIndicador != '0' && $Seg->TxtCodPrf == '0') {
            $this->model->SegListEmp2JIAL($Seg->TxtFIni, $Seg->TxtFIni, $Seg->TxtIndicador);
            require_once 'view/jefe/header.php';
            require_once 'view/jefe/layout/menu_seg.php';
            require_once 'view/jefe/seguimiento/detalles/detalle-J1L2IAL.php';
            require_once 'view/footer.php';
        }

        else if( $Seg->TxtCodPrfJf == '3' && $Seg->TxtCodEmp != '0' && $Seg->TxtIndicador == '0' && $Seg->TxtCodPrf != '0') {
            $this->model->SegListEmp3($Seg->TxtCodEmp, $Seg->TxtCodPrf, $Seg->TxtFIni, $Seg->TxtFFin);
            require_once 'view/jefe/header.php';
            require_once 'view/jefe/layout/menu_seg.php';
            require_once 'view/jefe/seguimiento/detalles/detalle-L3.php';
            require_once 'view/footer.php';
        }

        else if( $Seg->TxtCodPrfJf != '3' && $Seg->TxtCodEmp == '0' && $Seg->TxtIndicador == '0' && $Seg->TxtCodPrf == '0') {
            $this->model->SegListEmp1JCC($Seg->TxtFIni, $Seg->TxtFFin);
            require_once 'view/jefe/header.php';
            require_once 'view/jefe/layout/menu_seg.php';
            require_once 'view/jefe/seguimiento/detalles/detalle-J2L1CC.php';
            require_once 'view/footer.php';
        }

        else if( $Seg->TxtCodPrfJf != '3' && $Seg->TxtCodEmp == '0' && $Seg->TxtIndicador != '0' && $Seg->TxtCodPrf == '0') {
            $this->model->SegListEmp2JCC($Seg->TxtFIni, $Seg->TxtFIni, $Seg->TxtIndicador);
            require_once 'view/jefe/header.php';
            require_once 'view/jefe/layout/menu_seg.php';
            require_once 'view/jefe/seguimiento/detalles/detalle-J2L2CC.php';
            require_once 'view/footer.php';
        }

        else if( $Seg->TxtCodPrfJf != '3' && $Seg->TxtCodEmp != '0' && $Seg->TxtIndicador == '0' && $Seg->TxtCodPrf != '0') {
            $this->model->SegListEmp3($Seg->TxtCodEmp, $Seg->TxtCodPrf, $Seg->TxtFIni, $Seg->TxtFFin);
            require_once 'view/jefe/header.php';
            require_once 'view/jefe/layout/menu_seg.php';
            require_once 'view/jefe/seguimiento/detalles/detalle-L3.php';
            require_once 'view/footer.php';
        }

        else {
            $this->model->SegListEmp4($Seg->TxtCodEmp, $Seg->TxtCodPrf, $Seg->TxtFIni, $Seg->TxtFFin, $Seg->TxtIndicador);
            require_once 'view/jefe/header.php';
            require_once 'view/jefe/layout/menu_seg.php';
            require_once 'view/jefe/seguimiento/detalles/detalle-L4.php';
            require_once 'view/footer.php';
        }

    }


}