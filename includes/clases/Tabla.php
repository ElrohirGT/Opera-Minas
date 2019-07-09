<?php

require 'Celda.php';
require 'Pregunta.php';
require 'Preguntas.php';

class Tabla
{
  public $tablero;
  public $xpreguntas;
  private $dificultad;
  private $contadorMinas;
  function __construct($dificultad) {
    $this->dificultad = $dificultad;
    $this->tablero = new SplFixedArray($dificultad);
    foreach ($this->tablero as $indice => $value) {
      $this->tablero[$indice] = new SplFixedArray($dificultad);
      foreach ($this->tablero[$indice] as $subIndice => $celda) {
        $this->tablero[$indice][$subIndice] = new Celda();
      }
    }
    //$this->tablero[0][0]->agregarPregunta(new Pregunta("Despeja x: 2x+1=5", 2));
     $this->xpreguntas =   new preguntas($dificultad);
    //Array de las preguntas, ordenalas por dificultad, cada pregunta puede ser un objeto de una clase pregunta
    //Asi le añadis tambien funciones para revisar si la respuesta es correcta, y para ordenar las preguntas.
  }

  function mostrarTablero() {
    foreach ($this->tablero as $indice => $fila) {
      echo "<tr>";
      foreach ($fila as $subIndice => $celda) {
        echo "<td class='{$celda->clase()}'>";
        if ($celda->mostrada()) {
          echo "<span>{$celda->obtenerIndicacion()}<span>";
        } else {
          echo "<button type='submit' value='{$indice}|{$subIndice}' name='celda'></button>";
        }
        echo "</td>";
      }
      echo "</tr>";
    }
  }
  function mostrarCeldas($origen, $nivel) {
    $indice = $origen[0];
    $subIndice = $origen[1];
    $celdasAdyacentes = $this->obtenerCeldasAdyacentes($indice, $subIndice);
    foreach ($celdasAdyacentes as $celdaAdyacente) {
      if ($nivel-1!=0) {
        $this->mostrarCeldas($celdaAdyacente, $nivel-1);
      } else if (!$this->tablero[$celdaAdyacente[0]][$celdaAdyacente[1]]->tieneMina()) {              
        $this->tablero[$celdaAdyacente[0]][$celdaAdyacente[1]]->mostrarCelda();
      }
    }
    if (!$this->tablero[$indice][$subIndice]->tieneMina()) {
      $this->tablero[$indice][$subIndice]->mostrarCelda();
    }
  }
  function obtenerCelda($ubicaciones) {
    return $this->tablero[$ubicaciones[0]][$ubicaciones[1]];
  }
  function actualizarCelda($ubicaciones, $celda) {
    $this->tabla[$ubicaciones[0]][$ubicaciones[1]] = $celda;
  }
  function parsear($string) {
    return explode('|', $string);
  }
  function unaMinaMenos() {
    $this->contadorMinas--;
  }
  function hayMinas() {
    return ($this->contadorMinas > 0)? true : false;
  }
  function ponerMinas() {
    $contador_de_minas=0;
    $total_casillas=$this->dificultad*$this->dificultad;
    $total_minas=$total_casillas*0.20;
    while($contador_de_minas<$total_minas){
      $indice=rand(0, $this->dificultad-1);
      $subindice=rand(0, $this->dificultad-1);
        $celda=$this->tablero[$indice][$subindice];
        if(!$celda->tieneMina()){
        $celda->agregarMina();
        $contador_de_minas++;
        $this->tablero[$indice][$subindice]=$celda;
        }
    }
    $this->contadorMinas = $contador_de_minas;
  }
  function ponerPreguntas(){
      $contador_de_preguntas=0;
    $total_casillas=$this->dificultad*$this->dificultad;
    $total_preguntas=$total_casillas*0.20;
    while($contador_de_preguntas<$total_preguntas){
      $indice=rand(0, $this->dificultad-1);
      $subindice=rand(0, $this->dificultad-1);
        $celda=$this->tablero[$indice][$subindice];
        if(!$celda->tieneMina() && !$celda ->tienePregunta()){
          $numeroPregunta = rand(0,9);
          $celda->agregarPregunta($this->xpreguntas[$numeroPregunta]);         
          $contador_de_preguntas++;
          $this->tablero[$indice][$subindice]=$celda;
        }
  }
  function ponerIndicaciones() {
    foreach ($this->tablero as $fila => $celdas) {
      foreach ($celdas as $indice => $celda) {
        if ($celda->tieneMina()) {
          $celdasAdyacentes = $this->obtenerCeldasAdyacentes($fila, $indice);

          foreach ($celdasAdyacentes as $celdaAdyacente) {
            if (!$this->tablero[$celdaAdyacente[0]][$celdaAdyacente[1]]->tieneMina()) {              
              $this->tablero[$celdaAdyacente[0]][$celdaAdyacente[1]]->unaMinaCerca();
            }
          }
        }
      }
    }
    //Le toca a Flavio
  }
  private function obtenerCeldasAdyacentes($fila, $indice) {
    $posiciones = [
      [$fila+1, $indice], [$fila-1, $indice],
      [$fila, $indice+1], [$fila, $indice-1],
      [$fila+1, $indice+1], [$fila+1, $indice-1],
      [$fila-1, $indice-1], [$fila-1, $indice+1]
    ];
    return $this->filtrarCeldasAdyacentes($posiciones);
  }
  private function filtrarCeldasAdyacentes($posiciones) {
    foreach ($posiciones as $indice => $posicion) {
      if ($posicion[0] < 0 || $posicion[1] < 0) {
        unset($posiciones[$indice]);
      }else if ($posicion[0]>=$this->dificultad || $posicion[1]>=$this->dificultad) {
        unset($posiciones[$indice]);
      }else if ($posicion[0]=== 8 || $posicion[1]===8) {
        echo "HOW DE FAQ IM HERE ";
        echo "{$indice}<br>";
      }
    }
    return $posiciones;
  }
  //Pueden agregar las funciones que quieran, siempre y cuadno le pongan private dentro de la clase.
  //EJEMPLO: 
  // private function funcionParaChequearLosEspaciosAlrededorDeUnaCelda() {
  //   //blablabal codigo blablabla
  // }
  //Revisen la clase celda y que hace, junta con esta clase y el archivo index.inc.php

}


?>