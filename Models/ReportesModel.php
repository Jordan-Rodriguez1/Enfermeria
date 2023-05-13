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

    public function TopCaras()
    {
        $sql = "SELECT cotizaciones.descripcion, SUM(detalle_coti.cantidad * productos.precio) AS total FROM detalle_coti, productos, cotizaciones WHERE detalle_coti.id_producto = productos.id AND detalle_coti.id_cotizacion = cotizaciones.id AND cotizaciones.estado = 1 GROUP BY detalle_coti.id_cotizacion ORDER BY total DESC LIMIT 10";
        $res = $this->select_all($sql);
        return $res;
    }

    public function MasUsadasTexto()
    {
        $sql = "SELECT plantillas.nombre, COUNT(practicas.id_plantilla) AS total FROM practicas, plantillas WHERE practicas.id_plantilla = plantillas.id GROUP BY plantillas.id ASC LIMIT 10";
        $res = $this->select_all($sql);
        return $res;
    }

    public function MasUsadasMaterial()
    {
        $sql = "SELECT cotizaciones.descripcion AS nombre, COUNT(practicas.id_plantillam) AS total FROM practicas, cotizaciones WHERE practicas.id_plantillam = cotizaciones.id GROUP BY cotizaciones.id ASC LIMIT 10";
        $res = $this->select_all($sql);
        return $res;
    }

    public function MasAsistencias()
    {
        $sql = "SELECT practicas.id, COUNT(u1.asistencia) AS asistencia, u2.nombre as nombre FROM practicas 
                JOIN asistencias u1 ON practicas.id = u1.id_practica
                JOIN plantillas u2 ON practicas.id_plantilla = u2.id
                WHERE asistencia = 2
                GROUP BY u2.id
				ORDER BY asistencia DESC LIMIT 10";
        $res = $this->select_all($sql);
        return $res;
    }

    public function MasFaltas()
    {
        $sql = "SELECT practicas.id, COUNT(u1.asistencia) AS faltas, u2.nombre as nombre FROM practicas 
                JOIN asistencias u1 ON practicas.id = u1.id_practica
                JOIN plantillas u2 ON practicas.id_plantilla = u2.id
                WHERE asistencia = 0
                GROUP BY u2.id
				ORDER BY asistencia DESC LIMIT 10";
        $res = $this->select_all($sql);
        return $res;
    }

    public function CuentaProfesor()
    {
        $sql = "SELECT practicas.id_responsable, usuarios.nombre, COUNT(practicas.id_responsable) AS total FROM practicas, usuarios WHERE practicas.id_responsable = usuarios.id AND practicas.estado = 3 GROUP BY practicas.id_responsable ASC LIMIT 10";
        $res = $this->select_all($sql);
        return $res;
    }

    public function CuentaSemestre()
    {
        $sql = "SELECT semestre AS nombre, COUNT(semestre) AS total FROM practicas WHERE practicas.estado = 3 GROUP BY semestre ASC LIMIT 10";
        $res = $this->select_all($sql);
        return $res;
    }

    public function TotalPlantilla()
    {
        $sql = "SELECT SUM(detalle_coti.cantidad * productos.precio) AS total FROM detalle_coti, productos WHERE detalle_coti.id_producto = productos.id";
        $res = $this->select($sql);
        return $res;
    }

    public function TotalCotizaciones()
    {
        $sql = "SELECT COUNT(*) AS total FROM cotizaciones";
        $res = $this->select($sql);
        return $res;
    }

    public function PromedioSalida()
    {
        $sql = "SELECT AVG(total) AS total FROM ventas";
        $res = $this->select($sql);
        return $res;
    }

    public function CuentaAsistencias()
    {
        $sql = "SELECT COUNT(*) AS total FROM asistencias WHERE asistencia = 2";
        $res = $this->select($sql);
        return $res;
    }

    public function CuentaFaltas()
    {
        $sql = "SELECT COUNT(*) AS total FROM asistencias WHERE asistencia = 0";
        $res = $this->select($sql);
        return $res;
    }

    public function CuentaRegistros()
    {
        $sql = "SELECT COUNT(*) AS total FROM practicas WHERE estado = 3";
        $res = $this->select($sql);
        return $res;
    }

    public function NoStock()
    {
        $sql = "SELECT * FROM productos WHERE estado = 1 AND cantidad = 0";
        $res = $this->select_all($sql);
        return $res;
    }

    public function PocoStock()
    {
        $sql = "SELECT * FROM productos WHERE estado = 1 AND cantidad <= minimo AND cantidad > 0";
        $res = $this->select_all($sql);
        return $res;
    }

    public function CuentaStock()
    {
        $sql = "SELECT SUM(cantidad) AS piezas, SUM(cantidad*precio) AS total FROM productos";
        $res = $this->select($sql);
        return $res;
    }

    public function PromedioStock()
    {
        $sql = "SELECT AVG(cantidad) AS stock, AVG(precio) AS costo FROM productos";
        $res = $this->select($sql);
        return $res;
    }

    public function EntradasVSSalidasDinero()
    {
        $sql = "SELECT DATE(fecha) AS nombre, 
                (SELECT SUM(cantidad*precio) FROM detalle_venta WHERE DATE(fecha) = nombre) AS ventas,
                (SELECT SUM(cantidad*precio) FROM detalle_compra WHERE DATE(fecha) = nombre) AS compras
                FROM (
                    SELECT fecha FROM detalle_venta
                    UNION
                    SELECT fecha FROM detalle_compra
                ) AS vc
                GROUP BY nombre";
        $res = $this->select_all($sql);
        return $res;
    }

    public function EntradasVSSalidasPiezas()
    {
        $sql = "SELECT DATE(fecha) AS nombre, 
                (SELECT SUM(cantidad) FROM detalle_venta WHERE DATE(fecha) = nombre) AS ventas,
                (SELECT SUM(cantidad) FROM detalle_compra WHERE DATE(fecha) = nombre) AS compras
                FROM (
                    SELECT fecha FROM detalle_venta
                    UNION
                    SELECT fecha FROM detalle_compra
                ) AS vc
                GROUP BY nombre";
        $res = $this->select_all($sql);
        return $res;
    }

    public function EntradasVSSalidasDineroC(string $inicio, string $fin)
    {
        $this->inicio = $inicio;
        $this->fin = $fin;
        $sql = "SELECT DATE(fecha) AS nombre, 
                (SELECT SUM(cantidad*precio) FROM detalle_venta WHERE DATE(fecha) = nombre) AS ventas, 
                (SELECT SUM(cantidad*precio) FROM detalle_compra WHERE DATE(fecha) = nombre) AS compras 
                FROM ( 
                    SELECT fecha FROM detalle_venta WHERE fecha BETWEEN '{$this->inicio}' AND '{$this->fin}' 
                    UNION 
                    SELECT fecha FROM detalle_compra WHERE fecha BETWEEN '{$this->inicio}' AND '{$this->fin}'
                    ) AS vc WHERE fecha BETWEEN '{$this->inicio}' AND '{$this->fin}' 
                    GROUP BY nombre";
        $res = $this->select_all($sql);
        return $res;
    }

    public function EntradasVSSalidasPiezasC(string $inicio, string $fin)
    {
        $this->inicio = $inicio;
        $this->fin = $fin;
        $sql = "SELECT DATE(fecha) AS nombre, 
                (SELECT SUM(cantidad) FROM detalle_venta WHERE DATE(fecha) = nombre) AS ventas, 
                (SELECT SUM(cantidad) FROM detalle_compra WHERE DATE(fecha) = nombre) AS compras 
                FROM ( 
                    SELECT fecha FROM detalle_venta WHERE fecha BETWEEN '{$this->inicio}' AND '{$this->fin}' 
                    UNION 
                    SELECT fecha FROM detalle_compra WHERE fecha BETWEEN '{$this->inicio}' AND '{$this->fin}'
                    ) AS vc WHERE fecha BETWEEN '{$this->inicio}' AND '{$this->fin}' 
                    GROUP BY nombre";
        $res = $this->select_all($sql);
        return $res;
    }

    public function MasSalidas()
    {
        $sql = "SELECT SUM(detalle_venta.id_producto) AS total, productos.nombre FROM detalle_venta, productos WHERE detalle_venta.id_producto = productos.id GROUP BY detalle_venta.id_producto ASC LIMIT 10";
        $res = $this->select_all($sql);
        return $res;
    }

    public function MasEntradas()
    {
        $sql = "SELECT SUM(detalle_compra.id_producto) AS total, productos.nombre FROM detalle_compra, productos WHERE detalle_compra.id_producto = productos.id GROUP BY detalle_compra.id_producto ASC LIMIT 10";
        $res = $this->select_all($sql);
        return $res;
    }

    public function MasSalidasC(string $inicio, string $fin)
    {
        $this->inicio = $inicio;
        $this->fin = $fin;
        $sql = "SELECT SUM(detalle_venta.id_producto) AS total, productos.nombre FROM detalle_venta, productos WHERE detalle_venta.id_producto = productos.id AND fecha BETWEEN '{$this->inicio}' AND '{$this->fin}' GROUP BY detalle_venta.id_producto ASC LIMIT 10";
        $res = $this->select_all($sql);
        return $res;
    }

    public function MasEntradasC(string $inicio, string $fin)
    {
        $this->inicio = $inicio;
        $this->fin = $fin;
        $sql = "SELECT SUM(detalle_compra.id_producto) AS total, productos.nombre FROM detalle_compra, productos WHERE detalle_compra.id_producto = productos.id AND fecha BETWEEN '{$this->inicio}' AND '{$this->fin}' GROUP BY detalle_compra.id_producto ASC LIMIT 10";
        $res = $this->select_all($sql);
        return $res;
    }

    public function VigenteCaducado()
    {
        $sql = "SELECT tipo AS nombre, SUM(cantidad) AS total FROM productos WHERE estado = 1 GROUP BY tipo";
        $res = $this->select_all($sql);
        return $res;
    }

    public function Proveedor()
    {
        $sql = "SELECT proveedor AS nombre, COUNT(*) AS total FROM productos WHERE estado = 1 GROUP BY proveedor ASC LIMIT 10";
        $res = $this->select_all($sql);
        return $res;
    }

    public function Categoria()
    {
        $sql = "SELECT categoria AS nombre, COUNT(*) AS total FROM productos WHERE estado = 1 GROUP BY categoria ASC LIMIT 10";
        $res = $this->select_all($sql);
        return $res;
    }

    public function MasPlantillas()
    {
        $sql = "SELECT COUNT(detalle_coti.id_producto) AS total, productos.nombre FROM detalle_coti, productos WHERE detalle_coti.id_producto = productos.id GROUP BY detalle_coti.id_producto ASC LIMIT 10";
        $res = $this->select_all($sql);
        return $res;
    }

}
?>

