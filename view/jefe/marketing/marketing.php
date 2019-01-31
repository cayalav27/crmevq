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
                                        <th>Tipo</th>
                                        <th>División</th>
                                        <th>Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($this->model->ListMkt($iduser = $objses->get('CodDiv')) as $r): ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td>
                                            <span data-toggle='tooltip' data-placement="right" title='Ver detalle de seguimiento'>
                                                <a href="<?php echo urlencode('marketingjf&a=DetalleMkt&CodMrk=').$r->CodMrk; ?>" data-toggle='tooltip'>
                                                    <?php echo $r->FecMrk; ?>
                                                </a>
                                            </span>
                                        </td>
                                        <td><?php echo $r->NomCli; ?></td>
                                        <td><?php echo $r->NomCont; ?></td>
                                        <td><?php echo $r->EmlCont; ?></td>
                                        <td><?php echo $r->NomCan; ?></td>
                                        <td><?php echo $r->NomTipInf; ?></td>
                                        <td><?php echo $r->NomDiv; ?></td>
                                        <td><?php echo $r->AsuMrk; ?></td>
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
</section>