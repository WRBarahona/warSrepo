<?php 
session_start();
require('clsTecnico.php');
$tecnico=new Tecnico();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Gestión de tecnicos</title>
	<meta name="viewpot" content="width=device-width,Initial-escale=1,Maximun-scale=1">
	<script src="../plugins/js/jquery.js"></script>        
	<script src="../plugins/js/sweetalert2.all.min.js"></script>
	<link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="../plugins/css/estilosDashboard.css">
	<script type="text/javascript">
			var idT;
        	var nCarnet;
        	var nomb;
        	var Correo;
        	var Telefono;
        	var Foto;
        	var IdUsuario;
        	var nombreUsu;
        	var password;
        function cargar(id, carnet, nombre, correo, tel, foto, idUsu, nombUsu, pass){
        	$('#txtId').val(id);
        	$('#hdnId').val(id);
        	$('#txtCarnet').val(carnet);
        	$('#txtNombre').val(nombre);
        	$('#txtCorreo').val(correo);
        	$('#txtFoto').val(foto);
        	$('#txtTelefono').val(tel);
        	$('#txtIdUsuario').val(idUsu);
        	$('#hdnIdUsuario').val(idUsu);
        	$('#txtUsuario').val(nombUsu);
        	$('#txtContraseña').val(pass);
        	$('#txtConfirmar').val(pass);
        	$('#filFoto').val(foto);
        	idT=id;
        	nCarnet=carnet;
        	nomb=nombre;
        	Correo=correo;
        	Telefono=tel;
        	Foto=foto;
        	IdUsuario=idUsu;
        	nombreUsu=nombUsu;
        	password=pass;
        }
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
					<a class="nav-link" href="frmAsigTicket.php">Asingnación Ticket</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Tecnicos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="frmNuevoUsuario.php">Usuarios</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Graficos</a>
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
			<center><h1><b>Gestión de Tecnicos</b></h1></center>
		</div>
		<div class="container jumbotron">
			<div class="row">
				<div class="col-md-12 col-lg-12 col-sm-12">
					<form action="#" method="POST" enctype="multipart/form-data" id="miform">
						<input type="hidden" name="hdnId" id="hdnId">
						<input type="hidden" name="hdnIdUsuario" id="hdnIdUsuario">
						<input type="hidden" id="txtFoto" name="txtFoto">

						<div id="d1"></div>
						<!--inicio de formulario-->
						<div class="container">
							<div class="row">
								<div class="col-md-6 col-lg-6 col-sm-12">
									<b><label class="control-label">Id de tecnico</label></b>
									<input class="form-control" type="text" name="txtId" id="txtId" required="" placeholder="--Digite el N° de ID--" autofocus="true"><br>

									<b><label class="control-label">No Carnet</label></b>
									<input class="form-control" type="text" name="txtCarnet" id="txtCarnet" required="" placeholder="--Digite N° de Carnet--">
								</div>
								<div class="col-md-6 col-lg-6 col-sm-12">
									<b><label class="control-label">Nombre del tecnico</label></b>
									<input class="form-control" type="text" name="txtNombre" id="txtNombre" required="" placeholder="--Nombre--"><br>

									<b><label class="control-label">Foto del tecnico</label></b><br>
									<input type="file" name="filFoto" id="filFoto">

								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-6 col-lg-6 col-sm-12">
									<b><label class="control-label">Teléfono / Celular</label></b>
									<input class="form-control" type="text" name="txtTelefono" id="txtTelefono" placeholder="####-####" required  pattern="[0-9]{4}-[0-9]{4}"  minlength="9" maxlength="9"value="">
								</div>
								<div class="col-md-6 col-lg-6 col-sm-12">
									<b><label class="control-label">Correo del tecnico</label></b>
									<input class="form-control" type="text" name="txtCorreo" id="txtCorreo" required="" placeholder="--Correo--">
								</div>
							</div>

							<br><center><h4><b>Usuario de tecnico</b></h4></center>

							<div class="row">
								<div class="col-md-6 col-lg-6 col-sm-12">
									<b><label class="control-label">Id de usuario</label></b>
									<input class="form-control" type="text" name="txtIdUsuario" id="txtIdUsuario" placeholder="--Digite el ID de usuario--" required="">
								</div>
								<div class="col-md-6 col-lg-6 col-sm-12">
									<b><label class="control-label">Nombre de usuario</label></b>
									<input class="form-control" type="text" name="txtUsuario" id="txtUsuario" required="" placeholder="--Digite el nombre de usuario--">
								</div>
							</div>
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
								<div class="container-fluid">
										<input type="button" name="btnAgregar" id="btnAgregar" value="Agregar" class="btn btn-primary">
										<input type="button" name="btnModificar" value="Modificar" class="btn btn-warning" id="btnModificar">
				                        <input type="button" name="btnEliminar" value="Eliminar" class="btn btn-danger" id="btnEliminar">
				                        <input type="button" name="btnLimpiar" value="Limpiar" class="btn btn-secondary" id="btnLimpiar">
										<a href="frmDashboardAdmin.php" class="btn btn-secondary" align="right">Volver</a>
								</div>
						</div>
					</form>
					<!--Fin de formulario--><br>
				</div>
			</div>
			<center>
            <?php
                if (isset($_REQUEST["hdnAgregar"])) {
					$tecnico->insertarUsuario($_REQUEST["txtIdUsuario"], $_REQUEST["txtUsuario"], $_REQUEST["txtContraseña"], 2);
                	$foto=$_FILES['filFoto']['name'];
					$ruta=$_FILES['filFoto']['tmp_name'];
					$destino='../img/'.$foto;
					copy($ruta, $destino);
                	$tecnico->setId($_REQUEST["txtId"]);
                	$tecnico->setCarnet(utf8_decode($_REQUEST["txtCarnet"]));
                	$tecnico->setNombre(utf8_decode($_REQUEST["txtNombre"]));
                	$tecnico->setCorreo(utf8_decode($_REQUEST["txtCorreo"]));
                	$tecnico->setTel(utf8_decode($_REQUEST["txtTelefono"]));
                	$tecnico->setFoto($destino);
                	$tecnico->setIdUsuario($_REQUEST["txtIdUsuario"]);
                  	$tecnico->insertar();
                   	print $tecnico->mostrarTecnico();

                }elseif (isset($_REQUEST["hdnModificar"])) {
					$tecnico->modificarUsuario($_REQUEST["txtIdUsuario"], $_REQUEST["txtUsuario"], $_REQUEST["txtContraseña"], $_REQUEST["hdnIdUsuario"]);
                	$foto=$_FILES['filFoto']['name'];
					$ruta=$_FILES['filFoto']['tmp_name'];
					$destino='../img/'.$foto;
					if ($destino=='../img/') {
						$destino=$_REQUEST['txtFoto'];
					}
					else{
						copy($ruta, $destino);
					}
                	$tecnico->setId($_REQUEST["txtId"]);
                	$tecnico->setCarnet(utf8_decode($_REQUEST["txtCarnet"]));
                	$tecnico->setNombre(utf8_decode($_REQUEST["txtNombre"]));
                	$tecnico->setCorreo(utf8_decode($_REQUEST["txtCorreo"]));
                	$tecnico->setTel(utf8_decode($_REQUEST["txtTelefono"]));
                	$tecnico->setFoto($destino);
                	$tecnico->setIdUsuario($_REQUEST["txtIdUsuario"]);
                  	$tecnico->modificar($_REQUEST["hdnId"]);
                    print $tecnico->mostrarTecnico();
                }
                
                elseif(isset($_REQUEST["hdnEliminar"])){
                	$tecnico->eliminar($_REQUEST["hdnId"]);
                    $tecnico->eliminarUsuario($_REQUEST["hdnIdUsuario"]);

                    print $tecnico->mostrarTecnico();
                }
                else{
                    print $tecnico->mostrarTecnico();
                }           
            ?>
            </center>
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
	
<script type="text/javascript">
	$(document).ready(function(){
		$('#btnAgregar').click(function(){
			id=$('#txtId').val();
			nombre=$('#txtNombre').val();
			telefono=$('#txtTelefono').val();
			carnet=$('#txtCarnet').val();
			correo=$('#txtCorreo').val();
			foto=$('#filFoto').val();
			idUsuario=$('#txtIdUsuario').val();
			usuario=$('#txtUsuario').val();
			contra=$('#txtContraseña').val();
			confi=$('#txtConfirmar').val();
            $('#d1').prepend("<input type='hidden' name='hdnAgregar' value='1'>");
            if (id=="" || nombre=="" || telefono=="" || carnet==""  || correo=="" || idUsuario=="" || usuario=="" || contra=="" || confi==""){
                Swal.fire({
                    type:"warning",
                    title:"Error",
                    text: "Debe completar todos los campos para poder Ingresar un nuevo tecnico",
                    confirmButtonText:"Confirmar",
                 });
            }else{
            	if (contra != confi){
	                Swal.fire({
	                    type:"warning",
	                    title:"Error",
	                    text: "Contraseñas no coinciden",
	                    confirmButtonText:"Confirmar",
	                 });
           		 }else{
                	$("#miform").submit();
           		 }
            }
    	});

        $('#btnModificar').click(function(){
			id=$('#txtId').val();
			nombre=$('#txtNombre').val();
			telefono=$('#txtTelefono').val();
			carnet=$('#txtCarnet').val();
			correo=$('#txtCorreo').val();
			idUsuario=$('#txtIdUsuario').val();
			usuario=$('#txtUsuario').val();
			contra=$('#txtContraseña').val();
			confi=$('#txtConfirmar').val();

            $('#d1').prepend("<input type='hidden' name='hdnModificar' value='1'>");

            if (id=="" || nombre=="" || telefono=="" || carnet=="" || correo=="" || idUsuario=="" || usuario=="" || contra=="" || confi==""){
                Swal.fire({
                    type:"warning",
                    title:"Error",
                    text: "Debe seleccionar un tecnico",
                    confirmButtonText:"Confirmar",
                 });
            }
            else if(idT==id && nomb==nombre && Telefono==telefono && nCarnet==carnet && Correo==correo && IdUsuario==idUsuario && nombreUsu==usuario && password==contra && password==confi){
                Swal.fire({
                type:"warning",
                title:"Error",
                text: "No ha Modificado ningún campo",
                confirmButtonText:"Confirmar",
                });
            }
            else{
            	if (contra != confi){
	                Swal.fire({
	                    type:"warning",
	                    title:"Error",
	                    text: "Contraseñas no coinciden",
	                    confirmButtonText:"Confirmar",
	                 });
           		 }else{
	                Swal.fire({
	                        type:"warning",
	                        title:"¿Está seguro que desea Modificar este Tecnico?",
	                        showCancelButton:true,
	                        cancelButtonColor:"red",
	                        confirmButtonColor:"green",
	                        cancelButtonText:"Cancelar",
	                        confirmButtonText:"Si, Modificar.",
	                }).then((result)=>{
	                    if(result.value){
	                        $("#miform").submit();                          
	                    }
	                });
	            }
            }
        });

        $('#btnEliminar').click(function(){
            id=$('#txtId').val();
			nombre=$('#txtNombre').val();
			telefono=$('#txtTelefono').val();
			carnet=$('#txtCarnet').val();
			correo=$('#txtCorreo').val();
			idUsuario=$('#txtIdUsuario').val();
			usuario=$('#txtUsuario').val();
			contra=$('#txtContraseña').val();
			confi=$('#txtConfirmar').val();

            $('#d1').prepend("<input type='hidden' name='hdnEliminar' value='1'>");

            if (id=="" || nombre=="" || telefono=="" || carnet=="" || correo=="" || idUsuario=="" || usuario=="" || contra=="" || confi==""){
                Swal.fire({
                    type:"warning",
                    title:"Error",
                    text: "Debe seleccionar un tecnico",
                    confirmButtonText:"Confirmar",
                 });
            }
            else{
                Swal.fire({
                        type:"warning",
                        title:"¿Está seguro que desea aliminar este tecnico?",
                        text: "Una vez eliminado este tecnico no se podrá recuperar",
                        showCancelButton:true,
                        cancelButtonColor:"red",
                        confirmButtonColor:"green",
                        cancelButtonText:"Cancelar",
                        confirmButtonText:"Si, Eliminar.",
                        customClass: "swal_alert",
                    }).then((result)=>{
                    if(result.value){
                        Swal.fire({
                        type:"success",
                        title:"tecnico eliminado",
                        confirmButtonText:"Confirmar",
                        }).then((result)=>{
                            if(result.value){
                                $("#miform").submit();                          
                            }
                        });
                    }
                });
            }
        });

        $('#btnLimpiar').click(function(){
            $('#txtId').val("");
			$('#txtNombre').val("");
			$('#txtTelefono').val("");
			$('#txtCarnet').val("");
			$('#txtCorreo').val("");
			$('#txtIdUsuario').val("");
			$('#txtUsuario').val("");
			$('#txtContraseña').val("");
			$('#txtConfirmar').val("");
			$('#filFoto').val("");
        });		
    });

</script>

</body>
</html>