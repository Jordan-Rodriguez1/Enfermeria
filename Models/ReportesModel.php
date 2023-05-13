<?php
class ReportesModel extends Mysql{
    public function __construct()
    {
        parent::__construct();
    }

    public function Configuracion()
    {
        $sql = "SELECT *  FROM configsemestre";
        $res = $this->select_all($sql);
        return $res;
    }

    public function AlumnosCompletos(string $grado, string $asistencias)
    {
        $this->grado = $grado;
        $this->asistencias = $asistencias;
        $sql = "SELECT * FROM alumnos WHERE grado = '{$this->grado}' AND asistencias >= '{$this->asistencias}'";
        $res = $this->select_all($sql);
        return $res;
    }

    public function AlumnosNoCompletos(string $grado, string $asistencias)
    {
        $this->grado = $grado;
        $this->asistencias = $asistencias;
        $sql = "SELECT * FROM alumnos WHERE grado = '{$this->grado}' AND asistencias < '{$this->asistencias}'";
        $res = $this->select_all($sql);
        return $res;
    }

    public function AlumnosFaltas(string $grado, string $faltas)
    {
        $this->grado = $grado;
        $this->faltas = $faltas;
        $sql = "SELECT * FROM alumnos WHERE grado = '{$this->grado}' AND faltas >= '{$this->faltas}'";
        $res = $this->select_all($sql);
        return $res;
    }

    public function Asistencias(int $grado)
    {
        $this->grado = $grado;
        $sql = "SELECT asistencias, COUNT(asistencias) AS total FROM alumnos WHERE grado = '{$this->grado}' GROUP BY asistencias";
        $res = $this->select_all($sql);
        return $res;
    }

    public function AsistenciasyFaltas()
    {
        $sql = "SELECT grado, SUM(asistencias) AS asistencias, SUM(faltas) AS faltas FROM alumnos GROUP BY grado";
        $res = $this->select_all($sql);
        return $res;
    }

    public function AlumnosGrados()
    {
        $sql = "SELECT grado, COUNT(*) AS total FROM alumnos GROUP BY grado";
        $res = $this->select_all($sql);
        return $res;
    }








    public function ventas()
    {
        $sql = "SELECT SUM(total) AS suma FROM ventas";
        $res = $this->selecT($sql);
        return $res;
    }
    public function ingresos()
    {
        $sql = "SELECT SUM(monto) AS suma FROM balance WHERE tipo = 'Ingreso'";
        $res = $this->selecT($sql);
        return $res;
    }

    public function nominas()
    {
        $sql = "SELECT SUM(total) AS suma FROM nominas";
        $res = $this->selecT($sql);
        return $res;
    }

    public function apartado()
    {
        $sql = "SELECT SUM(monto) AS suma FROM balance WHERE tipo = 'Ingreso' AND categoria = 'Apartado'";
        $res = $this->selecT($sql);
        return $res;
    }
    public function compras()
    {
        $sql = "SELECT SUM(total) AS suma FROM compras";
        $res = $this->selecT($sql);
        return $res;
    }

    public function gastos()
    {
        $sql = "SELECT SUM(monto) AS suma FROM balance WHERE tipo = 'Gasto'";
        $res = $this->selecT($sql);
        return $res;
    }

    public function ingresosMDF()
    {
        $sql = "SELECT SUM(monto) AS suma FROM balance WHERE tipo = 'Ingreso' AND categoria = 'MDF'";
        $res = $this->selecT($sql);
        return $res;
    }

    public function gastosMDF()
    {
        $sql = "SELECT SUM(monto) AS suma FROM balance WHERE tipo = 'Gasto' AND categoria = 'MDF'";
        $res = $this->selecT($sql);
        return $res;
    }

    public function ingresosHelio()
    {
        $sql = "SELECT SUM(monto) AS suma FROM balance WHERE tipo = 'Ingreso' AND categoria = 'Helio'";
        $res = $this->selecT($sql);
        return $res;
    }

    public function gastosHelio()
    {
        $sql = "SELECT SUM(monto) AS suma FROM balance WHERE tipo = 'Gasto' AND categoria = 'Helio'";
        $res = $this->selecT($sql);
        return $res;
    }

    public function selectStockM()
    {
        $sql = "SELECT nombre, cantidad FROM productos WHERE cantidad <= 10 ORDER BY cantidad ASC LIMIT 10";
        $res = $this->select_all($sql);
        return $res;
    }


    public function selectClientes()
    {
        $sql = "SELECT clientes.nombre, SUM(ventas.total) as total FROM ventas, clientes WHERE ventas.id_cliente = clientes.id group by id_cliente ORDER BY total DESC LIMIT 10";
        $res = $this->select_all($sql);
        return $res;
    }
   
    public function selectPersonajes()
    {
        $sql = "SELECT productos.personaje, SUM(detalle_venta.cantidad) as total FROM detalle_venta, productos WHERE detalle_venta.id_venta = productos.id group by productos.personaje ORDER BY total DESC LIMIT 10";
        $res = $this->select_all($sql);
        return $res;
    }

    public function selectCategorias()
    {
        $sql = "SELECT productos.categoria, SUM(detalle_venta.cantidad) as total FROM detalle_venta, productos WHERE detalle_venta.id_venta = productos.id group by productos.categoria ORDER BY total DESC LIMIT 10";
        $res = $this->select_all($sql);
        return $res;
    }

    public function totPedidos()
    {
        $sql = "SELECT COUNT(id) AS total FROM pedidos";
        $res = $this->selecT($sql);
        return $res;
    }

    public function totClien()
    {
        $sql = "SELECT COUNT(id) AS total FROM clientes";
        $res = $this->selecT($sql);
        return $res;
    }
    public function totVent()
    {
        $sql = "SELECT COUNT(id) AS total FROM ventas";
        $res = $this->selecT($sql);
        return $res;
    }

    public function valStock()
    {
        $sql = "SELECT SUM(cantidad * precio) AS total FROM productos";
        $res = $this->selecT($sql);
        return $res;
    }

    public function veMes()
    {
        $sql = "SELECT SUM(total) AS total, MONTH(fecha) AS mes,  YEAR(fecha) AS ano FROM ventas GROUP BY mes, ano ORDER BY ano, mes";
        $res = $this->select_all($sql);
        return $res;
    }

    public function coMes()
    {
        $sql = "SELECT SUM(total) AS total, MONTH(fecha) AS mes,  YEAR(fecha) AS ano FROM compras GROUP BY mes, ano ORDER BY ano, mes";
        $res = $this->select_all($sql);
        return $res;
    }

    public function inMes()
    {
        $sql = "SELECT SUM(monto) AS total, MONTH(fecha) AS mes,  YEAR(fecha) AS ano FROM balance WHERE tipo = 'Ingreso' GROUP BY mes, ano ORDER BY ano, mes";
        $res = $this->select_all($sql);
        return $res;
    }

    public function gaMes()
    {
        $sql = "SELECT SUM(monto) AS total, MONTH(fecha) AS mes,  YEAR(fecha) AS ano FROM balance WHERE tipo = 'Gasto' GROUP BY mes, ano ORDER BY ano, mes";
        $res = $this->select_all($sql);
        return $res;
    }

    public function totVentas()
    {
        $sql = "SELECT SUM(total) AS total FROM ventas";
        $res = $this->selecT($sql);
        return $res;
    }

    public function totCompras()
    {
        $sql = "SELECT SUM(total) AS total FROM compras";
        $res = $this->selecT($sql);
        return $res;
    }

    public function totIngresos()
    {
        $sql = "SELECT SUM(monto) AS total FROM balance WHERE tipo = 'Ingreso'";
        $res = $this->selecT($sql);
        return $res;
    }

    public function totGastos()
    {
        $sql = "SELECT SUM(monto) AS total FROM balance WHERE tipo = 'Gasto'";
        $res = $this->selecT($sql);
        return $res;
    }
}


