    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="card">
                        <div class="header">
                            <ol class="breadcrumb breadcrumb-col-red">
                                <li>
                                    <span data-toggle='tooltip' data-placement="bottom" title='Volver'>
                                        <a href="marketing"><i class="material-icons">markunread_mailbox</i> Marketing</a>
                                    </span>
                                </li>
                                <li class="active"><strong><?php echo $eqpmkt->NomCli; ?></strong></li>
                            </ol>
                        </div>
                        <div class="body table-responsive">
                            <form id="sign_in" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="CodMrk" value="<?php echo $eqpmkt->CodMrk; ?>" />
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th width="150">
                                                <?php
                                                if($eqpmkt->CodCan == 1){
                                                    echo "<span class='label bg-blue'>Marketing</span>";
                                                        } 
                                                else{
                                                    echo "<span class='label bg-green'>Informes</span>";
                                                        }
                                                ?>
                                                <?php
                                                if($eqpmkt->CodTipInf == 1){
                                                    echo "<span class='label bg-blue'>Charla</span>";
                                                        } 
                                                else if($eqpmkt->CodTipInf == 2){
                                                    echo "<span class='label bg-orange'>Seguimiento de Pedido OC</span>";
                                                        } 
                                                else if($eqpmkt->CodTipInf == 3){
                                                    echo "<span class='label bg-pink'>Cotización</span>";
                                                        } 
                                                else{
                                                    echo "<span class='label bg-green'>Orden de Compra - Verificación</span>";
                                                        }
                                                ?>
                                            </th>
                                            <td width="25"></td>
                                            <td align="right">
                                                <span data-toggle='tooltip' data-placement="left" title='Editar venta'>
                                                    <a class='btn bg-orange btn-xs' data-toggle="modal" data-target="#editmrk-<?php echo $eqpmkt->CodMrk; ?>">
                                                    <i class='material-icons'>edit</i>
                                                    </a>
                                                </span>
                                                <a class='btn btn-DltVnt bg-red btn-xs' data-id="<?php echo $eqpmkt->CodMrk; ?>" data-toggle='tooltip' data-placement="bottom" title='Eliminar'>
                                                    <i class='material-icons'>close</i>
                                                </a>
                                                <a class='btn btn-UpdVntC bg-green btn-xs' data-id="<?php echo $eqpmkt->CodMrk; ?>" data-toggle='tooltip' data-placement="bottom" title='Concluido o Cerrado OC'>
                                                    <i class='material-icons'>done_all</i>
                                                </a>
                                                <a class='btn btn-UpdVntP bg-deep-orange btn-xs' data-id="<?php echo $eqpmkt->CodMrk; ?>" data-toggle='tooltip' data-placement="bottom" title='Perdido'>
                                                    <i class='material-icons'>remove_circle_outline</i>
                                                </a>
                                                <span data-toggle='tooltip' data-placement="left" title='Agregar nueva atención'>
                                                    <a class="btn bg-deep-purple btn-xs" data-toggle="modal" data-target="#nuevodetate" disabled>
                                                        <i class="material-icons">add</i>
                                                    </a>
                                                </span>
                                                <span data-toggle='tooltip' data-placement="left" title='Generar PDF'>
                                                    <a class="btn bg-grey btn-xs" target="_blank" href="<?php echo urlencode('pdf&a=PdfDetVnt&CodVnt=').$eqpmkt->CodVnt; ?>">
                                                        <i class="material-icons">print</i>
                                                    </a>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="150">Fecha de comunicación</th>
                                            <td width="25">:</td>
                                            <td><?php echo $eqpmkt->FecMrk; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="150">Contacto</th>
                                            <td width="25">:</td>
                                            <td><?php echo $eqpmkt->NomCont; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="150">Telefono</th>
                                            <td width="25">:</td>
                                            <td>
                                                <?php
                                                    if($eqpmkt->TlfCli == 0){
                                                        echo "<span class='label bg-red'>NO ASIGNADO</span>";
                                                            } 
                                                    else{
                                                        echo $eqpmkt->TlfCli;
                                                            }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="150">Movil</th>
                                            <td width="25">:</td>
                                            <td>
                                                <?php
                                                    if($eqpmkt->TlfCont == 0){
                                                        echo "<span class='label bg-red'>NO ASIGNADO</span>";
                                                            } 
                                                    else{
                                                        echo $eqpmkt->TlfCont;
                                                            }
                                                ?>
                                            </td>
                                        </tr> 
                                        <tr>
                                            <th width="150">Asunto</th>
                                            <td width="25">:</td>
                                            <td><?php echo $eqpmkt->AsuMrk; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <!--EDIT CLI -->
                            <div class="modal fade" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" id="editmrk-<?php echo $eqpmkt->CodMrk; ?>" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-teal">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="calificacion">EDITAR <strong><?php echo $eqpmkt->NomCli; ?></strong></h4>
                                        </div>
                                        <form id="validate3" action="marketing&a=UpdMkt" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="row clearfix">
                                                    <input type="hidden" name="TxtCodMrk" value="<?php echo $eqpmkt->CodMrk; ?>" />
                                                    <div class="col-md-12">
                                                        <b>Cliente</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">account_balance</i>
                                                            </span>
                                                            <select id="TxtCodCliUp" name="TxtCodCli" class="js-example-responsive form-control pmd-select2" style="width: 100%">
                                                                <?php foreach($this->model->ListCli() as $row): ?>
                                                                <option value="<?php echo $row->CodCli; ?>" data-nomcont="<?php echo $eqpmkt->NomCont; ?>" <?php if($row->NomCli==$eqpmkt->NomCli) echo "selected"; ?>  ><?php echo $row->NomCli; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Contacto</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">person</i>
                                                            </span>
                                                            <select id="TxtCodContUp" name="TxtCodCont" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                                <?php foreach($this->model->ListCont() as $row): ?>
                                                                <option value="<?php echo $row->CodCont; ?>" <?php if($row->NomCont==$eqpmkt->NomCont) echo "selected"; ?>  ><?php echo $row->NomCont; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Tipo</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">merge_type</i>
                                                            </span>
                                                            <select id="TxtCodTipInf" name="TxtCodTipInf" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                <?php foreach($this->model->ListTipInf() as $row): ?>
                                                                <option value="<?php echo $row->CodTipInf; ?>" <?php if($row->NomTipInf==$eqpmkt->NomTipInf) echo "selected"; ?> ><?php echo $row->NomTipInf; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Canal</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">change_history</i>
                                                            </span>
                                                            <select id="TxtCodCan" name="TxtCodCan" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                <?php foreach($this->model->ListCan() as $row): ?>
                                                                <option value="<?php echo $row->CodCan; ?>" <?php if($row->NomCan==$eqpmkt->NomCan) echo "selected"; ?> ><?php echo $row->NomCan; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>División</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">people_outline</i>
                                                            </span>
                                                            <select id="TxtCodDivUpd" name="TxtCodDiv" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                <?php foreach($this->model->ListDiv() as $row): ?>
                                                                <option value="<?php echo $row->CodDiv; ?>" <?php if($row->CodDiv==$eqpmkt->CodDiv) echo "selected"; ?> ><?php echo $row->NomDiv; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Encargados</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">person_outline</i>
                                                            </span>
                                                            <select id="TxtCodEmpUpd" name="TxtCodEmp" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                <?php foreach($this->model->ListEmp() as $row): ?>
                                                                        <option value="<?php echo $row->CodEmp; ?>" data-nomemp="<?php echo $eqpmkt->NomEmp; ?>" <?php if($row->CodEmp==$eqpmkt->CodEmp) echo "selected"; ?> ><?php echo $row->NomEmp; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Fecha y Hora de contacto</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">today</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="text" name="TxtFecMrk" class="datetimepicker form-control" placeholder="Ex: 20/04/2017 04:50" minlength="4" value="<?php echo $eqpmkt->FecMrk; ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <b>Asunto</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">font_download</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <textarea rows="1" name="TxtAsuMrk" class="form-control no-resize auto-growth" placeholder="" maxlength="100" minlength="0" value="<?php echo $eqpmkt->AsuMrk; ?>" required><?php echo $eqpmkt->AsuMrk; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <center>
                                                    <button type="submit" class="btn bg-orange btn-xs waves-effect">
                                                        <i class="material-icons">update</i>
                                                        <span>ACTUALIZAR</span>
                                                    </button>  
                                                    <button type="button" class="btn bg-red btn-xs waves-effect" data-dismiss="modal">
                                                        <i class="material-icons">close</i>
                                                        <span>CANCELAR</span>
                                                    </button>  
                                                </center>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> 
                            <!--FIN EDIT -->
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <ul class="nav nav-tabs tab-col-teal" role="tablist">
                                    <li role="presentation">
                                        <a href="<?php echo urlencode('detallemkt&a=Index&CodMrk=').$eqpmkt->CodMrk; ?>">ATENCIONES</a>
                                    </li>
                                    <li role="presentation" class="active">
                                        <a href="<?php echo urlencode('equipomkt&a=Index&CodMrk=').$eqpmkt->CodMrk; ?>">EQUIPO</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane animated fadeInRight active" id="atenciones">
                                        <table id="dtable" class="display compact" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th width="30">#</th>
                                                    <th>Usuario</th>
                                                    <th>División</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach($this->model->ListEqpMkt($_REQUEST["CodMrk"]) as $r): ?>
                                                <tr>
                                                    <td><?php echo $i++ ?></td>
                                                    <td><?php echo $r["NomEmp"]; ?></td>
                                                    <td><?php echo $r["NomDiv"]; ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
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
