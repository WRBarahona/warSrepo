<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Ticket</title>
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
				<div class="col-xs-8 col-md-8">
					<h1 class="display-4" style="margin-top: 50px;">Soluciones Técnicas</h1>
				</div> 
				<div class="col-xs-4 col-md-4" style="margin-top: 30px;">
					<?php 
						if (isset($_SESSION["usuario"])) {
							print "Bienvenido ".$_SESSION["usuario"]["nombUsuario"].
                                            "(".$_SESSION["usuario"]["rol"].").<br>";
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
		<!--INICIO NAV-->
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
					<a class="nav-link" href="#"> </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#"></a>
				</li>
			</ul>
		</div>
	</nav>
	<!--FIN NAV-->
	<section>
		<div class="container alert alert-info" role="alert">
			<center><h1><b>Gestión de ticket</b></h1></center>
		</div>
		<div id="d1" class="container jumbotron">
			<div class="row">
				<div class="col-md-12 col-lg-12 col-sm-12">
					<form method="POST" action="nuevoTicket.php">
						<!--inicio de formulario-->
						<div class="container">
							<div class="row">
								<div class="col-md-6 col-lg-6 col-sm-12">
									<b><label class="control-label">No Carnet</label></b>
									<input class="form-control" type="text" name="" required="" placeholder="--Digite su No de Carnet--" pattern="" max="" min="" title="" autofocus="true"><br>

									<b><label class="control-label">Departamento</label></b>
									<select class="form-control">
										<option value="">--Seleccione un departamento--</option>
										<option value="informatica">Sistemas</option>
										<option value="otro">Otros</option>
									</select>
									<br>

									<b><label class="control-label">Ingrese su Nombre</label></b>
									<input class="form-control" type="text" name="" required="" placeholder="--Nombre--" pattern="" max="" min="" title=""><br>

									<b><label class="control-label">Teléfono / Celular</label></b>
									<input class="form-control" type="text" name="" required="" placeholder="0000-0000" pattern="" title=""><br>
								</div>
								<div class="col-md-6 col-lg-6 col-sm-12">
									<b><label class="control-label">Fecha de reporte</label></b>
									<input class="form-control" type="date" required=""><br>

									<b><label class="control-label">Descripción del problema</label></b>
									<textarea class="form-control" rows="5" placeholder="--Describa el problema en el equipo--" name="" required="" minlength=""></textarea>
									<br>
								</div>
								<br>
								<div class="container-fluid">
									<center>
										<input class="btn btn-primary" type="submit" name="btnAgregar" value="Agregar">
										<a href="dashboardAdmin.php" class="btn btn-danger ">Cancelar</a>
									</center>
								</div>
							</div>
						</div>
					</form>
					<!--Fin de formulario--><br>
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