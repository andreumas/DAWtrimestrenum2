<?php
class juegotronosDB
{
  private $conexion;
  private $errorConexion=false;

  function __construct()
  {
    $this->conexion = new mysqli("localhost", "root", "", "gameofthrones");
    if ($this->conexion->connect_errno) {
      $this->errorConexion=true;
    }
  }

  public function getErrorConexion(){
    return $this->errorConexion;
  }

  public function actoresEpisodios(){
    return $this->conexion->query("SELECT name,serie_name  FROM `season_ep`");
  }

  public function Actores(){
    return $this->conexion->query("SELECT full_desc FROM cast ");
  }

  public function ActoresOrdenadosPorEpisodio(){
    return $this->conexion->query("SELECT full_desc FROM `cast` ORDER BY episodes DESC");
  }

  public function imprimirLista($campo, $resultado){
    echo "<ol>";
    while($fila=$resultado->fetch_assoc()){
      echo "<li>".$fila[$campo]."</li>";
    }
    echo "</ol>";
  }
}
?>
