<?php
//Se incluye el modelo donde conectará el controlador.
require_once 'model/pdf.php';
require_once('assets/tcpdf/tcpdf.php');

class PdfController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new pdf();
    }
    
    //Llamando a la vista-Tabla-pdfs
    public function PdfDetVnt(){
        $pdfvnt = new pdf();

        //Se obtienen los datos del detallevnt a editar.
        if(isset($_REQUEST['CodVnt'])){
            $pdfvnt = $this->model->ObtVnt($_REQUEST['CodVnt']);
        }

        //Llamado de las vistas.
        require_once 'view/especialistacomercial/session.php';
        require_once 'view/especialistacomercial/ventas/detallevnt/pdfdetvnt.php';
        //require_once 'view/footer.php';
    }

    //Llamando a la vista-Tabla-pdfs
    public function PdfNeg(){
        $pdfvnt = new pdf();

        //Se obtienen los datos del detallevnt a editar.
        if(isset($_REQUEST['CodVnt'])){
            $pdfvnt = $this->model->ObtVnt($_REQUEST['CodVnt']);
        }

        //Llamado de las vistas.
        require_once 'view/especialistacomercial/session.php';
        require_once 'view/especialistacomercial/negocio/pdfnegocio.php';
        require_once 'view/footer.php';
    }
    
    public function PdfNegForm(){
        $pdfvnt = new pdf();

        //Se obtienen los datos del detallevnt a editar.
        if(isset($_REQUEST['CodVnt'])){
            $pdfvnt = $this->model->ObtVnt($_REQUEST['CodVnt']);
        }

        //Llamado de las vistas.
        require_once 'view/formulador/session.php';
        require_once 'view/formulador/negocio/pdfnegocio.php';
        require_once 'view/footer.php';
    }

    public function PdfSegJef(){
        $pdfvnt = new pdf();

        //Se obtienen los datos del detallevnt a editar.
        if(isset($_REQUEST['CodVnt'])){
            $pdfvnt = $this->model->SegVnt($_REQUEST['CodVnt']);
        }

        //Llamado de las vistas.
        require_once 'view/jefe/session.php';
        require_once 'view/jefe/seguimiento/pdfseguimiento.php';
        require_once 'view/footer.php';
    }

    public function PdfSegGe(){
        $pdfvnt = new pdf();

        //Se obtienen los datos del detallevnt a editar.
        if(isset($_REQUEST['CodVnt'])){
            $pdfvnt = $this->model->SegVnt($_REQUEST['CodVnt']);
        }

        //Llamado de las vistas.
        require_once 'view/gerente/session.php';
        require_once 'view/gerente/seguimiento/pdfseguimiento.php';
        require_once 'view/footer.php';
    }

}
