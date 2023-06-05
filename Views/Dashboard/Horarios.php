<?php principal() ?>

    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <div class="card mt-3">
                    <a href="<?php echo base_url(); ?>Materias/Listar" class="link">
                        <div class="card-body">
                            <h5 class="card-title text-center">Materias</h5>
                            <img src="<?php echo base_url(); ?>Assets/img/horarios/book-stack.png" class="opcion" alt="">
                        </div>
                    </a>
                    
                </div>
            </div>
            <div class="col">
                <div class="card mt-3">
                    <a class="link" href="<?php echo base_url(); ?>Alumnos/ListarH">
                        <div class="card-body">
                            <h5 class="card-title text-center">Alumnos</h5>
                            <img src="<?php echo base_url(); ?>Assets/img/horarios/students.png" class="opcion" alt="">
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card mt-3">
                    <a href="<?php echo base_url(); ?>Usuarios/ListarH" class="link">
                        <div class="card-body">
                            <h5 class="card-title text-center">Usuarios</h5>
                            <img src="<?php echo base_url(); ?>Assets/img/horarios/users.png" class="opcion" alt="">
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card mt-3">
                    <a href="<?php echo base_url(); ?>Maestros/Listar" class="link">
                        <div class="card-body">
                            <h5 class="card-title text-center">Profesores</h5>
                            <img src="<?php echo base_url(); ?>Assets/img/horarios/profesor.png" class="opcion" alt="">
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card mt-3">
                    <a href="<?php echo base_url(); ?> Horarios/Configuracion" class="link">
                        <div class="card-body">
                            <h5 class="card-title text-center">Clases</h5>
                            <img src="<?php echo base_url(); ?>Assets/img/horarios/calendario.png" class="opcion" alt="">
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card mt-3">
                    <a href="<?php echo base_url(); ?>Dashboard/Listar" class="link">
                        <div class="card-body">
                            <h5 class="card-title text-center">Laboratorio</h5>
                            <img src="<?php echo base_url(); ?>Assets/img/icon.png" class="opcion" alt="">
                        </div>
                    </a>
                </div>
            </div>
        </div>
        
    </div>


<?php fin() ?>