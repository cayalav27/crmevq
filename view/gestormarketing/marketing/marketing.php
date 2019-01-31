<div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="card">
                        <div class="header">
                            <ol class="breadcrumb breadcrumb-col-red">
                                <li><a href="marketing"><i class="material-icons">markunread_mailbox</i> Marketing</a></li>
                            </ol>
                        </div>
                        <div class="body table-responsive">
                            <table id="dtablelistmkt" class="display compact" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha de contacto</th>
                                        <th>Cliente </th>
                                        <th>Contacto </th>
                                        <th>Email </th>
                                        <th>Canal de comunicación</th>
                                        <th>División</th>
                                        <th>Asignado</th>
                                        <th>Tipo</th>
                                        <th>Asunto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($this->model->ListMkt() as $r): ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td width="120">
                                            <span data-toggle='tooltip' data-placement="right" title='Ver detalle de seguimiento'>
                                                <a href="<?php echo urlencode('detallemkt&a=Index&CodMrk=').$r->CodMrk; ?>" data-toggle='tooltip'>
                                                    <?php echo $r->FecMrk; ?>
                                                </a>
                                            </span>
                                        </td>
                                        <td><?php echo $r->NomCli; ?></td>
                                        <td><?php echo $r->NomCont; ?></td>
                                        <td><?php echo $r->EmlCont; ?></td>
                                        <td><?php echo $r->NomCan; ?></td>
                                        <td><?php echo $r->NomDiv; ?></td>
                                        <td><?php echo $r->NomEmp; ?></td>
                                        <td><?php echo $r->NomTipInf; ?></td>
                                        <td width="200" align="justify"><?php echo $r->AsuMrk; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table><br>
                            <div class="text-left" role="group" aria-label="Justified button group">
                                <span data-toggle='tooltip' data-placement="right" title='Nueva comunicación'>
                                    <a class="btn bg-cyan btn-xs" data-toggle="modal" data-target="#nuevaventa">
                                        <i class="material-icons">add</i> 
                                    </a>
                                </span>
                            </div>
                            <!-- ADD PROD -->
                            <div class="modal fade" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" id="nuevaventa" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-teal">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="marketing">NUEVA ATENCIÓN AL CLIENTE</h4>
                                        </div>
                                        <form id="sign_in" action="marketing&a=RegMkt" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="row clearfix">
                                                    <div class="col-md-12">
                                                        <b>Cliente</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">account_balance</i>
                                                            </span>
                                                            <select id="TxtCodCli" name="TxtCodCli" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                                <option selected disabled></option>
                                                                <?php foreach($this->model->ListCli() as $r): ?>
                                                                <option value="<?php echo $r->CodCli; ?>"><?php echo $r->NomCli; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Contacto</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">person</i>
                                                            </span>
                                                            <select id="TxtCodCont" name="TxtCodCont" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Tipo</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">merge_type</i>
                                                            </span>
                                                            <select id="TxtCodTipInf" name="TxtCodTipInf" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                <option selected disabled></option>
                                                                <?php foreach($this->model->ListTipInf() as $r): ?>
                                                                <option value="<?php echo $r->CodTipInf; ?>"><?php echo $r->NomTipInf; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Canal</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">change_history</i>
                                                            </span>
                                                            <select id="TxtCodCan" name="TxtCodCan" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                <option selected disabled></option>
                                                                <?php foreach($this->model->ListCan() as $r): ?>
                                                                <option value="<?php echo $r->CodCan; ?>"><?php echo $r->NomCan; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>División</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">people_outline</i>
                                                            </span>
                                                            <select id="TxtCodDiv" name="TxtCodDiv" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                <option selected disabled></option>
                                                                <?php foreach($this->model->ListDiv() as $r): ?>
                                                                <option value="<?php echo $r->CodDiv; ?>"><?php echo $r->NomDiv; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Encargados</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">person_outline</i>
                                                            </span>
                                                            <select id="TxtCodEmp" name="TxtCodEmp" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Fecha y Hora de contacto</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">today</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="text" name="TxtFecMrk" class="datetimepicker form-control" placeholder="Ex: 20/04/2017 04:50" minlength="4" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <b>Asunto</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">font_download</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <textarea rows="1" name="TxtAsuMrk" class="form-control no-resize auto-growth" placeholder="" maxlength="100" minlength="0" required></textarea>
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
                            <!-- FIN ADD PROD -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>