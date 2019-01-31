    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="card">
                        <div class="header">
                            <ol class="breadcrumb breadcrumb-col-red">
                                <li>
                                    <span data-toggle='tooltip' data-placement="bottom" title='Volver'>
                                        <a href="marketingcc"><i class="material-icons">markunread_mailbox</i> Marketing</a>
                                    </span>
                                </li>
                                <li class="active"><strong><?php echo $dtmkt->NomCli; ?></strong></li>
                            </ol>
                        </div>
                        <div class="body table-responsive">
                            <form id="sign_in" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="CodMrk" value="<?php echo $dtmkt->CodMrk; ?>" />
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th width="150">
                                                <?php
                                                if($dtmkt->CodCan == 1){
                                                    echo "<span class='label bg-blue'>Marketing</span>";
                                                        } 
                                                else{
                                                    echo "<span class='label bg-green'>Informes</span>";
                                                        }
                                                ?>
                                                <?php
                                                if($dtmkt->CodTipInf == 1){
                                                    echo "<span class='label bg-blue'>Charla</span>";
                                                        } 
                                                else if($dtmkt->CodTipInf == 2){
                                                    echo "<span class='label bg-orange'>Seguimiento de Pedido OC</span>";
                                                        } 
                                                else if($dtmkt->CodTipInf == 3){
                                                    echo "<span class='label bg-pink'>Cotización</span>";
                                                        } 
                                                else{
                                                    echo "<span class='label bg-green'>Orden de Compra - Verificación</span>";
                                                        }
                                                ?>
                                            </th>
                                            <td width="25"></td>
                                            <td align="right">
                                                <span data-toggle='tooltip' data-placement="left" title='Agregar nueva atención'>
                                                    <a class="btn bg-deep-purple btn-xs" data-toggle="modal" data-target="#nuevodetate">
                                                        <i class="material-icons">add</i>
                                                    </a>
                                                </span>
                                                <span data-toggle='tooltip' data-placement="left" title='Generar PDF'>
                                                    <a class="btn bg-grey btn-xs" target="_blank" href="<?php echo urlencode('pdf&a=PdfDetVnt&CodVnt=').$dtmkt->CodVnt; ?>">
                                                        <i class="material-icons">print</i>
                                                    </a>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="150">Fecha de comunicación</th>
                                            <td width="25">:</td>
                                            <td><?php echo $dtmkt->FecMrk; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="150">Contacto</th>
                                            <td width="25">:</td>
                                            <td><?php echo $dtmkt->NomCont; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="150">Telefono</th>
                                            <td width="25">:</td>
                                            <td>
                                                <?php
                                                    if($dtmkt->TlfCli == 0){
                                                        echo "<span class='label bg-red'>NO ASIGNADO</span>";
                                                            } 
                                                    else{
                                                        echo $dtmkt->TlfCli;
                                                            }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="150">Movil</th>
                                            <td width="25">:</td>
                                            <td>
                                                <?php
                                                    if($dtmkt->TlfCont == 0){
                                                        echo "<span class='label bg-red'>NO ASIGNADO</span>";
                                                            } 
                                                    else{
                                                        echo $dtmkt->TlfCont;
                                                            }
                                                ?>
                                            </td>
                                        </tr> 
                                        <tr>
                                            <th width="150">Descripción</th>
                                            <td width="25">:</td>
                                            <td><?php echo $dtmkt->AsuMrk; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <ul class="nav nav-tabs tab-col-teal" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="<?php echo urlencode('marketingcc&a=DetalleMkt&CodMrk=').$dtmkt->CodMrk; ?>">ATENCIONES</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane animated fadeInRight active" id="atenciones">
                                        <table id="dtabledetate" class="display compact" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Fecha de Atención</th>
                                                    <th>Respuesta</th>
                                                    <th>Reitera atención</th>
                                                    <th>Comentarios</th>
                                                    <th>División</th>
                                                    <th>Usuario</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach($this->model->ListDetAte($_REQUEST["CodMrk"]) as $r): ?>
                                                <tr>
                                                    <td width="35"><?php echo $i++ ?></td>
                                                    <td><?php echo $r["FecDetAte"]; ?></td>
                                                    <td><?php echo $r["RptDetAte"]; ?></td>
                                                    <td>
                                                        <?php
                                                            if ($r["ReiDetAte"] == null ) {
                                                                echo "No reitera cliente";
                                                            }
                                                            else {
                                                                echo $r["ReiDetAte"];
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if ($r["ComDetAte"] == null ) {
                                                                echo "No hay datos agregados";
                                                            }
                                                            else {
                                                                echo $r["ComDetAte"];
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $r["NomDiv"]; ?></td>
                                                    <td><?php echo $r["NomEmp"]; ?></td>
                                                    <td align="center">
                                                        <?php 
                                                            if ( $r["CodEmp"] == $objses->get('CodEmp')) {
                                                        ?>
                                                        <span>
                                                            <div class="dropdown">
                                                              <button class="dropdown-toggle bg-teal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                Acciones
                                                              <span class="caret"></span>
                                                              </button>
                                                                <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu1">
                                                                <li><a class="updanx" name="updanx" id="$row->CodDir"><i style="color:#555;" class="glyphicon glyphicon-edit"></i> Editar</a></li>
                                                                <li><a class="dltanx" id="$row->CodDir"><i style="color:red;" class="glyphicon glyphicon-remove"></i> Eliminar</a></li>
                                                                </ul>
                                                            </div>
                                                        </span>
                                                        <?php } 
                                                            else {
                                                        ?>
                                                        <span>
                                                            <div class="dropdown disabled">
                                                              <button class="dropdown-toggle bg-red" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                Acciones
                                                              <span class="caret"></span>
                                                              </button>
                                                            </div>
                                                        </span>
                                                        <?php } ?>
                                                  </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- ADD AGN -->
                                <div class="modal fade" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" id="nuevodetate" role="dialog">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-teal">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title text-center" id="atenciones">NUEVA ATENCIÓN</h4>
                                            </div>
                                            <form id="validate1" action="<?php echo urlencode('marketingcc&a=RegDetAte'); ?>" method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="row clearfix">
                                                        <input type="hidden" name="TxtCodMrk" value="<?php echo $dtmkt->CodMrk; ?>" />
                                                        <input type="hidden" name="TxtCodEmp" value="<?php echo $iduser = $objses->get('CodEmp'); ?>" />
                                                        <div class="col-md-6">
                                                            <b>Fecha y Hora de atención</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">today</i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <input type="text" name="TxtFecDetAte" class="datetimepicker form-control" placeholder="Ex: 20/04/2017 04:50" minlength="4" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b>Reitera</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">control_point</i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <input type="text" name="TxtReiDetAte" class="form-control" maxlength="30" minlength="1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b>Respuesta</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">font_download</i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <textarea rows="1" name="TxtRptDetAte" class="form-control no-resize auto-growth" placeholder="" maxlength="200" minlength="1" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b>Comentarios</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">font_download</i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <textarea rows="1" name="TxtComDetAte" class="form-control no-resize auto-growth" placeholder="" maxlength="100" minlength="1"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <center>
                                                        <button type="submit" class="btn bg-light-green btn-xs waves-effect">
                                                            <i class="material-icons">save</i>
                                                            <span>GUARDAR</span>
                                                        </button>
                                                        <button type="reset" class="btn bg-orange btn-xs waves-effect">
                                                            <i class="material-icons">clear_all</i>
                                                            <span>LIMPIAR</span>
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
                                <!-- FIN ADD !-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
