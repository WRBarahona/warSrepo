<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Reporte</title>
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
			<center><h1><b>Gestión de reporte</b></h1></center>
		</div>
		<div id="d1" class="container jumbotron">
			<div class="row">
				<div class="col-md-12 col-lg-12 col-sm-12">
					<form method="POST" action="nuevoReporte.php">
						<!--inicio de formulario-->
						<div class="container">
							<div class="row">
								<div class="col-md-6 col-lg-6 col-sm-12">
									<b><label class="control-label">Dato</label></b>
									<input class="form-control" type="text" name=""minlength="5" maxlength="25" pattern="[A-Z a-z]+" required=""><br>

									<b><label class="control-label">Dato</label></b>
									<input class="form-control" type="text" name="" placeholder="" required="" pattern="" maxlength="" minlength=""><br>

									<b><label class="control-label">Dato</label></b>
									<input class="form-control" type="text" name="" required="" placeholder="" pattern="" max="" min="" title=""><br>

									<b><label class="control-label">Dato</label></b>
									<input class="form-control" type="text" name="" required="" placeholder="" pattern="" title=""><br>
								</div>
								<div class="col-md-6 col-lg-6 col-sm-12">
									<b><label class="control-label">Dato</label></b>
									<input class="form-control" type="text" name="" placeholder="" required="" pattern="" title=""><br>

									<b><label class="control-label">Dato</label></b>
									<input class="form-control" type="Email" name="" placeholder="" required=""><br>

									<b><label class="control-label">Dato</label></b>
									<textarea class="form-control" placeholder="" name="" required="" minlength=""></textarea>
									<br>
								</div>
								<div class="container-fluid">
									<input class="btn btn-primary btn-sm" type="submit" name="btnAgregar" value="Agregar">
								</div>
							</div>
						</div>
					</form><!--Fin de formulario--><br>
					<div class="container-fluid">
						<a href="dashboardAdmin.php" class="btn btn-danger btn-sm">Cancelar</a>
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
					<h1 class="display-4">Soluciones Técnicas</h1> 
				</div> 
				<div class="col-xs-4 col-md-4">
					<img class="img-thumbnail"src="../img/logo2.jpg" alt="" id="logoEmpresa">
				</div> 
			</div>	
		</div>			
	</footer>
	

</body>
</html>