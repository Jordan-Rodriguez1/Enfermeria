<?php
class MaestrosModel extends Mysql{
    public $id, $usuario, $nombre, $correo, $rol, $clave, $estado, $perfil, $asistencias, $faltas;
    public function __construct()
    {
        parent::__construct();
    }

    //Selecciona Alumnos activos
    public function selectProfesores()
    {
        $sql = "SELECT * FROM profesores WHERE estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectMaterias(){
        $sql = "SELECT * FROM materias";
        $res = $this->select_all($sql);
        return $res;
    }

    //selecciona Alumnos inactivos
    public function selectInactivos()
    {
        $sql = "SELECT * FROM profesores WHERE estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }

    //Registra un nuevo Profesor
    public function insertarProfesores(string $nombre, int $usuario, string $materia, int $semestre, int $estado)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->usuario = $usuario;
        $this->materia = $materia;
        $this->semestre = $semestre;  
        $this->estado=$estado;     
        $sql = "SELECT * FROM profesores WHERE usuario = '{$this->usuario}'";
        $result = $this->selecT($sql);
        if (empty($result)) {
            $query = "INSERT INTO profesores(usuario, nombre, materia, semestre, estado) VALUES (?,?,?,?,?)";
            $data = array($this->usuario, $this->nombre, $this->materia, $this->semestre, $this->estado);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }

    //Seleciona los datos de un usuario
    public function editarProfesores(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM profesores WHERE id = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }

    //Edita los datos de un usuario
    public function actualizarProfesores(string $nombre, int $usuario, string $materia, int $semestre, int $id)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->usuario = $usuario;
        $this->materia = $materia;
        $this->semestre = $semestre;
        $this->id = $id;      
        $query = "UPDATE profesores SET nombre=?, usuario=?, materia=?, semestre=? WHERE id=?";
        $data = array($this->nombre, $this->usuario, $this->materia, $this->semestre, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    //cambia de estado un usuario
    public function estadoProfesores(int $id, int $estado)
    {
        $return = "";
        $this->id = $id;
        $this->estado = $estado;
        $query = "UPDATE profesores SET estado = ? WHERE id=?";
        $data = array($this->estado, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

}
?>