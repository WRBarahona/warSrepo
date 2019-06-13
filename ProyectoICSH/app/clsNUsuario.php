<?php  
	include ('conexion.php');
	class NuevoUsuario{
		protected $c;
		private $idUsuario;
		private $nombUsuario;
		private $pass;
		private $idRol;
		private $estado;

		public function nuevoUsuario(){
			$this->c = new conexion();
		}

		public function getIdUsuario(){
			return $this->idUsuario;
		}
		
		public function setIdUsuario($idUsuario){
			$this->idUsuario = $idUsuario;
		}

		public function getNombUsuario(){
			return $this->nombUsuario;
		}
		
		public function setNombUsuario($nombUsuario){
			$this->nombUsuario = $nombUsuario;
		}

		public function getPass(){
			return $this->pass;
		}
		
		public function setPass($pass){
			$this->pass = $pass;
		}

		public function getIdRol(){
			return $this->idRol;
		}
		
		public function setIdRol($idRol){
			$this->idRol = $idRol;
		}

		public function getEstado(){
			return $this->estado;
		}
		
		public function setEstado($estado){
			$this->estado = $estado;
		}

		public function insertar() {
        	$sql="INSERT INTO usuario VALUES($this->idUsuario,'$this->nombUsuario', '$this->pass','$this->idRol',default);";
       		$this->c->consultar($sql);
    	}

    	public function modificar($idUsuario){
			$sql="UPDATE usuario SET idUsuario=$this->idUsuario, nombUsuario='$this->nombUsuario', pass='$this->pass', idRol='$this->idRol' WHERE idUsuario=$idUsuario;";
			$this->c->ejecutar($sql);
		}

		public function eliminar($idUsuario){
        $sql="UPDATE usuario set estado=0 where idUsuario=$idUsuario";
        $this->c->consultar($sql);
   		}

   		public function mostrarUsuarios() {
        $sql="SELECT * FROM usuario WHERE idRol=3 and estado=1";
        $resultado= $this->c->consultar($sql);
        $ncampos= mysqli_num_fields($resultado);
        $tabla="<table class='table table-bordered' aling='center'>";
        //Imprimiendo los encabezados de la tabla
        $tabla.="<thead class='thead-dark'><tr>"; //<-INICIO DE FILA DE ENCABEZADO
        $tabla.="<th><b>Id Usuario</b></th>
        		 <th><b>Nombre de usuario</b></th>
        		 <th><b>Contraseña</b></th>
        		 <th><b>Rol</b></th>";
        //Columna para acciones sobre los datos
        $tabla.="<th><b>Acciones</th></b>";
        $tabla.="</thead></tr>";//<-FIN DE FILA DE ENCABEZADO
        //IMPRIMIENDO EL CONTENIDO DE LA TABLA
        for($i=0;$i<$ncampos;$i++){
            while ($fila = mysqli_fetch_row($resultado)) {
                $tabla.="<tr>";
                        $tabla.="<td>".$fila[0]."</td>";
                        $tabla.="<td>".$fila[1]."</td>";
                        $tabla.="<td>".$fila[2]."</td>";
                        $tabla.="<td>".$fila[3]."</td>";
                $tabla.="<td><b><a href=\"javascript:cargar('$fila[0]','$fila[1]','$fila[2]', '$fila[3]')\">Cargar</a></b></td>";
                $tabla.="</tr>";   
            }
        }
        $tabla.="</table>";
        return $tabla;
    }



	}
?>
