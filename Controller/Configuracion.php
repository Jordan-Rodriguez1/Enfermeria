<?php
class Configuracion extends Controllers{
    public function __construct()
    {
    session_start();
    if (empty($_SESSION['activo'])) {
        header("location: " . base_url());
    }
        parent::__construct();
    }

    //SELECCIONA LOS DATOSA EXISTENTES
    public function Listar()
    {
        $data1 = $this->model->selectConfiguracion();   
        $data2 = $this->model->selectConfiguracionA();        
        $this->views->getView($this, "Listar", "", $data1, $data2);
    }

    //ACTUALIZA LOS DATOSA EXISTENTES
    public function actualizar()
    {
        $id = limpiarInput($_POST['id']);
        $facultad = limpiarInput($_POST['facultad']);
        $calle = limpiarInput($_POST['calle']);
        $colonia = limpiarInput($_POST['colonia']);
        $cp = limpiarInput($_POST['cp']);
        $ciudad = limpiarInput($_POST['ciudad']);
        $actualizar = $this->model->actualizarConfiguracion($facultad, $calle, $colonia, $cp, $ciudad ,$id);
        if ($actualizar == 1) {
            $alert = 'modificado';
        }else {
            $alert = 'error';
        }
        $data1 = $this->model->selectConfiguracion();
        $data2 = $this->model->selectConfiguracionA();  
        header("location: " . base_url() . "Configuracion/Listar?msg=$alert");
        die();
    }

    //ACTUALIZA LOS DATOSA EXISTENTES FALTAS
    public function actualizarA()
    {
        $id = limpiarInput($_POST['id']);
        $semestres = limpiarInput($_POST['semestres']);
        $actualizar = $this->model->actualizarConfiguracionA($semestres, $id);
        if ($actualizar == 1) {
            $alert = array('mensaje' => 'registrado');
            $eliminar = $this->model->elsemestres();
            for ($i = 1; $i <= $semestres; $i++) {
                $sem = $this->model->addsemestre($i);
            }
        }else {
            $alert = 'error';
        }
        $data1 = $this->model->selectConfiguracion();
        $data2 = $this->model->selectConfiguracionA();  
        header("location: " . base_url() . "Configuracion/Listar?msg=$alert");
        die();
    }

    //ACTUALIZA LOS semestres EXISTENTES FALTAS
    public function ActSemestre()
    {
        $id = limpiarInput($_POST['id']);
        $aminimas = limpiarInput($_POST['aminimas']);
        $fmaximas = limpiarInput($_POST['fmaximas']);
        $actualizar = $this->model->actsemestre($aminimas, $fmaximas, $id);
        if ($actualizar == 1) {
            $alert = 'registrado';
        }else {
            $alert = 'error2';
        }
        $data1 = $this->model->selectConfiguracion();
        $data2 = $this->model->selectConfiguracionA();  
        header("location: " . base_url() . "Configuracion/Listar?msg=$alert");
        die();
    }
}
?>