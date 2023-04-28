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
        public function Caja()
        {
            $ven = $this->model->ventas(); //Valor productos vendidos
            $ing = $this->model->ingresos(); //Valor otros ingresos
            $com = $this->model->compras(); //Valor productos comprados
            $gas = $this->model->gastos(); //Valor otros gatos
            $nom = $this->model->nominas(); //Valor nominas
            $cliente = $ven['suma']+$ing['suma']-$com['suma']-$gas['suma']-$nom['suma']; //Suma y resta anterior

            $vhe = $this->model->ingresosHelio(); //Valor inresos Helio
            $che = $this->model->gastosHelio(); //Valor gastos Helio
            $config = $vhe['suma']-$che['suma']; //Suma y resta anterior

            $vmd = $this->model->ingresosMDF(); //Valor inresos MDF
            $cnd = $this->model->gastosMDF(); //Valor GASTOS MDF
            $alert = $vmd['suma']-$cnd['suma']; //Suma y resta anterior

            $apa = $this->model->apartado(); //Valor apartados
            $data = $apa['suma']; //Suma y resta anterior
            $this->views->getView($this, "Caja", $data, $alert, $config, $cliente);
        }

        public function Graficas()
        {
            $alert = $this->model->totIngresos();
            $data = $this->model->totGastos();
            $config = $this->model->totCompras();
            $cliente = $this->model->totVentas();
            $this->views->getView($this, "Graficas", $data, $alert, $config, $cliente);
        }

        public function Otros()
        {

            $data = $this->model->totPedidos();
            $config = $this->model->totVent();
            $alert = $this->model->totClien();
            $cliente = $this->model->valStock();
            $this->views->getView($this, "Otros", $data, $alert, $config, $cliente);
        }

        public function reportes()
        {
            $data = $this->model->veMes();
            echo json_encode($data);
        }

        public function reportes2()
        {
            $data = $this->model->coMes();
            echo json_encode($data);
        }

        public function reportes3()
        {
            $ayuda = $this->model->veMes();
            $alert = $this->model->coMes();
            $config = $this->model->inMes();
            $cliente = $this->model->gaMes();
            $i = 0;
            foreach ($ayuda as $ay) {
                foreach ($alert as $al) {
                    foreach ($config as $co) {
                        foreach ($cliente as $cl) {
                    if($ay['mes'] == $al['mes'] && $ay['ano'] == $al['ano'] && $ay['mes'] == $co['mes'] && $ay['ano'] == $co['ano'] && $ay['mes'] == $cl['mes'] && $ay['ano'] == $cl['ano']) {
                    $data[$i] = array('total' => $ay['total'] + $co['total'] - $cl['total'] - $al['total'], 'mes' => $ay['mes'], 'ano' => $ay['ano']);
                     } elseif ($ay['mes'] == $al['mes'] && $ay['ano'] == $al['ano'] && $ay['mes'] == $co['mes'] && $ay['ano'] == $co['ano']) {
                        $data[$i] = array('total' => $ay['total'] + $co['total'] - $al['total'], 'mes' => $ay['mes'], 'ano' => $ay['ano']);
                     } elseif ($ay['mes'] == $co['mes'] && $ay['ano'] == $co['ano'] && $ay['mes'] == $cl['mes'] && $ay['ano'] == $cl['ano']) {
                        $data[$i] = array('total' => $ay['total'] + $co['total'] - $cl['total'], 'mes' => $ay['mes'], 'ano' => $ay['ano']);
                     } elseif ($ay['mes'] == $al['mes'] && $ay['ano'] == $al['ano'] && $ay['mes'] == $cl['mes'] && $ay['ano'] == $cl['ano']) {
                        $data[$i] = array('total' => $ay['total'] - $cl['total'] - $al['total'], 'mes' => $ay['mes'], 'ano' => $ay['ano']);
                     } elseif ($ay['mes'] == $cl['mes'] && $ay['ano'] == $cl['ano']) {
                        $data[$i] = array('total' => $ay['total'] - $cl['total'], 'mes' => $ay['mes'], 'ano' => $ay['ano']);
                     } elseif ($ay['mes'] == $al['mes'] && $ay['ano'] == $al['ano']) {
                        $data[$i] = array('total' => $ay['total'] - $al['total'], 'mes' => $ay['mes'], 'ano' => $ay['ano']);
                     } elseif ($ay['mes'] == $co['mes'] && $ay['ano'] == $co['ano']) {
                        $data[$i] = array('total' => $ay['total'] + $co['total'], 'mes' => $ay['mes'], 'ano' => $ay['ano']);
                     }
                    else{
                    $data[$i] = array('total' => $ay['total'], 'mes' => $ay['mes'], 'ano' => $ay['ano']);
                     }
                $i++;
                        }
                    }
                }
            }
            echo json_encode($data);
        }

        public function reportes4()
        {
            $data = $this->model->inMes();
            echo json_encode($data);
        }

        public function reportes5()
        {
            $data = $this->model->gaMes();
            echo json_encode($data);
        }
        public function reportesTorta()
        {
            $data = $this->model->selectProductos();
            echo json_encode($data);
        }

        public function reportesTorta2()
        {
            $data = $this->model->selectClientes();
            echo json_encode($data);
        }

        public function reportesTorta3()
        {
            $data = $this->model->selectPersonajes();
            echo json_encode($data);
        }

        public function reportesTorta4()
        {
            $data = $this->model->selectCategorias();
            echo json_encode($data);
        }
}
