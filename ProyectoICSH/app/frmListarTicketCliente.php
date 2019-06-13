<?php 
session_start();
include 'clsTicket.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Mis tickets -- Cliente</title>
	<meta name="viewpot" content="width=device-width,Initial-escale=1,Maximun-scale=1">
 	<script src="../plugins/js/jquery.js"></script>        
	<script src="../plugins/js/sweetalert2.all.min.js"></script>
	<link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.css">	
	<link rel="stylesheet" href="../plugins/css/estilosDashboard.css">
</head>
<body>
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
							print "Bienvenido/a  ".$_SESSION["usuario"]["nombUsuario"]."<br>";
                            print "<a style='text-decoration:none; color:#fff' href='acceso.php?cerrar=true'><button  class='btn btn-danger btn-lg'>Cerrar sesión</button></a><br>"; 
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
					<a class="nav-link" href="frmDashboardCliente.php">INICIO</a>
				</li>
 				<li class="nav-item">
					<a class="nav-link" href="frmNuevoTicket.php">Nuevo ticket</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Mis tickets</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#"></a>
				</li>
			</ul>
		</div>
	</nav>
	  
	<section class="container">
		<h1 class="display-4" align="center">Busqueda de tickets</h1> 
		<h1 class="display-4" align="center" style="font-size: 35px;">Filtre sus tickets por: Resueltos o Pendientes</h2><br>
		<p align="center"><b>Leyenda de Estado</b> 0 ->Resuelto 1->Pendiente</p>
		<hr width="1000">
		<br>
		<form action="#" method="post" id="miform">
			<div id="d1"></div>
			<div class="row">
				<div class="col-md-3">
					<h1 class="display-4" style="font-size: 30px; text-align: right;">Elija una opción:</h1>
				</div>			 			 
				<div class="col-md-5">
					<select name="selectFiltro" id="selectFiltro" class="form-control">
					<option value=""></option>
					<option value="0">Resuelto</option>
					<option value="1">Pendiente</option>
					</select>
				</div>
				<div class="col-md-4">
					<input type="button" id="btnBuscar" name="btnBuscar" value="Buscar" class="btn btn-primary"> &nbsp;
					<input type="submit" id="btnLimpiar" name="btnLimpiar" value="Limpiar" class="btn btn-secondary">	 
				</div>
			</div>	 	
		</form>
		<br><br>
		<?php 
			$obj = new Ticket();
		    
			$idUsuario = $_SESSION["usuario"]["idUsuario"];          
			if(isset($_REQUEST["hdnBuscar"])){
				print utf8_encode($obj->mostrarTicketsFiltrados($idUsuario,$_REQUEST ["selectFiltro"]));
			}
			else if(isset($_REQUEST["btnLimpiar"])){
				print utf8_encode($obj->mostrarTickets($idUsuario)); 
			}
			else{
				 print utf8_encode($obj->mostrarTickets($idUsuario)) ;
			}
		
		 ?>
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
	<script type="text/javascript">
		$(document).ready(function() {
			 $('#btnBuscar').click(function(){
			 		select = $('#selectFiltro').val();
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
	</script>
</html>