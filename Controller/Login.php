<?php
    class Login extends Controllers{
        public function __construct()
        {
        session_start();
        if (!empty($_SESSION['activo'])) {
            header("location: " . base_url()."Admin/Listar");
        }
            parent::__construct();
        }
        public function login()
        {
            $this->views->getView($this, "login");
        }
}
?>