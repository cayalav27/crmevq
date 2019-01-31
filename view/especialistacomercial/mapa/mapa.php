    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="card">
                        <div class="header">
                            <ol class="breadcrumb breadcrumb-col-red">
                                <li><a href="mapa"><i class="material-icons">map</i> Mapa de Negocios</a></li>
                            </ol>
                        </div>
                        <div class="body">
                            <div id="container" style="min-width: 250px; max-width: 1000px; height: 425px; margin: 10 auto;"></div>
                            <script type="text/javascript">
                                Highcharts.chart('container', {
                                    
                                    chart: {
                                        type: 'bubble',
                                        plotBorderWidth: 1,
                                        zoomType: 'xy'
                                    },

                                    legend: {
                                        enabled: true
                                    },

                                    title: {
                                        text: '<span style="font-size:12px"> Mapa de Negocios </span>'
                                    },

                                    tooltip: {
                                        useHTML: true,
                                        headerFormat: '<table>',
                                        pointFormat: 
                                            '<tr><th colspan="2"><h3 align="center">{point.cliente}</h3></th></tr>' +
                                            '<tr><th width="200">Carpeta:</th><td> {point.carpeta}</td></tr>' +
                                            '<tr><th width="200">Alias:</th><td> {point.alias}</td></tr>' +
                                            '<tr><th width="200">Avance:</th><td> {point.avance}</td></tr>' +
                                            '<tr><th width="200">Fecha aprox. de OC:</th><td> {point.fecha}</td></tr>' +
                                            '<tr><th width="200">Precio sin IGV:</th><td> {point.prcsigv}</td></tr>' +
                                            '<tr><th width="200">Score:</th><td> {point.y}</td></tr>',
                                        footerFormat: '</table>',
                                        followPointer: true
                                    },

                                    plotOptions: {
                                        series: {
                                            dataLabels: {
                                                enabled: true,
                                                format: '{point.name}'
                                            }
                                        }
                                    },

                                    xAxis: {
                                        title: {
                                            text: 'Fecha estimada de OC'
                                        },
                                        type: 'datetime',
                                        labels: {
                                            format: '{value:%d/%m/%Y}',
                                            rotation: 45,
                                            align: 'left'
                                        },
                                        gridLineWidth: 1
                                    },

                                    yAxis: {
                                        title: {
                                            text: 'Score de Negocio'
                                        }
                                    },

                                    series: [{
                                        name: '5 - 40%',
                                        data: [
                                            <?php foreach($this->model->ListMapPC($iduser = $objses->get('CodEmp') , $iduser = $objses->get('CodPrf')) as $r): ?>                   
                                                { x: Date.UTC(<?php echo $r->YearVnt; ?>,<?php echo $r->MonthVnt; ?>,<?php echo $r->DayVnt; ?>), 
                                                  y: <?php echo $r->NumScr; ?>,
                                                  z: <?php echo $r->TotDetVnt; ?>,
                                                  name: '<?php 
                                                            if ($r->EstDetTot == 1) { 
                                                                echo number_format($r->TotDetVnt,2); 
                                                            } 
                                                            else {
                                                                echo number_format($r->SbTDetTot,2);
                                                            }  ?>', cliente: '<?php echo $r->NomCli; ?>', fecha: '<?php echo $r->FocVnt; ?>', carpeta: '<?php echo $r->CptVnt; ?>', alias: '<?php echo $r->AliVnt; ?>', prcsigv: '<?php 
                                                            if ($r->EstDetTot == 1) { 
                                                                echo number_format($r->TotDetVnt,2); 
                                                            } 
                                                            else {
                                                                echo number_format($r->SbTDetTot,2);
                                                            }  ?>', avance: '<?php echo $r->NomAvn; ?>' }, 
                                            <?php endforeach; ?>
                                        ],
                                        color: 'rgba(255,0,0,0.5)',
                                        marker: {
                                            
                                             fillColor: {
                                                 radialGradient: { cx: 0.4, cy: 0.3, r: 0.7 },
                                                 stops: [
                                                     [0, 'rgba(255,255,255,0.5)'],
                                                     [1, 'rgba(255,0,0,0.5)']
                                                 ]
                                             }
                                        }
                                    },
                                    {
                                        name: '50 - 70%',
                                        data: [
                                            <?php foreach($this->model->ListMapPTE($iduser = $objses->get('CodEmp') , $iduser = $objses->get('CodPrf')) as $r): ?>                   
                                                { x: Date.UTC(<?php echo $r->YearVnt; ?>,<?php echo $r->MonthVnt; ?>,<?php echo $r->DayVnt; ?>), 
                                                  y: <?php echo $r->NumScr; ?>,
                                                  z: <?php echo $r->TotDetVnt; ?>,
                                                  name: '<?php 
                                                            if ($r->EstDetTot == 1) { 
                                                                echo number_format($r->TotDetVnt,2); 
                                                            } 
                                                            else {
                                                                echo number_format($r->SbTDetTot,2);
                                                            }  ?>', cliente: '<?php echo $r->NomCli; ?>', fecha: '<?php echo $r->FocVnt; ?>', carpeta: '<?php echo $r->CptVnt; ?>', alias: '<?php echo $r->AliVnt; ?>', prcsigv: '<?php 
                                                            if ($r->EstDetTot == 1) {
                                                                echo number_format($r->TotDetVnt,2); 
                                                            }
                                                            else {
                                                                echo number_format($r->SbTDetTot,2);
                                                            } ?>', avance: '<?php echo $r->NomAvn; ?>' },
                                            <?php endforeach; ?>
                                        ],
                                        color: 'rgba(255,255,0,0.5)',
                                        marker: {
                                            
                                             fillColor: {
                                                 radialGradient: { cx: 0.4, cy: 0.3, r: 0.7 },
                                                 stops: [
                                                     [0, 'rgba(255,255,255,0.5)'],
                                                     [1, 'rgba(255,255,0,0.5)']
                                                 ]
                                             }
                                        }
                                    },
                                    {
                                        name: '80 - 100%',
                                        data: [
                                            <?php foreach($this->model->ListMapMC($iduser = $objses->get('CodEmp') , $iduser = $objses->get('CodPrf')) as $r): ?>                   
                                                { x: Date.UTC(<?php echo $r->YearVnt; ?>,<?php echo $r->MonthVnt; ?>,<?php echo $r->DayVnt; ?>), 
                                                  y: <?php echo $r->NumScr; ?>,
                                                  z: <?php echo $r->TotDetVnt; ?>,
                                                  name: '<?php 
                                                            if ($r->EstDetTot == 1) { 
                                                                echo number_format($r->TotDetVnt,2); 
                                                            } 
                                                            else {
                                                                echo number_format($r->SbTDetTot,2);
                                                            }  ?>', cliente: '<?php echo $r->NomCli; ?>', fecha: '<?php echo $r->FocVnt; ?>', carpeta: '<?php echo $r->CptVnt; ?>', alias: '<?php echo $r->AliVnt; ?>', prcsigv: '<?php 
                                                            if ($r->EstDetTot == 1) { 
                                                                echo number_format($r->TotDetVnt,2); 
                                                            } 
                                                            else {
                                                                echo number_format($r->SbTDetTot,2);
                                                            }  ?>', avance: '<?php echo $r->NomAvn; ?>' },
                                            <?php endforeach; ?>
                                        ],
                                        color: 'rgba(0,255,0,0.5)',
                                        marker: {
                                            
                                             fillColor: {
                                                 radialGradient: { cx: 0.4, cy: 0.3, r: 0.7 },
                                                 stops: [
                                                     [0, 'rgba(255,255,255,0.5)'],
                                                     [1, 'rgba(0,255,0,0.5)']
                                                 ]
                                             }
                                        }
                                    }
                                    ]

                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    

