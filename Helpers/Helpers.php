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

/*function Limpiar($cadena)
{
    $String = trim($String);
    $String = stripslashes($String);
    $String = str_ireplace("<script>", "",$String);
    $String = str_ireplace("<script>", "",$String);
    $String = str_ireplace("<script src>", "",$String);
    $String = str_ireplace("</script type>", "", $String);
    $String = str_ireplace("SELECT * FROM ", "", $String);
    $String = str_ireplace("DELETE FROM", "", $String);
    $String = str_ireplace("INSERT INTO", "", $String);
    $String = str_ireplace("SELECT COUNT(*) FROM", "", $String);
    $String = str_ireplace("DROP TABLE", "", $String);
    $String = str_ireplace("OR '1' = '1", "", $String);
    $String = str_ireplace('OR "1" = "1"', "", $String);
    $String = str_ireplace('OR ´1" = "1"', "", $String);
    $String = str_ireplace("</script type>", "", $String);
    $String = str_ireplace("</script type>", "", $String);
    $String = str_ireplace("</script type>", "", $String);
}*/
?>