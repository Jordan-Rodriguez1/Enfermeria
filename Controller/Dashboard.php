<?php
class Dashboard extends Controllers{
    public function __construct()
    {
    session_start();
    if (empty($_SESSION['activo'])) {
        header("location: " . base_url());
    }
        parent::__construct();
    }

    public function Listar()
    {
        $this->views->getView($this, "Listar", "");
    }

    public function Ayuda()
    {
        $this->views->getView($this, "Ayuda", "");
    }

    public function Horarios()
    {
        $this->views->getView($this, "Horarios", "");
    }

    public function Alumnos()
    {
        $grado = $_SESSION['grado'];
        $data1 = $this->model->practicas($grado);
        $data2 = $this->model->config($grado);
        $this->views->getView($this, "Alumnos", "",  $data1, $data2);
    }

    public function Lista()
    {
        $id = $_SESSION['id'];
        $data1 = $this->model->Historial($id);
        $this->views->getView($this, "Lista", "",  $data1);
    }

    public function Detalles()
    {
        $id = $_GET['id'];
        $alumnos = $_SESSION['id'];
        $data1 = $this->model->detallePracticas($id);
        $id_plantilla = $data1['id_plantilla'];
        $data2 = $this->model->detallePlantilla($id_plantilla);
        $id_profesor = $data1['id_responsable'];
        $data3 = $this->model->detalleProfesor($id_profesor);
        $data4 = $this->model->AlumnoPractica($id, $alumnos);
        $capacidad = $data1['capacidad'];
        $cuenta = $this->model->CuentaAlumnos($id);
        $data5 = $capacidad - $cuenta['total'];
        $this->views->getView($this, "Detalles", "", $data1, $data2, $data3, $data4, $data5);
    }

    public function Registrar()
    {
        $id = $_GET['id'];
        $alumnos = $_SESSION['id'];
        $actualizar = $this->model->registrarPractica($id, $alumnos);
        $alert =  'registrado';
        header("location: " . base_url() . "Dashboard/Alumnos?msg=$alert");
        die();
    }
}
?>
