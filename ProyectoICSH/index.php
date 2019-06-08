<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Login Principal</title>
	<meta name="viewpot" content="width=device-width,Initial-escale=1,Maximun-scale=1">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.css">
    <script type="text/javascript" src="plugins/bootstrap/js/bootstrap.js"></script>
	<link rel="stylesheet" href="plugins/css/estilosLogin.css">
    <script src="plugins/js/jquery.js"></script>
	<script src="plugins/js/sweetalert2.all.min.js"></script>
	
</head> 
<body background="img/fondo2.jpg">
	<header class="cabecera"><!--INICIO DE HEADER-->
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-4 col-md-4">
					<img class="img-fluid" src="img/itca.png" alt="Responsive Image" id="logoItca">
				</div>
				<div class="col-xs-4 col-md-4">
					<h1 class="display-4">Soluciones Técnicas</h1> 
				</div> 
				<div class="col-xs-4 col-md-4">
					<img class="img-thumbnail"src="img/logo2.jpg" alt="">
				</div> 
			</div>
		</div>		
	</header><!--FIN DE HEADER-->
	
	<section id="sectionLogin"><!--INICIO DE SECTION-->
		<div align="center">
			<div class="container">
				<div class=" col-md-6">				
					<div class="jumbotron">	
                        <form action="" method="post"> <!--INICIO DE FORMULARIO-->
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12  col-lg-12">
									<h1 class="display-5" id="logTitle">Ingresar</h1> <br>
									<img class="img-fluid" src="img/sesion.png" alt="Responsive Image" id="logoSesion" style="height: 100px">
								</div>							
							</div>						
							<div class="form-group">
								<br>
								<h3>Usuario</h3>
                                    <input type="text" class="form-control" placeholder="USUARIO" required name="txtUsuario" autofocus="true">
							</div>
							<div class="form-group">
								<h3><img src="" alt="">Contraseña</h3>
                                     <input type="password" class="form-control" placeholder="CONTRASEÑA" required name="txtContra">
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12  col-lg-12">
                                    <input type="submit" class="btn btn-secondary" value="INICIAR SESION" name="btnIngresar1">
								</div>							
							</div>						
						</form><!--FIN DE FORMULARIO-->
					</div>
				</div>				
			</div>		
		</div>		
	</section><!--FIN DE SECTION-->
           
	<footer class="pie">	
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-4 col-md-4">
					<img class="img-fluid" src="img/itca.png" alt="Responsive Image" id="logoItca">
				</div>
				<div class="col-xs-4 col-md-4">
					<br><br><br>
					<p>Copyright ©</p>
					<p>« Nelson ║ Mario ║ Mariano ║ Adonay ║ William »</p>
				</div> 
				<div class="col-xs-4 col-md-4">
					<img class="img-thumbnail"src="img/logo2.jpg" alt="">
				</div> 
			</div>	
		</div>			
	</footer>
	
	
</body>
</html>