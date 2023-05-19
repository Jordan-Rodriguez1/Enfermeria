<!DOCTYPE html>
<html lang="en">
<head>
    <title>MARYS OOARD Colima</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="MARYS - Portal de Abastecimiento y Contratos del IMSS en Colima">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

</head>

<body class="app">
    <header class="app-header fixed-top">
        <div class="app-header-inner">
	        <div class="container-fluid py-2">
		        <div class="app-header-content">
		            <div class="row justify-content-between align-items-center">

				    <div class="col-auto">
					    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
						    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
					    </a>
				    </div><!--//col-->
		            <div class="search-mobile-trigger d-sm-none col">
			            <i class="search-mobile-trigger-icon fas fa-search"></i>
			        </div><!--//col-->
		            <div class="app-utilities col-auto">
			            <div class="app-utility-item app-notifications-dropdown dropdown">
				            <a class="dropdown-toggle no-toggle-arrow" id="notifications-dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false" title="Notifications">
					            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z"/>
  <path fill-rule="evenodd" d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-
				        </div><!--//app-utility-item-->

			            <div class="app-utility-item app-user-dropdown dropdown">
				            <a class="dropdown-toggle" id="user-dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false"><img src="assets/images/user.png" alt="user profile"></a>
				            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
								<li><a class="dropdown-item" href="account.html">Cuenta</a></li>
								<li><a class="dropdown-item" href="settings.html">Cambiar Password</a></li>
								<li><hr class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="login.html">Salir</a></li>
							</ul>
			            </div><!--//app-user-dropdown-->
		            </div><!--//app-utilities-->
		        </div><!--//row-->
	            </div><!--//app-header-content-->
	        </div><!--//container-fluid-->
        </div><!--//copiar desde aqui desde aqui-->
        <div id="app-sidepanel" class="app-sidepanel">
	        <div id="sidepanel-drop" class="sidepanel-drop"></div>
	        <div class="sidepanel-inner d-flex flex-column">
		        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
		        <div class="app-branding">
		            <a class="app-logo" href="index.html"><img class="logo-icon mr-2" src="assets/images/app-logo.svg" alt="logo"><span class="logo-text">MARYS</span></a>

		        </div><!--//app-branding-->

			    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
				    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link active" href="index.html">
						        <span class="nav-icon">
						        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		  <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"/>
		  <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
		</svg>
						         </span>
		                         <span class="nav-link-text">Princial</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
              <li class="nav-item has-submenu">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link submenu-toggle" href="#" data-toggle="collapse" data-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
						        <span class="nav-icon">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z"/>
	  <path d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z"/>
	</svg>
						         </span>
		                         <span class="nav-link-text">Contratos</span>
		                         <span class="submenu-arrow">
		                             <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
	</svg>
	                             </span><!--//submenu-arrow-->
					        </a><!--//nav-link-->
					        <div id="submenu-1" class="collapse submenu submenu-1" data-parent="#menu-accordion">
						        <ul class="submenu-list list-unstyled">
							        <li class="submenu-item"><a class="submenu-link" href="contratos.php">Seguimiento</a></li>
							        <li class="submenu-item"><a class="submenu-link" href="contratos_rev.php">Flujo de Revisión</a></li>
							        <li class="submenu-item"><a class="submenu-link" href="contratos_cae.php">Registro de Contratos</a></li>

						        </ul>
					        </div>
					    </li><!--//nav-item-->
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="pedidos.html">
						        <span class="nav-icon">
						        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
  <path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z"/>
  <circle cx="3.5" cy="5.5" r=".5"/>
  <circle cx="3.5" cy="8" r=".5"/>
  <circle cx="3.5" cy="10.5" r=".5"/>
</svg>
						         </span>
		                         <span class="nav-link-text">Pedidos</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
              <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="indicadores.html">
						        <span class="nav-icon">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-columns-gap" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  	  <path fill-rule="evenodd" d="M6 1H1v3h5V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12h-5v3h5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8H1v7h5V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6h-5v7h5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z"/>
  	</svg>
						         </span>
		                         <span class="nav-link-text">Indicadores</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
				    </ul><!--//app-menu-->
			    </nav><!--//app-nav-->
			    <div class="app-sidepanel-footer">
				    <nav class="app-nav app-nav-footer">
					    <ul class="app-menu footer-menu list-unstyled">
						    <li class="nav-item">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						        <a class="nav-link" href="settings.html">
							        <span class="nav-icon">
							            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"/>
	  <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"/>
	</svg>
							        </span>
			                        <span class="nav-link-text">Configuración</span>
						        </a><!--//nav-link-->
						    </li><!--//nav-item-->
						    <li class="nav-item">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						        <a class="nav-link" href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/">
							        <span class="nav-icon">
							            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
	  <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
	</svg>
							        </span>
			                        <span class="nav-link-text">Descarga</span>
						        </a><!--//nav-link-->
						    </li><!--//nav-item-->
						    <li class="nav-item">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						        <a class="nav-link" href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/">
							        <span class="nav-icon">
							            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M12 1H4a1 1 0 0 0-1 1v10.755S4 11 8 11s5 1.755 5 1.755V2a1 1 0 0 0-1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
	  <path fill-rule="evenodd" d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
	</svg>
							        </span>
			                        <span class="nav-link-text">CDAE</span>
						        </a><!--//nav-link-->
						    </li><!--//nav-item-->
					    </ul><!--//footer-menu-->
				    </nav>
			    </div><!--//app-sidepanel-footer-->

	        </div><!--//sidepanel-inner-->
	    </div><!--//app-sidepanel-->
    </header><!--//app-header-->

    <div class="app-wrapper">

      <div class="app-content pt-3 p-lg-4">
		    <div class="container-xl">
			    <div class="position-relative mb-3">
				    <div class="row g-3 justify-content-between">
					    <div class="col-auto">
					        <h1 class="app-page-title mb-0">Contratos y Convenios</h1>
					    </div>
				    </div>
			    </div>

          <div class="app-card app-card-notification shadow-sm">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        <div class="col-12 col-lg-auto text-center text-lg-left">
				                <img class="profile-image" src="assets/images/profiles/profile-1.png" alt="">
					        </div><!--//col-->
					        <div class="col-12 col-lg-auto text-center text-lg-left">
						        <div class="notification-type mb-2"><span class="badge bg-info">Oficina de Contratos</span></div>
						        <h4 class="notification-title mb-1">Mtro. Luis Godínez Cruz</h4>
						        <ul class="notification-meta list-inline mb-0">
							        <li class="list-inline-item">luis.godinezœimss.gob.mx</li>
							        <li class="list-inline-item">|</li>
							        <li class="list-inline-item">312 111 22 33</li>
						        </ul>

					        </div><!--//col-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4">
              <div style="">
              <span><svg width="0.5em" height="0.5em"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="red"><path d="M396.8 352h22.4c6.4 0 12.8-6.4 12.8-12.8V108.8c0-6.4-6.4-12.8-12.8-12.8h-22.4c-6.4 0-12.8 6.4-12.8 12.8v230.4c0 6.4 6.4 12.8 12.8 12.8zm-192 0h22.4c6.4 0 12.8-6.4 12.8-12.8V140.8c0-6.4-6.4-12.8-12.8-12.8h-22.4c-6.4 0-12.8 6.4-12.8 12.8v198.4c0 6.4 6.4 12.8 12.8 12.8zm96 0h22.4c6.4 0 12.8-6.4 12.8-12.8V204.8c0-6.4-6.4-12.8-12.8-12.8h-22.4c-6.4 0-12.8 6.4-12.8 12.8v134.4c0 6.4 6.4 12.8 12.8 12.8zM496 400H48V80c0-8.84-7.16-16-16-16H16C7.16 64 0 71.16 0 80v336c0 17.67 14.33 32 32 32h464c8.84 0 16-7.16 16-16v-16c0-8.84-7.16-16-16-16zm-387.2-48h22.4c6.4 0 12.8-6.4 12.8-12.8v-70.4c0-6.4-6.4-12.8-12.8-12.8h-22.4c-6.4 0-12.8 6.4-12.8 12.8v70.4c0 6.4 6.4 12.8 12.8 12.8z"/></svg>
              &nbsp&nbsp<span style="font-weight: bold;">Estadísticas de la Oficina</span></span>
              </div>
              <div class="row g-4 mb-4" style="padding-top:10px; font-size:14px;">
                  <div class="col-12 col-lg-6" style="color:#000000;">

<div><span><span style="font-weight:bold;">Total</span> de Instrumentos:</span>&nbsp<span style="font-weight:bold; text-decoration:solid underline #5B99EA 3px;">

  <?php
  $link = mysqli_connect("localhost", "root");
  mysqli_select_db($link, "maryscae");
  $tildes = $link->query("SET NAMES 'utf8'");
  $pTotalContratos = "SELECT COUNT(no_contrato) as TC FROM info_contratos";
  $resultadoX = mysqli_query($link, $pTotalContratos);
    while ($fila = mysqli_fetch_assoc($resultadoX))
    {
      $pTotalContratos2 = $fila['TC'];
    }

echo ($pTotalContratos2);
?>


</span>&nbsp<span>a un ascendente de&nbsp</span><span style="font-weight:bold;">

<?php
  $link = mysqli_connect("localhost", "root");
  mysqli_select_db($link, "maryscae");
  $tildes = $link->query("SET NAMES 'utf8'");
  $pTotalContratos = "SELECT SUM(monto_contrato) as MTC FROM info_contratos";
  $resultadoX = mysqli_query($link, $pTotalContratos);
    while ($fila = mysqli_fetch_assoc($resultadoX))
    {
      $pTotalContratos2 = $fila['MTC'];
    }
echo '$ '.number_format($pTotalContratos2, 2);
?>
</span></div>
<div>
  <span>
    <?php
      $link = mysqli_connect("localhost", "root");
      mysqli_select_db($link, "maryscae");
      $tildes = $link->query("SET NAMES 'utf8'");
      $pTotalContratos = "SELECT COUNT(no_contrato) as TIC FROM info_contratos WHERE (tipo_contrato!='Por Monto') AND (tipo_contrato!='Por Vigencia')";
      $resultadoX = mysqli_query($link, $pTotalContratos);
        while ($fila = mysqli_fetch_assoc($resultadoX))
        {
          $pTotalContratos2 = $fila['TIC'];
        }
    echo ($pTotalContratos2);
    ?>
  </span>&nbsp<span style="font-weight:bold;">Convenios</span>&nbsp
  <span style="font-weight:lighter; color:#ff0000; font-size:10px;">SAI</span>&nbsp<span style="font-weight:lighter; font-size:10px;">
    <?php
      $link = mysqli_connect("localhost", "root");
      mysqli_select_db($link, "maryscae");
      $tildes = $link->query("SET NAMES 'utf8'");
      $pTotalContratos = "SELECT COUNT(no_contrato) as TIC FROM info_contratos WHERE (tipo_contrato='Conv. Vigencia' OR tipo_contrato='Conv. Monto') AND (sistema_contrato='SAI')";
      $resultadoX = mysqli_query($link, $pTotalContratos);
        while ($fila = mysqli_fetch_assoc($resultadoX))
        {
          $pTotalContratos2 = $fila['TIC'];
        }
    echo ($pTotalContratos2);
    ?>
  </span>&nbsp
  <span style="font-weight:lighter; color:#ff0000; font-size:10px;">PREI</span>&nbsp<span style="font-weight:lighter; font-size:10px;">
    <?php
      $link = mysqli_connect("localhost", "root");
      mysqli_select_db($link, "maryscae");
      $tildes = $link->query("SET NAMES 'utf8'");
      $pTotalContratos = "SELECT COUNT(no_contrato) as TIC FROM info_contratos WHERE (tipo_contrato='Conv. Vigencia' OR tipo_contrato='Conv. Monto') AND (sistema_contrato='PREI')";
      $resultadoX = mysqli_query($link, $pTotalContratos);
        while ($fila = mysqli_fetch_assoc($resultadoX))
        {
          $pTotalContratos2 = $fila['TIC'];
        }
    echo ($pTotalContratos2);
    ?>
  </span>&nbsp
  <?php
    $link = mysqli_connect("localhost", "root");
    mysqli_select_db($link, "maryscae");
    $tildes = $link->query("SET NAMES 'utf8'");
    $pTotalContratos = "SELECT COUNT(no_contrato) as TIC FROM info_contratos WHERE (tipo_contrato='Por Monto' OR tipo_contrato='Por Vigencia')";
    $resultadoX = mysqli_query($link, $pTotalContratos);
      while ($fila = mysqli_fetch_assoc($resultadoX))
      {
        $pTotalContratos2 = $fila['TIC'];
      }
  echo ($pTotalContratos2);
  ?>
  <span style="font-weight:bold;">Contratos</span>&nbsp
  <span style="font-weight:lighter; color:#ff0000; font-size:10px;">SAI</span>&nbsp<span style="font-weight:lighter; font-size:10px;">
    <?php
      $link = mysqli_connect("localhost", "root");
      mysqli_select_db($link, "maryscae");
      $tildes = $link->query("SET NAMES 'utf8'");
      $pTotalContratos = "SELECT COUNT(no_contrato) as TIC FROM info_contratos WHERE (tipo_contrato='Por Monto' OR tipo_contrato='Por Vigencia') AND (sistema_contrato='SAI')";
      $resultadoX = mysqli_query($link, $pTotalContratos);
        while ($fila = mysqli_fetch_assoc($resultadoX))
        {
          $pTotalContratos2 = $fila['TIC'];
        }
    echo ($pTotalContratos2);
    ?>
  </span>&nbsp
  <span style="font-weight:lighter; color:#ff0000; font-size:10px;">PREI</span>&nbsp<span style="font-weight:lighter; font-size:10px;">
    <?php
      $link = mysqli_connect("localhost", "root");
      mysqli_select_db($link, "maryscae");
      $tildes = $link->query("SET NAMES 'utf8'");
      $pTotalContratos = "SELECT COUNT(no_contrato) as TIC FROM info_contratos WHERE (tipo_contrato='Por Monto' OR tipo_contrato='Por Vigencia') AND (sistema_contrato='PREI')";
      $resultadoX = mysqli_query($link, $pTotalContratos);
        while ($fila = mysqli_fetch_assoc($resultadoX))
        {
          $pTotalContratos2 = $fila['TIC'];
        }
    echo ($pTotalContratos2);
    ?>
  </span>&nbsp
</div>

<div style="padding-top:15px;">

<!-- En Contratación -->
<svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
  <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200z"/></svg>
  <span style="font-weight:bold;">
  <?php
  $link = mysqli_connect("localhost", "root");
  mysqli_select_db($link, "maryscae");
  $tildes = $link->query("SET NAMES 'utf8'");
  $pTotalContratos = "SELECT COUNT(no_contrato) as TC FROM info_contratos";
  $resultadoX = mysqli_query($link, $pTotalContratos);
    while ($fila = mysqli_fetch_assoc($resultadoX))
    {
      $pTotalContratos2 = $fila['TC'];
    }
  $pTotalContratosC = "SELECT COUNT(no_contrato) as TAA FROM info_contratos WHERE (status_contrato='AA')";
  $resultadoZ = mysqli_query($link, $pTotalContratosC);
    while ($fila = mysqli_fetch_assoc($resultadoZ))
    {
      $pTotalContratosC2 = $fila['TAA'];
    }
  $pTotalDatoFormalizado =($pTotalContratosC2/$pTotalContratos2)*100;
  echo number_format($pTotalDatoFormalizado, 2).'%';
  ?>
</span>&nbsp<span style="">contratación</span>


<!-- En Eleaboración -->
<svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
<path d="M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z"/></svg>
<span span style="font-weight:bold;">
  <?php
  $link = mysqli_connect("localhost", "root");
  mysqli_select_db($link, "maryscae");
  $tildes = $link->query("SET NAMES 'utf8'");
  $pTotalContratos = "SELECT COUNT(no_contrato) as TC FROM info_contratos";
  $resultadoX = mysqli_query($link, $pTotalContratos);
    while ($fila = mysqli_fetch_assoc($resultadoX))
    {
      $pTotalContratos2 = $fila['TC'];
    }
  $pTotalContratosA = "SELECT COUNT(no_contrato) as TCA FROM info_contratos WHERE (status_contrato='A')";
  $resultadoX = mysqli_query($link, $pTotalContratosA);
    while ($fila = mysqli_fetch_assoc($resultadoX))
    {
      $pTotalContratosA2 = $fila['TCA'];
    }
  $pTotalDatoElabora =($pTotalContratosA2/$pTotalContratos2)*100;
  echo number_format($pTotalDatoElabora, 2).'%';
  ?>
</span>&nbsp<span style="">elaboración&nbsp</span>&nbsp<br>

<!-- En Validación -->
<svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
<path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"/></svg>
<span style="font-weight:bold;">
  <?php
  $link = mysqli_connect("localhost", "root");
  mysqli_select_db($link, "maryscae");
  $tildes = $link->query("SET NAMES 'utf8'");
  $pTotalContratos = "SELECT COUNT(no_contrato) as TC FROM info_contratos";
  $resultadoX = mysqli_query($link, $pTotalContratos);
    while ($fila = mysqli_fetch_assoc($resultadoX))
    {
      $pTotalContratos2 = $fila['TC'];
    }
  $pTotalContratosB = "SELECT COUNT(no_contrato) as TCB FROM info_contratos WHERE (status_contrato='B')";
  $resultadoY = mysqli_query($link, $pTotalContratosB);

    while ($fila = mysqli_fetch_assoc($resultadoY))
    {
      $pTotalContratosB2 = $fila['TCB'];
    }
  $pTotalDatoValida =($pTotalContratosB2/$pTotalContratos2)*100;
  echo number_format($pTotalDatoValida, 2).'%';
  ?>
</span>&nbsp<span style="">en validación</span>&nbsp&nbsp

<!-- Formalizado -->
  <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="green" xmlns="http://www.w3.org/2000/svg">
  <path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z"/></svg>
  <span style="font-weight:bold;">
  <?php
  $link = mysqli_connect("localhost", "root");
  mysqli_select_db($link, "maryscae");
  $tildes = $link->query("SET NAMES 'utf8'");
  $pTotalContratos = "SELECT COUNT(no_contrato) as TC FROM info_contratos";
  $resultadoX = mysqli_query($link, $pTotalContratos);
    while ($fila = mysqli_fetch_assoc($resultadoX))
    {
      $pTotalContratos2 = $fila['TC'];
    }
  $pTotalContratosC = "SELECT COUNT(no_contrato) as TCC FROM info_contratos WHERE (status_contrato='C')";
  $resultadoZ = mysqli_query($link, $pTotalContratosC);
    while ($fila = mysqli_fetch_assoc($resultadoZ))
    {
      $pTotalContratosC2 = $fila['TCC'];
    }
  $pTotalDatoFormalizado =($pTotalContratosC2/$pTotalContratos2)*100;
  echo number_format($pTotalDatoFormalizado, 2).'%';
  ?>
</span>&nbsp<span style="">formalizados</span>
<div style="padding-top:30px; padding-right:30px;">
<canvas id="chart-pie0"></canvas>
</div>
</div>

                  </div><!--//col-->
                  <div class="col-12 col-lg-6">
<div style="padding-bottom:20px; font-weight:bold; font-size:14px; color:#F39C12;">Flujo de Formalización</div>
<div><span style="color:#000000;">Prestaciones Médicas</span></div>
<div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width:
<?php
$link = mysqli_connect("localhost", "root");
mysqli_select_db($link, "maryscae");
$tildes = $link->query("SET NAMES 'utf8'");
$pTotalContratosArea = "SELECT COUNT(no_contrato) as TCA FROM info_contratos WHERE(area_contrato='Jefatura de Prestaciones Medicas')";
$resultadoX = mysqli_query($link, $pTotalContratosArea);
  while ($fila = mysqli_fetch_assoc($resultadoX))
  {
    $pTotalContratosArea2 = $fila['TCA'];
  }
$pTotalContratosAreaF = "SELECT COUNT(no_contrato) as TCAF FROM info_contratos WHERE(area_contrato='Jefatura de Prestaciones Medicas' AND status_contrato='C')";
$resultadoX = mysqli_query($link, $pTotalContratosAreaF);
  while ($fila = mysqli_fetch_assoc($resultadoX))
  {
    $pTotalContratosAreaF = $fila['TCAF'];
  }
$pTotalDatoBarra = ($pTotalContratosAreaF/$pTotalContratosArea2)*100;
echo $pTotalDatoBarra;
?>%;" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div style="padding-top:10px;"><span style="color:#000000;">Servicios Prestaciones Económicas</span></div>
<div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width:
<?php
$link = mysqli_connect("localhost", "root");
mysqli_select_db($link, "maryscae");
$tildes = $link->query("SET NAMES 'utf8'");
$pTotalContratosArea = "SELECT COUNT(no_contrato) as TCA FROM info_contratos WHERE(area_contrato='Jefatura de Servicios Prestaciones Economicas')";
$resultadoX = mysqli_query($link, $pTotalContratosArea);
  while ($fila = mysqli_fetch_assoc($resultadoX))
  {
    $pTotalContratosArea2 = $fila['TCA'];
  }
$pTotalContratosAreaF = "SELECT COUNT(no_contrato) as TCAF FROM info_contratos WHERE(area_contrato='Jefatura de Servicios Prestaciones Economicas' AND status_contrato='C')";
$resultadoX = mysqli_query($link, $pTotalContratosAreaF);
  while ($fila = mysqli_fetch_assoc($resultadoX))
  {
    $pTotalContratosAreaF = $fila['TCAF'];
  }
$pTotalDatoBarra = ($pTotalContratosAreaF/$pTotalContratosArea2)*100;
echo $pTotalDatoBarra;
?>%;" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
</div>

<div style="padding-top:10px;"><span style="color:#000000;">Comuniación Social</span></div>
<div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width:
<?php
$link = mysqli_connect("localhost", "root");
mysqli_select_db($link, "maryscae");
$tildes = $link->query("SET NAMES 'utf8'");
$pTotalContratosArea = "SELECT COUNT(no_contrato) as TCA FROM info_contratos WHERE(area_contrato='Comunicacion Social')";
$resultadoX = mysqli_query($link, $pTotalContratosArea);
  while ($fila = mysqli_fetch_assoc($resultadoX))
  {
    $pTotalContratosArea2 = $fila['TCA'];
  }
$pTotalContratosAreaF = "SELECT COUNT(no_contrato) as TCAF FROM info_contratos WHERE(area_contrato='Comunicacion Social' AND status_contrato='C')";
$resultadoX = mysqli_query($link, $pTotalContratosAreaF);
  while ($fila = mysqli_fetch_assoc($resultadoX))
  {
    $pTotalContratosAreaF = $fila['TCAF'];
  }
$pTotalDatoBarra = ($pTotalContratosAreaF/$pTotalContratosArea2)*100;
echo $pTotalDatoBarra;
?>%;" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div style="padding-top:10px;"><span style="color:#000000;">Conservación</span></div>
<div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width:
<?php
$link = mysqli_connect("localhost", "root");
mysqli_select_db($link, "maryscae");
$tildes = $link->query("SET NAMES 'utf8'");
$pTotalContratosArea = "SELECT COUNT(no_contrato) as TCA FROM info_contratos WHERE(area_contrato='Conservacion')";
$resultadoX = mysqli_query($link, $pTotalContratosArea);
  while ($fila = mysqli_fetch_assoc($resultadoX))
  {
    $pTotalContratosArea2 = $fila['TCA'];
  }
$pTotalContratosAreaF = "SELECT COUNT(no_contrato) as TCAF FROM info_contratos WHERE(area_contrato='Conservacion' AND status_contrato='C')";
$resultadoX = mysqli_query($link, $pTotalContratosAreaF);
  while ($fila = mysqli_fetch_assoc($resultadoX))
  {
    $pTotalContratosAreaF = $fila['TCAF'];
  }
$pTotalDatoBarra = ($pTotalContratosAreaF/$pTotalContratosArea2)*100;
echo $pTotalDatoBarra;
?>%;" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div style="padding-top:10px;"><span style="color:#000000;">Servicios Generales</span></div>
<div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width:
<?php
$link = mysqli_connect("localhost", "root");
mysqli_select_db($link, "maryscae");
$tildes = $link->query("SET NAMES 'utf8'");
$pTotalContratosArea = "SELECT COUNT(no_contrato) as TCA FROM info_contratos WHERE(area_contrato='Generales')";
$resultadoX = mysqli_query($link, $pTotalContratosArea);
  while ($fila = mysqli_fetch_assoc($resultadoX))
  {
    $pTotalContratosArea2 = $fila['TCA'];
  }
$pTotalContratosAreaF = "SELECT COUNT(no_contrato) as TCAF FROM info_contratos WHERE(area_contrato='Generales' AND status_contrato='C')";
$resultadoX = mysqli_query($link, $pTotalContratosAreaF);
  while ($fila = mysqli_fetch_assoc($resultadoX))
  {
    $pTotalContratosAreaF = $fila['TCAF'];
  }
$pTotalDatoBarra = ($pTotalContratosAreaF/$pTotalContratosArea2)*100;
echo $pTotalDatoBarra;
?>%;" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div style="padding-top:10px;"><span style="color:#000000;">Informática</span></div>
<div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width:
<?php
$link = mysqli_connect("localhost", "root");
mysqli_select_db($link, "maryscae");
$tildes = $link->query("SET NAMES 'utf8'");
$pTotalContratosArea = "SELECT COUNT(no_contrato) as TCA FROM info_contratos WHERE(area_contrato='Informatica')";
$resultadoX = mysqli_query($link, $pTotalContratosArea);
  while ($fila = mysqli_fetch_assoc($resultadoX))
  {
    $pTotalContratosArea2 = $fila['TCA'];
  }
$pTotalContratosAreaF = "SELECT COUNT(no_contrato) as TCAF FROM info_contratos WHERE(area_contrato='Informatica' AND status_contrato='C')";
$resultadoX = mysqli_query($link, $pTotalContratosAreaF);
  while ($fila = mysqli_fetch_assoc($resultadoX))
  {
    $pTotalContratosAreaF = $fila['TCAF'];
  }
$pTotalDatoBarra = ($pTotalContratosAreaF/$pTotalContratosArea2)*100;
echo $pTotalDatoBarra;
?>%;" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div style="padding-top:10px;"><span style="color:#000000;">Biomédica</span></div>
<div class="progress">
<div class="progress-bar bg-success" role="progressbar" style="width:
<?php
$link = mysqli_connect("localhost", "root");
mysqli_select_db($link, "maryscae");
$tildes = $link->query("SET NAMES 'utf8'");
$pTotalContratosArea = "SELECT COUNT(no_contrato) as TCA FROM info_contratos WHERE(area_contrato='Coordinación Biomédica')";
$resultadoX = mysqli_query($link, $pTotalContratosArea);
  while ($fila = mysqli_fetch_assoc($resultadoX))
  {
    $pTotalContratosArea2 = $fila['TCA'];
  }
$pTotalContratosAreaF = "SELECT COUNT(no_contrato) as TCAF FROM info_contratos WHERE(area_contrato='Coordinación Biomédica' AND status_contrato='C')";
$resultadoX = mysqli_query($link, $pTotalContratosAreaF);
  while ($fila = mysqli_fetch_assoc($resultadoX))
  {
    $pTotalContratosAreaF = $fila['TCAF'];
  }
$pTotalDatoBarra = ($pTotalContratosAreaF/$pTotalContratosArea2)*100;
echo $pTotalDatoBarra;
?>%;" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
</div>
                  </div><!--//col-->
              </div><!--//row-->
            </div><!--//app-card-body-->
				</div><!--//app-card-->
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->



      <div class="app-content p-lg-4" style="margin-top:-25px !important; padding-top:-25px !important;">

      <div class="card-body" style="border-color:#59d05d !important;">

        <div id="faq2-accordion" class="mb-3" style="margin-bottom:25px !important;">
                      <div class="">
                        <div class="" id="faq2-heading-1">
                                <a class="" type="button" data-toggle="collapse" data-target="#faq2-1" aria-expanded="false" aria-controls="faq2-1">
                                  Indicadores del Devengo<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                  </svg>
                                </a>
                        </div>
                          <div class="panel-collapse collapse" id="faq2-1" aria-labelledby="faq2-heading-1" data-parent="#faq2-accordion" style="margin-top:25px !important;">
                            <div class="row g-4 mb-4">
                                <div class="col-12 col-lg-6">
                                  <div class="app-card app-card-chart h-100 shadow-sm">
                                    <div class="app-card-header p-3">
                                      <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                              <h4 class="app-card-title">Devengo vs. Presupuesto Global</h4>
                                        </div><!--//col-->

                                      </div><!--//row-->
                                    </div><!--//app-card-header-->
                                    <div class="app-card-body p-3 p-lg-4">
                                      <div class="chart-container">
                                              <canvas id="chart-pie2"></canvas>
                                      </div>
                                    </div><!--//app-card-body-->
                                  </div><!--//app-card-->
                                </div><!--//col-->
                                <div class="col-12 col-lg-6">
                                  <div class="app-card app-card-chart h-100 shadow-sm">
                                    <div class="app-card-header p-3">
                                      <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                              <h4 class="app-card-title">Devengo vs. Instrumentos Formalizados</h4>
                                        </div><!--//col-->
                                      </div><!--//row-->
                                    </div><!--//app-card-header-->
                                    <div class="app-card-body p-3 p-lg-4" style="margin-left: -60px;">
                                      <div class="chart-container">
                                              <canvas id="chart-pie" ></canvas>
                                      </div>
                                    </div><!--//app-card-body-->
                                  </div><!--//app-card-->
                                </div><!--//col-->

                            </div><!--//row-->
                          </div>
                      </div>
        </div><!--//faq2-accordion-->
      <h1 class="app-page-title mb-4">Inventario 2021</h1>
      <div class="app-card shadow-sm mb-4 border-left-decoration">
        <div class="inner">
          <div class="app-card-body p-4">
            <div class="row gx-5 gy-3">
                <div class="col-12 col-lg-9">
                  <div>También puede revisar el <a href="https://www.chartjs.org/" target="_blank">flujo de revisión</a> de los contratos en "proceso de validación"  aldar click en el icono <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up-right-square mr-2" fill="green" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path fill-rule="evenodd" d="M5.172 10.828a.5.5 0 0 0 .707 0l4.096-4.096V9.5a.5.5 0 1 0 1 0V5.525a.5.5 0 0 0-.5-.5H6.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"/>
                    </svg>ubicado en la descripción de los contratos "que se encuentren sin formalizar".

                   </div>
              </div><!--//col-->
              <div class="col-12 col-lg-3">
                <a class="btn app-btn-primary" href="contratos_rev.php" target="_blank"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up-right-square mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
<path fill-rule="evenodd" d="M5.172 10.828a.5.5 0 0 0 .707 0l4.096-4.096V9.5a.5.5 0 1 0 1 0V5.525a.5.5 0 0 0-.5-.5H6.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"/>
</svg>Flujo de Revisión</a>
              </div><!--//col-->
            </div><!--//row-->
          </div><!--//app-card-body-->
        </div><!--//inner-->
      </div><!--//app-card-->
          <table class="table table-head-bg-success table-striped table-hover">
            <thead style="background-color:#59d05d !important; font-size: 0.875rem !important; color:#ffffff !important; vertical-align: middle !important; border:1px !important; font-size:14px; border-color:#ebedf2 !important; padding:0.75rem !important;">
              <tr>
                <th scope="col"></th>
                <th scope="col">Número</th>
                <th scope="col">Descripción</th>
                <th scope="col">Administrador</th>
                <th scope="col">Termino</th>
                <th scope="col">Máximo</th>
                <th scope="col">Devengado</th>
              </tr>
            </thead>
            <tbody style="font-size: 0.875rem !important;">
              <?php
              $link = mysqli_connect("localhost", "root");
              mysqli_select_db($link, "maryscae");
              $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente

$result = mysqli_query($link, "SELECT ro.status_contrato, ro.no_contrato, ro.desc_contrato, ro.area_contrato, ro.termino_contrato, ro.monto_contrato, SUM(ac.devengo_contrato) as Devengo FROM info_contratos ro, administra_contrato ac WHERE ro.no_contrato = ac.no_contrato GROUP BY ro.no_contrato");
              while ($fila = mysqli_fetch_assoc($result)){
              echo "<tr>";
if($fila['status_contrato'] == 'A'):
     echo '<td>
     <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
     <path d="M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z"/></svg>
     </td>';
elseif ($fila['status_contrato'] == 'B'):
     echo '<td>
     <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
     <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"/></svg>
     </td>';
elseif ($fila['status_contrato'] == 'C'):
     echo
     '<td>
     <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="green" xmlns="http://www.w3.org/2000/svg">
     <path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z"/></svg></td>';
elseif ($fila['status_contrato'] == 'AA'):
          echo
          '<td>
          <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
          <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200z"/></svg>
          </td>';
elseif ($fila['status_contrato'] == 'CC'):
          echo
          '<td>
          <svg width="0.95em" height="0.95em" viewBox="0 0 512 512" fill="blue" xmlns="http://www.w3.org/2000/svg">
          <path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z"/></svg>
          </td>';
else:
     echo 'not specified';
endif;
//Termina aqui buscarContrato(this); data-toggle='modal' data-target='#myModal'
              echo "<td class='numeroDeContrato' style='font-weight:bold; cursor: pointer;'><a onClick='limpiarCampos();buscarContrato(this);' data-toggle='modal' data-target='#myModal'>".$fila['no_contrato']."</a>
              </td>";
              if($fila['status_contrato'] == 'B'):
                   echo '<td class="proveedor desDeContrato">'.$fila['desc_contrato'].'<a href="contratos_rev.php#'.$fila['no_contrato'].'">
                   <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up-right-square mr-2" fill="green" xmlns="http://www.w3.org/2000/svg">
                   <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                   <path fill-rule="evenodd" d="M5.172 10.828a.5.5 0 0 0 .707 0l4.096-4.096V9.5a.5.5 0 1 0 1 0V5.525a.5.5 0 0 0-.5-.5H6.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"/>
                   </svg>
                   </a></td>';
              elseif ($fila['status_contrato'] != 'B'):
                   echo '<td class="proveedor desDeContrato">'.$fila['desc_contrato'].'</td>';
              endif;
              echo "<td class='proveedor'>".$fila['area_contrato']."</td>";
              echo "<td class='proveedor'>".$fila['termino_contrato']."</a></td>";
              echo "<td>$".number_format($fila['monto_contrato'],2)."</td>";
              echo "<td>$".number_format($fila['Devengo'],2)."</td>";
              echo "</tr>";
              }
              mysqli_free_result($result);
              mysqli_close($link);
              ?>
            </tbody>
          </table>
        </div>
      </div>
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <div class="row g-4">
				    <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
					    <div class="app-card app-card-doc shadow-sm h-100">

                <div class="app-card-thumb-holder p-3">
							    <span class="icon-holder">
	                                <i class="fas fa-file-pdf pdf-file"></i>
	                            </span>
	                             <a class="app-card-link-mask" href="#file-link"></a>
						    </div>
						    <div class="app-card-body p-3 has-card-actions">

							    <h4 class="app-doc-title truncate mb-0"><a href="#file-link">Descarga/a></h4>
							    <div class="app-doc-meta">
								    <ul class="list-unstyled mb-0">
									    <li><span class="text-muted">Formato:</span> PDF</li>
									    <li><span class="text-muted">Peso (promedio):</span> 3MB</li>
									    <li><span class="text-muted">Vigencia:</span> 2021o</li>
								    </ul>
							    </div><!--//app-doc-meta-->

							    <div class="app-card-actions">
								    <div class="dropdown">
									    <div class="dropdown-toggle no-toggle-arrow" data-toggle="dropdown" aria-expanded="false">
										    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			  <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
			</svg>
									    </div><!--//dropdown-toggle-->
									    <ul class="dropdown-menu dropdown-menu-right">
										    <li><a class="dropdown-item" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
	  <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
	</svg>View</a></li>
											<li><a class="dropdown-item" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
	</svg>Edit</a></li>
											<li><a class="dropdown-item" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
	  <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
	</svg>Download</a></li>
	                                        <li><hr class="dropdown-divider"></li>
											<li><a class="dropdown-item" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
	  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
	</svg>Delete</a></li>
										</ul>
								    </div><!--//dropdown-->
						        </div><!--//app-card-actions-->
						    </div><!--//app-card-body-->
						</div><!--//app-card-->
				    </div><!--//col-->
				    <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
              <div class="app-card app-card-doc shadow-sm h-100">
						    <div class="app-card-thumb-holder p-3">
							    <span class="icon-holder">
	                                <i class="fas fa-file-excel excel-file"></i>
	                            </span>
	                             <a class="app-card-link-mask" href="#file-link"></a>
						    </div>
						    <div class="app-card-body p-3 has-card-actions">

							    <h4 class="app-doc-title truncate mb-0"><a href="#file-link">Relación</a></h4>
							    <div class="app-doc-meta">
								    <ul class="list-unstyled mb-0">
									    <li><span class="text-muted">Formato:</span> Macro Excel</li>
									    <li><span class="text-muted">Peso:</span> 2 MB</li>
									    <li><span class="text-muted">Actualización:</span> 2 de maro 2021</li>
								    </ul>
							    </div><!--//app-doc-meta-->

							    <div class="app-card-actions">
								    <div class="dropdown">
									    <div class="dropdown-toggle no-toggle-arrow" data-toggle="dropdown" aria-expanded="false">
										    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			  <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
			</svg>
									    </div><!--//dropdown-toggle-->
									    <ul class="dropdown-menu dropdown-menu-right">
										    <li><a class="dropdown-item" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
	  <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
	</svg>View</a></li>
											<li><a class="dropdown-item" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
	</svg>Edit</a></li>
											<li><a class="dropdown-item" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
	  <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
	</svg>Download</a></li>
	                                        <li><hr class="dropdown-divider"></li>
											<li><a class="dropdown-item" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
	  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
	</svg>Delete</a></li>
										</ul>
								    </div><!--//dropdown-->
						        </div><!--//app-card-actions-->

						    </div><!--//app-card-body-->

						</div><!--//app-card-->
				    </div><!--//col-->
			    </div><!--//row-->
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->

      <div id="myModal" class="modal" role="dialog" style="overflow-y: auto !important;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <div class="" style="color:##2E4053; font-weight:bold;" id="resultadoNombreServicio"></div>
              <div class="" style="color:#5cb377; font-size:20px;" id="resultadoNumeroContrato"></div>
            </div>
            <div class="modal-body">
              <div class="app-card-body">
                <form class="settings-form" id="formulario_actualiza_contrato" method="POST" action="php/modificaElContrato.php">
                  <div class="mb-3">
                    <label for="setting-input-1" class="form-label">Status del Instrumento<span class="ml-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="El nuevo registro se sobre escribe sobre el campo actual de 'Status'"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="red" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
<path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
<circle cx="8" cy="4.5" r="1"/>
</svg></span></label>
                    <select type="text" class="form-control" id="status_contrato" name="status_contrato" required>
                        <option></option>
                        <option value="AA">En Contrtación</option>
                        <option value="A">En Elaboración</option>
                        <option value="B">En Validación</option>
                        <option value="CC">Firma del TOOADR</option>
                        <option value="C">Formalizado</option>
                    </select>
                </div>
                <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="settings-switch-1" onclick="myFunction()">
                <label class="form-check-label" for="settings-switch-1">
                Aplica Fianza<span class="ml-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="En caso de 'NO' Aplicar la Fianza, deberá contar con la evidencia por parte del administrador del contrato respectoa a la entrega en un plazo 'NO MAYOR' a 10 (diez) días"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="red" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
<path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
<circle cx="8" cy="4.5" r="1"/>
</svg></span></label>
                </div>
                <div id="fianza_contrato_modulo" class="mb-3" style="display:none">
                    <label for="setting-input-2" class="form-label">Registro de Fianza</label>
                    <input type="text" class="form-control" id="fianza_contrato" name="fianza_contrato" value="" required>
                </div>
                <div class="mb-3">
                    <label for="setting-input-3" class="form-label">Modificar el Monto Máximo del Contrato<span class="ml-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Modificar el 'Monto Máximo' en caso de un Topamiento y/o Destopamiento"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="green" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
<path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
<circle cx="8" cy="4.5" r="1"/>
</svg></span></label>
                    <input type="number" class="form-control" id="monto_contrato" name="monto_contrato" value="" required>
                </div>
                <div class="mb-3" style="margin-bottom:25px !important;">
                    <label for="setting-input-3" class="form-label">Contacto Proveedor</label>
                    <input type="email" class="form-control" id="contacto_contrato" name="contacto_contrato" value="proveedor@razonsocial.com">
                </div>
                <div class="mb-3" style="margin-bottom:25px !important;">
                    <input hidden="" readonly disable="disable" class="form-control" id="cajaNumeroContrato" name="no_contrato" value="" placeholder="no_contrato">
                </div>
                <button type="submit" class="btn app-btn-primary">Guadar Cambios</button>
                <a class="btn" style="background: #E74C3C !important; color: #fff !important; border-color: #E74C3C !important;" data-dismiss="modal" id="btnLimpiar">Salir</a>
                </form>
              </div><!--//app-card-body-->
            </div>
          </div>
        </div>
      </div>
      <footer class="app-footer">
		    <div class="container text-center py-3">
		         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
            <small class="copyright">Diseño y Desarrollo <i class="" style="color: #fb866a;"></i> por la <a class="app-link" href="" target="_blank">CDAE</a> Coordinación de Abastecimiento y Equipamiento</small>
		    </div>
	    </footer><!--//app-footer-->
    </div><!--//app-wrapper-->
    <!-- Javascript -->
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script>

    <!-- Charts JS -->
    <script src="assets/plugins/chart.js/chart.min.js"></script>

    <?php
    $link = mysqli_connect("localhost", "root");
    mysqli_select_db($link, "maryscae");
    $tildes = $link->query("SET NAMES 'utf8'");
    $pTotalContratos = "SELECT COUNT(no_contrato) as TC FROM info_contratos";
    $resultadoX = mysqli_query($link, $pTotalContratos);
    	while ($fila = mysqli_fetch_assoc($resultadoX))
    	{
    		$pTotalContratos2 = $fila['TC'];
    	}

    $pTotalContratosA = "SELECT COUNT(no_contrato) as TCA FROM info_contratos WHERE (status_contrato='A')";
    $resultadoX = mysqli_query($link, $pTotalContratosA);
    	while ($fila = mysqli_fetch_assoc($resultadoX))
    	{
    		$pTotalContratosA2 = $fila['TCA'];
    	}
    //Formalizado Inicio
    $pTotalContratosB = "SELECT COUNT(no_contrato) as TCB FROM info_contratos WHERE (status_contrato='B')";
    $resultadoY = mysqli_query($link, $pTotalContratosB);

    	while ($fila = mysqli_fetch_assoc($resultadoY))
    	{
    		$pTotalContratosB2 = $fila['TCB'];
    	}
    //Formalizado Fin
    //Elaboración + Validación Inicio
    $pTotalContratosC = "SELECT COUNT(no_contrato) as TCC FROM info_contratos WHERE (status_contrato='C')";
    $resultadoZ = mysqli_query($link, $pTotalContratosC);

    	while ($fila = mysqli_fetch_assoc($resultadoZ))
    	{
    		$pTotalContratosC2 = $fila['TCC'];
    	}
    //Formalizado Fin
    echo "<script type='text/javascript'>

    var totalContratos= '$pTotalContratos2';
    var totalElaboracion='$pTotalContratosA2';
    var totalValidacion='$pTotalContratosB2';
    var totalFormalizado='$pTotalContratosC2';

    varPie0 = totalContratos;
    varPie1 = totalElaboracion;
    varPie2 = totalValidacion;
    varPie3 = totalFormalizado;

    //alert ('Total' + varPie0 + 'Elaboracion' + varPie1 + 'Validacion' + varPie2 + 'Formalizado' + varPie3);

    window.chartColors = {
    	green: '#75c181',
    	blue: '#5b99ea',
      orange: '#F39C12',
    	gray: '#a9b5c9',
    	text: '#252930',
    	border: '#e7e9ed'
    };

    // Pie Chart Demo

    var pieChartConfig0 = {
    	type: 'pie',
    	data: {
    		datasets: [{
    			data: [
    				varPie1,
    				varPie2,
            varPie3,
    			],
    			backgroundColor: [
    				window.chartColors.blue,
            window.chartColors.orange,
            window.chartColors.green,
          ],
    			label: 'Dataset 1'
    		}],
    	},
    	options: {
    		responsive: true,
    		legend: {
    			display: false,
    			position: 'bottom',
    			align: 'center',
    		},

    		tooltips: {
    			titleMarginBottom: 5,
    			bodySpacing: 5,
    			xPadding: 4,
    			yPadding: 4,
    			borderColor: window.chartColors.border,
    			borderWidth: 1,
    			backgroundColor: '#fff',
    			bodyFontColor: window.chartColors.text,
    			titleFontColor: window.chartColors.text,

    			callbacks: {
              label: function(tooltipItem, data) {
    					//get the concerned dataset
    					var dataset = data.datasets[tooltipItem.datasetIndex];
    					//calculate the total of this data set
    					var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
    					return previousValue + currentValue;
    					});
    					//get the current items value
    					var currentValue = dataset.data[tooltipItem.index];
    					//calculate the precentage based on the total and current item, also this does a rough rounding to give a whole number
    					var percentage = Math.floor(((currentValue/total) * 100)+0.5);

    					return currentValue + ' contratos';
    			    },
                },
    		},
    	}
    };
    // Generate charts on load
    window.addEventListener('load', function(){

    	var pieChart0 = document.getElementById('chart-pie0').getContext('2d');
    	window.myPie0 = new Chart(pieChart0, pieChartConfig0);
    });

    </script>"
  ?>

    <?php
    $link = mysqli_connect("localhost", "root");
    mysqli_select_db($link, "maryscae");
    $tildes = $link->query("SET NAMES 'utf8'");
    $pTotalContratos = "SELECT SUM(monto_contrato) as TC FROM info_contratos WHERE (status_contrato='C')";
    $resultadoX = mysqli_query($link, $pTotalContratos);
    	while ($fila = mysqli_fetch_assoc($resultadoX))
    	{
    		$pTotalContratos2 = $fila['TC'];
    	}
    //Formalizado Inicio
    $super_dato_monto_trabajando = "SELECT SUM(devengo_contrato) AS DA FROM administra_contrato";
    $resultadoZ = mysqli_query($link, $super_dato_monto_trabajando);

    	while ($fila = mysqli_fetch_assoc($resultadoZ))
    	{
    		$super_dato_monto_trabajando2 = $fila['DA'];
    	}
    //Formalizado Fin
    echo "<script type='text/javascript'>

    var totalContratosFormalizados='$pTotalContratos2';
    var totalDevengoContratos='$super_dato_monto_trabajando2';

    datoFactor = totalContratosFormalizados + totalDevengoContratos;
    varPie1 = (totalDevengoContratos/datoFactor)*100;
    varPie2 = (totalContratosFormalizados/datoFactor)*100;

    window.chartColors = {
    	green: '#75c181', // rgba(117,193,129, 1)
    	blue: '#5b99ea', // rgba(91,153,234, 1)
    	gray: '#a9b5c9',
    	text: '#252930',
    	border: '#e7e9ed'
    };

    /* Random number generator for demo purpose */
    var randomDataPoint = function(){ return Math.round(Math.random()*100)};

    // Pie Chart Demo

    var pieChartConfig = {
    	type: 'pie',
    	data: {
    		datasets: [{
    			data: [
    				varPie1,
    				varPie2,
    			],
    			backgroundColor: [
    				window.chartColors.green,
    				window.chartColors.blue,
    			],
    		}],
    		labels: [
    			'FormalizadoXXX',
    			'Devengo',
    		]
    	},
    	options: {
    		responsive: true,
    		legend: {
    			display: true,
    			position: 'bottom',
    			align: 'center',
    		},
    		tooltips: {
    			titleMarginBottom: 5,
    			bodySpacing: 5,
    			xPadding: 8,
    			yPadding: 8,
    			borderColor: window.chartColors.border,
    			borderWidth: 1,
    			backgroundColor: '#fff',
    			bodyFontColor: window.chartColors.text,
    			titleFontColor: window.chartColors.text,
    			callbacks: {
                    label: function(tooltipItem, data) {
    					//get the concerned dataset
    					var dataset = data.datasets[tooltipItem.datasetIndex];
    					//calculate the total of this data set
    					var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
    					return previousValue + currentValue;
    					});
    					//get the current items value
    					var currentValue = dataset.data[tooltipItem.index];
    					//calculate the precentage based on the total and current item, also this does a rough rounding to give a whole number
    					var percentage = Math.floor(((currentValue/total) * 100)+0.5);

    					return percentage + ' %';
    			    },
                },
    		},
    	}
    };
    // Generate charts on load
    window.addEventListener('load', function(){

    	var pieChart = document.getElementById('chart-pie').getContext('2d');
    	window.myPie = new Chart(pieChart, pieChartConfig);
    });

    </script>"
  ?>

  <?php

  $link = mysqli_connect("localhost", "root");
  mysqli_select_db($link, "maryscae");
  $tildes = $link->query("SET NAMES 'utf8'");
  $pTotalContratos = "SELECT SUM(monto_contrato) as TC FROM info_contratos";
  $resultadoX = mysqli_query($link, $pTotalContratos);
    while ($fila = mysqli_fetch_assoc($resultadoX))
    {
      $pTotalContratos2 = $fila['TC'];
    }
  //Formalizado Inicio
  $super_dato_monto_formalizado = "SELECT SUM(devengo_contrato) AS DI FROM administra_contrato";
  $resultadoY = mysqli_query($link, $super_dato_monto_formalizado);

    while ($fila = mysqli_fetch_assoc($resultadoY))
    {
      $super_dato_monto_formalizado2 = $fila['DI'];
    }
  //Formalizado Fin
  echo "<script type='text/javascript'>

  var presupuestoGlobal='$pTotalContratos2';
  var devengoContratos='$super_dato_monto_formalizado2';
  datoFactor = presupuestoGlobal + devengoContratos;

  varPie1 = (presupuestoGlobal/datoFactor)*100;
  varPie2 = (devengoContratos/datoFactor)*100;

  window.chartColors = {
    green: '#75c181', // rgba(117,193,129, 1)
    blue: '#5b99ea', // rgba(91,153,234, 1)
    gray: '#a9b5c9',
    text: '#252930',
    border: '#e7e9ed'
  };
  // Pie Chart Demo

  var pieChartConfig2 = {
    type: 'pie',
    data: {
      datasets: [{
        data: [
          varPie1,
          varPie2,
        ],
        backgroundColor: [
          window.chartColors.green,
          window.chartColors.blue,
        ],
      }],
      labels: [
        'Presupuesto Global',
        'Devengo',
      ]
    },
    options: {
      responsive: true,
      legend: {
        display: true,
        position: 'bottom',
        align: 'center',
      },

      tooltips: {
        titleMarginBottom: 5,
        bodySpacing: 5,
        xPadding: 8,
        yPadding: 8,
        borderColor: window.chartColors.border,
        borderWidth: 1,
        backgroundColor: '#fff',
        bodyFontColor: window.chartColors.text,
        titleFontColor: window.chartColors.text,

        callbacks: {
            label: function(tooltipItem, data) {
            //get the concerned dataset
            var dataset = data.datasets[tooltipItem.datasetIndex];
            //calculate the total of this data set
            var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
            return previousValue + currentValue;
            });
            //get the current items value
            var currentValue = dataset.data[tooltipItem.index];
            //calculate the precentage based on the total and current item, also this does a rough rounding to give a whole number
            var percentage = Math.floor(((currentValue/total) * 100)+0.5);

            return percentage + '%';
            },
              },


      },
    }
  };
  // Generate charts on load
  window.addEventListener('load', function(){

    var pieChart2 = document.getElementById('chart-pie2').getContext('2d');
    window.myPie2 = new Chart(pieChart2, pieChartConfig2);
  });

  </script>"
?>

<script>
function buscarContrato(e) {
    var imprimeContrato = $(e).closest('tr').children('td.numeroDeContrato').text();
    var imprimeServicio = $(e).closest('tr').children('td.desDeContrato').text();


    $("#resultadoNumeroContrato").html(imprimeContrato);
    $("#resultadoNombreServicio").html(imprimeServicio);
    $("#cajaNumeroContrato").val(imprimeContrato);
};
</script>
<script type="text/javascript">
function myFunction() {
  var x = document.getElementById("fianza_contrato_modulo");
  if (x.style.display === "none") {
    x.style.display = "";
  } else {
    x.style.display = "none";
  }
}
</script>
<script type="text/javascript">
function myFunction() {
  var x = document.getElementById("fianza_contrato_modulo");
  if (x.style.display === "none") {
    x.style.display = "";
  } else {
    x.style.display = "none";
  }
}
</script>
<script>
      function limpiarCampos() {
        $("#btnLimpiar").click(function(event) {
     	   $("#formulario_actualiza_contrato")[0].reset();
         var x = document.getElementById("fianza_contrato_modulo");
         x.style.display = "none";
        });
      };
  </script>
<script>

 function saluda(){
   alert("hola");
 }

</script>
</body>
</html>
