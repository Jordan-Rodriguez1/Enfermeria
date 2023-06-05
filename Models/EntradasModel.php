<?php
class EntradasModel extends Mysql{
    public $id, $id_venta, $descripcion, $producto, $cantidad, $precio, $id_producto ,$id_usuario, $total, $id_proveedor, $formato, $id_generador, $fecha;
    public function __construct()
    {
        parent::__construct();
    }

    //Selecciona las entradas realizadas
    public function selectCompras()
    {
        $sql = "SELECT compras.id, compras.total, compras.formato, compras.fecha, compras.descripcion, u1.nombre as id_proveedor, u2.nombre as id_generador FROM compras 
                JOIN proveedores u1 ON compras.id_proveedor = u1.id
                JOIN usuarios u2 ON compras.id_generador = u2.id";
        $res = $this->select_all($sql);
        return $res;
    }

    // Muestra la lista de proveedores
    public function proveedores()
    {
        $sql = "SELECT nombre, id FROM proveedores WHERE estado = 1 ORDER BY nombre ASC";
        $res = $this->select_all($sql);
        return $res;
    }

    // Muestra la lista de productos
    public function productos()
    {
        $sql = "SELECT nombre, codigo FROM productos WHERE estado = 1 ORDER BY nombre ASC";
        $res = $this->select_all($sql);
        return $res;
    }

    //Selecciona el detalle que se muestra en el carrito
    public function selectDetalle()
    {
        $sql = "SELECT detalle_temp.nombre, detalle_temp.cantidad, detalle_temp.precio, detalle_temp.total, productos.codigo, detalle_temp.id_usuario, detalle_temp.estado, detalle_temp.id FROM detalle_temp, productos WHERE detalle_temp.id_producto = productos.id AND id_usuario = $_SESSION[id]";
        $res = $this->select_all($sql);
        return $res;
    }

    //Agrega productos a detalle
    public function insertarDetalle(String $nombre, string $cantidad ,string $precio, string $total, string $id_producto ,string $id_usuario)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->total = $total;
        $this->id_producto = $id_producto;
        $this->id_usuario = $id_usuario;

            $query = "INSERT INTO detalle_temp(nombre, cantidad, precio, total, id_producto ,id_usuario) VALUES (?,?,?,?,?,?)";
            $data = array($this->nombre,$this->cantidad, $this->precio, $this->total,$this->id_producto,$this->id_usuario);
            $resul = $this->insert($query, $data);
            $return = $resul;
        return $return;
    }

    //Busca si el producto existe
    public function buscarProducto(int $codigo)
    {
        $this->codigo = $codigo;
        $sql = "SELECT * FROM productos WHERE codigo = '{$this->codigo}' AND estado = 1";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }

    //Añade unidades al detalle temporal
    public function actualizarCompras(String $codigo, string $nombre, string $cantidad, string $precio, int $id)
    {
        $return = "";
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->id = $id;
        $query = "UPDATE compras SET codigo=?, nombre=?, cantidad=?, precio=? WHERE id=?";
        $data = array($this->codigo, $this->nombre, $this->cantidad, $this->precio, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    //Obtine los detalles del producto en el carrito
    public function buscarProductoexiste($id_producto, $id_usuario)
    {
        $query = "SELECT * FROM detalle_temp WHERE id_usuario = '{$id_usuario}' AND id_producto = '{$id_producto}'";
        $result = $this->select($query);
        return $result;

    }
 
    //Verifica si el carrito tiene un producto específico
    public function verificarProductoexiste($id_producto, $id_usuario)
    {
        $query = "SELECT * FROM detalle_temp WHERE id_usuario = '{$id_usuario}' AND id_producto = '{$id_producto}'";
        $result = $this->select($query);
        if (empty($result)) {
            $return = "noexiste";
        }else {
            $return = "existe";
        }
        return $return;

    }

    //Obtiene la cantidad de un producot en el carrito
    public function contarProductoexiste($id_producto, $id_usuario)
    {
        $query = "SELECT cantidad FROM detalle_temp WHERE id_usuario = '{$id_usuario}' AND id_producto = '{$id_producto}'";
        $resul = $this->selecT($query);
        return $resul;
    }

    //Agreda productos al inventario
    public function actualizarCantidad(int $cantidad,String $total, int $id)
    {
        $this->cantidad = $cantidad;
        $this->total = $total;
        $this->id = $id;
        $query = "UPDATE detalle_temp SET cantidad =?, total =? WHERE id =?";
        $data = array($this->cantidad, $this->total ,$this->id);
        $resul = $this->update($query, $data);
        return $resul;
    }

    //Obtiene el detalle de todos los productos en el carrito
    public function verificarProductos($id_usuario)
    {
        $query = "SELECT * FROM detalle_temp WHERE id_usuario = '{$id_usuario}'";
        $resul = $this->select_all($query);
        return $resul;
    }

    //Valida el numero existente de stock
    public function stockActual($id_producto)
    {
        $query = "SELECT cantidad FROM productos WHERE id = '{$id_producto}'";
        $resul = $this->select($query);
        return $resul;
    }

    //Busca el id mayor de compras
    public function buscaridC()
    {
        $sql = "SELECT MAX(id) from compras";
        $res = $this->select($sql);
        return $res;
    }

    //Registra la compra
    public function registrarCompra(String $descripcion, string $total, string $id_generador, string $id_proveedor)
    {
        $return = "";
        $this->descripcion = $descripcion;
        $this->total = $total;
        $this->id_generador = $id_generador;
        $this->id_proveedor = $id_proveedor;
        $query = "INSERT INTO compras(descripcion, total, id_generador, id_proveedor) VALUES (?,?,?,?)";
        $data = array($this->descripcion, $this->total, $this->id_generador, $this->id_proveedor);
        $resul = $this->insert($query, $data);
        $return = $resul;
        return $return;
    }

    //Registra el detalle de compra
    public function registrarDetalle(String $id_compra, string $nombre ,string $id_producto, string $cantidad, string $precio, $id_usuario)
    {
        $return = "";
        $this->id_compra = $id_compra;
        $this->id_producto = $id_producto;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre;
        $query = "INSERT INTO detalle_compra(id_compra,producto,id_producto ,cantidad, precio,id_usuario) VALUES (?,?,?,?,?,?)";
        $data = array($this->id_compra,$this->nombre, $this->id_producto, $this->cantidad, $this->precio, $this->id_usuario);
        $resul = $this->insert($query, $data);
        $return = $resul;
        return $return;
    }

    //Elimina 1 campo de detalle venta
    public function eliminarDetalle(int $id)
    {
        $this->id = $id;
        $sql = "DELETE FROM detalle_temp WHERE id = $id";
        $resul = $this->delete($sql);
    }

    //Actualiza el nuevo stock del producto
    public function registrarStock(float $cantidad, int $id)
    {
        $this->cantidad = $cantidad;
        $this->id = $id;
        $query = "UPDATE productos SET cantidad =? WHERE id =?";
        $data = array($this->cantidad, $this->id);
        $resul = $this->update($query, $data);
        return $resul;
    }

    //Vavía detalle Venta
    public function vaciarDetalle(string $id_usuario)
    {
        $this->id = $id_usuario;
        $sql = "DELETE FROM detalle_temp WHERE id_usuario = $id_usuario";
        $resul = $this->delete($sql);
    }

    //Detalle venta que se muestra en PDF
    public function DetalleCompra(int $id)
    {
        $sql = "SELECT detalle_compra.producto, detalle_compra.cantidad, detalle_compra.precio, productos.codigo FROM detalle_compra, productos WHERE detalle_compra.id_producto = productos.id AND id_compra = $id";
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
    public function ListaCompra(int $id)
    {
        $sql = "SELECT * FROM compras WHERE id = $id";
        $res = $this->select($sql);
        return $res;
    }

    //Detalle generador que se muestra en PDF
    public function PdfGenerador(String $nombre_cliente)
    {
        $sql = "SELECT usuario, nombre, correo FROM usuarios WHERE id = '$nombre_cliente'";
        $res = $this->select($sql);
        return $res;
    }

    //Detalle responsable que se muestra en PDF
    public function PdfProveedor(String $nombre_proveedor)
    {
        $sql = "SELECT direccion, nombre, telefono FROM proveedores WHERE id = '$nombre_proveedor'";
        $res = $this->select($sql);
        return $res;
    }

    //Actualiza la ruta de la factura
    public function img (string $perfil, int $id)
    {
        $this->perfil = $perfil;
        $this->id = $id;
        $query = "UPDATE compras SET formato = ? WHERE id = ?";
        $data = array($this->perfil, $this->id);
        $resul = $this->update($query, $data);
        return $resul;
    }
}
?>
