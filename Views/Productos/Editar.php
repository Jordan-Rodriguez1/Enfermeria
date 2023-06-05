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
                    <h5 class="card-header"><i class="fa fa-edit"></i> <strong>Editar Producto</strong></h5>
                    <form method="post" action="<?php echo base_url(); ?>Productos/actualizar" autocomplete="off">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="codigo">Código de barras</label>
                                <input type="hidden" name="id" value="<?php echo $data1['id']; ?>">
                                <input id="codigo" class="form-control" type="number" name="codigo" value="<?php echo $data1['codigo']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input id="nombre" class="form-control" type="text" name="nombre" value="<?php echo $data1['nombre']; ?>"required>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="precio">Costo $</label>
                                        <input id="precio" class="form-control" type="number" name="precio" value="<?php echo $data1['precio']; ?>"required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="minimo">Inventario mínimo</label>
                                        <input id="minimo" class="form-control" type="number" name="minimo" value="<?php echo $data1['minimo']; ?>"required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="categoria">Categoría</label>
                                        <select name="categoria" id="categoria" class="form-control">
                                            <option value="<?php echo $data1['categoria']; ?>" selected><?php echo $data1['categoria']; ?></option>
                                            <?php foreach ($data2 as $cat) { ?>
                                            <option value="<?php echo $cat['nombre']; ?>" ><?php echo $cat['nombre']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="proveedor">Proveedor</label>
                                        <select name="proveedor" id="proveedor" class="form-control" required>
                                            <option value="<?php echo $data1['proveedor']; ?>" selected><?php echo $data1['proveedor']; ?></option>
                                            <?php foreach ($data3 as $pro) { ?>
                                            <option value="<?php echo $pro['nombre']; ?>"><?php echo $pro['nombre']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="tipo">Tipo</label>
                                        <select name="tipo" id="tipo" class="form-control">
                                            <option value="Vigente" <?php if($data1['tipo'] == "Vigente"){ ?> selected <?php } ?>>Vigente</option>
                                            <option value="Caducado" <?php if($data1['tipo'] == "Caducado"){ ?> selected <?php } ?>>Caducado</option>
                                        </select>
                                    </div>
                                </div>
                                <?php if($_SESSION['rol'] == 5){ ?> 
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="cantidad">Stock</label>
                                            <input id="cantidad" class="form-control" type="number" name="cantidad" value="<?php echo $data1['cantidad']; ?>" required>
                                        </div>
                                    </div>
                                <?php } else {?>
                                    <input type="hidden" name="cantidad" value="<?php echo $data1['cantidad']; ?>">
                                <?php } ?>
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