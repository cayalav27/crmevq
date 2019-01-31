    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="card">
                        <div class="header">
                            <ol class="breadcrumb breadcrumb-col-red">
                                <li><a href="backlog"><i class="material-icons">timeline</i> Backlog</a></li>
                            </ol>
                        </div>            
                        <div class="body table-responsive">
                            <table id="dtable" class="display compact" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>RUC </th>
                                        <th>Cliente </th>
                                        <th>Producto</th>
                                        <th>Monto</th>
                                        <th>Fuente</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($this->model->ListBkl($user = $objses->get('CodEmp')) as $r): ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td>
                                            <span data-toggle='tooltip' data-placement="right" title='Ver backlog: <?php echo $r->RucCli; ?>'>
                                                <a href="<?php echo urlencode('backlog&a=DtIndex&CodBkl=').$r->CodBkl; ?>" data-toggle='tooltip'>
                                                    <?php echo $r->RucCli; ?>
                                                </a>
                                            </span>
                                        </td>
                                        <td><?php echo $r->NomCli; ?></td>
                                        <td><?php echo $r->NomProd; ?></td>
                                        <td align="right"><?php echo number_format($r->MntBkl,2); ?></td>
                                        <td align="center"><?php echo $r->DscOgn; ?></td>
                                    </tr>  
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <br>
                            <div class="text-left" role="group" aria-label="Justified button group">
                                <a class="btn bg-cyan btn-xs" data-toggle="modal" data-target="#nuevobacklog" data-placement="top" title='Agregar backlog'>
                                    <i class="material-icons">add</i>
                                </a>
                            </div>
                            <!-- ADD PROD -->
                            <div class="modal fade" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" id="nuevobacklog" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-teal">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="backlog">NUEVO BACKLOG</h4>
                                        </div>
                                        <form id="validate1" action="<?php echo urlencode('backlog&a=RegBkl'); ?>" method="post" enctype="multipart/form-data">
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
                                                        <b>Linea</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">credit_card</i>
                                                            </span>
                                                            <select id="TxtCodDetMrc" name="TxtCodDetMrc" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                <option selected disabled></option>
                                                                <?php foreach($this->model->ListDetMrc($iduser = $objses->get('CodPrf')) as $r): ?>
                                                                <option value="<?php echo $r->CodDetMrc; ?>"><?php echo $r->NomDetMrc; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Producto</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">shopping_cart</i>
                                                            </span>
                                                            <select id="TxtCodProd" name="TxtCodProd" class="js-example-responsive form-control pmd-select2" style="width: 100%" required>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <b>Comentario</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">font_download</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <textarea rows="1" name="TxtComBkl" class="form-control no-resize auto-growth" placeholder="Ex: Comentario sobre el negocio" maxlength="100" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Monto</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">monetization_on</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="number" step="any" name="TxtMntBkl" class="form-control" placeholder="Ex: $300,000.00" min="0" max="9999999999.99" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Fuente</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">content_paste</i>
                                                            </span>
                                                            <SELECT name="TxtCodOgn" class="js-example form-control pmd-select2" style="width: 100%" onchange="if(this.value=='12'){ document.getElementById('fuente').disabled = false} else {document.getElementById('fuente').disabled = true}" required>
                                                                <option selected disabled></option>
                                                                <?php foreach($this->model->ObtOgn() as $r): ?>
                                                                <option value="<?php echo $r->CodOgn; ?>"><?php echo $r->DscOgn; ?></option>
                                                                <?php endforeach; ?>
                                                            </SELECT>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <b>Detalle Fuente</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <div class="form-line">
                                                                <textarea rows="1" name="TxtDtfBkl" class="form-control no-resize auto-growth" maxlength="100" id="fuente" disabled></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="TxtCodEmp" value="<?php echo $iduser = $objses->get('CodEmp'); ?>" />
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
