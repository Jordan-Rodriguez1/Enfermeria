<?php encabezado() ?>


<!-- Sidebar Navigation end-->
<div class="page-content2">
    <section>
        <div class="card container-fluid2">
            <h5 class="card-header"><i class="fas fa-th"></i> <strong>Panel de Control</strong></h5>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card border-0 shadow h-100 py-2" style="background: #c2258e;">
                                <div class="card-body" style="height: 100%">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-lg-10">
                                            <div class="h3 font-weight-bold text-white text-uppercase mb-1">Asistencias</div>
                                        </div>
                                        <div class="col-lg-2">
                                            <i class="fas fa-check fa-2x text-white"></i>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="h3 mb-0 font-weight-bold text-white text-center"><?php echo $data3['total']; ?> / <?php echo $data2['aminimas']; ?></div>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card border-0 shadow h-100 py-2" style="background: #c2258e;">
                                <div class="card-body" style="height: 100%">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-lg-10">
                                            <div class="h3 font-weight-bold text-white text-uppercase mb-1">Faltas</div>
                                        </div>
                                        <div class="col-lg-2">
                                            <i class="fas fa-times fa-2x text-white"></i>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="h3 mb-0 font-weight-bold text-white text-center"><?php echo $data4['total']; ?> / <?php echo $data2['fmaximas']; ?></div>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card border-0 shadow h-100 py-2" style="background: #c2258e;">
                                <a href="<?php echo base_url(); ?>Dashboard/Lista" style="text-decoration: none; height: 100%;">
                                <div class="card-body" style="height: 100%">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-lg-10">
                                            <br><br>
                                            <div class="h3 font-weight-bold text-white text-uppercase mb-1">Ver Historial</div>
                                        </div>
                                        <div class="col-lg-2">
                                            <br><br>
                                            <i class="fas fa-book-open fa-2x text-white"></i>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>           
            </div>
        </div>
            <!-- Content Row -->
        <div class="card container-fluid2">
            <h5 class="card-header"><i class="fas fa-clipboard"></i> <strong>Prácticas Disponibles</strong></h5>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8 mb-2">
                        </div>
                        <div class="col-lg-4">
                            <?php if (isset($_GET['msg'])) {
                                $alert = $_GET['msg'];
                                if ($alert == "registrado") { ?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>Registrado Exitosamente.</strong>
                                    </div>
                                <?php } else if ($alert == "error") { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error al registrar.</strong>
                                    </div>
                                <?php }
                            } ?>
                        </div>
                        <?php foreach ($data1 as $pd) { ?>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                      <h5 class="card-title"><?php echo $pd['nombre']; ?></h5>
                                      <p class="card-text"><?php echo $pd['descripcion']; ?></p>
                                      <a href="<?php echo base_url() ?>Dashboard/detalles?id=<?php echo $pd['id']; ?>" class="btn btn-primary"><i class="fas fa-eye"></i> Ver Detalles</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>   
                </div>
            </div>
        </div>
    </section>
</div>
<?php pie() ?>