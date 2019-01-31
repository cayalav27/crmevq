    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <ol class="breadcrumb breadcrumb-col-red">
                            <li><a href="perfilusuario"><i class="material-icons">person</i> Mi Perfil</a></li>
                        </ol>
                    </div>
                    <div class="body table-responsive">
                        <div class="col-sm-4 col-md-4" align="center">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <img class="profile-user-img" src="assets/fotos/<?php echo $user = $objses->get('FotEmp'); ?>" width="150px" height="150px" alt="No existe foto">
                                <h2 class="profile-username text-center" style="color:#1DA4B9"><?php echo $user = $objses->get('NomEmp'); ?> <?php echo $user = $objses->get('ApeEmp'); ?></h2>
                                <p class="text-muted text-center bg-teal"><?php echo $user = $objses->get('NomCrg'); ?> <?php echo $user = $objses->get('EqpPrf'); ?></p>
                            </div>
                            <form id="sign_in" action="perfilusuario&a=UpdFotEmp" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="TxtCodEmp" value="<?php echo $user = $objses->get('CodEmp'); ?>" />
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="input-group form-float form-group-sm">
                                        <input name="TxtFotEmp" type="file" value="<?php echo $user = $objses->get('FotEmp'); ?>" required/> 
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" align="right">
                                    <span data-toggle='tooltip' data-placement="bottom" title='Actualizar Foto'>
                                        <button type="submit" class="btn bg-blue btn-xs waves-effect">
                                            <i class='material-icons'>camera_alt</i>
                                        </button>
                                    </span>  
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-8 col-md-8">
                            <table class="table" style="border-left: 1px solid #D0D3D4">
                                <tbody>
                                    <br>
                                    <tr>
                                        <td width="25"></td>
                                        <th width="50"><h6>DNI</h6></th>
                                        <td width="50"><h6>:</h6></td>
                                        <td width="200"><h6><?php echo $user = $objses->get('DniEmp'); ?></h6></td>
                                        <td width="50"></td>
                                    </tr>
                                    <tr>
                                        <td width="25"></td>
                                        <th width="50"><h6>Genero</h6></th>
                                        <td width="50"><h6>:</h6></td>
                                        <td width="200">
                                            <h6>
                                                <?php 
                                                    if($user = $objses->get('GnrEmp')=='1'){
                                                        echo "<span class='label bg-pink'>Femenino</span>";
                                                                                  }
                                                    else {
                                                        echo "<span class='label bg-blue'>Masculino</span>";
                                                          }
                                                ?>
                                            </h6>
                                        </td>
                                        <td width="50"></td>
                                    </tr>
                                    <tr>
                                        <td width="25"></td>
                                        <th width="50"><h6>Usuario</h6></th>
                                        <td width="50"><h6>:</h6></td>
                                        <td width="200"><h6><?php echo $user = $objses->get('UsuEmp'); ?></h6></td>
                                        <td width="50"></td>
                                    </tr>
                                    <tr>
                                        <td width="25"></td>
                                        <form id="sign_in" action="perfilusuario&a=UpdEmlEmp" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="TxtCodEmp" value="<?php echo $user = $objses->get('CodEmp'); ?>" />
                                        <th width="50"><h6>Email</h6></th>
                                        <td width="50"><h6>:</h6></td>
                                        <td width="200">
                                            <b>
                                                <div class="input-group form-float form-group-sm">
                                                    <div class="form-line">
                                                        <input type="email" name="TxtEmlEmp" class="form-control" maxlength="50" minlength="10" value="<?php echo $user = $objses->get('EmlEmp'); ?>" required>
                                                    </div>
                                                </div>
                                            </b>
                                        </td>
                                        <td width="50" align="right">
                                            <span data-toggle='tooltip' data-placement="left" title='Actualizar Email'>
                                                <button type="submit" class="btn bg-orange btn-xs waves-effect">
                                                    <i class='material-icons'>mail</i>
                                                </button>
                                            </span>
                                        </td>
                                        </form>
                                    </tr>
                                    <tr>
                                        <td width="25"></td>
                                        <form id="sign_in" action="perfilusuario&a=UpdPswEmp" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="TxtCodEmp" value="<?php echo $user = $objses->get('CodEmp'); ?>" />
                                        <th width="50"><h6>Clave</h6></th>
                                        <td width="50"><h6>:</h6></td>
                                        <td width="200">
                                            <b>
                                                <div class="input-group form-float form-group-sm">
                                                    <div class="form-line">
                                                        <input type="password" name="TxtPswEmp" class="form-control" maxlength="15" minlength="6" value="<?php echo $user = $objses->get('PswEmp'); ?>" required>
                                                    </div>
                                                </div>
                                            </b>
                                        </td>
                                        <td width="50" align="right">
                                            <span data-toggle='tooltip' data-placement="left" title='Actualizar Clave'>
                                                <button type="submit" class="btn bg-green btn-xs waves-effect">
                                                    <i class='material-icons'>vpn_key</i>
                                                </button>
                                            </span>
                                        </td>
                                        </form>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>