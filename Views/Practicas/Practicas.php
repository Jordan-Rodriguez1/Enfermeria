<?php encabezado() ?>

<?php if($_SESSION['rol'] <= 1){ ?> 
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
            <h5 class="card-header"><i class="fas fa-clipboard-list"></i> <strong>Prácticas Generadas</strong></h5>
            <div class="card-body">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-8 mb-2">
                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#nueva_practica"><i class="fas fa-plus-circle"></i> Nueva</button>
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
                                                <strong>Plantilla registrada.</strong>
                                            </div>
                                        <?php } else if ($alert == "modificado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Plantilla modificado.</strong>
                                            </div>
                                        <?php } else if ($alert == "inactivo") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>La plantilla fue inactivada.</strong>
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
                                            <th>Espacios Restantes</th>
                                            <th>Estado</th>
                                            <th>Fecha</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data1 as $lista) { ?>
                                            <tr>
                                                <td><?php echo $lista['id']; ?></td>
                                                <td><?php echo $lista['nombre']; ?></td>
                                                <td><?php echo $lista['capacidad']; ?></td>
                                                <?php if($lista['estado'] == 0){ ?> 
                                                    <td class="table-danger">CANCELADA</td>
                                                <?php }  elseif ($lista['estado'] == 1){ ?>
                                                    <td class="table-warning">EN PROCESO</td>    
                                                <?php }  elseif ($lista['estado'] == 2){ ?>
                                                    <td class="table-warning">EN PROCESO</td>  
                                                <?php }  else { ?>
                                                    <td class="table-success">TERMINADA</td>
                                                <?php } ?>
                                                <td><?php echo $lista['fecha_practica']; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url() ?>Practicas/Peditar?id=<?php echo $lista['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <form action="<?php echo base_url() ?>Practicas/Peliminar?id=<?php echo $lista['id']; ?>" method="post" class="d-inline elim">
                                                        <button type="submit" class="btn btn-dark"><i class="fas fa-user-slash"></i></button>
                                                    </form>  
                                                    <a href="<?php echo base_url() ?>Practicas/Pregistrar?id=<?php echo $lista['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
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
                        <label for="nombre">Nombre de la Práctica</label>
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