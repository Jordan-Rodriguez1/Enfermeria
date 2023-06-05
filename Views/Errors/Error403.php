<?php links() ?>
<!-- Begin Page Content -->

<div class="page-content2">
   <section><br>
        <div class="card container-fluid2 text-center">
            <div class="card-header"><i class="fas fa-exclamation-circle"></i> ERROR</div>
            <div class="card-body">
                <img src="<?php echo base_url() ?>Assets/img/unicornio.png" style="height: 400px; ">
                <h5 class="card-title">Error 403: Sin Autorización.</h5>
            </div>
            <div class="card-footer text-muted">
                <?php if($_SESSION['rol'] > 1 ){  ?>  
                    <a href="<?php echo base_url() ?>Dashboard/Listar" class="btn btn-primary">Ir al inicio</a>
                <?php } else{ ?>
                    <a href="<?php echo base_url() ?>Dashboard/Lista" class="btn btn-primary">Ir al inicio</a>
                <?php } ?>
            </div>
        </div>
    </section>
</div>

<?php pie() ?>