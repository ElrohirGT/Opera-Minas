<?php

//Esta funcion invoca automáticamente todas las clases que creemos
spl_autoload_register(function ($nombre){
  require "./clases/{$nombre}.php";
});

session_start(); //Inicia la sesion para guardar el estado de la aplicación.

if (!isset($_POST['dificultad'])) {
  header("Location: ../index.php?var=e");
}

$tabla = new Tabla($_POST['dificultad']);

//FIXME Descomentar el echo y varDump
// echo "<h1><b>VARDUMP ANTES DE FUNCIONES</b></h1>";
// echo "<pre>";
//   var_dump($tabla);
// echo "</pre>";//Los pre ponen bonito el var_dump

// $tabla->ponerMinas();//Son las bombas. Le toca a Tojin
// $tabla->ponerPreguntas();//Las preguntas. Le toca a Erick
$tabla->ponerIndicaciones();//Los números de las celdas para dar pistas al jugaddor. Le toca a FLavio
$_SESSION["tabla"] = $tabla;
header("Location: ../juego.php");
//FIXME Descomentar el echo y varDump
// echo "<h1><b>VARDUMP DESPUES DE FUNCIONES</b></h1>";
// echo "<pre>";
//   var_dump($tabla->tablero);
// echo "</pre>";//Los pre ponen bonito el var_dump

//Al terminar de hacer estas funciones tendríamos que tener algo asi como

// object(Tabla) (2) {
//   ["tabla"]=>
//   object(SplFixedArray) (8) {
//     [0]=>
//     object(SplFixedArray) (8) {
//       [0]=>
//       object(Celda) (3) {
//         ["pregunta":"Celda":private]=>
//         //Objeto pregunta, con propiedades: Pregunta, Opciones, Respuesta Correcta
//         ["mina":"Celda":private]=>
//         NULL
//         ["indicacion":"Celda":private]=>
//         //numero de indicacion
//       }
//       [1]=>
//       object(Celda) (3) {
//         ["pregunta":"Celda":private]=>
//         NULL //No de debe llevar porque ya tiene una mina
//         ["mina":"Celda":private]=>
//         true //Osea que si tiene una mina
//         ["indicacion":"Celda":private]=>
//         NULL //No debe llevar porque es la mina
//       }
//     }
//   }
// }

// header("Location: ../juego.php"); //Lo manda al juego de verdad
?>