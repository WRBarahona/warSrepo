<?php 
include 'conexion.php';

class VistaTickClientes{

	protected $c;

	public function VistaTickClientes(){
		$this->c = new conexion();
	}

	public function verTickClientes() {
	    $sql="SELECT * FROM ticket WHERE estado = 1;";
	    $resultado= $this->c->consultar($sql);
	    $ncampos= mysqli_num_fields($resultado);
	    $tabla="<table class='table table-bordered'>";
	    $tabla.="<thead class='thead-dark'><tr>"; 
	    $tabla.="<th><b>ID Cliente</b></th>";  
	    $tabla.="<th><b>ID Ticket</b></th>";   
	    $tabla.="<th><b>Fecha</b></th>";  
	    $tabla.="<th><b>Descripción</b></th>";
	    $tabla.="</thead></tr>";
	    for($i=0;$i<$ncampos-2;$i++){
	        while ($fila = mysqli_fetch_row($resultado)) {
	            $tabla.="<tr>";
	                for($col=0;$col<$ncampos-2;$col++){
	                    $tabla.="<td>".$fila[$col]."</td>";
	                }
	                
	            $tabla.="</tr>";            }         }
	    $tabla.="</table>";
	    return $tabla;
	}
	
}


 ?>