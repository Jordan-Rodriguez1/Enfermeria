<?php if($_SESSION['rol'] <= 1){ ?> 
    <?php eror403() ?>
<?php }  else { ?>
    <?php encabezado() ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
    <section>
        <div class="card container-fluid2">
            <h5 class="card-header"><i class="fas fa-th"></i> <strong>Panel de Control</strong></h5>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <?php if($_SESSION['rol'] > 1){ ?>
                            <div class="col-lg-3 mb-5">
                                <div class="card border-0 shadow h-100 py-2" style="background: #c2258e;">
                                    <a href="<?php echo base_url(); ?>Practicas/Practicas" style="text-decoration: none; height: 100%;">
                                    <div class="card-body" style="height: 100%">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-lg-10">
                                                <br><br>
                                                <div class="h3 font-weight-bold text-white text-uppercase mb-1">Prácticas</div>
                                            </div>
                                            <div class="col-lg-2">
                                                <br><br>
                                                <i class="fas fa-book fa-2x text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-5">
                                <div class="card border-0 shadow h-100 py-2" style="background: #c2258e;">
                                    <a href="<?php echo base_url(); ?>Practicas/Plantillas" style="text-decoration: none; height: 100%;">
                                    <div class="card-body" style="height: 100%">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-lg-10">
                                                <br><br>
                                                <div class="h3 font-weight-bold text-white text-uppercase mb-1">Plantillas</div>
                                            </div>
                                            <div class="col-lg-2">
                                                <br><br>
                                                <i class="fas fa-pen-alt fa-2x text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-5">
                                <div class="card border-0 shadow h-100 py-2" style="background: #c2258e;">
                                    <a href="<?php echo base_url(); ?>Movimientos/Listar" style="text-decoration: none; height: 100%;">
                                    <div class="card-body" style="height: 100%">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-lg-10">
                                                <br><br>
                                                <div class="h3 font-weight-bold text-white text-uppercase mb-1">Movimientos</div>
                                            </div>
                                            <div class="col-lg-2">
                                                <br><br>
                                                <i class="fas fa-check-double fa-2x text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-5">
                                <div class="card border-0 shadow h-100 py-2" style="background: #c2258e;">
                                    <a href="<?php echo base_url(); ?>Alumnos/Listar" style="text-decoration: none; height: 100%;">
                                    <div class="card-body" style="height: 100%">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-lg-10">
                                                <br><br>
                                                <div class="h3 font-weight-bold text-white text-uppercase mb-1">Alumnos</div>
                                            </div>
                                            <div class="col-lg-2">
                                                <br><br>
                                                <i class="fas fa-user fa-2x text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if($_SESSION['rol'] > 2){ ?>
                            <div class="col-lg-3 mb-5">
                                <div class="card border-0 shadow h-100 py-2" style="background: #c2258e;">
                                    <a href="<?php echo base_url(); ?>Entradas/Listar" style="text-decoration: none; height: 100%;">
                                    <div class="card-body" style="height: 100%">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-lg-10">
                                                <br><br>
                                                <div class="h3 font-weight-bold text-white text-uppercase mb-1">Nueva Entrada</div>
                                            </div>
                                            <div class="col-lg-2">
                                                <br><br>
                                                <i class="fas fa-shopping-cart fa-2x text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-5">
                                <div class="card border-0 shadow h-100 py-2 " style="background: #c2258e;">
                                    <a href="<?php echo base_url(); ?>Entradas/lista" style="text-decoration: none; height: 100%;">
                                    <div class="card-body" style="height: 100%">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-lg-10">
                                                <br><br>
                                                <div class="h3 font-weight-bold text-white text-uppercase mb-1">Consulta Entradas</div>
                                            </div>
                                            <div class="col-lg-2">
                                                <br><br>
                                                <i class="fas fa-clipboard-list fa-2x text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-5">
                                <div class="card border-0 shadow h-100 py-2" style="background: #c2258e;">
                                    <a href="<?php echo base_url(); ?>Salidas/Listar" style="text-decoration: none; height: 100%;">
                                    <div class="card-body" style="height: 100%">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-lg-10">
                                                <br><br>
                                                <div class="h3 font-weight-bold text-white text-uppercase mb-1">Nueva Salida</div>
                                            </div>
                                            <div class="col-lg-2">
                                                <br><br>
                                                <i class="fas fa-shopping-cart fa-2x text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-5">
                                <div class="card border-0 shadow h-100 py-2 " style="background: #c2258e;">
                                    <a href="<?php echo base_url(); ?>Salidas/lista" style="text-decoration: none; height: 100%;">
                                    <div class="card-body" style="height: 100%">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-lg-10">
                                                <br><br>
                                                <div class="h3 font-weight-bold text-white text-uppercase mb-1">Consulta Salidas</div>
                                            </div>
                                            <div class="col-lg-2">
                                                <br><br>
                                                <i class="fas fa-clipboard-list fa-2x text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-5">
                                <div class="card border-0 shadow h-100 py-2" style="background: #c2258e;">
                                    <a href="<?php echo base_url(); ?>Productos/Listar" style="text-decoration: none; height: 100%;">
                                    <div class="card-body" style="height: 100%">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-lg-10">
                                                <br><br>
                                                <div class="h3 font-weight-bold text-white text-uppercase mb-1">Inventario</div>
                                            </div>
                                            <div class="col-lg-2">
                                                <br><br>
                                                <i class="fas fa-box-open fa-2x text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-5">
                                <div class="card border-0 shadow h-100 py-2" style="background: #c2258e;">
                                    <a href="<?php echo base_url(); ?>Usuarios/Listar" style="text-decoration: none; height: 100%;">
                                    <div class="card-body" style="height: 100%">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-lg-10">
                                                <br><br>
                                                <div class="h3 font-weight-bold text-white text-uppercase mb-1">Usuarios</div>
                                            </div>
                                            <div class="col-lg-2">
                                                <br><br>
                                                <i class="fas fa-users fa-2x text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if($_SESSION['rol'] > 4){ ?>
                            <div class="col-lg-3 mb-5">
                                <div class="card border-0 shadow h-100 py-2" style="background: #c2258e;">
                                    <a href="<?php echo base_url(); ?>Reportes/Alumnos" style="text-decoration: none; height: 100%;">
                                    <div class="card-body" style="height: 100%">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-lg-10">
                                                <br><br>
                                                <div class="h3 font-weight-bold text-white text-uppercase mb-1">Reporte Alumnos</div>
                                            </div>
                                            <div class="col-lg-2">
                                                <br><br>
                                                <i class="fas fa-user fa-2x text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-5">
                                <div class="card border-0 shadow h-100 py-2" style="background: #c2258e;">
                                    <a href="<?php echo base_url(); ?>Reportes/Practicas" style="text-decoration: none; height: 100%;">
                                    <div class="card-body" style="height: 100%">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-lg-10">
                                                <br><br>
                                                <div class="h3 font-weight-bold text-white text-uppercase mb-1">Reporte Prácticas</div>
                                            </div>
                                            <div class="col-lg-2">
                                                <br><br>
                                                <i class="fas fa-book fa-2x text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-5">
                                <div class="card border-0 shadow h-100 py-2" style="background: #c2258e;">
                                    <a href="<?php echo base_url(); ?>Reportes/Materiales" style="text-decoration: none; height: 100%;">
                                    <div class="card-body" style="height: 100%">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-lg-10">
                                                <br><br>
                                                <div class="h3 font-weight-bold text-white text-uppercase mb-1">Reporte Materiales</div>
                                            </div>
                                            <div class="col-lg-2">
                                                <br><br>
                                                <i class="fas fa-boxes fa-2x text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-5">
                                <div class="card border-0 shadow h-100 py-2" style="background: #c2258e;">
                                    <a href="<?php echo base_url(); ?>Configuracion/Listar" style="text-decoration: none; height: 100%;">
                                    <div class="card-body" style="height: 100%">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-lg-10">
                                                <br><br>
                                                <div class="h3 font-weight-bold text-white text-uppercase mb-1">Configuración</div>
                                            </div>
                                            <div class="col-lg-2">
                                                <br><br>
                                                <i class="fas fa-cog fa-2x text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-lg-3 mb-5">
                            <div class="card border-0 shadow h-100 py-2" style="background: #c2258e;">
                                <a href="<?php echo base_url(); ?>Dashboard/Ayuda" style="text-decoration: none; height: 100%;">
                                <div class="card-body" style="height: 100%">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-lg-10">
                                            <br><br>
                                            <div class="h3 font-weight-bold text-white text-uppercase mb-1">Ayuda</div>
                                        </div>
                                        <div class="col-lg-2">
                                            <br><br>
                                            <i class="fas fa-info-circle fa-2x text-white"></i>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-5">
                            <div class="card border-0 shadow h-100 py-2" style="background: #c2258e;">
                                <a style="text-decoration: none; height: 100%;" href="#" data-toggle="modal" data-target="#logout">
                                <div class="card-body" style="height: 100%">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-lg-12">
                                            <br><br>
                                            <div class="h3 font-weight-bold text-white text-uppercase mb-1">Cerrar Sesión</div>
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
    </section>
</div>
<?php } ?>

<?php pie() ?>