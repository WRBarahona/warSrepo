<?php 
session_start();
include 'clsVistaSoluciones.php';
$vistaSoluciones = new VistaSoluciones();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="icon" href="../img/icono.png">
	<title>Vista de tickets solucionados</title>
	<meta name="viewpot" content="width=device-width,Initial-escale=1,Maximun-scale=1">
 	<script src="../plugins/js/jquery.js"></script>        
	<script src="../plugins/js/sweetalert2.all.min.js"></script>
	<link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.css">	
	<link rel="stylesheet" href="../plugins/css/estilosDashboard.css">
</head>
<body >
	<header id="cabecera">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-4 col-md-4">
					<h1 class="display-4" style="margin-top: 50px;">Soluciones Técnicas</h1>
				</div> 
				<div class="col-xs-4 col-md-4">
					<img class="img-thumbnail"src="../img/logo2.jpg" alt="" id="logoEmpresa">
				</div> 
				<div class="col-xs-4 col-md-4" style="margin-top: 30px;">
					<?php 
						if (isset($_SESSION["usuario"])) {
							if ($_SESSION["usuario"]["rol"]=='3') {
								print "<h1 class ='display-4'; style='font-size:25px;'>Bienvenido/a <b>".$_SESSION["usuario"]["nombUsuario"]. "</b></h1>";
	                            print "<a style='text-decoration:none; color:#fff' href='acceso.php?cerrar=true'><button  class='btn btn-danger btn-lg'>Cerrar sesión</button></a><br>";
	                        }
							else{
								header("Location: acceso.php?cerrar=true");
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

	<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
	 <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
		<span class="navbar-toggler-icon"></span>	
	  </button>	
		<div class="collapse navbar-collapse" id="collapse_target">
			<span class="navbar-text"></span>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="frmDashboardAdmin.php">Inicio</a>
				</li>
 				<li class="nav-item">
					<a class="nav-link" href="frmAsigTicket.php">Asignación Ticket</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="frmTecnico.php">Técnicos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="frmNuevoUsuario.php">Usuarios</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="frmGraficos.php">Gráficos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="frmVistaSoluciones.php">Vista de tickets solucionados</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="frmVistaTickClientes.php">Vista de tickets pendientes</a>
				</li>
			</ul>
		</div>
	</nav>
	  
	<section class="container">
		<br>
		<h1 class="display-5" align="center">Vista general de tickets solucionados</h1>
		<br>
		<!--<h2 class="display-4" align="center" style="font-size: 35px;">Filtre los tickets según fecha</h2><br>
		<hr width="1000">
		<br>
		<form action="#" method="post" id="miform">
			<div id="d1"></div>
			<div class="row">
				<div class="col-md-5">
					<h1 class="display-4" style="font-size: 25px; text-align: right;">Elija una fecha:</h1>
				</div>			 			 
					<input type="date" name="fechaFiltro" id="fechaFiltro"> &nbsp;
					<input type="button" id="btnBuscar" name="btnBuscar" value="Buscar" class="btn btn-primary"> &nbsp;
					<input type="submit" id="btnLimpiar" name="btnLimpiar" value="Limpiar" class="btn btn-secondary">	
			</div>	 	
		</form>-->
		<div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12">
			<?php 
				print $vistaSoluciones->verSoluciones();
			?>
			</div>
		</div>

		<br><br>
		<!--<?php /*
			if(isset($_REQUEST["hdnBuscar"])){
				print utf8_encode($vistaSoluciones->mostrarFiltrados($_REQUEST ["fechaFiltro"]));
			}
			else if(isset($_REQUEST["btnLimpiar"])){
				print utf8_encode($obj->mostrarTickets($idUsuario)); 
			}*/
		 ?>-->
	</section>
	<footer id="pie">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-4 col-md-4">
					<img class="img-fluid" src="../img/itca.png" alt="Responsive Image" id="logoItca">
				</div>
				<div class="col-xs-4 col-md-4">
					<h1 class="display-4">Soluciones Técnicas</h1> 
				</div> 
				<div class="col-xs-4 col-md-4">
					<img class="img-thumbnail"src="../img/logo2.jpg" alt="" id="logoEmpresa">
				</div> 
			</div>	
		</div>			
	</footer>
	
</body>
	<!--<script type="text/javascript">
		$(document).ready(function() {
			 $('#btnBuscar').click(function(){
			 		select = $('#fechaFiltro').val();
			 		if (select=="") {
			 			Swal.fire({
						  type: 'error',
						  title: 'Oops...',
						  text: '¡Elija un parametro de búsqueda para mostrar los tickets!',  				   		 	
						});
			 		}else{
			 			$("#d1").prepend("<input type='hidden' name='hdnBuscar' value='1'>");
			 			$("#miform").submit();
			 		}
			 });
		});
	</script>-->
</html>