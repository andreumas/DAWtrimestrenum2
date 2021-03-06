<?php
/**
 * Permitir la conexion contra la base de datos
 */
class dbNBA
{
  //Atributos necesarios para la conexion
  private $host="localhost";
  private $user="root";
  private $pass="";
  private $db_name="nba";

  //Conector
  private $conexion;

  //Propiedades para controlar errores
  private $error=false;

  function __construct()
  {
      $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
      if ($this->conexion->connect_errno) {
        $this->error=true;
      }
  }

  //Funcion para saber si hay error en la conexion
  function hayError(){
    return $this->error;
  }

  // Funcion que muestra todos los equipos
  public function listaEquipos(){

  if ($this->error==true){
      return null;

  }else{
	$tabla=[];
	$resultado = $this->conexion->query("SELECT * FROM equipos ");

	while ($fila = $resultado->fetch_assoc()){
		$tabla[]=$fila;
	}
	return $tabla;
  }

}

  //Funciones para la inserccion
  public function insertarEquipo($nombre,$ciudad,$conferencia,$division){

    if ($this->error==true){
        return null;

    }else{
      $sqlinsercion="INSERT INTO equipos(Nombre,Ciudad,Conferencia,Division) VALUES ('".$nombre."','".$ciudad."','".$conferencia."','".$division."')";
      $this->conexion->query($sqlinsertion);
    }

  }

  // Mostrar ultimo equipo
  public function mostrarUltimoEquipo($nombre){

      if ($this->error==true){
          return null;

      }else{
		$tabla=[];
			$resultado = $this->conexion->query("SELECT * FROM equipos WHERE nombre='".$nombre."'");

		while ($fila=$resultado->fetch_assoc()){
			$tabla[]=$fila;
		}
		return $tabla;
	  }

    }

    //Funciones para la inserccion
    public function updateEquipo($nombre,$ciudad,$conferencia,$division){

      if ($this->error==true){
          return null;

      }else{
        $sqlinsercion="UPDATE equipos SET Nombre='".$nombre."',Ciudad='".$ciudad."',Conferencia='".$conferencia."',Division='".$division."' WHERE Nombre='".$nombre."'";
        $this->conexion->query($sqlinsercion);
      }

    }
    // Funcion para el borrado del ultimo insertado
    public function deleteEquipo($nombre){

      if ($this->error==true){
          return null;

      }else{
        $sqlInserction="DELETE FROM equipos WHERE Nombre='".$nombre."'";
        $this->conexion->query($sqlinsercion);
      }
    }

}
  ?>
