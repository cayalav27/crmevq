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
                                <li class="active"><strong><?php echo $cal->NomCli; ?></strong></li>
                            </ol>
                        </div>         
                        <div class="body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th width="200">
                                            <?php
                                            if($cal->CodEstVnt =='1'){
                                                echo "<span class='label bg-lime'>Pendiente</span>";
                                                    } 
                                            elseif($cal->CodEstVnt =='2') {
                                                echo "<span class='label bg-pink'>Seguimiento</span>";
                                                    }
                                            elseif($cal->CodEstVnt =='3') {
                                                echo "<span class='label bg-light-green'>Contactado</span>";
                                                    }
                                            elseif($cal->CodEstVnt =='4') {
                                                echo "<span class='label bg-brown'>Programado</span>";
                                                    }
                                            elseif($cal->CodEstVnt =='5'){
                                                echo "<span class='label bg-indigo'>Visita</span>";
                                                    }
                                            elseif($cal->CodEstVnt =='6'){
                                                echo "<span class='label bg-red'>Perdido</span>";
                                                    }
                                            else{
                                                echo "<span class='label bg-teal'>Concluido</span>";
                                                    }
                                            ?>
                                            <?php 
                                                if($cal->CodAvn =='1'){
                                                echo "<span class='label bg-orange'>Primer Contacto</span>";
                                                    }
                                            elseif($cal->CodAvn =='2') {
                                                echo "<span class='label bg-purple'>Propuesta Tecnica/Económica</span>";
                                                    }
                                            elseif($cal->CodAvn =='3') {
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
                                                <a class='btn bg-orange btn-xs' data-toggle="modal" data-target="#edit-<?php echo $cal->CodVnt; ?>">
                                                <i class='material-icons'>edit</i>
                                                </a>
                                            </span>
                                            <a class='btn btn-DltVnt bg-red btn-xs' data-id="<?php echo $cal->CodVnt; ?>" data-toggle='tooltip' data-placement="bottom" title='Eliminar'>
                                                    <i class='material-icons'>close</i>
                                                </a>
                                            <a class='btn btn-UpdVntC bg-green btn-xs' data-id="<?php echo $cal->CodVnt; ?>" data-toggle='tooltip' data-placement="bottom" title='Concluido o Cerrado OC'>
                                                <i class='material-icons'>done_all</i>
                                            </a>
                                            <a class='btn btn-UpdVntP bg-deep-orange btn-xs' data-id="<?php echo $cal->CodVnt; ?>" data-toggle='tooltip' data-placement="bottom" title='Perdido'>
                                                <i class='material-icons'>remove_circle_outline</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="200"># Carpeta</th>
                                        <td width="25">:</td>
                                        <td><?php echo $cal->CptVnt; ?></td>
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
                                        <td><?php echo $cal->FocVnt; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="200">Alias</th>
                                        <td width="25">:</td>
                                        <td><?php echo $cal->AliVnt; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="200">Contacto</th>
                                        <td width="25">:</td>
                                        <td><?php echo $cal->NomCont; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="200">Telefono</th>
                                        <td width="25">:</td>
                                        <td><?php echo $cal->TlfCli; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="200">Movil</th>
                                        <td width="25">:</td>
                                        <td><?php echo $cal->TlfCont; ?></td>
                                    </tr> 
                                    <tr>
                                        <th width="200">E-mail</th>
                                        <td width="25">:</td>
                                        <td><?php echo $cal->EmlCont; ?></td>
                                    </tr>
                                    <tr>
                                        <th width="200">Observaciones</th>
                                        <td width="25">:</td>
                                        <td><?php echo $cal->DscVnt; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--EDIT CLI -->
                            <div class="modal fade" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" id="edit-<?php echo $cal->CodVnt; ?>" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-teal">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="calificacion">EDITAR <strong> <?php echo $cal->CptVnt; ?> - <?php echo $cal->NomCli; ?></strong></h4>
                                        </div>
                                        <form id="validate3" action="<?php echo urlencode('venta&a=UpdVntCal'); ?>" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="row clearfix">
                                                    <input type="hidden" name="TxtCodVnt" value="<?php echo $cal->CodVnt; ?>" />
                                                    <div class="col-md-12">
                                                        <b>Cliente</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">account_balance</i>
                                                            </span>
                                                            <select id="TxtCodCliUpd" name="TxtCodCli" class="js-example-responsive form-control pmd-select2" style="width: 100%" disabled>
                                                                <?php foreach($this->model->ListCli() as $row): ?>
                                                                <option value="<?php echo $row->CodCli; ?>" data-nomcont="<?php echo $cal->NomCont; ?>" <?php if($row->NomCli==$cal->NomCli) echo "selected"; ?>  ><?php echo $row->NomCli; ?></option>
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
                                                                <input type="number" name="TxtCptVnt" class="form-control" value="<?php echo $cal->CptVnt; ?>" maxlength="9" minlength="1" min="0" required>
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
                                                                <input type="text" name="TxtFocVnt" class="datepicker form-control" value="<?php echo $cal->FocVnt; ?>" maxlength="10" minlength="5" required>
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
                                                                <option value="<?php echo $row->CodDetMrc; ?>" data-nomprod="<?php echo $cal->NomProd; ?>" <?php if($row->NomDetMrc==$cal->NomDetMrc) echo "selected"; ?> ><?php echo $row->NomDetMrc; ?></option>
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
                                                                <option value="<?php echo $row->CodProd; ?>" <?php if($row->NomProd==$cal->NomProd) echo "selected"; ?>  ><?php echo $row->FabProd.' - '.$row->NomProd; ?></option>
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
                                                                <option value="<?php echo $row->CodCont; ?>" <?php if($row->NomCont==$cal->NomCont) echo "selected"; ?>  ><?php echo $row->NomCont; ?></option>
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
                                                                <option value="<?php echo $row->CodEstVnt; ?>" <?php if($row->NomEstVnt==$cal->NomEstVnt) echo "selected"; ?> ><?php echo $row->NomEstVnt; ?></option>
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
                                                                <option value="<?php echo $row->CodAvn; ?>" <?php if($row->NomAvn==$cal->NomAvn) echo "selected"; ?> ><?php echo $row->NomAvn; ?></option>
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
                                                                <textarea rows="1" name="TxtAliVnt" class="form-control no-resize auto-growth" value="<?php echo $cal->AliVnt; ?>" maxlength="50" minlength="2" required><?php echo $cal->AliVnt; ?></textarea>
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
                                                                <textarea rows="1" name="TxtDscVnt" class="form-control no-resize auto-growth" value="<?php echo $cal->DscVnt; ?>" maxlength="100" minlength="2" required><?php echo $cal->DscVnt; ?></textarea>
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
                            <form id="sign_in" action="<?php echo urlencode('calificacionvnt&a=UpdCalVnt'); ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="TxtCodVnt" value="<?php echo $cal->CodVnt; ?>" />
                                <input type="hidden" name="TxtCodCalVnt" value="<?php echo $cal->CodCalVnt; ?>" />
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <ul class="nav nav-tabs tab-col-teal" role="tablist">
                                        <li role="presentation">
                                            <a href="<?php echo urlencode('detallevnt&a=Index&CodVnt=').$cal->CodVnt; ?>">COTIZACIONES</a>
                                        </li>
                                        <li role="presentation" class="active">
                                            <a href="<?php echo urlencode('calificacionvnt&a=Index&CodVnt=').$cal->CodVnt; ?>">CALIFICACIÓN</a>
                                        </li>
                                        <li role="presentation">
                                            <a href="<?php echo urlencode('agenda&a=Index&CodVnt=').$cal->CodVnt; ?>">AGENDA</a>
                                        </li>
                                        <li role="presentation">
                                            <a href="<?php echo urlencode('stakeholder&a=Index&CodVnt=').$cal->CodVnt; ?>">STAKEHOLDER</a>
                                        </li>
                                        <li role="presentation">
                                            <a href="<?php echo urlencode('equipo&a=Index&CodVnt=').$cal->CodVnt; ?>">EQUIPO</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane animated fadeInRight active" id="calificacion">
                                            <div id="wizard_horizontal">
                                                <?php foreach($this->model->ObtPrgCal($iduser = $objses->get('CodPrf')) as $r): ?>
                                                <h2>Primer Contacto</h2>
                                                <section>
                                                    <div class="body"  style="font-size: 11px">
                                                        <div class="col-md-4">
                                                            <b>P1: <?php echo $r->Pg1PrgCal; ?></b><br><br>
                                                            <input name="TxtCl1CalVnt" type="radio" id="radio_0" value="0" <?php if($cal->Cl1CalVnt=="0") echo "checked"; ?>  />
                                                            <label for="radio_0">0 - Ninguno</label><br>  
                                                            <input name="TxtCl1CalVnt" type="radio" id="radio_1" value="1" <?php if($cal->Cl1CalVnt=="1") echo "checked"; ?> />
                                                            <label for="radio_1">1 - Minimo / Nulo</label><br>
                                                            <input name="TxtCl1CalVnt" type="radio" id="radio_2" value="2" <?php if($cal->Cl1CalVnt=="2") echo "checked"; ?> />
                                                            <label for="radio_2">2 - Poco / Deficiente</label><br>
                                                            <input name="TxtCl1CalVnt" type="radio" id="radio_3" value="3" <?php if($cal->Cl1CalVnt=="3") echo "checked"; ?> />
                                                            <label for="radio_3">3 - Intermedio / Regular</label><br>
                                                            <input name="TxtCl1CalVnt" type="radio" id="radio_4" value="4" <?php if($cal->Cl1CalVnt=="4") echo "checked"; ?> />
                                                            <label for="radio_4">4 - Bueno</label><br>
                                                            <input name="TxtCl1CalVnt" type="radio" id="radio_5" value="5" <?php if($cal->Cl1CalVnt=="5") echo "checked"; ?> />
                                                            <label for="radio_5">5 - Favorable</label><br>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <b>P2: <?php echo $r->Pg2PrgCal; ?></b><br><br>
                                                            <input name="TxtCl2CalVnt" type="radio" id="radio_6" value="0" <?php if($cal->Cl2CalVnt=="0") echo "checked"; ?> />
                                                            <label for="radio_6">0 - Ninguno</label><br>  
                                                            <input name="TxtCl2CalVnt" type="radio" id="radio_7" value="1" <?php if($cal->Cl2CalVnt=="1") echo "checked"; ?> />
                                                            <label for="radio_7">1 - Minimo / Nulo</label><br>
                                                            <input name="TxtCl2CalVnt" type="radio" id="radio_8" value="2" <?php if($cal->Cl2CalVnt=="2") echo "checked"; ?> />
                                                            <label for="radio_8">2 - Poco / Deficiente</label><br>
                                                            <input name="TxtCl2CalVnt" type="radio" id="radio_9" value="3" <?php if($cal->Cl2CalVnt=="3") echo "checked"; ?> />
                                                            <label for="radio_9">3 - Intermedio / Regular</label><br>
                                                            <input name="TxtCl2CalVnt" type="radio" id="radio_10" value="4" <?php if($cal->Cl2CalVnt=="4") echo "checked"; ?> />
                                                            <label for="radio_10">4 - Bueno</label><br>
                                                            <input name="TxtCl2CalVnt" type="radio" id="radio_11" value="5" <?php if($cal->Cl2CalVnt=="5") echo "checked"; ?> />
                                                            <label for="radio_11">5 - Favorable</label><br>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <b>P3: <?php echo $r->Pg3PrgCal; ?></b><br><br>
                                                            <input name="TxtCl3CalVnt" type="radio" id="radio_12" value="0" <?php if($cal->Cl3CalVnt=="0") echo "checked"; ?> />
                                                            <label for="radio_12">0 - Ninguno</label><br>  
                                                            <input name="TxtCl3CalVnt" type="radio" id="radio_13" value="1" <?php if($cal->Cl3CalVnt=="1") echo "checked"; ?> />
                                                            <label for="radio_13">1 - Minimo / Nulo</label><br>
                                                            <input name="TxtCl3CalVnt" type="radio" id="radio_14" value="2" <?php if($cal->Cl3CalVnt=="2") echo "checked"; ?> />
                                                            <label for="radio_14">2 - Poco / Deficiente</label><br>
                                                            <input name="TxtCl3CalVnt" type="radio" id="radio_15" value="3" <?php if($cal->Cl3CalVnt=="3") echo "checked"; ?> />
                                                            <label for="radio_15">3 - Intermedio / Regular</label><br>
                                                            <input name="TxtCl3CalVnt" type="radio" id="radio_16" value="4" <?php if($cal->Cl3CalVnt=="4") echo "checked"; ?> />
                                                            <label for="radio_16">4 - Bueno</label><br>
                                                            <input name="TxtCl3CalVnt" type="radio" id="radio_17" value="5" <?php if($cal->Cl3CalVnt=="5") echo "checked"; ?> />
                                                            <label for="radio_17">5 - Favorable</label><br>
                                                        </div>
                                                    </div>
                                                </section>                   
                                                <h2>Propuesta Tecnica / Económica</h2>
                                                <section>
                                                    <div class="body"  style="font-size: 11px">
                                                        <div class="col-md-4">
                                                            <b>P4: <?php echo $r->Pg4PrgCal; ?></b><br><br>
                                                            <input name="TxtCl4CalVnt" type="radio" id="radio_18" value="0" <?php if($cal->Cl4CalVnt=="0") echo "checked"; ?>/>
                                                            <label for="radio_18">0 - Ninguno</label><br>  
                                                            <input name="TxtCl4CalVnt" type="radio" id="radio_19" value="1" <?php if($cal->Cl4CalVnt=="1") echo "checked"; ?>/>
                                                            <label for="radio_19">1 - Minimo / Nulo</label><br>
                                                            <input name="TxtCl4CalVnt" type="radio" id="radio_20" value="2" <?php if($cal->Cl4CalVnt=="2") echo "checked"; ?>/>
                                                            <label for="radio_20">2 - Poco / Deficiente</label><br>
                                                            <input name="TxtCl4CalVnt" type="radio" id="radio_21" value="3" <?php if($cal->Cl4CalVnt=="3") echo "checked"; ?>/>
                                                            <label for="radio_21">3 - Intermedio / Regular</label><br>
                                                            <input name="TxtCl4CalVnt" type="radio" id="radio_22" value="4" <?php if($cal->Cl4CalVnt=="4") echo "checked"; ?>/>
                                                            <label for="radio_22">4 - Bueno</label><br>
                                                            <input name="TxtCl4CalVnt" type="radio" id="radio_23" value="5" <?php if($cal->Cl4CalVnt=="5") echo "checked"; ?>/>
                                                            <label for="radio_23">5 - Favorable</label><br>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <b>P5: <?php echo $r->Pg5PrgCal; ?></b><br><br>
                                                            <input name="TxtCl5CalVnt" type="radio" id="radio_24" value="0" <?php if($cal->Cl5CalVnt=="0") echo "checked"; ?>/>
                                                            <label for="radio_24">0 - Ninguno</label><br>  
                                                            <input name="TxtCl5CalVnt" type="radio" id="radio_25" value="1" <?php if($cal->Cl5CalVnt=="1") echo "checked"; ?>/>
                                                            <label for="radio_25">1 - Minimo / Nulo</label><br>
                                                            <input name="TxtCl5CalVnt" type="radio" id="radio_26" value="2" <?php if($cal->Cl5CalVnt=="2") echo "checked"; ?>/>
                                                            <label for="radio_26">2 - Poco / Deficiente</label><br>
                                                            <input name="TxtCl5CalVnt" type="radio" id="radio_27" value="3" <?php if($cal->Cl5CalVnt=="3") echo "checked"; ?>/>
                                                            <label for="radio_27">3 - Intermedio / Regular</label><br>
                                                            <input name="TxtCl5CalVnt" type="radio" id="radio_28" value="4" <?php if($cal->Cl5CalVnt=="4") echo "checked"; ?>/>
                                                            <label for="radio_28">4 - Bueno</label><br>
                                                            <input name="TxtCl5CalVnt" type="radio" id="radio_29" value="5" <?php if($cal->Cl5CalVnt=="5") echo "checked"; ?>/>
                                                            <label for="radio_29">5 - Favorable</label><br>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <b>P6: <?php echo $r->Pg6PrgCal; ?></b><br><br>
                                                            <input name="TxtCl6CalVnt" type="radio" id="radio_30" value="0" <?php if($cal->Cl6CalVnt=="0") echo "checked"; ?>/>
                                                            <label for="radio_30">0 - Ninguno</label><br>  
                                                            <input name="TxtCl6CalVnt" type="radio" id="radio_31" value="1" <?php if($cal->Cl6CalVnt=="1") echo "checked"; ?>/>
                                                            <label for="radio_31">1 - Minimo / Nulo</label><br>
                                                            <input name="TxtCl6CalVnt" type="radio" id="radio_32" value="2" <?php if($cal->Cl6CalVnt=="2") echo "checked"; ?>/>
                                                            <label for="radio_32">2 - Poco / Deficiente</label><br>
                                                            <input name="TxtCl6CalVnt" type="radio" id="radio_33" value="3" <?php if($cal->Cl6CalVnt=="3") echo "checked"; ?>/>
                                                            <label for="radio_33">3 - Intermedio / Regular</label><br>
                                                            <input name="TxtCl6CalVnt" type="radio" id="radio_34" value="4" <?php if($cal->Cl6CalVnt=="4") echo "checked"; ?>/>
                                                            <label for="radio_34">4 - Bueno</label><br>
                                                            <input name="TxtCl6CalVnt" type="radio" id="radio_35" value="5" <?php if($cal->Cl6CalVnt=="5") echo "checked"; ?>/>
                                                            <label for="radio_35">5 - Favorable</label><br>
                                                        </div>
                                                    </div>
                                                </section>
                                                <h2>Negociación</h2>
                                                <section>
                                                    <div class="body"  style="font-size: 11px">
                                                        <div class="col-md-4">
                                                            <b>P7: <?php echo $r->Pg7PrgCal; ?></b><br><br>
                                                            <input name="TxtCl7CalVnt" type="radio" id="radio_36" value="0" <?php if($cal->Cl7CalVnt=="0") echo "checked"; ?>/>
                                                            <label for="radio_36">0 - Ninguno</label><br>  
                                                            <input name="TxtCl7CalVnt" type="radio" id="radio_37" value="1" <?php if($cal->Cl7CalVnt=="1") echo "checked"; ?>/>
                                                            <label for="radio_37">1 - Minimo / Nulo</label><br>
                                                            <input name="TxtCl7CalVnt" type="radio" id="radio_38" value="2" <?php if($cal->Cl7CalVnt=="2") echo "checked"; ?>/>
                                                            <label for="radio_38">2 - Poco / Deficiente</label><br>
                                                            <input name="TxtCl7CalVnt" type="radio" id="radio_39" value="3" <?php if($cal->Cl7CalVnt=="3") echo "checked"; ?>/>
                                                            <label for="radio_39">3 - Intermedio / Regular</label><br>
                                                            <input name="TxtCl7CalVnt" type="radio" id="radio_40" value="4" <?php if($cal->Cl7CalVnt=="4") echo "checked"; ?>/>
                                                            <label for="radio_40">4 - Bueno</label><br>
                                                            <input name="TxtCl7CalVnt" type="radio" id="radio_41" value="5" <?php if($cal->Cl7CalVnt=="5") echo "checked"; ?>/>
                                                            <label for="radio_41">5 - Favorable</label><br>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <b>P8: <?php echo $r->Pg8PrgCal; ?></b><br><br>
                                                            <input name="TxtCl8CalVnt" type="radio" id="radio_42" value="0" <?php if($cal->Cl8CalVnt=="0") echo "checked"; ?>/>
                                                            <label for="radio_42">0 - Ninguno</label><br>  
                                                            <input name="TxtCl8CalVnt" type="radio" id="radio_43" value="1" <?php if($cal->Cl8CalVnt=="1") echo "checked"; ?>/>
                                                            <label for="radio_43">1 - Minimo / Nulo</label><br>
                                                            <input name="TxtCl8CalVnt" type="radio" id="radio_44" value="2" <?php if($cal->Cl8CalVnt=="2") echo "checked"; ?>/>
                                                            <label for="radio_44">2 - Poco / Deficiente</label><br>
                                                            <input name="TxtCl8CalVnt" type="radio" id="radio_45" value="3" <?php if($cal->Cl8CalVnt=="3") echo "checked"; ?>/>
                                                            <label for="radio_45">3 - Intermedio / Regular</label><br>
                                                            <input name="TxtCl8CalVnt" type="radio" id="radio_46" value="4" <?php if($cal->Cl8CalVnt=="4") echo "checked"; ?>/>
                                                            <label for="radio_46">4 - Bueno</label><br>
                                                            <input name="TxtCl8CalVnt" type="radio" id="radio_47" value="5" <?php if($cal->Cl8CalVnt=="5") echo "checked"; ?>/>
                                                            <label for="radio_47">5 - Favorable</label><br>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <b>P9: <?php echo $r->Pg9PrgCal; ?></b><br><br>
                                                            <input name="TxtCl9CalVnt" type="radio" id="radio_48" value="0" <?php if($cal->Cl9CalVnt=="0") echo "checked"; ?>/>
                                                            <label for="radio_48">0 - Ninguno</label><br>  
                                                            <input name="TxtCl9CalVnt" type="radio" id="radio_49" value="1" <?php if($cal->Cl9CalVnt=="1") echo "checked"; ?>/>
                                                            <label for="radio_49">1 - Minimo / Nulo</label><br>
                                                            <input name="TxtCl9CalVnt" type="radio" id="radio_50" value="2" <?php if($cal->Cl9CalVnt=="2") echo "checked"; ?>/>
                                                            <label for="radio_50">2 - Poco / Deficiente</label><br>
                                                            <input name="TxtCl9CalVnt" type="radio" id="radio_51" value="3" <?php if($cal->Cl9CalVnt=="3") echo "checked"; ?>/>
                                                            <label for="radio_51">3 - Intermedio / Regular</label><br>
                                                            <input name="TxtCl9CalVnt" type="radio" id="radio_52" value="4" <?php if($cal->Cl9CalVnt=="4") echo "checked"; ?>/>
                                                            <label for="radio_52">4 - Bueno</label><br>
                                                            <input name="TxtCl9CalVnt" type="radio" id="radio_53" value="5" <?php if($cal->Cl9CalVnt=="5") echo "checked"; ?>/>
                                                            <label for="radio_53">5 - Favorable</label><br>
                                                        </div>
                                                    </div>
                                                </section>
                                                <h2>Cierre / Orden Compra</h2>
                                                <section>
                                                    <div class="body"  style="font-size: 11px">
                                                        <div class="col-md-4">
                                                            <b>P10: <?php echo $r->Pg10PrgCal; ?></b><br><br>
                                                            <input name="TxtCl10CalVnt" type="radio" id="radio_54" value="0" <?php if($cal->Cl10CalVnt=="0") echo "checked"; ?>/>
                                                            <label for="radio_54">0 - Ninguno</label><br>  
                                                            <input name="TxtCl10CalVnt" type="radio" id="radio_55" value="1" <?php if($cal->Cl10CalVnt=="1") echo "checked"; ?>/>
                                                            <label for="radio_55">1 - Minimo / Nulo</label><br>
                                                            <input name="TxtCl10CalVnt" type="radio" id="radio_56" value="2" <?php if($cal->Cl10CalVnt=="2") echo "checked"; ?>/>
                                                            <label for="radio_56">2 - Poco / Deficiente</label><br>
                                                            <input name="TxtCl10CalVnt" type="radio" id="radio_57" value="3" <?php if($cal->Cl10CalVnt=="3") echo "checked"; ?>/>
                                                            <label for="radio_57">3 - Intermedio / Regular</label><br>
                                                            <input name="TxtCl10CalVnt" type="radio" id="radio_58" value="4" <?php if($cal->Cl10CalVnt=="4") echo "checked"; ?>/>
                                                            <label for="radio_58">4 - Bueno</label><br>
                                                            <input name="TxtCl10CalVnt" type="radio" id="radio_59" value="5" <?php if($cal->Cl10CalVnt=="5") echo "checked"; ?>/>
                                                            <label for="radio_59">5 - Favorable</label><br>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <b>P11: <?php echo $r->Pg11PrgCal; ?></b><br><br>
                                                            <input name="TxtCl11CalVnt" type="radio" id="radio_60" value="0" <?php if($cal->Cl11CalVnt=="0") echo "checked"; ?>/>
                                                            <label for="radio_60">0 - Ninguno</label><br>  
                                                            <input name="TxtCl11CalVnt" type="radio" id="radio_61" value="1" <?php if($cal->Cl11CalVnt=="1") echo "checked"; ?>/>
                                                            <label for="radio_61">1 - Minimo / Nulo</label><br>
                                                            <input name="TxtCl11CalVnt" type="radio" id="radio_62" value="2" <?php if($cal->Cl11CalVnt=="2") echo "checked"; ?>/>
                                                            <label for="radio_62">2 - Poco / Deficiente</label><br>
                                                            <input name="TxtCl11CalVnt" type="radio" id="radio_63" value="3" <?php if($cal->Cl11CalVnt=="3") echo "checked"; ?>/>
                                                            <label for="radio_63">3 - Intermedio / Regular</label><br>
                                                            <input name="TxtCl11CalVnt" type="radio" id="radio_64" value="4" <?php if($cal->Cl11CalVnt=="4") echo "checked"; ?>/>
                                                            <label for="radio_64">4 - Bueno</label><br>
                                                            <input name="TxtCl11CalVnt" type="radio" id="radio_65" value="5" <?php if($cal->Cl11CalVnt=="5") echo "checked"; ?>/>
                                                            <label for="radio_65">5 - Favorable</label><br>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <b>P12: <?php echo $r->Pg12PrgCal; ?></b><br><br>
                                                            <input name="TxtCl12CalVnt" type="radio" id="radio_66" value="0" <?php if($cal->Cl12CalVnt=="0") echo "checked"; ?>/>
                                                            <label for="radio_66">0 - Ninguno</label><br>  
                                                            <input name="TxtCl12CalVnt" type="radio" id="radio_67" value="1" <?php if($cal->Cl12CalVnt=="1") echo "checked"; ?>/>
                                                            <label for="radio_67">1 - Minimo / Nulo</label><br>
                                                            <input name="TxtCl12CalVnt" type="radio" id="radio_68" value="2" <?php if($cal->Cl12CalVnt=="2") echo "checked"; ?>/>
                                                            <label for="radio_68">2 - Poco / Deficiente</label><br>
                                                            <input name="TxtCl12CalVnt" type="radio" id="radio_69" value="3" <?php if($cal->Cl12CalVnt=="3") echo "checked"; ?>/>
                                                            <label for="radio_69">3 - Intermedio / Regular</label><br>
                                                            <input name="TxtCl12CalVnt" type="radio" id="radio_70" value="4" <?php if($cal->Cl12CalVnt=="4") echo "checked"; ?>/>
                                                            <label for="radio_70">4 - Bueno</label><br>
                                                            <input name="TxtCl12CalVnt" type="radio" id="radio_71" value="5" <?php if($cal->Cl12CalVnt=="5") echo "checked"; ?>/>
                                                            <label for="radio_71">5 - Favorable</label><br>
                                                        </div>
                                                    </div>
                                                </section>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span data-toggle='tooltip' data-placement="right" title='Actualizar calificación'>
                                    <button type="submit" class="btn bg-orange btn-xs waves-effect">
                                        <i class="material-icons">update</i>
                                    </button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
