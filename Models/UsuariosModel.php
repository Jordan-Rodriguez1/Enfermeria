<?php
class UsuariosModel extends Mysql{
    public $id, $usuario, $nombre, $correo, $rol, $clave, $estado, $perfil;
    public function __construct()
    {
        parent::__construct();
    }

    //Selecciona usuarios activos
    public function selectUsuarios()
    {
        $sql = "SELECT * FROM usuarios WHERE estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }

    //selecciona usuarios inactivos
    public function selectInactivos()
    {
        $sql = "SELECT * FROM usuarios WHERE estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }

    //Registra un nuevo usuario
    public function insertarUsuarios(string $nombre, string $usuario, string $clave, string $rol, string $correo)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->rol = $rol;
        $this->correo = $correo;
        $sql = "SELECT * FROM usuarios WHERE correo = '{$this->correo}'";
        $result = $this->selecT($sql);
        if (empty($result)) {
            $query = "INSERT INTO usuarios(nombre, usuario, clave, rol, correo) VALUES (?,?,?,?,?)";
            $data = array($this->nombre, $this->usuario, $this->clave, $this->rol, $this->correo);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }

    //Seleciona los datos de un usuario
    public function editarUsuarios(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM usuarios WHERE id = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }

    //Seleciona los datos de un usuario mediante correo
    public function editarUsuariosC(string $correo)
    {
        $this->correo = $correo;
        $sql = "SELECT * FROM usuarios WHERE correo = '{$this->correo}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }

    //Edita los datos de un usuario
    public function actualizarUsuarios(string $nombre, string $usuario, string $rol, int $id, string $correo)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->usuario = $usuario;
        $this->rol = $rol;
        $this->id = $id;
        $this->correo = $correo;
        $query = "UPDATE usuarios SET nombre=?, usuario=?, rol=?, correo=? WHERE id=?";
        $data = array($this->nombre, $this->usuario, $this->rol, $this->correo, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    //cambia de estado un usuario
    public function eliminarUsuarios(int $id, int $estado)
    {
        $return = "";
        $this->id = $id;
        $this->estado = $estado;
        $query = "UPDATE usuarios SET estado = ? WHERE id=?";
        $data = array($this->estado, $this->id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    //Validad contraseña de usuario
    public function selectUsuario(string $usuario, string $clave)
    {
        $this->usuario = $usuario;
        $this->clave = $clave;
        $sql = "SELECT * FROM usuarios WHERE correo = '{$this->usuario}' AND clave = '{$this->clave}' AND estado=1";
        $res = $this->select($sql);
        return $res;
    }

    //reingresa un usuario
    public function reingresarUsuarios(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "UPDATE usuarios SET estado = 1 WHERE id=?";
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
        $query = "SELECT * FROM usuarios WHERE clave = '$clave' AND id = '$id'";
        $resul = $this->select($query);
        return $resul;
    }

    //cambia contraseña actual
    public function cambiarContra(string $clave, int $id)
    {
        $this->clave = $clave;
        $this->id = $id;
        $query = "UPDATE usuarios SET clave = ? WHERE id = ?";
        $data = array($this->clave, $this->id);
        $resul = $this->update($query, $data);
        return $resul;
    }

    //cambia ruta de imagen cargada
    public function img (string $perfil, int $id)
    {
        $this->perfil = $perfil;
        $this->id = $id;
        $query = "UPDATE usuarios SET perfil = ? WHERE id = ?";
        $data = array($this->perfil, $this->id);
        $resul = $this->update($query, $data);
        return $resul;
    }
}
?>