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
                                <li class="active"><strong><?php echo $mrcdet->RucProv; ?> - <?php echo $mrcdet->NomProv; ?></strong></li>
                            </ol>
                        </div>
                        <div class="body table-responsive">
                            <form id="sign_in" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="TxtCodPrf" value="<?php echo $mrcdet->CodMrc; ?>" />
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th width="100">
                                                <?php 
                                                    if($mrcdet->Indicador =='1'){
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
                                                    <a class='btn bg-orange btn-xs' data-toggle="modal" data-target="#editprov-<?php echo $mrcdet->CodProv; ?>">
                                                        <i class='material-icons'>edit</i>
                                                    </a>
                                                </span>
                                                <a class='btn bg-red btn-xs' onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="proveedor&a=DltProv&CodProv=<?php echo $mrcdet->CodProv; ?>" data-toggle='tooltip' data-placement="bottom" title='Eliminar'>
                                                    <i class='material-icons'>delete</i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="100">Dirección</th>
                                            <td width="25">:</td>
                                            <td><?php echo $mrcdet->DirProv; ?>, <?php echo $mrcdet->NomCiu; ?>, <?php echo $mrcdet->NomPais; ?>.</td>
                                        </tr>
                                        <tr>
                                            <th width="100">E-mail</th>
                                            <td width="25">:</td>
                                            <td><?php echo $mrcdet->EmlProv; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="100">Télefono</th>
                                            <td width="25">:</td>
                                            <td><?php echo $mrcdet->TlfProv; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="100">Sitio Web</th>
                                            <td width="25">:</td>
                                            <td><a target="_blank" href="<?php echo $mrcdet->WebProv; ?>"><?php echo $mrcdet->WebProv; ?></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <!--EDIT PROV -->
                            <div class="modal fade" id="editprov-<?php echo $mrcdet->CodProv; ?>" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-teal">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="proveedor">EDITAR <strong><?php echo $mrcdet->NomProv; ?></strong></h4>
                                        </div>
                                        <form id="validate3" action="proveedor&a=UpdProv" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="row clearfix">
                                                    <input type="hidden" name="TxtCodProv" value="<?php echo $mrcdet->CodProv; ?>" />
                                                    <div class="col-md-12">
                                                        <b>Proveedor</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">font_download</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="text" name="TxtNomProv" class="form-control" value="<?php echo $mrcdet->NomProv; ?>" maxlength="100" minlength="5" required>
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
                                                                <input type="text" name="TxtDirProv" class="form-control" value="<?php echo $mrcdet->DirProv; ?>" maxlength="100" minlength="10" required>
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
                                                                <input type="number" name="TxtRucProv" class="form-control" value="<?php echo $mrcdet->RucProv; ?>" maxlength="11" minlength="11" min="0" disabled>
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
                                                                <input type="number" name="TxtTlfProv" class="form-control" value="<?php echo $mrcdet->TlfProv; ?>" maxlength="10" minlength="7" min="0" required>
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
                                                                <input type="text" name="TxtEmlProv" class="form-control" value="<?php echo $mrcdet->EmlProv; ?>" maxlength="50" minlength="5" required>
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
                                                                <input type="text" name="TxtWebProv" class="form-control" value="<?php echo $mrcdet->WebProv; ?>" maxlength="50" minlength="5" required>
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
                                                                    <option value="<?php echo $row->CodPais; ?>" <?php if($mrcdet->NomPais==$row->NomPais) echo "selected"; ?> >
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
                                                                    <option value="<?php echo $row->CodCiu; ?>" <?php if($mrcdet->NomCiu==$row->NomCiu) echo "selected"; ?> >
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
                                    <li role="presentation">
                                        <a href="marca&a=Index&CodProv=<?php echo $mrcdet->CodProv; ?>">MARCAS</a>
                                    </li>
                                    <li role="presentation" class="active">
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
                                                    <th>#</th>
                                                    <th width="180">Marca</th>
                                                    <th width="180">Sub-Marca</th>
                                                    <th width="180">Perfil Asociado</th>
                                                    <th width="180">Estado</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach($this->model->ListMrcDet($_REQUEST["CodMrc"]) as $r): ?>
                                                <tr>
                                                    <td><?php echo $i++ ?></td>
                                                    <td><?php echo $r["NomMrc"] ?></td>
                                                    <td>
                                                        <a href="marcaproducto&a=Index&CodDetMrc=<?php echo $r["CodDetMrc"] ?>" data-toggle='tooltip' data-placement="right" title='Visualizar detalle <?php echo $r["NomDetMrc"] ?>'>
                                                            <?php echo $r["NomDetMrc"] ?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $r["NomPrf"] ?></td>
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
                                                        <span data-toggle='tooltip' data-placement="left" title='Editar sub-marca'>
                                                            <a class='btn bg-orange btn-xs' data-toggle="modal" data-target="#edit-<?php echo $r["CodDetMrc"] ?>" data-placement="bottom" title='Editar'>
                                                                <i class='material-icons'>edit</i>
                                                            </a>
                                                        </span>
                                                        <a class='btn bg-blue btn-xs' onclick="javascript:return confirm('¿Seguro de desactivar esta sub-marca de producto?');" href="marcadetalle&a=DltMrcDet&CodDetMrc=<?php echo $r["CodDetMrc"] ?>" data-placement="bottom" title='Desactivar'>
                                                            <i class='material-icons'>update</i>
                                                        </a>
                                                    </td>
                                                </tr>  
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--EDIT CRG -->
                                <?php foreach($this->model->ListMrcDet($_REQUEST["CodMrc"]) as $r): ?>
                                    <div class="modal fade" id="edit-<?php echo $r["CodDetMrc"] ?>" role="dialog">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-teal">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title text-center" id="proveedor">EDITAR <strong><?php echo $r["NomDetMrc"] ?></strong></h4>
                                                </div>
                                                <form id="validate2" action="marcadetalle&a=UpdMrcDet" method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="row clearfix">
                                                            <input type="hidden" name="TxtCodMrc" value="<?php echo $r["CodMrc"] ?>" />
                                                            <input type="hidden" name="TxtCodDetMrc" value="<?php echo $r["CodDetMrc"] ?>" />
                                                            <div class="col-md-12">
                                                                <b>Sub-Marca</b>
                                                                <div class="input-group form-float form-group-sm" >
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">font_download</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <input type="text" name="TxtNomDetMrc" class="form-control" placeholder="Ex: ANTON PAAR LDC" value="<?php echo $r["NomDetMrc"] ?>" maxlength="50" minlength="3" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <b>Perfiles</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">group_work</i>
                                                                    </span>
                                                                    <select name="TxtCodPrf" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                                        <?php foreach($this->model->ObtPrf() as $row): ?>
                                                                        <option value="<?php echo $row->CodPrf; ?>" <?php if($r["NomPrf"]==$row->NomPrf) echo "selected"; ?> >
                                                                            <?php echo $row->NomPrf; ?>
                                                                        </option>
                                                                        <?php endforeach; ?>
                                                                    </select> 
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
                                <!--FIN EDIT CRG -->
                                <?php endforeach; ?>
                                <div class="text-left" role="group" aria-label="Justified button group">
                                    <span data-toggle='tooltip' data-placement="right" title='Agregar sub-marcas'>
                                        <a class="btn bg-cyan btn-xs" data-toggle="modal" data-target="#nuevomrcdet">
                                            <i class="material-icons">add</i>
                                        </a>
                                    </span>
                                </div>
                                <!-- ADD MRC -->
                                <div class="modal fade" id="nuevomrcdet" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-teal">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title text-center" id="MarcaDetalle">NUEVO SUB-MARCA</h4>
                                            </div>
                                            <form id="validate1" action="marcadetalle&a=RegMrcDet" method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="row clearfix">
                                                        <input type="hidden" name="TxtCodMrc" value="<?php echo $mrcdet->CodMrc; ?>" />
                                                        <div class="col-md-6">
                                                            <b>Nombre de Sub-Marca</b>
                                                            <div class="input-group form-float form-group-sm" >
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">font_download</i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <input type="text" name="TxtNomDetMrc" class="form-control" placeholder="Ex: ANTON PAAR LDC" maxlength="50" minlength="2" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b>Perfiles</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">group_work</i>
                                                                </span>
                                                                <select name="TxtCodPrf" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                                    <?php foreach($this->model->ObtPrf() as $r): ?>
                                                                    <option selected disabled></option>
                                                                    <option value="<?php echo $r->CodPrf; ?>">
                                                                        <?php echo $r->NomPrf; ?>
                                                                    </option>
                                                                    <?php endforeach; ?>
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
                                <!-- FIN ADD !-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
