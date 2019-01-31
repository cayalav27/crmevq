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
                <li class="active">
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
                        <li class="active">
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
                    <div class="card"> 
                        <div class="header">
                            <ol class="breadcrumb breadcrumb-col-red">
                                <li><a><i class="material-icons">group</i> Usuarios</a></li>
                                <li class="active"><i class="material-icons">person</i> Empleado</li>
                            </ol>
                        </div>
                        <div class="body table-responsive">
                            <table id="dtable" class="display nowrap" cellspacing="0" width="100%">
                               <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>DNI</th>
                                        <th>Nombres y Apellidos</th>
                                        <th>Email</th>
                                        <th>Usuario</th>
                                        <th>Cargo</th>
                                        <th>Perfil</th>
                                        <th>Score Base</th>
                                        <th>Genero</th>
                                        <th>Foto</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($this->model->ListEmp() as $r): ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $r->DniEmp; ?></td>
                                        <td>
                                            <?php echo $r->NomEmp; ?> 
                                            <?php echo $r->ApeEmp; ?> 
                                        </td>
                                        <td><?php echo $r->EmlEmp; ?></td>
                                        <td><?php echo $r->UsuEmp; ?></td>
                                        <td><?php echo $r->NomCrg; ?></td>
                                        <td><?php echo $r->NomPrf; ?></td>
                                        <td><?php if($r->NumSrc == '0'+$r->NumSrc) echo '0'+$r->NumSrc; 
                                                  else echo $r->NumSrc; 
                                            ?>
                                        </td>
                                        <td><?php 
                                                if($r->GnrEmp =='1'){
                                                    echo "<span class='label bg-pink'>Femenino</span>";
                                                                              }
                                                else {
                                                    echo "<span class='label bg-blue'>Masculino</span>";
                                                      }
                                            ?>
                                        </td>
                                        <td><br><br><img class="profile-user-img img-responsive" src="assets/fotos/<?php echo $r->FotEmp; ?>" width="50px" height="50px" alt="User profile picture">
                                        </td>
                                        <td>
                                            <a class='btn bg-orange btn-xs' data-toggle="modal" data-target="#edit-<?php echo $r->CodEmp; ?>" data-placement="bottom" title='Editar'>
                                                <i class='material-icons'>edit</i>
                                            </a>
                                            <a class='btn bg-red btn-xs' onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="empleado&a=DltEmp&CodEmp=<?php echo $r->CodEmp; ?>" data-toggle='tooltip' data-placement="bottom" title='Eliminar'>
                                                <i class='material-icons'>delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <!--EDIT EMP -->
                                    <div class="modal fade" id="edit-<?php echo $r->CodEmp; ?>" role="dialog">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-teal">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title text-center" id="proveedor">EDITAR <strong><?php echo $r->NomEmp; ?> <?php echo $r->ApeEmp; ?></strong>
                                                    </h4>
                                                </div>
                                                <form id="validate3" action="empleado&a=UpdEmp" method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="row clearfix">
                                                            <input type="hidden" name="TxtCodEmp" value="<?php echo $r->CodEmp; ?>" />
                                                            <div class="col-md-4">
                                                                <b>DNI</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">import_contacts</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <input type="number" name="TxtDniEmp" class="form-control" maxlength="8" minlength="8" value="<?php echo $r->DniEmp; ?>" disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <b>Apellidos</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">contacts</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <input type="text" name="TxtApeEmp" class="form-control" maxlength="40" minlength="5" value="<?php echo $r->ApeEmp; ?>" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <b>Nombres</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">contacts</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <input type="text" name="TxtNomEmp" class="form-control" maxlength="40" minlength="5" value="<?php echo $r->NomEmp; ?>" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <b>E-mail</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">mail</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <input type="email" name="TxtEmlEmp" class="form-control" maxlength="50" minlength="10" value="<?php echo $r->EmlEmp; ?>" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <b>Usuario de Sessión</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">contact_mail</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <input type="text" name="TxtUsuEmp" class="form-control" maxlength="30" minlength="5" value="<?php echo $r->UsuEmp; ?>" required>
                                                                    </div>
                                                                    <label for="nomusuario"></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <b>Contraseña</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">vpn_key</i>
                                                                    </span>
                                                                    <div class="form-line">
                                                                        <input type="password" name="TxtPswEmp" class="form-control" maxlength="15" minlength="6" value="<?php echo $r->PswEmp; ?>" required>
                                                                    </div>
                                                                    <label for="password"></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <b>Cargo</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">local_library</i>
                                                                    </span>
                                                                    <select name="TxtCodCrg" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                        <?php foreach($this->model->ObtCrg() as $row): ?>
                                                                        <option value="<?php echo $row->CodCrg; ?>" <?php if($r->NomCrg==$row->NomCrg) echo "selected"; ?> >
                                                                            <?php echo $row->NomCrg; ?>
                                                                        </option>
                                                                        <?php endforeach; ?>
                                                                    </select> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <b>Perfiles</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">group_work</i>
                                                                    </span>
                                                                    <select name="TxtCodPrf" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                        <?php foreach($this->model->ObtPrf() as $row): ?>
                                                                        <option value="<?php echo $row->CodPrf; ?>" <?php if($r->NomPrf==$row->NomPrf) echo "selected"; ?> >
                                                                            <?php echo $row->NomPrf; ?>
                                                                        </option>
                                                                        <?php endforeach; ?>
                                                                    </select> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <b>Divisiones</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">group_work</i>
                                                                    </span>
                                                                    <select name="TxtCodDiv" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                        <?php foreach($this->model->ObtDiv() as $row): ?>
                                                                        <option value="<?php echo $row->CodDiv; ?>" <?php if($r->NomDiv==$row->NomDiv) echo "selected"; ?> >
                                                                            <?php echo $row->NomDiv; ?>
                                                                        </option>
                                                                        <?php endforeach; ?>
                                                                    </select> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <b>Score Base</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">assessment</i>
                                                                    </span>
                                                                    <select  name="TxtCodSrc" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                                        <?php foreach($this->model->ObtSrc() as $row): ?>
                                                                            <option value="<?php echo $row->CodSrc; ?>" <?php if($r->NumSrc==$row->NumSrc) echo "selected"; ?> >
                                                                                <?php if ($row->NumSrc=="0"+$row->NumSrc) echo "0"+$row->NumSrc;
                                                                                      else echo $row->NumSrc;
                                                                                ?>
                                                                            </option>
                                                                        <?php endforeach; ?>
                                                                    </select> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <b>Genero</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">accessibility</i>
                                                                    </span>
                                                                    <div class="demo-radio-button">
                                                                        <select  name="TxtGnrEmp" class="js-example form-control pmd-select2" style="width: 100%">
                                                                            <option value="1" <?php if($r->GnrEmp=="1") echo "selected";?> >Femenino</option>
                                                                            <option value="2" <?php if($r->GnrEmp=="2") echo "selected";?> >Masculino</option>
                                                                        </select>  
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <b>Foto</b>
                                                                <div class="input-group form-float form-group-sm">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">cloud_upload</i>
                                                                    </span>
                                                                    <div class="fallback">
                                                                        <input name="TxtFotEmp" type="file" value="<?php echo $r->FotEmp; ?>" required/>
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
                                    <!--FIN EDIT EMP -->
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <br>
                            <div class="text-left" role="group" aria-label="Justified button group">
                                <a class="btn bg-cyan btn-xs" data-toggle="modal" data-target="#nuevoemp" data-placement="top" title='Agregar empleado'>
                                    <i class="material-icons">add</i>
                                </a>
                            </div>
                            <!-- ADD EMP -->
                            <div class="modal fade" id="nuevoemp" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-teal">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="Empleado">NUEVO EMPLEADO</h4>
                                        </div>
                                        <form id="validate2" method="POST" action="empleado&a=RegEmp" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="row clearfix">
                                                    <div class="col-md-4">
                                                        <b>DNI</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">import_contacts</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="number" name="TxtDniEmp" class="form-control" maxlength="8" minlength="8" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b>Apellidos</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">contacts</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="text" name="TxtApeEmp" class="form-control" maxlength="40" minlength="5" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b>Nombres</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">contacts</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="text" name="TxtNomEmp" class="form-control" maxlength="40" minlength="5" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b>E-mail</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">mail</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="email" name="TxtEmlEmp" class="form-control" maxlength="50" minlength="10" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b>Usuario de Sessión</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">contact_mail</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="text" name="TxtUsuEmp" class="form-control" maxlength="30" minlength="5" required>
                                                            </div>
                                                            <label for="nomusuario"></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b>Contraseña</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">vpn_key</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="password" name="TxtPswEmp" class="form-control" maxlength="15" minlength="6" required>
                                                            </div>
                                                            <label for="password"></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b>Cargo</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">local_library</i>
                                                            </span>
                                                            <select id="TxtCodCrg" name="TxtCodCrg" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                <option selected disabled></option>
                                                                <?php foreach($this->model->ObtCrg() as $r): ?>
                                                                <option value="<?php echo $r->CodCrg; ?>"><?php echo $r->NomCrg; ?></option>
                                                                <?php endforeach; ?>
                                                            </select> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b>Perfiles</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">group_work</i>
                                                            </span>
                                                            <select id="TxtCodPrf" name="TxtCodPrf" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                            </select> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b>Divisiones</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">local_library</i>
                                                            </span>
                                                            <select id="TxtCodDiv" name="TxtCodDiv" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                <option selected disabled></option>
                                                                <?php foreach($this->model->ObtDiv() as $r): ?>
                                                                <option value="<?php echo $r->CodDiv; ?>"><?php echo $r->NomDiv; ?></option>
                                                                <?php endforeach; ?>
                                                            </select> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b>Score Base</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">assessment</i>
                                                            </span>
                                                            <select  name="TxtCodSrc" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                <option selected disabled></option>
                                                                <?php foreach($this->model->ObtSrc() as $r): ?>
                                                                <option value="<?php echo $r->CodSrc; ?>">
                                                                    <?php if ($r->NumSrc=="0"+$r->NumSrc) echo "0"+$r->NumSrc;
                                                                          else echo $r->NumSrc;
                                                                    ?>
                                                                </option>
                                                                <?php endforeach; ?>
                                                            </select> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Genero</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">accessibility</i>
                                                            </span>
                                                            <div class="demo-radio-button">
                                                                <input name="TxtGnrEmp" type="radio" id="GnrF" class="with-gap radio-col-pink" value="1"/>
                                                                    <label for="GnrF">Femenino</label>
                                                                <input name="TxtGnrEmp" type="radio" id="GnrM" class="with-gap radio-col-blue" value="2" />
                                                                    <label for="GnrM">Masculino</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Foto</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">cloud_upload</i>
                                                            </span>
                                                            <div class="fallback">
                                                                <input name="TxtFotEmp" type="file" required />
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
