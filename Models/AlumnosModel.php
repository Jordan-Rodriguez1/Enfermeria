<?php
class AlumnosModel extends Mysql{
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
    public function insertarAlumnos(string $nombre, string $usuario, string $clave, string $correo)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->correo = $correo;
        $sql = "SELECT * FROM alumnos WHERE usuario = '{$this->usuario}'";
        $result = $this->selecT($sql);
        if (empty($result)) {
            $query = "INSERT INTO alumnos(nombre, usuario, clave, correo) VALUES (?,?,?,?)";
            $data = array($this->nombre, $this->usuario, $this->clave, $this->correo);
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

    //Edita los datos de un usuario
    public function actualizarAlumnos(string $nombre, string $usuario, string $asistencias, string $faltas, int $id, string $correo)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->usuario = $usuario;
        $this->asistencias = $asistencias;
        $this->faltas = $faltas;
        $this->id = $id;
        $this->correo = $correo;
        $query = "UPDATE alumnos SET nombre=?, usuario=?, asistencias=?, faltas=?, correo=? WHERE id=?";
        $data = array($this->nombre, $this->usuario, $this->asistencias, $this->faltas, $this->correo, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    //cambia de estado un usuario
    public function eliminarAlumnos(int $id, int $estado)
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

    //Validad contraseña de usuario
    public function selectAlumno(string $usuario, string $clave)
    {
        $this->usuario = $usuario;
        $this->clave = $clave;
        $sql = "SELECT * FROM alumnos WHERE correo = '{$this->usuario}' AND clave = '{$this->clave}' AND estado=1";
        $res = $this->select($sql);
        return $res;
    }

    //reingresa un Alumnos
    public function reingresarAlumnos(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE alumnos SET estado = 1 WHERE id=?";
        $data = array($this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    //verifica contraseña actual para cambiarla
    public function verificarPass(string $clave, int $id)
    {
        $this->clave = $clave;
        $this->id = $id;
        $query = "SELECT * FROM alumnos WHERE clave = '$clave' AND id = '$id'";
        $resul = $this->select($query);
        return $resul;
    }

    //cambia contraseña actual
    public function cambiarContra(string $clave, int $id)
    {
        $this->clave = $clave;
        $this->id = $id;
        $query = "UPDATE alumnos SET clave = ? WHERE id = ?";
        $data = array($this->clave, $this->id);
        $resul = $this->update($query, $data);
        return $resul;
    }

    //cambia ruta de imagen cargada
    public function img (string $perfil, int $id)
    {
        $this->perfil = $perfil;
        $this->id = $id;
        $query = "UPDATE alumnos SET perfil = ? WHERE id = ?";
        $data = array($this->perfil, $this->id);
        $resul = $this->update($query, $data);
        return $resul;
    }
}
?>