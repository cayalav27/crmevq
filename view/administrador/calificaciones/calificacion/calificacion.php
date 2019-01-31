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
                <li class="active">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">offline_pin</i>
                        <span>Calificaciones</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="active">
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
                    <div class="card">
                        <div class="header">
                            <ol class="breadcrumb breadcrumb-col-red">
                                <li><a><i class="material-icons">offline_pin</i> Calificaciones</a></li>
                                <li class="active"><i class="material-icons">spellcheck</i> Calificación</li>
                            </ol>
                        </div>
                        <div class="body table-responsive">
                            <table id="dtable" class="display nowrap" cellspacing="0" width="100%">
                               <thead>
                                    <tr>
                                        <th align="center">#</th>
                                        <th align="center">Perfil Asociado</th>
                                        <th align="center">Primer Contacto</th>
                                        <th align="center">Propuesta Tecnica/Economica</th>
                                        <th align="center">Negociación</th>
                                        <th align="center">Cierre</th>
                                        <th align="text-center">Estado</th>
                                        <th align="center">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($this->model->ListCal() as $r): ?>
                                    <tr>
                                        <td align="center"><?php echo $i++ ?></td>
                                        <td><?php echo $r->NomPrf; ?></td>
                                        <td align="center"><?php echo $r->Ps1Cal; ?></td>
                                        <td align="center"><?php echo $r->Ps2Cal; ?></td>
                                        <td align="center"><?php echo $r->Ps3Cal; ?></td>
                                        <td align="center"><?php echo $r->Ps4Cal; ?></td>
                                        <td align="center">
                                        <?php 
                                            if($r->Indicador=='1'){
                                            echo "<span class='label label-success'>Activo</span>";
                                                                      }
                                        else {
                                            echo "<span class='label label-danger'>Inactivo</span>";
                                              }
                                        ?>
                                        </td>
                                        <td align="center">
                                            <a class='btn bg-orange btn-xs' data-toggle="modal" data-target="#edit-<?php echo $r->CodCal; ?>" data-placement="bottom" title='Editar'>
                                                <i class='material-icons'>edit</i>
                                            </a>
                                            <a class='btn bg-red btn-xs' onclick="javascript:return confirm('¿Seguro de desactivar esta calificación?, Recuerde que si desactiva afectara el score de negocio asociadas a estas calificaciones');" href="calificaciones&a=DltCal&CodCal=<?php echo $r->CodCal; ?>" data-toggle='tooltip' data-placement="bottom" title='Desactivar'>
                                                <i class='material-icons'>update</i>
                                            </a>
                                        </td>
                                    </tr>  
                                    <!--EDIT CAL -->
                                    <div class="modal fade" id="edit-<?php echo $r->CodCal; ?>" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-teal">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title text-center" id="calificacion">EDITAR CALIFICACIÓN</h4>
                                                </div>
                                                <form id="validate3" action="calificaciones&a=UpdCal" method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="row clearfix">
                                                            <input type="hidden" name="TxtCodCal" value="<?php echo $r->CodCal; ?>" />
                                                            <div class="col-md-6">
                                                                <b>Primer Contacto</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">record_voice_over</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <input type="number" name="TxtPs1Cal" class="form-control" value="<?php echo $r->Ps1Cal; ?>" maxlength="3" minlength="1" max="100" min="0" required> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <b>Propuesta Tecnica/Economica</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">receipt</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <input type="number" name="TxtPs2Cal" class="form-control" value="<?php echo $r->Ps2Cal; ?>" maxlength="3" minlength="1" max="100" min="0" required> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <b>Negociación</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">directions_walk</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <input type="number" name="TxtPs3Cal" class="form-control" value="<?php echo $r->Ps3Cal; ?>" maxlength="3" minlength="1" max="100" min="0" required> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <b>Cierre</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">next_week</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <input type="number" name="TxtPs4Cal" class="form-control" value="<?php echo $r->Ps4Cal; ?>" maxlength="3" minlength="1" max="100" min="0" required> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <b>Cargo</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">local_library</i>
                                                                    </span>
                                                                    <select name="TxtCodCrg" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                                        <?php foreach($this->model->ObtCrg() as $row): ?>
                                                                        <option value="<?php echo $row->CodCrg; ?>" <?php if($r->NomCrg==$row->NomCrg) echo "selected"; ?> >
                                                                            <?php echo $row->NomCrg; ?>
                                                                        </option>
                                                                        <?php endforeach; ?>
                                                                    </select>  
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <b>Perfiles</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">group_work</i>
                                                                    </span>
                                                                    <select name="TxtCodPrf" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                                        <?php foreach($this->model->ObtPrf() as $row): ?>
                                                                        <option value="<?php echo $row->CodPrf; ?>" <?php if($r->NomPrf==$row->NomPrf) echo "selected"; ?> >
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
                                                                        <option value="1" <?php if($r->Indicador=="1") echo "selected";?> >Activo</option>
                                                                        <option value="0" <?php if($r->Indicador=="0") echo "selected";?> >Inactivo</option>
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
                                    <!--FIN EDIT CAL -->
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <br>
                            <div class="text-left" role="group" aria-label="Justified button group">
                                <a class="btn bg-cyan btn-xs" data-toggle="modal" data-target="#nuevocal" data-placement="top" title='Agregar calificacion'>
                                    <i class="material-icons">add</i>
                                </a>
                            </div>
                            <!-- ADD CAL -->
                            <div class="modal fade" id="nuevocal" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-teal">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="calificacion">NUEVA CALIFICACIÓN</h4>
                                        </div>
                                        <form id="validate2" action="calificaciones&a=RegCal" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="row clearfix">
                                                    <div class="col-md-6">
                                                        <b>Primer Contacto</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">record_voice_over</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="number" name="TxtPs1Cal" class="form-control" maxlength="3" minlength="1" max="100" min="0" required> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Propuesta Tecnica/Economica</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">receipt</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="number" name="TxtPs2Cal" class="form-control" maxlength="3" minlength="1" max="100" min="0" required> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Negociación</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">directions_walk</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="number" name="TxtPs3Cal" class="form-control" maxlength="3" minlength="1" max="100" min="0" required> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Cierre</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">next_week</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="number" name="TxtPs4Cal" class="form-control" maxlength="3" minlength="1" max="100" min="0" required> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Cargo</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">local_library</i>
                                                            </span>
                                                            <select id="TxtCodCrg" name="TxtCodCrg" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                                <option selected disabled></option>
                                                                <?php foreach($this->model->ObtCrg() as $r): ?>
                                                                <option value="<?php echo $r->CodCrg; ?>"><?php echo $r->NomCrg; ?></option>
                                                                <?php endforeach; ?>
                                                            </select> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Perfiles</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">group_work</i>
                                                            </span>
                                                            <select id="TxtCodPrf" name="TxtCodPrf" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
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
</section>
