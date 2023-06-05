<?php if($_SESSION['rol'] <= 1){ ?> 
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
                    <h5 class="card-header"><i class="fa fa-edit"></i> <strong>Editar Práctica</strong></h5>
                    <form method="post" action="<?php echo base_url(); ?>Practicas/Pactualizar" autocomplete="off" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nombre">Nombre de la Práctica y Aula</label>
                                <input class="form-control" type="hidden" name="id" id="id" value="<?php echo $data1['id']; ?>">
                                <textarea class="form-control" name="nombre" id="nombre" rows="1" required><?php echo $data1['nombre']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="id_plantilla">Selecciona la Plantilla (Texto)</label>
                                <select name="id_plantilla" id="id_plantilla" class="form-control">
                                    <?php foreach ($data2 as $plan) { ?>
                                        <?php if ($plan['id'] == $data1['id_plantilla']) { ?>
                                            <option value="<?php echo $plan['id']; ?>" selected><?php echo $plan['nombre']; ?></option>
                                        <?php } else{ ?>
                                            <option value="<?php echo $plan['id']; ?>"><?php echo $plan['nombre']; ?></option> 
                                    <?php } } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_plantillam">Selecciona la Plantilla (Materiales)</label>
                                <select name="id_plantillam" id="id_plantillam" class="form-control">
                                    <?php foreach ($data3 as $planm) { ?>
                                        <?php if ($planm['id'] == $data1['id_plantillam']) { ?>
                                            <option value="<?php echo $planm['id']; ?>" selected><?php echo $planm['descripcion']; ?></option>
                                        <?php } else{ ?>
                                            <option value="<?php echo $planm['id']; ?>"><?php echo $planm['descripcion']; ?></option> 
                                    <?php } } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_responsable">Profesor que va impartir</label>
                                <select name="id_responsable" id="id_responsable" class="form-control">
                                    <?php foreach ($data4 as $res) { ?>
                                        <?php if ($res['id'] == $data1['id_responsable']) { ?>
                                            <option value="<?php echo $res['id']; ?>" selected><?php echo $res['nombre']; ?></option>
                                        <?php } else{ ?>
                                            <option value="<?php echo $res['id']; ?>"><?php echo $res['nombre']; ?></option> 
                                    <?php } } ?>
                                </select>
                            </div>
                            <?php if ($data1['registros'] != 0) { ?>
                                <div class="form-group">
                                    <label for="fecha_practica">Fecha de la práctica</label>
                                    <input class="form-control" type="datetime-local" name="fecha_practica" id="fecha_practica" value="<?php echo $data1['fecha_practica']; ?>" disabled>
                                </div>
                            <?php } else{ ?>
                                <div class="form-group">
                                    <label for="fecha_practica">Fecha de la práctica</label>
                                    <input class="form-control" type="datetime-local" name="fecha_practica" id="fecha_practica" value="<?php echo $data1['fecha_practica']; ?>">
                                </div>
                             <?php } ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="capacidad">Alumnos máximos</label>
                                        <input class="form-control" type="number" name="capacidad" id="capacidad" value="<?php echo $data1['semestre']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                <?php if ($data1['registros'] != 0) { ?>
                                    <div class="form-group">
                                        <label for="Semestre">Semestre al que va dirigido</label>
                                        <input class="form-control" type="number" name="Semestre" id="Semestre" value="<?php echo $data1['capacidad']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <p><strong>Nota:</strong> La fecha y el semestre no se peude modificar debido a que uno o más alumnos ya se registraron, de ser necesario favor de cancelar la práctica e iniciar otra nueva.</p>
                                </div>
                                <?php } else{ ?>
                                    <div class="form-group">
                                        <label for="Semestre">Semestre al que va dirigido</label>
                                        <input class="form-control" type="number" name="Semestre" id="Semestre" value="<?php echo $data1['capacidad']; ?>" required>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Modificar</button>
                            <a href="<?php echo base_url(); ?>Practicas/Practicas" class="btn btn-danger"><i class="fas fa-window-close"></i> Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php } ?>

<?php pie() ?>