<?php encabezado() ?>

<!-- Begin Page Content -->
<div class="page-content2">
    <section>
        <div class="card container-fluid2">
            <h5 class="card-header"><i class="fas fa-book-open"></i> <strong>Registro de Asistencias</strong></h5>
            <div class="card-body">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-8 mb-2">
                                    <a class="btn btn-primary" href="<?php echo base_url(); ?>Dashboard/Alumnos"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                                </div>
                                <div class="col-lg-4">
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="Table">
                                    <thead class="thead-personality">
                                        <tr>
                                            <th>Práctica</th>
                                            <th>Fecha</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data1 as $lista) { ?>
                                            <tr>
                                                <td><?php echo $lista['nombre']; ?></td>
                                                <td><?php echo $lista['fecha_practica']; ?></td>
                                                <?php if($lista['asistencia'] == 0){ ?> 
                                                    <td class="table-danger">FALTASTE</td>
                                                <?php }  else {if($lista['asistencia'] == 1){ ?>
                                                    <td class="table-warning">PENDIENTE</td>    
                                                <?php }  else { ?>
                                                    <td class="table-success">ASISTENCIA</td>
                                                <?php } }?>
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
</div>

<?php pie() ?>