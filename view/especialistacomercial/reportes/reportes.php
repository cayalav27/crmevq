    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="card">
                        <div class="header">
                            <ol class="breadcrumb breadcrumb-col-red">
                                <li><a href="reportes"><i class="material-icons">assessment</i> Reportes</a></li>
                            </ol>
                        </div>
                        <div class="body">
                            <div class="clearfix">
                                <form id="validate1" action="reportes&a=ListPip" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="TxtCodEmp" value="<?php echo $iduser = $objses->get('CodEmp'); ?>" />
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="card">
                                            <div class="header">
                                                <ol class="breadcrumb breadcrumb-col-red">
                                                    <li class="active"><i class="material-icons">assignment</i> Consulta Pipeline:</li>
                                                </ol>
                                            </div>
                                            <div class="body">
                                                <div class="row clearfix">
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
                                                                <option value="1">Perdido</option>
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
                                <form id="validate2" action="reportes&a=ListBkg" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="TxtCodEmp" value="<?php echo $iduser = $objses->get('CodEmp'); ?>" />
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="card">
                                            <div class="header">
                                                <ol class="breadcrumb breadcrumb-col-red">
                                                    <li class="active"><i class="material-icons">timeline</i> Consulta Backlog:</li>
                                                </ol>
                                            </div>
                                            <div class="body">
                                                <div class="row clearfix">
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
                                                            <select name="TxtIndicador" class="js-example form-control pmd-select2" style="width: 100%" disabled>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>