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
            <h5 class="card-header"><i class="fas fa-shopping-cart"></i> <strong>Nueva Salida</strong></h5>
            <div class="card-body">
                <form action="" method="post" id="frmDetalle" class="row" autocomplete="off">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="buscar_codigo"><i class="fas fa-barcode"></i> Código de barras</label>
                            <input type="hidden" id="id" name="id">
                            <div class="input-group mb-3">
                                <input id="buscar_codigo" onkeyup="BuscarCodigo(event);" class="form-control" type="number" name="codigo" placeholder="Código de barras">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="button" onclick="BuscarCodigos();"> <i class="fas fa-search"></i></button>
                                </div>
                            </div>                        
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="nombre">Producto</label>
                            <input id="nombre" class="form-control" type="hidden" name="nombre"> <br/>
                            <strong id="nombreP"></strong>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="precio">Costo $</label>
                            <input id="precio" class="form-control" type="hidden" name="precio"> <br/>
                            <strong id="precioP"></strong>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="cantidad">Cantidad (+/-)</label>
                            <input id="stockD" type="hidden">
                            <div class="input-group mb-3">
                                <input id="cantidad" class="form-control" type="number" name="cantidad" onkeyup="IngresarCantidad(event);" placeholder="Cantidad">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="button" onclick="IngresarCantidades();"> <i class="fas fa-plus"></i></button>
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
                                        <th>Precio</th>
                                        <th>Total</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody id="ListaDetalle">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 mt-1">
                        <div class="form-group">
                            <strong style="color: #c2258e;">Descripción</strong>
                            <?php if ($data2['nombre'] == "") { ?>
                                <textarea class="form-control" name="descripcion" id="descripcion" rows="4"></textarea>
                            <?php } else {?>
                                <textarea class="form-control" name="descripcion" id="descripcion" rows="4"> Práctica <?php echo $data2['nombre'] ?> impartida para <?php echo $data2['semestre'] ?>º asistieron <?php echo $data3['asistencia'] ?> alumnos.</textarea>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <strong style="color: #c2258e;">Responsable</strong>
                            <select name="responsable" id="responsable" class="form-control">
                                <?php foreach ($data1 as $res) { ?>
                                    <?php if ($data2['id_responsable'] == $res['id']) { ?>
                                        <option value="<?php echo $res['id']; ?>" selected><?php echo $res['nombre']; ?></option>
                                    <?php } else {?>
                                        <option value="<?php echo $res['id']; ?>"><?php echo $res['nombre']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 ml-auto">
                        <div class="form-group mt-2">
                            <strong style="color: #c2258e;">Total a pagar $</strong>
                            <input type="hidden" id="total" value="0.00" name="total" class="form-control  mb-2">
                            <strong id="totalD"></strong> <br>
                            <button class="btn btn-danger" type="button" id="AnularDetalle"><i class="fas fa-window-close"></i> Anular Salida</button>
                            <button class="btn btn-success" type="button" id="procesarSalida"><i class="fas fa-money-check-alt"></i> Procesar Salida</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php } ?>

<?php pie() ?>