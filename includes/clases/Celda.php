<?php

class Celda 
{
  private $pregunta;
  private $mina;
  private $indicacion = 0;

  private $marcada = false;
  private $mostrada = false;
  function agregarMina() {
    $this->mina = true;
  }
  function agregarPregunta($pregunta) {
    $this->pregunta = $pregunta;
  }
  function tienePregunta() {
    if (!empty($this->pregunta)) {
      return true;
    }
    return false;
  }
  function tieneMina() {
    if (!empty($this->mina)) {
      return true;
    }
    return false;
  }
  function unaMinaCerca() {
    $this->indicacion += 1;
  }
  function marcarCelda() {
    $this->marcada = true;
  }
  function clase() {
    $string = "celda";
    if ($this->marcada) {
      $string += "marcada";
    } else if ($this->mostrada) {
      $string += "mostrada";
    }
    return $string;
  }
}


?>