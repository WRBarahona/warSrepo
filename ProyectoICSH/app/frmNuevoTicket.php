<?php 
session_start();
include 'clsTicket.php';
include 'enviar.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Crear un nuevo Ticket</title>
	<meta name="viewpot" content="width=device-width,Initial-escale=1,Maximun-scale=1">
	<script src="../plugins/js/jquery.js"></script>        
	<script src="../plugins/js/sweetalert2.all.min.js"></script>
	<link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="../plugins/css/estilosDashboard.css">
	 <script type="text/javascript" src="../plugins/js/validacionNumerica.js"></script>
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
							print "Bienvenido/a ".$_SESSION["usuario"]["nombUsuario"]."<br>";
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
					<a class="nav-link" href="frmNuevoTicket.php">Nuevo Ticket</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="frmListarTicketCliente.php">Mis Tickets </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#"></a>
				</li>
			</ul>
		</div>
	</nav>
	<!--FIN NAV-->
	<section>
		<div class="container alert alert-info" role="alert" style="margin-top: 15px;">
			<center><h1><b>Nuevo  Ticket</b></h1></center>
		</div>
		<div  class="container jumbotron" style="width: 75%;">
			<div class="row">
				<div class="col-md-12 col-lg-12 col-sm-12">
					<form method="POST" action="#" name="frmTicket" id="miform">
						<div id="d1"></div>
						<!--inicio de formulario-->
						<div class="container">
							<div class="row">
								<div class="col-md-6 col-lg-6 col-sm-12">
									<b><label class="control-label">No Carnet</label></b>				
										<?php 
											 $tic = new Ticket();
											 $tic->mostrarCarnet();
										 ?>
									<br>	
									<b><label class="control-label">Seleccione su departamento</label></b>
									<select id="txtDepartamento" name="txtDepartamento" class="form-control">
										<option value=""></option>
										<option value="Sistemas">RRHH</option>
										<option value="Redes">Contaduría</option>
										<option value="Mantenimiento">Compras y suministros</option>
										<option value="Otros">Otros</option>
									</select>
									<br>

									<b><label class="control-label">Ingrese su Nombre</label></b>
									<input class="form-control" name="txtNombre" type="text" id="txtNombre">
									<br>

									<b><label class="control-label">Teléfono / Celular</label></b>
									<input class="form-control" type="text" id="txtTelefono"  name="txtTelefono"  placeholder="0000-0000" pattern="[0-9]{4}-[0-9]{4}" onkeypress="return soloNumeros(event)">
									<br>
								</div>

								<div class="col-md-6 col-lg-6 col-sm-12">
									<b><label class="control-label">Fecha de reporte</label></b>
									<input class="form-control" name="txtFecha" id="txtFecha" type="date" min="2019-01-01"><br>

									<b><label class="control-label">Descripción del problema</label></b>
									<textarea class="form-control" name="txtDescripcion" id="txtDescripcion"rows="5" placeholder="--Describa el problema del equipo--"></textarea>
								</div>
								<br>

								<div class="container-fluid">
									<center>								
										<input type="button" class="btn btn-outline-info" value="Enviar y Guardar Ticket" id="btnGuardarTicket" >	
										<a href="reportes/pdfTicketCliente.php" target="_blank">
											<input type="button" name="btnImprimir" class="btn btn-dark" id="btnImprimir" value="Imprimir Ticket">
										</a>
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
	<?php 
		$tic = new Ticket();
		if (isset($_REQUEST["hdnIngresar"])) {
			$tic->agregar($_REQUEST['txtCarnet'],$_REQUEST['txtFecha'],$_REQUEST['txtDescripcion']);
			llenarCorreo($_REQUEST['txtDepartamento'],$_REQUEST['txtNombre'], $_REQUEST['txtTelefono'],$_REQUEST['txtFecha'],$_REQUEST['txtDescripcion']);
		}
	 ?>
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
<script type="text/javascript">
	$(document).ready(function(){
		$('#btnGuardarTicket').click(function(){
			id = $('#txtCarnet').val();	
			depto = $('#txtDepartamento').val();
			nombre = $('#txtNombre').val();
			tel = $('#txtTelefono').val();
			fecha = $('#txtTelefono').val();
			descrip = $('#txtDescripcion').val();			
			$("#d1").prepend("<input type='hidden' name='hdnIngresar' value='1'>");
			if (id=="" || depto=="" || nombre=="" || tel=="" || fecha=="" || descrip=="") {
				Swal.fire({
				  type: 'error',
				  title: 'Oops...',
				  text: '¡Llene todos los campos para enviar el ticket!',		  				   		 	
				});				 
			}
			else{
				Swal.fire({
					type:'question',
					title: 'Confimación de envío de ticket',
					text: '¿Está seguro de enviar este ticket?',
					showCancelButton:true,
                    cancelButtonColor:"red",
                    confirmButtonColor:"green",
                    cancelButtonText:"Cancelar",
                    confirmButtonText:"¡Sí, enviar!",
                    customClass: "swal_alert",
				}).then((result)=>{
					if (result.value) {
						$("#miform").submit();			
					}	
							
				})				
			}		
		});

		
	});
</script>
</html>