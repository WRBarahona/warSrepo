<?php 
	session_start();
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Administración de reportes</title>
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
		<div class="container">
			<div class="card-columns" id="cartas">
				<div class="card">
					<div class="card-header">
  					  <h4 class="card-title" align="center">NUEVO REPORTE</h4>
  					</div><br>
					<img  class="rounded mx-auto d-block" class="card-img-top"  src="../img/NRptAdmin.png"><br>
						<div class="card-body" align="center" style="background-color: #ECEFF1">							
							<p class="card-tetx" align="center">
								Realice un nuevo reporte de equipo defectuoso o dañado.
							</p>
							<a href="nuevoReporte.php" class="btn btn-secondary" align="">Crear Nuevo Reporte</a>
						</div>
				</div>	
				<div class="card">
					<div class="card-header">
  					  <h4 class="card-title" align="center">BUSCAR REPORTES</h4>
  					</div><br>
					<img  class="rounded mx-auto d-block" class="card-img-top"  src="../img/RptAdmin.png"><br>
						<div class="card-body" align="center" style="background-color: #ECEFF1">							
							<p class="card-tetx" align="center">
								Busque, filtre, vea y consulte sus anteriores reportes.
							</p>
							<a href="" class="btn btn-secondary" align="">Buscar Reportes</a>
						</div>
				</div>
				<div class="card">
					<div class="card-header">
  					  <h4 class="card-title" align="center">CREAR GRÁFICOS</h4>
  					</div><br>
					<img  class="rounded mx-auto d-block" class="card-img-top"  src="../img/AdmGraficas.png"><br>
						<div class="card-body" align="center" style="background-color: #ECEFF1">							
							<p class="card-tetx" align="center">
								Genere gráficas para conocer la tendencia de los reportes realizados por los usuarios.
							</p>
							<a href="" class="btn btn-secondary" align="">Generar Gráficas</a>
						</div>
				</div>
				<div class="card">
					<div class="card-header">
  					  <h4 class="card-title" align="center">EQUIPOS</h4>
  					</div><br>
					<img  class="rounded mx-auto d-block" class="card-img-top"  src="../img/equipo.png"><br>
						<div class="card-body" align="center" style="background-color: #ECEFF1">							
							<p class="card-tetx" align="center">
								Ingrese, busque, vea y modifique información de los equipos.
							</p>
							<a href="" class="btn btn-secondary" align="">Administrar Equipos</a>
						</div>
				</div>
				<div class="card">
					<div class="card-header">
  					  <h4 class="card-title" align="center">USUARIOS</h4>
  					</div><br>
					<img  class="rounded mx-auto d-block" class="card-img-top"  src="../img/ussers.png"><br>
						<div class="card-body" align="center" style="background-color: #ECEFF1">							
							<p class="card-tetx" align="center">
								Ingrese, busque, vea y modifique información de los usuarios.
							</p>
							<a href="" class="btn btn-secondary" align="">Administrar Usuarios</a>
						</div>
				</div>
				<div class="card">
					<div class="card-header">
  					 <h4 class="card-title" align="center">LOGOUT</h4>
  					</div><br>	
					 <img  class="rounded mx-auto d-block" class="card-img-top" src="../img/cerrarSesion.png"><br>
						<div class="card-body" align="center">						
							<div class="card-footer"  style="background-color: #ECEFF1">
								<button  class='btn btn-danger btn-lg'><a style='text-decoration:none; color:#fff' href=''>Cerrar sesión</a></button>
							</div>							
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