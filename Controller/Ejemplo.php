<?php
class Ejemplo extends Controllers //Aquí se debe llamas igual que el archivo
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: ".base_url());
        }
        parent::__construct();
    }

    //Aquí se debe llamar igual que la vista
    public function Listar()
    {
        //AQUÍ SE DEBE LLAMAR A LOS DATOS PERO MÁS ADELANTE LES EXPLICO 
        //$data1 = $this->model->selectUsuarios(); Esto mandaría a pedir esa función
        //$data1 = $this->model->actualizarUsuarios($a, $b); Esto mandaría a pedir esa función mandando dos datos
        $this->views->getView($this, "Listar", "");
    }

    //POR CADA CONTROLADOR QUE SE CREE SE TIENE QUE CREAR UN MODEL
}
?>