<?php if($_SESSION['rol'] <= 1){ ?> 
    <?php eror403() ?>
<?php }  else { ?>
    <?php encabezado() ?>

<!-- Begin Page Content -->
<div class="page-content">
    <section>
        <div class="card container-fluid2">
            <h5 class="card-header"><i class="fas fa-clock"></i> <strong>Prácticas Pendientes y En Proceso</strong></h5>
            <div class="card-body">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-8 mb-2">
                                    <button class="btn btn-success mb-2" type="button" data-toggle="modal" data-target="#nueva_practica"><i class="fas fa-plus-circle"></i> Nueva</button>
                                </div>
                                <div class="col-lg-4">
                                    <?php if (isset($_GET['msg'])) {
                                        $alert = $_GET['msg'];
                                        if ($alert == "existe") { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>La plantilla ya existe.</strong>
                                            </div>
                                        <?php } else if ($alert == "error") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Error al registra.</strong>
                                            </div>
                                        <?php } else if ($alert == "registrado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Práctica registrada.</strong>
                                            </div>
                                        <?php } else if ($alert == "cancelada") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Práctica cancelada.</strong>
                                            </div>
                                        <?php } else if ($alert == "modificada") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Práctica modificada.</strong>
                                            </div>
                                        <?php } else if ($alert == "lista") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Lista nombrada correctamente.</strong>
                                            </div>
                                        <?php } else if ($alert == "cancelada") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>La práctica fue cancelada.</strong>
                                            </div>
                                        <?php }
                                    } ?>
                                </div>
                            </div>
                            <div class="table-responsive mt-4">
                                <table class="table table-hover table-bordered" id="Table">
                                    <thead class="thead-personality">
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Alumnos Registrados</th>
                                            <th>Estado</th>
                                            <th>Fecha</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data1 as $lista) { ?>
                                            <?php if ($lista['estado'] == 1 || $lista['estado'] == 2) { ?>
                                            <tr>
                                                <td><?php echo $lista['id']; ?></td>
                                                <td><?php echo $lista['nombre']; ?></td>
                                                <td><?php echo ($lista['registros']." / ".$lista['capacidad']); ?></td>
                                                <?php if($lista['estado'] == 1){ ?> 
                                                    <td class="table-warning">PENDIENTE</td>    
                                                <?php }  elseif ($lista['estado'] == 2){ ?>
                                                    <td class="table-secondary">EN PROCESO</td>  
                                                <?php } ?>
                                                <td><?php echo $lista['fecha_practica']; ?></td>
                                                <td>
                                                <?php if($lista['estado'] == 1){ ?>     
                                                    <a href="<?php echo base_url() ?>Practicas/Peditar?id=<?php echo $lista['id']; ?>" class="btn btn-primary mb-2"><i class="fas fa-edit"></i></a>
                                                    <form action="<?php echo base_url() ?>Practicas/Peliminar?id=<?php echo $lista['id']; ?>&estado=0" method="post" class="d-inline Cprac">
                                                        <button type="submit" class="btn btn-danger mb-2"><i class="fas fa-times"></i></button>
                                                    </form>  
                                                    <a href="<?php echo base_url() ?>Practicas/NombrarLista?id=<?php echo $lista['id']; ?>" class="btn btn-secondary mb-2"><i class="fas fa-users"></i></a>
                                                <?php }  elseif ($lista['estado'] == 2){ ?>
                                                    <form action="<?php echo base_url() ?>Practicas/agregarMateriales?id=<?php echo $lista['id']; ?>&plantilla=<?php echo $lista['id_plantillam']; ?>" method="post" class="d-inline Mprac">
                                                        <button type="submit" class="btn btn-secondary mb-2"><i class="fas fa-shopping-cart"></i></button>
                                                    </form>  
                                                <?php } ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
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
    <section>
        <div class="card container-fluid2">
            <h5 class="card-header"><i class="fas fa-clipboard-list"></i> <strong>Historial de Prácticas</strong></h5>
            <div class="card-body">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="table-responsive mt-4">
                                <table class="table table-hover table-bordered" id="Table2">
                                    <thead class="thead-personality">
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Alumnos Registrados</th>
                                            <th>Estado</th>
                                            <th>Fecha</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data1 as $lista) { ?>
                                            <?php if ($lista['estado'] == 0 || $lista['estado'] == 3) { ?>
                                            <tr>
                                                <td><?php echo $lista['id']; ?></td>
                                                <td><?php echo $lista['nombre']; ?></td>
                                                <td><?php echo ($lista['registros']." / ".$lista['capacidad']); ?></td>
                                                <?php if($lista['estado'] == 0){ ?> 
                                                    <td class="table-danger">CANCELADA</td>
                                                <?php }  elseif ($lista['estado'] == 3){ ?>
                                                    <td class="table-success">TERMINADA</td>
                                                <?php } ?>
                                                <td><?php echo $lista['fecha_practica']; ?></td>
                                                <td>
                                                    <?php if($lista['estado'] == 3){ ?>   
                                                        <form action="<?php echo base_url() ?>Practicas/agregarMateriales?id=<?php echo $lista['id']; ?>&plantilla=<?php echo $lista['id_plantillam']; ?>" method="post" class="d-inline">
                                                            <button type="submit" class="btn btn-secondary mb-2"><i class="fas fa-shopping-cart"></i></button>
                                                        </form>  
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
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

<div id="nueva_practica" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title"><i class="fas fa-plus-circle"></i> Nueva Practica</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>Practicas/agregar" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre de la Práctica y Aula</label>
                        <textarea class="form-control" name="nombre" id="nombre" rows="1" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="id_plantilla">Selecciona la Plantilla (Texto)</label>
                        <select name="id_plantilla" id="id_plantilla" class="form-control">
                            <?php foreach ($data2 as $plan) { ?>
                            <option value="<?php echo $plan['id']; ?>"><?php echo $plan['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_plantillam">Selecciona la Plantilla (Materiales)</label>
                        <select name="id_plantillam" id="id_plantillam" class="form-control">
                            <?php foreach ($data3 as $planm) { ?>
                            <option value="<?php echo $planm['id']; ?>"><?php echo $planm['descripcion']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_responsable">Profesor que va impartir</label>
                        <select name="id_responsable" id="id_responsable" class="form-control">
                            <?php foreach ($data4 as $res) { ?>
                            <option value="<?php echo $res['id']; ?>"><?php echo $res['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fecha_practica">Fecha de la práctica</label>
                        <input class="form-control" type="datetime-local" name="fecha_practica" id="fecha_practica" required>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="capacidad">Alumnos máximos</label>
                                <input class="form-control" type="number" name="capacidad" id="capacidad" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Semestre">Semestre al que va dirigido</label>
                                <input class="form-control" type="number" name="Semestre" id="Semestre" required>
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