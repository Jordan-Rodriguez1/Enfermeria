<?php
class MateriasModel extends Mysql{
    public $id, $usuario, $nombre, $correo, $rol, $clave, $estado, $perfil, $asistencias, $faltas;
    public function __construct()
    {
        parent::__construct();
    }

    //Selecciona Alumnos activos
    public function selectMateria()
    {
        $sql = "SELECT * FROM materias WHERE estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }

    //selecciona Alumnos inactivos
    public function selectInactivos()
    {
        $sql = "SELECT * FROM materias WHERE estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }

    //Registra un nuevo Alumno
    public function insertarMateria(string $nombre)
    {
        $return = "";
        $this->nombre = $nombre;     
        $this->estado = 1;
        $sql = "SELECT * FROM materias WHERE materia = '{$this->nombre}'";
        $result = $this->selecT($sql);
        if (empty($result)) {
            $query = "INSERT INTO materias(materia, estado) VALUES (?,?)";
            $data = array($this->nombre, $this->estado);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }

    //Seleciona los datos de un usuario
    public function editarMaterias(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM materias WHERE id = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }

    //Seleciona los datos de un usuario mediante nombre
    public function editarMateriaC(string $nombre)
    {
        $this->nombre = $nombre;
        $sql = "SELECT * FROM materias WHERE materia = '{$this->nombre}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }

    //Edita los datos de un usuario
    public function actualizarMaterias(string $nombre, int $id)
    {
        $return = "";
        $this->nombre = $nombre;        
        $this->id = $id;        
        $query = "UPDATE materias SET materia=? WHERE id=?";
        $data = array($this->nombre, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    //cambia de estado un usuario
    public function estadoMaterias(int $id, int $estado)
    {
        $return = "";
        $this->id = $id;
        $this->estado = $estado;
        $query = "UPDATE materias SET estado = ? WHERE id=?";
        $data = array($this->estado, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

}
?>