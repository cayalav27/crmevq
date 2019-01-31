    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="card">
                        <div class="header">
                            <ol class="breadcrumb breadcrumb-col-red">
                                <li><a href="reportesjefe"><i class="material-icons">assessment</i> Reporte - Efectividad del vendedor</a></li>
                            </ol>
                        </div>
                        <div class="body">
                            <div class="clearfix">
                                <form id="validate1" action="reportesjefe&a=ListRep" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="TxtCodPrfJf" value="<?php echo $iduser = $objses->get('CodPrf'); ?>" />
                                    <div class="col-md-4">
                                        <b>Empleado</b>
                                        <div class="input-group form-float form-group-sm">
                                            <span class="input-group-addon">
                                                <i class="material-icons">account_box</i>
                                            </span>
                                            <select id="TxtCodEmp" name="TxtCodEmp" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                <option selected disabled></option>
                                                <?php if($user = $objses->get('NomPrf') == 'jefe-comercial1') { 
                                                    foreach($this->model->ListEmpIAL() as $r): ?>
                                                        <option value="<?php echo $r->CodEmp; ?>"><?php echo $r->NomApeEmp; ?></option>
                                                <?php endforeach; } 
                                                    else { 
                                                    foreach($this->model->ListEmpCC() as $r): ?>
                                                        <option value="<?php echo $r->CodEmp; ?>"><?php echo $r->NomApeEmp; ?></option>
                                                <?php endforeach; } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 hidden">
                                        <b>Perfiles</b>
                                        <div class="input-group form-float form-group-sm">
                                            <span class="input-group-addon">
                                                <i class="material-icons">group_work</i>
                                            </span>
                                            <select id="TxtCodPrf" name="TxtCodPrf" class="form-control">
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="col-md-4">
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
                                    <div class="col-md-4">
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
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn bg-indigo btn-xs waves-effect">
                                            <i class="material-icons">search</i>
                                            <span>CONSULTAR</span>
                                        </button>
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