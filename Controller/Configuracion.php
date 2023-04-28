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
        $this->views->getView($this, "Listar", "", $data1);
    }

    //ACTUALIZA LOS DATOSA EXISTENTES
    public function actualizar()
    {
        $id = $_POST['id'];
        $facultad = $_POST['facultad'];
        $calle = $_POST['calle'];
        $colonia = $_POST['colonia'];
        $cp = $_POST['cp'];
        $ciudad = $_POST['ciudad'];
        $actualizar = $this->model->actualizarConfiguracion($facultad, $calle, $colonia, $cp, $ciudad ,$id);
        if ($actualizar == 1) {
            $alert = array('mensaje' => 'modificado');
        }else {
            $alert = array('mensaje' => 'error');
        }
        $data1 = $this->model->selectConfiguracion();
        $this->views->getView($this, "Listar", $alert, $data1);
        die();
    }

    //ACTUALIZA LOS DATOSA EXISTENTES FALTAS
    public function actualizarA()
    {
        $id = $_POST['id'];
        $aminimas = $_POST['aminimas'];
        $fmaximas = $_POST['fmaximas'];
        $actualizar = $this->model->actualizarConfiguracionA($aminimas, $fmaximas, $id);
        if ($actualizar == 1) {
            $alert = array('mensaje' => 'registrado');
        }else {
            $alert = array('mensaje' => 'error');
        }
        $data1 = $this->model->selectConfiguracion();
        $this->views->getView($this, "Listar", $alert, $data1);
        die();
    }
}
?>