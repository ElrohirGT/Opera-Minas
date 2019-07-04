<?php

require 'Celda.php';

class Tabla
{
  public $tabla;
  function __construct($dificultad) {
    $this->tabla = new SplFixedArray($dificultad);
    foreach ($this->tabla as $indice => $value) {
      $this->tabla[$indice] = new SplFixedArray($dificultad);
      foreach ($this->tabla[$indice] as $subIndice => $celda) {
        $this->tabla[$indice][$subIndice] = new Celda();
      }
    }
  }

}


?>