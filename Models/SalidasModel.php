<?php
class SalidasModel extends Mysql{
    public $id, $id_venta, $descripcion, $producto, $cantidad, $precio, $id_producto ,$id_usuario, $total, $id_responsable, $id_generador, $fecha, $estado, $formato;
    public function __construct()
    {
        parent::__construct();
    }

    //Selecciona la lista de ventas con los nombres de generadores y responsables
    public function selectVentas()
    {
        $sql = "SELECT ventas.id, ventas.estado, ventas.formato, ventas.total, ventas.fecha, ventas.descripcion, u1.nombre as id_responsable, u2.nombre as id_generador FROM ventas 
                JOIN usuarios u1 ON ventas.id_responsable = u1.id
                JOIN usuarios u2 ON ventas.id_generador = u2.id";
        $res = $this->select_all($sql);
        return $res;
    }

    //Selecciona plantilla materiales
    public function selecPlantillaD(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM practicas WHERE id = '{$this->id}'";
        $res = $this->select($sql);
        return $res;
    }

    //cuenta asistencias
    public function cuentaAsistencias(int $id)
    {
        $this->id = $id;
        $sql = "SELECT COUNT(*) AS asistencia FROM asistencias WHERE id_practica = '{$this->id}' AND asistencia = 2";
        $res = $this->select($sql);
        return $res;
    }

    // Muestra la lista de responsables
    public function responsables(String $id)
    {
        $sql = "SELECT nombre, id FROM usuarios WHERE estado = 1 AND id !=$id ORDER BY nombre ASC";
        $res = $this->select_all($sql);
        return $res;
    }

    //Selecciona los productos en detalle del usuario
    public function verificarProductos($id_usuario)
    {
        $query = "SELECT * FROM detalle_temp WHERE id_usuario = '{$id_usuario}'";
        $resul = $this->select_all($query);
        return $resul;
    }

    //Busca el número más  grande de salida
    public function buscaridC()
    {
        $sql = "SELECT MAX(id) from ventas";
        $res = $this->select($sql);
        return $res;
    }

    //Registra la venta
    public function registrarSalida(String $descripcion, String $total, String $id_generador, String $id_responsable)
    {
        $return = "";
        $this->descripcion = $descripcion;
        $this->total = $total;
        $this->id_generador = $id_generador;
        $this->id_responsable = $id_responsable;
        $query = "INSERT INTO ventas(descripcion, total, id_generador, id_responsable) VALUES (?,?,?,?)";
        $data = array($this->descripcion, $this->total, $this->id_generador, $this->id_responsable);
        $resul = $this->insert($query, $data);
        $return = $resul;
        return $return;
    }

    //Registra el detalle de venta
    public function registrarDetalle(String $id_venta, string $nombre ,string $id_producto, string $cantidad, string $precio, $id_usuario)
    {
        $return = "";
        $this->id_venta = $id_venta;
        $this->id_producto = $id_producto;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre;
        $query = "INSERT INTO detalle_venta(id_venta,producto,id_producto ,cantidad, precio,id_usuario) VALUES (?,?,?,?,?,?)";
        $data = array($this->id_venta,$this->nombre, $this->id_producto, $this->cantidad, $this->precio, $this->id_usuario);
        $resul = $this->insert($query, $data);
        $return = $resul;
        return $return;
    }

    //Vacía detalle Venta después de una salida
    public function vaciarDetalle(string $id_usuario)
    {
        $this->id = $id_usuario;
        $sql = "DELETE FROM detalle_temp WHERE id_usuario = $id_usuario";
        $resul = $this->delete($sql);
    }

    //Detalle venta que se muestra en PDF
    public function DetalleVenta(int $id)
    {
        $sql = "SELECT detalle_venta.producto, detalle_venta.cantidad, detalle_venta.precio, productos.codigo FROM detalle_venta, productos WHERE detalle_venta.id_producto = productos.id AND id_venta = $id";
        $res = $this->select_all($sql);
        return $res;
    }

    //Configuracion de PDF (Encabezado)
    public function selectConfiguracion()
    {
        $sql = "SELECT * FROM configuracion";
        $res = $this->select($sql);
        return $res;
    }

    //Lista venta que se muestra en PDF
    public function ListaVenta(int $id)
    {
        $sql = "SELECT * FROM ventas WHERE id = $id";
        $res = $this->select($sql);
        return $res;
    }

    //Detalle generador que se muestra en PDF
    public function PdfGenerador(String $nombre_generador)
    {
        $sql = "SELECT usuario, nombre, correo FROM usuarios WHERE id = '$nombre_generador'";
        $res = $this->select($sql);
        return $res;
    }

    //Detalle responsable que se muestra en PDF
    public function PdfResponsable(String $nombre_responsable)
    {
        $sql = "SELECT usuario, nombre, correo FROM usuarios WHERE id = '$nombre_responsable'";
        $res = $this->select($sql);
        return $res;
    }

    //Actualiza la ruta de la factura
    public function img (string $perfil, int $id)
    {
        $this->perfil = $perfil;
        $this->id = $id;
        $query = "UPDATE ventas SET formato = ? WHERE id = ?";
        $data = array($this->perfil, $this->id);
        $resul = $this->update($query, $data);
        return $resul;
    }
}
?>