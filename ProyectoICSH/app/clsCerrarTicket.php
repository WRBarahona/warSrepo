<?php 
include "conexion.php";

$idUsuario =  $_SESSION["usuario"]["idUsuario"];

class solucionTicket{
	protected $s;

	public function solucionTicket(){
		$this->s = new conexion();
	}

	//FUNCION PARA INSERTAR EN TABLA SOLUCION
	public function agregarSolucion($idTicket,$idTecnico,$fecha,$categoria,$parte,$comentario){
		$sql = "INSERT INTO solucionTicket VALUES (idTicket,idTecnico,fecha,categoria,parte,comentario)";
		$this->s->ejecutar($sql);
	}

	//FUNCION PARA MOSTRAR EL ID DEL TICKET PARA SU SOLUCION
	public function mostrarIdTicket($idUsuario){
		$sql = "select * from asignacion where ";
		$resultado = $this->s->consultar($sql);

		echo '<select name="txtIDticket" id="txtIDticket" class="form-control">';
		 echo "<option value=''>Seleccione el ID del ticket</option>";
		 while($row = mysqli_fetch_assoc($resultado)){
		 	echo "<option value '".$row['idTicket']."'>".$row["idTicket"]."</option>";
		 }
		 echo "</select>";
	}

	//FUNCION PARA MOSTRAR EL ID DEL TECNICO(nombre)
	//su valor es el id, pero lo que se mostrara es su nombre
	public function mostrarIdTec(){
		 $sql = "select * from tecnico where idUsuario";
		 $resultado = $this->s->consultar($sql);
		 echo '<select name="txtIDtecnico" id="txtIDtecnico" class="form-control">';
		 echo "<option value =''>Seleccione su nombre como técnico</option>";
		 while ($row = mysqli_fetch_assoc($resultado)) {
		 	echo '<option value="'.$row["idTecnico"].'">'.$row["nombre"].'</option>';
		 }
		 echo '</select>';
	}
}
?>
