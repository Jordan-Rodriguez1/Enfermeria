<?php if($_SESSION['rol'] <= 4){ ?> 
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
                    <h5 class="card-header"><i class="fas fa-recycle"></i> <strong>Caducar Producto</strong></h5>
                    <form method="post" action="<?php echo base_url(); ?>Productos/caducar" autocomplete="off">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="codigo">Código de barras</label>
                                        <input type="hidden" name="id" value="<?php echo $data1['id']; ?>">
                                        <input id="codigo" class="form-control" type="number" name="codigo" value="<?php echo $data1['codigo']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input id="nombre" class="form-control" type="text" name="nombre" value="<?php echo $data1['nombre']; ?>"disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="stock">Inventario mínimo</label>
                                        <input id="stock" class="form-control" type="number" name="stock" max="<?php echo $data1['cantidad']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="id_caducar">Producto Caducado</label>
                                        <select name="id_caducar" id="id_caducar" class="form-control">
                                            <?php foreach ($data2 as $cad) { ?>
                                                <option value="<?php echo $cad['id']; ?>" ><?php echo $cad['nombre']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Modificar</button>
                            <a href="<?php echo base_url(); ?>Productos/Listar" class="btn btn-danger"><i class="fas fa-window-close"></i> Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php } ?>

<?php pie() ?>