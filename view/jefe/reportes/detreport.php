    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="card">
                        <div class="header">
                            <ol class="breadcrumb breadcrumb-col-red">
                                <li><a href="reportesjefe"><i class="material-icons">assessment</i> Reporte - Efectividad del vendedor</a></li>
                                <li class="active"><i class="material-icons">assignment</i> Detalle</li>
                            </ol>
                        </div> 
                        <div class="body table-responsive">
                            <form id="sign_in" action="pdf&a=PdfSeg" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="TxtCodEmp" value="<?php echo $Seg->TxtCodEmp; ?>" />
                                <input type="hidden" name="TxtFIni" value="<?php echo $Seg->TxtFIni; ?>" />
                                <input type="hidden" name="TxtFFin" value="<?php echo $Seg->TxtFFin; ?>" />
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th width="150"></th>
                                            <td width="25"></td>
                                            <td align="right">
                                                <span data-toggle='tooltip' data-placement="left" title='Ver Grafico'>
                                                    <a class='btn bg-red btn-xs' data-toggle="modal" data-target="#viewreport">
                                                    <i class='material-icons'>pie_chart</i>
                                                    </a>
                                                </span>
                                                <span data-toggle='tooltip' data-placement="left" title='Generar PDF'>
                                                    <button type="submit" class="btn bg-indigo btn-xs waves-effect">
                                                        <i class="material-icons">print</i>
                                                    </button>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="120">Empleado</th>
                                            <td width="25">:</td>
                                            <td>
                                            <?php if($Seg->TxtCodEmp == '0'){
                                                        echo 'Todos';
                                                        }
                                                  else {  ?>
                                                    <?php if($user = $objses->get('NomPrf') == 'jefe-comercial1') { 
                                                    foreach($this->model->ListEmpIAL() as $row): ?>
                                                        <?php if($row->CodEmp==$Seg->TxtCodEmp) echo $row->NomApeEmp; ?>
                                                <?php endforeach; } 
                                                    else { 
                                                    foreach($this->model->ListEmpCC() as $row): ?>
                                                        <?php if($row->CodEmp==$Seg->TxtCodEmp) echo $row->NomApeEmp; ?>
                                                <?php endforeach; } ?> 
                                            <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="120">Periodo</th>
                                            <td width="25">:</td>
                                            <td><?php echo $Seg->TxtFIni; ?> - <?php echo $Seg->TxtFFin; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="120">Estado</th>
                                            <td width="25">:</td>
                                            <td>Venta Concluida</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <table id="dtable" class="display compact" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th># Carpeta</th>
                                        <th>Cliente </th>
                                        <th>Producto</th>
                                        <th>Estado</th>
                                        <th>Proceso</th>
                                        <th>Fecha Est. de OC</th>
                                        <th>Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($this->model->RepListEft($Seg->TxtCodEmp, $Seg->TxtFIni, $Seg->TxtFFin) as $r): ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td>
                                            <span data-toggle='tooltip' data-placement="right" title='Ver detalle pipeline: <?php echo $r->CptVnt; ?>'>
                                                <a href="" data-toggle="modal" data-target="#verpip-<?php echo $r->CodVnt; ?>">
                                                    <?php echo $r->CptVnt; ?>
                                                </a>
                                            </span>
                                        </td>
                                        <td><?php echo $r->NomCli; ?></td>
                                        <td><?php echo $r->NomProd; ?></td>
                                        <td>
                                            <?php
                                                if($r->CodEstVnt =='1'){
                                                    echo "<span class='label bg-lime'>Pendiente</span>";
                                                        } 
                                                elseif($r->CodEstVnt =='2') {
                                                    echo "<span class='label bg-pink'>Seguimiento</span>";
                                                        }
                                                elseif($r->CodEstVnt =='3') {
                                                    echo "<span class='label bg-light-green'>Contactado</span>";
                                                        }
                                                elseif($r->CodEstVnt =='4') {
                                                    echo "<span class='label bg-brown'>Programado</span>";
                                                        }
                                                elseif($r->CodEstVnt =='5'){
                                                    echo "<span class='label bg-indigo'>Visita</span>";
                                                        }
                                                elseif($r->CodEstVnt =='6'){
                                                    echo "<span class='label bg-red'>Perdido</span>";
                                                        }
                                                else{
                                                    echo "<span class='label bg-teal'>Concluido</span>";
                                                        }
                                                ?>
                                        </td>
                                        <td>
                                            
                                            <?php 
                                                if($r->CodAvn =='1'){
                                                echo "<span class='label bg-orange'>Primer Contacto</span>";
                                                    }
                                            elseif($r->CodAvn =='2') {
                                                echo "<span class='label bg-purple'>Propuesta Tecnica/Económica</span>";
                                                    }
                                            elseif($r->CodAvn =='3') {
                                                echo "<span class='label bg-blue'>Negociación</span>";
                                                    }
                                            else{
                                                echo "<span class='label bg-green'>Cierre</span>";
                                                    }
                                            ?>
                                        </td>
                                        <td><?php 
                                            $start_date = $r->Q1IQua;
                                            $end_date = $r->Q1FQua;
                                            $start_date2 = $r->Q2IQua;
                                            $end_date2 = $r->Q2FQua;
                                            $start_date3 = $r->Q3IQua;
                                            $end_date3 = $r->Q3FQua;
                                            $fecha_a_evaluar = $r->FocVnt;

                                            if ($this->model->check_in_range($start_date, $end_date, $fecha_a_evaluar)) {
                                                echo $r->FocVnt.' / '."Quarter I";
                                            }
                                            elseif ($this->model->check_in_range($start_date2, $end_date2, $fecha_a_evaluar)) {
                                                echo $r->FocVnt.' / '."Quarter II";
                                            } 
                                            elseif ($this->model->check_in_range($start_date3, $end_date3, $fecha_a_evaluar)) {
                                                echo $r->FocVnt.' / '."Quarter III";
                                            }  
                                            else {
                                                echo $r->FocVnt.' / '."Quarter IV";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php if ($r->NumScr =="0") echo "0";
                                                  else if ($r->NumScr =="0."+$r->NumScr) echo "0."+$r->NumScr;
                                                  else echo $r->NumScr;
                                            ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tfoot>
                            </table>
                            <?php foreach($this->model->RepListEft($Seg->TxtCodEmp, $Seg->TxtFIni, $Seg->TxtFFin) as $r): ?>
                                <div class="modal fade" id="verpip-<?php echo $r->CodVnt; ?>" role="dialog">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-teal">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title text-center" id="producto">DETALLE PIPELINE - <strong><?php echo $r->CptVnt; ?></strong></h4>
                                            </div>
                                            <form id="sign_in" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <table id="dtable" class="display compact" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th width="15">#</th>
                                                                <th width="20">Rol del Stakeholder</th>
                                                                <th width="20">Stakeholder</th>
                                                                <th width="20"># Télefono o Móvil</th>
                                                                <th width="20">Horario de Inicio</th>
                                                                <th width="20">Horario de Fin</th>
                                                                <th width="20">Titulo</th>
                                                                <th width="20">Evento</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 1; ?>
                                                            <?php foreach($this->model->ListAgn($r->CodVnt) as $r): ?>
                                                            <tr>
                                                                <td><?php echo $i++ ?></td>
                                                                <td>
                                                                <?php 
                                                                        if($r["CodRol"] =='1'){
                                                                        echo "<span class='label bg-orange'>Decisor</span>";
                                                                            }
                                                                    elseif($r["CodRol"] =='2') {
                                                                        echo "<span class='label bg-purple'>Usuario Final</span>";
                                                                            }
                                                                    elseif($r["CodRol"] =='3') {
                                                                        echo "<span class='label bg-blue'>Recomendador Técnico</span>";
                                                                            }
                                                                    elseif($r["CodRol"] =='4') {
                                                                        echo "<span class='label bg-green'>Influenciador</span>";
                                                                            }
                                                                    elseif($r["CodRol"] =='5') {
                                                                        echo "<span class='label bg-deep-purple'>Sponsor</span>";
                                                                            }
                                                                    else{
                                                                        echo "<span class='label bg-red'>Coach</span>";
                                                                            }
                                                                    ?>
                                                                </td>
                                                                <td><?php echo $r["NomStk"] ?></td>
                                                                <td><?php echo $r["TlfStk"] ?></td>
                                                                <td><?php echo $r["FIniAgn"] ?></td>
                                                                <td><?php echo $r["FFinAgn"] ?></td>
                                                                <td><?php echo $r["DscTAgn"] ?></td>
                                                                <td><?php echo $r["DscFAgn"] ?></td>
                                                            </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <center>
                                                        <button type="button" class="btn bg-red btn-xs waves-effect" data-dismiss="modal">
                                                            <i class="material-icons">close</i>
                                                            <span>CERRAR</span>
                                                        </button>  
                                                    </center>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> 
                            <?php endforeach; ?>
                            <?php foreach($this->model->RepListEft($Seg->TxtCodEmp, $Seg->TxtFIni, $Seg->TxtFFin) as $r): ?>
                                <div class="modal fade" id="viewreport" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-teal">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title text-center" id="producto"><strong>GRAFICO DE EFECTIVIDAD DEL EMPLEADO</strong></h4>
                                            </div>
                                            <form id="sign_in" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="body">
                                                        <div class="card">
                                                            <div class="body">
                                                                <div id="container2" style="min-width: 150px; max-width: 500px; height: 250px; margin: 10 auto;"></div>
                                                                <script type="text/javascript">
                                                                    Highcharts.chart('container2', {
                                                                        chart: {
                                                                            type: 'pie',
                                                                            options3d: {
                                                                                enabled: true,
                                                                                alpha: 55,
                                                                                beta: 0
                                                                            }
                                                                        },
                                                                        title: {
                                                                            text: '<span style="font-size:12px">GRAFICO</span>'
                                                                        },
                                                                        tooltip: {
                                                                            pointFormat: '<b>{point.y:.0f}%</b>'
                                                                        },
                                                                        plotOptions: {
                                                                            pie: {
                                                                                allowPointSelect: true,
                                                                                cursor: 'pointer',
                                                                                depth: 35,
                                                                                dataLabels: {
                                                                                    enabled: true,
                                                                                    format: '{point.y:.0f}%'
                                                                                },
                                                                                showInLegend: true
                                                                            },
                                                                        },
                                                                        series: [{
                                                                            type: 'pie',
                                                                            data: [
                                                                                {
                                                                                    name: 'Efectividad',
                                                                                    <?php foreach($this->model->RepEstEft($Seg->TxtCodEmp, $Seg->TxtFIni, $Seg->TxtFFin) as $r): ?>
                                                                                        y: <?php echo $r->Efectividad; ?>,
                                                                                    <?php endforeach; ?>
                                                                                    color: {
                                                                                        linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
                                                                                        stops: [
                                                                                           [0, 'rgba(50, 140, 216,0.5)'],
                                                                                           [1, 'rgba(50, 140, 216,0.5)']
                                                                                        ]
                                                                                    }
                                                                                },
                                                                                {
                                                                                    name: 'No Efectivo',
                                                                                    <?php foreach($this->model->RepEstNOEft($Seg->TxtCodEmp, $Seg->TxtFIni, $Seg->TxtFFin) as $r): ?>
                                                                                        y: <?php echo $r->Efectividad; ?>,
                                                                                    <?php endforeach; ?>
                                                                                    color: {
                                                                                        linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
                                                                                        stops: [
                                                                                           [0, 'rgba(0,255,0,0.5)'],
                                                                                           [1, 'rgba(0,255,0,0.5)']
                                                                                        ]
                                                                                    }
                                                                                }
                                                                            ]
                                                                        }]
                                                                    });
                                                                </script>
                                                            </div>
                                                        </div>
                                                        <form id="sign_in" action="pdf&a=PdfSeg" method="post" enctype="multipart/form-data">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <th width="120"># de Ventas</th>
                                                                        <td width="25">:</td>
                                                                        <td>
                                                                            <?php foreach($this->model->RepEstCount1($Seg->TxtCodEmp, $Seg->TxtFIni, $Seg->TxtFFin) as $r): ?>
                                                                                    <?php echo $r->NumVentas; ?>
                                                                            <?php endforeach; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="120"># de Visitas</th>
                                                                        <td width="25">:</td>
                                                                        <td>
                                                                            <?php foreach($this->model->RepEstCount2($Seg->TxtCodEmp, $Seg->TxtFIni, $Seg->TxtFFin) as $r): ?>
                                                                                    <?php echo $r->NumVisitas; ?>
                                                                            <?php endforeach; ?>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <center>
                                                        <button type="button" class="btn bg-red btn-xs waves-effect" data-dismiss="modal">
                                                            <i class="material-icons">close</i>
                                                            <span>CERRAR</span>
                                                        </button>  
                                                    </center>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> 
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
