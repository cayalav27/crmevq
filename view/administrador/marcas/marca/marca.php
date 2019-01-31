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
                        <li><a href="perfiladministrador"><i class="material-icons">person</i>Mi Perfil</a></li>
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
                <li>
                    <a href="dashboard">
                        <i class="material-icons">pie_chart</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">group</i>
                        <span>Usuarios</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="cargo">
                                <i class="material-icons">assignment_ind</i>
                                <span>Roles</span>
                            </a> 
                        </li>
                        <li>
                            <a href="empleado">
                                <i class="material-icons">face</i>
                                <span>Empleado</span>
                            </a> 
                        </li>
                    </ul> 
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">offline_pin</i>
                        <span>Calificaciones</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="calificaciones">
                                <i class="material-icons">spellcheck</i>
                                <span>Calificación</span>
                            </a>
                        </li>
                        <li>
                            <a href="preguntas">
                                <i class="material-icons">list</i>
                                <span>Preguntas</span>
                            </a>
                        </li>
                        <li>
                            <a href="pesos">
                                <i class="material-icons">swap_vert</i>
                                <span>Pesos</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <a href="proveedor">
                        <i class="material-icons">local_shipping</i>
                        <span>Proveedores</span>
                    </a>
                </li>
                <li>
                    <a href="factor">
                        <i class="material-icons">euro_symbol</i>
                        <span>Factores</span>
                    </a>
                </li>
                <li>
                    <a href="quarter">
                        <i class="material-icons">date_range</i>
                        <span>Quarters</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2017-2018  <a href="javascript:void(0);">Enviroequip S.A</a>.
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
                                <li><a href="proveedor"><i class="material-icons">local_shipping</i> Proveedores</a></li>
                                <li class="active"><strong><?php echo $mrc->RucProv; ?> - <?php echo $mrc->NomProv; ?></strong></li>
                            </ol>
                        </div>                                   
                        <div class="body table-responsive">
                            <form id="sign_in" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="TxtCodProv" value="<?php echo $mrc->CodProv; ?>" />
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th width="100">
                                                <?php 
                                                    if($mrc->Indicador =='1'){
                                                    echo "<span class='label label-success'>Activo</span>";
                                                        }
                                                else{
                                                    echo "<span class='label label-danger'>Inactivo</span>";
                                                        }
                                                ?>
                                            </th>
                                            <td width="25"></td>
                                            <td align="right">
                                                <span data-toggle='tooltip' data-placement="left" title='Editar Proveedor'>
                                                    <a class='btn bg-orange btn-xs' data-toggle="modal" data-target="#editprov-<?php echo $mrc->CodProv; ?>">
                                                        <i class='material-icons'>edit</i>
                                                    </a>
                                                </span>
                                                <a class='btn bg-red btn-xs' onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="proveedor&a=DltProv&CodProv=<?php echo $mrc->CodProv; ?>" data-toggle='tooltip' data-placement="bottom" title='Eliminar'>
                                                    <i class='material-icons'>delete</i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="100">Dirección</th>
                                            <td width="25">:</td>
                                            <td><?php echo $mrc->DirProv; ?>, <?php echo $mrc->NomCiu; ?>, <?php echo $mrc->NomPais; ?>.</td>
                                        </tr>
                                        <tr>
                                            <th width="100">E-mail</th>
                                            <td width="25">:</td>
                                            <td><?php echo $mrc->EmlProv; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="100">Télefono</th>
                                            <td width="25">:</td>
                                            <td><?php echo $mrc->TlfProv; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="100">Sitio Web</th>
                                            <td width="25">:</td>
                                            <td><a target="_blank" href="<?php echo $mrc->WebProv; ?>"><?php echo $mrc->WebProv; ?></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <!--EDIT PROV -->
                            <div class="modal fade" id="editprov-<?php echo $mrc->CodProv; ?>" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-teal">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="proveedor">EDITAR <strong><?php echo $mrc->NomProv; ?></strong></h4>
                                        </div>
                                        <form id="validate3" action="proveedor&a=UpdProv" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="row clearfix">
                                                    <input type="hidden" name="TxtCodProv" value="<?php echo $mrc->CodProv; ?>" />
                                                    <div class="col-md-12">
                                                        <b>Proveedor</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">font_download</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="text" name="TxtNomProv" class="form-control" value="<?php echo $mrc->NomProv; ?>" maxlength="100" minlength="5" required>
                                                            </div>
                                                        </div>
                                                    </div>   
                                                    <div class="col-md-12">
                                                        <b>Dirección</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">directions</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="text" name="TxtDirProv" class="form-control" value="<?php echo $mrc->DirProv; ?>" maxlength="100" minlength="10" required>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-6">
                                                        <b>RUC</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">work</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="number" name="TxtRucProv" class="form-control" value="<?php echo $mrc->RucProv; ?>" maxlength="11" minlength="11" min="0" disabled>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-6">
                                                        <b>Telefono</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">call</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="number" name="TxtTlfProv" class="form-control" value="<?php echo $mrc->TlfProv; ?>" maxlength="10" minlength="7" min="0" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>E-mail</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">mail</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="text" name="TxtEmlProv" class="form-control" value="<?php echo $mrc->EmlProv; ?>" maxlength="50" minlength="5" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Sitio Web</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">link</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="text" name="TxtWebProv" class="form-control" value="<?php echo $mrc->WebProv; ?>" maxlength="50" minlength="5" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Pais</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">place</i>
                                                            </span>
                                                            <select id="CodPais" name="TxtCodPais" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                                <?php foreach($this->model->ListPais() as $row): ?>
                                                                    <option value="<?php echo $row->CodPais; ?>" <?php if($mrc->NomPais==$row->NomPais) echo "selected"; ?> >
                                                                        <?php echo $row->NomPais; ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Ciudad</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">streetview</i>
                                                            </span>
                                                            <select id="CodCiu" name="TxtCodCiu" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                                <?php foreach($this->model->ListCiu() as $row): ?>
                                                                    <option value="<?php echo $row->CodCiu; ?>" <?php if($mrc->NomCiu==$row->NomCiu) echo "selected"; ?> >
                                                                        <?php echo $row->NomCiu; ?>
                                                                    </option>
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
                            <!--FIN EDIT PROV -->
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <ul class="nav nav-tabs tab-col-teal" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="marca&a=Index&CodProv=<?php echo $mrc->CodProv; ?>">MARCAS</a>
                                    </li>
                                    <li role="presentation">
                                        <a>SUB-MARCAS</a>
                                    </li>
                                    <li role="presentation">
                                        <a>PRODUCTOS</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane animated fadeInRight active" id="cotizacion">
                                        <table id="dtable" class="display compact" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th width="5">#</th>
                                                    <th>Marca</th>
                                                    <th>Estado</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach($this->model->ListMrc($_REQUEST["CodProv"]) as $r): ?>
                                                <tr>
                                                    <td><?php echo $i++ ?></td>
                                                    <td>
                                                        <a href="marcadetalle&a=Index&CodMrc=<?php echo $r["CodMrc"] ?>" data-toggle='tooltip' data-placement="right" title='Visualizar Sub-Marca: <?php echo $r["NomMrc"] ?>'>
                                                            <?php echo $r["NomMrc"] ?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                    <?php 
                                                        if($r["Indicador"]=='1'){
                                                        echo "<span class='label label-success'>Activo</span>";
                                                                                  }
                                                    else {
                                                        echo "<span class='label label-danger'>Inactivo</span>";
                                                          }
                                                    ?>
                                                    </td>
                                                    <td>
                                                        <span data-toggle='tooltip' data-placement="left" title='Editar marca'>
                                                            <a class='btn bg-orange btn-xs' data-toggle="modal" data-target="#edit-<?php echo $r["CodMrc"] ?>">
                                                                <i class='material-icons'>edit</i>
                                                            </a>
                                                        </span>
                                                        <a class='btn bg-red btn-xs' onclick="javascript:return confirm('¿Seguro de desactivar esta marca de producto?');" href="marca&a=DltMrc&CodMrc=<?php echo $r["CodMrc"] ?>" data-toggle='tooltip' data-placement="bottom" title='Desactivar'>
                                                            <i class='material-icons'>update</i>
                                                        </a>
                                                    </td>
                                                </tr>  
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--EDIT MRC -->
                                <?php foreach($this->model->ListMrc($_REQUEST["CodProv"]) as $r): ?>
                                    <div class="modal fade" id="edit-<?php echo $r["CodMrc"] ?>" role="dialog">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-teal">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title text-center" id="proveedor">EDITAR <strong><?php echo $r["NomMrc"] ?></strong></h4>
                                                </div>
                                                <form id="validate2" action="marca&a=UpdMrc" method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="row clearfix">
                                                            <input type="hidden" name="TxtCodMrc" value="<?php echo $r["CodMrc"] ?>" />
                                                            <input type="hidden" name="TxtCodProv" value="<?php echo $r["CodProv"] ?>" />
                                                            <div class="col-md-12">
                                                                <b>Marca</b>
                                                                <div class="input-group form-float form-group-sm" >
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">font_download</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <input type="text" name="TxtNomMrc" class="form-control" value="<?php echo $r["NomMrc"] ?>" maxlength="50" minlength="5" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <b>Estado</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">layers</i>
                                                                    </span>
                                                                    <select  name="TxtIndicador" class="js-example form-control pmd-select2" style="width: 100%">
                                                                            <option value="1" <?php if($r["Indicador"]=="1") echo "selected";?> >Activo</option>
                                                                        <option value="0" <?php if($r["Indicador"]=="0") echo "selected";?> >Inactivo</option>
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
                                <!--FIN EDIT MRC -->
                                <div class="text-left" role="group" aria-label="Justified button group">
                                    <span data-toggle='tooltip' data-placement="right" title='Agregar marcas'>
                                        <a class="btn bg-cyan btn-xs" data-toggle="modal" data-target="#nuevomrc">
                                            <i class="material-icons">add</i>
                                        </a>
                                    </span>
                                </div>
                                <!-- ADD MRC -->
                                <div class="modal fade" id="nuevomrc" role="dialog">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-teal">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title text-center" id="Marca">NUEVA MARCA</h4>
                                            </div>
                                            <form id="validate1" action="marca&a=RegMrc" method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="row clearfix">
                                                        <input type="hidden" name="TxtCodProv" value="<?php echo $mrc->CodProv; ?>" />
                                                        <div class="col-md-12">
                                                            <b>Marca</b>
                                                            <div class="input-group form-float form-group-sm" >
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">font_download</i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <input type="text" name="TxtNomMrc" class="form-control" placeholder="Ex: ANTON PAAR" maxlength="50" minlength="3" required>
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
