<?php

spl_autoload_register(function ($nombre){
  require "./clases/{$nombre}.php";
});

if (!isset($_POST['dificultad'])) {
  header("Location: ../index.php?var=e");
}

$tabla = new Tabla($_POST['dificultad']);

var_dump($tabla);
// $tabla->ponerMinas();//Son las bombas

// $tabla->ponerPreguntas();//Las preguntas
// $tabla->ponerIndicaciones();//Los números de las celdas para dar pistas al jugador
?>