<?php 
require('fpdf/fpdf.php');

	Class PDF extends FPDF{

		function Header(){
			$this->Image('../../img/logo2.jpg',27,15,0,35);
			$this->SetFont('Courier','B',15);
			$this->Write(5,utf8_decode('--Soluciones Técnicas--'));
			$this->Cell(30);
			//$this->Cell(120,10,'Reporte de Ruta',0,3,'');
			/*$this->SetX(-70);
			$this->Write(5,'Reporte de ruta');*/
			$this->SetFont('Courier','',10);
			$this->SetX(-70);
			$this->Write(10,'Fecha: '.date('d-m-Y').' ',0);
			$this->Ln(6);
			$this->SetX(-70);
			date_default_timezone_set("America/El_Salvador");
			$this->Write(10,'Hora: '.date('h:i:s').'',0,0,'C');
			$this->Ln(35);
					
		}

		function Footer(){
			$this->SetY(-15);
			$this->SetFont('Courier','B',10);
			$this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'C');
		}
	}
 ?>