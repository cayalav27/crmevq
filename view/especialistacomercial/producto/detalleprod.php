    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="card">
                        <div class="header">
                            <ol class="breadcrumb breadcrumb-col-red">
                                <li><a href="<?php echo urlencode('producto&a=Index&CodPrf=').$user = $objses->get('CodPrf'); ?>"><i class="material-icons">business_center</i> Productos</a></li>
                            </ol>
                        </div>
                        <div class="body table-responsive">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <ul class="nav nav-tabs tab-col-teal" role="tablist">
                                    <li role="presentation">
                                        <a href="<?php echo urlencode('producto&a=Index&CodPrf=').$user = $objses->get('CodPrf'); ?>">LINEAS</a>
                                    </li>
                                    <li role="presentation" class="active">
                                        <a>PRODUCTOS</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane animated fadeInRight active" id="cotizacion">
                                        <table id="dtable" class="display compact" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Linea</th>
                                                    <th>Producto</th>
                                                    <th>Precio</th>
                                                    <th>Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach($this->model->ListProd($_REQUEST["CodDetMrc"], $iduser = $objses->get('CodPrf')) as $r): ?>
                                                <tr>
                                                    <td width="30"><?php echo $i++ ?></td>
                                                    <td><?php echo $r->NomDetMrc; ?></td>
                                                    <td><?php echo $r->FabProd.' - '.$r->NomProd; ?></td>
                                                    <td align="right"><?php echo number_format($r->PrcProd,2); ?></td>
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
                                                </tr> 
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


