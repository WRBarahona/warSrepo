<?php   
	include ('conexion.php');
	class AsignarTicket{
		protected $c;
		private $idTecnico;
		private $idTicket;

		public function AsignarTicket(){
			$this->c = new conexion();
		}

		public function getIdTecnico(){
			return $this->idTecnico;
		}
		
		public function setIdTecnico($idTecnico){
			$this->idTecnico = $idTecnico;
		}

		public function getIdTicket(){
			return $this->idTicket;
		}
		
		public function setIdTicket($idTicket){
			$this->idTicket = $idTicket;
		}


		public function insertar() {
        	$sql="INSERT INTO asignacion VALUES('$this->idTicket','$this->idTecnico', default);";
       		$this->c->consultar($sql);
                $sqlEstado = "update asignacion set estado = 1 where idTicket = '$this->idTicket' and idTecnico = '$this->idTecnico'";
                $this->c->consultar($sqlEstado);
    		echo '<script>window.location="frmAsigTicket.php?a";</script>';
    	}

    	public function actActividadTec() {
			$sql="UPDATE tecnico SET disponible=0 WHERE idTecnico ='$this->idTecnico'";
			$this->c->ejecutar($sql);
		}

		public function actAsignacionTic() {
			$sql="UPDATE ticket SET asignacion=1 WHERE idTicket ='$this->idTicket'";
			$this->c->ejecutar($sql);
		}

		public function verAsignados() {
        $sql="SELECT t1.idTicket, t2.nombre FROM asignacion t1 INNER JOIN tecnico t2 ON t1.idTecnico=t2.idTecnico;";
        $resultado= $this->c->consultar($sql);
        $ncampos= mysqli_num_fields($resultado);
        $tabla="<table class='table table-bordered'>";
        //Imprimiendo los encabezados de la tabla
        $tabla.="<thead class='thead-dark'><tr>"; //<-INICIO DE FILA DE ENCABEZADO
        $tabla.="<th><b>ID Ticket</b></th>";  
        $tabla.="<th><b>Técnico</b></th>";   
        $tabla.="</thead></tr>";//<-FIN DE FILA DE ENCABEZADO
        //IMPRIMIENDO EL CONTENIDO DE LA TABLA
        for($i=0;$i<$ncampos;$i++){
            while ($fila = mysqli_fetch_row($resultado)) {
                $tabla.="<tr>";
                $tabla.="<td>".$fila[0]."</td>";
                $tabla.="<td>".$fila[1]."</td>";
                    
                $tabla.="</tr>";            }         }
        $tabla.="</table>";
        return $tabla;
		}

		public function llenarTicket(){
			$sql="SELECT idTicket FROM ticket where estado=1 and asignacion=0;";
			$result=$this->c->consultar($sql);
			$option="";
			while ($registro=mysqli_fetch_array($result)) {
				$option.="<option value='".$registro['idTicket']."'>".$registro['idTicket']."</option>";
			}
			echo $option;
		}

		public function llenarTecnico(){
			$sql="SELECT idTecnico, nombre FROM tecnico where estado=1 and disponible=1;";
			$result=$this->c->consultar($sql);
			$option="";
			while ($registro=mysqli_fetch_array($result)) {
				$option.="<option value='".$registro['idTecnico']."'>".$registro['nombre']."</option>";
			}
			echo $option;
		}

	}
?>
