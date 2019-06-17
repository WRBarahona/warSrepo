<?php 
include 'conexion.php';

class VistaTickClientes{

	protected $c;

	public function VistaTickClientes(){
		$this->c = new conexion();
	}

	public function verTickClientes() {
	    $sql="SELECT t1.idTicket, t2.nombre, t1.fecha, t1.descrip FROM ticket t1 INNER JOIN cliente t2 on t1.idCliente=t2.idCliente where t1.estado=1 order by t1.idTicket;";
	    $resultado= $this->c->consultar($sql);
	    $ncampos= mysqli_num_fields($resultado);
	    $tabla="<table class='table table-bordered'>";
	    $tabla.="<thead class='thead-dark'><tr>"; 
	    $tabla.="<th><b>ID Ticket</b></th>";  
	    $tabla.="<th><b>Cliente</b></th>";   
	    $tabla.="<th><b>Fecha</b></th>";  
	    $tabla.="<th><b>Descripción</b></th>";
	    $tabla.="</thead></tr>";
	    for($i=0;$i<$ncampos-2;$i++){
	        while ($fila = mysqli_fetch_row($resultado)) {
	            $tabla.="<tr>";
	                $tabla.="<td>".$fila[0]."</td>";
	                $tabla.="<td>".$fila[1]."</td>";
	                $tabla.="<td>".$fila[2]."</td>";
	                $tabla.="<td>".$fila[3]."</td>";
	            $tabla.="</tr>";            }         }
	    $tabla.="</table>";
	    return $tabla;
	}
	
}


 ?>