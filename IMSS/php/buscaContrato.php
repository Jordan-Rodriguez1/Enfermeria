<?php
//Archivo de conexión a la base de datos
$link = mysqli_connect("localhost", "CSS", "CSSSystem");
mysqli_select_db($link, "mydb");
$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
//Variable de búsqueda
$consultaBusqueda = $_POST['valorBusqueda'];
//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);
//Variable vacía (para evitar los E_NOTICE)
$mensajeContratoTxt = "";
//Comprueba si $consultaBusqueda está seteado
if (isset($consultaBusqueda)) {
	//Selecciona todo de la tabla mmv001 
	//donde el nombre sea igual a $consultaBusqueda, 
	//o el apellido sea igual a $consultaBusqueda, 
	//o $consultaBusqueda sea igual a nombre + (espacio) + apellido
	$consulta = mysqli_query($link, "SELECT td.id, td.nombrePartida FROM partidas td
	WHERE td.numeroContrato = '$consultaBusqueda';");
	$filas = mysqli_num_rows($consulta);
	echo "<option>Selecciona Partida</option>";
	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($filas === 0) {
		$mensajeContratoTxt = '<option>'.'Contrato sin partidas'.'</option>';
	} else{
		while ($filas = mysqli_fetch_assoc($consulta)){
			$mensajeContratoTxt .= '<option value='.$filas['id'].'>'.$filas['nombrePartida'].'</option>';
		} 
	}
};//Fin isset $consultaBusqueda
//Devolvemos el mensaje que tomará jQuery
echo $mensajeContratoTxt;
?>