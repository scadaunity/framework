<?php
  $config = require "../app/config/app.php";
  echo "<pre>";
  var_dump($config);

?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?=$config['appTitle'] ?></title>
  </head>
  <body>
    <h1>Index.php</h1>
  </body>
</html>
