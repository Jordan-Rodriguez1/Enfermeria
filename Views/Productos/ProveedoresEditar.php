<?php if($_SESSION['rol'] <= 2){ ?> 
    <?php eror403() ?>
<?php }  else { ?>
    <?php encabezado() ?>


<!-- Begin Page Content -->
<div class="page-content">
    <section>
        <div class="row">
            <div class="col-lg-3 mt-auto">
            </div>
            <div class="col-lg-6 mt-auto">
                <div class="card container-fluid2">
                    <h5 class="card-header"><i class="fa fa-edit"></i> <strong>Editar Proveedor</strong></h5>
                    <form method="post" action="<?php echo base_url(); ?>Productos/Proveedoresactualizar" autocomplete="off">
                        <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $data1['id']; ?>" required>
                                <label for="nombre">Nombre</label>
                                <input id="nombre" class="form-control" type="text" name="nombre" value="<?php echo $data1['nombre']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input id="direccion" class="form-control" type="text" name="direccion" value="<?php echo $data1['direccion']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input id="telefono" min="1000000000" max="9999999999" class="form-control" type="number" name="telefono" value="<?php echo $data1['telefono']; ?>" required>
                            </div>
                        </div>
                        <div class="card-footer" >
                            <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Modificar</button>
                            <a href="<?php echo base_url(); ?>Productos/Proveedores" class="btn btn-danger"><i class="fas fa-window-close"></i> Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php } ?>

<?php pie() ?>