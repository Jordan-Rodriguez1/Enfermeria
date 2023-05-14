<?php encabezado() ?>

<?php if($_SESSION['rol'] <= 1){ ?> 
    <div class="page-content2">
<?php }  else { ?>
    <div class="page-content">
<?php } ?>
<!-- Sidebar Navigation end-->
    <section>
        <div class="card container-fluid2">
            <h5 class="card-header"><i class="fas fa-th"></i> <strong>Manuales de Usuario</strong></h5>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <?php if($_SESSION['rol'] > 1){ ?>
                            <div class="col-lg-3 mb-5">
                                <div class="card border-0 shadow h-100 py-2" style="background: #c2258e;">
                                    <a href="<?php echo base_url(); ?>Assets/archivos/manuales/Practicas.pdf" style="text-decoration: none; height: 100%;">
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
                                    <a href="<?php echo base_url(); ?>Assets/archivos/manuales/Movimientos.pdf" style="text-decoration: none; height: 100%;">
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
                                    <a href="<?php echo base_url(); ?>Assets/archivos/manuales/Alumnos.pdf" style="text-decoration: none; height: 100%;">
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
                                    <a href="<?php echo base_url(); ?>Assets/archivos/manuales/Entradas.pdf" style="text-decoration: none; height: 100%;">
                                    <div class="card-body" style="height: 100%">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-lg-10">
                                                <br><br>
                                                <div class="h3 font-weight-bold text-white text-uppercase mb-1">Entradas</div>
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
                                <div class="card border-0 shadow h-100 py-2" style="background: #c2258e;">
                                    <a href="<?php echo base_url(); ?>Assets/archivos/manuales/Salidas.pdf" style="text-decoration: none; height: 100%;">
                                    <div class="card-body" style="height: 100%">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-lg-10">
                                                <br><br>
                                                <div class="h3 font-weight-bold text-white text-uppercase mb-1">Salidas</div>
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
                                <div class="card border-0 shadow h-100 py-2" style="background: #c2258e;">
                                    <a href="<?php echo base_url(); ?>Assets/archivos/manuales/Materiales.pdf" style="text-decoration: none; height: 100%;">
                                    <div class="card-body" style="height: 100%">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-lg-10">
                                                <br><br>
                                                <div class="h3 font-weight-bold text-white text-uppercase mb-1">Materiales</div>
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
                                    <a href="<?php echo base_url(); ?>Assets/archivos/manuales/Usuarios.pdf" style="text-decoration: none; height: 100%;">
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
                                    <a href="<?php echo base_url(); ?>Assets/archivos/manuales/Reportes.pdf" style="text-decoration: none; height: 100%;">
                                    <div class="card-body" style="height: 100%">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-lg-10">
                                                <br><br>
                                                <div class="h3 font-weight-bold text-white text-uppercase mb-1">Reportes</div>
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
                                    <a href="<?php echo base_url(); ?>Assets/archivos/manuales/Configuración.pdf" style="text-decoration: none; height: 100%;">
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
                                <a href="<?php echo base_url(); ?>Assets/archivos/manuales/VistaAlumno.pdf" style="text-decoration: none; height: 100%;">
                                <div class="card-body" style="height: 100%">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-lg-10">
                                            <br><br>
                                            <div class="h3 font-weight-bold text-white text-uppercase mb-1">Manual de Usuario</div>
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
                    </div>
                </div>           
            </div>
        </div>
    </section>
</div>


<?php pie() ?>