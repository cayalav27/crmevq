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
                                <li class="active"><strong><?php echo $agn->NomCli; ?></strong></li>
                            </ol>
                        </div>
                        <div class="body table-responsive">
                            <form id="sign_in" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="CodVnt" value="<?php echo $agn->CodVnt; ?>" />
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th width="200">
                                                <?php
                                                if($agn->CodEstVnt =='1'){
                                                    echo "<span class='label bg-lime'>Pendiente</span>";
                                                        } 
                                                elseif($agn->CodEstVnt =='2') {
                                                    echo "<span class='label bg-pink'>Seguimiento</span>";
                                                        }
                                                elseif($agn->CodEstVnt =='3') {
                                                    echo "<span class='label bg-light-green'>Contactado</span>";
                                                        }
                                                elseif($agn->CodEstVnt =='4') {
                                                    echo "<span class='label bg-brown'>Programado</span>";
                                                        }
                                                elseif($agn->CodEstVnt =='5'){
                                                    echo "<span class='label bg-indigo'>Visita</span>";
                                                        }
                                                elseif($agn->CodEstVnt =='6'){
                                                    echo "<span class='label bg-red'>Perdido</span>";
                                                        }
                                                else{
                                                    echo "<span class='label bg-teal'>Concluido</span>";
                                                        }
                                                ?>
                                                <?php 
                                                    if($agn->CodAvn =='1'){
                                                    echo "<span class='label bg-orange'>Primer Contacto</span>";
                                                        }
                                                elseif($agn->CodAvn =='2') {
                                                    echo "<span class='label bg-purple'>Propuesta Tecnica/Económica</span>";
                                                        }
                                                elseif($agn->CodAvn =='3') {
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
                                                    <a class='btn bg-orange btn-xs' data-toggle="modal" data-target="#editvnt-<?php echo $agn->CodVnt; ?>">
                                                    <i class='material-icons'>edit</i>
                                                    </a>
                                                </span>
                                                <a class='btn btn-DltVnt bg-red btn-xs' data-id="<?php echo $agn->CodVnt; ?>" data-toggle='tooltip' data-placement="bottom" title='Eliminar'>
                                                    <i class='material-icons'>close</i>
                                                </a>
                                                <a class='btn btn-UpdVntC bg-green btn-xs' data-id="<?php echo $agn->CodVnt; ?>" data-toggle='tooltip' data-placement="bottom" title='Concluido o Cerrado OC'>
                                                    <i class='material-icons'>done_all</i>
                                                </a>
                                                <a class='btn btn-UpdVntP bg-deep-orange btn-xs' data-id="<?php echo $agn->CodVnt; ?>" data-toggle='tooltip' data-placement="bottom" title='Perdido'>
                                                    <i class='material-icons'>remove_circle_outline</i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="200"># Carpeta</th>
                                            <td width="25">:</td>
                                            <td><?php echo $agn->CptVnt; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="200">Solución</th>
                                            <td width="25">:</td>
                                            <?php $i = 1; ?>
                                            <?php foreach($this->model->ObtProdList($agn->CodVnt) as $r): ?>
                                            <tr>                                            
                                                <th width="200"></th>
                                                <td width="25"><?php echo $i++ ?>)</td>
                                                <td><?php echo $r["FabProd"].' - '.$r["NomProd"] ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tr>
                                        <tr>
                                            <th width="200">Fecha Probable de OC</th>
                                            <td width="25">:</td>
                                            <td><?php echo $agn->FocVnt; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="200">Alias</th>
                                            <td width="25">:</td>
                                            <td><?php echo $agn->AliVnt; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="200">Contacto</th>
                                            <td width="25">:</td>
                                            <td><?php echo $agn->NomCont; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="200">Telefono</th>
                                            <td width="25">:</td>
                                            <td><?php echo $agn->TlfCli; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="200">Movil</th>
                                            <td width="25">:</td>
                                            <td><?php echo $agn->TlfCont; ?></td>
                                        </tr> 
                                        <tr>
                                            <th width="200">E-mail</th>
                                            <td width="25">:</td>
                                            <td><?php echo $agn->EmlCont; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="200">Observaciones</th>
                                            <td width="25">:</td>
                                            <td><?php echo $agn->DscVnt; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <!--EDIT CLI -->
                            <div class="modal fade" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" id="editvnt-<?php echo $agn->CodVnt; ?>" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-teal">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="calificacion">EDITAR <strong> <?php echo $agn->CptVnt; ?> - <?php echo $agn->NomCli; ?></strong></h4>
                                        </div>
                                        <form id="validate3" action="<?php echo urlencode('venta&a=UpdVntAgD'); ?>" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="row clearfix">
                                                    <input type="hidden" name="TxtCodVnt" value="<?php echo $agn->CodVnt; ?>" />
                                                    <input type="hidden" name="TxtCodAgn" value="<?php echo $agn->CodAgn; ?>" />
                                                    <div class="col-md-12">
                                                        <b>Cliente</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">account_balance</i>
                                                            </span>
                                                            <select id="TxtCodCliUpd" name="TxtCodCli" class="js-example-responsive form-control pmd-select2" style="width: 100%" disabled>
                                                                <?php foreach($this->model->ListCli() as $row): ?>
                                                                <option value="<?php echo $row->CodCli; ?>" data-nomcont="<?php echo $agn->NomCont; ?>" <?php if($row->NomCli==$agn->NomCli) echo "selected"; ?>  ><?php echo $row->NomCli; ?></option>
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
                                                                <input type="number" name="TxtCptVnt" class="form-control" value="<?php echo $agn->CptVnt; ?>" maxlength="9" minlength="1" min="0" required>
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
                                                                <input type="text" name="TxtFocVnt" class="datepicker form-control" value="<?php echo $agn->FocVnt; ?>" maxlength="10" minlength="5" required>
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
                                                                <option value="<?php echo $row->CodDetMrc; ?>" data-nomprod="<?php echo $agn->NomProd; ?>" <?php if($row->NomDetMrc==$agn->NomDetMrc) echo "selected"; ?> ><?php echo $row->NomDetMrc; ?></option>
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
                                                                <option value="<?php echo $row->CodProd; ?>" <?php if($row->NomProd==$agn->NomProd) echo "selected"; ?>  ><?php echo $row->FabProd.' - '.$row->NomProd; ?></option>
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
                                                                <option value="<?php echo $row->CodCont; ?>" <?php if($row->NomCont==$agn->NomCont) echo "selected"; ?>  ><?php echo $row->NomCont; ?></option>
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
                                                                <option value="<?php echo $row->CodEstVnt; ?>" <?php if($row->NomEstVnt==$agn->NomEstVnt) echo "selected"; ?> ><?php echo $row->NomEstVnt; ?></option>
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
                                                                <option value="<?php echo $row->CodAvn; ?>" <?php if($row->NomAvn==$agn->NomAvn) echo "selected"; ?> ><?php echo $row->NomAvn; ?></option>
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
                                                                <textarea rows="1" name="TxtAliVnt" class="form-control no-resize auto-growth" value="<?php echo $agn->AliVnt; ?>" maxlength="50" minlength="2" required><?php echo $agn->AliVnt; ?></textarea>
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
                                                                <textarea rows="1" name="TxtDscVnt" class="form-control no-resize auto-growth" value="<?php echo $agn->DscVnt; ?>" maxlength="100" minlength="2" required><?php echo $agn->DscVnt; ?></textarea>
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
                                        <a href="<?php echo urlencode('detallevnt&a=Index&CodVnt=').$agn->CodVnt; ?>">COTIZACIONES</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo urlencode('calificacionvnt&a=Index&CodVnt=').$agn->CodVnt; ?>">CALIFICACIÓN</a>
                                    </li>
                                    <li role="presentation" class="active">
                                        <a href="<?php echo urlencode('agenda&a=Index&CodVnt=').$agn->CodVnt; ?>">AGENDA</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo urlencode('stakeholder&a=Index&CodVnt=').$agn->CodVnt; ?>">STAKEHOLDER</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo urlencode('equipo&a=Index&CodVnt=').$agn->CodVnt; ?>">EQUIPO</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane animated flipInX active" id="agenda">
                                        <form id="sign_in" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="CodVnt" value="<?php echo $agn->CodVnt; ?>" />
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th width="120">Proceso de evento</th>
                                                        <td width="25">:</td>
                                                        <td>
                                                            <?php 
                                                                if($agn->CodAvnStk =='1'){
                                                                echo "<span class='label bg-orange'>Primer Contacto</span>";
                                                                    }
                                                            elseif($agn->CodAvnStk =='2') {
                                                                echo "<span class='label bg-purple'>Propuesta Tecnica/Económica</span>";
                                                                    }
                                                            elseif($agn->CodAvnStk =='3') {
                                                                echo "<span class='label bg-blue'>Negociación</span>";
                                                                    }
                                                            else{
                                                                echo "<span class='label bg-green'>Cierre / Orden Compra</span>";
                                                                    }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th width="120">Rol</th>
                                                        <td width="25">:</td>
                                                        <td>
                                                            <?php 
                                                                if($agn->CodRol =='1'){
                                                                echo "<span class='label bg-orange'>Decisor</span>";
                                                                    }
                                                            elseif($agn->CodRol =='2') {
                                                                echo "<span class='label bg-purple'>Usuario Final</span>";
                                                                    }
                                                            elseif($agn->CodRol =='3') {
                                                                echo "<span class='label bg-blue'>Recomendador Técnico</span>";
                                                                    }
                                                            elseif($agn->CodRol =='4') {
                                                                echo "<span class='label bg-green'>Influenciador</span>";
                                                                    }
                                                            elseif($agn->CodRol =='5') {
                                                                echo "<span class='label bg-deep-purple'>Sponsor</span>";
                                                                    }
                                                            else{
                                                                echo "<span class='label bg-red'>Coach</span>";
                                                                    }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th width="120">Stakeholder</th>
                                                        <td width="25">:</td>
                                                        <td><?php echo $agn->NomStk; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="120"># Télefono o Móvil</th>
                                                        <td width="25">:</td>
                                                        <td><?php echo $agn->TlfStk; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="120">Horario de Inicio</th>
                                                        <td width="25">:</td>
                                                        <td><?php echo $agn->FIniAgn; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="120">Horario de Fin</th>
                                                        <td width="25">:</td>
                                                        <td><?php echo $agn->FFinAgn; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="120">Titulo</th>
                                                        <td width="25">:</td>
                                                        <td><?php echo $agn->DscTAgn; ?></td>
                                                    </tr> 
                                                    <tr>
                                                        <th width="120">Descripción</th>
                                                        <td width="25">:</td>
                                                        <td><?php echo $agn->DscFAgn; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="120"></th>
                                                        <td width="25"></td>
                                                        <td align="right">
                                                            <span data-toggle='tooltip' data-placement="left" title='Editar evento'>
                                                                <a class='btn bg-orange btn-xs' data-toggle="modal" data-target="#edit-<?php echo $agn->CodAgn; ?>">
                                                                    <i class='material-icons'>edit</i>
                                                                </a>
                                                            </span>
                                                            <a class='btn btn-DltAgn bg-red btn-xs' data-id="<?php echo $agn->CodAgn; ?>" data-codvnt="<?php echo $agn->CodVnt; ?>" data-toggle='tooltip' data-placement="bottom" title='Eliminar'>
                                                                <i class='material-icons'>delete</i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                                <!--EDIT AGN -->
                                <div class="modal fade" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" id="edit-<?php echo $agn->CodAgn; ?>" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-teal">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title text-center" id="producto">EDITAR EVENTO AGENDA</h4>
                                            </div>
                                            <form id="validate2" action="<?php echo urlencode('agenda&a=UpdAgn'); ?>" method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="row clearfix">
                                                        <input type="hidden" name="TxtCodVnt" value="<?php echo $agn->CodVnt; ?>" />
                                                        <input type="hidden" name="TxtCodAgn" value="<?php echo $agn->CodAgn; ?>" />
                                                        <div class="col-md-6">
                                                            <b>Fecha y Hora de Inicio</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">today</i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <input type="text" name="TxtFIniAgn" class="date-start form-control" value="<?php echo $agn->FIniAgn; ?>" maxlength="25" minlength="5" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b>Fecha y Hora de Fin</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">insert_invitation</i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <input type="text" name="TxtFFinAgn" class="date-end form-control" value="<?php echo $agn->FFinAgn; ?>" maxlength="25" minlength="5" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b>Rol de Stakeholder</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">local_library</i>
                                                                </span>
                                                                <select id="TxtCodRolUpd" name="TxtCodRol" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                    <?php foreach($this->model->ObtRol() as $row): ?>
                                                                    <option value="<?php echo $row->CodRol; ?>" data-codvnt="<?php echo $agn->CodVnt; ?>" data-nomstk="<?php echo $agn->NomStk; ?>"
                                                                    <?php if($agn->NomRol==$row->NomRol) echo "selected"; ?> ><?php echo $row->NomRol; ?>
                                                                    </option>
                                                                    <?php endforeach; ?>
                                                                </select> 
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b>Stakeholder</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">contacts</i>
                                                                </span>
                                                                <select id="TxtCodStkUpd" name="TxtCodStk" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                                    <?php foreach($this->model->ObtStk() as $row): ?>
                                                                    <option value="<?php echo $row->CodStk; ?>" <?php if($agn->NomStk==$row->NomStk) { echo "selected"; ?> ><?php echo $row->NomStk; } else {  ?></option>
                                                                            <option></option>
                                                                        <?php } ?>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b>Proceso del Evento</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">done_all</i>
                                                                </span>
                                                                <select name="TxtCodAvn" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                    <?php foreach($this->model->ObtAvn() as $row): ?>
                                                                    <option value="<?php echo $row->CodAvn; ?>" <?php if($agn->NomAvnStk==$row->NomAvn) echo "selected"; ?> ><?php echo $row->NomAvn; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b>Titulo del Evento</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">format_size</i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <textarea rows="1" name="TxtDscTAgn" class="form-control no-resize auto-growth" value="<?php echo $agn->DscTAgn; ?>" maxlength="100" minlength="2" required><?php echo $agn->DscTAgn; ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <b>Descripción del Evento</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">border_color</i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <textarea rows="1" name="TxtDscFAgn" class="form-control no-resize auto-growth" value="<?php echo $agn->DscFAgn; ?>" maxlength="300" minlength="2" required><?php echo $agn->DscFAgn; ?></textarea>
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
                                <!--FIN EDIT AGN -->    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

