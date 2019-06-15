<?php 

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Administración General</title>
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
					<h1 class="display-4" style="margin-top: 50px;">Soluciones Técnicas</h1>
				</div> 
				<div class="col-xs-4 col-md-4">
					<img class="img-thumbnail"src="../img/logo2.jpg" alt="" id="logoEmpresa">
				</div> 
				<div class="col-xs-4 col-md-4" style="margin-top: 30px;">
						<?php 
						if (isset($_SESSION["usuario"])) {
                            if ($_SESSION["usuario"]["rol"]==3) {
							print "Bienvenido ".$_SESSION["usuario"]["nombUsuario"].
                                            "(".$_SESSION["usuario"]["rol"].").<br>";
                            print "<a style='text-decoration:none; color:#fff' href='acceso.php?cerrar=true'><button  class='btn btn-danger btn-lg'>Cerrar sesión</button></a><br>";	
                            	?>
                            	 <script type="text/javascript">
                                            $(document).ready(function(){
                                                Swal.fire({
												  position: 'top-end',
												  type: 'success',
												  title: '¡Bienvenido Administrador!',
												  showConfirmButton: false,
												  timer: 1500
												})  
                                            });
                                </script>
                            	<?php
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
	
	<section>
		<div class="container">
			<div class="card-columns" id="cartas">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title" align="center">ASIGNACIÓN DE TICKET</h4>
					</div><br>
					<img  class="rounded mx-auto d-block" class="card-img-top"  src="../img/NRptAdmin.png"><br>
					<div class="card-body" align="center" style="background-color: #ECEFF1">							
						<p class="card-tetx" align="center">
							Realice una asignación de ticket a un técnico para su debida solución.
						</p>
						<a href="frmAsigTicket.php" class="btn btn-secondary" align="">Asignar ticket</a>
					</div>
				</div>	
				<div class="card">
					<div class="card-header">
						<h4 class="card-title" align="center">CREAR GRÁFICOS</h4>
						<br>
					</div><br>
					<img  class="rounded mx-auto d-block" class="card-img-top"  src="../img/AdmGraficas.png"><br>
					<div class="card-body" align="center" style="background-color: #ECEFF1">							
						<p class="card-tetx" align="center">
							Genere gráficas para conocer la tendencia de los reportes realizados por los usuarios.
						</p>
						<a href="frmGraficos.php" class="btn btn-secondary" align="">Generar Gráficas</a>
					</div>
				</div>	
				<div class="card">
					<div class="card-header">
						<h4 class="card-title" align="center">TECNICOS</h4>
					</div><br>
					<img  class="rounded mx-auto d-block" class="card-img-top"  src="../img/tecnico.png"><br>
					<div class="card-body" align="center" style="background-color: #ECEFF1">							
						<p class="card-tetx" align="center">
							Ingrese, busque, vea y modifique información de los tecnicos.
						</p>
						<a href="frmTecnico.php" class="btn btn-secondary" align="">Administrar Tecnicos</a>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<h4 class="card-title" align="center">VISTA GENERAL DE TICKETS RESUELTOS</h4>
					</div><br>
					<img  class="rounded mx-auto d-block" class="card-img-top"  src="../img/RptAdmin.png"><br>
					<div class="card-body" align="center" style="background-color: #ECEFF1">							
						<p class="card-tetx" align="center">
							Vea y consulte los tickets resueltos hasta la fecha.
						</p>
						<a href="frmVistaSoluciones.php" class="btn btn-secondary" align="">Buscar Ticket</a>
					</div>
				</div>
				<div class="card">
						<div class="card-header">
							<h4 class="card-title" align="center">USUARIOS</h4>
						</div><br>
						<img  class="rounded mx-auto d-block" class="card-img-top"  src="../img/ussers.png"><br>
						<div class="card-body" align="center" style="background-color: #ECEFF1">							
							<p class="card-tetx" align="center">
								Gestione los usuarios actualmente registrados en el sistema.
							</p>
							<a href="frmNuevoUsuario.php" class="btn btn-secondary" align="">Administrar Usuarios</a>
						</div>
				</div>
				<div class="card">
					<div class="card-header">
						<h4 class="card-title" align="center">VISTA GENERAL DE TICKETS PENDIENTES</h4>
					</div><br>
					<img  class="rounded mx-auto d-block" class="card-img-top"  src="../img/RptAdmin.png"><br>
					<div class="card-body" align="center" style="background-color: #ECEFF1">							
						<p class="card-tetx" align="center">
							Vea y consulte todos los tickets aun sin resolver.
						</p>
						<a href="frmVistaTickClientes.php" class="btn btn-secondary" align="">Buscar Ticket</a>
					</div>
				</div>
					<!--<div class="card">
						<div class="card-header">
							<h4 class="card-title" align="center">LOGOUT</h4>
						</div> 					 					
						<div class="card-footer"  style="text-align: center;">
								<?php 
									/*if (isset($_SESSION["usuario"])) {							
		                            print "<a style='text-decoration:none; color:#fff' href='acceso.php?cerrar=true'><button  class='btn btn-danger btn-lg'>Cerrar sesión</button></a><br>";
									}*/
								?>
						</div>				 
					</div>-->
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