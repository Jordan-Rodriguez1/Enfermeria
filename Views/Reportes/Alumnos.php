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
                                <?php foreach ($data4 as $tot) { ?>
                                    <div class="col-lg-3">
                                        <div class="card border-0 shadow h-100 py-2 " style="background: #c2258e;">
                                            <div class="card-body" style="height: 100%">
                                                <div class="row no-gutters">
                                                    <div class="col-lg-12">
                                                        <br>
                                                        <div class="h3 font-weight-bold text-white text-uppercase mb-1" style="text-align: center;">Alumos <?php echo $tot['grado']; ?>° Semestre</div>
                                                        <br>
                                                        <div class="h3 font-weight-bold text-white text-uppercase mb-1" style="text-align: center;" ><?php echo $tot['total']; $data5 = $data5 + $tot['total'];?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="col-lg-3">
                                    <div class="card border-0 shadow h-100 py-2 " style="background: #c2258e;">
                                        <div class="card-body" style="height: 100%">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-lg-12">
                                                    <br><br>
                                                    <div class="h3 font-weight-bold text-white text-uppercase mb-1" style="text-align: center;">Total Alumnos</div>
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
                    <h5 class="card-header"><i class="fas fa-chart-bar"></i> <strong>Asistencias VS Faltas por Semestre</strong></h5>
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
                    <h5 class="card-header"><i class="fas fa-chalkboard-teacher"></i> <strong>Asistencias 1° Semestre</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="Semestre1" width="100%" height="50"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card container-fluid3">
                    <h5 class="card-header"><i class="fas fa-chalkboard-teacher"></i> <strong>Asistencias 2° Semestre</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="Semestre2" width="100%" height="50"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card container-fluid3">
                    <h5 class="card-header"><i class="fas fa-chalkboard-teacher"></i> <strong>Asistencias 3° Semestre</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="Semestre3" width="100%" height="50"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card container-fluid3">
                    <h5 class="card-header"><i class="fas fa-chalkboard-teacher"></i> <strong>Asistencias 4° Semestre</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="Semestre4" width="100%" height="50"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card container-fluid3">
                    <h5 class="card-header"><i class="fas fa-chalkboard-teacher"></i> <strong>Asistencias 5° Semestre</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="Semestre5" width="100%" height="50"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card container-fluid3">
                    <h5 class="card-header"><i class="fas fa-chalkboard-teacher"></i> <strong>Asistencias 6° Semestre</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="Semestre6" width="100%" height="50"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card container-fluid3">
                    <h5 class="card-header"><i class="fas fa-chalkboard-teacher"></i> <strong>Asistencias 7° Semestre</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="Semestre7" width="100%" height="50"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tablas -->
    <section>
        <div class="card container-fluid3">
            <h5 class="card-header"><i class="fas fa-user-plus"></i> <strong>Alumnos con Asistencias Completas</strong></h5>
            <div class="card-body">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive mt-4">
                                <table class="table table-hover table-bordered" id="Table">
                                    <thead class="thead-personality">
                                        <tr>
                                            <th>No. Cuenta</th>
                                            <th>Nombre</th>
                                            <th>Semestre</th>
                                            <th>Asistencias</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data1 as $cl) { ?>
                                            <tr>
                                                <td><?php echo $cl['usuario']; ?></td>
                                                <td><?php echo $cl['nombre']; ?></td>
                                                <td><?php echo $cl['grado'] . " " . $cl['grupo']; ?></td>
                                                <td><?php echo $cl['asistencias']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card container-fluid3">
            <h5 class="card-header"><i class="fas fa-user-plus"></i> <strong>Alumnos sin Asistencias Completas</strong></h5>
            <div class="card-body">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive mt-4">
                                <table class="table table-hover table-bordered" id="Table2">
                                    <thead class="thead-personality">
                                        <tr>
                                            <th>No. Cuenta</th>
                                            <th>Nombre</th>
                                            <th>Semestre</th>
                                            <th>Asistencias</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data2 as $no) { ?>
                                            <tr>
                                                <td><?php echo $no['usuario']; ?></td>
                                                <td><?php echo $no['nombre']; ?></td>
                                                <td><?php echo $no['grado'] . " " . $no['grupo']; ?></td>
                                                <td><?php echo $no['asistencias']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card container-fluid3">
            <h5 class="card-header"><i class="fas fa-user-minus"></i> <strong>Alumnos con Faltas Máximas</strong></h5>
            <div class="card-body">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive mt-4">
                                <table class="table table-hover table-bordered" id="Table3">
                                    <thead class="thead-personality">
                                        <tr>
                                            <th>No. Cuenta</th>
                                            <th>Nombre</th>
                                            <th>Semestre</th>
                                            <th>Faltas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data3 as $fa) { ?>
                                            <tr>
                                                <td><?php echo $fa['usuario']; ?></td>
                                                <td><?php echo $fa['nombre']; ?></td>
                                                <td><?php echo $fa['grado'] . " " . $fa['grupo']; ?></td>
                                                <td><?php echo $fa['faltas']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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