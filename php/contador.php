<?php
    //lee un archivo en una cadena.
  $num = file_get_contents("../files/contador.php");
  $num = $num + 1;
  //escribe una cadena en un archivo
  file_put_contents("../files/contador.php", $num);
?>