<?php

class Celda 
{
  private $pregunta;
  private $mina;
  private $indicacion = 0;

  private $estado = false;
  private $marcada = false;
  function agregarMina() {
    $this->mina = true;
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
  function agregarPregunta($pregunta) {
    $this->pregunta = $pregunta;
  }
  function tienePregunta() {
    if (!empty($this->pregunta)) {
      return true;
    }
    return false;
  }
  function obtenerPregunta() {
    return $this->pregunta;
  }
  function marcarCelda() {
    $this->marcada = !$this->marcada;
  }
  function mostrarCelda() {
    $this->estado = true;
  }
  function mostrada() {
    return $this->estado;
  }
  function tieneIndicacion() {
    if ($this->indicacion > 0) {
      return true;
    }
    return false;
  }
  function obtenerIndicacion() {
    return ($this->indicacion>0) ? $this->indicacion : "";
  }
  function clase() {
    $string = "celda";
    if ($this->marcada) {
      $string .= " marcada";
    } else if ($this->estado) {
      $string .= " mostrada";
    }
    return $string;
  }
}


?>