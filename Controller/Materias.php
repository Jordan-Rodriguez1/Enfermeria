<?php
class Materias extends Controllers
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: ".base_url());
        }
        parent::__construct();
    }

    //Vista de Materias
    public function Listar()
    {
        $data1 = $this->model->selectMateria();
        $this->views->getView($this, "Listar", "", $data1);
        die();  
    }

    //Añade una nueva Materia
    public function insertar()
    {
        $nombre = $_POST['nombre'];
        $insert = $this->model->insertarMateria($nombre);
        if ($insert == 'existe') {
            $data1 = $this->model->editarMateriaC($nombre);
            if ($data1['estado'] == 2) {
                $asistencias = 0;
                $faltas = 0;
                $estado = 1;
                $id = $data1['id'];
                $actualizar = $this->model->actualizarMaterias($nombre);
                
                $eliminar = $this->model->estadoMaterias($id, $estado);
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
        $data1 = $this->model->selectMateria(); 
        header("location: " . base_url() . "Materias/Listar?msg=$alert");
        die();   
    }

    //Seleciona los datos de una Materia
    public function editar()
    {
        $id = $_GET['id'];
        $data1 = $this->model->editarMaterias($id);
        
        if ($data1 == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar","", $data1);
        }
        die();  
    }

    //Actualiza los datos de una Materia
    public function actualizar()
    {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $actualizar = $this->model->actualizarMaterias($nombre, $id);     
            if ($actualizar == 1) {
                $alert = 'modificado';
            } else {
                $alert =  'error';
            }
        header("location: " . base_url() . "Materias/Listar?msg=$alert");
        die();
    }

    //Inactiva los datos de una Materia
    public function eliminar()
    {
        $id = $_GET['id'];
        $estado = 0;
        $eliminar = $this->model->estadoMaterias($id, $estado);
        $alert = 'inactivo';
        $data1 = $this->model->selectMateria();
        header("location: " . base_url() . "Materias/Listar?msg=$alert");
        die();
    }

    //elimina una Materia (Solo se cambia de estado para no alterar pdf de reportes)
    public function eliminarper()
    {
        $id = $_GET['id'];
        $estado = 2;
        $eliminar = $this->model->estadoMaterias($id, $estado);
        $alert =  'eliminado';
        $data1 = $this->model->selectMateria(); 
        header("location: " . base_url() . "Materias/eliminados?msg=$alert");
        die();
    }

    //Consulta los Materia inactivas
    public function eliminados()
    {
        $data1 = $this->model->selectInactivos();
        $this->views->getView($this, "Eliminados", "", $data1);   
        die();     
    }

    //Reactiva los datos de una Materia
    public function reingresar()
    {
        $id = $_GET['id'];
        $estado = 1;
        $eliminar = $this->model->estadoMaterias($id, $estado);
        $data1 = $this->model->selectMateria(); 
        header('location: ' . base_url() . "Materias/eliminados?msg=$alert");
        die();
    }

}
?>