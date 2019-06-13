<?php 

require("conexion.php");

/**
 * 
 */
class Tecnico{
	protected $con;
	private $id;
	private $carnet;
	private $nombre;
	private $correo;
	private $tel;
	private $foto;
	private $idUsuario;

	public function tecnico(){
		$this->con = new conexion();
	}

	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}

	public function getCarnet(){
		return $this->carnet;
	}
	
	public function setCarnet($carnet){
		$this->carnet = $carnet;
	}

	public function getNombre(){
		return $this->nombre;
	}
	
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getCorreo(){
		return $this->correo;
	}
	
	public function setCorreo($correo){
		$this->correo = $correo;
	}

	public function getTel(){
		return $this->tel;
	}
	
	public function setTel($tel){
		$this->tel = $tel;
	}

	public function getFoto(){
		return $this->foto;
	}
	
	public function setFoto($foto){
		$this->foto = $foto;
	}

	public function getIdUsuario(){
		return $this->idUsuario;
	}
	
	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}
    
    //Agregar datos
    public function insertar(){
        $sql="INSERT INTO tecnico values($this->id, '$this->carnet', '$this->nombre', '$this->correo', '$this->tel', '$this->foto', $this->idUsuario, default,default);";
       $this->con->ejecutar($sql);      
    }   

	public function insertarUsuario($idUsuario,$nombUsuario,$pass,$idRol) {
    	$sql="INSERT INTO usuario VALUES($idUsuario,'$nombUsuario', '$pass','$idRol',default);";
   		$this->con->consultar($sql);
    }    
    //Modificar datos
    public function modificar($id) {
        $sql="UPDATE tecnico set idTecnico=$this->id, noCarnet='$this->carnet', nombre='$this->nombre', Correo='$this->correo', tel='$this->tel', foto='$this->foto', idUsuario='$this->idUsuario' where idTecnico=$id";
        $this->con->ejecutar($sql);     
    } 

	public function modificarUsuario($idUsuario,$nombUsuario,$pass, $id) {
    	$sql="UPDATE usuario SET idUsuario=$idUsuario, nombUsuario='$nombUsuario', pass='$pass' WHERE idUsuario=$id;";
			$this->con->ejecutar($sql);
    }
    
    //Eliminar datos
    public function eliminar($id){
        $sql="UPDATE tecnico set estado=0 where idTecnico=$id";
        $this->con->ejecutar($sql);
    }
    
    //Eliminar datos
    public function eliminarUsuario($id){
        $sql="UPDATE usuario set estado=0 where idUsuario=$id";
        $this->con->ejecutar($sql);
    }
    
    //Mostrar datos
    public function mostrarTecnico() {
        $sql="SELECT t1.idTecnico, t1.noCarnet, t1.nombre, t1.Correo, t1.tel, t1.foto, t1.idUsuario, t2.nombUsuario, t2.pass FROM tecnico t1 INNER JOIN usuario t2 on t1.idUsuario=t2.idUsuario WHERE t2.estado=1";
        $resultado= $this->con->consultar($sql);
        $ncampos= mysqli_num_fields($resultado);
        $tabla="<table class='table table-bordered'>";
        //Imprimiendo los encabezados de la tabla
        $tabla.="<thead class='thead-dark'><tr>"; //<-INICIO DE FILA DE ENCABEZADO
        while ($encabezado = mysqli_fetch_field($resultado)) {
            $tabla.="<th><b>".$encabezado->name."</th></b>";
        }
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
                        $tabla.="<td>".$fila[4]."</td>";
                        $tabla.='<td style="padding: 0.5px, 0.5px, 0.5px, 0.5px; ">
								<center><img src="'.$fila[5].'" style="width: 9.5ch; height: 8ch; position: relative;"></center>
								</td>';
                        $tabla.="<td>".$fila[6]."</td>";
                        $tabla.="<td>".$fila[7]."</td>";
                        $tabla.="<td>".$fila[8]."</td>";
                    $tabla.="<td><b><a href=\"javascript:cargar('$fila[0]','$fila[1]','$fila[2]','$fila[3]','$fila[4]','$fila[5]','$fila[6]','$fila[7]','$fila[8]')\">Cargar</a></b></td>";
                $tabla.="</tr>";   
            }
        }
        $tabla.="</table>";
        return $tabla;
    }
}
 ?>