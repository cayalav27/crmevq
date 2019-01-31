        
        <!-- Jquery Core Js -->
        <script src="assets/plugins/jquery/jquery-3.2.1.min.js"></script>

        <!-- Bootstrap Core Js -->
        <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>

        <script src="assets/plugins/select2/js/textfield.js"></script>

        <script src="assets/plugins/select2/js/select2.full.js"></script>

        <script src="assets/js/select2/select2.js"></script>

        <script src="assets/js/select2/examples2.js"></script>

        <script src="assets/plugins/select2/js/i18n/es.js"></script>

        <!-- Slimscroll Plugin Js -->
        <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

        <!-- Validation Plugin Js -->
        <script src="assets/plugins/jquery-validation/jquery.validate.js"></script>

        <!-- SweetAlert Plugin Js -->
        <script src="assets/plugins/sweetalert/sweetalert.min.js"></script>

        <!-- JQuery Steps Plugin Js -->
        <script src="assets/plugins/jquery-steps/jquery.steps.js"></script>

        <!-- Sparkline Chart Plugin Js -->
        <script src="assets/plugins/jquery-sparkline/jquery.sparkline.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="assets/plugins/node-waves/waves.js"></script>

        <!-- Bootstrap Colorpicker Js -->
        <script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

        <!-- Dropzone Plugin Js -->
        <script src="assets/plugins/dropzone/dropzone.js"></script>
        
        <!-- Input Mask Plugin Js -->
        <script src="assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

        <!-- Bootstrap Tags Input Plugin Js -->
        <script src="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

        <!-- Autosize Plugin Js -->
        <script src="assets/plugins/autosize/autosize.js"></script>
 
        <!-- Bootstrap Notify Plugin Js -->
        <script src="assets/plugins/bootstrap-notify/bootstrap-notify.js"></script>

        <!-- Multi Select Plugin Js -->
        <script src="assets/plugins/multi-select/js/jquery.multi-select.js"></script>

        <!-- Moment Plugin Js -->
        <script src="assets/plugins/momentjs/moment.js"></script>

        <!-- Bootstrap Material Datetime Picker Plugin Js -->
        <script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

        <!-- Custom Js -->
        <script src="assets/js/admin.js"></script>
        <script src="assets/js/pages/cards/colored.js"></script>
        <script src="assets/js/pages/ui/tooltips-popovers.js"></script>
        <script src="assets/js/pages/ui/dialogs.js"></script>
        <script src="assets/js/pages/ui/notifications.js"></script>
        <script src="assets/js/pages/forms/form-validation.js"></script>
        <script src="assets/js/pages/examples/sign-in.js"></script>
        <!-- Se comento noUISlider -->
        <script src="assets/js/pages/forms/basic-form-elements.js"></script>
        <script src="assets/js/pages/forms/advanced-form-elements.js"></script>
        <script src="assets/js/pages/forms/form-wizard.js"></script>

        <script type="text/javascript" src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>

        <script type="text/javascript" src="assets/plugins/datatable/js/dataTables.responsive.min.js"></script>

        <!-- Demo Js -->
        <script src="assets/js/demo.js"></script>

        <script src="assets/js/datatable/tables.js"></script>

        <script src="assets/js/datetimerangepicker/datetime.js"></script>

        <script src="assets/js/validacion/validarRegistro.js"></script>

        <!--script src="assets/js/validacion/validarRegCli.js"></script-->

        <script src="assets/plugins/editable-table/mindmup-editabletable.js"></script>

        <script src="assets/js/pages/tables/editable-table.js"></script>

        <script src="assets/plugins/select2/js/pmd-select2.js"></script>

        <script src="assets/js/ajax/ajaxsistema.js"></script>
        <script src="assets/plugins/jquery-knob/jquery.knob.min.js"></script>
        <script src="assets/js/pages/charts/jquery-knob.js"></script>
        <script src="assets/plugins/prettynumber/jquery.prettynumber.js"></script>

<?php
        //Comprobamos si esta definida la sesión 'tiempo'.
        if(isset($_SESSION['tiempo']) ) {

            //Tiempo en segundos para dar vida a la sesión.
            $inactivo = 1200;

            //Calculamos tiempo de vida inactivo.
            $vida_session = time() - $_SESSION['tiempo'];

                //Comparación para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
                if($vida_session > $inactivo)
                {
                    //Removemos sesión.
                    session_unset();
                    //Destruimos sesión.
                    session_destroy();              
                    //Redirigimos pagina.
                echo "
                <script type='text/javascript'>
                        swal({
                            title: 'Su sesión ha expirado',
                            text: 'Ha excedido el tiempo inactivo, por favor inicie sesión nuevamente',
                            imageUrl: 'assets/images/expirado.png',
                            showCancelButton: false,
                            confirmButtonColor: '#4CAF50',
                            confirmButtonText: 'ACEPTAR',
                            cancelButtonText: 'No, cancel plx!',
                            closeOnConfirm: false,
                            closeOnCancel: false
                        }, function (isConfirm) {
                            if (isConfirm) {
                                window.location='login';
                            } 
                        });
                </script>";
                exit();
                }

        }
        $_SESSION['tiempo'] = time();
?>

    </body>
    <!--script language="Javascript">
        document.oncontextmenu = function(){return false}
    </script-->
</html>
