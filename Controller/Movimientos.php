<?php
class Movimientos extends Controllers{
    public function __construct()
    {
    session_start();
    if (empty($_SESSION['activo'])) {
        header("location: " . base_url());
    }
        parent::__construct();
    }

    //Vista de Movimientos pendientes por aprobar/rechazar
    public function Listar()
    {
        $data1 = $this->model->selectMovimientos();
        $this->views->getView($this, "Listar", "", $data1);
    }

    //Descuenta el stock de la salida y la aprueba
    public function aprobar()
    {
        $id = $_GET['id'];
        $estado = 2;
        $productos = $this->model->seleccionarProductos($id);
        foreach ($productos as $data) {
            $stock = $this->model->stockActual($data['id_producto']);
            $stockActual = $stock['cantidad'];
            $this->model->registrarStock($stockActual - $data['cantidad'], $data['id_producto']);
        }
        $actualizar = $this->model->ActualizarEstado($id, $estado);
        if ($actualizar == 1) {
            $alert = 'aprobado';
        }else {
            $alert = 'error';
        }
        $data1 = $this->model->selectMovimientos($id);
        header("location: " . base_url() . "Movimientos/Listar?msg=$alert");
        die();
    }

    //Rechaza la salida
    public function rechazar()
    {
        $id = $_GET['id'];
        $estado = 0;
        $actualizar = $this->model->ActualizarEstado($id, $estado);
        if ($actualizar == 1) {
            $alert = 'denegado';
        }else {
            $alert = 'error';
        }
        $data1 = $this->model->selectMovimientos($id);
        header("location: " . base_url() . "Movimientos/Listar?msg=$alert");
        die();
    }


    //Datos PDF
    public function ver()
    {
        $id = $_GET['id'];
        $nombre_generador = $_GET['generador'];
        $nombre_responsable = $_GET['responsable'];
        $data1 = $this->model->DetalleVenta($id);
        $data2 = $this->model->selectConfiguracion();
        $data3 = $this->model->PdfGenerador($nombre_generador);
        $data4 = $this->model->PdfResponsable($nombre_responsable);
        $data5 = $this->model->ListaVenta($id);
        $this->views->getView($this, "VerMovimiento", "", $data1, $data2, $data3, $data4, $data5);
    }
}
?>