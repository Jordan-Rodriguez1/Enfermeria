<?php
class ProductosModel extends Mysql{
    public $id, $codigo, $nombre, $cantidad, $precio, $minimo, $proveedor, $categoria, $estado;
    public function __construct()
    {
        parent::__construct();
    }

    //Selecciona los productos activos
    public function selectProductos()
    {
        $sql = "SELECT * FROM productos WHERE estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }

    //Selecciona las categorias existentes
    public function selectCat()
    {
        $sql = "SELECT * FROM categorias ORDER BY nombre ASC";
        $res = $this->select_all($sql);
        return $res;
    }

    //Selecciona los proveedores existentes
    public function selectPro()
    {
        $sql = "SELECT * FROM proveedores WHERE estado = 1 ORDER BY nombre ASC";
        $res = $this->select_all($sql);
        return $res;
    }
    
    //Selecciona los productos inactivos
    public function selectProductosInactivos()
    {
        $sql = "SELECT * FROM productos WHERE estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }

    //Agrega nuevos productos
    public function insertarProductos(String $codigo, string $nombre, string $precio, string $proveedor, string $categoria)
    {
        $return = "";
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->proveedor = $proveedor;
        $this->categoria = $categoria;
        $sql = "SELECT * FROM productos WHERE codigo = '{$this->codigo}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO productos(codigo, nombre, precio, proveedor, categoria) VALUES (?,?,?,?,?)";
            $data = array($this->codigo, $this->nombre, $this->precio, $this->proveedor, $this->categoria);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }

    //Selecciona el producto a editar
    public function editarProductos(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM productos WHERE id = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }

    //Actualiza los productos
    public function actualizarProductos(String $codigo, string $nombre, string $cantidad, string $precio, string $proveedor, string $categoria, int $id)
    {
        $return = "";
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->proveedor = $proveedor;
        $this->categoria = $categoria;
        $this->id = $id;
        $query = "UPDATE productos SET codigo=?, nombre=?, cantidad=?, precio=?, proveedor=?, categoria=? WHERE id=?";
        $data = array($this->codigo, $this->nombre, $this->cantidad, $this->precio, $this->proveedor, $this->categoria, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    //Cambia el estado del producto a inactivo
    public function eliminarProductos(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE productos SET estado = 0 WHERE id=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    //Elimina el producto seleccionado
        public function eliminarperProductos(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "DELETE FROM productos WHERE id=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    //Cambia el estado del producto a activo
    public function reingresarProductos(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE productos SET estado = 1 WHERE id=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    // AQUI TERMINA LA PARTE DE PRODUCTOS //
    //
    // AQÍ EMPIZA LA PARTE DE PROVEEDORES //

    public $telefono, $direccion;

    //Selecciona los proveedores existentes
    public function selectProveedores()
    {
        $sql = "SELECT * FROM proveedores WHERE estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }

    //Añade un nuevo proveedor
    public function insertarProveedores(String $nombre, string $telefono, string $direccion)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $query = "INSERT INTO proveedores(nombre, telefono, direccion) VALUES (?,?,?)";
        $data = array($this->nombre, $this->telefono, $this->direccion);
        $resul = $this->insert($query, $data);
        $return = $resul;
        return $return;
    }

    //Selecciona un proveedor para editar
    public function editarProveedores(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM proveedores WHERE id = '{$this->id}' AND estado = 1";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }

    //Actualiza los datos de un proveedor
    public function actualizarProveedores(String $nombre, string $telefono, string $direccion, int $id)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->id = $id;
        $query = "UPDATE proveedores SET nombre=?, telefono=?, direccion=? WHERE id=?";
        $data = array($this->nombre, $this->telefono, $this->direccion, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    //Elimina un proveedor (Solo se cambia de estado por fines de ver pdf)
    public function eliminarperProveedores(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE proveedores SET estado = 0 WHERE id=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    // AQUI TERMINA LA PARTE DE PROVEEDORES //
    //
    // AQÍ EMPIZA LA PARTE DE CATEGORIAS //

    //Selecciona las Categorias existentes
    public function selectCategorias()
    {
        $sql = "SELECT * FROM categorias";
        $res = $this->select_all($sql);
        return $res;
    }

    //Añade una nuevo Categoria
    public function insertarCategorias(String $nombre)
    {
        $return = "";
        $this->nombre = $nombre;
        $query = "INSERT INTO categorias(nombre) VALUES (?)";
        $data = array($this->nombre);
        $resul = $this->insert($query, $data);
        $return = $resul;
        return $return;
    }

    //Elimina una Categoria
    public function eliminarperCategorias(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "DELETE FROM categorias WHERE id=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>