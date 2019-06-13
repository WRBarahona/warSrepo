<?php 
include 'plantilla.php';
include '../credenciales.php';
$conexion = new mysqli(SERVIDOR,USUARIO,CONTRA,BASEDATOS);
$sql="SELECT t1.idTicket as IdTicket,t2.nombre as Nombre,t1.fecha as Fecha, t1.descrip as Descripcion
FROM  ticket as t1
INNER JOIN cliente as t2
on t1.idCliente = t2.idCliente
ORDER BY idTicket DESC LIMIT 1";
$resultado = mysqli_query($conexion,$sql);


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

	//Cuerpo de la pagina pdf
	//Londitud,alto,titulo,borde,salto de linea,centrado,relleno
 

	$pdf->SetFillColor(206,206,206);
	$pdf->SetTextColor(40,40,40);
	$pdf->SetDrawColor(255,255,255);
	$pdf->Cell(20,10,'Id Ticket','',0,'C',1);
	$pdf->Cell(40,10,'Nombre Cliente','',0,'C',1);
	$pdf->Cell(30,10,'Fecha','',0,'C',1);
	$pdf->Cell(100,10,utf8_decode('Descripción del problema'),'',1,'C',1);


	$pdf->SetFillColor(240,240,240);
	$pdf->SetTextColor(40,40,40);
	$pdf->SetDrawColor(255,255,255);
	//mostrando los datos de la consulta


	while($row=$resultado->fetch_assoc()){
		$pdf->Cell(20,10,$row['IdTicket'],'T','C',1);
		$pdf->Cell(40,10,$row['Nombre'],'T','C',1);
		$pdf->Cell(30,10,$row['Fecha'],'T','C',1);		
		$pdf->MultiCell(100,10,utf8_decode($row['Descripcion']),1);
	}
	$pdf->Output();	
?>