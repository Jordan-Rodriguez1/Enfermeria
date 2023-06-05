<?php
class Entradas extends Controllers{
    protected $totalPagar, $tot = 0;
    public function __construct()
    {
    session_start();
    if (empty($_SESSION['activo'])) {
        header("location: " . base_url());
    }
        parent::__construct();
    }

    //Muestra la lista de proveedores.
    public function Listar()
    {    
        $data1 = $this->model->proveedores();
        $data2 = $this->model->productos();
        $this->views->getView($this, "Listar", "", $data1, $data2);
        die();
    }

    //Muestra la lista de entradas
    public function lista()
    {
        $data1 = $this->model->selectCompras();
        $this->views->getView($this, "ListarCompras", "", $data1);
        die();
    }

    //Ingresa a detalle temporal las entras/salidas generadas
    public function ingresar()
    {
        $id = limpiarInput($_POST['id']);
        $nombre = limpiarInput($_POST['nombre']);
        $cantidad = limpiarInput($_POST['cantidad']);
        $precio = limpiarInput($_POST['precio']);
        $total = $cantidad * $precio;
        $id_usuario = $_SESSION['id'];
        $existe = $this->model->verificarProductoexiste($id, $id_usuario);
        if ($existe == "existe" && $cantidad != 0 ) {
            $existe = $this->model->buscarProductoexiste($id, $id_usuario);
            $contar = $this->model->contarProductoexiste($id, $id_usuario);
            $piezas = $cantidad + $contar['cantidad'];
            if ($piezas > 0) {
                $idP = $existe['id'];
                $cant = $existe['cantidad'];
                $cantidad = limpiarInput($_POST['cantidad']) + $cant;
                $total = $existe['precio'] * $cantidad;
                $this->model->actualizarCantidad($cantidad,$total ,$idP);
                echo "actualizado";
            }else{
                $idP = $existe['id'];
                $this->model->eliminarDetalle($idP);
                echo "eliminado";
            }
        }else{ 
            if ($cantidad > 0){
                $insert = $this->model->insertarDetalle($nombre, $cantidad, $precio, $total,$id,$id_usuario);
                if ($insert > 0) {
                    $this->Listar();
                    echo "exito";
                }else{
                    echo "errorregistro";
                }
            } else{
                echo "errorcantidad";
            }
        }   
        die(); 
    }

    // Muestra la lista de prodcutos en el carrito
    public function detalle()
    {
        $data = $this->model->selectDetalle();
        foreach ($data as $detalle) {
        $this->totalPagar = $this->totalPagar + $detalle['total']; 
        echo "<tr>
                <td>".$detalle['id']."</td>
                <td>".$detalle['codigo']."</td>
                <td>".$detalle['nombre']."</td>
                <td>".$detalle['cantidad'] . "</td>
                <td>".$detalle['precio'] . "</td>
                <td>".$detalle['total'] . "</td>
                <td> <button type='button' data-id='".$detalle['id'] ."' class='btn btn-danger eliminar'>Eliminar</button></td>
            </tr>";
        }
        $tot = number_format($this->totalPagar, 2, ".", "");
        echo "<input type='hidden' id='totalPagar' value='".$tot."'/>";
        die();
    }

    // Elimina 1 elemento de la lista de prodcutos en el carrito
    public function eliminar()
    {    
        $id = limpiarInput($_POST['id']);
        $this->model->eliminarDetalle($id);
        die();
    }

    //Anula carrito
    public function anular()
    {
        $this->model->vaciarDetalle($_SESSION['id']);
        die();
    }

    //Busca detalles de los productos
    public function buscar()
    {
        $codigo = limpiarInput($_POST['codigo']);
        $data = $this->model->buscarProducto($codigo);
        echo json_encode($data);
        die();
    }

    //registra la compra
    public function registrar()
    {
        $descripcion = limpiarInput($_POST['descripcion']);
        $id_proveedor = limpiarInput($_POST['proveedor']);
        $total = limpiarInput($_POST['total']);
        $id_generador = $_SESSION['id'];
            if ($descripcion == '') {
            $this->model->registrarCompra('S/D', $total, $id_generador, $id_proveedor);
        }else{
            $this->model->registrarCompra($descripcion, $total, $id_generador, $id_proveedor);
        }
        $data = $this->model->buscaridC();
        $result = $data['MAX(id)'];
        $productos = $this->model->verificarProductos($_SESSION['id']);
        foreach ($productos as $data) {
            $stock = $this->model->stockActual($data['id_producto']);
            $stockActual = $stock['cantidad'];
            $insertar = $this->model->registrarDetalle($result, $data['nombre'] ,$data['id_producto'], $data['cantidad'], $data['precio'], $data['id_usuario']);
            $this->model->registrarStock($stockActual + $data['cantidad'], $data['id_producto']);
        }
        $this->model->VaciarDetalle($_SESSION['id']);
        die();
    }

    //Datos PDF
    public function ver()
    {
        $id = limpiarInput($_GET['id']);
        $data5 = $this->model->ListaCompra($id);
        $nombre_generador = $data5['id_generador'];
        $nombre_proveedor = $data5['id_proveedor'];
        $data1 = $this->model->DetalleCompra($id);
        $data2 = $this->model->selectConfiguracion();
        $data3 = $this->model->PdfGenerador($nombre_generador);
        $data4 = $this->model->PdfProveedor($nombre_proveedor);
        $this->views->getView($this, "VerCompras", "", $data1, $data2, $data3, $data4, $data5);
        die();
    }

    //Sube la factura al servidor
    public function subirarchivo()
    {
        $name = pathinfo($_FILES["archivo"]["name"]);
        $nombre_archivo = $_FILES["archivo"]["name"];
        $nombre_nuevo = limpiarInput($_POST['id']).".".$name["extension"];
        $tipo_archivo = $_FILES["archivo"]["type"];
        $tamano_archivo = $_FILES["archivo"]["size"];
        $ruta_temporal = $_FILES["archivo"]["tmp_name"];
        $error_archivo = $_FILES["archivo"]["error"];
        $tmaximo = 20 * 1024 * 1024;
        if(($tamano_archivo < $tmaximo && $tamano_archivo != 0) && ($name["extension"] == "pdf")){
            if ($error_archivo == UPLOAD_ERR_OK) {
                $ruta_destino = 'Assets/archivos/entradas/'.$nombre_nuevo;
                if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
                $id = $_POST['id'];
                $this->model->img($nombre_nuevo, $id);
                   $alert =  'registrado';
                } else {
                   $alert =  'noformato';
                }
            } else {
            $alert =  'noformato';
            }
        } else {
            $alert =  'noformato';
        }       
        header('location: ' . base_url() . "Entradas/lista?msg=$alert");
        die();
    }
}
?>
