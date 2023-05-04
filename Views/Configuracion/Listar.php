<?php encabezado() ?>

<?php if($_SESSION['rol'] <= 4){ ?> 
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
            <h5 class="card-header"><i class="fas fa-file-pdf"></i> <strong>Enzabezado PDF</strong></h5>
            <div class="card-body">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <form action="<?php echo base_url(); ?>/Configuracion/actualizar" method="post">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="facultad">Facultad</label>
                                            <input id="id" type="hidden" name="id" value="<?php echo $data1['id']; ?>">
                                            <input id="facultad" class="form-control" type="text" name="facultad" value="<?php echo $data1['facultad']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="calle">Calle y Nº</label>
                                            <input id="calle" class="form-control" type="text" name="calle" value="<?php echo $data1['calle']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="colonia">Colonia</label>
                                            <input id="colonia" class="form-control" type="text" name="colonia" value="<?php echo $data1['colonia']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="cp">Código Postal</label>
                                            <input id="cp" class="form-control" type="number" name="cp" value="<?php echo $data1['cp']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="ciudad">Ciudad</label>
                                            <input id="ciudad" class="form-control" type="text" name="ciudad" value="<?php echo $data1['ciudad']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8 mb-2">
                                        <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Actualizar</button>
                                    </div>
                                    <div class="col-lg-4">
                                        <?php if (isset($_GET['msg'])) {
                                            $alert = $_GET['msg'];
                                            if ($alert == "modificado") { ?>
                                                <div class="alert alert-success" role="alert">
                                                <strong>Datos modificados.</strong>
                                                </div>
                                            <?php } elseif ($alert == 'error'){ ?>
                                                <div class="alert alert-danger" role="alert">
                                                <strong>Error al actualizar.</strong>
                                                </div>
                                            <?php }
                                         } ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card container-fluid2">
            <h5 class="card-header"><i class="fas fa-check"></i> <strong>Asistencias Y Faltas</strong></h5>
            <div class="card-body">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <form action="<?php echo base_url(); ?>/Configuracion/actualizarA" method="post">
                                <div class="row">
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label for="semestres">Semestres</label>
                                            <input id="id" type="hidden" name="id" value="<?php echo $data1['id']; ?>">
                                            <input id="semestres" class="form-control" type="number" name="semestres" value="<?php echo $data1['semestres']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <br>
                                        <button class="btn btn-success" style="margin-top: 8px;" type="submit"><i class="fas fa-save"></i> Actualizar</button>
                                    </div>
                                    <div class="col-lg-4">
                                        <?php if (isset($_GET['msg'])) {
                                            $alert = $_GET['msg'];
                                            if ($alert == "registrado") { ?>
                                                <div class="alert alert-success" role="alert">
                                                <strong>Datos modificados.</strong>
                                                </div>
                                            <?php } elseif ($alert == 'error2') { ?>
                                                <div class="alert alert-danger" role="alert">
                                                <strong>Error al actualizar.</strong>
                                                </div>
                                            <?php }
                                         } ?>
                                    </div>
                                </div>
                            </form>

                            <?php foreach ($data2 as $da) { ?>
                                <form action="<?php echo base_url(); ?>/Configuracion/ActSemestre" method="post">
                                    <div class="row">
                                        <div class="col-lg-3 mb-2">
                                            <div class="form-group">
                                                <label for="semestre">Semestre</label>
                                                <input id="id" type="hidden" name="id" value="<?php echo $da['id']; ?>">
                                                <input id="semestre" class="form-control" type="number" name="semestre" value="<?php echo $da['id']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-2">
                                            <div class="form-group">
                                                <label for="aminimas">Asistencias Mínimas</label>
                                                <input id="aminimas" class="form-control" type="number" name="aminimas" value="<?php echo $da['aminimas']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-2">
                                            <div class="form-group">
                                                <label for="fmaximas">Faltas Máximas</label>
                                                <input id="fmaximas" class="form-control" type="number" name="fmaximas" value="<?php echo $da['fmaximas']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-2">
                                            <br>
                                            <button class="btn btn-success" style="margin-top: 8px;" type="submit"><i class="fas fa-save"></i> Actualizar</button>
                                        </div>
                                    </div>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php } ?>

<?php pie() ?>