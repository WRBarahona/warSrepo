<?php 
include 'conexion.php';

class Ticket{

	protected $c;

	public function Ticket(){
		$this->c = new conexion();
	}
	//FUNCION PARA INSERTAR UN REGISTRO EN LA TABLA TICKET
	public function agregar($idCliente, $fecha, $descrip){
		$sql="insert into ticket values(null,$idCliente,'$fecha','$descrip',default,default)";
		$this->c->ejecutar($sql);		
	}

	//FUNCION PARA MOSTRAR LOS CARNETS DE LOS CLIENTES
	public function mostrarCarnet(){
		 $sql = "select * from cliente";
		 $resultado = $this->c->consultar($sql);
		 echo '<select name="txtCarnet" id="txtCarnet" class="form-control">';
		 echo "<option></option>";
		 while ($row = mysqli_fetch_assoc($resultado)) {
		 	echo '<option value="'.$row["idCliente"].'">'.$row["noCarnet"].'</option>';
		 }
		 echo '</select>';
	}
		public function mostrarTicketsFiltrados($idUsuario,$parametro){
		$sql="SELECT t3.idTicket as Id_Ticket, t3.fecha as Fecha_Reporte, t3.descrip Descripcion_Falla, t3.estado as Estado
			from usuario as t1 inner JOIN cliente as t2
			on t1.idUsuario = t2.idUsuario
			INNER JOIN ticket as t3 ON
			t2.idCliente = t3.idCliente
			where t1.idUsuario = $idUsuario AND t3.estado = $parametro";
		$resultado= $this->c->consultar($sql);

		$ncampos=mysqli_num_fields($resultado);
		$tabla ="<table class='table table bordered'>";
		//Imprimiendo Encabezados de la Tabla

		$tabla .= "<tr>";
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

		}
		public function mostrarTickets($idUsuario){
		$sql="SELECT t3.idTicket as Id_Ticket, t3.fecha as Fecha_Reporte, t3.descrip Descripcion_Falla, t3.estado as Estado
			from usuario as t1 inner JOIN cliente as t2
			on t1.idUsuario = t2.idUsuario
			INNER JOIN ticket as t3 ON
			t2.idCliente = t3.idCliente
			where t1.idUsuario = '$idUsuario'";
		$resultado= $this->c->consultar($sql);
		$ncampos=mysqli_num_fields($resultado);
		$tabla ="<table class='table table bordered'>";
		//Imprimiendo Encabezados de la Tabla

		$tabla .= "<tr>";
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

		}
	}
	
	//FUNCION PARA MOSTRAR LOS TICKETS
	
	


	//FUNCION PARA BUSQUEDA FILTRADA DE TICKETS


 ?>