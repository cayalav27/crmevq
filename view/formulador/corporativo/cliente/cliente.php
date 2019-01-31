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
                <li class="active">
                    <a href="clienteformulador">
                        <i class="material-icons">account_balance</i>
                        <span>Clientes</span>
                    </a>
                </li>
                <li>
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
                                <li><a href="clienteformulador"><i class="material-icons">account_balance</i> Clientes</a></li>
                            </ol>
                        </div>
                        <div class="body table-responsive">
                            <table id="dtable" class="display compact" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>RUC</th>
                                        <th>Razón Social</th>
                                        <th>Telefono</th>
                                        <th>País</th>
                                        <th>Ciudad</th>
                                        <th>Consorcio</th>
                                        <th>Segmento</th>
                                        <th>Sunat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($this->model->ListCli() as $r): ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td align="center">
                                            <span data-toggle='tooltip' data-placement="right" title='Ver detalle: <?php echo $r->RucCli; ?>'>
                                                <a href="<?php echo urlencode('contactoformulador&a=Index&CodCli=').$r->CodCli; ?>"><?php echo $r->RucCli; ?></a>
                                            </span>
                                        </td>
                                        <td><?php echo $r->NomCli; ?></td>
                                        <td><?php echo $r->TlfCli; ?></td>
                                        <td align="center"><?php echo $r->NomPais; ?></td>
                                        <td align="center"><?php echo $r->NomCiu; ?></td>
                                        <td align="center">
                                            <?php 
                                                if($r->CnsCli=='1'){
                                                echo "<span class='label label-success'>SI</span>";
                                                                          }
                                            else {
                                                echo "<span class='label label-danger'>NO</span>";
                                                  }
                                            ?>
                                        </td>
                                        <td align="center">
                                            <?php 
                                                if($r->DscTip=='Privado'){
                                                echo "<span class='label bg-pink'>Privado</span>";
                                                                          }
                                            else {
                                                echo "<span class='label bg-indigo'>Publico</span>";
                                                  }
                                            ?>
                                        </td>
                                        <td align="center">
                                            <?php 
                                                if($r->EstCli=='1'){
                                                echo "<span class='label label-success'>Activo</span>";
                                                                          }
                                            else {
                                                echo "<span class='label label-danger'>Inactivo</span>";
                                                  }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <br>
                            <div class="text-left" role="group" aria-label="Justified button group">
                                <span data-toggle='tooltip' data-placement="right" title='Nuevo cliente'>
                                    <a class="btn bg-cyan btn-xs" data-toggle="modal" data-target="#nuevocli">
                                        <i class="material-icons">add</i>
                                    </a>
                                </span>
                            </div>
                             <!-- ADD CLI -->
                            <div class="modal fade" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" id="nuevocli" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-teal">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="Marca">NUEVO CLIENTE</h4>
                                        </div>
                                        <form id="sign_in" action="<?php echo urlencode('clienteformulador&a=RegCli'); ?>" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="row clearfix">
                                                    <div class="col-md-4">
                                                        <b for="ruc">RUC <span></span></b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">work</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="number" id="TxtRucCli" name="TxtRucCli" class="form-control" placeholder="Ex: RUC SUNAT" maxlength="11" minlength="11" min="0" required> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b>Razón Social</b>
                                                        <div class="input-group form-float form-group-sm" >
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">font_download</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <textarea rows="1" name="TxtNomCli" class="form-control no-resize auto-growth" placeholder="Ex: Razón Social SUNAT" maxlength="100" minlength="5" required></textarea>
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
                                                                <input type="number" name="TxtTlfCli" class="form-control" placeholder="Ex: 014578215" maxlength="9" minlength="7" min="0" required>
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
                                                                <textarea rows="1" name="TxtDirCli" class="form-control no-resize auto-growth" placeholder="Ex: Domicilio SUNAT" maxlength="100" minlength="5" required></textarea>
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
                                                                <input type="email" name="TxtEmlCli" class="form-control" placeholder="Ex: ejemplo@outlook.com" maxlength="50" minlength="5" required>
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
                                                                <input name="TxtCnsCli" type="radio" id="CnsSI" class="with-gap radio-col-green" value="1" required/>
                                                                    <label for="CnsSI">SI</label>
                                                                <input name="TxtCnsCli" type="radio" id="CnsNO" class="with-gap radio-col-red" value="0"  required/>
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
                                                                <option value="1">Activo</option>
                                                                <option value="0">Inactivo</option>
                                                            </select>  
                                                        </div>                                                           
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b>Pais</b>
                                                        <div class="input-group" >
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">place</i>
                                                            </span>
                                                            <select id="TxtCodPais" name="TxtCodPais" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                                <option selected disabled></option>
                                                                <?php foreach($this->model->ObtPais() as $r): ?>
                                                                <option value="<?php echo $r->CodPais; ?>"><?php echo $r->NomPais; ?></option>
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
                                                            <select id="TxtCodCiu" name="TxtCodCiu" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b>Tipo</b>
                                                        <div class="input-group">
                                                            <span class="input-group-addon pmd-textfield">
                                                                <i class="material-icons">location_city</i>
                                                            </span>
                                                            <select  name="TxtCodTip" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                <option selected disabled></option>
                                                                <?php foreach($this->model->ObtTip() as $r): ?>
                                                                <option value="<?php echo $r->CodTip; ?>"><?php echo $r->DscTip; ?></option>
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
                                                                <option selected disabled></option>
                                                                <?php foreach($this->model->ObtAct() as $r): ?>
                                                                <option value="<?php echo $r->CodAct; ?>"><?php echo $r->DscAct; ?></option>
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
                                                                <option selected disabled></option>
                                                                <?php foreach($this->model->ObtOgn() as $r): ?>
                                                                <option value="<?php echo $r->CodOgn; ?>"><?php echo $r->DscOgn; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>  
                                                        </div>                                                           
                                                    </div>
                                                    <input type="hidden" name="TxtCodEmp" value="<?php echo $iduser = $objses->get('CodEmp'); ?>" />
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
</section>
