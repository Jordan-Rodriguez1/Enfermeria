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
  <path fill-rule="evenodd" d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
</svg>
					            <span class="icon-badge">I</span>
					        </a><!--//dropdown-toggle-->
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
        </div><!--//copiar desde aqui-->
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
      <div class="app-content p-lg-4" style="margin-top:-25px !important; padding-top:-25px !important;">
      <div class="card-body" style="border-color:#59d05d !important;">
      <h1 class="app-page-title mb-4">Pendiente de Firma del TOOADR</h1>
          <table class="table table-head-bg-success table-striped table-hover">
            <thead style="background-color:#59d05d !important; font-size: 0.875rem !important; color:#ffffff !important; vertical-align: middle !important; border:1px !important; font-size:14px; border-color:#ebedf2 !important; padding:0.75rem !important;">
              <tr>
                <th scope="col">Número</th>
                <th scope="col">Descripción</th>
                <th scope="col">Termino</th>
                <th scope="col">Máximo</th>
              </tr>
            </thead>
            <tbody style="font-size: 0.875rem !important;">
              <?php
              $link = mysqli_connect("localhost", "root");
              mysqli_select_db($link, "maryscae");
              $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente

$result = mysqli_query($link, "SELECT ro.status_contrato, ro.no_contrato, ro.desc_contrato, ro.area_contrato, ro.termino_contrato, ro.monto_contrato, SUM(ac.devengo_contrato) as Devengo FROM info_contratos ro, administra_contrato ac WHERE ro.no_contrato = ac.no_contrato AND status_contrato='D' GROUP BY ro.no_contrato");
              while ($fila = mysqli_fetch_assoc($result)){
              echo "<tr>";
//Termina aqui buscarContrato(this); data-toggle='modal' data-target='#myModal'
              echo "<td class='numeroDeContrato' style='font-weight:bold; cursor: pointer;'><a onClick='limpiarCampos();buscarContrato(this);' data-toggle='modal' data-target='#myModal'>".$fila['no_contrato']."</a>
              </td>";
              echo "<td class='proveedor'>".$fila['area_contrato']."</td>";
              echo "<td class='proveedor'>".$fila['termino_contrato']."</a></td>";
              echo "<td>$".number_format($fila['monto_contrato'],2)."</td>";
              echo "</tr>";
              }
              mysqli_free_result($result);
              mysqli_close($link);
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div id="myModal" class="modal" role="dialog" style="overflow-y: auto !important;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <div class="" style="color:##2E4053; font-weight:bold;" id="resultadoNombreServicio"></div>
              <div class="" style="color:#5cb377; font-size:20px;" id="resultadoNumeroContrato"></div>
            </div>
            <div class="modal-body">
              <div class="app-card-body">
                <form class="settings-form" id="formulario_actualiza_contrato" method="POST" action="php/modificaElContrato_titular.php">
                  <div class="mb-3">
                    <label for="setting-input-1" class="form-label">Acción<span class="ml-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Cómo Titular del Órgano de Operación Administrativa Desconcentrado Regional en Colima, sólo podrá indicar sí procedió la firma en Instrumento y se liberá al Proveedor o en su defecto se determinó la cancelación del mismo"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="red" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
<path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
<circle cx="8" cy="4.5" r="1"/>
</svg></span></label>
                    <select type="text" class="form-control" id="status_contrato" name="status_contrato" required>
                        <option></option>
                        <option value="E">Firmado</option>
                        <option value="H">Cancelado</option>
                    </select>
                </div>
                <div class="mb-3" style="margin-bottom:25px !important;">
                    <input hidden="" readonly disable="disable" class="form-control" id="cajaNumeroContrato" name="no_contrato" value="" placeholder="">
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
