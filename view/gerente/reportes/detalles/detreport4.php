<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="assets/fotos/<?php echo $user = $objses->get('FotEmp'); ?>" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $user = $objses->get('NomEmp'); ?> <?php echo $user = $objses->get('ApeEmp'); ?></div>
                <div class="email"><?php echo $user = $objses->get('NomCrg'); ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="perfiljefe"><i class="material-icons">person</i>Mi Perfil</a></li>
                        <li role="seperator" class="divider"></li>
                        <li><a href="javascript:void(0);" class="btn-exit"><i class="material-icons">input</i>Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </div>           
        <!-- #User Info -->
        <!-- Menu -->
         <div class="menu">
            <ul class="list">
                <li>
                    <a href="seguimientogerente">
                        <i class="material-icons">trending_up</i>
                        <span>Seguimiento</span>
                    </a>
                </li>
                <li class="active">
                    <a href="reportesgerente">
                        <i class="material-icons">assessment</i>
                        <span>Reportes</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2017-2018  <a target="_blank" href="http://www.enviroequip.pe/">Enviroequip S.A</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.0
            </div>
        </div>
                
        <!-- #Footer -->
    </aside>
    <!-- #END# Right Sidebar -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="card">
                        <div class="header">
                            <ol class="breadcrumb breadcrumb-col-red">
                                <li><a href="reportesgerente"><i class="material-icons">assessment</i> Reportes</a></li>
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
                                            <th width="150"><strong class="label bg-orange">Rentabilidad de la empresa</strong></th>
                                            <td width="25"></td>
                                            <td align="right">
                                                <span data-toggle='tooltip' data-placement="left" title='Ver Grafico Total'>
                                                    <a class='btn bg-red btn-xs' data-toggle="modal" data-target="#viewreport1">
                                                    <i class='material-icons'>graphic_eq</i>
                                                    </a>
                                                </span>
                                                <span data-toggle='tooltip' data-placement="bottom" title='Ver Grafico Fecha'>
                                                    <a class='btn bg-green btn-xs' data-toggle="modal" data-target="#viewreport2">
                                                    <i class='material-icons'>view_quilt</i>
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
                                                    <?php foreach($this->model->ListEmpGe() as $row): ?>
                                                        <?php if($row->CodEmp==$Seg->TxtCodEmp) echo $row->NomApeEmp; ?>
                                                    <?php endforeach; } ?> 
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
                                            <td>
                                                <?php 
                                                    if($Seg->TxtIndicador =='0'){
                                                    echo "<span>Todos</span>";
                                                        }
                                                elseif($Seg->TxtIndicador =='1') {
                                                    echo "<span>En Desarrollo</span>";
                                                        }
                                                elseif($Seg->TxtIndicador =='2') {
                                                    echo "<span>Concluido</span>";
                                                        }
                                                else{
                                                    echo "<span>Perdido</span>";
                                                        }
                                                ?>    
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <table id="dtable" class="display compact" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Empleado</th>
                                        <th># Carpeta</th>
                                        <th>Cliente </th>
                                        <th>Costo Total </th>
                                        <th>P. Sin IGV </th>
                                        <th>Rentabilidad </th>
                                        <th>Estado</th>
                                        <th>Proceso</th>
                                        <th>Fecha Est. de OC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($this->model->RentList3($Seg->TxtFIni, $Seg->TxtFFin, $Seg->TxtIndicador) as $r): ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo "<span class='label bg-green'>".$r->NomApeEmp."</span>"; ?></td>
                                        <td>
                                            <span data-toggle='tooltip' data-placement="right" title='Ver detalle pipeline: <?php echo $r->CptVnt; ?>'>
                                                <a href="" data-toggle="modal" data-target="#verpip-<?php echo $r->CodVnt; ?>">
                                                    <?php echo $r->CptVnt; ?>
                                                </a>
                                            </span>
                                        </td>
                                        <td><?php echo $r->NomCli; ?></td>   
                                        <td> <?php echo number_format($r->CtoFin,2); ?></td>
                                        <td> <?php echo number_format($r->PreSIgv,2); ?></td>
                                        <td><?php echo $r->PrcUtl; ?>%</td>
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
                                    </tr>
                                    <?php endforeach; ?>
                                </tfoot>
                            </table>
                            <?php foreach($this->model->RentList3($Seg->TxtFIni, $Seg->TxtFFin, $Seg->TxtIndicador) as $r): ?>
                                <div class="modal fade" id="verpip-<?php echo $r->CodVnt; ?>" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-teal">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title text-center" id="producto">DETALLE PIPELINE - <strong><?php echo $r->CptVnt; ?></strong></h4>
                                            </div>
                                            <form id="sign_in" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <th width="150">
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
                                                                </th>
                                                                <td width="25"></td>
                                                                <div class="col-md-6 hidden">
                                                                    <b>Perfil</b>
                                                                    <div class="input-group form-float form-group-sm">
                                                                        <span class="input-group-addon">
                                                                            <i class="material-icons">today</i>
                                                                        </span>
                                                                        <div class="form-line">
                                                                            <input type="text" name="TxtCodPrf" class="datepicker form-control" value="<?php echo $r->CodPrf; ?>" maxlength="10" minlength="5" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <td align="right">
                                                                    <span data-toggle='tooltip' data-placement="bottom" title='Generar PDF'>
                                                                        <a class="btn bg-grey btn-xs" target="_blank" href="pdf&a=PdfSegGe&CodVnt=<?php echo $r->CodVnt; ?>">
                                                                            <i class="material-icons">print</i>
                                                                        </a>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th width="150">Empleado</th>
                                                                <td width="25">:</td>
                                                                <td><?php echo $r->NomApeEmp; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th width="150"># Carpeta</th>
                                                                <td width="25">:</td>
                                                                <td><?php echo $r->CptVnt; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th width="150">Cliente</th>
                                                                <td width="25">:</td>
                                                                <td><?php echo $r->NomCli; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th width="150">Solución</th>
                                                                <td width="25">:</td>
                                                            </tr>
                                                            <?php $i = 1; ?>
                                                            <?php foreach($this->model->ObtProdList($r->CodVnt) as $row): ?>
                                                            <tr>                                            
                                                                <th width="150"></th>
                                                                <td width="25"><?php echo $i++ ?>)</td>
                                                                <td><?php echo $row["NomProd"] ?></td>
                                                            </tr>
                                                            <?php endforeach; ?>
                                                            <tr>
                                                                <th width="150">Fecha Estimada de OC</th>
                                                                <td width="25">:</td>
                                                                <td>
                                                                    <?php 
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
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3">
                                                                    <ul class="nav nav-tabs tab-col-teal" role="tablist">
                                                                        <li role="presentation" class="active">
                                                                            <a>DETALLE PRECIOS</a>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="tab-content">
                                                                        <div role="tabpanel" class="tab-pane animated flipInX active" id="detalleprc">
                                                                            <table id="dtable" class="display compact" cellspacing="0" width="100%">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>#</th>
                                                                                        <th>Lineas</th>
                                                                                        <th>Productos</th>
                                                                                        <th>Cant</th>
                                                                                        <th>Costo Total</th>
                                                                                        <th>P.T SIGV</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php $i = 1; ?>
                                                                                    <?php foreach($this->model->ListDetVnt($r->CodVnt) as $r): ?>
                                                                                    <tr>
                                                                                        <td><?php echo $i++ ?></td>
                                                                                        <td><?php echo $r["NomDetMrc"] ?></td>
                                                                                        <td><?php echo $r["NomProd"] ?></td>
                                                                                        <td><?php echo $r["CntDetVnt"] ?></td>
                                                                                        <td>
                                                                                            <?php if ($r["CstTot"]=="0") echo number_format("0.00",2);
                                                                                                  else echo number_format($r["CstTot"],2)
                                                                                            ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php if ($r["PTSigv"]=="0") echo number_format("0.00",2);
                                                                                                  else echo number_format($r["PTSigv"],2)
                                                                                            ?>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <?php endforeach; ?>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
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
                            <?php foreach($this->model->RentGraf3($Seg->TxtFIni, $Seg->TxtFFin, $Seg->TxtIndicador) as $r): ?>
                                <div class="modal fade" id="viewreport1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-teal">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title text-center" id="producto"><strong>GRAFICO DE RENTABILIDAD</strong></h4>
                                            </div>
                                            <form id="sign_in" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="body">
                                                        <div class="card">
                                                            <div class="body">
                                                                <div id="container" style="min-width: 150px; max-width: 500px; height: 300px; margin: 10 auto;"></div>
                                                                <script type="text/javascript">
                                                                    var chart = Highcharts.chart('container', {

                                                                        chart: {
                                                                            type: 'column',
                                                                            options3d: {
                                                                                enabled: true,
                                                                                alpha: 10,
                                                                                beta: 25,
                                                                                depth: 70
                                                                            }
                                                                        },

                                                                        title: {
                                                                            text: '<span style="font-size:12px">RENTABILIDAD</span>'
                                                                        },

                                                                        legend: {
                                                                            align: 'center',
                                                                            verticalAlign: 'bottom',
                                                                            layout: 'horizontal'
                                                                        },

                                                                        plotOptions: {
                                                                            series: {
                                                                                borderWidth: 0,
                                                                                dataLabels: {
                                                                                    enabled: true,
                                                                                    format: '{point.y:,.2f}'
                                                                                }
                                                                            }
                                                                        },

                                                                        xAxis: {
                                                                            categories: [' ', ' ', ' '],
                                                                            labels: {
                                                                                x: -10
                                                                            }
                                                                        },

                                                                        yAxis: {
                                                                            allowDecimals: false,
                                                                            title: {
                                                                                text: ''
                                                                            }
                                                                        },

                                                                        tooltip: {
                                                                            pointFormat: '<span style="color:{point.color}">{series.name}{point.name}</span><b> : {point.y:,.2f}</b>'
                                                                        },

                                                                        series: [{
                                                                            name: 'Costo Total',
                                                                            data: 
                                                                                    [<?php echo $r->CtoFin; ?>],
                                                                            color: {
                                                                                linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
                                                                                stops: [
                                                                                   [0, 'rgba(255,0,0,0.5)'],
                                                                                   [1, 'rgba(255,0,0,0.5)']
                                                                                ]
                                                                            }
                                                                        }, {
                                                                            name: 'Precio Sin IGV Total',
                                                                            data: 
                                                                                    [<?php echo $r->PreSIgv; ?>],
                                                                            color: {
                                                                                linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
                                                                                stops: [
                                                                                   [0, 'rgba(255,255,0,0.5)'],
                                                                                   [1, 'rgba(255,255,0,0.5)']
                                                                                ]
                                                                            }
                                                                        }, {
                                                                            name: 'Rentabilidad Total',
                                                                            data: 
                                                                                    [<?php echo $r->PrcUtl; ?>],
                                                                            borderWidth: 0,
                                                                            dataLabels: {
                                                                                        enabled: true,
                                                                                        format: '{point.y:0f}%'
                                                                                    },
                                                                            tooltip: {
                                                                                pointFormat: '<span style="color:{point.color}">{series.name}{point.name}</span><b> : {point.y:0f}%</b>'
                                                                            },
                                                                            color: {
                                                                                linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
                                                                                stops: [
                                                                                   [0, 'rgba(0,255,0,0.5)'],
                                                                                   [1, 'rgba(0,255,0,0.5)']
                                                                                ]
                                                                            }
                                                                        }]
                                                                    });
                                                                </script>
                                                            </div>
                                                        </div>
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
                            <div class="modal fade" id="viewreport2" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-teal">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="producto"><strong>GRAFICO DE RENTABILIDAD X FECHAS</strong></h4>
                                        </div>
                                        <form id="sign_in" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="body">
                                                    <div class="card">
                                                        <div class="body">
                                                            <div id="container2" style="min-width: 250px; max-width: 1000px; height: 300px; margin: 10 auto;"></div>
                                                            <script type="text/javascript">
                                                                var chart = Highcharts.chart('container2', {
                                                                    
                                                                    chart: {
                                                                        type: 'column',
                                                                        options3d: {
                                                                            enabled: false,
                                                                            alpha: 10,
                                                                            beta: 25,
                                                                            depth: 70
                                                                        }
                                                                    },

                                                                    title: {
                                                                        text: '<span style="font-size:12px">RENTABILIDAD X FECHAS</span>'
                                                                    },

                                                                    legend: {
                                                                        align: 'center',
                                                                        verticalAlign: 'bottom',
                                                                        layout: 'horizontal'
                                                                    },

                                                                    plotOptions: {
                                                                        series: {
                                                                            borderWidth: 0,
                                                                            dataLabels: {
                                                                                enabled: true,
                                                                                format: '{point.y:,.2f}'
                                                                            }
                                                                        }
                                                                    },

                                                                    xAxis: {
                                                                        type: 'datetime',
                                                                        labels: {
                                                                            format: '{value:%d/%m/%Y}',
                                                                            rotation: 45,
                                                                            align: 'left'
                                                                        }
                                                                    },

                                                                    yAxis: {
                                                                        allowDecimals: false,
                                                                        title: {
                                                                            text: ''
                                                                        }
                                                                    },

                                                                    tooltip: {
                                                                        pointFormat: '<span style="color:{point.color}">{series.name}{point.name}</span><b> : {point.y:,.2f}</b>'
                                                                    },

                                                                    series: [{
                                                                        name: 'Costo Total',
                                                                        data: [
                                                                            <?php foreach($this->model->RentList3($Seg->TxtFIni, $Seg->TxtFFin, $Seg->TxtIndicador) as $r): ?>
                                                                                {   x: Date.UTC(<?php echo $r->YearVnt; ?>,<?php echo $r->MonthVnt; ?>,<?php echo $r->DayVnt; ?>),
                                                                                    y: <?php echo $r->CtoFin; ?>},
                                                                            <?php endforeach; ?>
                                                                            ],
                                                                        color: {
                                                                            linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
                                                                            stops: [
                                                                               [0, 'rgba(255,0,0,0.5)'],
                                                                               [1, 'rgba(255,0,0,0.5)']
                                                                            ]
                                                                        }
                                                                    }, {
                                                                        name: 'Precio Sin IGV Total',
                                                                        data:  [
                                                                            <?php foreach($this->model->RentList3($Seg->TxtFIni, $Seg->TxtFFin, $Seg->TxtIndicador) as $r): ?>
                                                                                {   x: Date.UTC(<?php echo $r->YearVnt; ?>,<?php echo $r->MonthVnt; ?>,<?php echo $r->DayVnt; ?>),
                                                                                    y: <?php echo $r->PreSIgv; ?>},
                                                                            <?php endforeach; ?>
                                                                            ],
                                                                        color: {
                                                                            linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
                                                                            stops: [
                                                                               [0, 'rgba(255,255,0,0.5)'],
                                                                               [1, 'rgba(255,255,0,0.5)']
                                                                            ]
                                                                        }
                                                                    }, {
                                                                        name: 'Rentabilidad Total',
                                                                        data:  [
                                                                            <?php foreach($this->model->RentList3($Seg->TxtFIni, $Seg->TxtFFin, $Seg->TxtIndicador) as $r): ?>
                                                                                {   x: Date.UTC(<?php echo $r->YearVnt; ?>,<?php echo $r->MonthVnt; ?>,<?php echo $r->DayVnt; ?>),
                                                                                    y: <?php echo $r->PrcUtl; ?>},
                                                                            <?php endforeach; ?>
                                                                            ],
                                                                        borderWidth: 0,
                                                                        dataLabels: {
                                                                                    enabled: true,
                                                                                    format: '{point.y:0f}%'
                                                                                },
                                                                        tooltip: {
                                                                            pointFormat: '<span style="color:{point.color}">{series.name}{point.name}</span><b> : {point.y:0f}%</b>'
                                                                        },
                                                                        color: {
                                                                            linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
                                                                            stops: [
                                                                               [0, 'rgba(0,255,0,0.5)'],
                                                                               [1, 'rgba(0,255,0,0.5)']
                                                                            ]
                                                                        }
                                                                    }]
                                                                });
                                                            </script>
                                                        </div>
                                                    </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
