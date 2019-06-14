<?php 
session_start();
include 'clsCerrarTicket.php';
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
					<a class="nav-link" href="frmDashboardTec.php">INICIO</a>
				</li>
 				<li class="nav-item">
					<a class="nav-link" href="frmCierreTicket.php">Cierre de Ticket</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="frmListarTicketsTecnico.php">Mis tickets</a>
				</li>
			</ul>
		</div>
	</nav>
	<section class="container">
		<h1 class="display-4" align="center" style="margin-top: 10px;">Listado de tickets solucionados</h1> 
	 	<br>
		<?php 
			$solu = new solucionTicket();
			$idUsuario = $_SESSION["usuario"]["idUsuario"];
		 	print utf8_encode($solu->mostrarTickets($idUsuario));				
		 ?>
		 <br>
		<hr>
		 <a href="reportes/pdfTicketsTecnico.php" target="_blank">
		  	<input style="margin-top: 15px; margin-bottom: 20px;" type="button" name="btnImprimir" class="btn btn-dark" id="btnImprimir" value="Imprimir listados de tickets">
		</a>	
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
		
	</script>
</html>
