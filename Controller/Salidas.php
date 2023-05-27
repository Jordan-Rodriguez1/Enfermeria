<?php
class Salidas extends Controllers{
    protected $totalPagar, $tot = 0;
    public function __construct()
    {
    session_start();
    if (empty($_SESSION['activo'])) {
        header("location: " . base_url());
    }
        parent::__construct();
    }

    //Muestra la lista de responsables.
    public function Listar()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data2 = $this->model->selecPlantillaD($id);
            $data3 = $this->model->cuentaAsistencias($id);
        } else {
            $data2 = [
                "nombre" => "",
                "id_responsable" => "",
                "semestre" => "",
            ];
            $data3 = [
                "asistencia" => "",
            ];
            $this->model->VaciarDetalle($_SESSION['id']);
        }
        $id = $_SESSION['id'];
        $data1 = $this->model->responsables($id);
        $this->views->getView($this, "Listar", "", $data1, $data2, $data3);
        die();
    }

    //Muestra la lista de ventas realizadas
    public function lista()
    {
        $data1 = $this->model->selectVentas();
        $this->views->getView($this, "ListarVentas", "", $data1);
        die();
    }

    //Registra salida sin descontar stock
    public function registrar()
    {
        $descripcion = $_POST['descripcion'];
        $total = $_POST['total'];
        $id_responsable = $_POST['responsable'];
        $id_generador = $_SESSION['id'];
        if ($descripcion == '') {
            $this->model->registrarSalida('S/D', $total, $id_generador, $id_responsable);
        }else{
            $this->model->registrarSalida($descripcion, $total, $id_generador, $id_responsable);
        }
        $data = $this->model->buscaridC();
        $result = $data['MAX(id)'];
        $productos = $this->model->verificarProductos($_SESSION['id']);
        foreach ($productos as $data) {
            $insertar = $this->model->registrarDetalle($result, $data['nombre'] ,$data['id_producto'], $data['cantidad'], $data['precio'], $data['id_usuario']);
        }
        $this->model->VaciarDetalle($_SESSION['id']);
        die();
    }

    //Datos PDF
    public function ver()
    {
        $id = $_GET['id'];
        $data5 = $this->model->ListaVenta($id);
        $nombre_generador = $data5['id_generador'];
        $nombre_responsable = $data5['id_responsable'];
        $data1 = $this->model->DetalleVenta($id);
        $data2 = $this->model->selectConfiguracion();
        $data3 = $this->model->PdfGenerador($nombre_generador);
        $data4 = $this->model->PdfResponsable($nombre_responsable);
        $this->views->getView($this, "VerVentas", "", $data1, $data2, $data3, $data4, $data5);
        die();
    }

    //Sube la factura al servidor
    public function subirarchivo()
    {
        $name = pathinfo($_FILES["archivo"]["name"]);
        $nombre_archivo = $_FILES["archivo"]["name"];
        $nombre_nuevo = $_POST['id'].".".$name["extension"];
        $tipo_archivo = $_FILES["archivo"]["type"];
        $tamano_archivo = $_FILES["archivo"]["size"];
        $ruta_temporal = $_FILES["archivo"]["tmp_name"];
        $error_archivo = $_FILES["archivo"]["error"];
        $tmaximo = 20 * 1024 * 1024;
        if(($tamano_archivo < $tmaximo && $tamano_archivo != 0) && ($name["extension"] == "pdf")){
            if ($error_archivo == UPLOAD_ERR_OK) {
                $ruta_destino = 'Assets/archivos/salidas/'.$nombre_nuevo;
                if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
                $id = $_POST['id'];
                $this->model->img($nombre_nuevo, $id);
                   $alert =  'registrado';
                } else {
                   $alert =  'noformato';
                }
            } else {
            $alert =  'noformato';
            }
        } else {
            $alert =  'noformato';
        }            
        header('location: ' . base_url() . "Salidas/lista?msg=$alert");
        die();
    }
}
?>