<?php encabezado() ?>

<?php if($_SESSION['rol'] <= 1){ ?> 
<div class="page-content2">
    <section>
        <div class="card container-fluid2 text-center">
            <div class="card-header"><i class="fas fa-exclamation-circle"></i> ERROR</div>
            <div class="card-body">
                <img src="../Assets/img/unicornio.png" style="height: 400px; ">
                <h5 class="card-title">Error: No tienes acceso a esta página.</h5>
            </div>
            <div class="card-footer text-muted">
              <a href="<?php echo base_url() ?>Dashboard/Alumnos" class="btn btn-primary">Ir al inicio</a>
            </div>
        </div>
    </section>
</div>
<?php }  elseif ($_SESSION['rol'] <= 4) { ?>
<div class="page-content">
   <section>
        <div class="card container-fluid2 text-center">
            <div class="card-header"><i class="fas fa-exclamation-circle"></i> ERROR</div>
            <div class="card-body">
                <img src="../Assets/img/unicornio.png" style="height: 400px; ">
                <h5 class="card-title">Error: No tienes acceso a esta página.</h5>
            </div>
            <div class="card-footer text-muted">
              <a href="<?php echo base_url() ?>Dashboard/Listar" class="btn btn-primary">Ir al inicio</a>
            </div>
        </div>
    </section>
</div>
<?php }  else { ?>

<div class="page-content">
    <section>
        <div class="row">
            <div class="col-lg-12">
                <div class="card container-fluid2">
                    <h5 class="card-header"><i class="fas fa-th"></i></i> <strong>Datos Generales</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="card border-0 shadow h-100 py-2 " style="background: #c2258e;">
                                        <div class="card-body" style="height: 100%">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-lg-12">
                                                    <br><br>
                                                    <div class="h3 font-weight-bold text-white text-uppercase mb-1" style="text-align: center;">Costo Promedio Plantillas</div>
                                                    <br>
                                                    <div class="h3 font-weight-bold text-white text-uppercase mb-1" style="text-align: center;"><?php echo $data5; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="card border-0 shadow h-100 py-2 " style="background: #c2258e;">
                                        <div class="card-body" style="height: 100%">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-lg-12">
                                                    <br><br>
                                                    <div class="h3 font-weight-bold text-white text-uppercase mb-1" style="text-align: center;">Costo Promedio Salidas</div>
                                                    <br>
                                                    <div class="h3 font-weight-bold text-white text-uppercase mb-1" style="text-align: center;"><?php echo $data5; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="card border-0 shadow h-100 py-2 " style="background: #c2258e;">
                                        <div class="card-body" style="height: 100%">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-lg-12">
                                                    <br><br>
                                                    <div class="h3 font-weight-bold text-white text-uppercase mb-1" style="text-align: center;">Promedio Asistencias</div>
                                                    <br>
                                                    <div class="h3 font-weight-bold text-white text-uppercase mb-1" style="text-align: center;"><?php echo $data5; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="card border-0 shadow h-100 py-2 " style="background: #c2258e;">
                                        <div class="card-body" style="height: 100%">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-lg-12">
                                                    <br><br>
                                                    <div class="h3 font-weight-bold text-white text-uppercase mb-1" style="text-align: center;">Promedio Faltas</div>
                                                    <br>
                                                    <div class="h3 font-weight-bold text-white text-uppercase mb-1" style="text-align: center;"><?php echo $data5; ?></div>
                                                </div>
                                            </div>
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

<!-- Barras -->
    <section>
        <div class="row">
            <div class="col-lg-12">
                <div class="card container-fluid3">
                    <h5 class="card-header"><i class="fas fa-chart-bar"></i> <strong>Plantillas Más Caras (Por Alumno)</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="BarrasAlumnos" width="100%" height="50">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Pastel -->
    <section>
        <div class="row">
            <div class="col-lg-6">
                <div class="card container-fluid3">
                    <h5 class="card-header"><i class="fas fa-chalkboard-teacher"></i> <strong>Plantillas Más Usadas (Texto)</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="Semestre1" width="100%" height="50"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card container-fluid3">
                    <h5 class="card-header"><i class="fas fa-chalkboard-teacher"></i> <strong>Plantillas Más Usadas (Materiales)</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="Semestre2" width="100%" height="50"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card container-fluid3">
                    <h5 class="card-header"><i class="fas fa-chalkboard-teacher"></i> <strong>Prácticas Con Más Asistencias</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="Semestre3" width="100%" height="50"></canvas>
                        </div>
                    </div>
                    <div class="card-footer">
                        <p><strong>Nota:</strong> se toma en cuenta la plantilla de texto.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card container-fluid3">
                    <h5 class="card-header"><i class="fas fa-chalkboard-teacher"></i> <strong>Prácticas Con Más Faltas</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="Semestre4" width="100%" height="50"></canvas>
                        </div>
                    </div>
                    <div class="card-footer">
                        <p><strong>Nota:</strong> se toma en cuenta la plantilla de texto.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card container-fluid3">
                    <h5 class="card-header"><i class="fas fa-chalkboard-teacher"></i> <strong>Usuario con Más Prácticas</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="Semestre5" width="100%" height="50"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card container-fluid3">
                    <h5 class="card-header"><i class="fas fa-chalkboard-teacher"></i> <strong>Prácticas Realizadas por Semestre</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="Semestre6" width="100%" height="50"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        window.addEventListener("load", function() {
            BarrasAlumnos();
            PastelSemestre1();
            PastelSemestre2();
            PastelSemestre3();
            PastelSemestre4();
            PastelSemestre5();
            PastelSemestre6();
            PastelSemestre7();
        })
    </script>
</div>


<?php } ?>

<?php pie() ?>