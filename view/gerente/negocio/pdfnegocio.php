<?php

    $pdf = new TCPDF('D', 'mm', 'A4', true, 'UTF-8', false);
 
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
    $pdf->Ln(20); 
    
    foreach($this->model->ListPipForm($pdfvnt->CodVnt, $iduser = $objses->get('CodEmp') , $iduser = $objses->get('CodPrf')) as $r):

    $content .= '
            <h3 style="text-align:center;">'.$r->NomCli.'</h3>
            <table class="table" cellpadding="4">
                <tbody>
                    <tr>
                        <th width="125"># Carpeta</th>
                        <td width="25">:</td>
                        <td>'.$r->CptVnt.'</td>
                    </tr>';
    $content .= '
                    <tr>
                        <th width="125">Solución</th>
                        <td width="25">:</td>
                    </tr>';
                        $i = 1;
                        foreach($this->model->ObtProdList($r->CodVnt) as $row):
    $content .= '
                    <tr>                                            
                        <th width="125"></th>
                        <td width="25">'.$i++.')</td>
                        <td width="500">'.$row["NomProd"].'</td>
                    </tr>';
                        endforeach;  
    $content .= '
                    <tr>
                        <th width="125">Fecha Estimada de OC</th>
                        <td width="25">:</td>
                        <td>';
                            $start_date = $r->Q1IQua;
                            $end_date = $r->Q1FQua;
                            $start_date2 = $r->Q2IQua;
                            $end_date2 = $r->Q2FQua;
                            $start_date3 = $r->Q3IQua;
                            $end_date3 = $r->Q3FQua;
                            $fecha_a_evaluar = $r->FocVnt;

                            if ($this->model->check_in_range($start_date, $end_date, $fecha_a_evaluar)) {
                                $content .= 'Quarter I';
                            }
                            elseif ($this->model->check_in_range($start_date2, $end_date2, $fecha_a_evaluar)) {
                                $content .= 'Quarter II';
                            } 
                            elseif ($this->model->check_in_range($start_date3, $end_date3, $fecha_a_evaluar)) {
                                $content .= 'Quarter III';
                            }  
                            else {
                                $content .= 'Quarter IV';
                            }
    $content .= '                        
                        </td>
                    </tr>';
    $content .= '
                    <tr>
                        <th width="125">Etapa</th>
                        <td width="25">:</td>
                        <td>';                    
                            if($r->CodAvn =='1'){
                                $content .= '<span>Primer Contacto</span>';
                                    }
                            elseif($r->CodAvn =='2') {
                                $content .= '<span>Propuesta Tecnica/Económica</span>';
                                    }
                            elseif($r->CodAvn =='3') {
                                $content .= '<span>Negociación</span>';
                                    }
                            else{
                                $content .= '<span>Cierre</span>';
                                    }
    $content .= '
                        </td>
                    </tr>';
    $content .= '
                    <tr>
                        <th width="125">Costo Total</th>
                        <td width="25">:</td>';
                        $i = 1;
                        foreach($this->model->ListPipPrc($r->CodVnt) as $row):
    $content .= '
                            <td>'.number_format($row->CtoFin,2).'</td>';
                        endforeach;
    $content .= '
                    </tr>
                    <tr>
                        <th width="125">Precio Sin IGV</th>
                        <td width="25">:</td>';
                        $i = 1;
                        foreach($this->model->ListPipPrc($r->CodVnt) as $row):
    $content .= '
                            <td>'.number_format($row->PreSIgv,2).'</td>';
                        endforeach;
    $content .= '
                    </tr>
                    <tr>
                        <th width="125">% Utilidad Bruta</th>
                        <td width="25">:</td>';
                        $i = 1;
                        foreach($this->model->ListPipPrc($r->CodVnt) as $row):
    $content .= ' 
                            <td>'.$row->PrcUtl.'%</td>';
                        endforeach;
    $content .= '
                    </tr>
                    <tr>
                        <th width="125">Score</th>
                        <td width="25">:</td>
                        <td>';
                                    if ($r->NumScr =="0"){ 
                                        $content .= '0';
                                    }
                                                  else if ($r->NumScr =="0."+$r->NumScr) {
                                        $content .= '0.'+$r->NumScr.'';                     
                                    }
                                                  else {
                                        $content .= ''.$r->NumScr.''; 
                                    }
    $content .= '       </td>
                    </tr>';
    $content .= '
                    <tr>
                        <td>
                            <h4>DETALLES</h4>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div>
                                <table id="dtable1" class="display compact" cellspacing="0" cellpadding="5" width="100%" border="1">
                                    <thead>
                                        <tr bgcolor="teal" style="color: white">
                                            <th width="20">#</th>
                                            <th align="center">Lineas</th>
                                            <th align="center" width="250">Productos</th>
                                            <th align="center" width="40">Cant</th>
                                            <th align="center">Costo Total</th>
                                            <th align="center">Precio Sin IGV</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                        $i = 1;
                                        foreach($this->model->ListDetVnt($r->CodVnt) as $r):
    $content .= '
                                        <tr>
                                            <td width="20">'.$i++.'</td>
                                            <td align="center">'.$r["NomDetMrc"].'</td>
                                            <td width="250">'.$r["NomProd"].'</td>
                                            <td align="center" width="40">'.$r["CntDetVnt"].'</td>
                                            <td align="center">'.number_format($r["CstTot"],2).'</td>
                                            <td align="center">'.number_format($r["PTSigv"],2).'</td>
                                        </tr>';
                                        endforeach;
    $content .= '
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
    ';
    endforeach; 


$pdf->writeHTML($content, true, 0, true, 0);

$pdf->lastPage();
$pdf->Output();
