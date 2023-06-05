<?php
function base_url()
{
    return BASE_URL;
}
function links($data="")
{
    $VistaL = "Views/Template/links.php";
    require_once($VistaL);
}
function encabezado($data="")
{
    $VistaE = "Views/Template/header.php";
    require_once($VistaE);
}
function pie($data="")
{
    $VistaP = "Views/Template/footer.php";
    require_once($VistaP);
}
function error403($data="")
{
    $VistaE = "Views/Errors/Error403.php";
    require_once($VistaE);
}
function principal($data="")
{
    $VistaI = "Views/Template/principal.php";
    require_once($VistaI);
}
function menu($data="")
{
    $VistaM = "Views/Template/menu.php";
    require_once($VistaM);
}
function fin($data="")
{
    $VistaF = "Views/Template/fin.php";
    require_once($VistaF);
}

function limpiarInput($dato) {
    // Eliminar espacios en blanco al principio y al final
    $dato = trim($dato);
    // Eliminar barras invertidas
    $dato = stripslashes($dato);
    // Convertir caracteres especiales en entidades HTML
    $dato = htmlspecialchars($dato);
    
    return $dato;
}

?>