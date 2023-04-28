<?php
class MovimientosModel extends Mysql{
    public $id, $id_venta, $id_cliente, $codigo, $nombre, $cantidad, $precio, $id_producto ,$id_usuario, $total, $responsable;
    public function __construct()
    {
        parent::__construct();
    }

    //Seleccina los movimientos pendientes de aprobar/rechazar según usuario
    public function selectMovimientos(string $id)
    {
        $this->id = $id;
        $sql = "SELECT ventas.id, ventas.estado, ventas.total, ventas.fecha, ventas.descripcion, u1.nombre as id_responsable, u2.nombre as id_generador FROM ventas 
                JOIN usuarios u1 ON ventas.id_responsable = u1.id
                JOIN usuarios u2 ON ventas.id_generador = u2.id 
                WHERE ventas.estado = 1 AND ventas.id_responsable = '{$id}'";
        $res = $this->select_all($sql);
        return $res;
    }

    //Selecciona los productos de la venta
    public function seleccionarProductos($id)
    {
        $query = "SELECT * FROM detalle_venta WHERE id_venta = '{$id}'";
        $resul = $this->select_all($query);
        return $resul;
    }

    //Selecciona el stock actual de los productos
    public function stockActual($id_producto)
    {
        $query = "SELECT cantidad FROM productos WHERE id = '{$id_producto}'";
        $resul = $this->select($query);
        return $resul;
    }

    //actualiza el nuevo stock de los productos
    public function registrarStock(float $cantidad, int $id)
    {
        $this->cantidad = $cantidad;
        $this->id = $id;
        $query = "UPDATE productos SET cantidad =? WHERE id =?";
        $data = array($this->cantidad, $this->id);
        $resul = $this->update($query, $data);
        return $resul;
    }

    //Actualiza el estado de la transacción
    public function ActualizarEstado(int $id, int $estado)
    {
        $this->id = $id;
        $this->estado = $estado;
        $query = "UPDATE ventas SET estado =? WHERE id =?";
        $data = array($this->estado, $this->id);
        $resul = $this->update($query, $data);
        return $resul;
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
    public function PdfGenerador(String $nombre_cliente)
    {
        $sql = "SELECT usuario, nombre, correo FROM usuarios WHERE nombre = '$nombre_cliente'";
        $res = $this->select($sql);
        return $res;
    }

    //Detalle responsable que se muestra en PDF
    public function PdfResponsable(String $nombre_responsable)
    {
        $sql = "SELECT usuario, nombre, correo FROM usuarios WHERE nombre = '$nombre_responsable'";
        $res = $this->select($sql);
        return $res;
    }
}
?>