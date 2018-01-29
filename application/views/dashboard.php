   <?php
   $this->load->view('top');
   #variable con los datos del usuario
   #$datosUsuario['nombre'];

   #link para salir
    #echo site_url('dashboard/logout');

   $this->load->view('sidebar');
   ?>
   <!-- page content -->

            <div class="right_col" role="main">

                <!-- top tiles -->
                <div class="row tile_count">
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-child"></i>Clientes</span>
                            <div class="count green"><?php echo $dash['cuantosClientes']; ?> </div>
                        </div>
                    </div>
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-users"></i> Ejecutivos</span>
                            <div class="count"><?php echo $dash['cuantosEjecutivos']; ?></div>
                        </div>
                    </div>
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-book"></i> Cajeros</span>
                            <div class="count green"><?php echo $dash['cuantosCajeros']; ?></div>
                        </div>
                    </div>
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-desktop"></i> Cuentas de clientes</span>
                            <div class="count"><?php echo $dash['cuantosCuentas']; ?></div>
                        </div>
                    </div>
                </div>
                <!-- /top tiles -->

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="dashboard_graph">

                            <div class="row x_title">
                                <div class="col-md-6">
                                    <h3>Clientes por mes</h3>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div id="placeholder33" style="height: 260px; display: none" class="demo-placeholder"></div>
                                <div style="width: 100%;">
                                    <div class="x_content">
                                    <canvas id="canvas_bar"></canvas>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                                <div class="x_title">
                                    <h2>Cuentas de crédito vs débito</h2>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-6">
                                    <div>
                                        <p>Débito</p>
                                        <div class="">
                                            <div class="progress progress_sm" style="width: 76%;">
                                                <div class="progress-bar" style="background-color: rgba(170, 170, 170, 1);" role="progressbar" data-transitiongoal="80"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-6">
                                    <div>
                                        <p>Crédito</p>
                                        <div class="">
                                            <div class="progress progress_sm" style="width: 76%;">
                                                <div class="progress-bar" style="background-color: rgba(64, 0, 128, 1);" role="progressbar" data-transitiongoal="40"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>

                </div>
                <br />

                <div class="row">

    <!--p> Más información</p-->


                </div>



                        <div class="row">


<!--p> Más información</p-->



                        </div>









                    </div>

                </div>


<!-- chart js -->
    <script src="<?php echo base_url('assets/js/chartjs/chart.min.js'); ?>"></script>
    <script>
        var randomScalingFactor = function () {
            return Math.round(Math.random() * 100)
        };


<?php //print_r($dash['cuentasComparativo']); ?>

        var barChartData = {
            labels: ["  Mayo  ","  Junio  ","   Julio   ","  Agosto  ", " Septiembre ", "  Octubre  "],
            datasets: [
               {
                    fillColor: "#AAAAAA", //rgba(220,220,220,0.5)  ++++gris+++
                    strokeColor: "#AAAAAA", //rgba(220,220,220,0.8)
                    highlightFill: "#AAAAAA", //rgba(220,220,220,0.75)
                    highlightStroke: "#DCDCDC", //rgba(220,220,220,1)
                    data: [310, 100, 200, 222, 150, 333]
            },
                {
                    fillColor: "#400080", //rgba(151,187,205,0.5)  +++morado+++
                    strokeColor: "#400080", //rgba(151,187,205,0.8)
                    highlightFill: "#400080", //rgba(151,187,205,0.75)
                    highlightStroke: "#BA55D3", //rgba(151,187,205,1)
                    data: [500, 600, 200, 700, 600, 200]
            }
        ],
        }

        $(document).ready(function () {
            new Chart($("#canvas_bar").get(0).getContext("2d")).Bar(barChartData, {
                tooltipFillColor: "rgba(51, 51, 51, 1)",
                responsive: true,
                barDatasetSpacing: 5,
                barValueSpacing: 8
            });
        });
</script>
    <?php
    $this->load->view('bottom');
    ?>

