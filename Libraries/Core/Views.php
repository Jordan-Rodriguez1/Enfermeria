<?php
class Views{
    function getView($controller, $view, $alert="", $data1 = "", $data2 = "", $data3 = "", $data4 = "", $data5 = "")
    {
        $controller = get_class($controller);
        if ($controller == "Login") {
            $view = "Views/".$view.".php";
        }else{
            $view = "Views/" . $controller . "/" . $view . ".php";
        }
        require_once($view);
    }
}

?>