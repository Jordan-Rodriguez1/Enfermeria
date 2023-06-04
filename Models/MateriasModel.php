<?php
class MateriasModel extends Mysql{
    public $id, $usuario, $nombre, $correo, $rol, $clave, $estado, $perfil, $asistencias, $faltas;
    public function __construct()
    {
        parent::__construct();
    }

    //Selecciona Alumnos activos
    public function selectAlumnos()
    {
        $sql = "SELECT * FROM alumnos WHERE estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }

    //selecciona Alumnos inactivos
    public function selectInactivos()
    {
        $sql = "SELECT * FROM alumnos WHERE estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }

    //Registra un nuevo Alumno
    public function insertarAlumnos(string $nombre, string $usuario, string $clave, string $correo, string $grado, string $grupo)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->correo = $correo;
        $this->grado = $grado;
        $this->grupo = $grupo;
        $sql = "SELECT * FROM alumnos WHERE correo = '{$this->correo}'";
        $result = $this->selecT($sql);
        if (empty($result)) {
            $query = "INSERT INTO alumnos(nombre, usuario, clave, correo, grado, grupo) VALUES (?,?,?,?,?,?)";
            $data = array($this->nombre, $this->usuario, $this->clave, $this->correo, $this->grado, $this->grupo);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }

    //Seleciona los datos de un usuario
    public function editarAlumnos(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM alumnos WHERE id = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }

    //Seleciona los datos de un usuario mediante correo
    public function editarAlumnoC(string $correo)
    {
        $this->correo = $correo;
        $sql = "SELECT * FROM alumnos WHERE correo = '{$this->correo}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }

    //Edita los datos de un usuario
    public function actualizarAlumnos(string $nombre, string $usuario, string $asistencias, string $faltas, int $id, string $correo, string $grado, string $grupo)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->usuario = $usuario;
        $this->asistencias = $asistencias;
        $this->faltas = $faltas;
        $this->id = $id;
        $this->correo = $correo;
        $this->grado = $grado;
        $this->grupo = $grupo;
        $query = "UPDATE alumnos SET nombre=?, usuario=?, asistencias=?, faltas=?, correo=?, grado=?, grupo=? WHERE id=?";
        $data = array($this->nombre, $this->usuario, $this->asistencias, $this->faltas, $this->correo, $this->grado, $this->grupo, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    //cambia de estado un usuario
    public function estadoAlumnos(int $id, int $estado)
    {
        $return = "";
        $this->id = $id;
        $this->estado = $estado;
        $query = "UPDATE alumnos SET estado = ? WHERE id=?";
        $data = array($this->estado, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

}
?>