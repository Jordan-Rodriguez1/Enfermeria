<?php encabezado() ?>

<?php if($_SESSION['rol'] <= 2 || $_SESSION['rol'] < $data1['rol']){ ?> 
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
        <div class="row">
            <div class="col-lg-3 mt-auto">
            </div>
            <div class="col-lg-6 mt-auto">
                <div class="card container-fluid2">
                    <h5 class="card-header"><i class="fa fa-user-edit"></i> <strong>Editar Usuario</strong></h5>
                    <form method="post" action="<?php echo base_url(); ?>Usuarios/actualizar" autocomplete="off"> 
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
                                        <label for="usuario">No. Trabajador</label>
                                        <input id="usuario" class="form-control" type="number" name="usuario" placeholder="No. Trabajador" value="<?php echo $data1['usuario']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="rol">Rol</label>
                                    <select id="rol" class="form-control" name="rol" required>
                                        <?php if ($_SESSION['rol'] >= 5) {?>
                                            <option value="5" <?php if ($data1['rol'] == "5") {echo "selected";} ?>>Administrador</option> <?php } ?>
                                        <?php if ($_SESSION['rol'] >= 4) {?>
                                            <option value="4" <?php if ($data1['rol'] == "4") {echo "selected";} ?>>Gestor</option> <?php } ?>
                                        <?php if ($_SESSION['rol'] >= 3) {?>
                                            <option value="3" <?php if ($data1['rol'] == "3") {echo "selected";} ?>>Vendedor</option> <?php } ?>
                                        <?php if ($_SESSION['rol'] >= 2) {?>
                                            <option value="2" <?php if ($data1['rol'] == "2") {echo "selected";} ?>>Responsable</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Modificar</button>
                            <a href="<?php echo base_url(); ?>Usuarios/Listar" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?php } ?>
<?php pie() ?>