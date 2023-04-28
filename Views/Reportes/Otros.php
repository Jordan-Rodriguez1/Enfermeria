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
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Total Pedidos</div>
                                    <div class="h5 mb-0 font-weight-bold text-white"><?php echo $data['total']; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="far fa-calendar-alt fa-2x text-white"></i>
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
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Clientes Registrados</div>
                                    <div class="h5 mb-0 font-weight-bold text-white"><?php echo $alert['total']; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-white"></i>
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
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Número de Ventas</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-white"><?php echo $config['total']; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-cart-plus fa-2x text-white"></i>
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
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Valor Stock (Venta)</div>
                                    <div class="h5 mb-0 font-weight-bold text-white">$ <?php echo $cliente['total']; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-boxes fa-2x text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>

            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6">
                <div class="container-fluid container-fluid3">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-pie mr-1"></i>
                            Top 10 Mejores Clientes (Dinero)
                        </div>
                        <div class="card-body"><canvas id="myPieChartCli" width="100%" height="50"></canvas></div>
                    </div>
                </div>
                </div>
                <div class="col-lg-6">
                <div class="container-fluid container-fluid3">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-pie mr-1"></i>
                            Top 10 Productos Más Vendidos (Piezas)
                        </div>
                        <div class="card-body"><canvas id="myPieChartPro" width="100%" height="50"></canvas></div>
                    </div>
                </div>
                </div>
                <div class="col-lg-6">
                <div class="container-fluid container-fluid3">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-pie mr-1"></i>
                            Top 10 personajes Más Vendidos (Piezas)
                        </div>
                        <div class="card-body"><canvas id="myPieChartPer" width="100%" height="50"></canvas></div>
                    </div>
                </div>
                </div>
                <div class="col-lg-6">
                <div class="container-fluid container-fluid3">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-pie mr-1"></i>
                            Top 10 Categorías Más Vendidas (Piezas)
                        </div>
                        <div class="card-body"><canvas id="myPieChartCat" width="100%" height="50"></canvas></div>
                    </div>
                </div>
                </div>
            </div>

        
    </section>

    <script>
        window.addEventListener("load", function() {
            reportesTorta();
            reportesTorta2();
            reportesTorta3();
            reportesTorta4();
        })
    </script>
</div>
<?php pie() ?>