<?php 
session_start();
include 'clsCerrarTicket.php';
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
	<script src="../plugins/js/sweetalert2.all.min.js"></script>
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
	<section>
		<div class="container alert alert-info" role="alert">
			<center><h1><b>Cierre de ticket</b></h1></center>
		</div>
		<div id="d1" class="container jumbotron">
			<div class="row">
				<div class="col-md-12 col-lg-12 col-sm-12">
					<form id="miform" method="POST" action="#">
						<div id="d1"></div>
						<!--inicio de formulario-->
						<div class="container">
							<div class="row">
								<div class="col-md-6 col-lg-6 col-sm-12">
									<!--DEPENDIENDO DEL TECNICO SE LE MOSTRARA EL TICKET A SOLUCIONAR-->
									<b><label class="control-label">Ingrese el ID del ticket solucionado</label></b>
									<?php 
									$idTick = new solucionTicket();
									$idTick->mostrarIdTicket($idUsuario);
									?>
									<br>

									<!--CONSULTA DE LOS ID DEL TECNIDO QUE HA INGRESADO-->
									<b><label class="control-label">Nombre de técnico</label></b>						
									<?php 
									$solu = new solucionTicket();
									$solu->mostrarIdTec();
									?>
									<br>
									<!--ESTA LA INTRODUCIRA EL TECNICO-->
									<b><label class="control-label">Fecha de cierre de ticket</label></b>
									<input class="form-control" type="date" name="txtDate" id="txtDate" ><br>

									<!--ESTA LA INTRODUCIRA EL TECNICO -->
									
								</div>
								<script type="text/javascript">
									/*$(document).ready(function(){
										$('#Hardware').click(function{
											$('#parteHard').readOnly = true;
										})
									});*/
								</script>
								<div class="col-md-6 col-lg-6 col-sm-12">
									<b><label class="control-label">Categoría</label></b>
									<br>
									<label class="control-label">Hardware</label>
									<input class="form-check-input" value="Hardware" type="radio" name="Categoria" onclick="$('#txtParteH').attr('disabled',false); $('#parteSoft').attr('disabled',true)" >
									<br>
									<label class="control-label">Software</label>
									<input class="form-check-input" value="Software" type="radio" name="Categoria" onclick="$('#parteSoft').attr('disabled',false); $('#txtParteH').attr('disabled',true)">

									<br><br>
									<label  class="control-label"><b>Parte</b></label>
									<div class="row">
										<div class="col-md-6 col-sm-6 col-lg-6">
											<select  disabled="true" id="txtParteH" name="txtCategoria"  class="form-control" >
												<option value="">Hardware</option>
												<option value=""></option>
												<option value=""></option>
											</select>
										</div>
										<div  class="col-md-6 col-sm-6 col-lg-6">
											<select name="txtCategoria" disabled="true" id="parteSoft" class="form-control" >
												<option value="">Software</option>
												<option value=""></option>
												<option value=""></option>
											</select>
										</div>
									</div>
									<br>

									<!--LA DESCRIPCION SERA CON DATOS INTRODUCIDOS POR EL TECNICO-->
									<b><label class="control-label">Resolución/Conclusión del problema</label></b>
									<textarea name="txtDescripcion" class="form-control" rows="3" placeholder="--Describa la solución del problema--" id="txtDescripcion"  minlength=""></textarea>
									<br>
								</div>
								<br>
								<div class="container-fluid">
									<center>
										<input class="btn btn-light" type="submit"  id="btnAgregar" value="Agregar">
										<a href="frmDashboardTec.php" class="btn btn-dark ">Cancelar</a>
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
	<?php 
	$agre = new solucionTicket();
	if (isset($_REQUEST["jsIngresar"])) {
		$agre->agregarSolucion($_REQUEST["txtIDticket"],$_REQUEST["txtIDtecnico"],$_REQUEST["txtDate"],$_REQUEST["txtCategoria"],$_REQUEST["txtDescripcion"]);
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
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#btnAgregar').click(function(){
			idTicket = $('#txtIDticket').val();
			idTenico = $('#txtIDtecnico').val();
			fechaCierre = $('#txtDate').val();
			categoria = $('#txtCategoria').val();
			descrip = $('#txtDescripcion').val();
			$("#d1").prepend("<input type='hidden' name='hdnIngresar' value='1'>");
			if(idTicket=="" || idTenico=="" || fechaCierre=="" || categoria=="" || descrip==""){
				Swal.fire({
					type: 'error',
					title: 'Oops...',
					text: '¡Llene todos los campos para agregar el cierre de ticket!',		
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
						$('#btnImprimir').attr("disabled", false);					
					}	

				})				
			}		
		})
	})
</script>