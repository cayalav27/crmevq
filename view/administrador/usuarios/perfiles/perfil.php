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
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li>
                    <a href="dashboard">
                        <i class="material-icons">pie_chart</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="active">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">group</i>
                        <span>Usuarios</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="active">
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
                <li>
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
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <ol class="breadcrumb breadcrumb-col-red">
                                        <li><a><i class="material-icons">group</i> Usuarios</a></li>
                                        <li><a href="cargo"><i class="material-icons">assignment_ind</i> Roles</a></li>
                                        <li class="active"><i class="material-icons">account_circle</i> Perfil</li>
                                    </ol>
                                </div>   
                                <div class="body table-responsive">
                                    <form id="sign_in" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="TxtCodPrf" value="<?php echo $perf->CodPrf; ?>" />
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>Cargo:</th>
                                                    <td><?php echo $perf->NomCrg; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                    <table id="dtable" class="display nowrap" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Opción</th>
                                                <th width="500">Equipo</th>
                                                <th width="500">Perfiles asignados</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach($this->model->ListPrf($_REQUEST["CodCrg"]) as $r): ?>
                                            <tr>
                                                <td><?php echo $i++ ?></td>
                                                <td>
                                                    <a class='btn bg-orange btn-xs' data-toggle="modal" data-target="#edit-<?php echo $r["CodPrf"] ?>" data-placement="bottom" title='Editar'>
                                                        <i class='material-icons'>edit</i>
                                                    </a>
                                                    <a class='btn bg-blue btn-xs' onclick="javascript:return confirm('¿Seguro de desactivar el perfil?');" href="perfil&a=DltPrf&CodPrf=<?php echo $r["CodPrf"] ?>" data-toggle='tooltip' data-placement="bottom" title='Desactivar'>
                                                        <i class='material-icons'>update</i>
                                                    </a>
                                                </td>
                                                <td><?php echo $r["EqpPrf"] ?></td>
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
                                            </tr>  
                                            <!--EDIT CRG -->
                                            <div class="modal fade" id="edit-<?php echo $r["CodPrf"] ?>" role="dialog">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-teal">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title text-center" id="proveedor">EDITAR PERFIL</h4>
                                                        </div>
                                                        <form id="validate3" action="perfil&a=UpdPrf" method="post" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <div class="row clearfix">
                                                                    <input type="hidden" name="TxtCodCrg" value="<?php echo $r["CodCrg"] ?>" />
                                                                    <input type="hidden" name="TxtCodPrf" value="<?php echo $r["CodPrf"] ?>" />
                                                                    <div class="col-md-12">
                                                                        <b>Nombre de Perfil</b>
                                                                        <div class="input-group form-float form-group-sm">
                                                                            <span class="input-group-addon">
                                                                                <i class="material-icons">account_circle</i>
                                                                            </span>
                                                                            <div class="form-line">
                                                                                <input type="text" name="TxtNomPrf" class="form-control" value="<?php echo $r["NomPrf"] ?>" maxlength="40" minlength="3" required> 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <b>Equipo del Perfil</b>
                                                                        <div class="input-group form-float form-group-sm">
                                                                            <span class="input-group-addon">
                                                                                <i class="material-icons">account_circle</i>
                                                                            </span>
                                                                            <div class="form-line">
                                                                                <input type="text" name="TxtEqpPrf" class="form-control" value="<?php echo $r["EqpPrf"] ?>" maxlength="30" minlength="3" required> 
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
                                            <!--FIN EDIT CRG -->
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="text-left" role="group" aria-label="Justified button group">
                                        <a class="btn bg-cyan btn-xs" data-toggle="modal" data-target="#nuevoprf" data-placement="top" title='Agregar nuevo perfil'>
                                            <i class="material-icons">add</i>
                                        </a>
                                    </div>
                                    <!-- ADD CRG -->
                                    <div class="modal fade" id="nuevoprf" role="dialog">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-teal">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title text-center" id="proveedor">NUEVO PERFIL</h4>
                                                </div>
                                                <form id="validate2" action="perfil&a=RegPrf" method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="row clearfix">
                                                            <input type="hidden" name="TxtCodCrg" value="<?php echo $perf->CodCrg; ?>" />
                                                            <div class="col-md-12">
                                                                <b>Perfil</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">account_circle</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <input type="text" name="TxtNomPrf" class="form-control" placeholder="Ex: perfil-usuarioadm" maxlength="40" minlength="3" required> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <b>Equipo del Perfil</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">account_circle</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <input type="text" name="TxtEqpPrf" class="form-control" placeholder="Ex: Cambio Climatico" maxlength="30" minlength="3" required> 
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
    </div>
</section>
