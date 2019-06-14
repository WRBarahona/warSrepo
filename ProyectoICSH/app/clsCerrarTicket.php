<?php 
include "conexion.php";
class solucionTicket{
	protected $s;

	public function solucionTicket(){
		$this->s = new conexion();
	}

	//FUNCION PARA INSERTAR EN TABLA SOLUCION
	public function agregarSolucion($idTicket,$idTecnico,$fecha,$categoria,$parte,$comentario){
		try{
			//guardar los datos en la base de datos 
			$sql = "insert into solucionticket values($idTicket,$idTecnico,'$fecha','$categoria','$parte','$comentario')";
			$this->s->ejecutar($sql);

			//cambiar el estado del tenico
			$sqlTecnico = "update tecnico set disponible = 1 where idTecnico = '$idTecnico'";
			$this->s->ejecutar($sqlTecnico) or die();

			//cambio del estado del ticket 
			$sqlTicket = "update ticket set estado = 0 where idTicket  = '$idTicket'";
			$this->s->ejecutar($sqlTicket);

			//cambiando el estado de asignacion
			$sqlSolucion = "update asignacion set estado = 0 where idTecnico = '$idTecnico' AND idTicket  = '$idTicket'";
			$this->s->ejecutar($sqlSolucion);


			echo '<script>window.location="frmCierreTicket.php?m";</script>';
			//sleep(2);
		}
		catch(Exception $e){
			echo "<script type='text/javascript'>
			Swal.fire({
				type: 'info',
				title: '¡ERROR!',
				text: '¡No se ha efectuado la insercion!',   
				showConfirmButton: false,
				timer: 1500                       
				});
				</script>";

				@header("Location:frmDashboardTec.php");
			}
		}

		//FUNCION PARA MOSTRAR EL ID DEL TICKET PARA SU SOLUCION
		public function mostrarIdTicket($idUsuario){
			$sql = "SELECT t1.idTicket FROM asignacion t1
			INNER JOIN tecnico t2 ON t1.idTecnico = t2.idTecnico
			INNER JOIN usuario t3 ON t2.idUsuario = t3.idUsuario
			WHERE t1.estado = 1 and t2.disponible =  0 and t3.idusuario = '$idUsuario' ";
			$resultado = $this->s->consultar($sql);

			echo '<select name="txtIDticket" id="txtIDticket" class="form-control">';
			echo "<option value=''>Seleccione el ID del ticket</option>";
			while($row = mysqli_fetch_assoc($resultado)){
				echo '<option value="'.$row["idTicket"].'">'.$row["idTicket"].'</option>';
			}
			echo "</select>";
		}

		//FUNCION PARA MOSTRAR EL ID DEL TECNICO(nombre)
		//su valor es el id, pero lo que se mostrara es su nombre
		public function mostrarIdTec($idUsuario){
		 $sql = "select * from tecnico where idUsuario = '$idUsuario'";
		 $resultado = $this->s->consultar($sql);
		 echo '<select name="txtIDtecnico" id="txtIDtecnico" class="form-control">';
		 echo "<option value =''>Seleccione su nombre como técnico</option>";
		 while ($row = mysqli_fetch_assoc($resultado)) {
		 	echo '<option value="'.$row["idTecnico"].'">'.$row["nombre"].'</option>';
		 }
		 echo '</select>';
	}

		//FUNCION PARA MOSTRAR TODOS LOS TICKETS DEL TECNICO
		public function mostrarTickets($idUsuario){
			$sql1="SELECT t3.idTicket as Id_Ticket, t3.fecha as Fecha_Resolucion, t3.categoria as Categoria, t3.parte as Parte_Reparada,t3.comentario Comentario
			from usuario as t1 inner JOIN tecnico as t2
			on t1.idUsuario = t2.idUsuario
			INNER JOIN solucionTicket as t3 ON
			t2.idTecnico = t3.idTecnico
			where t1.idUsuario = $idUsuario";
			$result = $this->s->consultar($sql1);
			$ncampos=mysqli_num_fields($result);

			$tabla ="<table class='table table bordered'>";
		//Imprimiendo Encabezados de la Tabla
			$tabla .= "<tr>";
			while($encabezado = mysqli_fetch_field($result)){
				$tabla .= "<td><b>" .$encabezado->name."</td></b>";
			}
		//Columna extra para las acciones sobre los datos
			$tabla .="</tr>";
		//Imprimiendo el resto de la tabla
			for($i=0; $i<$ncampos; $i++){
				while($fila=mysqli_fetch_row($result)){
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
	?>
