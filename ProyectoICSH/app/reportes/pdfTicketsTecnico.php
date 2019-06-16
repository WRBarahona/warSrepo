<?php 
include 'plantilla.php';
include '../credenciales.php';
session_start();
if (isset($_SESSION["usuario"])) {
	$idUsuario = $_SESSION["usuario"]["idUsuario"];
$conexion = new mysqli(SERVIDOR,USUARIO,CONTRA,BASEDATOS);
$sql="SELECT t3.idTicket as Id_Ticket, t3.fecha as Fecha_Resolucion, t3.categoria as Categoria, t3.parte as Parte_Reparada,t3.comentario Comentario
			from usuario as t1 inner JOIN tecnico as t2
			on t1.idUsuario = t2.idUsuario
			INNER JOIN solucionTicket as t3 ON
			t2.idTecnico = t3.idTecnico
			where t1.idUsuario = $idUsuario";
$resultado = mysqli_query($conexion,$sql);

$sqlImg="select foto from tecnico where idUsuario = $idUsuario";
$respuestaImg = mysqli_query($conexion,$sqlImg);


	$pdf = new PDF();//instancia de la clase plantilla
	$pdf->AddPage();
	
	$pdf->SetDrawColor(125,125,125);//color de la linea
	$pdf->SetLineWidth(1);//grosor de la linea
	$pdf->Line(10,47,200,47);//linea en el plano cartesiano
	$pdf->SetFont('Arial','U',18);//tipo de letra
	$pdf->SetLineWidth(0);
	$pdf->Cell(125,5,'Reporte de Ticket',0,'C',0);
	$pdf->Ln(10);
	$pdf->SetFont('Arial','B',11);//tipo de letra
	$pdf->SetFillColor(257,255,255);//color de fondo
	while ($filaImg = $respuestaImg->fetch_assoc()) {
		$pdf->Cell(1,1,$pdf->Image('../'.$filaImg['foto'],100,10,25));
		 
	}
	//Cuerpo de la pagina pdf
	//Londitud,alto,titulo,borde,salto de linea,centrado,relleno
 

	$pdf->SetFillColor(206,206,206);
	$pdf->SetTextColor(40,40,40);
	$pdf->SetDrawColor(255,255,255);
	$pdf->Cell(15,10,'Ticket','',0,'C',1);
	$pdf->Cell(25,10,'Fecha','',0,'C',1);
	$pdf->Cell(35,10,'Categoria','',0,'C',1);
	$pdf->Cell(30,10,'Parte reparada','C',0,'',1);
	$pdf->Cell(85,10,'Comentario','',1,'C',1);	
	

	$pdf->SetFillColor(240,240,240);
	$pdf->SetTextColor(40,40,40);
	$pdf->SetDrawColor(255,255,255);
	//mostrando los datos de la consulta


	while($row=$resultado->fetch_assoc()){
		$pdf->Cell(15,10,$row['Id_Ticket'],1,'C',1);
		$pdf->Cell(25,10,$row['Fecha_Resolucion']	);
		$pdf->Cell(35,10,$row['Categoria'],'','T','C',1);		
		$pdf->Cell(30,10,$row['Parte_Reparada'],'T','',1);		
		$pdf->MultiCell(85,10,$row['Comentario'],1);
	}
	$pdf->Output();	
}else{
	echo "<script type='text/javascript'>
			alert('Debe iniciar sesión para tener acceso a esta sección');
			
	</script>
	";
}

?>