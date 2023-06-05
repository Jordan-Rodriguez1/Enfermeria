<?php if($_SESSION['rol'] <= 4){ ?> 
    <?php eror403() ?>
<?php }  else { ?>
    <?php encabezado() ?>

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
                                                    <div class="h3 font-weight-bold text-white text-uppercase mb-1" style="text-align: center;">$<?php echo round($data1,2); ?></div>
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
                                                    <div class="h3 font-weight-bold text-white text-uppercase mb-1" style="text-align: center;">$<?php echo round($data2['total'],2); ?></div>
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
                                                    <div class="h3 font-weight-bold text-white text-uppercase mb-1" style="text-align: center;"><?php echo round($data3,2); ?></div>
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
                                                    <br><br><br>
                                                    <div class="h3 font-weight-bold text-white text-uppercase mb-1" style="text-align: center;">Promedio Faltas</div>
                                                    <br>
                                                    <div class="h3 font-weight-bold text-white text-uppercase mb-1" style="text-align: center;"><?php echo round($data4,2); ?></div>
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
                    <h5 class="card-header"><i class="fas fa-chart-bar"></i> <strong>Top 10 Plantillas Más Caras (Por Alumno)</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="PracticasCaras" width="100%" height="50">
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
                    <h5 class="card-header"><i class="fas fa-chart-pie"></i> <strong>Top 10 Plantillas Más Usadas (Texto)</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="Practicas1" width="100%" height="75"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card container-fluid3">
                    <h5 class="card-header"><i class="fas fa-chart-pie"></i> <strong>Top 10 Plantillas Más Usadas (Materiales)</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="Practicas2" width="100%" height="75"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card container-fluid3">
                    <h5 class="card-header"><i class="fas fa-chart-pie"></i> <strong>Top 10 Prácticas Con Más Asistencias</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="Practicas3" width="100%" height="75"></canvas>
                        </div>
                    </div>
                    <div class="card-footer">
                        <p><strong>Nota:</strong> se toma en cuenta la plantilla de texto.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card container-fluid3">
                    <h5 class="card-header"><i class="fas fa-chart-pie"></i> <strong>Top 10 Prácticas Con Más Faltas</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="Practicas4" width="100%" height="75"></canvas>
                        </div>
                    </div>
                    <div class="card-footer">
                        <p><strong>Nota:</strong> se toma en cuenta la plantilla de texto.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card container-fluid3">
                    <h5 class="card-header"><i class="fas fa-chart-pie"></i> <strong>Top 10 Usuarios con Más Prácticas Terminadas</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="Practicas5" width="100%" height="75"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card container-fluid3">
                    <h5 class="card-header"><i class="fas fa-chart-pie"></i> <strong>Top 10 Prácticas Realizadas por Semestre</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="Practicas6" width="100%" height="75"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        window.addEventListener("load", function() {
            BarrasPracticas();
            PastelPracticas1();
            PastelPracticas2();
            PastelPracticas3();
            PastelPracticas4();
            PastelPracticas5();
            PastelPracticas6();
        })
    </script>
</div>


<?php } ?>

<?php pie() ?>