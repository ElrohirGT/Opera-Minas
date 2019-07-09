<?php

class Pregunta
{
  public $pregunta;
  private $respuesta;

  function __construct(string $pregunta, $respuesta) {
    $this->pregunta = $pregunta;
    $this->respuesta = $respuesta;
  }
  public function validar($respuestaUsuario) {
    return $respuestaUsuario == $this->respuesta;
  }
}


?>