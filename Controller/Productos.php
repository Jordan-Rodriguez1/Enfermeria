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
        $tipo = $_POST['tipo'];
        $minimo = $_POST['minimo'];
        $insert = $this->model->insertarProductos($codigo, $nombre, $precio, $proveedor, $categoria, $tipo, $minimo);
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

    //Selecciona producto a editar y muestra la lista de categorias y proveedores
    public function caducados()
    {
        $id = $_GET['id'];
        $data1 = $this->model->editarProductos($id);
        $data2 = $this->model->caducadosProductos($id);
        if ($data1 == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Caducados","",$data1, $data2);
        }
    }

    //Selecciona producto a editar y muestra la lista de categorias y proveedores
    public function caducar()
    {
        $id = $_POST['id'];
        $stock = $_POST['stock'];
        $id_caducar = $_POST['id_caducar'];
        $vigente = $this->model->editarProductos($id);
        $descontar = $vigente['cantidad'] - $stock;
        $this->model->editarStock($descontar, $id);
        $caducado = $this->model->editarProductos($id_caducar);
        $aumentar = $caducado['cantidad'] + $stock;
        $this->model->editarStock($aumentar, $id_caducar);
        $alert = "bien";
        header("location: " . base_url() . "Productos/Listar?msg=$alert");
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
        $tipo = $_POST['tipo'];
        $minimo = $_POST['minimo'];
        $actualizar = $this->model->actualizarProductos($codigo, $nombre, $cantidad, $precio, $proveedor, $categoria, $tipo, $minimo, $id);
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
            $this->views->getView($this, "ProveedoresEditar", "", $data1);
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
        $nombre = limpiarInput($_POST['nombre']);
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

    //Carga muchos productos
    public function subirarchivo()
    {
        $name = pathinfo($_FILES["archivo"]["name"]);
        $tipo_archivo = $_FILES["archivo"]["type"];
        $tamano_archivo = $_FILES["archivo"]["size"];
        $ruta_temporal = $_FILES["archivo"]["tmp_name"];
        $tmaximo = 20 * 1024 * 1024;
        if(($tamano_archivo < $tmaximo && $tamano_archivo != 0) && ($name["extension"] == "csv")){
            $lineas = file($ruta_temporal);
            $i = 0;
            $a = 0; //Agregados
            $e = 0; //Error
            $x = 0; //Ya existen
            foreach (($lineas) as $linea) {
                $cantidad_total = count($lineas);
                $cantidad_agregada = ($cantidad_total - 2);
                if ($i > 1) {
                    $datos = explode(",", $linea);
                    $codigo = $datos[0];
                    $nombre = $datos[1];
                    $precio = $datos[2];
                    $minimo = $datos[3]; 
                    $categoria = $datos[4];
                    $proveedor = $datos[5];
                    $tipo = $datos[6];
                    if ($nombre != "" && $codigo != "" ){
                        $insert = $this->model->insertarProductos($codigo, $nombre, $precio, $proveedor, $categoria, $tipo, $minimo);
                        if ($insert == 'existe') {
                            $data1 = $this->model->editarProductosC($codigo);
                            if ($data1['estado'] == 2) {
                                $id = $data1['id'];
                                $actualizar = $this->model->actualizarProductos($codigo, $nombre, $cantidad, $precio, $proveedor, $categoria, $tipo, $minimo, $id);
                                $eliminar = $this->model->reingresarProductos($id);
                                    if ($actualizar == 1) {
                                        $a++;
                                    } else {
                                        $e++;
                                    }
                            } else {
                                $x++; 
                            }
                        } else if ($insert > 0) {
                            $a++;
                        } else {
                            $e++;
                        }
                    } else{
                        $e++;
                    }
                }
                $i++;
            }
            $alert = "cargado";
            $data1 = $this->model->selectProductos();
            $data2 = $this->model->selectCat();
            $data3 = $this->model->selectPro();
            header("location: " . base_url() . "Productos/Listar?msg=$alert&a=$a&e=$e&x=$x");
        }else{
            $alert = "error";
            $data1 = $this->model->selectProductos();
            $data2 = $this->model->selectCat();
            $data3 = $this->model->selectPro(); 
            header("location: " . base_url() . "Productos/Listar?msg=$alert");
        }
        die();  
    }
}
?>