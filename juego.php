<?php
spl_autoload_register(function ($nombre){
  require "includes/clases/{$nombre}.php";
});

session_start();

if (!isset($_SESSION['tabla'])) {
  header("Location: ./index.php?var=e");
}

// require "./includes/classes/Tabla.php";

$tabla = $_SESSION['tabla'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Opera-Minas | Juego</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="contenedor">
    <div class="header">
      <div><h1 class="resaltado"> <span>O</span>pera-<span>M</span>inas</h1></div>
    </div>
    <form action="includes/juego.inc.php" method="post">
    <table>
      <?php
        $tabla->mostrarTablero();
      ?>
    </table>
    <input type="checkbox" name="marcar" value="true" id="marcar">
    <label for="marcar">
      <img src="imgs/flag.png">
    </label>
    </form>
  </div>
  <div>
      Icons made by <a href="https://www.flaticon.com/authors/smashicons" title="Smashicons">Smashicons</a><br>
      from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a><br>
      is licensed by <a href="http://creativecommons.org/licenses/by/3.0/ "title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a>
    </div>
</body>
</html>