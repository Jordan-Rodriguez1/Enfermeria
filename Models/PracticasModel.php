<?php
class PracticasModel extends Mysql{
    public $id, $id_venta, $descripcion, $producto, $cantidad, $precio, $id_producto ,$id_usuario, $total, $id_responsable, $id_generador, $fecha, $estado, $formato;
    public function __construct()
    {
        parent::__construct();
    }

    //Selecciona la lista de plantillas (texto)
    public function selectPlantillas()
    {
        $sql = "SELECT * FROM plantillas WHERE estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }

    //Selecciona la lista de plantillas (materiales)
    public function selectPlantillasM()
    {
        $sql = "SELECT * FROM cotizaciones WHERE estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }

    //Agrega nueva plantilla (texto)
    public function insertarPlantilla(String $nombre, string $descripcion, string $objetivo, string $requisitos, string $archivo)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->objetivo = $objetivo;
        $this->requisitos = $requisitos;
        $this->archivo = $archivo;
        $sql = "SELECT * FROM plantillas WHERE nombre = '{$this->nombre}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO plantillas(nombre, descripcion, objetivo, requisitos, formato) VALUES (?,?,?,?,?)";
            $data = array($this->nombre, $this->descripcion, $this->objetivo, $this->requisitos, $this->archivo);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }

    //Selecciona las plantillas (texto) inactivas
    public function selecPlantillasInactivas()
    {
        $sql = "SELECT * FROM plantillas WHERE estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }

    //Selecciona las plantillas (materiales) inactivas
    public function selecPlantillasMInactivas()
    {
        $sql = "SELECT * FROM cotizaciones WHERE estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }

    //Selecciona las plantillas (texto) a editar
    public function editarPlantillas(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM plantillas WHERE id = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }

    //Actualiza las plantillas (texto) con formato
    public function actualizarPlantilla(String $nombre, string $descripcion, string $objetivo, string $requisitos, string $archivo, int $id)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->objetivo = $objetivo;
        $this->requisitos = $requisitos;
        $this->archivo = $archivo;
        $this->id = $id;
        $query = "UPDATE plantillas SET nombre=?, descripcion=?, objetivo=?, requisitos=?, formato=? WHERE id=?";
        $data = array($this->nombre, $this->descripcion, $this->objetivo, $this->requisitos, $this->archivo, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    //Actualiza las plantillas (texto) sin formato
    public function actualizarPlantillaNF(String $nombre, string $descripcion, string $objetivo, string $requisitos, int $id)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->objetivo = $objetivo;
        $this->requisitos = $requisitos;
        $this->archivo = $archivo;
        $this->id = $id;
        $query = "UPDATE plantillas SET nombre=?, descripcion=?, objetivo=?, requisitos=? WHERE id=?";
        $data = array($this->nombre, $this->descripcion, $this->objetivo, $this->requisitos, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    

    //Cambia el estado de las plantillas (texto) a inactiva
    public function eliminarPlantilla(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE plantillas SET estado = 0 WHERE id=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    //Elimina las plantillas (texto) seleccionada (Solo se cambia de estado por fines de errores)
        public function eliminarperPlantilla(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE plantillas SET estado = 2 WHERE id=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    //Cambia el estado de las plantillas (texto) a activo
    public function reingresarPlantilla(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE plantillas SET estado = 1 WHERE id=?";
        $data = array($this->id);
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
    public function actualizarCantidad(int $cantidad, int $id)
    {
        $this->cantidad = $cantidad;
        $this->id = $id;
        $query = "UPDATE detalle_temp SET cantidad =? WHERE id =?";
        $data = array($this->cantidad ,$this->id);
        $resul = $this->update($query, $data);
        return $resul;
    }

    //Elimina 1 campo de detalle venta
    public function eliminarDetalle(int $id)
    {
        $this->id = $id;
        $sql = "DELETE FROM detalle_temp WHERE id = $id";
        $resul = $this->delete($sql);
    }

    //Agrega productos a detalle
    public function insertarDetalle(String $nombre, string $cantidad, string $id_producto ,string $id_usuario)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->cantidad = $cantidad;
        $this->id_producto = $id_producto;
        $this->id_usuario = $id_usuario;

            $query = "INSERT INTO detalle_temp(nombre, cantidad, id_producto ,id_usuario) VALUES (?,?,?,?)";
            $data = array($this->nombre,$this->cantidad, $this->id_producto,$this->id_usuario);
            $resul = $this->insert($query, $data);
            $return = $resul;
        return $return;
    }

    //Selecciona el detalle que se muestra en el carrito
    public function selectDetalle()
    {
        $sql = "SELECT detalle_temp.nombre, detalle_temp.cantidad, productos.codigo, detalle_temp.id_usuario, detalle_temp.estado, detalle_temp.id FROM detalle_temp, productos WHERE detalle_temp.id_producto = productos.id AND id_usuario = $_SESSION[id]";
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
        $sql = "SELECT MAX(id) from cotizaciones";
        $res = $this->select($sql);
        return $res;
    }

    //Registra la venta
    public function registrarSalida(String $descripcion, String $total)
    {
        $return = "";
        $this->descripcion = $descripcion;
        $this->total = $total;
        $query = "INSERT INTO cotizaciones(descripcion, total) VALUES (?,?)";
        $data = array($this->descripcion, $this->total);
        $resul = $this->insert($query, $data);
        $return = $resul;
        return $return;
    }

    //Registra el detalle de venta
    public function registrarDetalle(String $id_venta ,string $id_producto, string $cantidad, $id_usuario)
    {
        $return = "";
        $this->id_venta = $id_venta;
        $this->id_producto = $id_producto;
        $this->cantidad = $cantidad;
        $this->id_usuario = $id_usuario;
        $query = "INSERT INTO detalle_coti(id_cotizacion, id_producto, cantidad, id_usuario) VALUES (?,?,?,?)";
        $data = array($this->id_venta, $this->id_producto, $this->cantidad, $this->id_usuario);
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
        $sql = "SELECT productos.nombre, detalle_coti.cantidad, productos.codigo, detalle_coti.id_producto FROM detalle_coti, productos WHERE detalle_coti.id_producto = productos.id AND id_cotizacion = $id";
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
        $sql = "SELECT * FROM cotizaciones WHERE id = $id";
        $res = $this->select($sql);
        return $res;
    }

//AAAAAAA
    //Selecciona las plantillas (materiales) a editar
    public function editarPlantillasM(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM cotizaciones WHERE id = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }

    public function editarPlantillaM(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM detalle_coti WHERE id_cotizacion = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }


    //Actualiza las plantillas (materiales) con formato
    public function actualizarPlantillaM(String $nombre, string $descripcion, string $objetivo, string $requisitos, string $archivo, int $id)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->objetivo = $objetivo;
        $this->requisitos = $requisitos;
        $this->archivo = $archivo;
        $this->id = $id;
        $query = "UPDATE cotizaciones SET nombre=?, descripcion=?, objetivo=?, requisitos=?, formato=? WHERE id=?";
        $data = array($this->nombre, $this->descripcion, $this->objetivo, $this->requisitos, $this->archivo, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    
    //Cambia el estado de las plantillas (materiales) a inactiva
    public function eliminarPlantillaM(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE cotizaciones SET estado = 0 WHERE id=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    //Elimina las plantillas (materiales) seleccionada (Solo se cambia de estado por fines de errores)
        public function eliminarperPlantillaM(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE cotizaciones SET estado = 2 WHERE id=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    //Cambia el estado de las plantillas (materiales) a activo
    public function reingresarPlantillaM(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE cotizaciones SET estado = 1 WHERE id=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    //
    //TERMINA PLANTILLAS
    //
    //COMIENZA PRACTICAS

    //Selecciona la lista de practicas
    public function selectPracticas()
    {
        $sql = "SELECT * FROM practicas";
        $res = $this->select_all($sql);
        return $res;
    }

    //Agrega nueva plantilla (texto)
    public function insertarPractica(String $nombre, int $id_plantilla, int $id_plantillam, int $id_responsable, string $fecha_practica, int $capacidad, int $Semestre)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->id_plantilla = $id_plantilla;
        $this->id_plantillam = $id_plantillam;
        $this->id_responsable = $id_responsable;
        $this->fecha_practica = $fecha_practica;
        $this->capacidad = $capacidad;
        $this->Semestre = $Semestre;
        $query = "INSERT INTO practicas(nombre, id_plantilla, id_plantillam, id_responsable, fecha_practica, capacidad, semestre) VALUES (?,?,?,?,?,?,?)";
        $data = array($this->nombre, $this->id_plantilla, $this->id_plantillam, $this->id_responsable, $this->fecha_practica, $this->capacidad, $this->Semestre);
        $resul = $this->insert($query, $data);
        $return = $resul;
        return $return;
    }

    //Agrega nueva plantilla (texto)
    public function editarPractica(String $nombre, int $id_plantilla, int $id_plantillam, int $id_responsable, string $fecha_practica, int $capacidad, int $Semestre, int $id)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->id_plantilla = $id_plantilla;
        $this->id_plantillam = $id_plantillam;
        $this->id_responsable = $id_responsable;
        $this->fecha_practica = $fecha_practica;
        $this->capacidad = $capacidad;
        $this->Semestre = $Semestre;
        $this->id = $id;
        $query = "UPDATE practicas SET nombre=?, id_plantilla=?, id_plantillam=?, id_responsable=?, fecha_practica=?, capacidad=?, semestre=? WHERE id=?";
        $data = array($this->nombre, $this->id_plantilla, $this->id_plantillam, $this->id_responsable, $this->fecha_practica, $this->capacidad, $this->Semestre, $this->id);
        $resul = $this->insert($query, $data);
        $return = $resul;
        return $return;
    }

    //Selecciona la lista de usuarios
    public function selectUsuarios()
    {
        $sql = "SELECT * FROM usuarios WHERE estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }

    //Selecciona la lista de alumnos registrados con los nombres
    public function asistencia(int $id)
    {
        $this->id = $id;
        $sql = "SELECT asistencias.id, asistencias.asistencia, u1.nombre as id_alumnos FROM asistencias 
                JOIN alumnos u1 ON asistencias.id_alumno = u1.id WHERE asistencias.id_practica = '{$this->id}'";
        $res = $this->select_all($sql);
        return $res;
    }

    //Cambia el estado de la asistencia
    public function editAsistencia(int $id, int $estado)
    {
        $return = "";
        $this->id = $id;
        $this->estado = $estado;
        $query = "UPDATE asistencias SET asistencia = ? WHERE id=?";
        $data = array($this->estado,$this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    //Cambia el estado de la asistencia en alumnos
    public function editAsistenciaAlum(int $id, int $asistencias)
    {
        $return = "";
        $this->id = $id;
        $this->asistencias = $asistencias;
        $query = "UPDATE alumnos SET asistencias = ? WHERE id=?";
        $data = array($this->asistencias,$this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    //Cambia el estado de la asistencia y falta en alumnos
    public function editAsisFaltAlum(int $id, int $asistencias, int $faltas)
    {
        $return = "";
        $this->id = $id;
        $this->asistencias = $asistencias;
        $this->faltas = $faltas;
        $query = "UPDATE alumnos SET asistencias = ?, faltas = ? WHERE id=?";
        $data = array($this->asistencias, $this->faltas, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    //Cambia el estado de la practica
    public function estadoPractica(int $id, int $estado)
    {
        $return = "";
        $this->id = $id;
        $this->estado = $estado;
        $query = "UPDATE practicas SET estado = ? WHERE id=?";
        $data = array($this->estado,$this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    //Selecciona los datos de una práctica
    public function selectPractica(int $id)
    {
        $return = "";
        $this->id = $id;
        $sql = "SELECT * FROM practicas WHERE id = '{$this->id}'";
        $res = $this->select($sql);
        return $res;
    }

    //Selecciona los datos de un alumno
    public function detalleAlumno(int $id)
    {
        $return = "";
        $this->id = $id;
        $sql = "SELECT * FROM alumnos WHERE id = '{$this->id}'";
        $res = $this->select($sql);
        return $res;
    }

    //cuenta asistencias
    public function cuentaAsistencias(int $id)
    {
        $this->id = $id;
        $sql = "SELECT COUNT(*) AS asistencias FROM asistencias WHERE id_practica = '{$this->id}'";
        $res = $this->select($sql);
        return $res;
    }

    //Selecciona plantilla materiales
    public function selecPlantilla(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM detalle_coti WHERE id_cotizacion = '{$this->id}'";
        $res = $this->select_all($sql);
        return $res;
    }

    //Selecciona detalle de materiales
    public function detalleProducto(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM productos WHERE id = '{$this->id}'";
        $res = $this->select($sql);
        return $res;
    }

    //Agrega detalle materiales
    public function agregarTemp(string $nombre, float $cantidad, float $precio, float $total, int $id_producto, int $id_usuario)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->total = $total;
        $this->id_producto = $id_producto;
        $this->id_usuario = $id_usuario;
        $query = "INSERT INTO detalle_temp(nombre, cantidad, precio, total, id_producto, id_usuario) VALUES (?,?,?,?,?,?)";
        $data = array($this->nombre, $this->cantidad, $this->precio, $this->total, $this->id_producto, $this->id_usuario);
        $resul = $this->insert($query, $data);
        $return = $resul;
        return $return;
    }

}
?>

