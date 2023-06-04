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

    //Vista de Profesores
    public function Listar()
    {
        $data1 = $this->model->selectProfesores();
        $data2 = $this->model->selectMaterias();
    $this->views->getView($this, "Listar", "", $data1,$data2);
        die();  
    }

    //Seleciona los datos de un Profesor
    public function editar()
    {
        $id = $_GET['id'];
        $data1 = $this->model->editarProfesores($id);
        $data2 = $this->model->selectMaterias();       
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
        $materia = $_POST['materia'];
        $semestre = $_POST['semestre']; 
        $actualizar = $this->model->actualizarProfesores($nombre, $usuario, $materia, $semestre, $id);     
            if ($actualizar == 1) {
                $alert = 'modificado';
            } else {
                $alert =  'error';
            }
        header("location: " . base_url() . "Maestros/Listar?msg=$alert");
        die();
    }

    //Inactiva los datos de un Alumno
    public function eliminar()
    {
        $id = $_GET['id'];
        $estado = 0;
        $eliminar = $this->model->estadoProfesores($id, $estado);
        $alert = 'inactivo';
        $data1 = $this->model->selectProfesores();
        header("location: " . base_url() . "Maestros/Listar?msg=$alert");
        die();
    }

    //elimina un usuario (Solo se cambia de estado para no alterar pdf de reportes)
    public function eliminarper()
    {
        $id = $_GET['id'];
        $estado = 2;
        $eliminar = $this->model->estadoProfesores($id, $estado);
        $alert =  'eliminado';
        $data1 = $this->model->selectProfesores(); 
        header("location: " . base_url() . "Maestros/eliminados?msg=$alert");
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
        $eliminar = $this->model->estadoProfesores($id, $estado);
        $data1 = $this->model->selectProfesores(); 
        header('location: ' . base_url() . "Maestros/eliminados?msg=$alert");
        die();
    }



    //Profesores
    public function insertar_profesor()
    {
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $materia = $_POST['materia'];        
        $semestre = $_POST['semestre'];
        $estado=1;        
        $insert = $this->model->insertarProfesores($nombre, $usuario, $materia, $semestre,$estado);
        if ($insert == 'existe') {
            $data1 = $this->model->editarAlumnoC($materia);
            if ($data1['estado'] == 2) {
                $asistencias = 0;
                $faltas = 0;
                $estado = 1;
                $id = $data1['id'];
                $actualizar = $this->model->actualizarAlumnos($nombre, $usuario, $materia, $semestre,$estado);
                //$cambio =$this->model->cambiarContra($hash, $id);
                //$eliminar = $this->model->estadoAlumnos($id, $estado);
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
        $data1 = $this->model->selectProfesores(); 
        header("location: " . base_url() . "Maestros/Listar?msg=$alert");
        die();   
    }
}
?>