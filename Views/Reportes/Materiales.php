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
                                                    <div class="h3 font-weight-bold text-white text-uppercase mb-1" style="text-align: center;">Total Piezas</div>
                                                    <br>
                                                    <div class="h3 font-weight-bold text-white text-uppercase mb-1" style="text-align: center;"><?php echo $data3['piezas']; ?></div>
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
                                                    <div class="h3 font-weight-bold text-white text-uppercase mb-1" style="text-align: center;">Valor Stock</div>
                                                    <br>
                                                    <div class="h3 font-weight-bold text-white text-uppercase mb-1" style="text-align: center;">$ <?php echo $data3['total']; ?></div>
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
                                                    <div class="h3 font-weight-bold text-white text-uppercase mb-1" style="text-align: center;">Stock Promedio Artículo</div>
                                                    <br>
                                                    <div class="h3 font-weight-bold text-white text-uppercase mb-1" style="text-align: center;"><?php echo $data4['stock']; ?></div>
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
                                                    <div class="h3 font-weight-bold text-white text-uppercase mb-1" style="text-align: center;">Costo Promedio Artículo</div>
                                                    <br>
                                                    <div class="h3 font-weight-bold text-white text-uppercase mb-1" style="text-align: center;">$ <?php echo $data4['costo']; ?></div>
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

<!-- Configuración -->
    <section>
        <div class="card container-fluid3">
            <h5 class="card-header"><i class="fas fa-cogs"></i> <strong>Configuración</strong></h5>
            <div class="card-body">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="<?php echo base_url(); ?>/Reportes/Materiales" method="get">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="inicio">Fecha Inicio</label>
                                            <input id="inicio" class="form-control" type="date" name="inicio" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="fin">Fecha Fin</label>
                                            <input id="fin" class="form-control" type="date" name="fin" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <br>
                                        <button class="btn btn-success" style="margin-top: 8px;" type="submit"><i class="fas fa-filter"></i> Filtrar</button>
                                    </div>
                                </div>
                            </form>
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
                    <h5 class="card-header"><i class="fas fa-chart-bar"></i> <strong>Entradas VS Salidas (Piezas) por Día en Piezas (FILTRO)</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="BarrasMateriales1" width="100%" height="50">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card container-fluid3">
                    <h5 class="card-header"><i class="fas fa-chart-bar"></i> <strong>Entradas VS Salidas por Día en Dinero (FILTRO)</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="BarrasMateriales2" width="100%" height="50">
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
                    <h5 class="card-header"><i class="fas fa-chart-bar"></i> <strong>Top 10 Productos con Más Salidas en Piezas (FILTRO)</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="Materiales1" width="100%" height="50"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card container-fluid3">
                    <h5 class="card-header"><i class="fas fa-chart-bar"></i> <strong>Top 10 Productos con Más Salidas en Dinero (FILTRO)</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="Materiales2" width="100%" height="50"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card container-fluid3">
                    <h5 class="card-header"><i class="fas fa-chart-bar"></i> <strong>Vigente VS Caducado</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="Materiales3" width="100%" height="50"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card container-fluid3">
                    <h5 class="card-header"><i class="fas fa-chart-bar"></i> <strong>Top 10 Proveedores con Más Materiales</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="Materiales4" width="100%" height="50"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card container-fluid3">
                    <h5 class="card-header"><i class="fas fa-chart-bar"></i> <strong>Top 10 Categorías con Más Materiales</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="Materiales5" width="100%" height="50"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card container-fluid3">
                    <h5 class="card-header"><i class="fas fa-chart-bar"></i> <strong>Top 10 Materiales en Más Plantillas</strong></h5>
                    <div class="card-body">
                        <div class="container-fluid ">
                            <canvas id="Materiales6" width="100%" height="50"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tablas -->
    <section>
        <div class="card container-fluid3">
            <h5 class="card-header"><i class="fas fa-user-plus"></i> <strong>Materiales Sin Stock</strong></h5>
            <div class="card-body">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive mt-4">
                                <table class="table table-hover table-bordered" id="Table">
                                    <thead class="thead-personality">
                                        <tr>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Stock</th>
                                            <th>Precio</th>
                                            <th>Proveedor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data1 as $cl) { ?>
                                            <tr>
                                                <td><?php echo $cl['codigo']; ?></td>
                                                <td><?php echo $cl['nombre']; ?></td>
                                                <td><?php echo $cl['cantidad']; ?></td>
                                                <td><?php echo $cl['precio']; ?></td>
                                                <td><?php echo $cl['proveedor']; ?></td>
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
            <h5 class="card-header"><i class="fas fa-user-plus"></i> <strong>Materiales con Poco Stock</strong></h5>
            <div class="card-body">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive mt-4">
                                <table class="table table-hover table-bordered" id="Table2">
                                    <thead class="thead-personality">
                                        <tr>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Stock</th>
                                            <th>Precio</th>
                                            <th>Proveedor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data2 as $no) { ?>
                                            <tr>
                                                <td><?php echo $no['codigo']; ?></td>
                                                <td><?php echo $no['nombre']; ?></td>
                                                <td><?php echo $no['cantidad']; ?></td>
                                                <td><?php echo $no['precio']; ?></td>
                                                <td><?php echo $no['proveedor']; ?></td>
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
            BarrasMateriales1();
            BarrasMateriales2();
            PastelMateriales1();
            PastelMateriales2();
            PastelMateriales3();
            PastelMateriales4();
            PastelMateriales5();
            PastelMateriales6();
        })
    </script>
</div>


<?php } ?>

<?php pie() ?>