<?php 
session_start();

include('clsSolucion.php');
$Solucion=new Solucion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reporte gráfico de tickets solucionados</title>
	<link rel="icon" href="../img/icono.png">
	<meta name="viewpot" content="width=device-width,Initial-escale=1,Maximun-scale=1">
	<script src="../plugins/js/jquery.js"></script>        
	<script src="../plugins/js/sweetalert2.all.min.js"></script>
	<link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="../plugins/css/estilosDashboard.css">
	<script src="code/highcharts.js"></script>
	<script src="code/modules/data.js"></script>
	<script src="code/modules/drilldown.js"></script>
	<script src="code/modules/series-label.js"></script>
	<script src="code/modules/exporting.js"></script>
	<script src="code/modules/export-data.js"></script>
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
								print "<h1 class ='display-4'; style='font-size:25px;'>Bienvenido/a <b>".$_SESSION["usuario"]["nombUsuario"]. "</b></h1>";
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
					<a class="nav-link" href="frmDashboardAdmin.php">Inicio</a>
				</li>
 				<li class="nav-item">
					<a class="nav-link" href="frmAsigTicket.php">Asignación de ticket</a>
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
					<a class="nav-link" href="frmVistaSoluciones.php">Vista de tickets Solucionados</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="frmVistaTickClientes.php">Vista de tickets pendientes</a>
				</li>
			</ul>
		</div>
	</nav>
	<!--FIN NAV-->
	<section>
		<div class="container alert alert-info" role="alert">
			<center><h1><b>Reporte de tickets solucionados</b></h1></center>
		</div>
		<div class="container jumbotron col-md-10">
			<form action="#" method="POST" id="miform">
				<div id="d1"></div>
				<div class="row">
					<div class="col-md-4 col-lg-4 col-sm-12">
					<b><label class="control-label">Fecha de inicio</label></b>
						<input class="form-control" type="date" name="txtFechaIni" id="txtFechaIni" >
					</div>
					<div class="col-md-4 col-lg-4 col-sm-12">
					<b><label class="control-label">Fecha de Fin</label></b>
						<input class="form-control" type="date" name="txtFechaFin" id="txtFechaFin" >
					</div>
					<div class="col-md-4 col-lg-4 col-sm-12" align="center"><br>
						<input type="button" name="btnFiltrar" id="btnFiltrar" value="Filtrar" class="btn btn-primary btn-lg">
				        <input type="submit" name="btnLimpiar" value="Limpiar" class="btn btn-secondary btn-lg" id="btnLimpiar">
					</div>
				</div>
			</form><br>
				<div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script type="text/javascript">
// Create the chart
Highcharts.chart('container1', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Categorias'
    },
    xAxis: {
        type: 'category',

    },
    yAxis: {
        title: {
            text: 'Total de tickets'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:1f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:2f}</b> tickets<br/>'
    },

    series: [
        {
            name: "Categoria",
            colorByPoint: true,
            data: [
                {
                    name: "Software",
                    y:<?php 
                    if (isset($_REQUEST['hdnFiltrar']))
                    	$Solucion->mostrarFechaGeneral('Software', $_REQUEST['txtFechaIni'], $_REQUEST['txtFechaFin']);
                    else
                    	$Solucion->mostrar('Software');?>,
                    
                },
                {
                    name: "Hardware",
                    y: <?php 
                    if (isset($_REQUEST['hdnFiltrar']))
                    	$Solucion->mostrarFechaGeneral('Hardware', $_REQUEST['txtFechaIni'], $_REQUEST['txtFechaFin']);
                    else
                    	$Solucion->mostrar('Hardware');?>,
                    
                }
            ]
        }
    ]
});
		</script>
				<br><br>
			<div class="card-columns">
				<div class="card">
					<div class="card-header">
  					  <h4 class="card-title" align="center">Software</h4>
  					</div><br>
					<img  class="rounded mx-auto d-block" class="card-img-top"  src="../img/software.png"><br>
						<div class="card-body" align="center" style="background-color: #ECEFF1">
							<p class="card-tetx" align="center">
								Ver la cantidad de fallas de software reportadas.
							</p>
                            <a href="frmGraficoSoftware.php" class="btn btn-primary" align="">Ver reporte</a>
						</div>
				</div>				 				 
				<div class="card">
					<div class="card-header">
  					  <h4 class="card-title" align="center">Hardware</h4>
  					</div><br>
					<img class="rounded mx-auto d-block"  class="card-img-top" src="../img/hardware.png"><br>
						<div class="card-body" align="center" style="background-color: #ECEFF1">			
							<p class="card-tetx" align="center">
								Ver la cantidad de fallas de hardware reportadas. 		
							</p>
                            <a href="frmGraficoHardware.php" class="btn btn-primary" align="">Ver reporte</a>
                                                        
						</div>
				</div>
				<div class="card">
						<div class="card-header">
							<h4 class="card-title" align="center">Volver al dashboard</h4>
						</div><br>
						<img  class="rounded mx-auto d-block" class="card-img-top"  src="../img/volver.png"><br>
						<div class="card-body" align="center" style="background-color: #ECEFF1">							
							<p class="card-tetx" align="center">
							</p>
                             <a href="frmDashboardAdmin.php" class="btn btn-secondary" align="">Volver</a>
						</div>
					</div>
			</div>
					<!--Fin de formulario--><br>
			</div>
			<div>
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
	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnFiltrar').click(function(){
				fechaIni=$('#txtFechaIni').val();
				fechaFin=$('#txtFechaFin').val();
	            $('#d1').prepend("<input type='hidden' name='hdnFiltrar' value='1'>");
	            if (fechaIni=="" || fechaFin==""){
	                Swal.fire({
	                    type:"warning",
	                    title:"Error",
	                    text: "Debe completar todos los campos",
	                    confirmButtonText:"Confirmar",
	                 });
        	    }else{
                	$("#miform").submit();
        	    }
			});
		});
	</script>
	

</body>
</html>