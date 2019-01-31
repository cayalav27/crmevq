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
                                <li class="active"><strong><?php echo $prec->NomCli; ?></strong></li>
                            </ol>
                        </div>
                        <div class="body table-responsive">
                            <form id="sign_in" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="CodVnt" value="<?php echo $prec->CodVnt; ?>" />
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th width="200">
                                                <?php
                                                if($prec->CodEstVnt =='1'){
                                                    echo "<span class='label bg-lime'>Pendiente</span>";
                                                        } 
                                                elseif($prec->CodEstVnt =='2') {
                                                    echo "<span class='label bg-pink'>Seguimiento</span>";
                                                        }
                                                elseif($prec->CodEstVnt =='3') {
                                                    echo "<span class='label bg-light-green'>Contactado</span>";
                                                        }
                                                elseif($prec->CodEstVnt =='4') {
                                                    echo "<span class='label bg-brown'>Programado</span>";
                                                        }
                                                elseif($prec->CodEstVnt =='5'){
                                                    echo "<span class='label bg-indigo'>Visita</span>";
                                                        }
                                                elseif($prec->CodEstVnt =='6'){
                                                    echo "<span class='label bg-red'>Perdido</span>";
                                                        }
                                                else{
                                                    echo "<span class='label bg-teal'>Concluido</span>";
                                                        }
                                                ?>
                                                <?php 
                                                    if($prec->CodAvn =='1'){
                                                    echo "<span class='label bg-orange'>Primer Contacto</span>";
                                                        }
                                                elseif($prec->CodAvn =='2') {
                                                    echo "<span class='label bg-purple'>Propuesta Tecnica/Económica</span>";
                                                        }
                                                elseif($prec->CodAvn =='3') {
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
                                                    <a class='btn bg-orange btn-xs' data-toggle="modal" data-target="#editvnt-<?php echo $prec->CodVnt; ?>">
                                                    <i class='material-icons'>edit</i>
                                                    </a>
                                                </span>
                                                <a class='btn btn-DltVnt bg-red btn-xs' data-id="<?php echo $prec->CodVnt; ?>" data-toggle='tooltip' data-placement="bottom" title='Eliminar'>
                                                    <i class='material-icons'>close</i>
                                                </a>
                                                <a class='btn btn-UpdVntC bg-green btn-xs' data-id="<?php echo $prec->CodVnt; ?>" data-toggle='tooltip' data-placement="bottom" title='Concluido o Cerrado OC'>
                                                    <i class='material-icons'>done_all</i>
                                                </a>
                                                <a class='btn btn-UpdVntP bg-deep-orange btn-xs' data-id="<?php echo $prec->CodVnt; ?>" data-toggle='tooltip' data-placement="bottom" title='Perdido'>
                                                    <i class='material-icons'>remove_circle_outline</i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="200"># Carpeta</th>
                                            <td width="25">:</td>
                                            <td><?php echo $prec->CptVnt; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="200">Solución</th>
                                            <td width="25">:</td>
                                            <?php $i = 1; ?>
                                            <?php foreach($this->model->ObtProdList($_REQUEST["CodVnt"]) as $r): ?>
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
                                            <td><?php echo $prec->FocVnt; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="200">Alias</th>
                                            <td width="25">:</td>
                                            <td><?php echo $prec->AliVnt; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="200">Contacto</th>
                                            <td width="25">:</td>
                                            <td><?php echo $prec->NomCont; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="200">Telefono</th>
                                            <td width="25">:</td>
                                            <td><?php echo $prec->TlfCli; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="200">Movil</th>
                                            <td width="25">:</td>
                                            <td><?php echo $prec->TlfCont; ?></td>
                                        </tr> 
                                        <tr>
                                            <th width="200">E-mail</th>
                                            <td width="25">:</td>
                                            <td><?php echo $prec->EmlCont; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="200">Observaciones</th>
                                            <td width="25">:</td>
                                            <td><?php echo $prec->DscVnt; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <!--EDIT CLI -->
                            <div class="modal fade" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" id="editvnt-<?php echo $prec->CodVnt; ?>" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-teal">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="calificacion">EDITAR <strong> <?php echo $prec->CptVnt; ?> - <?php echo $prec->NomCli; ?></strong></h4>
                                        </div>
                                        <form id="validate3" action="<?php echo urlencode('venta&a=UpdVntDp'); ?>" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="row clearfix">
                                                    <input type="hidden" name="TxtCodVnt" value="<?php echo $prec->CodVnt; ?>" />
                                                    <input type="hidden" name="TxtCodDetVnt" value="<?php echo $prec->CodDetVnt; ?>" />
                                                    <div class="col-md-12">
                                                        <b>Cliente</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">account_balance</i>
                                                            </span>
                                                            <select id="TxtCodCliUpd" name="TxtCodCli" class="js-example-responsive form-control pmd-select2" style="width: 100%" disabled>
                                                                <?php foreach($this->model->ListCli() as $row): ?>
                                                                <option value="<?php echo $row->CodCli; ?>" data-nomcont="<?php echo $prec->NomCont; ?>" <?php if($row->NomCli==$prec->NomCli) echo "selected"; ?>  ><?php echo $row->NomCli; ?></option>
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
                                                                <input type="number" name="TxtCptVnt" class="form-control" value="<?php echo $prec->CptVnt; ?>" maxlength="9" minlength="1" min="0" required>
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
                                                                <input type="text" name="TxtFocVnt" class="datepicker form-control" value="<?php echo $prec->FocVnt; ?>" maxlength="10" minlength="5" required>
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
                                                                <option value="<?php echo $row->CodDetMrc; ?>" data-nomprod="<?php echo $prec->NomProd; ?>" <?php if($row->NomDetMrc==$prec->NomDetMrc) echo "selected"; ?> ><?php echo $row->NomDetMrc; ?></option>
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
                                                                <option value="<?php echo $row->CodProd; ?>" <?php if($row->NomProd==$prec->NomProd) echo "selected"; ?>  ><?php echo $row->FabProd.' - '.$row->NomProd; ?></option>
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
                                                                <option value="<?php echo $row->CodCont; ?>" <?php if($row->NomCont==$prec->NomCont) echo "selected"; ?>  ><?php echo $row->NomCont; ?></option>
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
                                                                <option value="<?php echo $row->CodEstVnt; ?>" <?php if($row->NomEstVnt==$prec->NomEstVnt) echo "selected"; ?> ><?php echo $row->NomEstVnt; ?></option>
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
                                                                <option value="<?php echo $row->CodAvn; ?>" <?php if($row->NomAvn==$prec->NomAvn) echo "selected"; ?> ><?php echo $row->NomAvn; ?></option>
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
                                                                <textarea rows="1" name="TxtAliVnt" class="form-control no-resize auto-growth" value="<?php echo $prec->AliVnt; ?>" maxlength="50" minlength="2" required><?php echo $prec->AliVnt; ?></textarea>
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
                                                                <textarea rows="1" name="TxtDscVnt" class="form-control no-resize auto-growth" value="<?php echo $prec->DscVnt; ?>" maxlength="100" minlength="2" required><?php echo $prec->DscVnt; ?></textarea>
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
                                    <li role="presentation" class="active">
                                        <a href="<?php echo urlencode('detallevnt&a=Index&CodVnt=').$prec->CodVnt; ?>">COTIZACIONES</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo urlencode('calificacionvnt&a=Index&CodVnt=').$prec->CodVnt; ?>">CALIFICACIÓN</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo urlencode('agenda&a=Index&CodVnt=').$prec->CodVnt; ?>">AGENDA</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo urlencode('stakeholder&a=Index&CodVnt=').$prec->CodVnt; ?>">STAKEHOLDER</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo urlencode('equipo&a=Index&CodVnt=').$prec->CodVnt; ?>">EQUIPO</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane animated flipInX active" id="cotizacion">
                                        <form id="sign_in" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="CodVnt" value="<?php echo $prec->CodVnt; ?>" />
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th width="120">
                                                            <?php
                                                                if($prec->Indicador =='1'){
                                                                    echo "<span class='label label-success'>Activo</span>";
                                                                                              }
                                                                else {
                                                                    echo "<span class='label label-danger'>Inactivo</span>";
                                                                      } 
                                                            ?>
                                                        </th>
                                                        <td width="25"></td>
                                                        <td align="right">
                                                            <?php
                                                            if($prec->Indicador =='1'){
                                                                echo "<span data-toggle='tooltip' data-placement='left' title='Editar producto'>
                                                                        <a class='btn bg-orange btn-xs' data-toggle='modal' data-target='#edit-".$prec->CodDetVnt."'>
                                                                            <i class='material-icons'>edit</i>
                                                                        </a>
                                                                    </span>";
                                                                }
                                                            else {
                                                                echo "<span data-toggle='tooltip' data-placement='left' title='Inactivo'>
                                                                        <a class='btn bg-orange btn-xs disabled'>
                                                                            <i class='material-icons'>edit</i>
                                                                        </a>
                                                                    </span>";
                                                                  } 
                                                            ?>
                                                            <a class='btn btn-DltDetVnt bg-blue btn-xs' data-id="<?php echo $prec->CodDetVnt; ?>" data-codvnt="<?php echo $prec->CodVnt; ?>" data-ind="<?php echo $prec->Indicador; ?>" data-toggle='tooltip' data-placement="bottom" title='<?php
                                                                if($prec->Indicador =='1'){
                                                                    echo "Desactivar";
                                                                                              }
                                                                else {
                                                                    echo "Activar";
                                                                      } 
                                                            ?>'>
                                                                <i class='material-icons'>update</i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th width="120">Linea</th>
                                                        <td width="25">:</td>
                                                        <td><?php echo $prec->NomDetMrc; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="120">Producto</th>
                                                        <td width="25">:</td>
                                                        <td><?php echo $prec->FabProd.' - '.$prec->NomProdDet; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="120">Cantidad</th>
                                                        <td width="25">:</td>
                                                        <td><?php echo $prec->CntDetVnt; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="120">Precio Lista</th>
                                                        <td width="25">:</td>
                                                        <td>
                                                            <?php 
                                                                if ($prec->PrcProd =="0") echo number_format("0.00",2);
                                                                else echo number_format($prec->PrcProd,2) 
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th width="120">Precio Costo</th>
                                                        <td width="25">:</td>
                                                        <td>
                                                            <?php 
                                                                if ($prec->PrcCst =="0") echo number_format("0.00",2);
                                                                else echo number_format($prec->PrcCst,2)
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th width="120">Descuento</th>
                                                        <td width="25">:</td>
                                                        <td><?php echo $prec->Dsc; ?>%</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="120">Precio de costo x TP</th>
                                                        <td width="25">:</td>
                                                        <td>
                                                            <?php 
                                                                if ($prec->PrcCstCamb =="0") echo number_format("0.00",2);
                                                                else echo number_format($prec->PrcCstCamb ,2)
                                                            ?>
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <th width="120">Costo Total</th>
                                                        <td width="25">:</td>
                                                        <td>
                                                            <?php 
                                                                if ($prec->CstTot =="0") echo number_format("0.00",2);
                                                                else echo number_format($prec->CstTot ,2)
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th width="120">P.U. Sin IGV</th>
                                                        <td width="25">:</td>
                                                        <td>
                                                            <?php 
                                                                if ($prec->PUSigv =="0") echo number_format("0.00",2);
                                                                else echo number_format($prec->PUSigv ,2)
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th width="120">P.T. Sin IGV</th>
                                                        <td width="25">:</td>
                                                        <td>
                                                            <?php 
                                                                if ($prec->PTSigv =="0") echo number_format("0.00",2);
                                                                else echo number_format($prec->PTSigv ,2)
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th width="120">Tipo de Cambio</th>
                                                        <td width="25">:</td>
                                                        <td><?php echo $prec->NomTpCmb; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th width="120">Factor</th>
                                                        <td width="25">:</td>
                                                        <td><?php echo $prec->NomFac; ?> => <?php echo $prec->NumFac; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                                <!--EDIT PREC -->
                                <div class="modal fade" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" id="edit-<?php echo $prec->CodDetVnt; ?>" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-teal">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title text-center" id="producto">EDITAR PRECIO</h4>
                                            </div>
                                            <form id="validate2" action="<?php echo urlencode('detallevnt&a=UpdDetVnt'); ?>" method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="row clearfix">
                                                        <input type="hidden" name="TxtCodVnt" value="<?php echo $prec->CodVnt; ?>" />
                                                        <input type="hidden" name="TxtCodDetVnt" value="<?php echo $prec->CodDetVnt; ?>" />
                                                        <div class="col-md-6">
                                                            <b>Cantidad</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">control_point</i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <input type="number" step="any" name="TxtCntDetVnt" class="form-control" value="<?php echo $prec->CntDetVnt; ?>" maxlength="3" minlength="1" min="0" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b>Linea</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">credit_card</i>
                                                                </span>
                                                                <select name="TxtCodDetMrc" class="js-example form-control pmd-select2" style="width: 100%" disabled>
                                                                    <?php foreach($this->model->ListDetMrc($iduser = $objses->get('CodPrf')) as $row): ?>
                                                                    <option value="<?php echo $row->CodDetMrc; ?>" <?php if($prec->NomDetMrc==$row->NomDetMrc) echo "selected"; ?> ><?php echo $row->NomDetMrc; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <b>Producto</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">shopping_cart</i>
                                                                </span>
                                                                <select name="TxtCodProd" class="js-example-responsive form-control pmd-select2" style="width: 100%" disabled>
                                                                    <?php foreach($this->model->ListProd($iduser = $objses->get('CodPrf')) as $row): ?>
                                                                    <option value="<?php echo $row->CodProd; ?>" <?php if($prec->NomProdDet==$row->NomProd) echo "selected"; ?> ><?php echo $row->FabProd.' - '.$row->NomProd; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <b>Descuento</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">trending_down</i>
                                                                </span>
                                                                <select name="TxtCodDsc" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                                    <option selected disabled></option>
                                                                    <?php foreach($this->model->ListDsc() as $row): ?>
                                                                    <option value="<?php echo $row->CodDsc; ?>" <?php if($prec->NomDsc==$row->NomDsc) echo "selected"; ?> ><?php echo $row->NomDsc; ?>%</option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <b>Tipo Cambio</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">euro_symbol</i>
                                                                </span>
                                                                <select name="TxtCodTpCmb" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                                    <option selected disabled></option>
                                                                    <?php foreach($this->model->ListTpCmb() as $row): ?>
                                                                    <option value="<?php echo $row->CodTpCmb; ?>" <?php if($prec->NomTpCmb==$row->NomTpCmb) echo "selected"; ?> ><?php echo $row->NomTpCmb; ?> => <?php echo $row->NumTpCmb; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <b>Factor</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">content_paste</i>
                                                                </span>
                                                                <select name="TxtCodFac" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                                    <?php foreach($this->model->ObtFac() as $row): ?>
                                                                    <option value="<?php echo $row->CodFac; ?>" <?php if($prec->NomFac==$row->NomFac) echo "selected"; ?> > 
                                                                            <?php echo $row->NomFac; ?></option>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
