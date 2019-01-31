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
                                <li class="active"><strong><?php echo $stk->NomCli; ?></strong></li>
                            </ol>
                        </div>
                        <div class="body table-responsive">
                            <form id="sign_in" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="TxtCodVnt" value="<?php echo $stk->CodVnt; ?>" />
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th width="200">
                                                <?php
                                                if($stk->CodEstVnt =='1'){
                                                    echo "<span class='label bg-lime'>Pendiente</span>";
                                                        } 
                                                elseif($stk->CodEstVnt =='2') {
                                                    echo "<span class='label bg-pink'>Seguimiento</span>";
                                                        }
                                                elseif($stk->CodEstVnt =='3') {
                                                    echo "<span class='label bg-light-green'>Contactado</span>";
                                                        }
                                                elseif($stk->CodEstVnt =='4') {
                                                    echo "<span class='label bg-brown'>Programado</span>";
                                                        }
                                                elseif($stk->CodEstVnt =='5'){
                                                    echo "<span class='label bg-indigo'>Visita</span>";
                                                        }
                                                elseif($stk->CodEstVnt =='6'){
                                                    echo "<span class='label bg-red'>Perdido</span>";
                                                        }
                                                else{
                                                    echo "<span class='label bg-teal'>Concluido</span>";
                                                        }
                                                ?>
                                                <?php 
                                                    if($stk->CodAvn =='1'){
                                                    echo "<span class='label bg-orange'>Primer Contacto</span>";
                                                        }
                                                elseif($stk->CodAvn =='2') {
                                                    echo "<span class='label bg-purple'>Propuesta Tecnica/Económica</span>";
                                                        }
                                                elseif($stk->CodAvn =='3') {
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
                                                    <a class='btn bg-orange btn-xs' data-toggle="modal" data-target="#editvnt-<?php echo $stk->CodVnt; ?>">
                                                    <i class='material-icons'>edit</i>
                                                    </a>
                                                </span>
                                                <a class='btn btn-DltVnt bg-red btn-xs' data-id="<?php echo $stk->CodVnt; ?>" data-toggle='tooltip' data-placement="bottom" title='Eliminar'>
                                                    <i class='material-icons'>close</i>
                                                </a>
                                                <a class='btn btn-UpdVntC bg-green btn-xs' data-id="<?php echo $stk->CodVnt; ?>" data-toggle='tooltip' data-placement="bottom" title='Concluido o Cerrado OC'>
                                                    <i class='material-icons'>done_all</i>
                                                </a>
                                                <a class='btn btn-UpdVntP bg-deep-orange btn-xs' data-id="<?php echo $stk->CodVnt; ?>" data-toggle='tooltip' data-placement="bottom" title='Perdido'>
                                                    <i class='material-icons'>remove_circle_outline</i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="200"># Carpeta</th>
                                            <td width="25">:</td>
                                            <td><?php echo $stk->CptVnt; ?></td>
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
                                            <td><?php echo $stk->FocVnt; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="200">Alias</th>
                                            <td width="25">:</td>
                                            <td><?php echo $stk->AliVnt; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="200">Contacto</th>
                                            <td width="25">:</td>
                                            <td><?php echo $stk->NomCont; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="200">Telefono</th>
                                            <td width="25">:</td>
                                            <td><?php echo $stk->TlfCli; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="200">Movil</th>
                                            <td width="25">:</td>
                                            <td><?php echo $stk->TlfCont; ?></td>
                                        </tr> 
                                        <tr>
                                            <th width="200">E-mail</th>
                                            <td width="25">:</td>
                                            <td><?php echo $stk->EmlCont; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="200">Observaciones</th>
                                            <td width="25">:</td>
                                            <td><?php echo $stk->DscVnt; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <!--EDIT CLI -->
                            <div class="modal fade" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" id="editvnt-<?php echo $stk->CodVnt; ?>" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-teal">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="calificacion">EDITAR <strong> <?php echo $stk->CptVnt; ?> - <?php echo $stk->NomCli; ?></strong></h4>
                                        </div>
                                        <form id="validate3" action="<?php echo urlencode('venta&a=UpdVntStk'); ?>" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="row clearfix">
                                                    <input type="hidden" name="TxtCodVnt" value="<?php echo $stk->CodVnt; ?>" />
                                                    <div class="col-md-12">
                                                        <b>Cliente</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">account_balance</i>
                                                            </span>
                                                            <select id="TxtCodCliUpd" name="TxtCodCli" class="js-example-responsive form-control pmd-select2" style="width: 100%" disabled>
                                                                <?php foreach($this->model->ListCli() as $row): ?>
                                                                <option value="<?php echo $row->CodCli; ?>" data-nomcont="<?php echo $stk->NomCont; ?>" <?php if($row->NomCli==$stk->NomCli) echo "selected"; ?>  ><?php echo $row->NomCli; ?></option>
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
                                                                <input type="number" name="TxtCptVnt" class="form-control" value="<?php echo $stk->CptVnt; ?>" maxlength="9" minlength="1" min="0" required>
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
                                                                <input type="text" name="TxtFocVnt" class="datepicker form-control" value="<?php echo $stk->FocVnt; ?>" maxlength="10" minlength="5" required>
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
                                                                <option value="<?php echo $row->CodDetMrc; ?>" data-nomprod="<?php echo $stk->NomProd; ?>" <?php if($row->NomDetMrc==$stk->NomDetMrc) echo "selected"; ?> ><?php echo $row->NomDetMrc; ?></option>
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
                                                                <option value="<?php echo $row->CodProd; ?>" <?php if($row->NomProd==$stk->NomProd) echo "selected"; ?>  ><?php echo $row->NomProd; ?></option>
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
                                                                <option value="<?php echo $row->CodCont; ?>" <?php if($row->NomCont==$stk->NomCont) echo "selected"; ?>  ><?php echo $row->NomCont; ?></option>
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
                                                                <option value="<?php echo $row->CodEstVnt; ?>" <?php if($row->NomEstVnt==$stk->NomEstVnt) echo "selected"; ?> ><?php echo $row->NomEstVnt; ?></option>
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
                                                                <option value="<?php echo $row->CodAvn; ?>" <?php if($row->NomAvn==$stk->NomAvn) echo "selected"; ?> ><?php echo $row->NomAvn; ?></option>
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
                                                                <textarea rows="1" name="TxtAliVnt" class="form-control no-resize auto-growth" value="<?php echo $stk->AliVnt; ?>" maxlength="50" minlength="2" required><?php echo $stk->AliVnt; ?></textarea>
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
                                                                <textarea rows="1" name="TxtDscVnt" class="form-control no-resize auto-growth" value="<?php echo $stk->DscVnt; ?>" maxlength="100" minlength="2" required><?php echo $stk->DscVnt; ?></textarea>
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
                                        <a href="<?php echo urlencode('detallevnt&a=Index&CodVnt=').$stk->CodVnt; ?>">COTIZACIONES</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo urlencode('calificacionvnt&a=Index&CodVnt=').$stk->CodVnt; ?>">CALIFICACIÓN</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo urlencode('agenda&a=Index&CodVnt=').$stk->CodVnt; ?>">AGENDA</a>
                                    </li>
                                    <li role="presentation" class="active">
                                        <a href="<?php echo urlencode('stakeholder&a=Index&CodVnt=').$stk->CodVnt; ?>">STAKEHOLDER</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo urlencode('equipo&a=Index&CodVnt=').$stk->CodVnt; ?>">EQUIPO</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane animated fadeInRight active" id="stakeholder">
                                        <table id="dtable" class="display compact" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Opción</th>
                                                    <th>Rol</th>
                                                    <th>Estado</th>
                                                    <th>Nombre de Stakeholder</th>
                                                    <th># Teléfono</th>
                                                    <th>Cargo</th>
                                                    <th>Lugar de Trabajo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach($this->model->ListStk($_REQUEST["CodVnt"]) as $r): ?>
                                                <tr>
                                                    <td><?php echo $i++ ?></td>
                                                    <td align="center">
                                                        <?php
                                                            if($r["Indicador"] =='1'){
                                                                echo "<span data-toggle='tooltip' data-placement='left' title='Editar stakeholder'>
                                                                        <a class='btn bg-orange btn-xs' data-toggle='modal' data-target='#edit-".$r['CodStk']."'>
                                                                            <i class='material-icons'>edit</i>
                                                                        </a>
                                                                    </span>";
                                                                }
                                                            else {
                                                                echo "<span data-toggle='tooltip' data-placement='left' title='Inactivo'>
                                                                        <a class='btn bg-orange btn-xs disabled' data-toggle='modal' data-target='#edit-".$r['CodStk']."'>
                                                                            <i class='material-icons'>edit</i>
                                                                        </a>
                                                                    </span>";
                                                                  } 
                                                        ?>
                                                        <a class='btn btn-DltStk bg-blue btn-xs' data-id="<?php echo $r['CodStk'] ?>" data-codvnt="<?php echo $r['CodVnt'] ?>" data-ind="<?php echo $r['Indicador'] ?>" data-toggle='tooltip' data-placement="bottom" title='<?php
                                                            if($r["Indicador"] =='1'){
                                                                echo "Desactivar";
                                                                                          }
                                                            else {
                                                                echo "Activar";
                                                                  } 
                                                        ?>'>
                                                            <i class='material-icons'>update</i>
                                                        </a>
                                                    </td>
                                                    <td align="center">
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
                                                    <td align="center">
                                                        <?php
                                                            if($r["Indicador"] =='1'){
                                                                echo "<span class='label label-success'>Activo</span>";
                                                                                          }
                                                            else {
                                                                echo "<span class='label label-danger'>Inactivo</span>";
                                                                  } 
                                                        ?>
                                                    </td>
                                                    <td><?php echo $r["NomStk"] ?></td>
                                                    <td><?php echo $r["TlfStk"] ?></td>
                                                    <td><?php echo $r["CrgStk"] ?></td>
                                                    <td><?php echo $r["NomCli"] ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--EDIT stk -->
                                <?php foreach($this->model->ListStk($_REQUEST["CodVnt"]) as $r): ?>
                                    <div class="modal fade" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" id="edit-<?php echo $r["CodStk"] ?>" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-teal">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title text-center" id="producto">EDITAR - <strong><?php echo $r["NomStk"] ?></strong></h4>
                                                </div>
                                                <form id="validate2" method="POST" enctype="multipart/form-data" action="<?php echo urlencode('stakeholder&a=UpdStk'); ?>">
                                                    <div class="modal-body">
                                                        <div class="row clearfix">
                                                            <input type="hidden" name="TxtCodVnt" value="<?php echo $r["CodVnt"] ?>" />
                                                            <input type="hidden" name="TxtCodStk" value="<?php echo $r["CodStk"] ?>" />
                                                            <div class="col-md-12">
                                                                <b>Lugar de Trabajo</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">location_on</i>
                                                                    </span>
                                                                    <select name="TxtCodCli" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                                        <?php foreach($this->model->ListCli() as $row): ?>
                                                                        <option value="<?php echo $row->CodCli; ?>" <?php if($r["NomCli"]==$row->NomCli) echo "selected"; ?>  ><?php echo $row->NomCli; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <b>Nombre del Stakeholder</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">contacts</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <input type="text" name="TxtNomStk" class="form-control" maxlength="150" minlength="5" value="<?php echo $r["NomStk"] ?>" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <b># Teléfono</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">call</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <input type="number" name="TxtTlfStk" class="form-control" maxlength="9" minlength="2" value="<?php echo $r["TlfStk"] ?>" min="0" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <b>Rol</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">local_library</i>
                                                                    </span>
                                                                    <select  name="TxtCodRol" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                        <?php foreach($this->model->ObtRol() as $row): ?>
                                                                        <option value="<?php echo $row->CodRol; ?>" <?php if($r["NomRol"]==$row->NomRol) echo "selected"; ?> >
                                                                            <?php echo $row->NomRol; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <b>Cargo</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">book</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <input type="text" name="TxtCrgStk" class="form-control" maxlength="50" minlength="5" value="<?php echo $r["CrgStk"] ?>" required>
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
                                <?php endforeach; ?>
                                <!--FIN EDIT STK -->
                                <div class="text-left" role="group" aria-label="Justified button group">
                                    <span data-toggle='tooltip' data-placement="right" title='Agregar stakeholder'>
                                        <a class="btn bg-lime btn-xs" data-toggle="modal" data-target="#nuevostakeholder">
                                            <i class="material-icons">add</i>
                                        </a>
                                    </span>
                                </div>
                                <!-- ADD STK -->
                                <div class="modal fade" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" id="nuevostakeholder" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-teal">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title text-center" id="agenda">NUEVO STAKEHOLDER</h4>
                                            </div>
                                            <form id="validate1" method="POST" enctype="multipart/form-data" action="<?php echo urlencode('stakeholder&a=RegStk'); ?>">
                                                <div class="modal-body">
                                                    <div class="row clearfix">
                                                        <input type="hidden" name="TxtCodVnt" value="<?php echo $stk->CodVnt; ?>" />
                                                        <div class="col-md-12">
                                                            <b>Lugar de Trabajo</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">location_on</i>
                                                                </span>
                                                                <select name="TxtCodCli" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                                    <?php foreach($this->model->ListCli() as $row): ?>
                                                                    <option value="<?php echo $row->CodCli; ?>" <?php if($row->NomCli==$stk->NomCli) echo "selected"; ?>  ><?php echo $row->NomCli; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b>Nombre del Stakeholder</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">contacts</i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <input type="text" name="TxtNomStk" class="form-control" maxlength="150" minlength="5" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b># Teléfono</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">call</i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <input type="number" name="TxtTlfStk" class="form-control" maxlength="9" minlength="2" min="0" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b>Rol</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">local_library</i>
                                                                </span>
                                                                <select  name="TxtCodRol" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                    <option selected disabled></option>
                                                                    <?php foreach($this->model->ObtRol() as $r): ?>
                                                                    <option value="<?php echo $r->CodRol; ?>"><?php echo $r->NomRol; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select> 
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b>Cargo</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">book</i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <input type="text" name="TxtCrgStk" class="form-control" maxlength="50" minlength="5" required>
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
