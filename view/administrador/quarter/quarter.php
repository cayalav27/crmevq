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
                <li  class="active">
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
                                <li><a href="quarter"><i class="material-icons">date_range</i> Quarters</a></li>
                            </ol>
                        </div>
                        <div class="body table-responsive">
                            <table id="dtable" class="display nowrap" cellspacing="0" width="100%">
                               <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Quarter I</th>
                                        <th>Quarter II</th>
                                        <th>Quarter III</th>
                                        <th>Quarter IV</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($this->model->ListQua() as $r): ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $r->Q1; ?></td>
                                        <td><?php echo $r->Q2; ?></td>
                                        <td><?php echo $r->Q3; ?></td>
                                        <td><?php echo $r->Q4; ?></td>
                                        <td>
                                        <?php 
                                            if($r->Indicador=='1'){
                                            echo "<span class='label label-success'>Activo</span>";
                                                                      }
                                        else {
                                            echo "<span class='label label-danger'>Inactivo</span>";
                                              }
                                        ?>
                                        </td>
                                        <td>
                                            <a class='btn bg-orange btn-xs' data-toggle="modal" data-target="#edit-<?php echo $r->CodQua; ?>" data-placement="bottom" title='Editar'>
                                                <i class='material-icons'>edit</i>
                                            </a>
                                            <a class='btn bg-red btn-xs' onclick="javascript:return confirm('¿Seguro de desactivar los Quarters?, Recuerde que si desactiva afectara el rango de Quarters');" href="quarter&a=DltQua&CodQua=<?php echo $r->CodQua; ?>" data-toggle='tooltip' data-placement="bottom" title='Desactivar'>
                                                <i class='material-icons'>update</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <!--EDIT QUA -->
                                    <div class="modal fade" id="edit-<?php echo $r->CodQua; ?>" role="dialog">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-teal">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title text-center" id="proveedor">EDITAR QUARTER</h4>
                                                </div>
                                                <form id="validate2" action="Quarter&a=UpdQua" method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="row clearfix">
                                                            <input type="hidden" name="TxtCodQua" value="<?php echo $r->CodQua; ?>" />
                                                            <div class="col-md-6">
                                                                <p><h5 class="text-center bg-blue">Quarter I</h5></p>
                                                                <div class="col-md-6">
                                                                    <b>Inicio</b>
                                                                    <div class="input-group form-float form-group-sm">
                                                                        <span class="input-group-addon">
                                                                            <i class="material-icons">today</i>
                                                                        </span>
                                                                        <div class="form-line">
                                                                            <input type="text" name="TxtQ1IQua" class="datepicker form-control" value="<?php echo $r->Q1IQua; ?>" maxlength="50" minlength="3" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <b>Fin</b>
                                                                    <div class="input-group form-float form-group-sm">
                                                                        <span class="input-group-addon">
                                                                            <i class="material-icons">insert_invitation</i>
                                                                        </span>
                                                                        <div class="form-line">
                                                                            <input type="text" name="TxtQ1FQua" class="datepicker form-control" value="<?php echo $r->Q1FQua; ?>" maxlength="50" minlength="3" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p><h5 class="text-center bg-green">Quarter II</h5></p>
                                                                <div class="col-md-6">
                                                                    <b>Inicio</b>
                                                                    <div class="input-group form-float form-group-sm">
                                                                        <span class="input-group-addon">
                                                                            <i class="material-icons">today</i>
                                                                        </span>
                                                                        <div class="form-line">
                                                                            <input type="text" name="TxtQ2IQua" class="datepicker form-control" value="<?php echo $r->Q2IQua; ?>" maxlength="50" minlength="3" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <b>Fin</b>
                                                                    <div class="input-group form-float form-group-sm">
                                                                        <span class="input-group-addon">
                                                                            <i class="material-icons">insert_invitation</i>
                                                                        </span>
                                                                        <div class="form-line">
                                                                            <input type="text" name="TxtQ2FQua" class="datepicker form-control" value="<?php echo $r->Q2FQua; ?>" maxlength="50" minlength="3" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p><h5 class="text-center bg-pink">Quarter III</h5></p>
                                                                <div class="col-md-6">
                                                                    <b>Inicio</b>
                                                                    <div class="input-group form-float form-group-sm">
                                                                        <span class="input-group-addon">
                                                                            <i class="material-icons">today</i>
                                                                        </span>
                                                                        <div class="form-line">
                                                                            <input type="text" name="TxtQ3IQua" class="datepicker form-control" value="<?php echo $r->Q3IQua; ?>" maxlength="50" minlength="3" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <b>Fin</b>
                                                                    <div class="input-group form-float form-group-sm">
                                                                        <span class="input-group-addon">
                                                                            <i class="material-icons">insert_invitation</i>
                                                                        </span>
                                                                        <div class="form-line">
                                                                            <input type="text" name="TxtQ3FQua" class="datepicker form-control" value="<?php echo $r->Q3FQua; ?>" maxlength="50" minlength="3" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p><h5 class="text-center bg-amber">Quarter IV</h5></p>
                                                                <div class="col-md-6">
                                                                    <b>Inicio</b>
                                                                    <div class="input-group form-float form-group-sm">
                                                                        <span class="input-group-addon">
                                                                            <i class="material-icons">today</i>
                                                                        </span>
                                                                        <div class="form-line">
                                                                            <input type="text" name="TxtQ4IQua" class="datepicker form-control" value="<?php echo $r->Q4IQua; ?>" maxlength="50" minlength="3" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <b>Fin</b>
                                                                    <div class="input-group form-float form-group-sm">
                                                                        <span class="input-group-addon">
                                                                            <i class="material-icons">insert_invitation</i>
                                                                        </span>
                                                                        <div class="form-line">
                                                                            <input type="text" name="TxtQ4FQua" class="datepicker form-control" value="<?php echo $r->Q4FQua; ?>" maxlength="50" minlength="3" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
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
                                    <!--FIN EDIT QUA -->  
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <br>
                            <div class="text-left" role="group" aria-label="Justified button group">
                                <a class="btn bg-cyan btn-xs" data-toggle="modal" data-target="#nuevoqua" data-placement="top" title='Agregar quarters'>
                                    <i class="material-icons">add</i>
                                </a>
                            </div>
                            <!-- ADD FAC -->
                            <div class="modal fade" id="nuevoqua" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-teal">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="Marca">NUEVO QUARTER</h4>
                                        </div>
                                        <form id="validate1" action="quarter&a=RegQua" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="row clearfix">
                                                    <div class="col-md-6">
                                                        <p><h5 class="text-center bg-blue">Quarter I</h5></p>
                                                        <div class="col-md-6">
                                                            <b>Inicio</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">today</i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <input type="text" name="TxtQ1IQua" class="datepicker form-control" maxlength="50" minlength="3" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b>Fin</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">insert_invitation</i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <input type="text" name="TxtQ1FQua" class="datepicker form-control" maxlength="50" minlength="3" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><h5 class="text-center bg-green">Quarter II</h5></p>
                                                        <div class="col-md-6">
                                                            <b>Inicio</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">today</i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <input type="text" name="TxtQ2IQua" class="datepicker form-control" maxlength="50" minlength="3" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b>Fin</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">insert_invitation</i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <input type="text" name="TxtQ2FQua" class="datepicker form-control" maxlength="50" minlength="3" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><h5 class="text-center bg-pink">Quarter III</h5></p>
                                                        <div class="col-md-6">
                                                            <b>Inicio</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">today</i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <input type="text" name="TxtQ3IQua" class="datepicker form-control" maxlength="50" minlength="3" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b>Fin</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">insert_invitation</i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <input type="text" name="TxtQ3FQua" class="datepicker form-control" maxlength="50" minlength="3" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><h5 class="text-center bg-amber">Quarter IV</h5></p>
                                                        <div class="col-md-6">
                                                            <b>Inicio</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">today</i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <input type="text" name="TxtQ4IQua" class="datepicker form-control" maxlength="50" minlength="3" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b>Fin</b>
                                                            <div class="input-group form-float form-group-sm">
                                                                <span class="input-group-addon">
                                                                    <i class="material-icons">insert_invitation</i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <input type="text" name="TxtQ4FQua" class="datepicker form-control" maxlength="50" minlength="3" required>
                                                                </div>
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
                            <!-- FIN ADD !-->
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</section>
