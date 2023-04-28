<?php encabezado() ?>

<!-- Sidebar Navigation end-->
<div class="page-content" style="background-color: #F5F6FA;">
    <section class="no-padding-bottom">
        <div class="container-fluid container-fluid4">
            <h2 class="h4 no-margin-bottom">Saldos Actuales</h2>
            <br>
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 bg-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Total Gastos</div>
                                    <div class="h5 mb-0 font-weight-bold text-white">$ <?php echo $data['total']; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-wallet fa-2x text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card bg-primary border-0 shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Total Ingresos</div>
                                    <div class="h5 mb-0 font-weight-bold text-white">$ <?php echo $alert['total']; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-wallet fa-2x text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 bg-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Total Compras</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-white">$ <?php echo $config['total']; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-cart-arrow-down fa-2x text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-0 bg-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Total Ventas</div>
                                    <div class="h5 mb-0 font-weight-bold text-white">$ <?php echo $cliente['total']; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-cart-plus fa-2x text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>

            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="container-fluid container-fluid3">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar mr-1"></i>
                            Balance Mensual (Ganancia)
                        </div>
                        <div class="card-body"><canvas id="myBarChartBa" width="100%" height="50"></canvas></div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="container-fluid container-fluid3">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar mr-1"></i>
                            Compras Por Mes
                        </div>
                        <div class="card-body"><canvas id="myBarChartCo" width="100%" height="50"></canvas></div>
                    </div>
                </div>
                </div>
                <div class="col-lg-6">
                <div class="container-fluid container-fluid3">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar mr-1"></i>
                            Ventas Por Mes
                        </div>
                        <div class="card-body"><canvas id="myBarChartVe" width="100%" height="50"></canvas></div>
                    </div>
                </div>
                </div>
                <div class="col-lg-6">
                    <div class="container-fluid container-fluid3">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar mr-1"></i>
                            Gastos Por Mes
                        </div>
                        <div class="card-body"><canvas id="myBarChartGa" width="100%" height="50"></canvas></div>
                    </div>
                </div>
                </div>
                <div class="col-lg-6">
                <div class="container-fluid container-fluid3">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar mr-1"></i>
                            Ingresos Por Mes
                        </div>
                        <div class="card-body"><canvas id="myBarChartIn" width="100%" height="50"></canvas></div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        window.addEventListener("load", function() {
            reportes();
            reportes2();
            reportes3();
            reportes4();
            reportes5();
        })
    </script>
</div>
<?php pie() ?>