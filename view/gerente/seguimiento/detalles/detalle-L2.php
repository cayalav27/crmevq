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
                <li class="active">
                    <a href="seguimientogerente">
                        <i class="material-icons">trending_up</i>
                        <span>Seguimiento</span>
                    </a>
                </li>
                <li>
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
                                <li><a href="seguimientogerente"><i class="material-icons">trending_up</i> Seguimiento</a></li>
                                <li class="active"><i class="material-icons">assignment</i> Detalle</li>
                            </ol>
                        </div> 
                        <div class="body table-responsive">
                            <form id="sign_in" action="pdf&a=PdfSeg" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="TxtCodEmp" value="<?php echo $Seg->TxtCodEmp; ?>" />
                                <input type="hidden" name="TxtCodPrf" value="<?php echo $Seg->TxtCodPrf; ?>" />
                                <input type="hidden" name="TxtFIni" value="<?php echo $Seg->TxtFIni; ?>" />
                                <input type="hidden" name="TxtFFin" value="<?php echo $Seg->TxtFFin; ?>" />
                                <input type="hidden" name="TxtIndicador" value="<?php echo $Seg->TxtIndicador; ?>" />
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th width="150"></th>
                                            <td width="25"></td>
                                            <td align="right">
                                                <span data-toggle='tooltip' data-placement="left" title='Generar PDF'>
                                                    <button type="submit" class="btn bg-indigo btn-xs waves-effect">
                                                        <i class="material-icons">print</i>
                                                    </button>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="120">Consultor</th>
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
                            <table id="dtableListSeg" class="display compact" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th width="80"># Carpeta</th>
                                        <th width="300">Cliente </th>
                                        <th width="100">Consultor</th>
                                        <th width="150">Importe venta</th>
                                        <th width="300">Producto</th>
                                        <th width="100">División</th>
                                        <th width="100">Etapa de la venta</th>
                                        <th width="100">Quarter</th>
                                        <th width="80">Ultimo Contacto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($this->model->SegListEmp2Ge($Seg->TxtFIni, $Seg->TxtFFin, $Seg->TxtIndicador) as $r): ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td>
                                            <?php echo $r->CptVnt; ?>
                                        </td>
                                        <td>
                                            <span data-toggle='tooltip' data-placement="right" title='Ver mas datos'>
                                                <a href="" data-toggle="modal" data-target="#vercli-<?php echo $r->CodCli; ?>" style="color:green">
                                                    <?php echo $r->NomCli; ?>
                                                </a>
                                            </span>
                                        </td>
                                        <td>
                                            <span data-toggle='tooltip' data-placement="bottom" title='Ver formulador'>
                                                <a href="" data-toggle="modal" data-target="#verform-<?php echo $r->CodVnt; ?>">
                                                    <?php echo "<span class='label bg-black'>".$r->NomApeEmp."</span>"; ?>
                                                </a>
                                            </span>
                                        </td>
                                        <td>
                                            <?php echo number_format($r->TotDet,2); ?>
                                        </td>
                                        <td>
                                            <span data-toggle='tooltip' data-placement="bottom" title='Ver detalle de precios'>
                                                <a href="" data-toggle="modal" data-target="#verpip-<?php echo $r->CodVnt; ?>" style="color:red">
                                                    <?php echo $r->NomProd; ?>
                                                </a>
                                            </span>
                                        </td>
                                        <td>
                                            <span data-toggle='tooltip' data-placement="bottom" title='Ver lineas de negocio'>
                                                <a href="" data-toggle="modal" data-target="#verneg-<?php echo $r->CodVnt; ?>" style="color:blue">
                                                    <?php echo $r->NomDiv; ?>
                                                </a>
                                            </span>
                                        </td>
                                        <td>
                                            <?php 
                                                if($r->CodAvn =='1'){
                                            ?> 
                                                <span data-toggle='tooltip' data-placement="bottom" title='Ver avance y duración'>
                                                    <a href="" data-toggle="modal" data-target="#verdur-<?php echo $r->CodVnt; ?>">
                                                        <span class='label bg-orange'>Primer Contacto</span>
                                                    </a>
                                                </span>
                                            <?php   }
                                            elseif($r->CodAvn =='2') {
                                            ?>
                                                <span data-toggle='tooltip' data-placement="bottom" title='Ver avance y duración'>
                                                    <a href="" data-toggle="modal" data-target="#verdur-<?php echo $r->CodVnt; ?>">
                                                        <span class='label bg-purple'>Propuesta Tecnica/Económica</span>
                                                    </a>
                                                </span>
                                            <?php   }
                                            elseif($r->CodAvn =='3') {
                                            ?>
                                                <span data-toggle='tooltip' data-placement="bottom" title='Ver avance y duración'>
                                                    <a href="" data-toggle="modal" data-target="#verdur-<?php echo $r->CodVnt; ?>">
                                                        <span class='label bg-blue'>Negociación</span>
                                                    </a>
                                                </span>
                                            <?php   }
                                            else{
                                            ?>
                                                <span data-toggle='tooltip' data-placement="bottom" title='Ver avance y duración'>
                                                    <a href="" data-toggle="modal" data-target="#verdur-<?php echo $r->CodVnt; ?>">
                                                        <span class='label bg-green'>Cierre</span>
                                                    </a>
                                                </span>
                                            <?php   }
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
                                                echo "Quarter I".' - '.$r->FocVnt; 
                                            }
                                            elseif ($this->model->check_in_range($start_date2, $end_date2, $fecha_a_evaluar)) {  
                                                echo "Quarter II".' - '.$r->FocVnt; 
                                            } 
                                            elseif ($this->model->check_in_range($start_date3, $end_date3, $fecha_a_evaluar)) {  
                                                echo "Quarter III".' - '.$r->FocVnt; 
                                            }  
                                            else {  
                                                echo "Quarter IV".' - '.$r->FocVnt; 
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <span data-toggle='tooltip' data-placement="bottom" title='Ver contactos y stakeholder'>
                                                <a href="" data-toggle="modal" data-target="#verstk-<?php echo $r->CodVnt; ?>" style="color:brown">
                                                    <?php echo $r->FupVnt; ?>
                                                </a>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="10" style="text-align:right" id="number2">Total:</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <?php foreach($this->model->SegListEmp2Ge($Seg->TxtFIni, $Seg->TxtFFin, $Seg->TxtIndicador) as $r): ?>
                            <div class="modal fade" id="verpip-<?php echo $r->CodVnt; ?>" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-teal">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="producto">COSTOS Y UTILIZADES - <strong><?php echo $r->CptVnt; ?></strong></h4>
                                        </div>
                                        <form id="sign_in" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="body table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <th width="150">Costo Total</th>
                                                                <td width="25">:</td>
                                                                <?php $i = 1; ?>
                                                                <?php foreach($this->model->ListPipPrc($r->CodVnt) as $row): ?>
                                                                    <td> <?php echo number_format($row->CtoFin,2); ?></td>
                                                                <?php endforeach; ?>
                                                            </tr>
                                                            <tr>
                                                                <th width="150">Precio Sin IGV</th>
                                                                <td width="25">:</td>
                                                                <?php $i = 1; ?>
                                                                <?php foreach($this->model->ListPipPrc($r->CodVnt) as $row): ?>
                                                                    <td> <?php echo number_format($row->PreSIgv,2); ?></td>
                                                                <?php endforeach; ?>
                                                            </tr>
                                                            <tr>
                                                                <th width="150">% Utilidad Bruta</th>
                                                                <td width="25">:</td>
                                                                <?php $i = 1; ?>
                                                                <?php foreach($this->model->ListPipPrc($r->CodVnt) as $row): ?>
                                                                    <td><?php echo $row->PrcUtl; ?>%</td>
                                                                <?php endforeach; ?>
                                                            </tr>
                                                            <!--tr>
                                                                <th width="150">Score</th>
                                                                <td width="25">:</td>
                                                                <tr>                                            
                                                                    <th width="150"></th>
                                                                    <td width="25"></td>
                                                                    <td>
                                                                        <input type="text" class="knob" value="
                                                                                <?php /* if ($r->NumScr =="0") echo "0";
                                                                                      else if ($r->NumScr =="0."+$r->NumScr) echo "0."+$r->NumScr;
                                                                                      else echo $r->NumScr;
                                                                                */?>" 
                                                                        data-linecap="round" data-width="50" data-height="50" data-thickness="0.25" data-fgColor="#F44336" data-anglearc="250" data-angleoffset="-125" data-min = "0"  data-max = "5" readonly>
                                                                    </td>
                                                                </tr>
                                                            </tr-->
                                                            <tr>
                                                                <td colspan="3">
                                                                    <ul class="nav nav-tabs tab-col-teal" role="tablist">
                                                                        <li role="presentation" class="active">
                                                                            <a>LISTA</a>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="tab-content">
                                                                        <div role="tabpanel" class="tab-pane animated flipInX active" id="detalleprc">
                                                                            <table class="table display compact" cellspacing="0" width="100%">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>#</th>
                                                                                        <th>Lineas</th>
                                                                                        <th>Productos</th>
                                                                                        <th>Cantidad</th>
                                                                                        <th>Costo Total</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php $i = 1; ?>
                                                                                    <?php foreach($this->model->ListDetVnt($r->CodVnt) as $row): ?>
                                                                                    <tr>
                                                                                        <td><?php echo $i++ ?></td>
                                                                                        <td><?php echo $row["NomDetMrc"] ?></td>
                                                                                        <td><?php echo $row["NomProd"] ?></td>
                                                                                        <td><?php echo $row["CntDetVnt"] ?></td>
                                                                                        <td>
                                                                                            <?php if ($row["CstTot"]=="0") echo number_format("0.00",2);
                                                                                                  else echo number_format($row["CstTot"],2)
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
                            <div class="modal fade" id="vercli-<?php echo $r->CodCli; ?>" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-teal">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="producto">DETALLE DEL CLIENTE - <strong><?php echo $r->NomCli; ?></strong></h4>
                                        </div>
                                        <?php foreach($this->model->ListSegCli($r->CodCli) as $row): ?>
                                        <form id="sign_in" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th width="100">RUC</th>
                                                            <td width="25">:</td>
                                                            <td><?php echo $row->RucCli; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th width="100">Tipo de Cliente</th>
                                                            <td width="25">:</td>
                                                            <td>
                                                                <?php 
                                                                    if($row->DscTip=='Privado'){
                                                                    echo "<span class='label bg-pink'>Privado</span>";
                                                                                              }
                                                                    else {
                                                                        echo "<span class='label bg-indigo'>Publico</span>";
                                                                          }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th width="100">Dirección</th>
                                                            <td width="25">:</td>
                                                            <td><?php echo $row->DirCli; ?>, <?php echo $row->NomCiu; ?>, <?php echo $row->NomPais; ?>.</td>
                                                        </tr>
                                                        <tr>
                                                            <th width="100">Telefono</th>
                                                            <td width="25">:</td>
                                                            <td><?php echo $row->TlfCli; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th width="100">Origen</th>
                                                            <td width="25">:</td>
                                                            <td><?php echo $row->DscOgn; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th width="100">Actividad</th>
                                                            <td width="25">:</td>
                                                            <td><?php echo $row->DscAct; ?></td>
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
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div> 
                            <div class="modal fade" id="verform-<?php echo $r->CodVnt; ?>" role="dialog">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-teal">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="producto">INFORMACIÓN - <strong><?php echo $r->CptVnt; ?></strong></h4>
                                        </div>
                                        <div class="modal-body">
                                        <?php foreach($this->model->ListSegForm($r->CodVnt) as $row): ?>
                                            <table class="table display compact" cellspacing="0" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <th width="100">Formulador</th>
                                                        <td><?php echo $row->NomEmp; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="100">Email </th>
                                                        <td><?php echo $row->EmlEmp; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="100">Cargo</th>
                                                        <td><?php echo $row->NomCrg; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        <?php endforeach; ?>
                                        </div>
                                        <div class="modal-footer">
                                            <center>
                                                <button type="button" class="btn bg-red btn-xs waves-effect" data-dismiss="modal">
                                                    <i class="material-icons">close</i>
                                                    <span>CERRAR</span>
                                                </button>  
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="modal fade" id="verneg-<?php echo $r->CodVnt; ?>" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-teal">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="producto">INFORMACIÓN - <strong><?php echo $r->CptVnt; ?></strong></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="body table-responsive">
                                                <table class="table display compact" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Proveedor</th>
                                                            <th>Marca</th>
                                                            <th>Lineas</th>
                                                            <th>Productos</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($this->model->ListDetVnt($r->CodVnt) as $row): ?>
                                                        <tr>
                                                            <td><?php echo $row["NomProv"] ?></td>
                                                            <td><?php echo $row["NomMrc"] ?></td>
                                                            <td><?php echo $row["NomDetMrc"] ?></td>
                                                            <td><?php echo $row["NomProd"] ?></td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
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
                                    </div>
                                </div>
                            </div> 
                            <div class="modal fade" id="verdur-<?php echo $r->CodVnt; ?>" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-teal">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="producto">AVANCE - <strong><?php echo $r->CptVnt; ?></strong></h4>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table display compact" cellspacing="0" width="100%">
                                                <?php foreach($this->model->ListDurVnt($r->CodVnt) as $row): ?>
                                                <tbody>
                                                    <tr>
                                                        <th width="300">Estado de la Venta</th>
                                                        <td width="25">:</td>
                                                        <td>
                                                            <?php
                                                            if($row->CodEstVnt =='1'){
                                                                echo "<span class='label bg-lime'>Pendiente</span>";
                                                                    } 
                                                            elseif($row->CodEstVnt =='2') {
                                                                echo "<span class='label bg-pink'>Seguimiento</span>";
                                                                    }
                                                            elseif($row->CodEstVnt =='3') {
                                                                echo "<span class='label bg-light-green'>Contactado</span>";
                                                                    }
                                                            elseif($row->CodEstVnt =='4') {
                                                                echo "<span class='label bg-brown'>Programado</span>";
                                                                    }
                                                            elseif($row->CodEstVnt =='5'){
                                                                echo "<span class='label bg-indigo'>Visita</span>";
                                                                    }
                                                            elseif($row->CodEstVnt =='6'){
                                                                echo "<span class='label bg-red'>Perdido</span>";
                                                                    }
                                                            else{
                                                                echo "<span class='label bg-teal'>Concluido</span>";
                                                                    }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th width="300">Fecha de Inicio de la Venta</th>
                                                        <td width="25">:</td>
                                                        <td><?php echo $row->FcrVnt; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="300">Fecha de Actualización de la venta</th>
                                                        <td width="25">:</td>
                                                        <td><?php echo $row->FupVnt; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="300">Duración de la venta hasta la ultima actualización</th>
                                                        <td width="25">:</td>
                                                        <td><?php echo $row->DrcVnt; ?> días</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="300">Sin contacto desde la ultima actualización</th>
                                                        <td width="25">:</td>
                                                        <td><?php echo $row->ScnVnt; ?> días</td>
                                                    </tr>
                                                </tbody>
                                                <?php endforeach; ?>
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
                                    </div>
                                </div>
                            </div> 
                            <div class="modal fade" id="verstk-<?php echo $r->CodVnt; ?>" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-teal">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="producto">CONTACTOS Y AGENDA - <strong><?php echo $r->CptVnt; ?></strong></h4>
                                        </div>
                                        <form id="sign_in" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="body table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <th width="150">Oservaciones</th>
                                                                <td width="25">:</td>
                                                                <td><?php echo $r->DscVnt; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3">
                                                                    <ul class="nav nav-tabs tab-col-teal" role="tablist">
                                                                        <li role="presentation" class="active">
                                                                            <a>STAKEHOLDER</a>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="tab-content">
                                                                        <div role="tabpanel" class="tab-pane animated flipInX active" id="stakeholder">
                                                                            <table class="table display compact" cellspacing="0" width="100%">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Rol</th>
                                                                                        <th>Nombre</th>
                                                                                        <th># Teléfono</th>
                                                                                        <th>Cargo</th>
                                                                                        <th>Lugar de Trabajo</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php foreach($this->model->ListStk($r->CodVnt) as $row): ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                        <?php 
                                                                                                if($row["CodRol"] =='1'){
                                                                                                echo "<span class='label bg-orange'>Decisor</span>";
                                                                                                    }
                                                                                            elseif($row["CodRol"] =='2') {
                                                                                                echo "<span class='label bg-purple'>Usuario Final</span>";
                                                                                                    }
                                                                                            elseif($row["CodRol"] =='3') {
                                                                                                echo "<span class='label bg-blue'>Recomendador Técnico</span>";
                                                                                                    }
                                                                                            elseif($row["CodRol"] =='4') {
                                                                                                echo "<span class='label bg-green'>Influenciador</span>";
                                                                                                    }
                                                                                            elseif($row["CodRol"] =='5') {
                                                                                                echo "<span class='label bg-deep-purple'>Sponsor</span>";
                                                                                                    }
                                                                                            else{
                                                                                                echo "<span class='label bg-red'>Coach</span>";
                                                                                                    }
                                                                                            ?>
                                                                                        </td>
                                                                                        <td><?php echo $row["NomStk"] ?></td>
                                                                                        <td>
                                                                                            <?php if($row["TlfStk"]==0) {
                                                                                            ?>
                                                                                                No brindó número
                                                                                            <?php } else {
                                                                                                echo $row["TlfStk"];
                                                                                            } ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php if($row["CrgStk"]==0) {
                                                                                            ?>
                                                                                                No brindó su cargo
                                                                                            <?php } else {
                                                                                                echo $row["CrgStk"];
                                                                                            } ?>
                                                                                        </td>
                                                                                        <td><?php echo $row["NomCli"] ?></td>
                                                                                    </tr>
                                                                                    <?php endforeach; ?>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3">
                                                                    <ul class="nav nav-tabs tab-col-teal" role="tablist">
                                                                        <li role="presentation" class="active">
                                                                            <a>AGENDA</a>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="tab-content">
                                                                        <div role="tabpanel" class="tab-pane animated flipInX active" id="agenda">
                                                                            <table class="table display compact" cellspacing="0" width="100%">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Stakeholder</th>
                                                                                        <th># Télefono o Móvil</th>
                                                                                        <th>Horario de Inicio</th>
                                                                                        <th>Horario de Fin</th>
                                                                                        <th>Proceso de Evento</th>
                                                                                        <th>Resumen</th>
                                                                                        <th>Descripción</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php foreach($this->model->ListAgn($r->CodVnt) as $row): ?>
                                                                                    <tr>
                                                                                        <td><?php echo $row["NomStk"]; ?></td>
                                                                                        <td><?php echo $row["TlfStk"]; ?></td>
                                                                                        <td><?php echo $row["FIniAgn"]; ?></td>
                                                                                        <td><?php echo $row["FFinAgn"]; ?></td>
                                                                                        <td>
                                                                                        <?php 
                                                                                                if($row["CodAvn"] =='1'){
                                                                                                echo "<span class='label bg-orange'>Primer Contacto</span>";
                                                                                                    }
                                                                                            elseif($row["CodAvn"] =='2') {
                                                                                                echo "<span class='label bg-purple'>Propuesta Tecnica/Económica</span>";
                                                                                                    }
                                                                                            elseif($row["CodAvn"] =='3') {
                                                                                                echo "<span class='label bg-blue'>Negociación</span>";
                                                                                                    }
                                                                                            else{
                                                                                                echo "<span class='label bg-green'>Cierre / Orden Compra</span>";
                                                                                                    }
                                                                                            ?>
                                                                                        </td>
                                                                                        <td><?php echo $row["DscTAgn"]; ?></td>
                                                                                        <td><?php echo $row["DscFAgn"]; ?></td>
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
