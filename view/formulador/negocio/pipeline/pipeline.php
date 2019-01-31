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
                <div class="email"><?php echo $user = $objses->get('NomCrg'); ?> <?php echo $user = $objses->get('EqpPrf'); ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="perfilformulador"><i class="material-icons">person</i>Mi Perfil</a></li>
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
                    <a href="clienteformulador">
                        <i class="material-icons">account_balance</i>
                        <span>Clientes</span>
                    </a>
                </li>
                <li class="active">
                   <a href="pipelineformulador">
                        <i class="material-icons">assignment</i>
                        <span>Pipeline</span>
                   </a>
                </li>
                <li>
                    <a href="forecastformulador">
                        <i class="material-icons">poll</i>
                        <span>Forecast</span>
                    </a>
                </li>
                <li>
                    <a href="reportesform">
                        <i class="material-icons">trending_up</i>
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
                                <li><a href="pipelineformulador"><i class="material-icons">assignment</i> Pipeline</a></li>
                            </ol>
                        </div>  
                        <div class="body table-responsive">
                            <table id="dtable" class="display compact" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th># Carpeta</th>
                                        <th>Cliente </th>
                                        <th>Producto</th>
                                        <th>Alias</th>
                                        <th>Fecha Estimada de OC</th>
                                        <th>Score</th>
                                        <th>Etapa de venta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($this->model->ListPipPrf($iduser = $objses->get('CodEmp') , $iduser = $objses->get('CodPrf')) as $r): ?>
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
                                        <td><?php echo $r->AliVnt; ?></td>
                                        <td align="center"><?php 
                                            $start_date = $r->Q1IQua;
                                            $end_date = $r->Q1FQua;
                                            $start_date2 = $r->Q2IQua;
                                            $end_date2 = $r->Q2FQua;
                                            $start_date3 = $r->Q3IQua;
                                            $end_date3 = $r->Q3FQua;
                                            $fecha_a_evaluar = $r->FocVnt;

                                            if ($this->model->check_in_range($start_date, $end_date, $fecha_a_evaluar)) {
                                                echo "Quarter I";
                                            }
                                            elseif ($this->model->check_in_range($start_date2, $end_date2, $fecha_a_evaluar)) {
                                                echo "Quarter II";
                                            } 
                                            elseif ($this->model->check_in_range($start_date3, $end_date3, $fecha_a_evaluar)) {
                                                echo "Quarter III";
                                            }  
                                            else {
                                                echo "Quarter IV";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php if ($r->NumScr =="0") echo "0";
                                                  else if ($r->NumScr =="0."+$r->NumScr) echo "0."+$r->NumScr;
                                                  else echo $r->NumScr;
                                            ?>
                                        </td>
                                        <td align="center"> 
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
                                    </tr>
                                    <?php endforeach; ?>
                                </tfoot>
                            </table>
                            <?php foreach($this->model->ListPipPrf($iduser = $objses->get('CodEmp') , $iduser = $objses->get('CodPrf')) as $r): ?>
                                <div class="modal fade" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" id="verpip-<?php echo $r->CodVnt; ?>" role="dialog">
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
                                                                <td align="right">
                                                                    <span data-toggle='tooltip' data-placement="bottom" title='Generar PDF'>
                                                                        <a class="btn bg-grey btn-xs" target="_blank" href="pdf&a=PdfNegForm&CodVnt=<?php echo $r->CodVnt; ?>">
                                                                            <i class="material-icons">print</i>
                                                                        </a>
                                                                    </span>
                                                                </td>
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
                                                                        echo "Quarter I";
                                                                    }
                                                                    elseif ($this->model->check_in_range($start_date2, $end_date2, $fecha_a_evaluar)) {
                                                                        echo "Quarter II";
                                                                    } 
                                                                    elseif ($this->model->check_in_range($start_date3, $end_date3, $fecha_a_evaluar)) {
                                                                        echo "Quarter III";
                                                                    }  
                                                                    else {
                                                                        echo "Quarter IV";
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th width="150">Costo Total</th>
                                                                <td width="25">:</td>
                                                                <?php $i = 1; ?>
                                                                <?php foreach($this->model->ListPipPrc($r->CodVnt) as $row): ?>
                                                                    <td> <?php echo number_format($row->CtoFin,2); ?></td>
                                                                <?php endforeach; ?>
                                                            </tr>
                                                            <?php foreach($this->model->ListDetTot($r->CodVnt) as $fila): ?>
                                                                <?php if($fila["EstDetTot"] == '1'){ ?>
                                                                    <tr>
                                                                        <th width="150">Precio Sin IGV</th>
                                                                        <td width="25">:</td>
                                                                        <?php $i = 1; ?>
                                                                        <?php foreach($this->model->ListPipPrc($r->CodVnt) as $row): ?>
                                                                            <td> <?php echo number_format($row->PreSIgv,2); ?> <label style="color:#01579B"><b><i class="material-icons small" style="color:#01579B">done</i></b> AUTO </label>
                                                                            </td>
                                                                        <?php endforeach; ?>
                                                                    </tr>
                                                                <?php }  else { ?>
                                                                    <tr>
                                                                        <th width="150">Precio Sin IGV</th>
                                                                        <td width="25">:</td>
                                                                        <td> <?php echo number_format($fila["SbTDetTot"],2) ?> <label style="color:#1B5E20"><b><i class="material-icons small" style="color:#1B5E20">done</i></b> MANUAL </label>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                            <tr>
                                                                <th width="150">% Utilidad Bruta</th>
                                                                <td width="25">:</td>
                                                                <?php $i = 1; ?>
                                                                <?php foreach($this->model->ListPipPrc($r->CodVnt) as $row): ?>
                                                                    <td><?php echo $row->PrcUtl; ?>%</td>
                                                                <?php endforeach; ?>
                                                            </tr>
                                                            <tr>
                                                                <th width="150">Score</th>
                                                                <td width="25">:</td>
                                                                <tr>                                            
                                                                    <th width="150"></th>
                                                                    <td width="25"></td>
                                                                    <td>
                                                                        <input type="text" class="knob" value="
                                                                                <?php if ($r->NumScr =="0") echo "0";
                                                                                      else if ($r->NumScr =="0."+$r->NumScr) echo "0."+$r->NumScr;
                                                                                      else echo $r->NumScr;
                                                                                ?>" 
                                                                        data-linecap="round" data-width="50" data-height="50" data-thickness="0.25" data-fgColor="#F44336" data-anglearc="250" data-angleoffset="-125" data-min = "0"  data-max = "5" readonly>
                                                                    </td>
                                                                </tr>
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
                                                                                        <td align="center"><?php echo $i++ ?></td>
                                                                                        <td align="center"><?php echo $r["NomDetMrc"] ?></td>
                                                                                        <td><?php echo $r["NomProd"] ?></td>
                                                                                        <td align="center"><?php echo $r["CntDetVnt"] ?></td>
                                                                                        <td align="right">
                                                                                            <?php if ($r["CstTot"]=="0") echo number_format("0.00",2);
                                                                                                  else echo number_format($r["CstTot"],2)
                                                                                            ?>
                                                                                        </td>
                                                                                        <td align="right">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
