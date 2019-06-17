<?php 
session_start();
include 'clsCerrarTicket.php';
//include 'credenciales.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Técnico - Resolución de tickets y vista</title>
	<link rel="icon" href="../img/icono.png">
	<meta name="viewpot" content="width=device-width,Initial-escale=1,Maximun-scale=1">
	<script src="../plugins/js/jquery.js"></script>        
	<script src="../plugins/js/sweetalert2.all.min.js"></script>
	<link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="../plugins/css/estilosDashboard.css">
</head>
<body background="../img/fondo2.jpg">
	<header id="cabecera">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-4 col-md-4">
					<img class="img-fluid" src="../img/itca.png" alt="Responsive Image" id="logoItca">
				</div>
				<div class="col-xs-4 col-md-4">
					<img class="img-thumbnail"src="../img/logo2.jpg" alt="" id="logoEmpresa">
				</div> 
				<div class="col-xs-4 col-md-4" style="margin-top: 30px;">
					<?php 
					if (isset($_SESSION["usuario"])) {
						print "<h1 class ='display-4'; style='font-size:25px;'>Bienvenido/a. Téc.<b>".$_SESSION["usuario"]["nombUsuario"]. "</b></h1>";
						// --*/INCIO*/ MOSTRANDO LA FOTO DEL TECNICO SEGUN SU ID -- //
						$idUsuario =  $_SESSION["usuario"]["idUsuario"];

						$img = new solucionTicket();
						$img->MostrarFoto($idUsuario);

						// --*/FIN*/ MOSTRANDO LA FOTO DEL TECNICO SEGUN SU ID -- //	
						if ($_SESSION["usuario"]["rol"]==2) {
							?>
							<script type="text/javascript">
								$(document).ready(function(){
									Swal.fire('¡Bienvenido/a Técnico!');   
								});
							</script>
							<?php
						}
					}
					else{
						header("Location:../index.php");
					}
					?>
				</div> 
			</div>
		</div>
	</header>
	
	<section>
		<div class="container" style="margin: auto;">
			<div class="card-columns" id="cartas">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title" align="center">CERRAR TICKET</h4>
					</div><br>
					<img  class="rounded mx-auto d-block" class="card-img-top"  src="../img/cerrarTicket.png "><br>
					<div class="card-body" align="center" style="background-color: #ECEFF1">				
						<p class="card-tetx" align="center">
							Actualice el estado del ticket solucionado.
						</p>
						<a href="frmCierreTicket.php" class="btn btn-secondary" align="">Cerrar ticket</a>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<h4 class="card-title" align="center">MIS TICKETS</h4>
					</div><br>
					<img  class="rounded mx-auto d-block" class="card-img-top"  src="../img/verReporte.png "><br>
					<div class="card-body" align="center" style="background-color: #ECEFF1">							
						<p class="card-tetx" align="center">
							Busque y consulte sus anteriores tickets.
						</p>
						<a href="frmListarTicketsTecnico.php" class="btn btn-secondary" align="">Ver mis tickets</a>
					</div>
				</div>	
				<div class="card">
					<div class="card-header">
						<h4 class="card-title" align="center">LOGOUT</h4>
					</div><br>
					<img  class="rounded mx-auto d-block" class="card-img-top"  src="../img/cerrarSesion.png"><br>
					<div class="card-body" align="center" style="background-color: #ECEFF1">				
						<p class="card-tetx" align="center">
							Cerrar sesión activa.
						</p>
						<a href="acceso.php?cerrar=true'" class="btn btn-danger" align="">Cerrar sesión</a>
					</div>
				</div>		
			</div>
		</div>
	</section>
	<footer id="pie">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-4 col-md-4">
					<img class="img-fluid" src="../img/itca.png" alt="Responsive Image" id="logoItca">
				</div>
				<div class="col-xs-4 col-md-4">
					<br><br><br>
					<p>Copyright ©</p>
					<p>« Nelson ║ Mario ║ Mariano ║ Adonay ║ William »</p> 
				</div> 
				<div class="col-xs-4 col-md-4">
					<img class="img-thumbnail"src="../img/logo2.jpg" alt="" id="logoEmpresa">
				</div> 
			</div>	
		</div>			
	</footer>
	
</body>
</html>