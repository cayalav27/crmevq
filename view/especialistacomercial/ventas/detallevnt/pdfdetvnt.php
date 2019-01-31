<?php

    $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
 
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetTitle($pdfvnt->NomCli);
    
    

    $pdf->setPrintHeader(false); 
    $pdf->setPrintFooter(false);
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    $pdf->SetMargins(15, 15, 15, false); 
    $pdf->SetAutoPageBreak(true, 15); 
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    if (@file_exists(dirname(__FILE__).'/lang/spa.php')) {
        require_once(dirname(__FILE__).'/lang/spa.php');
        $pdf->setLanguageArray($l);
    }
    $pdf->addPage();
    $pdf->SetFont('Helvetica', '', 8);
    
    $image_file = K_PATH_IMAGES.'logo.jpg';
    $pdf->Image($image_file, 15, 5, 50, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    

    $content = '';
    $pdf->Ln(15); 
    $content .= '
    <h3 style="text-align:center;">'.$pdfvnt->NomCli.'</h3>
        <table class="table" cellpadding="2">
            <tbody>
                <tr>
                    <th width="120"># Carpeta</th>
                    <td width="25">:</td>
                    <td width="475">'.$pdfvnt->CptVnt.'</td>
                    <th width="120">Fecha Probable de OC</th>
                    <td width="25">:</td>
                    <td width="475">'.$pdfvnt->FocVnt.'</td>
                </tr>
                <tr>
                    <th width="120">Contacto</th>
                    <td width="25">:</td>
                    <td width="475">'.$pdfvnt->NomCont.'</td>
                    <th width="120">Telefono</th>
                    <td width="25">:</td>
                    <td width="475">'.$pdfvnt->TlfCli.'</td>
                </tr>
                <tr>
                    <th width="120">Movil</th>
                    <td width="25">:</td>
                    <td width="475">'.$pdfvnt->TlfCont.'</td>
                    <th width="120">E-mail</th>
                    <td width="25">:</td>
                    <td width="475">'.$pdfvnt->EmlCont.'</td>
                </tr>
                <tr>
                    <th width="120">Observaciones</th>
                    <td width="25">:</td>
                    <td width="475">'.$pdfvnt->DscVnt.'</td>
                </tr>
                <tr>
                    <td>
                        <h4>CUADRO COSTO</h4>
                    </td>
                </tr>
            </tbody>
        </table>
    ';

$content .= '
<div class="tab-content">
    <div role="tabpanel" class="tab-pane animated fadeInRight active" id="cotizacion">
        <table id="dtable1" class="display compact" cellspacing="0" cellpadding="5" width="100%" border="1">
            <thead>
                <tr bgcolor="teal" style="color: white">
                    <th width="20">#</th>
                    <th align="center">Lineas</th>
                    <th align="center" width="150">Productos</th>
                    <th align="center" width="40">Cant</th>
                    <th align="center">Precio Lista</th>
                    <th align="center">Precio Costo</th>
                    <th align="center">Descuento</th>
                    <th align="center">PC x TP</th>
                    <th align="center">Costo Total</th>
                    <th align="center">P.U SIGV</th>
                    <th align="center">P.T SIGV</th>
                    <th align="center">Factor</th>
                    <th align="center">Valor</th>
                </tr>
            </thead>
            <tbody>';
                $i = 1;
                foreach($this->model->ListDetVnt($_REQUEST["CodVnt"]) as $r): 
$content .= '
                <tr>
                    <td width="20">'.$i++.'</td>
                    <td align="center">'.$r["NomDetMrc"].'</td>
                    <td width="150">'.$r["FabProd"].' - '.$r["NomProd"].'</td>
                    <td align="center" width="40">'.$r["CntDetVnt"].'</td>
                    <td align="center">'.number_format($r["PrcProd"],2).'</td>
                    <td align="center">'.number_format($r["PrcCst"],2).'</td>
                    <td align="center">'.$r["Dsc"].'%</td>
                    <td align="center">'.number_format($r["PrcCstCamb"],2).'</td>
                    <td align="center">'.number_format($r["CstTot"],2).'</td>
                    <td align="center">'.number_format($r["PUSigv"],2).'</td>
                    <td align="center">'.number_format($r["PTSigv"],2).'</td>
                    <td align="center">'.$r["NomFac"].'</td>
                    <td align="center">'.$r["NumFac"].'</td>
                </tr>';
                endforeach;
$content .= '
            </tbody>
        </table>
    </div>
</div>';
foreach($this->model->ListDetTot($_REQUEST["CodVnt"]) as $r): 
if($r["EstDetTot"] == '1') {
$content .= '
<table class="table" cellpadding="2">
    <tbody>
        <tr>
            <th width="120">SubTotal</th>
            <td width="25">:</td>';
            foreach($this->model->ListDetVntSub($_REQUEST["CodVnt"]) as $r): 
$content .= '
            <td>'.number_format($r["SubTot"],2).'</td>';
            endforeach; 
$content .= '
        </tr>
        <tr>
            <th width="120">IGV 18%</th>
            <td width="25">:</td>';
            foreach($this->model->ListDetVntIGV($_REQUEST["CodVnt"]) as $r): 
$content .= '
            <td>'.number_format($r["CnIgv"],2).'</td>';
            endforeach; 
$content .= '
        </tr>
        <tr>
            <th width="120">Total</th>
            <td width="25">:</td>';
            foreach($this->model->ListDetVntTot($_REQUEST["CodVnt"]) as $r): 
$content .= '
            <td>'.number_format($r["Total"],2).'</td>';
            endforeach; 
$content .= '
        </tr>
    </tbody>
</table>';
                        }
else {
    $content .= '
<table class="table" cellpadding="2">
    <tbody>
        <tr>
            <th width="120">SubTotal</th>
            <td width="25">:</td>';      
$content .= '
            <td>'.number_format($r["SbTDetTot"],2).'</td>';
$content .= '
        </tr>
        <tr>
            <th width="120">IGV 18%</th>
            <td width="25">:</td>';
$content .= '
            <td>'.number_format($r["CnIgv"],2).'</td>';
$content .= '
        </tr>
        <tr>
            <th width="120">Total</th>
            <td width="25">:</td>';
$content .= '
            <td>'.number_format($r["Total"],2).'</td>';
$content .= '
        </tr>
    </tbody>
</table>';
}
endforeach; 

$pdf->writeHTML($content, true, 0, true, 0);

$pdf->lastPage();
$pdf->Output();
