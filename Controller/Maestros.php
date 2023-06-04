<?php
class Maestros extends Controllers
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: ".base_url());
        }
        parent::__construct();
    }

    //Vista de Alumnos
    public function Listar()
    {
        $data1 = $this->model->selectAlumnos();
        $this->views->getView($this, "Listar", "", $data1);
        die();  
    }

    //Añade un nuevo Alumno
    public function insertar()
    {
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $correo = $_POST['correo'];
        $clave = $_POST['usuario']; //Por defecto se pone el no.cuenta
        $grado = $_POST['grado'];
        $grupo = $_POST['grupo'];
        $hash = hash("SHA256", $clave);
        $insert = $this->model->insertarAlumnos($nombre, $usuario, $hash, $correo, $grado, $grupo);
        if ($insert == 'existe') {
            $data1 = $this->model->editarAlumnoC($correo);
            if ($data1['estado'] == 2) {
                $asistencias = 0;
                $faltas = 0;
                $estado = 1;
                $id = $data1['id'];
                $actualizar = $this->model->actualizarAlumnos($nombre, $usuario, $asistencias, $faltas, $id, $correo, $grado, $grupo);
                $cambio =$this->model->cambiarContra($hash, $id);
                $eliminar = $this->model->estadoAlumnos($id, $estado);
                    if ($actualizar == 1) {
                        $alert = 'registrado';
                    } else {
                        $alert =  'error';
                    }
            } else {
                $alert = 'existe';
            }
        } else if ($insert > 0) {
            $alert = 'registrado';
        } else {
            $alert = 'error';
        }
        $data1 = $this->model->selectAlumnos(); 
        header("location: " . base_url() . "Alumnos/Listar?msg=$alert");
        die();   
    }

    //Seleciona los datos de un Alumno
    public function editar()
    {
        $id = $_GET['id'];
        $data1 = $this->model->editarAlumnos($id);
        $data2 = $this->model->configuracion();
        if ($data1 == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar","", $data1, $data2);
        }
        die();  
    }

    //Actualiza los datos de un Alumno
    public function actualizar()
    {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $asistencias = $_POST['asistencias'];
        $faltas = $_POST['faltas'];
        $correo = $_POST['correo'];
        $grado = $_POST['grado'];
        $grupo = $_POST['grupo'];
        $actualizar = $this->model->actualizarAlumnos($nombre, $usuario, $asistencias, $faltas, $id, $correo, $grado, $grupo);     
            if ($actualizar == 1) {
                $alert = 'modificado';
            } else {
                $alert =  'error';
            }
        header("location: " . base_url() . "Alumnos/Listar?msg=$alert");
        die();
    }

    //Inactiva los datos de un Alumno
    public function eliminar()
    {
        $id = $_GET['id'];
        $estado = 0;
        $eliminar = $this->model->estadoAlumnos($id, $estado);
        $alert = 'inactivo';
        $data1 = $this->model->selectAlumnos();
        header("location: " . base_url() . "Alumnos/Listar?msg=$alert");
        die();
    }

    //elimina un usuario (Solo se cambia de estado para no alterar pdf de reportes)
    public function eliminarper()
    {
        $id = $_GET['id'];
        $estado = 2;
        $eliminar = $this->model->estadoAlumnos($id, $estado);
        $alert =  'eliminado';
        $data1 = $this->model->selectAlumnos(); 
        header("location: " . base_url() . "Alumnos/eliminados?msg=$alert");
        die();
    }

    //Consulta los Alumno inactivos
    public function eliminados()
    {
        $data1 = $this->model->selectInactivos();
        $this->views->getView($this, "Eliminados", "", $data1);   
        die();     
    }

    //Reactiva los datos de un Usuario
    public function reingresar()
    {
        $id = $_GET['id'];
        $estado = 1;
        $eliminar = $this->model->estadoAlumnos($id, $estado);
        $data1 = $this->model->selectAlumnos(); 
        header('location: ' . base_url() . "Alumnos/eliminados?msg=$alert");
        die();
    }

}
?>