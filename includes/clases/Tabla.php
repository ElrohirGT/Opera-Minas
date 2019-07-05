<?php

require 'Celda.php';

class Tabla
{
  public $tabla;
  public $preguntas;
  function __construct($dificultad) {
    $this->tabla = new SplFixedArray($dificultad);
    foreach ($this->tabla as $indice => $value) {
      $this->tabla[$indice] = new SplFixedArray($dificultad);
      foreach ($this->tabla[$indice] as $subIndice => $celda) {
        $this->tabla[$indice][$subIndice] = new Celda();
      }
    }
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
    //Le toca a Flavio
  }
  //Pueden agregar las funciones que quieran, siempre y cuadno le pongan private dentro de la clase.
  //EJEMPLO: 
  // private function funcionParaChequearLosEspaciosAlrededorDeUnaCelda() {
  //   //blablabal codigo blablabla
  // }
  //Revisen la clase celda y que hace, junta con esta clase y el archivo index.inc.php

}


?>