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
<?php }  elseif ($_SESSION['rol'] <= 2) { ?>
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
                                    <button class="btn btn-success mb-2" type="button" data-toggle="modal" data-target="#nuevo_producto"><i class="fas fa-plus-circle"></i> Nuevo</button>
                                    <a class="btn btn-dark mb-2" href="<?php echo base_url(); ?>Productos/eliminados"><i class="fas fa-box"></i> Inactivos</a>
                                    <a class="btn btn-secondary mb-2" href="<?php echo base_url(); ?>Productos/Categorias"><i class="fas fa-tags"></i> Categorias</a>
                                    <a class="btn btn-secondary mb-2" href="<?php echo base_url(); ?>Productos/Proveedores"><i class="fas fa-truck"></i> Proveedores</a>
                                    <button class="btn btn-secondary mb-2" type="button" data-toggle="modal" data-target="#productos"><i class="fas fa-upload"></i> Cargar Productos</button>
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
                                        <?php } else if ($alert == "bien") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>El producto fue transaccionado correctamente.</strong>
                                            </div>
                                        <?php } else if ($alert == "cargado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong><?php echo $_GET['a'];?> productos cargados.</strong> <br>
                                            </div>
                                            <div class="alert alert-danger" role="alert">
                                                <strong><?php echo $_GET['e'];?> errores.</strong> <br>
                                            </div>
                                            <div class="alert alert-warning" role="alert">
                                                <strong><?php echo $_GET['x'];?> productos ya existen.</strong> <br>
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
                                            <th>Tipo</th>
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
                                                <td><?php echo $cl['tipo']; ?></td>
                                                <td>
                                                    <a title="Editar" href="<?php echo base_url() ?>Productos/editar?id=<?php echo $cl['id']; ?>" class="btn btn-primary mb-2"><i class="fas fa-edit"></i></a>
                                                    <form action="<?php echo base_url() ?>Productos/eliminar?id=<?php echo $cl['id']; ?>" method="post" class="d-inline elim">
                                                        <button title="Inactivar" type="submit" class="btn btn-dark mb-2"><i class="fas fa-box"></i></button>
                                                    </form>
                                                    <?php if($cl['tipo'] == "Vigente"){ ?>
                                                        <a title="Caducar" href="<?php echo base_url() ?>Productos/Caducados?id=<?php echo $cl['id']; ?>" class="btn btn-secondary mb-2"><i class="fas fa-recycle"></i></a>
                                                    <?php }?>
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
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tipo">Tipo</label>
                                <select name="tipo" id="tipo" class="form-control">
                                    <option value="Vigente">Vigente</option>
                                    <option value="Caducado">Caducado</option>
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
<div id="productos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title"><i class="fas fa-upload"></i> Cargar Productos</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>Productos/subirarchivo" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="img">Selecciona Archivo</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="archivo">
                            <label class="custom-file-label" for="customFile"></label>
                            <label><br><strong>Nota:</strong> Favor de solo subir el formato que se proporciona editado con los productos, si no sabe como usar el formato dirigase al módulo Ayuda->Materiales. El tamaño máximo del archivo debe ser menor a 20 MB.</label>
                        </div>
                    </div>
                    <button class="btn btn-success mb-2" type="submit" id="subirarchivo"><i class="fas fa-save"></i> Registrar</button>
                    <a href="<?php echo base_url() ?>/Assets/archivos/plantillas/PlantillaProductos.csv" class="btn btn-primary mb-2"><i class="fas fa-download"></i> Formato</a>
                    <button class="btn btn-danger mb-2" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php pie() ?>