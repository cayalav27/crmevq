<?php
    
    require "model/sesiones.php";

    $objses = new sessions();
    $objses->init();

    if(isset($_SESSION["UsuEmp"])){
        $user = $objses->get('UsuEmp');
        $iduser = $objses->get('CodEmp');
        $idcargo = $objses->get('CodCrg');

        if($idcargo != 2){
            $objses->destroy();
            header("location: login");
        }
    }
    
    else{
        $users = isset($_SESSION['UsuEmp']) ? $_SESSION['UsuEmp'] : null ;

        if($users == ''){
        header("location: login");
    }
        }
        
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8"><!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>SG Comercial</title>
        <!-- Favicon-->
        <link rel="icon" href="./favicon.ico" type="image/x-icon">

         <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <script src="assets/js/ajax/jquery.min.js"></script>

        <!-- Bootstrap Core Css -->
        <link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
        
        <!-- Waves Effect Css -->
        <link href="assets/plugins/node-waves/waves.css" rel="stylesheet">

        <!-- Bootstrap Material Datetime Picker Css -->
        <link href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="assets/plugins/animate-css/animate.css" rel="stylesheet">

        <!-- Dropzone Css -->
        <link href="assets/plugins/dropzone/dropzone.css" rel="stylesheet">

        <!-- Multi Select Css -->
        <link href="assets/plugins/multi-select/css/multi-select.css" rel="stylesheet">

        <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" />

        <link href="assets/plugins/select2/css/select2-bootstrap.css" rel="stylesheet" />

        <link href="assets/plugins/select2/css/typography.css" rel="stylesheet" />

        <link href="assets/plugins/select2/css/textfield.css" rel="stylesheet" />

        <link href="assets/plugins/select2/css/pmd-select2.css" rel="stylesheet" />

        <!-- Wait Me Css -->
        <link href="assets/plugins/waitme/waitMe.css" rel="stylesheet" />

        <!-- Sweetalert Css -->
        <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

        <link rel="stylesheet" type="text/css" href="assets/plugins/datatable/css/jquery.dataTables.min.css"/>

        <link rel="stylesheet" type="text/css" href="assets/plugins/datatable/css/responsive.dataTables.min.css"/>

        <!-- Custom Css -->
        <link href="assets/css/style.css" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="assets/css/themes/all-themes.css" rel="stylesheet">      

        <script src="assets/js/highcharts/highcharts.js"></script>
        <script src="assets/js/highcharts/highcharts-3d.js"></script>
        <script src="assets/js/highcharts/highcharts-more.js"></script>
        <script src="assets/js/highcharts/exporting.js"></script>
        <script type="text/javascript">
            Highcharts.setOptions({
                lang: {
                    thousandsSep: ','
                },
                credits: {
                      enabled: false
                }
            });
        </script> 
    </head>
    <body class="theme-teal">
    
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars -->
        <!-- Top Bar -->
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                    <a href="javascript:void(0);" class="bars"></a>
                    <a class="navbar-brand">SG COMERCIAL</a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <!-- se encuentra en la ruta de js/iu/diagogs/ -->
                            <a href="javascript:void(0);" class="btn-exit">
                                <i class="material-icons" data-toggle="tooltip" data-placement="bottom" title="Salir">power_settings_new</i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
   
                    
            