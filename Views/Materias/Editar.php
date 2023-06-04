<?php menu() ?>

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
<?php }  elseif($_SESSION['rol'] <= 3) { ?>
<div class="page-content">
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
<?php }  else { ?>
    
<!-- Begin Page Content -->
<div class="container">
    <section>
        <div class="row">
            <div class="col-lg-3 mt-auto">
            </div>
            <div class="col-lg-6 mt-auto">
                <div class="card container-fluid2" style="margin: 30px 0 20px 0">
                    <h5 class="card-header"><i class="fa fa-user-edit"></i> <strong>Editar Materias</strong></h5>
                    <form method="post" action="<?php echo base_url(); ?>Materias/actualizar" autocomplete="off"> 
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input id="id" type="hidden" name="id" value="<?php echo $data1['id']; ?>">
                                <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" value="<?php echo $data1['nombre']; ?>" required>
                            </div>
                            <div class="form-group">
                                 <label for="nombre">Correo</label>
                                 <input id="correo" class="form-control" type="email" name="correo" placeholder="Correo" value="<?php echo $data1['correo']; ?>" required>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="usuario">No. Cuenta</label>
                                        <input id="usuario" class="form-control" type="number" name="usuario" placeholder="No. Cuenta" min="10000000" max="99999999" value="<?php echo $data1['usuario']; ?>" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="grupo">Grupo</label>
                                        <input id="grupo" class="form-control" type="text" name="grupo" placeholder="Grupo" value="<?php echo $data1['grupo']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input id="asistencias" class="form-control" type="hidden" name="asistencias" placeholder="Asistencias" value="<?php echo $data1['asistencias']; ?>" required>
                                        <input id="faltas" class="form-control" type="hidden" name="faltas" placeholder="Faltas" value="<?php echo $data1['faltas']; ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success mb-2" type="submit"><i class="fas fa-save"></i> Modificar</button>
                            <a href="<?php echo base_url(); ?>Materias/ListarH" class="btn btn-danger mb-2"><i class="fas fa-window-close"></i> Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?php } ?>
<?php fin() ?>