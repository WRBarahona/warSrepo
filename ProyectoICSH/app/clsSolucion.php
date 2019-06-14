<?php 
include'conexion.php';

class Solucion{
	protected $c;

	public function Solucion(){
		$this->c = new conexion();
	}

	public function mostrar($para){
			$sql="SELECT COUNT(idTicket) as nTickets
			from solucionTicket where categoria='$para'";
		$result=$this->c->consultar($sql);
		while ($registro=mysqli_fetch_array($result)) {
			echo $registro['nTickets'];
		}
	}

	public function mostrarFalla($cat, $par){
			$sql="SELECT COUNT(idTicket) as nTickets
			from solucionTicket where categoria='$cat' and parte='$par'";
		$result=$this->c->consultar($sql);
		while ($registro=mysqli_fetch_array($result)) {
			echo $registro['nTickets'];
		}
	}

	public function mostrarFecha($cat, $par, $fechaIni, $fechaFin){
			$sql="SELECT COUNT(idTicket) as nTickets from solucionTicket
 				where categoria='$cat' and parte='$par' and fecha>='$fechaIni' and fecha<='$fechaFin';";
		$result=$this->c->consultar($sql);
		while ($registro=mysqli_fetch_array($result)) {
			echo $registro['nTickets'];
		}
	}

	public function mostrarFechaGeneral($cat, $fechaIni, $fechaFin){
			$sql="SELECT COUNT(idTicket) as nTickets from solucionTicket
 				where categoria='$cat' and fecha>='$fechaIni' and fecha<='$fechaFin';";
		$result=$this->c->consultar($sql);
		while ($registro=mysqli_fetch_array($result)) {
			echo $registro['nTickets'];
		}
	}

}
?>