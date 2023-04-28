<?php
class Usuarios extends Controllers
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: ".base_url());
        }
        parent::__construct();
    }

    //Vista de usuarios
    public function Listar()
    {
        $data1 = $this->model->selectUsuarios();
        $this->views->getView($this, "Listar", "", $data1);
    }

    //Añade un nuevo usuario
    public function insertar()
    {
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $correo = $_POST['correo'];
        $clave = $_POST['clave'];
        $rol = $_POST['rol'];
        $confirmar = $_POST['confirmar'];
        $hash = hash("SHA256", $clave);
        if ($clave != $confirmar) {
            $alert = 'nocoincide';
        } else {
            $insert = $this->model->insertarUsuarios($nombre, $usuario, $hash, $rol, $correo);
            if ($insert == 'existe') {
                $alert = 'existe';
            } else if ($insert > 0) {
                $alert = 'registrado';
            } else {
                $alert = 'error';
            }
        }
        $data1 = $this->model->selectUsuarios(); 
        header("location: " . base_url() . "Usuarios/Listar?msg=$alert");
        die();   
    }

    //Seleciona los datos de un Usuario
    public function editar()
    {
        $id = $_GET['id'];
        $data1 = $this->model->editarUsuarios($id);
        if ($data1 == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar","", $data1);
        }
    }

    //Actualiza los datos de un Usuario
    public function actualizar()
    {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $rol = $_POST['rol'];
        $correo = $_POST['correo'];
        $actualizar = $this->model->actualizarUsuarios($nombre, $usuario, $rol, $id, $correo);     
            if ($actualizar == 1) {
                $alert = 'modificado';
            } else {
                $alert =  'error';
            }
        header("location: " . base_url() . "Usuarios/Listar?msg=$alert");
        die();
    }

    //Inactiva los datos de un Usuario
    public function eliminar()
    {
        $id = $_GET['id'];
        $estado = 0;
        $eliminar = $this->model->eliminarUsuarios($id, $estado);
        $alert = 'inactivo';
        $data1 = $this->model->selectUsuarios();
        header("location: " . base_url() . "Usuarios/Listar?msg=$alert");
        die();
    }

    //elimina un usuario (Solo se cambia de estado para no alterar pdf de reportes)
    public function eliminarper()
    {
        $id = $_GET['id'];
        $estado = 2;
        $eliminar = $this->model->eliminarUsuarios($id, $estado);
        $data = $this->model->selectUsuarios();
        $alert =  'eliminado';
        $data1 = $this->model->selectUsuarios(); 
        header("location: " . base_url() . "Usuarios/eliminados?msg=$alert");
        die();
    }

    //Consulta los usuarios inactivos
    public function eliminados()
    {
        $data1 = $this->model->selectInactivos();
        $this->views->getView($this, "Eliminados", "", $data1);      
    }

    //Reactiva los datos de un Usuario
    public function reingresar()
    {
        $id = $_GET['id'];
        $this->model->reingresarUsuarios($id);
        $this->model->selectUsuarios();
        $data1 = $this->model->selectUsuarios(); 
        header('location: ' . base_url() . "Usuarios/eliminados?msg=$alert");
        die();
    }

    //Iniciar sesión
    public function login()
    {
        if (!empty($_POST['usuario']) || !empty($_POST['clave'])) {
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];
            $hash = hash("SHA256", $clave);
            $data = $this->model->selectUsuario($usuario, $hash);
            if (!empty($data)) {
                    $_SESSION['id'] = $data['id'];
                    $_SESSION['nombre'] = $data['nombre'];
                    $_SESSION['correo'] = $data['correo'];
                    $_SESSION['usuario'] = $data['usuario'];
                    $_SESSION['rol'] = $data['rol'];
                    $_SESSION['perfil'] = $data['perfil'];
                    $_SESSION['activo'] = true;
                    header('location: '.base_url(). 'Dashboard/Listar');
            } else {
                $error = 0;
                header("location: ".base_url()."?msg=$error");
            }
        }
    }

    //Cambiar contraseña
    public function cambiar()
    {

        $hash = hash("SHA256", $_POST['actual']);
        $nuevahash = hash("SHA256", $_POST['nueva']);
        $nueva = $_POST['nueva'];
        $confirmar = $_POST['confirmar'];
        if ($nueva == $confirmar) {
            $data = $this->model->verificarPass($hash, $_SESSION['id']);
            if ($data != null) {
                $this->model->cambiarContra($nuevahash, $_SESSION['id']);
                $alert =  'cambio';
            }  else{
                $alert =  'error';
            }
        } else {
            $alert =  'noigual';
        }
        header('location: ' . base_url() . "Dashboard/Listar?msg=$alert");  
    }

    //Cambiar Imagen Perfil
    public function cambiarpic()
    {
        $nombre_archivo = $_FILES["archivo"]["name"];
        $tipo_archivo = $_FILES["archivo"]["type"];
        $tamano_archivo = $_FILES["archivo"]["size"];
        $ruta_temporal = $_FILES["archivo"]["tmp_name"];
        $error_archivo = $_FILES["archivo"]["error"];
        if ($error_archivo == UPLOAD_ERR_OK) {
            $ruta_destino = "Assets/img/perfiles/".$nombre_archivo;
            if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
            $id = $_SESSION['id'];
            $this->model->img($nombre_archivo, $id);
               $alert =  'registrado';
            } else {
               $alert =  'noimagen';
            }
        } else {
        $alert =  'noimagen';
        }
        header('location: ' . base_url() . "Dashboard/Listar?msg=$alert");
    }

    //Cerrar Sesión
    public function salir()
    {
        session_destroy();
        header("Location: ".base_url());
    }
}
?>