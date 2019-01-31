<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SG Comercial</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

     <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="assets/css/stylelogin.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="assets/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"></a>
        </div>
        <div class="card">
            <div class="body">
                <p class="text-center">
                    <img src="assets/images/header-logo.png" alt="logo" />
                </p>
                <div class="text-center" style="font-size: 80px;">
                    <i class="small material-icons">account_circle</i>
                </div>
                <form id="sign_in" method="POST" onsubmit="return validarIngreso()" action="login&a=Ingreso">
                    <div class="msg">Inicie sesión con su cuenta</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="login" id="login" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn btn-block btn-xs bg-green waves-effect" name="enviar" type="submit" value="LOGIN">
                            <i class="material-icons">send</i> <span> INGRESAR </span></button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-12 align-right">
                            <a  href="#" data-target="#modalrecuperar" data-toggle="modal">Se olvidó su contraseña?</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal fade" id="modalrecuperar" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-teal">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-center" id="recuperar">RECUPERAR CONTRASEÑA</h4>
                        </div>
                        <form id="validate1" action="empleado&a=Recuperar" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="row clearfix">
                                    <p>
                                        Por favor ingrese su correo registrado para recuperar su contraseña; en caso que no recuerde, comunicarse con Christian Ayala - Practicante Business Intelligence
                                    </p>
                                    <div class="col-md-12">
                                        <div class="form-group form-float form-group-sm">
                                            <div class="form-line">
                                                <input type="email" name="email" class="form-control" maxlength="50" minlength="5" required>
                                                <label class="form-label">E-mail</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <center>
                                    <button type="submit" class="btn bg-orange btn-xs waves-effect">
                                        <i class="material-icons">autorenew</i>
                                        <span>RECUPERAR</span>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <label for="login"></label>
                <label for="password"></label>
            </div>
        </div>
    </div>
    <script src="assets/js/validacion/validarIngreso.js"></script>

    <!-- Jquery Core Js -->
    <script src="assets/plugins/jquery/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="assets/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="assets/js/admin.js"></script>
    <script src="assets/js/pages/examples/sign-in.js"></script>
</body>
</html>

<?php

if(isset($_GET["action"])){
    if($_GET["action"] == "fallo"){

        echo "<div class='alert alert-danger alert-dismissible col-lg-12' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><center>Usuario o contraseña incorrecto</center></div>"; 
    }
}

?>