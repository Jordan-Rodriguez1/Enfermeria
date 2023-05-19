<?php
class EjemploModel extends Mysql{ //El archivo se debe llamar igual que el controller + MODEL
    public $id, $usuario, $nombre, $correo, $rol, $clave, $estado, $perfil; //Aquí van las variables que están en la base de datos, podemos dejarlas en blanco pero ponerlas aquí facilita el trabajo
    public function __construct()
    {
        parent::__construct();
    }

    //Se pueden hacer 5 tipo de consultas

    //Selecciona usuarios
    public function selectUsuarios()
    {
        $sql = "SELECT * FROM usuarios";
        $res = $this->select_all($sql); //select_all es para seleccionar cuando el resultado puede arrojar muchas filas
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
        $query = "INSERT INTO usuarios(nombre, usuario, clave, rol, correo) VALUES (?,?,?,?,?)";
        $data = array($this->nombre, $this->usuario, $this->clave, $this->rol, $this->correo);
        $resul = $this->insert($query, $data); //insert es para agregar un registro
        return $resul;
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
        $resul = $this->update($query, $data); //Update es para actualizar un registro
        $return = $resul;
        return $return;
    }

    //Validad contraseña de usuario
    public function selectUsuario(string $usuario, string $clave)
    {
        $this->usuario = $usuario;
        $this->clave = $clave;
        $sql = "SELECT * FROM usuarios WHERE correo = '{$this->usuario}' AND clave = '{$this->clave}' AND estado=1";
        $res = $this->select($sql); //selectç es para seleccionar cuando el resultado solo arroja una fila
        return $res;
    }

    //Elimina los datos de un usuario
    public function eliminarUsuarios(int $id)
    {
        $return = "";
        $this->id = $id;
        $query = "DELETE usuarios WHERE id= '{$this->id}'";
        $resul = $this->delate($query); //DELATE es para ELIMINAR un registro
        $return = $resul;
        return $return;
    }

}
?>