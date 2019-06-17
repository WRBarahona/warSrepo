<?php 
include 'conexion.php';

class VistaSoluciones{

	protected $c;

	public function VistaSoluciones(){
		$this->c = new conexion();
	}

	public function verSoluciones() {
	    $sql="SELECT t1.idTicket, t2.nombre, t1.fecha, t1.categoria, t1.parte, t1.comentario FROM solucionticket t1 INNER JOIN tecnico t2 ON t1.idTecnico=t2.idTecnico;";
	    $resultado= $this->c->consultar($sql);
	    $ncampos= mysqli_num_fields($resultado);
	    $tabla="<table class='table table-bordered'>";
	    $tabla.="<thead class='thead-dark'><tr>"; 
	    $tabla.="<th><b>ID Ticket</b></th>";  
	    $tabla.="<th><b>Técnico</b></th>";   
	    $tabla.="<th><b>Fecha</b></th>";  
	    $tabla.="<th><b>Categoría</b></th>";
	    $tabla.="<th><b>Parte</b></th>";  
	    $tabla.="<th><b>Comentario</b></th>";
	    $tabla.="</thead></tr>";
	    for($i=0;$i<$ncampos;$i++){
	        while ($fila = mysqli_fetch_row($resultado)) {
	            $tabla.="<tr>";
	                for($col=0;$col<$ncampos;$col++){
	                    $tabla.="<td>".$fila[$col]."</td>";
	                }
	                
	            $tabla.="</tr>";            }         }
	    $tabla.="</table>";
	    return $tabla;
	}

	/*public function mostrarFiltrados($parametro){
		$sql="SELECT * from solucionticket where Fecha = $parametro";
		$resultado= $this->c->consultar($sql);

		$ncampos=mysqli_num_fields($resultado);
		$tabla="<table class='table table-bordered'>";
	    //Imprimiendo los encabezados de la tabla
	    $tabla.="<thead class='thead-dark'><tr>"; //<-INICIO DE FILA DE ENCABEZADO
	    $tabla.="<th><b>ID Ticket</b></th>";  
	    $tabla.="<th><b>ID Tecnico</b></th>";   
	    $tabla.="<th><b>Fecha</b></th>";  
	    $tabla.="<th><b>Categoría</b></th>";
	    $tabla.="<th><b>Parte</b></th>";  
	    $tabla.="<th><b>Comentario</b></th>";
	    $tabla.="</thead></tr>";
		while($encabezado = mysqli_fetch_field($resultado)){
			$tabla .= "<td><b>" .$encabezado->name."</td></b>";
		}

		//Columna extra para las acciones sobre los datos
		$tabla .="</tr>";
		//Imprimiendo el resto de la tabla
		for($i=0; $i<$ncampos; $i++){
			while($fila=mysqli_fetch_row($resultado)){
				$tabla .="</tr>";
				for($col=0; $col<$ncampos; $col++){
					$tabla .="<td>".$fila[$col]."</td>";
				}			
				$tabla.="</tr>";
			}

	    }
		$tabla.="</table>";
		return $tabla;

		}*/


	
}


 ?>