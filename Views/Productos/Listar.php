<?php encabezado() ?>

<?php if($_SESSION['rol'] <= 2){ ?> 
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
            <h5 class="card-header"><i class="fas fa-box-open"></i> <strong>Productos Registrados</strong></h5>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-8 mb-2">
                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#nuevo_producto"><i class="fas fa-plus-circle"></i> Nuevo</button>
                                    <a class="btn btn-dark" href="<?php echo base_url(); ?>Productos/eliminados"><i class="fas fa-box"></i> Inactivos</a>
                                    <a class="btn btn-secondary" href="<?php echo base_url(); ?>Productos/Categorias"><i class="fas fa-tags"></i> Categorias</a>
                                    <a class="btn btn-secondary" href="<?php echo base_url(); ?>Productos/Proveedores"><i class="fas fa-truck"></i> Proveedores</a>
                                </div>
                                <div class="col-lg-4">
                                    <?php if (isset($_GET['msg'])) {
                                        $alert = $_GET['msg'];
                                        if ($alert == "existe") { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>El producto ya existe.</strong>
                                            </div>
                                        <?php } else if ($alert == "error") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Error al registrar.</strong>
                                            </div>
                                        <?php } else if ($alert == "registrado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Producto registrado.</strong>
                                            </div>
                                        <?php } else if ($alert == "inactivo") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>El producto fue inactivado.</strong>
                                            </div>
                                        <?php } else if ($alert == "modificado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Producto Modificado.</strong>
                                            </div>
                                        <?php }
                                    } ?>
                                </div>
                            </div>
                            <div class="table-responsive mt-4">
                                <table class="table table-hover table-bordered" id="Table">
                                    <thead class="thead-personality">
                                        <tr>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Inventario</th>
                                            <th>Costo</th>
                                            <th>Categoría</th>
                                            <th>Proveedor</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data1 as $cl) { ?>
                                            <tr>
                                                <td><?php echo $cl['codigo']; ?></td>
                                                <td><?php echo $cl['nombre']; ?></td>
                                                <?php if($cl['cantidad'] <= ($cl['minimo'])/2){ ?> 
                                                <td class="table-danger"><?php echo $cl['cantidad']; ?></td>
                                                <?php }  else {if($cl['cantidad'] <= $cl['minimo']){ ?>
                                                <td class="table-warning"><?php echo $cl['cantidad']; ?></td>    
                                                <?php }  else { ?>
                                                <td class="table-success"><?php echo $cl['cantidad']; ?></td>
                                                <?php } }?>
                                                <td><?php echo $cl['precio']; ?></td>
                                                <td><?php echo $cl['categoria']; ?></td>
                                                <td><?php echo $cl['proveedor']; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url() ?>Productos/editar?id=<?php echo $cl['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <form action="<?php echo base_url() ?>Productos/eliminar?id=<?php echo $cl['id']; ?>" method="post" class="d-inline elim">
                                                        <button type="submit" class="btn btn-dark"><i class="fas fa-box"></i></button>
                                                    </form>
                                                </td>
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
<div id="nuevo_producto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title"><i class="fas fa-plus-circle"></i> Nuevo Producto</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>Productos/insertar" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="codigo">Código</label>
                        <input id="codigo" class="form-control" type="number" name="codigo" placeholder="Código" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre/Descripción" required>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="precio">Costo $</label>
                                <input id="precio" class="form-control" type="number" name="precio" placeholder="Costo" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="minimo">Inventario mínimo</label>
                                <input id="minimo" class="form-control" type="number" name="minimo" placeholder="Inventario mínimo" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label for="categoria">Categoría</label>
                            <select name="categoria" id="categoria" class="form-control">
                                <?php foreach ($data2 as $cat) { ?>
                                <option value="<?php echo $cat['nombre']; ?>"><?php echo $cat['nombre']; ?></option>
                                <?php } ?>
                            </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="proveedor">Proveedor</label>
                                <select name="proveedor" id="proveedor" class="form-control">
                                    <?php foreach ($data3 as $pro) { ?>
                                    <option value="<?php echo $pro['nombre']; ?>"><?php echo $pro['nombre']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Registrar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>

<?php pie() ?>