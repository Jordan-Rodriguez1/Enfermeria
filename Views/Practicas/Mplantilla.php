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
<?php }  else { ?>

<!-- Begin Page Content -->
<div class="page-content">
    <section>
        <div class="card container-fluid2">
            <?php if ($data1['id'] == 0){ ?>
                <h5 class="card-header"><i class="fas fa-shopping-cart"></i> <strong>Nueva Plantilla</strong></h5>
            <?php }  else { ?>
                <h5 class="card-header"><i class="fas fa-edit"></i> <strong>Editar Plantilla</strong></h5>
            <?php } ?>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 mb-2">
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>Practicas/Plantillas"><i class="fas fa-arrow-alt-circle-left"></i> Regresar</a>
                    </div>
                    <div class="col-lg-6">
                        <div class="alert alert-warning" role="alert">
                            <strong>Nota:</strong> Recuerda que es el material estimado por alumno, los materiales pueden usar fracciones.
                        </div>
                    </div>
                </div>
                <br>
                <form action="" method="post" id="frmDetalle" class="row" autocomplete="off">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="buscar_codigo"><i class="fas fa-barcode"></i> Código de barras</label>
                            <input type="hidden" id="id" name="id">
                            <div class="input-group mb-3">
                                <input id="buscar_codigo" onkeyup="BuscarCodigoC(event);" class="form-control" type="number" name="codigo" placeholder="Código de barras">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="button" onclick="BuscarCodigosC();"> <i class="fas fa-search"></i></button>
                                </div>
                            </div>                        
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nombre">Producto</label>
                            <input id="nombre" class="form-control" type="hidden" name="nombre"> <br/>
                            <strong id="nombreP"></strong>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="cantidad">Cantidad (+/-)</label>
                            <input id="stockD" type="hidden">
                            <div class="input-group mb-3">
                                <input id="cantidad" class="form-control" type="number" name="cantidad" onkeyup="IngresarCantidadC(event);" placeholder="Cantidad">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="button" onclick="IngresarCantidadesC();"> <i class="fas fa-plus"></i></button>
                                </div>
                            </div>   
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="alert alert-danger d-none" role="alert" id="error">                      
                            <span><i class="fas fa-exclamation-triangle"></i> Producto no encontrado.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-light mt-4" id="tablaDetalles">
                                <thead class="thead-personality">
                                    <tr>
                                        <th>Id</th>
                                        <th>Código</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody id="ListaDetalleC">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 mt-1">
                        <div class="form-group">
                            <strong style="color: #c2258e;">Descripción</strong>
                            <input type="hidden" name="id_plantilla" id="id_plantilla" value="<?php echo $data1['id'];?>">
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="4" required><?php echo $data1['descripcion'];?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-4 ml-auto">
                        <div class="form-group mt-2">
                            <strong style="color: #c2258e;">Total productos</strong>
                            <input type="hidden" id="total" value="0.00" name="total" class="form-control  mb-2">
                            <strong id="totalD"></strong> <br>
                            <button class="btn btn-danger" type="button" id="AnularDetalle"><i class="fas fa-window-close"></i> Anular Plantilla</button>
                            <button class="btn btn-success" type="button" id="procesarCotizacion"><i class="fas fa-money-check-alt"></i> Procesar Plantilla</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php } ?>

<?php pie() ?>