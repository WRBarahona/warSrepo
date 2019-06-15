<?php 
session_start();

include('clsNUsuario.php');
$nuevoUsuario = new NuevoUsuario();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Gestión Usuario</title>
	<meta name="viewpot" content="width=device-width,Initial-escale=1,Maximun-scale=1">
	<script src="../plugins/js/jquery.js"></script>        
	<script src="../plugins/js/sweetalert2.all.min.js"></script>
	<link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="../plugins/css/estilosDashboard.css">
	<script type="text/javascript">
		 function cargar(id, nombre, pass, rol){
        	$('#idUsuario').val(id);
        	$('#hdnId').val(id);
			$('#nombUsuario').val(nombre);
			$('#txtContraseña').val(pass);
			$('#txtConfirmar').val(pass);
        }
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			<?php 
			if (isset($_REQUEST["a"])) {?>
				Swal.fire({
					type: 'success',
					title: '¡Bien hecho!',
					text: '¡Usuario guardado exitosamente!',   
					showConfirmButton: false,
					timer: 2500             
				});
			<?php } ?>
			<?php 
			if (isset($_REQUEST["m"])) {?>
				Swal.fire({
					type: 'success',
					title: '¡Bien hecho!',
					text: '¡Usuario modificado exitosamente!',   
					showConfirmButton: false,
					timer: 2500             
				});
			<?php } ?>
			<?php 
			if (isset($_REQUEST["e"])) {?>
				Swal.fire({
					type: 'success',
					title: '¡Bien hecho!',
					text: '¡Usuario eliminado exitosamente!',   
					showConfirmButton: false,
					timer: 2500             
				});
			<?php } ?>
		});
	</script>
</head>
<body style="background-color: #bfbfbf;">
	<header id="cabecera">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-8 col-md-8">
					<h1 class="display-4" style="margin-top: 50px;">Soluciones Técnicas</h1>
				</div> 
				<div class="col-xs-4 col-md-4" style="margin-top: 30px;">
					<?php 
						if (isset($_SESSION["usuario"])) {
							if ($_SESSION["usuario"]["rol"]=='3') {
								print "Bienvenido ".$_SESSION["usuario"]["nombUsuario"].
									"(".$_SESSION["usuario"]["rol"].").<br>";
	                            print "<a style='text-decoration:none; color:#fff' href='acceso.php?cerrar=true'><button  class='btn btn-danger btn-lg'>Cerrar sesión</button></a><br>";
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
					<a class="nav-link" href="frmAsigTicket.php">Asignación Ticket</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="frmTecnico.php">Técnicos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="frmNuevoUsuario.php">Usuarios</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="frmGraficos.php">Gráficos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="frmVistaSoluciones.php">Vista tickets Solucionados</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="frmVistaTickClientes.php">Vista tickets pendientes</a>
				</li>
			</ul>
		</div>
	</nav>
	<!--FIN NAV-->
	<section>
		<div class="container alert alert-info" role="alert">
			<center><h1><b>Gestión Usuarios</b></h1></center>
		</div>
		<div class="container jumbotron col-md-10">
			<div class="row">
				<div class="col-md-12 col-lg-12 col-sm-12">
					<form method="POST" action="#" id="formNUsuario">
						<input type="hidden" name="hdnId" id="hdnId">
						<div id="d1"></div>
						<!--inicio de formulario-->
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-lg-12 col-sm-12">
									<b><label class="control-label">Id Usuario</label></b>
									<input class="form-control" type="text" name="txtIdUsuario" id="idUsuario" required="" placeholder="--ID de Usuario--" pattern="" maxlength="10" min="[A-Z a-z]+" title="Ingrese el Id de Usuario" autofocus="true"><br>

									<b><label class="control-label">Ingrese el nombre de Usuario</label></b>
									<input class="form-control" type="text" name="txtNombUsuario" id="nombUsuario" required="" placeholder="--Nombre de usuario--" pattern="[A-Z a-z]+" maxlength="15" min="" title="Ingrese el nombre de usuario"><br>
									<div class="row">
										<div class="col-md-6 col-lg-6 col-sm-12">
											<b><label class="control-label">Contraseña</label></b>
											<input class="form-control" type="password" name="txtContraseña" id="txtContraseña" required="" placeholder="--Digite la contraseña de usuario--">
										</div>
										<div class="col-md-6 col-lg-6 col-sm-12">
											<b><label class="control-label">Confirmar Contraseña</label></b>
											<input class="form-control" type="password" name="txtConfirmar" id="txtConfirmar" required="" placeholder="--Digite la contraseña de usuario--">
										</div>
									</div>
									<br>
									<b><label>Nivel de Usuario</label></b>
									<input class="form-control" type="text" name="txtRol" id="txtRol" required="" readonly="" title="Ingrese una contraseña" value="admin"><br>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-12">
			                        	<input type="button" class="btn btn-primary" value="Guardar" name="btnGuardar" id="btnGuardar"> 
				                        <input type="button" name="btnModificar" value="Modificar" class="btn btn-warning" id="btnModificar">
				                        <input type="button" name="btnEliminar" value="Eliminar" class="btn btn-danger" id="btnEliminar">
				                        <input type="button" name="btnLimpiar" value="Limpiar" class="btn btn-secondary" id="btnLimpiar">
				                        <a href="frmDashboardAdmin.php"><input type="button" name="btnVolver" class="btn btn-secondary" id="btnVolver" value="Volver"></a><br><br>
	                    				<!--<a href="frmDashboardAdmin.php"><button class="btn btn-secondary" id="btnVolver">Volver</button></a><br><br>-->
									</div>
								</div>
							</div>
						</div>
					</form>
<?php 

	if (isset($_REQUEST['hdnGuardar'])) {
		$nuevoUsuario->setIdUsuario($_REQUEST['txtIdUsuario']);
		$nuevoUsuario->setNombUsuario(utf8_decode($_REQUEST['txtNombUsuario']));
		$nuevoUsuario->setPass(utf8_decode($_REQUEST['txtContraseña']));
		$nuevoUsuario->setIdRol(utf8_decode(3));
		$nuevoUsuario->insertar();
		print $nuevoUsuario->mostrarUsuarios();
	}
	elseif (isset($_REQUEST['hdnModificar'])) {
		$nuevoUsuario->setIdUsuario($_REQUEST['txtIdUsuario']);
		$nuevoUsuario->setNombUsuario(utf8_decode($_REQUEST['txtNombUsuario']));
		$nuevoUsuario->setPass(utf8_decode($_REQUEST['txtContraseña']));
		$nuevoUsuario->setIdRol(3);
		$nuevoUsuario->modificar($_REQUEST['hdnId']);
		print $nuevoUsuario->mostrarUsuarios();
	}
	elseif (isset($_REQUEST['hdnEliminar'])) {
		$nuevoUsuario->eliminar($_REQUEST['hdnId']);
		print $nuevoUsuario->mostrarUsuarios();
	}
	else{
		print $nuevoUsuario->mostrarUsuarios();
	}

 ?>
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


<script type="text/javascript">
    $(document).ready(function(){
        $('#btnGuardar').click(function(){
            idUsuario=$('#idUsuario').val();
            nombUsuario=$('#nombUsuario').val();
            pass=$('#txtContraseña').val();
            confi=$('#txtConfirmar').val();
            idRol=$('#txtRol').val();
            $('#d1').prepend("<input type='hidden' name='hdnGuardar' value='1'>");
            if (idUsuario=="" || nombUsuario=="" || pass=="" || idRol==""|| confi==""){
                Swal.fire({
                    type:"warning",
                    title:"Error",
                    text: "Debe completar todos los campos para poder Ingresar un nuevo usuario",
                    confirmButtonText:"Confirmar",
                 });
            }
            else{
            	if (pass != confi){
	                Swal.fire({
	                    type:"warning",
	                    title:"Error",
	                    text: "Contraseñas no coinciden",
	                    confirmButtonText:"Confirmar",
	                 });
           		 }else{
                	$("#formNUsuario").submit();
           		 }
            }
    });

        $('#btnModificar').click(function(){
            idUsuario=$('#idUsuario').val();
            nombUsuario=$('#nombUsuario').val();
            pass=$('#txtContraseña').val();
            confi=$('#txtConfirmar').val();
            idRol=$('#txtRol').val();

            $('#d1').prepend("<input type='hidden' name='hdnModificar' value='1'>");

            if (idUsuario=="" || nombUsuario=="" || pass=="" || idRol==""|| confi==""){
                Swal.fire({
                    type:"warning",
                    title:"Error",
                    text: "Debe seleccionar un usuario",
                    confirmButtonText:"Confirmar",
                 });
            }
            else if(idUsuario=='#idUsuario' && nombUsuario=='#nombUsuario' && pass=='#pass' && idRol=='#idRol' && estado=='#estado'){
                Swal.fire({
                type:"warning",
                title:"Error",
                text: "No ha modificado ningún campo",
                confirmButtonText:"Confirmar",
                });
            }
            else{
                Swal.fire({
                        type:"warning",
                        title:"¿Está seguro que desea modificar este usuario?",
                        showCancelButton:true,
                        cancelButtonColor:"red",
                        confirmButtonColor:"green",
                        cancelButtonText:"Cancelar",
                        confirmButtonText:"Si, Modificar.",
                }).then((result)=>{
                    if(result.value){
                        $("#formNUsuario").submit();                          
                    }
                });
            }
        });


        $('#btnEliminar').click(function(){
            idUsuario=$('#idUsuario').val();
            nombUsuario=$('#nombUsuario').val();
            pass=$('#txtContraseña').val();
            confi=$('#txtConfirmar').val();
            idRol=$('#txtRol').val();
            $('#d1').prepend("<input type='hidden' name='hdnEliminar' value='1'>");

            if (idUsuario=="" || nombUsuario=="" || pass=="" || idRol==""|| confi==""){
                Swal.fire({
                    type:"warning",
                    title:"Error",
                    text: "Debe seleccionar un usuario",
                    confirmButtonText:"Confirmar",
                 });
            }
            else{
                Swal.fire({
                        type:"warning",
                        title:"¿Está seguro que desea eliminar este usuario?",
                        text: "Una vez eliminado este usuario no se podrá recuperar",
                        showCancelButton:true,
                        cancelButtonColor:"red",
                        confirmButtonColor:"green",
                        cancelButtonText:"Cancelar",
                        confirmButtonText:"Si, Eliminar.",
                        customClass: "swal_alert",
                    }).then((result)=>{
                    if(result.value){
                    	$("#formNUsuario").submit();
                    }
                });
            }
        });

        $('#btnLimpiar').click(function(){
            $('#idUsuario').val("");
			$('#nombUsuario').val("");
			$('#txtContraseña').val("");
			$('#txtConfirmar').val("");
        });
    });
</script>
</html>