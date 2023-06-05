<?php
class DashboardModel extends Mysql{
    public function __construct()
    {
        parent::__construct();
    }

    public function practicas(int $grado)
    {
        $this->grado = $grado;
        $sql = "SELECT practicas.semestre, practicas.id, practicas.nombre, plantillas.descripcion, practicas.capacidad FROM practicas, plantillas WHERE practicas.estado = 1 AND practicas.semestre = '{$this->grado}' AND practicas.id_plantilla = plantillas.id";
        $res = $this->select_all($sql);
        return $res;
    }

    public function detallePracticas(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM practicas WHERE estado = 1 AND id = '{$this->id}'";
        $res = $this->select($sql);
        return $res;
    }

    public function detallePlantilla(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM plantillas WHERE id = '{$this->id}'";
        $res = $this->select($sql);
        return $res;
    }

    public function detalleProfesor(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM usuarios WHERE id = '{$this->id}'";
        $res = $this->select($sql);
        return $res;
    }

    public function AlumnoPractica(int $id, int $alumno)
    {
        $this->id = $id;
        $this->alumno = $alumno;
        $sql = "SELECT id FROM asistencias WHERE id_practica = '{$this->id}' AND id_alumno = '{$this->alumno}'";
        $res = $this->select($sql);
        return $res;
    } 

    public function CuentaAlumnos(int $id)
    {
        $this->id = $id;
        $sql = "SELECT COUNT(*) AS total FROM asistencias WHERE id_practica = '{$this->id}'";
        $res = $this->select($sql);
        return $res;
    } 

    public function registrarPractica(int $id, int $alumno)
    {
        $return = "";
        $this->id = $id;
        $this->alumno = $alumno;
        $query = "INSERT INTO asistencias (id_practica, id_alumno) VALUES (?,?)";
        $data = array($this->id, $this->alumno);
        $resul = $this->insert($query, $data);
        $return = $resul;
        return $return;
    }

    public function SumarAsistencia(int $id, int $total)
    {
        $return = "";
        $this->id = $id;
        $this->total = $total;
        $query = "UPDATE practicas SET registros = ? WHERE id = ?";
        $data = array($this->total, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    public function config(string $grado)
    {
        $this->grado = $grado;
        $sql = "SELECT * FROM configsemestre WHERE id = '{$this->grado}'";
        $res = $this->select($sql);
        return $res;
    }

    public function Historial(int $id)
    {
        $this->id = $id;
        $sql = "SELECT  practicas.id, practicas.nombre, practicas.fecha_practica, asistencias.asistencia, asistencias.id_alumno FROM practicas, asistencias WHERE practicas.id = asistencias.id_practica AND id_alumno = '{$this->id}'";
        $res = $this->select_all($sql);
        return $res;
    } 
}
?>
