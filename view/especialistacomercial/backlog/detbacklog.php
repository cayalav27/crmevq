    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="card">
                        <div class="header">
                            <ol class="breadcrumb breadcrumb-col-red">
                                <li><a href="backlog"><i class="material-icons">timeline</i> Backlog</a></li>
                                <li class="active"><strong><?php echo $bag->RucCli; ?> - <?php echo $bag->NomCli; ?></strong></li>
                            </ol>
                        </div>            
                        <div class="body table-responsive">
                            <form id="sign_in" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="CodBkl" value="<?php echo $bag->CodBkl; ?>" />
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th width="100">
                                                <?php 
                                                    if($bag->DscTip=='Privado'){
                                                    echo "<span class='label bg-pink'>Privado</span>";
                                                                              }
                                                    else {
                                                        echo "<span class='label bg-indigo'>Publico</span>";
                                                          }
                                                ?>
                                                <?php 
                                                    if($bag->Indicador=='1'){
                                                        echo "<span class='label label-success'> Activo</span>";
                                                                                  }
                                                    else {
                                                        echo "<span class='label label-danger'> Inactivo</span>";
                                                          }
                                                ?>
                                            </th>
                                            <td width="25"></td>
                                            <td align="right">
                                                <span data-toggle='tooltip' data-placement="left" title='Editar backlog'>
                                                    <a class='btn bg-orange btn-xs' data-toggle="modal" data-target="#edit-<?php echo $bag->CodCli; ?>">
                                                        <i class='material-icons'>edit</i>
                                                    </a>
                                                </span>
                                                <a class='btn btn-DltBkl bg-red btn-xs' data-id="<?php echo $bag->CodBkl; ?>" data-toggle='tooltip' data-placement="bottom" title='Eliminar'>
                                                    <i class='material-icons'>close</i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="100">Dirección</th>
                                            <td width="25">:</td>
                                            <td><?php echo $bag->DirCli; ?>, <?php echo $bag->NomCiu; ?>, <?php echo $bag->NomPais; ?>.</td>
                                        </tr>
                                        <tr>
                                            <th width="100">Telefono</th>
                                            <td width="25">:</td>
                                            <td><?php echo $bag->TlfCli; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="100">E-mail</th>
                                            <td width="25">:</td>
                                            <td><?php echo $bag->EmlCli; ?></td>
                                        </tr>
                                        <tr>
                                            <th width="100">Actividad</th>
                                            <td width="25">:</td>
                                            <td><?php echo $bag->DscAct; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <ul class="nav nav-tabs tab-col-teal" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#detalles" data-toggle="tab">DETALLES</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#comentario" data-toggle="tab">COMENTARIO</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane animated flipInX active" id="detalles">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th width="85">Linea</th>
                                                    <td width="25">:</td>
                                                    <td><?php echo $bag->NomDetMrc; ?></td>
                                                </tr>
                                                <tr>
                                                    <th width="85">Producto</th>
                                                    <td width="25">:</td>
                                                    <td><?php echo $bag->NomProd; ?></td>
                                                </tr>
                                                <tr>
                                                    <th width="85">Precio Lista</th>
                                                    <td width="25">:</td>
                                                    <td><?php echo number_format($bag->PrcProd,2); ?></td>
                                                </tr>
                                                <tr>
                                                    <th width="85">Monto</th>
                                                    <td width="25">:</td>
                                                    <td><?php echo number_format($bag->MntBkl,2); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div role="tabpanel" class="tab-pane animated flipInX" id="comentario">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th width="85">Fuente</th>
                                                    <td width="25">:</td>
                                                    <td><?php echo $bag->DscOgn; ?></td>
                                                </tr>
                                                <tr>
                                                    <th width="85">Otros</th>
                                                    <td width="25">:</td>
                                                    <td><?php echo $bag->DtfBkl; ?></td>
                                                </tr>
                                                <tr>
                                                    <th width="85">Comentario</th>
                                                    <td width="25">:</td>
                                                    <td><?php echo $bag->ComBkl; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--EDIT BKL -->
                            <div class="modal fade" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" id="edit-<?php echo $bag->CodCli; ?>" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-teal">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="backlog">EDITAR EQUIPO</h4>
                                        </div>
                                        <form id="validate3" action="<?php echo urlencode('backlog&a=UpdBkl'); ?>" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="row clearfix">
                                                    <input type="hidden" name="TxtCodBkl" value="<?php echo $bag->CodBkl; ?>" />
                                                    <div class="col-md-12">
                                                        <b>Cliente</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">account_balance</i>
                                                            </span>
                                                            <select name="TxtCodCli" class="js-example-responsive form-control pmd-select2" style="width: 100%" disabled>
                                                                <?php foreach($this->model->ListCli() as $row): ?>
                                                                <option value="<?php echo $row->CodCli; ?>" <?php if($bag->NomCli==$row->NomCli) echo "selected"; ?>  ><?php echo $row->NomCli; ?></option>
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
                                                            <select id="TxtCodDetMrc" name="TxtCodDetMrc" class="js-example form-control pmd-select2" style="width: 100%" disabled>
                                                                <?php foreach($this->model->ListDetMrc($iduser = $objses->get('CodPrf')) as $row): ?>
                                                                <option value="<?php echo $row->CodDetMrc; ?>"  <?php if($bag->NomDetMrc==$row->NomDetMrc) echo "selected"; ?>  ><?php echo $row->NomDetMrc; ?></option>
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
                                                            <select id="TxtCodProd" name="TxtCodProd" class="js-example-responsive form-control pmd-select2" style="width: 100%" disabled>
                                                                <?php foreach($this->model->ListProd() as $row): ?>
                                                                <option value="<?php echo $row->CodProd; ?>" <?php if($bag->NomProd==$row->NomProd) echo "selected"; ?>  ><?php echo $row->NomProd; ?></option>
                                                                <?php endforeach; ?>
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
                                                                <textarea rows="1" name="TxtComBkl" class="form-control no-resize auto-growth" maxlength="100" value="<?php echo $bag->ComBkl; ?>" required><?php echo $bag->ComBkl; ?></textarea>
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
                                                                <input type="number" step="any" name="TxtMntBkl" class="form-control" min="0" max="9999999999.99" value="<?php echo $bag->MntBkl; ?>" required>
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
                                                                <?php foreach($this->model->ObtOgn() as $row): ?>
                                                                <option value="<?php echo $row->CodOgn; ?>" <?php if($bag->DscOgn==$row->DscOgn) echo "selected"; ?> ><?php echo $row->DscOgn; ?></option>
                                                                <?php endforeach; ?>
                                                            </SELECT>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <b>Detalle Fuente</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <div class="form-line">
                                                                <textarea rows="1" name="TxtDtfBkl" class="form-control no-resize auto-growth" maxlength="100" id="fuente" value="<?php echo $bag->DtfBkl; ?>" disabled><?php echo $bag->DtfBkl; ?></textarea>
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
                            <!--FIN EDIT BKL -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
