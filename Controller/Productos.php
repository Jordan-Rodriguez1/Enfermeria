<?php
class Productos extends Controllers
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url());
        }
        parent::__construct();
    }

    //Muestra la lista de productos, categorias y proveedores
    public function Listar()
    {
        $data1 = $this->model->selectProductos();
        $data2 = $this->model->selectCat();
        $data3 = $this->model->selectPro();
        $this->views->getView($this, "Listar", "",$data1, $data2, $data3);
    }

    //Muestra los productos inactivos
    public function eliminados()
    {
        $data1 = $this->model->selectProductosInactivos();
        $this->views->getView($this, "Eliminados", "", $data1);
    }

    //Agrega nuevos productos
    public function insertar()
    {
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $proveedor = $_POST['proveedor'];
        $categoria = $_POST['categoria'];
        $insert = $this->model->insertarProductos($codigo, $nombre, $precio, $proveedor, $categoria);
        if ($insert == 'existe') {
            $alert = 'existe';
        } else if ($insert > 0) {
            $alert = 'registrado';
        } else {
            $alert = 'error';
        }
        $data1 = $this->model->selectProductos();
        header("location: " . base_url() . "Productos/Listar?msg=$alert");
        die();
    }

    //Selecciona producto a editar y muestra la lista de categorias y proveedores
    public function editar()
    {
        $id = $_GET['id'];
        $data1 = $this->model->editarProductos($id);
        $data2 = $this->model->selectCat();
        $data3 = $this->model->selectPro();
        if ($data1 == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar","",$data1, $data2, $data3);
        }
    }
    
    //Actualiza el producto
    public function actualizar()
    {
        $id = $_POST['id'];
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        $proveedor = $_POST['proveedor'];
        $categoria = $_POST['categoria'];
        $actualizar = $this->model->actualizarProductos($codigo, $nombre, $cantidad, $precio, $proveedor, $categoria, $id);
        if ($actualizar == 1) {
            $alert =  'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "Productos/Listar?msg=$alert");
        die();
    }

    //Inactiva un producto
    public function eliminar()
    {
        $id = $_GET['id'];
        $eliminar = $this->model->eliminarProductos($id);
        $data1 = $this->model->selectProductos();
        $alert =  'eliminado';
        header('location: ' . base_url() . "Productos/Listar?msg=$alert");
        die();
    }

    //Elimina un producto
    public function eliminarper()
    {
        $id = $_GET['id'];
        $eliminar = $this->model->eliminarperProductos($id);
        $data1 = $this->model->selectProductos();
        $alert =  'eliminado';
        header('location: ' . base_url() . "Productos/eliminados?msg=$alert");
        die();
    }

    //reactiva un producto
    public function reingresar()
    {
        $id = $_GET['id'];
        $this->model->reingresarProductos($id);
        $data1 = $this->model->selectProductos();
        header('location: ' . base_url() . "Productos/eliminados?msg=$alert");
        die();
    }

    // AQUI TERMINA LA PARTE DE PRODUCTOS //
    //
    // AQÍ EMPIZA LA PARTE DE PROVEEDORES //

    //Selecciona los proveedores existentes
    public function Proveedores()
    {
        $data1 = $this->model->selectProveedores();         
        $this->views->getView($this, "Proveedores", "", $data1);
    }

    //Agrega un nuevo proveedor
    public function Proveedoresinsertar()
    {
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $insert = $this->model->insertarProveedores($nombre, $telefono, $direccion);
        if ($insert > 0) {
        $alert = 'registrado';
        }else{
        $alert =  'error';
        }
        $this->model->selectProveedores();
        header("location: " . base_url() . "Productos/Proveedores?msg=$alert");
        die();
    }

    //Selecciona el proveedor a editar
    public function Proveedoreseditar()
    {
        $id = $_GET['id'];
        $data1 = $this->model->editarProveedores($id);
        if ($data1 == 0) {
            $this->Listar();
        }else{
            $this->views->getView($this, "Proveedoreseditar", "", $data1);
        }
    }

    //Edita los datos del proveedor
    public function Proveedoresactualizar()
    {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $actualizar = $this->model->actualizarProveedores($nombre, $telefono, $direccion, $id);
        if ($actualizar == 1) {
            $alert = 'modificado';
        }else {
            $alert = 'error';
        }
        header("location: " . base_url() . "Productos/Proveedores?msg=$alert");
        die();
    }

    //Elimina porveedor
    public function Proveedoreseliminarper()
    {
        $id = $_GET['id'];
        $this->model->eliminarperProveedores($id);
        $data = $this->model->selectProveedores();
        $alert = 'eliminado';
        header("location: " . base_url() . "Productos/Proveedores?msg=$alert");
        die();
    }

    // AQUI TERMINA LA PARTE DE PROVEEDORES //
    //
    // AQÍ EMPIZA LA PARTE DE CATEGORIAS //

    //Selecciona las categorias existentes
    public function Categorias()
    {
        $data1 = $this->model->selectCategorias();         
        $this->views->getView($this, "Categorias", "", $data1);
    }

    //Agrega una nueva ategoria
    public function Categoriasinsertar()
    {
        $nombre = $_POST['nombre'];
        $insert = $this->model->insertarCategorias($nombre);
        if ($insert > 0) {
        $alert = 'registrado';
        }else{
        $alert =  'error';
        }
        $this->model->selectCategorias();
        header("location: " . base_url() . "Productos/Categorias?msg=$alert");
        die();
    }

    //Elimina porveedor
    public function Categoriaseliminarper()
    {
        $id = $_GET['id'];
        $this->model->eliminarperCategorias($id);
        $data = $this->model->selectCategorias();
        $alert = 'eliminado';
        header("location: " . base_url() . "Productos/Categorias?msg=$alert");
        die();
    }


}
?>