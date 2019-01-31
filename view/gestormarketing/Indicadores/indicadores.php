	<div class="container-fluid">
        <div class="row clearfix">
            <a>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-3 bg-pink hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">sentiment_satisfied</i>
                    </div>
                    <div class="content">
                        <div class="text">ATENCIONES PENDIENTES</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">
                            
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <a>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-3 bg-cyan hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">sentiment_very_satisfied</i>
                    </div>
                    <div class="content">
                        <div class="text">ATENCIONES CULMINADAS</div>
                        <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">
                               
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <a>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box-3 bg-light-green hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">sentiment_very_dissatisfied</i>
                    </div>
                    <div class="content">
                        <div class="text">FUERA DEL RANGO</div>
                        <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">
                              
                        </div>
                    </div>
                </div>
            </div>
            </a>
            <a href="clientemkt">
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
    </div>
</section>
