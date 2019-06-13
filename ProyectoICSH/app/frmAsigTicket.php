<?php 
session_start();

include('clsAsigTicket.php');
$asignarTicket = new asignarTicket();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Asignación de Ticket</title>
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
					<a class="nav-link" href="frmDashboardAdmin.php">INICIO</a>
				</li>
 				<li class="nav-item">
					<a class="nav-link" href="#">Asingnación Ticket</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="frmTecnico.php">Tecnicos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="frmNuevoUsuario.php">Usuarios</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="frmGraficos.php">Graficos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Buscar Ticket</a>
				</li>
			</ul>
		</div>
	</nav>
	<!--FIN NAV-->
	<section>
		<div class="container alert alert-info" role="alert">
			<center><h1><b>Asignación de ticket</b></h1></center>
		</div>
		<div class="container jumbotron col-md-6">
			<div class="row">
				<div class="col-md-12 col-lg-12 col-sm-12">
					<form method="POST" action="#" id="formAsigTicket">
						<div id="d1"></div>
						<!--inicio de formulario-->
						<div class="container">
							<div class="row">
								<input type="hidden" class="form-control" name="hdnId" id="IDGROUP">
								<div class="col-md-12 col-lg-12 col-sm-12">
									<b><label class="control-label">Ticket a resolver</label></b>
									<select class="form-control"  name="selTicket" id="selecTicket" required="true">
									<option value="">--Seleccione un ticket--</option>
									<?php $asignarTicket->llenarTicket(); ?>
									</select>
									<br>

									<b><label class="control-label">Técnico a asignar</label></b>
									<select class="form-control" name="selTecnico" id="selecTecnico" required="true">
										<option value="">--Seleccione un técnico--</option>
										<?php $asignarTicket->llenarTecnico(); ?>
									</select>
									<br>

									<!--<b><label class="control-label">Fecha de asignación</label></b>
									<input class="form-control" type="date" required=""><br>

									<b><label class="control-label">Descripción del problema</label></b>
									<textarea class="form-control" rows="5" placeholder="--Describa el problema en el equipo--" name="" required="" minlength=""></textarea>
									<br>-->
								<br>
								</div>
								<br>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			                        	<input type="button" class="btn btn-primary btn-sm" value="Guardar" name="btnGuardar" id="btnGuardar"> 
				                        <input type="button" name="btnLimpiar" value="Limpiar" class="btn btn-secondary btn-sm" id="btnLimpiar">
									</div>
							</div>
						</div>
					</form>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	                    <div align="right">
	                    	<a href="frmDashBoardAdmin.php"><button class="btn btn-secondary btn-sm">Volver</button></a>
	                	</div>
	                </div>
					<!--Fin de formulario--><br>
				</div>
			</div>
			<div>
			</div>

			<?php 
				if (isset($_REQUEST['hdnGuardar'])) {
					$asignarTicket->setIdTecnico($_REQUEST['selTecnico']);
					$asignarTicket->setIdTicket($_REQUEST['selTicket']);
					$asignarTicket->insertar($_REQUEST['selTicket']);
					$asignarTicket->actActividadTec($_REQUEST['selTecnico']);
					$asignarTicket->actAsignacionTic($_REQUEST['selTicket']);
					print $asignarTicket->verAsignados();
				}
				else{
					print $asignarTicket->verAsignados();
				}


			 ?>
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


 <script type="text/javascript">
    $(document).ready(function(){
        $('#btnGuardar').click(function(){
            selecTecnico=$('#selecTecnico').val();
            selecTicket=$('#selecTicket').val();
            $('#d1').prepend("<input type='hidden' name='hdnGuardar' value='1'>");
            if (selecTecnico=="" || selecTicket==""){
                Swal.fire({
                    type:"warning",
                    title:"Error",
                    text: "Debe completar todos los campos para poder asignar un nuevo ticket",
                    confirmButtonText:"Confirmar",
                 });
            }
            else{
                $("#formAsigTicket").submit();
            }
    	});

        $('#btnLimpiar').click(function(){
            $('#selecTecnico').val("");
			$('#selecTicket').val("");
        });

    });
</script>

</html>