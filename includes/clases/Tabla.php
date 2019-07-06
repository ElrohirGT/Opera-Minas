<?php

require 'Celda.php';

class Tabla
{
  public $tablero;
  public $preguntas;
  private $dificultad;
  function __construct($dificultad) {
    $this->dificultad = $dificultad;
    $this->tablero = new SplFixedArray($dificultad);
    foreach ($this->tablero as $indice => $value) {
      $this->tablero[$indice] = new SplFixedArray($dificultad);
      foreach ($this->tablero[$indice] as $subIndice => $celda) {
        $this->tablero[$indice][$subIndice] = new Celda();
      }
    }
    $this->preguntas = [];
    //Array de las preguntas, ordenalas por dificultad, cada pregunta puede ser un objeto de una clase pregunta
    //Asi le añadis tambien funciones para revisar si la respuesta es correcta, y para ordenar las preguntas.
  }

  function mostrarTablero() {
    foreach ($this->tablero as $indice => $fila) {
      echo "<tr>";
      foreach ($fila as $subIndice => $celda) {
        echo "<td class='{$celda->clase()}'>";
          echo "<button type='submit' value='[{$indice},{$subIndice}]'></button>";
        echo "</td>";
      }
      echo "</tr>";
    }
  }
  
  function ponerMinas() {
    $contador_de_minas=0;
    $total_casillas=$dificultad*$dificultad;
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
  }
  function ponerPreguntas() {// Recuerda que van a haber preguntas para diferentes dificultades
    //Puedes crear una clase pregunta, para crear funciones que chequeen si esta bien la respuesta que de el usuario y para guardar las respuestas.
    //Le toca a Erick
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
    echo "CELDA ORIGINAL: |{$fila}|{$indice}|<br>";
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