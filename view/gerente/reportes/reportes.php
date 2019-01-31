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
                <div class="email"><?php echo $user = $objses->get('NomCrg'); ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="perfilgerente"><i class="material-icons">person</i>Mi Perfil</a></li>
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
                    <a href="seguimientogerente">
                        <i class="material-icons">trending_up</i>
                        <span>Seguimiento</span>
                    </a>
                </li>
                <li class="active">
                    <a href="reportesgerente">
                        <i class="material-icons">assessment</i>
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
                                <li><a href="reportesgerente"><i class="material-icons">assessment</i> Reportes</a></li>
                            </ol>
                        </div>
                        <div class="body">
                            <div class="clearfix">
                                <form id="validate1" action="reportesgerente&a=ListRepEft" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="TxtCodPrfGe" value="<?php echo $iduser = $objses->get('CodPrf'); ?>" />
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="card">
                                            <div class="header">
                                                <ol class="breadcrumb breadcrumb-col-red">
                                                    <li class="active"><i class="material-icons">pie_chart_outlined</i> Efectividad de Empleado:</li>
                                                </ol>
                                            </div>
                                            <div class="body">
                                                <div class="row clearfix">
                                                    <div class="col-md-12">
                                                        <b>Empleado</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">account_box</i>
                                                            </span>
                                                            <select id="TxtCodEmp" name="TxtCodEmp" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                                <option selected disabled></option>
                                                                <?php foreach($this->model->ListEmpGe() as $r): ?>
                                                                        <option value="<?php echo $r->CodEmp; ?>"><?php echo $r->NomApeEmp; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 hidden">
                                                        <b>Perfiles</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">group_work</i>
                                                            </span>
                                                            <select id="TxtCodPrf" name="TxtCodPrf" class="form-control">
                                                            </select> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Fecha Inicial</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">today</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="text" name="TxtFIni" class="date-inicio form-control" placeholder="Ex: 01/01/2017" maxlength="10" minlength="4" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Fecha Final</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">event</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="text" name="TxtFFin" class="date-fin form-control" placeholder="Ex: 30/01/2017" maxlength="10" minlength="4" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <b>Estado</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">open_in_browser</i>
                                                            </span>
                                                            <select name="" class="js-example form-control pmd-select2" style="width: 100%" disabled>
                                                                <option value="2">Concluido</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 text-center">
                                                        <button type="submit" class="btn bg-indigo btn-xs waves-effect">
                                                            <i class="material-icons">search</i>
                                                            <span>CONSULTAR</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form id="validate2" action="reportesgerente&a=ListRepRnt" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="TxtCodPrfGe" value="<?php echo $iduser = $objses->get('CodPrf'); ?>" />
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="card">
                                            <div class="header">
                                                <ol class="breadcrumb breadcrumb-col-red">
                                                    <li class="active"><i class="material-icons">monetization_on</i> Rentabilidad:</li>
                                                </ol>
                                            </div>
                                            <div class="body">
                                                <div class="row clearfix">
                                                    <div class="col-md-12">
                                                        <b>Empleado</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">account_box</i>
                                                            </span>
                                                            <select id="TxtCodEmp" name="TxtCodEmp" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                                <option selected disabled></option>
                                                                <option value="0">Todos</option>
                                                                <?php foreach($this->model->ListEmpGe() as $r): ?>
                                                                        <option value="<?php echo $r->CodEmp; ?>"><?php echo $r->NomApeEmp; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 hidden">
                                                        <b>Perfiles</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">group_work</i>
                                                            </span>
                                                            <select id="TxtCodPrf" name="TxtCodPrf" class="form-control">
                                                            </select> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Fecha Inicial</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">today</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="text" name="TxtFIni" class="date-inicio form-control" placeholder="Ex: 01/01/2017" maxlength="10" minlength="4" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Fecha Final</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">event</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="text" name="TxtFFin" class="date-fin form-control" placeholder="Ex: 30/01/2017" maxlength="10" minlength="4" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <b>Estado</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">open_in_browser</i>
                                                            </span>
                                                            <select name="TxtIndicador" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                <option selected disabled></option>
                                                                <option value="0">Todos</option>
                                                                <option value="1">En Desarrollo</option>
                                                                <option value="2">Concluido</option>
                                                                <option value="3">Perdido</option>   
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 text-center">
                                                        <button type="submit" class="btn bg-indigo btn-xs waves-effect">
                                                            <i class="material-icons">search</i>
                                                            <span>CONSULTAR</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>