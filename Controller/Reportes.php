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
            //print_r($data4);
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
            //print_r($data4);
            $this->views->getView($this, "Materiales", "", $data1, $data2, $data3, $data4, $data5);
            die();
        }

        public function Practicas()
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
            //print_r($data4);
            $this->views->getView($this, "Practicas", "", $data1, $data2, $data3, $data4, $data5);
            die();
        }
}
?>
