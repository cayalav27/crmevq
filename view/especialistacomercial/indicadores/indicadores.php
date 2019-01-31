    <div class="container-fluid">
        <div class="row clearfix">
            <a href="venta">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-3 bg-pink hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">shopping_cart</i>
                    </div>
                    <div class="content">
                        <div class="text">VENTAS</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">
                            <?php 
                                foreach($this->model->ListVntCnt($user = $objses->get('CodEmp')) as $r): 
                                    echo $r->NumVnt; 
                                endforeach; 
                            ?> 
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <a href="backlog">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-3 bg-cyan hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">timeline</i>
                    </div>
                    <div class="content">
                        <div class="text">BACKLOG</div>
                        <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">
                            <?php 
                                foreach($this->model->ListBklCnt($user = $objses->get('CodEmp')) as $r): 
                                    echo $r->NumBkl; 
                                endforeach; 
                            ?>    
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <a href="<?php echo urlencode('producto&a=Index&CodPrf=').$user = $objses->get('CodPrf'); ?>">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-3 bg-light-green hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">business_center</i>
                    </div>
                    <div class="content">
                        <div class="text">LINEAS ASIGNADAS</div>
                        <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">
                            <?php 
                                foreach($this->model->ups_DetMrcCnt($user = $objses->get('CodPrf')) as $r): 
                                    echo $r->NumDetMrc; 
                                endforeach; 
                            ?>    
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <a href="cliente">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-3 bg-orange hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">account_balance</i>
                    </div>
                    <div class="content">
                        <div class="text">CLIENTES</div>
                        <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20">
                            <?php foreach($this->model->ListCliCnt() as $r): ?>
                            <?php echo $r->NumCli; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="body">
                <div class="card">
                    <div class="body">
                        <div id="container" style="min-width: 250px; max-width: 1000px; height: 350px; margin: 10 auto;"></div>
                        <script type="text/javascript">
                            var chart = Highcharts.chart('container', {

                                chart: {
                                    type: 'column',
                                    options3d: {
                                        enabled: true,
                                        alpha: 10,
                                        beta: 25,
                                        depth: 70
                                    }
                                },

                                title: {
                                    text: '<span style="font-size:12px">PORCENTAJE DE AVANCE & VALOR DE LOS NEGOCIOS</span>'
                                },

                                legend: {
                                    align: 'center',
                                    verticalAlign: 'bottom',
                                    layout: 'horizontal'
                                },

                                plotOptions: {
                                    series: {
                                        borderWidth: 0,
                                        dataLabels: {
                                            enabled: true,
                                            format: '{point.y:,.2f}'
                                        }
                                    }
                                },

                                xAxis: {
                                    categories: [' ', ' ', ' '],
                                    labels: {
                                        x: -10
                                    }
                                },

                                yAxis: {
                                    allowDecimals: false,
                                    title: {
                                        text: ''
                                    }
                                },

                                tooltip: {
                                    pointFormat: '<span style="color:{point.color}">{series.name}{point.name}</span><b> : {point.y:,.2f}</b>'
                                },

                                series: [{
                                    name: '5 - 30%',
                                    data: 
                                        <?php foreach($this->model->ListAvnPC($iduser = $objses->get('CodEmp') , $iduser = $objses->get('CodPrf')) as $r): ?>
                                                    [<?php echo $r->TotDetVnt; ?>],
                                        <?php endforeach; ?>
                                    color: {
                                        linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
                                        stops: [
                                           [0, 'rgba(255,0,0,0.5)'],
                                           [1, 'rgba(255,0,0,0.5)']
                                        ]
                                    }
                                }, {
                                    name: '50 - 70%',
                                    data: 
                                        <?php foreach($this->model->ListAvnPTE($iduser = $objses->get('CodEmp') , $iduser = $objses->get('CodPrf')) as $r): ?>
                                                    [<?php echo $r->TotDetVnt; ?>],
                                        <?php endforeach; ?>
                                    color: {
                                        linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
                                        stops: [
                                           [0, 'rgba(255,255,0,0.5)'],
                                           [1, 'rgba(255,255,0,0.5)']
                                        ]
                                    }
                                }, {
                                    name: '90 - 100%',
                                    data: 
                                        <?php foreach($this->model->ListAvnMC($iduser = $objses->get('CodEmp') , $iduser = $objses->get('CodPrf')) as $r): ?>
                                                    [<?php echo $r->TotDetVnt; ?>],
                                        <?php endforeach; ?>
                                    color: {
                                        linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
                                        stops: [
                                           [0, 'rgba(0,255,0,0.5)'],
                                           [1, 'rgba(0,255,0,0.5)']
                                        ]
                                    }
                                }]
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="body">
                <div class="card">
                    <div class="body">
                        <div id="container1" style="min-width: 250px; max-width: 1000px; height: 350px; margin: 10 auto;"></div>
                        <script type="text/javascript">
                            var chart = Highcharts.chart('container1', {

                                chart: {
                                    type: 'column',
                                    options3d: {
                                        enabled: true,
                                        alpha: 10,
                                        beta: 25,
                                        depth: 70
                                    }
                                },

                                title: {
                                    text: '<span style="font-size:12px">VALORES NEGOCIOS EN DESARROLLO E INTENCIONES DE NEGOCIO</span>'
                                },

                                legend: {
                                    align: 'center',
                                    verticalAlign: 'bottom',
                                    layout: 'horizontal'
                                },

                                plotOptions: {
                                    series: {
                                        borderWidth: 0,
                                        dataLabels: {
                                            enabled: true,
                                            format: '{point.y:,.2f}'
                                        }
                                    }
                                },

                                xAxis: {
                                    categories: [' ', ' ', ' '],
                                    labels: {
                                        x: -10
                                    }
                                },

                                yAxis: {
                                    allowDecimals: false,
                                    title: {
                                        text: ''
                                    }
                                },

                                tooltip: {
                                    pointFormat: '<span style="color:{point.color}">{series.name}{point.name}</span><b> : {point.y:,.2f}</b>'
                                },

                                series: [{
                                    name: 'Valor de Negocios en Desarrollo',
                                    data: 
                                        <?php foreach($this->model->ListCntVnt($iduser = $objses->get('CodEmp') , $iduser = $objses->get('CodPrf')) as $r): ?>
                                                    [<?php echo $r->TotDetVnt; ?>],
                                        <?php endforeach; ?>
                                    color: {
                                        linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
                                        stops: [
                                           [0, 'rgba(50, 140, 216,0.5)'],
                                           [1, 'rgba(50, 140, 216,0.5)']
                                        ]
                                    }
                                }, {
                                    name: 'Valor de Intenciones de Negocios',
                                    data: 
                                        <?php foreach($this->model->ListCntBkl($iduser = $objses->get('CodEmp') , $iduser = $objses->get('CodPrf')) as $r): ?>
                                                    [<?php echo $r->TotDetBkl; ?>],
                                        <?php endforeach; ?>
                                    color: {
                                        linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
                                        stops: [
                                           [0, 'rgba(0,255,0,0.5)'],
                                           [1, 'rgba(0,255,0,0.5)']
                                        ]
                                    }
                                }]
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="body">
                <div class="card">
                    <div class="body">
                        <div id="container2" style="min-width: 250px; max-width: 1000px; height: 350px; margin: 10 auto;"></div>
                        <script type="text/javascript">
                            Highcharts.chart('container2', {
                                chart: {
                                    type: 'pie',
                                    options3d: {
                                        enabled: true,
                                        alpha: 55,
                                        beta: 0
                                    }
                                },
                                title: {
                                    text: '<span style="font-size:12px">CANTIDAD DE NEGOCIOS EN DESARROLLO E INTENCIONES DE NEGOCIO</span>'
                                },
                                tooltip: {
                                    pointFormat: '<b>{point.y:.0f}</b>'
                                },
                                plotOptions: {
                                    pie: {
                                        allowPointSelect: true,
                                        cursor: 'pointer',
                                        depth: 35,
                                        dataLabels: {
                                            enabled: true,
                                            format: '{point.y:.0f}'
                                        },
                                        showInLegend: true
                                    },
                                },
                                series: [{
                                    type: 'pie',
                                    data: [
                                        {
                                            name: 'Negocios en Desarrollo',
                                            <?php foreach($this->model->ListVntCnt($iduser = $objses->get('CodEmp')) as $r): ?>
                                                y: <?php echo $r->NumVnt; ?>,
                                            <?php endforeach; ?>
                                            color: {
                                                linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
                                                stops: [
                                                   [0, 'rgba(50, 140, 216,0.5)'],
                                                   [1, 'rgba(50, 140, 216,0.5)']
                                                ]
                                            }
                                        },
                                        {
                                            name: 'Intenciones de Negocios',
                                            <?php foreach($this->model->ListBklCnt($iduser = $objses->get('CodEmp') , $iduser = $objses->get('CodPrf')) as $r): ?>
                                                y: <?php echo $r->NumBkl; ?>,
                                            <?php endforeach; ?>
                                            color: {
                                                linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
                                                stops: [
                                                   [0, 'rgba(0,255,0,0.5)'],
                                                   [1, 'rgba(0,255,0,0.5)']
                                                ]
                                            }
                                        }
                                    ]
                                }]
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="body">
                <div class="card">
                    <div class="body">
                        <div id="container3" style="min-width: 250px; max-width: 1000px; height: 300px; margin: 10 auto;"></div>
                        <script type="text/javascript">
                            Highcharts.chart('container3', {
                                chart: {
                                    type: 'pie',
                                    options3d: {
                                        enabled: true,
                                        alpha: 55
                                    }
                                },
                                colors: ['rgba(50, 140, 216,0.5)'],
                                title: {
                                    text: '<span style="font-size:12px">CANTIDAD Y VALOR DEL TOTAL DE NEGOCIOS EN PIPELINE</span>'
                                },
                                plotOptions: {
                                    pie: {
                                        innerSize: 100,
                                        depth: 45,
                                        dataLabels: {
                                            enabled: true,
                                            distance: -50,
                                            style: {
                                                fontWeight: 'bold',
                                                color: 'black'
                                            }
                                        },
                                    },
                                    startAngle: -90,
                                    endAngle: 90
                                },
                                tooltip: {
                                    enabled: false,
                                },
                                series: [{
                                    data: [
                                        <?php foreach($this->model->ListCntVnt($iduser = $objses->get('CodEmp') , $iduser = $objses->get('CodPrf')) as $r): ?>
                                            ['<?php echo number_format($r->TotDetVnt,2); ?>',   <?php echo $r->TotDetVnt; ?>],
                                            ['<?php echo $r->CntTotVnt; ?>', <?php echo $r->CntTotVnt; ?>],
                                        <?php endforeach; ?>
                                    ]
                                }]
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="body">
                <div class="card">
                    <div class="body">
                        <div id="container4" style="min-width: 250px; max-width: 1000px; height: 300px; margin: 10 auto;"></div>
                        <script type="text/javascript">
                            Highcharts.chart('container4', {
                                chart: {
                                    type: 'pie',
                                    options3d: {
                                        enabled: true,
                                        alpha: 55
                                    }
                                },
                                colors: ['rgba(255, 111, 63,0.5)'],
                                title: {
                                    text: '<span style="font-size:12px">CANTIDAD & VALOR DE NEGOCIOS DE BUENA CALIDAD (FORECAST)</span>'
                                },
                                plotOptions: {
                                    pie: {
                                        innerSize: 100,
                                        depth: 45,
                                        dataLabels: {
                                            enabled: true,
                                            distance: -50,
                                            style: {
                                                fontWeight: 'bold',
                                                color: 'black'
                                            }
                                        },
                                    },
                                    startAngle: -90,
                                    endAngle: 90
                                },
                                tooltip: {
                                    enabled: false,
                                },
                                series: [{
                                    data: [
                                        <?php foreach($this->model->ListCntFrt($iduser = $objses->get('CodEmp') , $iduser = $objses->get('CodPrf')) as $r): ?> 
                                            ['<?php echo $r->CntTotVnt; ?>', <?php echo $r->CntTotVnt; ?>],
                                            ['<?php echo number_format($r->TotDetVnt,2); ?>',   <?php echo $r->TotDetVnt; ?>],
                                        <?php endforeach; ?>
                                    ]
                                }]
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div-->
    </div>
</section>
