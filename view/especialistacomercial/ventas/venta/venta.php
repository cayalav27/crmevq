    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="card">
                        <div class="header">
                            <ol class="breadcrumb breadcrumb-col-red">
                                <li><a href="venta"><i class="material-icons">local_grocery_store</i> Ventas</a></li>
                            </ol>
                        </div>
                        <div class="body table-responsive">
                            <table id="dtablelistvnt" class="display compact" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th># Carpeta </th>
                                        <th>Cliente </th>
                                        <th>Soluciones de Negocio</th>
                                        <th>Alias</th>
                                        <th>Estimado de OC</th>
                                        <th>Acciones</th>
                                        <th>Avance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($this->model->ListVnt($iduser = $objses->get('CodEmp')) as $r): ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td>
                                            <span data-toggle='tooltip' data-placement="right" title='Ver detalle: <?php echo $r->CptVnt; ?>'>
                                                <a href="<?php echo urlencode('detallevnt&a=Index&CodVnt=').$r->CodVnt; ?>" data-toggle='tooltip'>
                                                    <?php echo $r->CptVnt; ?>
                                                </a>
                                            </span>
                                        </td>
                                        <td><?php echo $r->NomCli; ?></td>
                                        <td><?php echo $r->FabProd.' - '.$r->NomProd; ?></td>
                                        <td><?php echo $r->AliVnt; ?></td>
                                        <td align="center"><?php echo $r->FocPVnt; ?></td>
                                        <td align="center">
                                            <?php
                                            if($r->CodEstVnt =='1'){
                                                echo "<span class='label bg-lime'>Pendiente</span>";
                                                    } 
                                            elseif($r->CodEstVnt =='2') {
                                                echo "<span class='label bg-pink'>Seguimiento</span>";
                                                    }
                                            elseif($r->CodEstVnt =='3') {
                                                echo "<span class='label bg-light-green'>Contactado</span>";
                                                    }
                                            elseif($r->CodEstVnt =='4') {
                                                echo "<span class='label bg-brown'>Programado</span>";
                                                    }
                                            elseif($r->CodEstVnt =='5'){
                                                echo "<span class='label bg-indigo'>Visita</span>";
                                                    }
                                            elseif($r->CodEstVnt =='6'){
                                                echo "<span class='label bg-red'>Perdido</span>";
                                                    }
                                            else{
                                                echo "<span class='label bg-teal'>Concluido</span>";
                                                    }
                                            ?>
                                        </td>
                                        <td align="center">
                                            <?php 
                                                if($r->CodAvn =='1'){
                                                echo "<span class='label bg-orange'>Primer Contacto</span>";
                                                    }
                                            elseif($r->CodAvn =='2') {
                                                echo "<span class='label bg-purple'>Propuesta Tecnica/Económica</span>";
                                                    }
                                            elseif($r->CodAvn =='3') {
                                                echo "<span class='label bg-blue'>Negociación</span>";
                                                    }
                                            else{
                                                echo "<span class='label bg-green'>Cierre / Orden Compra</span>";
                                                    }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table><br>
                            <div class="text-left" role="group" aria-label="Justified button group">
                                <span data-toggle='tooltip' data-placement="right" title='Nueva venta'>
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
                                            <h4 class="modal-title text-center" id="venta">NUEVA OPORTUNIDAD DE NEGOCIO VENTA</h4>
                                        </div>
                                        <form id="sign_in" action="venta&a=RegVnt" method="post" enctype="multipart/form-data">
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
                                                    <div class="col-md-4">
                                                        <b># de Carpeta</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">create_new_folder</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="number" name="TxtCptVnt" class="form-control" placeholder="Ex: 13876" maxlength="9" minlength="1" min="0" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b>Fecha probable de OC</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">today</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="text" name="TxtFocVnt" class="datepicker form-control" placeholder="Ex: 20/04/2017" maxlength="10" minlength="4" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
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
                                                        <b>Acción</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">border_color</i>
                                                            </span>
                                                            <select name="TxtCodEstVnt" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                <option selected disabled></option>
                                                                <?php foreach($this->model->ObtEstVnt() as $r): ?>
                                                                <option value="<?php echo $r->CodEstVnt; ?>"><?php echo $r->NomEstVnt; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Avance</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">done_all</i>
                                                            </span>
                                                            <select name="TxtCodAvn" class="js-example form-control pmd-select2" style="width: 100%" required>
                                                                <option selected disabled></option>
                                                                <?php foreach($this->model->ObtAvn() as $r): ?>
                                                                <option value="<?php echo $r->CodAvn; ?>"><?php echo $r->NomAvn; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Alias</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">android</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <textarea rows="1" name="TxtAliVnt" class="form-control no-resize auto-growth" placeholder="Ex: Escriba un alias para identificar rapido al negocio" maxlength="100" minlength="2" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Observaciones</b>
                                                        <div class="input-group form-float form-group-sm">
                                                            <span class="input-group-addon">
                                                                <i class="material-icons">font_download</i>
                                                            </span>
                                                            <div class="form-line">
                                                                <textarea rows="1" name="TxtDscVnt" class="form-control no-resize auto-growth" placeholder="Ex: Se presupuesta para el siguiente año" maxlength="100" minlength="2" required></textarea>
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
