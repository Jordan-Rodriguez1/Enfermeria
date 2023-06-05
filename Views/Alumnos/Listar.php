<?php encabezado() ?>
<?php if($_SESSION['rol'] <= 1){ ?> 
    <?php eror403() ?>
<?php }  else { ?>

<!-- Begin Page Content -->
<div class="page-content">
    <section>
        <div class="card container-fluid2">
            <h5 class="card-header"><i class="fas fa-users"></i> <strong>Alumnos Registrados</strong></h5>
            <div class="card-body">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-8 mb-2">
                                    <?php if($_SESSION['rol'] >= 4){ ?> 
                                        <button class="btn btn-success mb-2" type="button" data-toggle="modal" data-target="#nuevo_cliente"><i class="fas fa-plus-circle"></i> Nuevo</button>
                                        <a href="<?php echo base_url(); ?>Alumnos/eliminados" class="btn btn-dark mb-2"><i class="fas fa-users-slash"></i> Inactivos</a>
                                        <button class="btn btn-secondary mb-2" type="button" data-toggle="modal" data-target="#alumnos"><i class="fas fa-upload"></i> Cargar Alumnos</button>
                                        <form action="<?php echo base_url() ?>Alumnos/subirgrado" method="post" class="d-inline subir">
                                            <button type="submit" class="btn btn-secondary mb-2"><i class="fas fa-level-up-alt"></i> Subir Grado</button>
                                        </form> 
                                        <form action="<?php echo base_url() ?>Alumnos/reiniciarhoras" method="post" class="d-inline horas">
                                            <button type="submit" class="btn btn-secondary mb-2"><i class="fas fa-redo"></i> Reiniciar Asistencias / Faltas</button>
                                        </form> 
                                    <?php } ?> 
                                </div>
                                <div class="col-lg-4">
                                    <?php if (isset($_GET['msg'])) {
                                        $alert = $_GET['msg'];
                                        if ($alert == "existe") { ?>
                                            <div class="alert alert-warning" role="alert">
                                                <strong>El alumno ya existe.</strong>
                                            </div>
                                        <?php } else if ($alert == "error") { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Error al registrar.</strong>
                                            </div>
                                        <?php } else if ($alert == "registrado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Alumno registrado.</strong>
                                            </div>
                                        <?php } else if ($alert == "rest") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>La contraseña del alumno se restableció.</strong>
                                            </div>
                                        <?php } else if ($alert == "modificado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Alumno modificado.</strong>
                                            </div>
                                        <?php } else if ($alert == "subido") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>Grado aumentado a todos los alumnos.</strong>
                                            </div>
                                        <?php } else if ($alert == "cargado") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong><?php echo $_GET['a'];?> alumnos cargados.</strong> <br>
                                            </div>
                                            <div class="alert alert-danger" role="alert">
                                                <strong><?php echo $_GET['e'];?> errores.</strong> <br>
                                            </div>
                                            <div class="alert alert-warning" role="alert">
                                                <strong><?php echo $_GET['x'];?> alumnos ya existen.</strong> <br>
                                            </div>
                                        <?php } else if ($alert == "inactivo") { ?>
                                            <div class="alert alert-success" role="alert">
                                                <strong>El usuario fue inactivado.</strong>
                                            </div>
                                        <?php }
                                    } ?>
                                </div>
                            </div>
                            <div class="table-responsive mt-4">
                                <table class="table table-hover table-bordered" id="Table">
                                    <thead class="thead-personality">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>No. Cuenta</th>
                                            <th>Correo</th>
                                            <th>Grado</th>
                                            <th>Grupo</th>
                                            <th>Asistencias</th>
                                            <th>Faltas</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data1 as $us) { ?>
                                        <?php if($_SESSION['rol'] >= $us['rol']){ ?>
                                            <tr>
                                                <td><?php echo $us['nombre']; ?></td>
                                                <td><?php echo $us['usuario']; ?></td>
                                                <td><?php echo $us['correo']; ?></td>
                                                <td><?php echo $us['grado'];?></td>
                                                <td><?php echo $us['grupo'];?></td>
                                                <?php if($us['asistencias'] < ($data3[$us['grado']-1]['aminimas'])/2 ){ ?> 
                                                <td class="table-danger"><?php echo $us['asistencias']; ?></td>
                                                <?php }  elseif ($us['asistencias'] < ($data3[$us['grado']-1]['aminimas'])){ ?>
                                                <td class="table-warning"><?php echo $us['asistencias']; ?></td>    
                                                <?php }  else { ?>
                                                <td class="table-success"><?php echo $us['asistencias']; ?></td>
                                                <?php } ?>
                                                <?php if($us['faltas'] <= ($data3[$us['grado']-1]['fmaximas'])/2){ ?> 
                                                <td class="table-success"><?php echo $us['faltas']; ?></td>
                                                <?php }  else {if($us['faltas'] < $data3[$us['grado']-1]['fmaximas']){ ?>
                                                <td class="table-warning"><?php echo $us['faltas']; ?></td>    
                                                <?php }  else { ?>
                                                <td class="table-danger"><?php echo $us['faltas']; ?></td>
                                                <?php } }?>
                                                <td>
                                                    <?php if($_SESSION['rol'] >= 4){ ?> 
                                                        <a title="Editar" href="<?php echo base_url() ?>Alumnos/editar?id=<?php echo $us['id']; ?>" class="btn btn-primary mb-2"><i class="fas fa-edit"></i></a>
                                                        <form action="<?php echo base_url() ?>Alumnos/eliminar?id=<?php echo $us['id']; ?>" method="post" class="d-inline elim">
                                                            <button title="Inactivar" type="submit" class="btn btn-dark mb-2"><i class="fas fa-user-slash"></i></button>
                                                        </form> 
                                                        <form action="<?php echo base_url() ?>Alumnos/restablecer?id=<?php echo $us['id']; ?>" method="post" class="d-inline rest">
                                                            <button title="Restablecer contraseña" type="submit" class="btn btn-secondary mb-2"><i class="fas fa-unlock-alt"></i></button>
                                                        </form>    
                                                    <?php } else {?>  
                                                        <p href="">SIN ACCIONES</p>
                                                    <?php } ?>        
                                                </td>
                                            </tr>
                                        <?php } }?>
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
<div id="nuevo_cliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title"><i class="fas fa-plus-circle"></i> Nuevo Alumno</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url(); ?>Alumnos/insertar" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Correo</label>
                        <input id="correo" class="form-control" type="email" name="correo" placeholder="Correo" required>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="usuario">No. Cuenta</label>
                                <input id="usuario" class="form-control" type="number" min="10000000" max="99999999" name="usuario" placeholder="No. Cuenta" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="grado">Grado</label>
                                <input id="grado" class="form-control" type="number" name="grado" max="<?php echo $data2['semestres']; ?>" placeholder="Grado" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="grupo">Grupo</label>
                                <input id="grupo" class="form-control" type="text" name="grupo" maxlength="1" placeholder="Grupo" required>
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
<div id="alumnos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title"><i class="fas fa-upload"></i> Cargar Alumnos</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>Alumnos/subirarchivo" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="img">Selecciona Archivo</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="archivo">
                            <label class="custom-file-label" for="customFile"></label>
                            <label><br><strong>Nota:</strong> Favor de solo subir el formato que se proporciona editado con los alumnos, si no sabe como usar el formato dirigase al módulo Ayuda->Alumnos. El tamaño máximo del archivo debe ser menor a 20 MB.</label>
                        </div>
                    </div>
                    <button class="btn btn-success mb-2" type="submit" id="subirarchivo"><i class="fas fa-save"></i> Registrar</button>
                    <a href="<?php echo base_url() ?>Assets/archivos/plantillas/PlantillaAlumnos.csv" class="btn btn-primary mb-2"><i class="fas fa-download"></i> Formato</a>
                    <button class="btn btn-danger mb-2" type="button" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancelar</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>


<?php pie() ?>