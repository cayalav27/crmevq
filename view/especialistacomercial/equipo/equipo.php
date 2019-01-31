    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="card">
                        <div class="header">
                            <ol class="breadcrumb breadcrumb-col-red">
                                <li>
                                    <span data-toggle='tooltip' data-placement="bottom" title='Volver'>
                                        <a href="venta"><i class="material-icons">local_grocery_store</i> Ventas</a>
                                    </span>
                                </li>
                                <li class="active"><strong><?php echo $equip->NomCli; ?></strong></li>
                            </ol>
                        </div>
                        <div class="body table-responsive">
                            <form id="sign_in" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="TxtCodVnt" value="<?php echo $equip->CodVnt; ?>" />
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th width="200">
                                                <?php
                                                if($equip->CodEstVnt =='1'){
                                                    echo "<span class='label bg-lime'>Pendiente</span>";
                                                        } 
                                                elseif($equip->CodEstVnt =='2') {
                                                    echo "<span class='label bg-pink'>Seguimiento</span>";
                                                        }
                                                elseif($equip->CodEstVnt =='3') {
                                                    echo "<span class='label bg-light-green'>Contactado</span>";
                                                        }
                                                elseif($equip->CodEstVnt =='4') {
                                                    echo "<span class='label bg-brown'>Programado</span>";
                                                        }
                                                elseif($equip->CodEstVnt =='5'){
                                                    echo "<span class='label bg-indigo'>Visita</span>";
                                                        }
                                                elseif($equip->CodEstVnt =='6'){
                                                    echo "<span class='label bg-red'>Perdido</span>";
                                                        }
                                                else{
                                                    echo "<span class='label bg-teal'>Concluido</span>";
                                                        }
                                                ?>
                                                <?php 
                                                    if($equip->CodAvn =='1'){
                                                    echo "<span class='label bg-orange'>Primer Contacto</span>";
                                                        }
                                                elseif($equip->CodAvn =='2') {
                                                    echo "<span class='label bg-purple'>Propuesta Tecnica/Económica</span>";
                                                        }
                                                elseif($equip->CodAvn =='3') {
                                                    echo "<span class='label bg-blue'>Negociación</span>";
                                                        }
                                                else{
                                                    echo "<span class='label bg-green'>Cierre / Orden Compra</span>";
                                                        }
                                                ?>
                                            </th>
                                            <td width="25"></td>
                                            <td align="right">
                                                <span data-toggle='tooltip' data-placement="left" title='Editar venta'>
                                                    <a class='btn bg-orange btn-xs' data-toggle="modal" data-target="#editvnt-<?php echo $equip->CodVnt; ?>">
                                                    <i class='material-icons'>edit</i>
                                                    </a>
                                                </span>
                                                <a class='btn btn-DltVnt bg-red btn-xs' data-id="<?php echo $equip->CodVnt; ?>" data-toggle='tooltip' data-placement="bottom" title='Eliminar'>
                                                    <i class='material-icons'>close</i>
                                                </a>
                                                <a class='btn btn-UpdVntC bg-green btn-xs' data-id="<?php echo $equip->CodVnt; ?>" data-toggle='tooltip' data-placement="bottom" title='Concluido o Cerrado OC'>
                                                    <i class='material-icons'>done_all</i>
                                                </a>
                                                <a class='btn btn-UpdVntP bg-deep-orange btn-xs' data-id="<?php echo $equip->CodVnt; ?>" data-toggle='tooltip' data-placement="bottom" title='Perdido'>
                                                    <i class='material-icons'>remove_circle_outline</i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="200"># Carpeta</th>
                                            <td width="25">:</td>
                                            <td><?php echo $equip->CptVnt; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="200">Solución</th>
                                            <td width="25">:</td>
                                            <?php $i = 1; ?>
                                            <?php foreach($this->model->ObtProdList($_REQUEST["CodVnt"]) as $r): ?>
                                            <tr>                                            
                                                <th width="200"></th>
                                                <td width="25"><?php echo $i++ ?>)</td>
                                                <td><?php echo $r["FabProd"].' - '.$r["NomProd"]; ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tr>
                                        <tr>
                                            <th width="200">Fecha Probable de OC</th>
                                            <td width="25">:</td>
                                            <td><?php echo $equip->FocVnt; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="200">Alias</th>
                                            <td width="25">:</td>
                                            <td><?php echo $equip->AliVnt; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="200">Contacto</th>
                                            <td width="25">:</td>
                                            <td><?php echo $equip->NomCont; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="200">Telefono</th>
                                            <td width="25">:</td>
                                            <td><?php echo $equip->TlfCli; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="200">Movil</th>
                                            <td width="25">:</td>
                                            <td><?php echo $equip->TlfCont; ?></td>
                                        </tr> 
                                        <tr>
                                            <th width="200">E-mail</th>
                                            <td width="25">:</td>
                                            <td><?php echo $equip->EmlCont; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="200">Observaciones</th>
                                            <td width="25">:</td>
                                            <td><?php echo $equip->DscVnt; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <!--EDIT CLI -->
                            <div class="modal fade" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" id="editvnt-<?php echo $equip->CodVnt; ?>" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-teal">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="calificacion">EDITAR <strong> <?php echo $equip->CptVnt; ?> - <?php echo $equip->NomCli; ?></strong></h4>
                                        </div>
                                        <form id="validate3" action="<?php echo urlencode('venta&a=UpdVntEqp'); ?>" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="row clearfix">
                                                    <input type="hidden" name="TxtCodVnt" value="<?php echo $equip->CodVnt; ?>" />
                                                    <div class="col-md-12">
                                                        <b>Cliente</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">account_balance</i>
                                                            </span>
                                                            <select id="TxtCodCliUpd" name="TxtCodCli" class="js-example-responsive form-control pmd-select2" style="width: 100%" disabled>
                                                                <?php foreach($this->model->ListCli() as $row): ?>
                                                                <option value="<?php echo $row->CodCli; ?>" data-nomcont="<?php echo $equip->NomCont; ?>" <?php if($row->NomCli==$equip->NomCli) echo "selected"; ?>  ><?php echo $row->NomCli; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b># de Carpeta</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">create_new_folder</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="number" name="TxtCptVnt" class="form-control" value="<?php echo $equip->CptVnt; ?>" maxlength="9" minlength="1" min="0" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b>Fecha probable de OC</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">today</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="text" name="TxtFocVnt" class="datepicker form-control" value="<?php echo $equip->FocVnt; ?>" maxlength="10" minlength="5" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b>Linea</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">credit_card</i>
                                                            </span>
                                                            <select id="TxtCodDetMrcUpd" name="TxtCodDetMrc" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                <?php foreach($this->model->ListDetMrc($iduser = $objses->get('CodPrf')) as $row): ?>
                                                                <option value="<?php echo $row->CodDetMrc; ?>" data-nomprod="<?php echo $equip->NomProd; ?>" <?php if($row->NomDetMrc==$equip->NomDetMrc) echo "selected"; ?> ><?php echo $row->NomDetMrc; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Soluciones de Negocio</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">shopping_cart</i>
                                                            </span>
                                                            <select id="TxtCodProdUpd" name="TxtCodProd" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                                <?php foreach($this->model->ListProd() as $row): ?>
                                                                <option value="<?php echo $row->CodProd; ?>" <?php if($row->NomProd==$equip->NomProd) echo "selected"; ?>  ><?php echo $row->NomProd; ?></option>
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
                                                            <select id="TxtCodContUpd" name="TxtCodCont" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                                <?php foreach($this->model->ListCont() as $row): ?>
                                                                <option value="<?php echo $row->CodCont; ?>" <?php if($row->NomCont==$equip->NomCont) echo "selected"; ?>  ><?php echo $row->NomCont; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Acción</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">border_color</i>
                                                            </span>
                                                            <select name="TxtCodEstVnt" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                <option selected disabled></option>
                                                                <?php foreach($this->model->ObtEstVnt() as $row): ?>
                                                                <option value="<?php echo $row->CodEstVnt; ?>" <?php if($row->NomEstVnt==$equip->NomEstVnt) echo "selected"; ?> ><?php echo $row->NomEstVnt; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Avance</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">done_all</i>
                                                            </span>
                                                            <select name="TxtCodAvn" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                <option selected disabled></option>
                                                                <?php foreach($this->model->ObtAvn() as $row): ?>
                                                                <option value="<?php echo $row->CodAvn; ?>" <?php if($row->NomAvn==$equip->NomAvn) echo "selected"; ?> ><?php echo $row->NomAvn; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Alias</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">android</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <textarea rows="1" name="TxtAliVnt" class="form-control no-resize auto-growth" value="<?php echo $equip->AliVnt; ?>" maxlength="50" minlength="2" required><?php echo $equip->AliVnt; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Observaciones</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">font_download</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <textarea rows="1" name="TxtDscVnt" class="form-control no-resize auto-growth" value="<?php echo $equip->DscVnt; ?>" maxlength="100" minlength="2" required><?php echo $equip->DscVnt; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="TxtCodEmp" value="<?php echo $iduser = $objses->get('CodEmp'); ?>" />
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
                            <!--FIN EDIT CLI -->
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <ul class="nav nav-tabs tab-col-teal" role="tablist">
                                    <li role="presentation">
                                        <a href="<?php echo urlencode('detallevnt&a=Index&CodVnt=').$equip->CodVnt; ?>">COTIZACIONES</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo urlencode('calificacionvnt&a=Index&CodVnt=').$equip->CodVnt; ?>">CALIFICACIÓN</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo urlencode('agenda&a=Index&CodVnt=').$equip->CodVnt; ?>">AGENDA</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo urlencode('stakeholder&a=Index&CodVnt=').$equip->CodVnt; ?>">STAKEHOLDER</a>
                                    </li>
                                    <li role="presentation" class="active">
                                        <a href="<?php echo urlencode('equipo&a=Index&CodVnt=').$equip->CodVnt; ?>">EQUIPO</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane animated fadeInRight active" id="stakeholder">
                                        <table id="dtable1" class="display compact" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Opción</th>
                                                    <th>Cargo</th>
                                                    <th>Empleado </th>
                                                    <th>Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach($this->model->ListEqp($_REQUEST["CodVnt"]) as $r): ?>
                                                <tr>
                                                    <td><?php echo $i++ ?></td>
                                                    <td align="center">
                                                        <a class='btn bg-orange btn-xs' data-toggle="modal" data-target="#edit-<?php echo $r['CodEqp'] ?>" data-placement="bottom" title='Editar'>
                                                            <i class='material-icons'>edit</i>
                                                        </a>
                                                        <a class='btn btn-DltEqp bg-red btn-xs' data-id="<?php echo $r['CodEqp'] ?>" data-codvnt="<?php echo $r['CodVnt'] ?>" data-ind="<?php echo $r['Indicador'] ?>" data-toggle='tooltip' data-placement="bottom" title='Desactivar'>
                                                            <i class='material-icons'>update</i>
                                                        </a>
                                                    </td>
                                                    <td align="center"><?php echo $r["NomCrg"] ?></td>
                                                    <td align="center"><?php echo $r["NomEmp"] ?> <?php echo $r["ApeEmp"] ?></td>
                                                    <td align="center">
                                                        <?php
                                                            if($r["Indicador"] =='1'){
                                                                echo "<span class='label label-success'>Activo</span>";
                                                                                          }
                                                            else {
                                                                echo "<span class='label label-danger'>Inactivo</span>";
                                                                  } ?>
                                                    </td>
                                                </tr>  
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--EDIT EQUP -->
                                <?php foreach($this->model->ListEqp($_REQUEST["CodVnt"]) as $r): ?>
                                    <div class="modal fade" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" id="edit-<?php echo $r['CodEqp'] ?>" role="dialog">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-teal">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title text-center" id="producto">EDITAR EQUIPO</h4>
                                                </div>
                                                <form id="validate2" action="<?php echo urlencode('equipo&a=UpdEqp'); ?>" method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="row clearfix">
                                                            <input type="hidden" name="TxtCodVnt" value="<?php echo $r["CodVnt"] ?>" />
                                                            <input type="hidden" name="TxtCodEqp" value="<?php echo $r["CodEqp"] ?>" />
                                                            <div class="col-md-12">
                                                                <b>Cargo</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">local_library</i>
                                                                    </span>
                                                                    <select  name="TxtCodCrg" class="js-example form-control pmd-select2" style="width: 100%">
                                                                        <?php foreach($this->model->ObtCrg() as $row): ?>
                                                                        <option value="<?php echo $row->CodCrg; ?>" <?php if($r["NomCrg"]==$row->NomCrg) echo "selected"; ?> ><?php echo $row->NomCrg; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <b>Especialista</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">person</i>
                                                                    </span>
                                                                    <select  name="TxtCodEmp" class="js-example form-control pmd-select2" style="width: 100%">
                                                                        <?php foreach($this->model->ObtEmp() as $row): ?>
                                                                        <option value="<?php echo $row->CodEmp; ?>" <?php if($r["NomApeEmp"]==$row->NomApeEmp) echo "selected"; ?> >
                                                                            <?php echo $row->NomApeEmp; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
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
                                <?php endforeach; ?>
                                <!--FIN EDIT EQUP -->
                                <div class="text-right" role="group" aria-label="Justified button group">
                                    <span data-toggle='tooltip' data-placement="left" title='Agregar equipo'>
                                        <a class="btn bg-deep-purple btn-xs" data-toggle="modal" data-target="#nuevoequipo">
                                            <i class="material-icons">add</i>
                                        </a>
                                    </span>
                                </div>
                                <!-- ADD equip -->
                                <div class="modal fade" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" id="nuevoequipo" role="dialog">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-teal">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title text-center" id="equipo">NUEVO EQUIPO</h4>
                                            </div>
                                            <form id="validate1" action="<?php echo urlencode('equipo&a=RegEqp'); ?>" method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="row clearfix">
                                                        <input type="hidden" name="TxtCodVnt" value="<?php echo $equip->CodVnt; ?>" />
                                                        <div class="col-md-12">
                                                            <b>Cargo</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">local_library</i>
                                                                </span>
                                                                <select id="TxtCodCrg" name="TxtCodCrg" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                    <option selected disabled></option>
                                                                    <?php foreach($this->model->ObtCrg() as $r): ?>
                                                                    <option value="<?php echo $r->CodCrg; ?>"><?php echo $r->NomCrg; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <b>Especialista</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">person</i>
                                                                </span>
                                                                <select id="TxtCodEmp" name="TxtCodEmp" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                </select>
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
