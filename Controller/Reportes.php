<?php
    class Reportes extends Controllers{
        protected $totalPagar, $tot = 0;
        public function __construct()
        {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url());
        }
            parent::__construct();

        }
        public function Alumnos()
        {
            $data1 = [];
            $data2 = [];
            $data3 = [];
            $config = $this->model->Configuracion();
            foreach ($config as $cf ) {
                $completos = $this->model->AlumnosCompletos($cf['id'], $cf['aminimas']);
                $nocompletos = $this->model->AlumnosNoCompletos($cf['id'], $cf['aminimas']);
                $faltas = $this->model->AlumnosFaltas($cf['id'], $cf['fmaximas']);
                $data1 = array_merge($data1, $completos);
                $data2 = array_merge($data2, $nocompletos);
                $data3 = array_merge($data3, $faltas);
            }
            $data4 = $this->model->AlumnosGrados();
            $data5 = 0;
            $this->views->getView($this, "Alumnos", "", $data1, $data2, $data3, $data4, $data5);
            die();
        }

        public function PastelSemestre1()
        {
            $grado = 1;
            $data = $this->model->Asistencias($grado);
            echo json_encode($data);
            die();
        }

        public function PastelSemestre2()
        {
            $grado = 2;
            $data = $this->model->Asistencias($grado);
            echo json_encode($data);
            die();
        }

        public function PastelSemestre3()
        {
            $grado = 3;
            $data = $this->model->Asistencias($grado);
            echo json_encode($data);
            die();
        }

        public function PastelSemestre4()
        {
            $grado = 4;
            $data = $this->model->Asistencias($grado);
            echo json_encode($data);
            die();
        }

        public function PastelSemestre5()
        {
            $grado = 5;
            $data = $this->model->Asistencias($grado);
            echo json_encode($data);
            die();
        }

        public function PastelSemestre6()
        {
            $grado = 6;
            $data = $this->model->Asistencias($grado);
            echo json_encode($data);
            die();
        }

        public function PastelSemestre7()
        {
            $grado = 7;
            $data = $this->model->Asistencias($grado);
            echo json_encode($data);
            die();
        }

        public function AsistenciasFaltas()
        {
            $data = $this->model->AsistenciasyFaltas();
            echo json_encode($data);
            die();
        }

        public function Materiales()
        {
            $data1 = $this->model->NoStock();
            $data2 = $this->model->PocoStock();
            $data3 = $this->model->CuentaStock();
            $data4 = $this->model->PromedioStock();
            $this->views->getView($this, "Materiales", "", $data1, $data2, $data3, $data4);
            die();
        }

        public function EntradasSalidasDinero()
        {
            $data = $this->model->EntradasVSSalidasDinero();
            echo json_encode($data);
            die();
        }

        public function EntradasSalidasPiezas()
        {
            $data = $this->model->EntradasVSSalidasPiezas();
            echo json_encode($data);
            die();
        }

        public function PastelMateriales1()
        {
            $data = $this->model->MasSalidas();
            echo json_encode($data);
            die();
        }

        public function PastelMateriales2()
        {
            $data = $this->model->MasEntradas();
            echo json_encode($data);
            die();
        }

        public function PastelMateriales3()
        {
            $data = $this->model->VigenteCaducado();
            echo json_encode($data);
            die();
        }

        public function PastelMateriales4()
        {
            $data = $this->model->Proveedor();
            echo json_encode($data);
            die();
        }

        public function PastelMateriales5()
        {
            $data = $this->model->Categoria();
            echo json_encode($data);
            die();
        }

        public function PastelMateriales6()
        {
            $data = $this->model->MasPlantillas();
            echo json_encode($data);
            die();
        }

        public function Practicas()
        {
            $dinero = $this->model->TotalPlantilla();
            $unidad = $this->model->TotalCotizaciones();
            $data1 = $dinero['total']/$unidad['total'];
            $data2 = $this->model->PromedioSalida();
            $asistencias = $this->model->CuentaAsistencias();
            $faltas = $this->model->CuentaFaltas();
            $registros = $this->model->CuentaRegistros();
            $data3 = $asistencias['total']/$registros['total'];
            $data4 = $faltas['total']/$registros['total'];
            $this->views->getView($this, "Practicas", "", $data1, $data2, $data3, $data4);
            die();
        }

        public function PracticasCaras()
        {
            $data = $this->model->TopCaras();
            echo json_encode($data);
            die();
        }

        public function PastelPracticas1()
        {
            $data = $this->model->MasUsadasTexto();
            echo json_encode($data);
            die();
        }

        public function PastelPracticas2()
        {
            $data = $this->model->MasUsadasMaterial();
            echo json_encode($data);
            die();
        }

        public function PastelPracticas3()
        {
            $data = $this->model->MasAsistencias();
            echo json_encode($data);
            die();
        }

        public function PastelPracticas4()
        {
            $data = $this->model->MasFaltas();
            echo json_encode($data);
            die();
        }

        public function PastelPracticas5()
        {
            $data = $this->model->CuentaProfesor();
            echo json_encode($data);
            die();
        }

        public function PastelPracticas6()
        {
            $data = $this->model->CuentaSemestre();
            echo json_encode($data);
            die();
        }
}
?>
