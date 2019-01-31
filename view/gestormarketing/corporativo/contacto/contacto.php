    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="card">
                        <div class="header">
                            <ol class="breadcrumb breadcrumb-col-red">
                                <li>
                                    <span data-toggle='tooltip' data-placement="bottom" title='Volver'>
                                        <a href="clientemkt"><i class="material-icons">account_balance</i> Clientes</a>
                                    </span>
                                </li>
                                <li class="active"><strong><?php echo $cont->RucCli; ?> - <?php echo $cont->NomCli; ?></strong></li>
                            </ol>
                        </div>
                        <div class="body table-responsive">
                            <form id="sign_in" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="TxtCodCli" value="<?php echo $cont->CodCli; ?>" />
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th width="100">
                                                <?php 
                                                    if($cont->DscTip=='Privado'){
                                                    echo "<span class='label bg-pink'>Privado</span>";
                                                                              }
                                                    else {
                                                        echo "<span class='label bg-indigo'>Publico</span>";
                                                          }
                                                ?>
                                                <?php 
                                                    if($cont->EstCli=='1'){
                                                        echo "<span class='label label-success'> Activo</span>";
                                                                                  }
                                                    else {
                                                        echo "<span class='label label-danger'> Inactivo</span>";
                                                          }
                                                ?>
                                            </th>
                                            <td width="25"></td>
                                            <td align="right">
                                                <span data-toggle='tooltip' data-placement="left" title='Editar cliente'>
                                                    <a class='btn bg-orange btn-xs' data-toggle="modal" data-target="#editcli-<?php echo $cont->CodCli; ?>">
                                                        <i class='material-icons'>edit</i>
                                                    </a>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="100">Dirección</th>
                                            <td width="25">:</td>
                                            <td><?php echo $cont->DirCli; ?>, <?php echo $cont->NomCiu; ?>, <?php echo $cont->NomPais; ?>.</td>
                                        </tr>
                                        <tr>
                                            <th width="100">Telefono</th>
                                            <td width="25">:</td>
                                            <td><?php echo $cont->TlfCli; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="100">E-mail</th>
                                            <td width="25">:</td>
                                            <td><?php echo $cont->EmlCli; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="100">Origen</th>
                                            <td width="25">:</td>
                                            <td><?php echo $cont->DscOgn; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="100">Actividad</th>
                                            <td width="25">:</td>
                                            <td><?php echo $cont->DscAct; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="100">Consorcio</th>
                                            <td width="25">:</td>
                                            <?php 
                                                if($cont->CnsCli=='1') { ?>
                                                <td>
                                                    <label style="color:#4CAF50"><b><i class="material-icons small" style="color:#4CAF50">done</i></b> SI </label>
                                                </td>
                                            <?php   } else { ?>
                                                <td>
                                                    <label style="color:#F44336"><b><i class="material-icons small" style="color:#F44336">close</i></b> NO </label>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <!--EDIT CLI -->
                            <div class="modal fade" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" id="editcli-<?php echo $cont->CodCli; ?>" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-teal">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="calificacion">EDITAR - <strong><?php echo $cont->NomCli; ?></strong></h4>
                                        </div>
                                        <form id="validate3" action="<?php echo urlencode('clientemkt&a=UpdCli'); ?>" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="row clearfix">
                                                    <input type="hidden" name="TxtCodCli" value="<?php echo $cont->CodCli; ?>" />
                                                    <div class="col-md-4">
                                                        <b>RUC</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">work</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="number" id="TxtRucCli" name="TxtRucCli" class="form-control" value="<?php echo $cont->RucCli; ?>" maxlength="11" minlength="11" min="0" disabled> 
                                                            </div>
                                                            <label for="ruc"></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b>Razón Social</b>
                                                        <div class="input-group form-float form-group-sm" >
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">font_download</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <textarea rows="1" name="TxtNomCli" class="form-control no-resize auto-growth" value="<?php echo $cont->NomCli; ?>" maxlength="100" minlength="5" required><?php echo $cont->NomCli; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b># Telefono</b>
                                                        <div class="input-group form-float form-group-sm" >
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">call</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="number" name="TxtTlfCli" class="form-control" value="<?php echo $cont->TlfCli; ?>" maxlength="9" minlength="7" min="0" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b>Dirección Fiscal</b>
                                                        <div class="input-group form-float form-group-sm" >
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">directions</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <textarea rows="1" name="TxtDirCli" class="form-control no-resize auto-growth" value="<?php echo $cont->DirCli; ?>" maxlength="100" minlength="5" required><?php echo $cont->DirCli; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b>E-mail</b>
                                                        <div class="input-group form-float form-group-sm" >
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">mail</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="email" name="TxtEmlCli" class="form-control" value="<?php echo $cont->EmlCli; ?>" maxlength="50" minlength="5" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b>Consorcio</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">accessibility</i>
                                                            </span>
                                                            <div class="demo-radio-button">
                                                                <input name="TxtCnsCli" type="radio" id="CnsSI" class="with-gap radio-col-green" value="1" <?php if($cont->CnsCli=="1") echo "checked"; ?> required/>
                                                                    <label for="CnsSI">SI</label>
                                                                <input name="TxtCnsCli" type="radio" id="CnsNO" class="with-gap radio-col-red" value="0"  <?php if($cont->CnsCli=="0") echo "checked"; ?> required/>
                                                                    <label for="CnsNO">NO</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b>Estado SUNAT</b>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">layers</i>
                                                            </span>
                                                            <select  name="TxtEstCli" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                <option selected disabled></option>
                                                                <option value="1" <?php if($cont->EstCli=="1") echo "selected";?> >Activo</option>
                                                                <option value="0" <?php if($cont->EstCli=="0") echo "selected";?> >Inactivo</option>
                                                            </select>  
                                                        </div>                                                           
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b>Pais</b>
                                                        <div class="input-group" >
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">place</i>
                                                            </span>
                                                            <select id="TxtCodPaisUpd" name="TxtCodPais" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                                <?php foreach($this->model->ObtPais() as $row): ?>
                                                                    <option value="<?php echo $row->CodPais; ?>" data-nomciu="<?php echo $cont->NomCiu; ?>" <?php if($cont->NomPais==$row->NomPais) echo "selected"; ?> >
                                                                        <?php echo $row->NomPais; ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b>Ciudad</b>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">streetview</i>
                                                            </span>
                                                            <select id="TxtCodCiuUpd" name="TxtCodCiu" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                                <?php foreach($this->model->ObtCiu() as $row): ?>
                                                                    <option value="<?php echo $row->CodCiu; ?>" <?php if($cont->NomCiu==$row->NomCiu) echo "selected"; ?> >
                                                                        <?php echo $row->NomCiu; ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b>Sector</b>
                                                        <div class="input-group">
                                                            <span class="input-group-addon pmd-textfield">
                                                                <i class="material-icons">location_city</i>
                                                            </span>
                                                            <select  name="TxtCodTip" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                <?php foreach($this->model->ObtTip() as $row): ?>
                                                                <option value="<?php echo $row->CodTip; ?>" <?php if($cont->DscTip==$row->DscTip) echo "selected"; ?> ><?php echo $row->DscTip; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>  
                                                        </div>                                                           
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b>Actividad</b>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">local_library</i>
                                                            </span>
                                                            <select  name="TxtCodAct" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                                <?php foreach($this->model->ObtAct() as $row): ?>
                                                                <option value="<?php echo $row->CodAct; ?>" <?php if($cont->DscAct==$row->DscAct) echo "selected"; ?> ><?php echo $row->DscAct; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>  
                                                        </div>                                                           
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b>Origen</b>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">contact_mail</i>
                                                            </span>
                                                            <select name="TxtCodOgn" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                                <?php foreach($this->model->ObtOgn() as $row): ?>
                                                                <option value="<?php echo $row->CodOgn; ?>" <?php if($cont->DscOgn==$row->DscOgn) echo "selected"; ?> ><?php echo $row->DscOgn; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>  
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
                                        <a href="<?php echo urlencode('contactomkt&a=Index&CodCli=').$cont->CodCli; ?>">CONTACTOS</a>
                                    </li>
                                    <li role="presentation">
                                        <?php if ($cont->CnsCli == '1') { ?>
                                                <a href="<?php echo urlencode('consorciomkt&a=Index&CodCli=').$cont->CodCli; ?>">EMPRESAS</a>
                                        <?php } else { ?>
                                                <a>EMPRESAS</a>
                                        <?php } ?>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane animated fadeInRight active" id="contacto">
                                       <table id="dtable" class="display compact" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th># Movil</th>
                                                    <th>Nombre Contacto </th>
                                                    <th>Area</th>
                                                    <th>Cargo</th>
                                                    <th>Email</th>
                                                    <th>Opción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach($this->model->ListCont($_REQUEST["CodCli"]) as $r): ?>
                                                <tr>
                                                    <td><?php echo $i++ ?></td>
                                                    <td>
                                                        <a class='btn-DltCont' data-id="<?php echo $r['CodCont'] ?>" data-codcli="<?php echo $r['CodCli'] ?>" data-toggle='tooltip' data-placement="bottom" title='Eliminar' style="color:#cc0000">
                                                            <?php echo $r["TlfCont"] ?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $r["NomCont"] ?></td>
                                                    <td><?php echo $r["AreCont"] ?></td>
                                                    <td><?php echo $r["CrgCont"] ?></td>
                                                    <td><?php echo $r["EmlCont"] ?></td>
                                                    <td align="center">
                                                        <span data-toggle='tooltip' data-placement="left" title='Editar contacto'>
                                                            <a class='btn bg-orange btn-xs' data-toggle="modal" data-target="#edit-<?php echo $r["CodCont"] ?>">
                                                                <i class='material-icons'>edit</i>
                                                            </a>
                                                        </span>
                                                    </td>
                                                </tr> 
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- EDIT CONT -->
                                <?php foreach($this->model->ListCont($_REQUEST["CodCli"]) as $r): ?>
                                    <div class="modal fade" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" id="edit-<?php echo $r["CodCont"] ?>" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-teal">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title text-center" id="contacto">EDITAR - <strong><?php echo $r["NomCont"] ?></strong></h4>
                                                </div>
                                                <form id="validate2" action="<?php echo urlencode('contactomkt&a=UpdCont'); ?>" method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="row clearfix">
                                                            <input type="hidden" name="TxtCodCli" value="<?php echo $r["CodCli"] ?>" />
                                                            <input type="hidden" name="TxtCodCont" value="<?php echo $r["CodCont"] ?>"/>
                                                            <div class="col-md-6">
                                                                <b>Contacto</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">person</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <input type="text" name="TxtNomCont" class="form-control" maxlength="80" minlength="5" value="<?php echo $r["NomCont"] ?>" required> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <b>E-mail</b>
                                                                <div class="input-group form-float form-group-sm" >
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">mail</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <input type="text" name="TxtEmlCont" class="form-control" maxlength="50" minlength="5" value="<?php echo $r["EmlCont"] ?>" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <b># Telefono</b>
                                                                <div class="input-group form-float form-group-sm" >
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">call</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <input type="number" name="TxtTlfCont" class="form-control" maxlength="9" minlength="3" value="<?php echo $r["TlfCont"] ?>" min="0" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <b>Área</b>
                                                                <div class="input-group form-float form-group-sm" >
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">domain</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <input type="text" name="TxtAreCont" class="form-control" maxlength="50" minlength="5" value="<?php echo $r["AreCont"] ?>" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <b>Cargo</b>
                                                                <div class="input-group form-float form-group-sm" >
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">school</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <input type="text" name="TxtCrgCont" class="form-control" maxlength="25" minlength="5" value="<?php echo $r["CrgCont"] ?>" required>
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
                                <!-- FIN EDIT CONT -->
                                <div class="text-left" role="group" aria-label="Justified button group">
                                    <span data-toggle='tooltip' data-placement="right" title='Nuevo contacto'>
                                        <a class="btn bg-purple btn-xs" data-toggle="modal" data-target="#nuevocontacto">
                                            <i class='material-icons'>add</i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <!-- ADD CONT -->
                            <div class="modal fade" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" id="nuevocontacto" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-teal">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="contacto">NUEVO CONTACTO</h4>
                                        </div>
                                        <form id="validate1" action="<?php echo urlencode('contactomkt&a=RegCont'); ?>" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="row clearfix">
                                                    <input type="hidden" name="TxtCodCli" value="<?php echo $cont->CodCli; ?>" />
                                                    <div class="col-md-6">
                                                        <b>Nombres y Apellidos</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">person</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="text" name="TxtNomCont" class="form-control" maxlength="80" minlength="5" required> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>E-mail</b>
                                                        <div class="input-group form-float form-group-sm" >
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">mail</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="email" name="TxtEmlCont" class="form-control" maxlength="50" minlength="5" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b># Movil</b>
                                                        <div class="input-group form-float form-group-sm" >
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">call</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="number" name="TxtTlfCont" class="form-control" maxlength="9" minlength="7" min="0" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Área</b>
                                                        <div class="input-group form-float form-group-sm" >
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">domain</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="text" name="TxtAreCont" class="form-control" maxlength="50" minlength="5" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Cargo</b>
                                                        <div class="input-group form-float form-group-sm" >
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">school</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="text" name="TxtCrgCont" class="form-control" maxlength="25" minlength="5" required>
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
                                                        <i class="material-icons">close</i>
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
                            <!-- FIN ADD CONT -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




