<?php encabezado() ?>

<?php if($_SESSION['rol'] <= 4){ ?> 
<div class="page-content bg-light">
    <section>
        <div class="container-fluid container-fluidwelcome"  >
            <div class="row">
                <div class="col-lg-4 mt-2">
                </div>
                <div class="col-lg-4 mt-2">
                <img src="../assets/img/unicornio.png" style="height: 400px; ">
                <h2 class="h5 no-margin-bottom" style="text-align: center">Error: No tienes autorización para ingresar a esta página</h2>
                </div>
                <div class="col-lg-4 mt-2">
                </div>
            </div>
        </div>
    </section>
</div>
<?php }  else { ?>

<!-- Begin Page Content -->
<div class="page-content">
    <section>
        <div class="card container-fluid2">
            <h5 class="card-header"><i class="fas fa-users"></i> <strong>Lista de Asistencia | <?php echo $data2['nombre'] ?> </strong></h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 mb-2">
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>Practicas/Practicas"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                    </div>
                </div>
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="table-responsive mt-4">
                                <table class="table table-hover table-bordered" >
                                    <thead class="thead-personality">
                                        <tr>
                                            <th>Alumnos</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data1 as $cl) { ?>
                                            <tr>
                                                <?php if($cl['asistencia'] == 1){ ?>
                                                <td><?php echo $cl['id_alumnos']; ?></td> 
                                                <td><form action="<?php echo base_url() ?>Practicas/editAsistencia?id=<?php echo $cl['id']; ?>&estado=2&practica=<?php echo $data2['id']?>" method="post" class="d-inline">
                                                    <button type="submit" class="btn btn-success"><i class="fas fa-box"></i></button>
                                                </form></td>
                                                <?php }  elseif ($cl['asistencia'] == 0){ ?>
                                                <td class="table-success"><?php echo $cl['id_alumnos']; ?></td> 
                                                <td class="table-success"><form action="<?php echo base_url() ?>Practicas/editAsistencia?id=<?php echo $cl['id']; ?>&estado=2&practica=<?php echo $data2['id']?>" method="post" class="d-inline">
                                                    <button type="submit" class="btn btn-success"><i class="fas fa-box"></i></button>
                                                </form></td>   
                                                <?php }  else { ?>
                                                <td class="table-danger"><?php echo $cl['id_alumnos']; ?></td> 
                                                <td class="table-danger"><form action="<?php echo base_url() ?>Practicas/editAsistencia?id=<?php echo $cl['id']; ?>&estado=0&practica=<?php echo $data2['id']?>" method="post" class="d-inline">
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-box"></i></button>
                                                </form></td>
                                                <?php }?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-10 mt-2"></div>
                        <div class="col-lg-2 mt-2">                            
                            <form action="<?php echo base_url() ?>Practicas/editAsistencia?id=<?php echo $cl['id']; ?>&estado=2&practica=<?php echo $data2['id']?>" method="post" class="d-inline">
                                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php } ?>

<?php pie() ?>