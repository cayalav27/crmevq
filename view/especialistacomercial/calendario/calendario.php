    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="card">
                        <div class="header">
                            <ol class="breadcrumb breadcrumb-col-red">
                                <li><a href="calendario"><i class="material-icons">date_range</i> Calendario</a></li>
                            </ol>
                        </div>
                        <div class="body" id="full-calendar">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div id="calendar">
                                        <script>
                                            $(document).ready(function() {
                                                
                                                $('#calendar').fullCalendar({
                                                    header: {
                                                        left: 'prev,next today',
                                                        center: 'title',
                                                        right: 'month,agendaWeek,agendaDay,listMonth'
                                                    },
                                                    height: 600,
                                                    defaultDate: new Date(),
                                                    navLinks: true, // can click day/week names to navigate views
                                                    editable: true,
                                                    businessHours: true, // display business hours
                                                    eventLimit: true, // allow "more" link when too many events
                                                    businessHours: {
                                                      start: '8:00', // hora final
                                                      end: '17:45', // hora inicial
                                                      dow: [ 1, 2, 3, 4, 5 ] // dias de semana, 0=Domingo
                                                    },
                                                    events: 
                                                    [
                                                    <?php foreach($this->model->ListCalendar($iduser = $objses->get('CodEmp')) as $r): ?>
                                                        {
                                                            id: '<?php echo $r->CodAgn; ?>',
                                                            title: '<?php echo $r->DscTAgn; ?>',
                                                            carpeta: '<?php echo $r->CptVnt; ?>',
                                                            cliente: '<?php echo $r->NomCli; ?>',
                                                            producto: '<?php echo $r->NomProd; ?>',
                                                            alias: '<?php echo $r->AliVnt; ?>',
                                                            descripcion: '<?php echo $r->DscFAgn; ?>',
                                                            url: '<?php echo urlencode('agenda&a=Evento&CodAgn=').$r->CodAgn; ?>',
                                                            start: '<?php echo $r->FIniAgn; ?>',
                                                            end: '<?php echo $r->FFinAgn; ?>',
                                                            color: '<?php 
                                                            if($r->CodAvn =='1'){
                                                            echo "#FF9800"; //bg-orange
                                                                }
                                                            elseif($r->CodAvn =='2') {
                                                                echo "#9C27B0"; //bg-purple
                                                                    }
                                                            elseif($r->CodAvn =='3') {
                                                                echo "#2196F3"; //bg-blue
                                                                    }
                                                            else{
                                                                echo "#4CAF50"; //bg-green
                                                                    }
                                                            ?>'
                                                        },
                                                    <?php endforeach; ?>
                                                    ],
                                                    eventDrop: function(event, delta, revertFunc){
                                                        var CodAgn = event.id;
                                                        var FIniAgn = event.start.format();
                                                        var FFinAgn = event.end.format();

                                                        swal({
                                                            title: '¿Quieres mover este evento?',
                                                            text: "El registro se moverá a la fecha colocada",
                                                            imageUrl: "assets/images/calendario.png",
                                                            showCancelButton: true,
                                                            confirmButtonColor: "#4CAF50",
                                                            confirmButtonText: 'Sí',
                                                            cancelButtonText:  'No',
                                                            closeOnConfirm: false,
                                                            closeOnCancel: false
                                                            
                                                        },
                                                        function(isConfirm) {
                                                            if (isConfirm) {
                                                                $.post("calendario&a=UpdCalFec",
                                                                    {
                                                                        CodAgn:CodAgn,
                                                                        FIniAgn:FIniAgn,
                                                                        FFinAgn:FFinAgn
                                                                    }
                                                                )
                                                                window.location='calendario';
                                                            } else {
                                                                swal("Cancelado", "Tu evento registrado está a salvo", "error");
                                                                revertFunc();
                                                            }
                                                        })
                                                    },
                                                    eventRender: function(event, element){
                                                      element.popover({
                                                          animation:true,
                                                          delay: 300,
                                                          html: true,
                                                          placement:'bottom',
                                                          container:'body',
                                                          content: '<table class="table" style="font-size:9px;"><tbody><tr><th width="60"># Carpeta</th><td width="25">:</td><td>'+event.carpeta+'</td></tr><tr><th width="60">Cliente</th><td width="25">:</td><td>'+event.cliente+'</td></tr><tr><th width="60">Producto</th><td width="25">:</td><td>'+event.producto+'</td><tr><th width="60">Alias</th><td width="25">:</td><td>'+event.alias+'</td></tr><tr><th width="60">Titulo</th><td width="25">:</td><td>'+event.title+'</td></tr><tr><th width="60">Descripción</th><td width="25">:</td><td>'+event.descripcion+'</td></tr></tbody></table>',
                                                          trigger: 'hover',
                                                      });
                                                    },

                                                    eventResize: function(event, delta, revertFunc){
                                                        var CodAgn = event.id;
                                                        var FFinAgn = event.end.format();

                                                        swal({
                                                            title: '¿Quieres aumentar el día?',
                                                            text: "El registro se aumentará hasta la fecha arrastrada",
                                                            imageUrl: "assets/images/calendario2.png",
                                                            showCancelButton: true,
                                                            confirmButtonColor: "#4CAF50",
                                                            confirmButtonText: 'Sí',
                                                            cancelButtonText:  'No',
                                                            closeOnConfirm: false,
                                                            closeOnCancel: false
                                                            
                                                        },
                                                        function(isConfirm) {
                                                            if (isConfirm) {
                                                                $.post("calendario&a=UpdCalSiz",
                                                                    {
                                                                        CodAgn:CodAgn,
                                                                        FFinAgn:FFinAgn
                                                                    }
                                                                )
                                                                window.location='calendario';
                                                            } else {
                                                                swal("Cancelado", "El aumento a tu evento fue cancelado", "error");
                                                                revertFunc();
                                                            }
                                                        })
                                                    }
                                                });
                                                
                                            });
                                        </script>
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
