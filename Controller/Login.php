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

        public function loginprof()
        {
            $this->views->getView($this, "loginprof");
        }

        public function recuperar()
        {
            $this->views->getView($this, "recuperar");
        }

        public function recuperarprof()
        {
            $this->views->getView($this, "recuperarprof");
        }
}
?>