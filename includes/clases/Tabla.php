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
    $this->tablero[0][0]->agregarMina();
    $this->preguntas = [];
    //Array de las preguntas, ordenalas por dificultad, cada pregunta puede ser un objeto de una clase pregunta
    //Asi le añadis tambien funciones para revisar si la respuesta es correcta, y para ordenar las preguntas.
  }
  
  function ponerMinas() {// 1/5 de las celdas son bombas
    //Le toca a Erick
  }
  function ponerPreguntas() {// Recuerda que van a haber preguntas para diferentes dificultades
    //Puedes crear una clase pregunta, para crear funciones que chequeen si esta bien la respuesta que de el usuario y para guardar las respuestas.
    //Le toca a Tojin
  }
  function ponerIndicaciones() {
    foreach ($this->tablero as $fila => $celdas) {
      foreach ($celdas as $indice => $celda) {
        $celdasAdyacentes = $this->obtenerCeldasAdyacentes($fila, $indice);
        
        echo "Celdas Adyacentes";
        echo "<pre>";
        var_dump($celdasAdyacentes);
        echo "</pre>";
        foreach ($celdasAdyacentes as $posicion) {
          if (!$this->tablero[$posicion[0]][$posicion[1]]->tieneMina()) {
            $this->tablero[$posicion[0]][$posicion[1]]->unaMinaCerca();
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
    // while (list($indice, $posicion) = each($posiciones)) {
    //   if ($posicion[0] < 0 || $posicion[1] < 0) {
    //     unset($posiciones[$indice]);
    //   } else if ($posicion[0] > $this->dificultad || $posicion[1] > $this->dificultad) {
    //     unset($posiciones[$indice]);
    //   } else if ($posicion[0] === 8 || $posicion[1] === 8) {
    //     echo "HOW DE FAQ IM HERE ";
    //     echo "{$indice}<br>";
    //   }
    // }
    foreach ($posiciones as $indice => $posicion) {
      if ($posicion[0] < 0 || $posicion[1] < 0) {
        unset($posiciones[$indice]);
      }else if ($posicion[0]>$this->dificultad || $posicion[1]>$this->dificultad) {
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