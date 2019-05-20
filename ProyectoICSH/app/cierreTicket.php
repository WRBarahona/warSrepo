<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cerrar Ticket</title>
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
				<div class="col-xs-4 col-md-4">
					<img class="img-thumbnail"src="../img/logo2.jpg" alt="" id="logoEmpresa">
				</div> 
			</div>
		</div>
	</header>
	
	<section>
		<div class="container alert alert-info" role="alert">
			<center><h1><b>Cierre de ticket</b></h1></center>
		</div>
		<div id="d1" class="container jumbotron">
			<div class="row">
				<div class="col-md-12 col-lg-12 col-sm-12">
					<form method="POST" action="nuevoTicket.php">
						<!--inicio de formulario-->
						<div class="container">
							<div class="row">
								<div class="col-md-6 col-lg-6 col-sm-12">
									<b><label class="control-label">ID de técnico</label></b>
									<select class="form-control">
										<option value="">--Seleccione un técnico--</option>
										<option value="tec1">Tecnico 1</option>
										<option value="tec2">Tecnico 2</option>
										<option value="tec3">Tecnico 3</option>
										<option value="tec4">Tecnico 4</option>
										<option value="tec5">Tecnico 5</option>
										<option value="tec2">Tecnico 6</option>
									</select><br>

									<b><label class="control-label">Ingrese el ID del ticket solucionado</label></b>
									<input class="form-control" type="text" name="" required="" placeholder="--Nombre--" pattern="" max="" min="" title=""><br>

									<b><label class="control-label">Categoría</label></b>
									<input class="form-control" type="text" name="" required="" placeholder="" pattern="" title=""><br>
								</div>
								<div class="col-md-6 col-lg-6 col-sm-12">
									<b><label class="control-label">Fecha de cierre de ticket</label></b>
									<input class="form-control" type="date" required=""><br>

									<b><label class="control-label">Resolución/Conclusión del problema</label></b>
									<textarea class="form-control" rows="5" placeholder="--Describa el problema en el equipo--" name="" required="" minlength=""></textarea>
									<br>
								</div>
								<br>
								<div class="container-fluid">
									<center>
										<input class="btn btn-primary" type="submit" name="btnAgregar" value="Agregar">
										<a href="dashboardTecnico.php" class="btn btn-danger ">Cancelar</a>
									</center>
								</div>
							</div>
						</div>
					</form>
					<!--Fin de formulario--><br>
					<!--<div class="container-fluid">
						<center><a href="dashboardAdmin.php" class="btn btn-danger btn-sm">Cancelar</a></center>
					</div>-->
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