<?php

class Celda 
{
  public $pregunta;
  public $mina;
  function agregarMina() {
    $this->mina = true;
  }
  function agregarPregunta($pregunta) {
    $this->pregunta = $pregunta;
  }
}


?>