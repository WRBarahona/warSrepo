<?php 
session_start();
include 'clsCerrarTicket.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cerrar Ticket</title>
	<link rel="icon" href="../img/icono.png">
	<meta name="viewpot" content="width=device-width,Initial-escale=1,Maximun-scale=1">
	<script src="../plugins/js/jquery.js"></script>        
	<script src="../plugins/js/sweetalert2.all.min.js"></script>
	<link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="../plugins/css/estilosDashboard.css">
	<script type="text/javascript">
		$(document).ready(function(){
			<?php 
			if (isset($_REQUEST["m"])) {?>
				Swal.fire({
					type: 'success',
					title: '¡Bien hecho!',
					text: '¡Ticket cerrado exitosamente!',   
					showConfirmButton: false,
					timer: 1700                       
				});
			<?php } ?>
		});
	</script>
</script>
</head>
<body background="../img/fondo2.jpg">
	<header id="cabecera">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-4 col-md-4">
					<h1 class="display-4" style="margin-top: 50px;">Soluciones Técnicas</h1>
				</div> 
				<div class="col-xs-6 col-md-6">
					<img class="img-thumbnail"src="../img/logo2.jpg" alt="" id="logoEmpresa">
				</div> 
				<div class="col-xs-2 col-md-2" style="margin-top: 30px;">
					<?php 
					if (isset($_SESSION["usuario"])) {
						print "Bienvenido ".$_SESSION["usuario"]["nombUsuario"].
						"<br>";
						print "<a style='text-decoration:none; color:#fff' href='acceso.php?cerrar=true'><button  class='btn btn-danger btn-sm'>Cerrar sesión</button></a><br>";
						$idUsuario =  $_SESSION["usuario"]["idUsuario"];	
                            //echo $idUsuario;
						if ($_SESSION["usuario"]["rol"]==2) {
							?>
							
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
	<section>
		<div class="container alert alert-info" role="alert">
			<center><h1><b>Cierre de ticket</b></h1></center>
		</div>
		<div class="container jumbotron" style="width: 75%;">
			<div class="row">
				<div class="col-md-12 col-lg-12 col-sm-12">
					<form id="miform" method="POST" name="frmCierre" action="#">
						<div id="d1"></div>
						<!--inicio de formulario-->
						<div class="container">
							<div class="row">
								<div class="col-md-6 col-lg-6 col-sm-12">
									<!--DEPENDIENDO DEL TECNICO SE LE MOSTRARA EL TICKET A SOLUCIONAR-->
									<b><label class="control-label">Ingrese el ID del ticket que soluciono</label></b>
									<?php 
									$idTick = new solucionTicket();
									$idUsuario = $_SESSION["usuario"]["idUsuario"];
									$idTick->mostrarIdTicket($idUsuario);
									?>
									<br>

									<!--CONSULTA DE LOS ID DEL TECNIDO QUE HA INGRESADO-->
									<b><label class="control-label">Nombre de técnico</label></b>						
									<?php 
									$solu = new solucionTicket();
									$idUsuario = $_SESSION["usuario"]["idUsuario"];
									$solu->mostrarIdTec($idUsuario);
									?>
									<br>
									<!--ESTA LA INTRODUCIRA EL TECNICO-->
									<b><label class="control-label">Fecha de cierre de ticket</label></b>
									<input class="form-control" type="date" name="txtDate" id="txtDate" ><br>

									<!--ESTA LA INTRODUCIRA EL TECNICO -->
								</div>
								
								<div class="col-md-6 col-lg-6 col-sm-12">

									<b><label class="control-label">Categoría</label></b>
									<br>
									<div class="container">
										<input class="form-check-input" value="Hardware" type="radio" name="txtCategoria" >Hardware</label>
										<br>

										<input class="form-check-input" value="Software" type="radio" name="txtCategoria" >Software</label>
									</div>
									<!-- parte del disabled :
										onclick="$('#parteSoft').attr('disabled',false); $('#txtParteH').attr('disabled',true)"><label class="control-label"

										onclick="$('#txtParteH').attr('disabled',false); $('#parteSoft').attr('disabled',true)" ><label class="control-label"
									-->

									<script type="text/javascript">
										$(function).ready(function(){

										})
									</script>
									<br>
									<label  class="control-label"><b>Parte Solucionada según categoría</b></label>
									<div class="row">
										<div  id="" class="col-md-6 col-sm-6 col-lg-6">
											Hardware
											<select  id="txtParte" name="txtParte"  class="form-control" >
												<option value=""></option>
												<option value="CPU">CPU</option>
												<option value="Memoria RAM">Memoria RAM</option>
												<option value="Monitor">Monitor</option>
												<option value="Tarjeta de red">Tarjeta de red</option>
												<option value="Tarjeta Madre">Tarjeta Madre</option>
												<option value="Disco duro">Disco duro</option>
												<option value="Tarjeta de sonido">Tarjeta de sonido</option>
												<option value="Ventilador">Ventilador</option>
												<option value="Fuente de porder">Fuente de porder</option>
												<option value="Batería">Batería</option>
												<option value="otro">otro</option>
											</select>
										</div>
										<div class="col-md-6 col-sm-6 col-lg-6">
											Software
											<select  id="txtParte" name="txtParte" class="form-control" >
												<option value=""></option>
												<option value="Windows">Windows</option>
												<option value="Office">Office</option>
											</select>
										</div>
									</div>
									<br>

									<!--LA DESCRIPCION SERA CON DATOS INTRODUCIDOS POR EL TECNICO-->
									<b><label class="control-label">Resolución/Conclusión del problema</label></b>
									<textarea name="txtDescripcion" class="form-control" rows="2" placeholder="--Describa la solución del problema--" id="txtDescripcion" ></textarea>
									<br>
								</div>
								<br>
								<div class="container-fluid">
									<center>
										<input type="button" class="btn btn-outline-info"  id="btnAgregar" value="Cerrar Ticket">
										<a href="frmDashboardTec.php" class="btn btn-outline-dark ">Regresar</a>
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
	$agre = new solucionTicket();
	if (isset($_REQUEST["jsIngresar"])) {
		$agre->agregarSolucion($_REQUEST["txtIDticket"],$_REQUEST["txtIDtecnico"],$_REQUEST["txtDate"],$_REQUEST["txtCategoria"],$_REQUEST["txtParte"],$_REQUEST["txtDescripcion"]);
		//@header("Location:frmDashboardTec.php");
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
		$('#btnAgregar').click(function(){
			idTicket = $('#txtIDticket').val();	
			idTecnico = $('#txtIDtecnico').val();
			fecha = $('#txtDate').val();
			categoria = $('#txtCategoria').val();
			parte = $('#txtParte').val();
			comentario = $('#txtDescripcion').val();		

			$("#d1").prepend("<input type='hidden' name='jsIngresar' value='1'>");
			if (idTicket=="" || idTecnico=="" || fecha=="" || categoria=="" || comentario=="") {
				Swal.fire({
					type: 'error',
					title: 'Oops...',
					text: '¡Llene todos los campos para Cerrar Ticket!',		  				   		 	
				});				 
			}
			else{
				Swal.fire({
					type:'question',
					title: 'Confimación de envío de ticket',
					text: '¿Está seguro de cerrar este Ticket?',
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
