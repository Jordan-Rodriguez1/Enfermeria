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
        $data3 = $this->model->configuracionA();
        $this->views->getView($this, "Listar", "", $data1, $data2, $data3);
        die();  
    }

    //Vista de Alumnos
    public function ListarH()
    {
        $data1 = $this->model->selectAlumnos();
        $data2 = $this->model->configuracion();
        $data3 = $this->model->configuracionA();
        $this->views->getView($this, "ListarH", "", $data1, $data2, $data3);
        die();  
    }

    //Añade un nuevo Alumno
    public function insertar()
    {
        $nombre = limpiarInput($_POST['nombre']);
        $usuario = limpiarInput($_POST['usuario']);
        $correo = limpiarInput($_POST['correo']);
        $clave = limpiarInput($_POST['usuario']); //Por defecto se pone el no.cuenta
        $grado = limpiarInput($_POST['grado']);
        $grupo = limpiarInput($_POST['grupo']);
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
        $id = limpiarInput($_GET['id']);
        $data1 = $this->model->editarAlumnos($id);
        $data2 = $this->model->configuracion();
        if ($data1 == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar","", $data1, $data2);
        }
        die();  
    }

    //Seleciona los datos de un Alumno
    public function editarH()
    {
        $id = limpiarInput($_GET['id']);
        $data1 = $this->model->editarAlumnos($id);
        $data2 = $this->model->configuracion();
        if ($data1 == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "EditarH","", $data1, $data2);
        }
        die();  
    }

    //Actualiza los datos de un Alumno
    public function actualizar()
    {
        $id = limpiarInput($_POST['id']);
        $nombre = limpiarInput($_POST['nombre']);
        $usuario = limpiarInput($_POST['usuario']);
        $asistencias = limpiarInput($_POST['asistencias']);
        $faltas = limpiarInput($_POST['faltas']);
        $correo = limpiarInput($_POST['correo']);
        $grado = limpiarInput($_POST['grado']);
        $grupo = limpiarInput($_POST['grupo']);
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
        $id = limpiarInput($_GET['id']);
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
        $id = limpiarInput($_GET['id']);
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

    //Consulta los Alumno inactivos
    public function eliminadosH()
    {
        $data1 = $this->model->selectInactivos();
        $this->views->getView($this, "EliminadosH", "", $data1);   
        die();     
    }

    //Reactiva los datos de un Usuario
    public function reingresar()
    {
        $id = limpiarInput($_GET['id']);
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
                    $nombre = limpiarInput($datos[0]);
                    $usuario = limpiarInput($datos[1]);
                    $correo = limpiarInput($datos[2]);
                    $clave = limpiarInput($datos[1]); //Por defecto se pone el no.cuenta
                    $grado = limpiarInput($datos[3]);
                    $grupo = limpiarInput($datos[4]);
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
        $ip = $_SERVER["REMOTE_ADDR"];
        $captcha = $_POST['g-recaptcha-response'];
        $secretKey = '6LcsES8mAAAAAB1qsF1R4WKhpXg_dm1l5hTFi852';

        $error = 0;

        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$captcha}&remoteip={$ip}");

        $atributos = json_decode($response, TRUE);

        if (!$atributos['success']) {
            $error = "capcha";
            header("location: ".base_url()."?msg=$response");
        }
        elseif (!empty($_POST['usuario']) || !empty($_POST['clave'])) {
            $usuario = limpiarInput($_POST['usuario']);
            $clave = limpiarInput($_POST['clave']);
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
        $nueva = limpiarInput($_POST['nueva']);
        $confirmar = limpiarInput($_POST['confirmar']);
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
        $id = limpiarInput($_GET['id']);
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
        $tmaximo = 20 * 1024 * 1024;
        if(($tamano_archivo < $tmaximo && $tamano_archivo != 0) && ($name["extension"] == "png" || $name["extension"] == "jpg" || $name["extension"] == "jpeg")){
            if ($error_archivo == UPLOAD_ERR_OK) {
                if($imgactual != "perfil.jpg"){
                    unlink("Assets/img/perfilesalumnos/".$imgactual);
                }
                $ruta_destino = 'Assets/img/perfilesalumnos/'.$nombre_nuevo;
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