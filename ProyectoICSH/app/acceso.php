<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewpot" content="width=device-width,Initial-escale=1,Maximun-scale=1">
	 <script src="../plugins/js/sweetalert2.all.min.js"></script>
	 <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Expanded&display=swap" rel="stylesheet" rel="stylesheet">
	 <style type="text/css">
		body{
		font-family: 'Encode Sans Expanded', sans-serif;
		margin: 0 auto;
		}
	</style>
</head>
<body>
</body>
</html>

<?php 
session_start();

include 'credenciales.php';

if (isset($_REQUEST["btnIngresar"])) {
	$usuario = $_REQUEST["txtUsuario"];
	$contra = $_REQUEST["txtContra"];

	$conexion = new mysqli(SERVIDOR,USUARIO,CONTRA,BASEDATOS);
	$sql="select idRol from usuario where nombUsuario = '$usuario' and pass='$contra'";
	$resultado = $conexion->query($sql);
	$cantidad = mysqli_num_rows($resultado);	
		if ($cantidad==0) {
			session_destroy();
			 	 
		?>
			<script type="text/javascript">
						Swal.fire({
						  type: 'error',
						  title: 'Oops...',
						  text: '¡Usuario y/o contraseña incorrectos!',
						  confirmButtonText: "Aceptar"
						}).then((result)=>{
							if (result.value){
								location.href="../index.php";
							}
						})
					</script>
		<?php 
			$conexion->Close();
		}
		else{
			$fila=$resultado->fetch_array(MYSQLI_NUM);
			$rol=$fila["0"];			
			//----------------
			$sql2="select idUsuario from usuario where nombUsuario = '$usuario' and pass='$contra'";
			$result = $conexion->query($sql2);
			$fila2=	$result->fetch_array(MYSQLI_NUM);
			$id = $fila2["0"];		
			if ($rol=="1") {
				$_SESSION["usuario"]["nombUsuario"]=$usuario;
				$_SESSION["usuario"]["rol"]=$rol;	
				$_SESSION["usuario"]["idUsuario"]=$id;			
				header("Location:frmDashboardCliente.php");
			}	elseif ($rol=="2") {
				$_SESSION["usuario"]["nombUsuario"]=$usuario;
				$_SESSION["usuario"]["rol"]=$rol;
				$_SESSION["usuario"]["idUsuario"]=$id;
				header("Location:frmDashboardTec.php");
			}	elseif ($rol=="3") {
				$_SESSION["usuario"]["nombUsuario"]=$usuario;
				$_SESSION["usuario"]["rol"]=$rol;
				$_SESSION["usuario"]["idUsuario"]=$id;
				header("Location:frmDashboardAdmin.php");
			}	else{
				header("Location:../index.php");
			}
		}	
	}
	if (isset($_REQUEST['cerrar'])) {
		session_destroy();
		header("Location:../index.php");
	}



 ?>