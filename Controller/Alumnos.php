<?php
class Alumnos extends Controllers
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: ".base_url());
        }
        parent::__construct();
    }

    //Vista de Alumnos
    public function Listar()
    {
        $data1 = $this->model->selectAlumnos();
        $data2 = $this->model->configuracion();
        $this->views->getView($this, "Listar", "", $data1, $data2);
        die();  
    }

    //Añade un nuevo Alumno
    public function insertar()
    {
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $correo = $_POST['correo'];
        $clave = $_POST['usuario']; //Por defecto se pone el no.cuenta
        $grado = $_POST['grado'];
        $grupo = $_POST['grupo'];
        $hash = hash("SHA256", $clave);
        $insert = $this->model->insertarAlumnos($nombre, $usuario, $hash, $correo, $grado, $grupo);
        if ($insert == 'existe') {
            $data1 = $this->model->editarAlumnoC($correo);
            if ($data1['estado'] == 2) {
                $asistencias = 0;
                $faltas = 0;
                $estado = 1;
                $id = $data1['id'];
                $actualizar = $this->model->actualizarAlumnos($nombre, $usuario, $asistencias, $faltas, $id, $correo, $grado, $grupo);
                $cambio =$this->model->cambiarContra($hash, $id);
                $eliminar = $this->model->estadoAlumnos($id, $estado);
                    if ($actualizar == 1) {
                        $alert = 'registrado';
                    } else {
                        $alert =  'error';
                    }
            } else {
                $alert = 'existe';
            }
        } else if ($insert > 0) {
            $alert = 'registrado';
        } else {
            $alert = 'error';
        }
        $data1 = $this->model->selectAlumnos(); 
        header("location: " . base_url() . "Alumnos/Listar?msg=$alert");
        die();   
    }

    //Seleciona los datos de un Alumno
    public function editar()
    {
        $id = $_GET['id'];
        $data1 = $this->model->editarAlumnos($id);
        $data2 = $this->model->configuracion();
        if ($data1 == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar","", $data1, $data2);
        }
        die();  
    }

    //Actualiza los datos de un Alumno
    public function actualizar()
    {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $asistencias = $_POST['asistencias'];
        $faltas = $_POST['faltas'];
        $correo = $_POST['correo'];
        $grado = $_POST['grado'];
        $grupo = $_POST['grupo'];
        $actualizar = $this->model->actualizarAlumnos($nombre, $usuario, $asistencias, $faltas, $id, $correo, $grado, $grupo);     
            if ($actualizar == 1) {
                $alert = 'modificado';
            } else {
                $alert =  'error';
            }
        header("location: " . base_url() . "Alumnos/Listar?msg=$alert");
        die();
    }

    //Inactiva los datos de un Alumno
    public function eliminar()
    {
        $id = $_GET['id'];
        $estado = 0;
        $eliminar = $this->model->estadoAlumnos($id, $estado);
        $alert = 'inactivo';
        $data1 = $this->model->selectAlumnos();
        header("location: " . base_url() . "Alumnos/Listar?msg=$alert");
        die();
    }

    //elimina un usuario (Solo se cambia de estado para no alterar pdf de reportes)
    public function eliminarper()
    {
        $id = $_GET['id'];
        $estado = 2;
        $eliminar = $this->model->estadoAlumnos($id, $estado);
        $alert =  'eliminado';
        $data1 = $this->model->selectAlumnos(); 
        header("location: " . base_url() . "Alumnos/eliminados?msg=$alert");
        die();
    }

    //SUBE DE GRADO A TODOS LOS ALUMNOS
    public function subirgrado()
    {
        $data = $this->model->selectAlumnos();
        $config = $this->model->configuracion();
        foreach ($data as $al) {
            $id = $al['id'];
            $grado = $al['grado'] + 1;
            if ($config['semestres'] < $grado) {
                $estado = 0;
                $eliminar = $this->model->estadoAlumnos($id, $estado);
            } else {
                $subir = $this->model->gradoAlumnos($id, $grado);
            }
        }
        $alert =  'subido';
        $data1 = $this->model->selectAlumnos(); 
        header("location: " . base_url() . "Alumnos/Listar?msg=$alert");
        die();
    }
    
    //Reinicia hora A TODOS LOS ALUMNOS
    public function reiniciarhoras()
    {
        $data = $this->model->selectAlumnos();
        foreach ($data as $al) {
            $id = $al['id'];
            $asistencias = 0;
            $faltas = 0;
            $subir = $this->model->reiniciarhoras($id, $asistencias, $faltas);
        }
        $alert =  'horas';
        $data1 = $this->model->selectAlumnos(); 
        header("location: " . base_url() . "Alumnos/Listar?msg=$alert");
        die();
    }

    //elimina (Solo se cambia de estado para no alterar pdf de reportes) A TODOS LOS ALUMNOS
    public function Etodo()
    {
        $data = $this->model->selectInactivos();
        foreach ($data as $al) {
            $id = $al['id'];
            $estado = 2;
            $eliminar = $this->model->estadoAlumnos($id, $estado);
        }
        $alert =  'Etodo';
        $data1 = $this->model->selectInactivos(); 
        header("location: " . base_url() . "Alumnos/eliminados?msg=$alert");
        die();
    }

    //reingresar (Solo se cambia de estado para no alterar pdf de reportes) A TODOS LOS ALUMNOS
    public function Rtodo()
    {
        $data = $this->model->selectInactivos();
        foreach ($data as $al) {
            $id = $al['id'];
            $estado = 1;
            $eliminar = $this->model->estadoAlumnos($id, $estado);
        }
        $alert =  'Rtodo';
        $data1 = $this->model->selectInactivos(); 
        header("location: " . base_url() . "Alumnos/eliminados?msg=$alert");
        die();
    }
    

    //Consulta los Alumno inactivos
    public function eliminados()
    {
        $data1 = $this->model->selectInactivos();
        $this->views->getView($this, "Eliminados", "", $data1);   
        die();     
    }

    //Reactiva los datos de un Usuario
    public function reingresar()
    {
        $id = $_GET['id'];
        $estado = 1;
        $eliminar = $this->model->estadoAlumnos($id, $estado);
        $data1 = $this->model->selectAlumnos(); 
        header('location: ' . base_url() . "Alumnos/eliminados?msg=$alert");
        die();
    }

    //Carga muchos alumnos
    public function subirarchivo()
    {
        $name = pathinfo($_FILES["archivo"]["name"]);
        $tipo_archivo = $_FILES["archivo"]["type"];
        $tamano_archivo = $_FILES["archivo"]["size"];
        $ruta_temporal = $_FILES["archivo"]["tmp_name"];
        $tmaximo = 20 * 1024 * 1024;
        if(($tamano_archivo < $tmaximo && $tamano_archivo != 0) && ($name["extension"] == "csv")){
            $lineas = file($ruta_temporal);
            $i = 0;
            $a = 0; //Agregados
            $e = 0; //Error
            $x = 0; //Ya existen
            foreach (($lineas) as $linea) {
                $cantidad_total = count($lineas);
                $cantidad_agregada = ($cantidad_total - 2);
                if ($i > 1) {
                    $datos = explode(",", $linea);
                    $nombre = $datos[0];
                    $usuario = $datos[1];
                    $correo = $datos[2];
                    $clave = $datos[1]; //Por defecto se pone el no.cuenta
                    $grado = $datos[3];
                    $grupo = $datos[4];
                    if (empty($grupo)) {
                        $grupo = "X";
                    }
                    if (empty($grado)) {
                        $grado = 0;
                    }
                    $hash = hash("SHA256", $clave);
                    if ($nombre != "" && $usuario != "" && $correo != ""){
                        $insert = $this->model->insertarAlumnos($nombre, $usuario, $hash, $correo, $grado, $grupo);
                        if ($insert == 'existe') {
                            $data1 = $this->model->editarAlumnoC($correo);
                            if ($data1['estado'] == 2) {
                                $asistencias = 0;
                                $faltas = 0;
                                $estado = 1;
                                $id = $data1['id'];
                                $actualizar = $this->model->actualizarAlumnos($nombre, $usuario, $asistencias, $faltas, $id, $correo, $grado, $grupo);
                                $cambio =$this->model->cambiarContra($hash, $id);
                                $eliminar = $this->model->estadoAlumnos($id, $estado);
                                    if ($actualizar == 1) {
                                        $a++;
                                    } else {
                                        $e++;
                                    }
                            } else {
                                $x++; 
                            }
                        } else if ($insert > 0) {
                            $a++;
                        } else {
                            $e++;
                        }
                    } else{
                        $e++;
                    }
                }
                $i++;
            }
            $alert = "cargado";
            $data1 = $this->model->selectAlumnos(); 
            header("location: " . base_url() . "Alumnos/Listar?msg=$alert&a=$a&e=$e&x=$x");
        }else{
            $alert = "error";
            $data1 = $this->model->selectAlumnos(); 
            header("location: " . base_url() . "Alumnos/Listar?msg=$alert");
        }
        die();  
    }

    //Iniciar sesión
    public function login()
    {
        if (!empty($_POST['usuario']) || !empty($_POST['clave'])) {
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];
            $hash = hash("SHA256", $clave);
            $data = $this->model->selectAlumno($usuario, $hash);
            if (!empty($data)) {
                    $_SESSION['id'] = $data['id'];
                    $_SESSION['nombre'] = $data['nombre'];
                    $_SESSION['correo'] = $data['correo'];
                    $_SESSION['usuario'] = $data['usuario'];
                    $_SESSION['rol'] = $data['rol'];
                    $_SESSION['grado'] = $data['grado'];
                    $_SESSION['grupo'] = $data['grupo'];
                    $_SESSION['perfil'] = $data['perfil'];
                    $_SESSION['asistencias'] = $data['asistencias'];
                    $_SESSION['faltas'] = $data['faltas'];
                    $_SESSION['activo'] = true;
                    header('location: '.base_url(). 'Dashboard/Alumnos');
            } else {
                $error = 0;
                header("location: ".base_url()."?msg=$error");
            }
        }
        die();
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
                $alert =  'errorh';
            }
        } else {
            $alert =  'noigual';
        }
        header('location: ' . base_url() . "Dashboard/Alumnos?msg=$alert");  
        die();
    }

    //restablecer contraseña
    public function restablecer()
    {
        $id = $_GET['id'];
        $data = $this->model->editarAlumnos($id);
        $hash = hash("SHA256", $data['usuario']);
        $cambio = $this->model->cambiarContra($hash, $id);
        $alert =  'rest';
        header('location: ' . base_url() . "Alumnos/Listar?msg=$alert");
        die();  
    }

    //Cambiar Imagen Perfil
    public function cambiarpic()
    {
        $usuario = $this->model->editarAlumnos($_SESSION['id']);
        $imgactual = $usuario['perfil'];
        $name = pathinfo($_FILES["archivo"]["name"]);
        $nombre_archivo = $_FILES["archivo"]["name"];
        $nombre_nuevo = $_SESSION['id'].".".$name["extension"];
        $tipo_archivo = $_FILES["archivo"]["type"];
        $tamano_archivo = $_FILES["archivo"]["size"];
        $ruta_temporal = $_FILES["archivo"]["tmp_name"];
        $error_archivo = $_FILES["archivo"]["error"];
        $tmaximo = 5 * 1024 * 1024;
        if(($tamano_archivo < $tmaximo && $tamano_archivo != 0) && ($name["extension"] == "png" || $name["extension"] == "jpg" || $name["extension"] == "jpeg")){
            if ($error_archivo == UPLOAD_ERR_OK) {
                if($imgactual != "perfil.jpg"){
                    unlink("Assets/img/perfilesalumnos/".$imgactual);
                }
                $ruta_destino = "Assets/img/perfilesalumnos/".$nombre_nuevo;
                if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
                    $id = $_SESSION['id'];
                    $this->model->img($nombre_nuevo, $id);
                    $alert =  'imagen';
                } else {
                    $alert =  'noimagen';
                }
            } else {
            $alert =  'noimagen';
            }
        } else {
            $alert =  'noimagen';
        }
        header('location: ' . base_url() . "Dashboard/Alumnos?msg=$alert");
        die();
    }

    //Cerrar Sesión
    public function salir()
    {
        session_destroy();
        header("Location: ".base_url());
        die();
    }
}
?>