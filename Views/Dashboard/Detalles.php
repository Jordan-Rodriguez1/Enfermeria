<?php encabezado() ?>

<?php if($_SESSION['grado'] != $data1['semestre']){ ?> 
<div class="page-content2">
    <section>
        <div class="card container-fluid2 text-center">
            <div class="card-header"><i class="fas fa-exclamation-circle"></i> ERROR</div>
            <div class="card-body">
                <img src="<?php echo base_url() ?>Assets/img/unicornio.png" style="height: 400px; ">
                <h5 class="card-title">Error: Esta práctica no es de tu grado.</h5>
            </div>
            <div class="card-footer text-muted">
              <a href="<?php echo base_url() ?>Dashboard/Alumnos" class="btn btn-primary">Ir al inicio</a>
            </div>
        </div>
    </section>
</div>
<?php }  else { ?>


<!-- Begin Page Content -->
<div class="page-content2">
    <section>
        <div class="row">
            <div class="col-lg-3 mt-auto">
            </div>
            <div class="col-lg-6 mt-auto">
                <div class="card container-fluid2">
                    <h5 class="card-header"><i class="fa fa-edit"></i> <strong>Detalle Práctica</strong></h5>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data1['nombre']; ?></h5>
                        <p class="card-text"><?php echo $data2['descripcion']; ?></p>
                        <h6 class="card-subtitle mb-2 text-muted">Objetivos</h6>
                        <p class="card-text"><?php echo $data2['objetivo']; ?></p>
                        <h6 class="card-subtitle mb-2 text-muted">Requisitos</h6>
                        <p class="card-text"><?php echo $data2['requisitos']; ?></p>
                        <h6 class="card-subtitle mb-2 text-muted">Profesor</h6>
                        <p class="card-text"><?php echo $data3['nombre']; ?></p>
                        <h6 class="card-subtitle mb-2 text-muted">Fecha</h6>
                        <p class="card-text"><?php echo $data1['fecha']; ?></p>
                        <?php if(empty($data4) == 1 && $data5 > 0){ ?> 
                            <form action="<?php echo base_url() ?>Dashboard/registrar?id=<?php echo $data1['id']; ?>" method="post" class="d-inline registro">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Registrar</button>
                        </form>
                        <?php } else{?>
                            <button type="button" class="btn btn-outline-success"><i class="fas fa-check"></i> Registrado</button>
                        <?php }?>
                        <?php if($data2['formato'] != ""){ ?> 
                            <a href="<?php echo base_url(); ?>Assets/archivos/practicas/<?php echo $data2['formato']; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-dark"><i class="fa fa-file-pdf"></i> Formato</a>
                        <?php }?>
                        <a href="<?php echo base_url() ?>Dashboard/Alumnos" class="btn btn-danger"><i class="fas fa-window-close"></i> Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php } ?>

<?php pie() ?>