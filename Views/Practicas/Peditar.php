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
        <div class="row">
            <div class="col-lg-3 mt-auto">
            </div>
            <div class="col-lg-6 mt-auto">
                <div class="card container-fluid2">
                    <h5 class="card-header"><i class="fa fa-edit"></i> <strong>Editar Producto</strong></h5>
                    <form method="post" action="<?php echo base_url(); ?>Practicas/Tactualizar" autocomplete="off" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nombre">Nombre de la Práctica</label>
                                <input type="hidden" name="id" value="<?php echo $data1['id']; ?>">
                                <textarea class="form-control" name="nombre" id="nombre" rows="1" required><?php echo $data1['nombre']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción de la Práctica</label>
                                <textarea class="form-control" name="descripcion" id="descripcion" rows="2" required><?php echo $data1['descripcion']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="objetivos">Objetivos de la Práctica</label>
                                <textarea class="form-control" name="objetivos" id="objetivos" rows="2" required><?php echo $data1['objetivo']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="requisitos">Requisitos de la Práctica</label>
                                <textarea class="form-control" name="requisitos" id="requisitos" rows="2" required><?php echo $data1['requisitos']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="img">Selecciona Archivo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="archivo">
                                    <label class="custom-file-label" for="customFile"></label>
                                    <label><strong>Nota:</strong> Si no quieres cambiar el formato favor de dejar este campo vacío.</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Modificar</button>
                            <a href="<?php echo base_url(); ?>Practicas/Plantillas" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php } ?>

<?php pie() ?>