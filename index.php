<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Opera-Minas</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="contenedor">
    <h1 class="resaltado"> <span>O</span>pera-<span>M</span>inas</h1>
    <form action="./includes/index.inc.php" method="POST">
      <div class="grid3">
        <button type="submit" name="dificultad" value="8">8x8</button>
        <button type="submit" name="dificultad" value="10">10x10</button>
        <button type="submit" name="dificultad" value="12">12x12</button>
      </div>
    </form>
  </div>
</body>
</html>