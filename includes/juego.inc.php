<?php

//Esta funcion invoca automáticamente todas las clases que creemos
spl_autoload_register(function ($nombre){
  require "./clases/{$nombre}.php";
});
session_start();

if (!isset($_POST['celda'])) {
  header("Location: ../juego.php?var=e");
}

echo "<pre>";
var_dump($_POST);
echo "</pre>";

$tabla = $_SESSION['tabla'];
$indices = $tabla->parsear($_POST['celda']);

$celda = $tabla->obtenerCelda($indices);

if (isset($_POST['marcar'])) {
  $celda->marcarCelda();
} else if ($celda->tieneMina()) {
  header("Location: ../perdiste.php");
  exit();
} else if ($celda->tienePregunta()) {
  $_SESSION['pregunta'] = $celda->obtenerPregunta();
} else {
  $celda->mostrarCelda();
}

$tabla->actualizarCelda($indices, $celda);

$_SESSION['tabla'] = $tabla;
header("Location: ../juego.php");

?>