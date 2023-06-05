<?php
class Practicas extends Controllers{
    protected $totalPagar, $tot = 0;
    public function __construct()
    {
    session_start();
    if (empty($_SESSION['activo'])) {
        header("location: " . base_url());
    }
        parent::__construct();
    }


    //COMIEZA PLANTILLAS

    //Muestra la lista de plantillas. (texto y materiales)
    public function Plantillas()
    {
        $data1 = $this->model->selectPlantillas();
        $data2 = $this->model->selectPlantillasM();
        $this->views->getView($this, "Plantillas", "", $data1, $data2);
        die();
    }

    //Agrega nueva plantilla (texto)
    public function insertar()
    {
        $nombre = limpiarInput($_POST['nombre']);
        $descripcion = limpiarInput($_POST['descripcion']);
        $objetivo = limpiarInput($_POST['objetivos']);
        $requisitos = limpiarInput($_POST['requisitos']);
        $insert = $this->model->insertarPlantilla($nombre, $descripcion, $objetivo, $requisitos);
        $id = $this->model->buscarPlantilla();
        $tmaximo = 20 * 1024 * 1024;
        $name = pathinfo($_FILES["archivo"]["name"]);
        $nombre_archivo = $_FILES['archivo']["name"];
        $nombre_nuevo = $id['id'].".".$name["extension"];
        $tipo_archivo = $_FILES["archivo"]["type"];
        $tamano_archivo = $_FILES["archivo"]["size"];
        $ruta_temporal = $_FILES["archivo"]["tmp_name"];
        $error_archivo = $_FILES["archivo"]["error"];
        if ($insert == 'existe') {
            $alert = 'existe';
        } else if ($insert > 0) {
            if(($tamano_archivo < $tmaximo && $tamano_archivo != 0) && ($name["extension"] == "pdf")){
                $ruta_destino = 'Assets/archivos/practicas/'.$nombre_nuevo;
                move_uploaded_file($ruta_temporal, $ruta_destino);
                $agregar = $this->model->insertarFormato($nombre_nuevo, $id['id']);
                $alert = 'registrado';
            } else {
                $alert = 'registradoe';
            }
        } else {
            $alert = 'error';
        }
        $data1 = $this->model->selectPlantillas();
        header("location: " . base_url() . "Practicas/Plantillas?msg=$alert");
        die();
    }

    //Muestra las plantilla inactivas (texto)
    public function Eliminado()
    {
        $data1 = $this->model->selecPlantillasInactivas();
        $data2 = $this->model->selecPlantillasMInactivas();
        $this->views->getView($this, "Eliminado", "", $data1, $data2);
        die();
    }

    //Selecciona plantilla a editar (texto)
    public function Teditar()
    {
        $id = $_GET['id'];
        $data1 = $this->model->editarPlantillas($id);
        if ($data1 == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Teditar","",$data1);
        }
        die();
    }
    
    //Actualiza la plantilla (texto)
    public function Tactualizar()
    {
        $id = limpiarInput($_POST['id']);
        $nombre = limpiarInput($_POST['nombre']);
        $descripcion = limpiarInput($_POST['descripcion']);
        $objetivo = limpiarInput($_POST['objetivos']);
        $requisitos = limpiarInput($_POST['requisitos']);
        $tmaximo = 20 * 1024 * 1024;
        $name = pathinfo($_FILES["archivo"]["name"]);
        $nombre_archivo = $_FILES['archivo']["name"];
        $nombre_nuevo = $id.".".$name["extension"];
        $tipo_archivo = $_FILES["archivo"]["type"];
        $tamano_archivo = $_FILES["archivo"]["size"];
        $ruta_temporal = $_FILES["archivo"]["tmp_name"];
        $error_archivo = $_FILES["archivo"]["error"];
        if ($nombre_archivo != "") {
            if(($tamano_archivo < $tmaximo && $tamano_archivo != 0) && ($name["extension"] == "pdf")){
                $plantilla = $this->model->editarPlantillas($id);
                unlink("Assets/img/perfilesalumnos/".$plantilla["formato"]);
                $ruta_destino = "Assets/archivos/practicas/".$nombre_nuevo;
                move_uploaded_file($ruta_temporal, $ruta_destino);
                $actualizar = $this->model->actualizarPlantilla($nombre, $descripcion, $objetivo, $requisitos, $nombre_nuevo, $id);
                if ($actualizar == 1) {
                    $alert =  'modificado';
                } else {
                    $alert = 'error';
                }
            } else {
                $alert = 'modificadoe';
            }
        } else {
            $actualizar = $this->model->actualizarPlantillaNF($nombre, $descripcion, $objetivo, $requisitos, $id);
            if ($actualizar == 1) {
                $alert =  'modificado';
            } else {
                $alert = 'error';
            }
        }
        header("location: " . base_url() . "Practicas/Plantillas?msg=$alert");
        die();
    }

    //Inactiva una plantilla (texto)
    public function Teliminar()
    {
        $id = limpiarInput($_GET['id']);
        $eliminar = $this->model->eliminarPlantilla($id);
        $data1 = $this->model->selectPlantillas();
        $alert =  'inactivo';
        header('location: ' . base_url() . "Practicas/Plantillas?msg=$alert");
        die();
    }

    //Elimina una plantilla (texto)
    public function Teliminarper()
    {
        $id = limpiarInput($_GET['id']);
        $eliminar = $this->model->eliminarperPlantilla($id);
        $data1 = $this->model->selectPlantillas();
        $alert =  'eliminado';
        header('location: ' . base_url() . "Practicas/Eliminado?msg=$alert");
        die();
    }

    //reactiva una plantilla (texto)
    public function Treingresar()
    {
        $id = limpiarInput($_GET['id']);
        $this->model->reingresarPlantilla($id);
        $data1 = $this->model->selectPlantillas();
        $alert =  'reingresar';
        header('location: ' . base_url() . "Practicas/Eliminado?msg=$alert");
        die();
    }

    public function Mplantilla()
    {
        if (isset($_GET['id'])) {
            $id = limpiarInput($_GET['id']);
            $data1 = $this->model->selecPlantillaD($id);
            $data2 = $this->model->selecPlantilla($id);
            $this->model->VaciarDetalle($_SESSION['id']);
            foreach ($data2 as $pl) {
                $data3 = $this->model->detalleProducto($pl['id_producto']);
                $nombre	= $data3['nombre'];
                $cantidad = $pl['cantidad'];
                $precio	= $data3['precio'];
                $total = $cantidad * $precio;
                $id_producto = $data3['id'];
                $id_usuario = $_SESSION['id'];
                $this->model->agregarTemp($nombre, $cantidad, $precio, $total, $id_producto, $id_usuario);
            }
        } else {
            $data1 = [
                "id" => "0",
                "descripcion" => "",
            ];
            $this->model->VaciarDetalle($_SESSION['id']);
        }
        $data3 = $this->model->productos();
        $this->views->getView($this, "Mplantilla", "", $data1, "", $data3);
        die();
    }

    //Ingresa a detalle temporal cotizaciones generadas
    public function ingresar()
    {
        $id = limpiarInput($_POST['id']);
        $nombre = limpiarInput($_POST['nombre']);
        $cantidad = limpiarInput($_POST['cantidad']);
        $id_usuario = limpiarInput($_SESSION['id']);
        $existe = $this->model->verificarProductoexiste($id, $id_usuario);
        if ($existe == "existe" && $cantidad != 0 ) {
            $existe = $this->model->buscarProductoexiste($id, $id_usuario);
            $contar = $this->model->contarProductoexiste($id, $id_usuario);
            $piezas = $cantidad + $contar['cantidad'];
            if ($piezas > 0) {
                $idP = $existe['id'];
                $cant = $existe['cantidad'];
                $cantidad = limpiarInput($_POST['cantidad']) + $cant;
                $this->model->actualizarCantidad($cantidad ,$idP);
                echo "actualizado";
            }else{
                $idP = $existe['id'];
                $this->model->eliminarDetalle($idP);
                echo "eliminado";
            }
        }else{ 
            if ($cantidad > 0){
                $insert = $this->model->insertarDetalle($nombre, $cantidad, $id, $id_usuario);
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
        $this->totalPagar = $this->totalPagar + $detalle['cantidad']; 
        echo "<tr>
                <td>".$detalle['id']."</td>
                <td>".$detalle['codigo']."</td>
                <td>".$detalle['nombre']."</td>
                <td>".$detalle['cantidad'] . "</td>
                <td> <button type='button' data-id='".$detalle['id'] ."' class='btn btn-danger eliminar'>Eliminar</button></td>
            </tr>";
        }
        $tot = number_format($this->totalPagar, 2, ".", "");
        echo "<input type='hidden' id='totalPagar' value='".$tot."'/>";
        die();
    }


    //Registra cotizacion sin descontar stock
    public function registrar()
    {
        $descripcion = limpiarInput($_POST['descripcion']);
        $id = limpiarInput($_POST['id']);
        $total = limpiarInput($_POST['total']);
        if ($id != 0) {
            $data = $this->model->editarCotizacion($descripcion, $total, $id);
            $reset = $this->model->borrarDetalle($id);
            $productos = $this->model->verificarProductos($_SESSION['id']);
            foreach ($productos as $data) {
                $insertar = $this->model->registrarDetalle($id, $data['id_producto'], $data['cantidad'], $_SESSION['id']);
            }
        } else {
            $this->model->registrarSalida($descripcion, $total);
            $data = $this->model->buscaridC();
            $result = $data['MAX(id)'];
            $productos = $this->model->verificarProductos($_SESSION['id']);
            foreach ($productos as $data) {
                $insertar = $this->model->registrarDetalle($result, $data['id_producto'], $data['cantidad'], $_SESSION['id']);
            }
        }
        $this->model->VaciarDetalle($_SESSION['id']);
        die();
    }

    //Datos PDF
    public function ver()
    {
        $id = limpiarInput($_GET['id']);
        $data3 = $this->model->ListaVenta($id);
        $data1 = $this->model->DetalleVenta($id);
        $data2 = $this->model->selectConfiguracion();
        $this->views->getView($this, "VerPlantilla", "", $data1, $data2, $data3);
        die();
    }

    //Inactiva una plantilla (materiales)
    public function Meliminar()
    {
        $id = limpiarInput($_GET['id']);
        $eliminar = $this->model->eliminarPlantillaM($id);
        $data1 = $this->model->selectPlantillasM();
        $alert =  'inactivoM';
        header('location: ' . base_url() . "Practicas/Plantillas?msg=$alert");
        die();
    }

    //Elimina una plantilla (materiales)
    public function Meliminarper()
    {
        $id = limpiarInput($_GET['id']);
        $eliminar = $this->model->eliminarperPlantillaM($id);
        $data1 = $this->model->selectPlantillasM();
        $alert =  'eliminadoM';
        header('location: ' . base_url() . "Practicas/Eliminado?msg=$alert");
        die();
    }

    //reactiva una plantilla (materiales)
    public function Mreingresar()
    {
        $id = limpiarInput($_GET['id']);
        $this->model->reingresarPlantillaM($id);
        $data1 = $this->model->selectPlantillasM();
        $alert =  'reingresarM';
        header('location: ' . base_url() . "Practicas/Eliminado?msg=$alert");
        die();
    }


    //
    //TERMINA PLANTILLAS
    //
    //COMIENZA PRACTICAS

    //Muestra la lista de plantillas. (texto y materiales)
    public function Practicas()
    {
        $data1 = $this->model->selectPracticas();
        $data2 = $this->model->selectPlantillas();
        $data3 = $this->model->selectPlantillasM();
        $data4 = $this->model->selectUsuarios();
        $this->views->getView($this, "Practicas", "", $data1, $data2, $data3, $data4);
        die();
    }

    //Selecciona lo requerido para editar una práctica
    public function Peditar()
    {
        $id = limpiarInput($_GET['id']);
        $data1 = $this->model->selectPractica($id);
        $data2 = $this->model->selectPlantillas();
        $data3 = $this->model->selectPlantillasM();
        $data4 = $this->model->selectUsuarios();
        $this->views->getView($this, "Peditar", "", $data1, $data2, $data3, $data4);
        die();
    }

    //Agrega nueva practica
    public function agregar()
    {
        $nombre = limpiarInput($_POST['nombre']);
        $id_plantilla = limpiarInput($_POST['id_plantilla']);
        $id_plantillam = limpiarInput($_POST['id_plantillam']);
        $id_responsable = limpiarInput($_POST['id_responsable']);
        $fecha_practica = limpiarInput($_POST['fecha_practica']);
        $capacidad = limpiarInput($_POST['capacidad']);
        $Semestre = limpiarInput($_POST['Semestre']);
        $insert = $this->model->insertarPractica($nombre, $id_plantilla, $id_plantillam, $id_responsable, $fecha_practica, $capacidad, $Semestre);
        if ($insert == 'existe') {
            $alert = 'existe';
        } else if ($insert > 0) {
            $alert = 'registrado';
        } else {
            $alert = 'error';
        }
        $data1 = $this->model->selectPlantillas();
        header("location: " . base_url() . "Practicas/Practicas?msg=$alert");
        die();
    }

    //Edita una practica 
    public function Pactualizar()
    {
        $id = limpiarInput($_POST['id']);
        $nombre = limpiarInput($_POST['nombre']);
        $id_plantilla = limpiarInput($_POST['id_plantilla']);
        $id_plantillam = limpiarInput($_POST['id_plantillam']);
        $id_responsable = limpiarInput($_POST['id_responsable']);
        $fecha_practica = limpiarInput($_POST['fecha_practica']);
        $capacidad = limpiarInput($_POST['capacidad']);
        $Semestre = limpiarInput($_POST['Semestre']);
        $insert = $this->model->editarPractica($nombre, $id_plantilla, $id_plantillam, $id_responsable, $fecha_practica, $capacidad, $Semestre, $id);
        $alert = 'modificada';
        $data1 = $this->model->selectPlantillas();
        header("location: " . base_url() . "Practicas/Practicas?msg=$alert");
        die();
    }

    //Muestra la lista de alumnos registrados.
    public function NombrarLista()
    {
        $id = limpiarInput($_GET['id']);
        $data1 = $this->model->asistencia($id);
        $data2 = $this->model->selectPractica($id);
        $this->views->getView($this, "NombrarLista", "", $data1, $data2);
        die();
    }

    //Muestra la lista de alumnos registrados.
    public function editAsistencia()
    {
        $id = limpiarInput($_GET['id']);
        $estado = limpiarInput($_GET['estado']);
        $practica = limpiarInput($_GET['practica']);
        $data1 = $this->model->detalleAlumno($id);
        if ($estado == 1) {
            $estado = 2;
            $asistencia = $data1['asistencias'] + 1;
            $editA = $this->model->editAsistenciaAlum($id, $asistencia);
            $edit = $this->model->editAsistencia($id, $estado);
        } elseif ($estado == 0) {
            $asistencia = $data1['asistencias'] - 1;
            $falta = $data1['faltas'] + 1;
            $editA = $this->model->editAsisFaltAlum($id, $asistencia, $falta);
            $edit = $this->model->editAsistencia($id, $estado);
        } else {
            $asistencia = $data1['asistencias'] + 1;
            $falta = $data1['faltas'] - 1;
            $editA = $this->model->editAsisFaltAlum($id, $asistencia, $falta);
            $edit = $this->model->editAsistencia($id, $estado);
        }
        
        header("location: " . base_url() . "Practicas/NombrarLista?id=$practica");
        die();
    }

    //Muestra la lista de alumnos registrados.
    public function ListaVerificada()
    {
        $estado = limpiarInput($_GET['estado']);
        $practica = limpiarInput($_GET['practica']);
        $edit = $this->model->estadoPractica($practica, $estado);
        $data1 = $this->model->selectPlantillas();
        $alert = "lista";
        header("location: " . base_url() . "Practicas/Practicas?msg=$alert");
        die();
    }

    //Cancela una práctica
    public function Peliminar()
    {
        $estado = limpiarInput($_GET['estado']);
        $practica = limpiarInput($_GET['id']);
        $edit = $this->model->estadoPractica($practica, $estado);
        $data1 = $this->model->selectPlantillas();
        $alert = "cancelada";
        header("location: " . base_url() . "Practicas/Practicas?msg=$alert");
        die();
    }

    //Agrega el material a salida
    public function agregarMateriales()
    {
        $id = limpiarInput($_GET['id']);
        $id_plantilla = limpiarInput($_GET['plantilla']);
        $data1 = $this->model->cuentaAsistencias($id);
        $data2 = $this->model->selecPlantilla($id_plantilla);
        $this->model->VaciarDetalle($_SESSION['id']);
        foreach ($data2 as $pl) {
            $data3 = $this->model->detalleProducto($pl['id_producto']);
            $nombre	= $data3['nombre'];
            $cantidad = $data1['asistencias'] * $pl['cantidad'];
            $precio	= $data3['precio'];
            $total = $cantidad * $precio;
            $id_producto = $data3['id'];
            $id_usuario = $_SESSION['id'];
            $this->model->agregarTemp($nombre, $cantidad, $precio, $total, $id_producto, $id_usuario);
        }
        $edit = $this->model->estadoPractica($id, 3);
        header("location: " . base_url() . "Salidas/Listar?id=".$id);
        die();    
    }
}
?>
