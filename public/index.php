<?php
  $config = require "../app/config/app.php";
  echo "<pre>";
  var_dump($config);

?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Styles -->
    <link rel="stylesheet" href="<?=$config['cssFile'] ?>">
    <title><?=$config['appTitle'] ?></title>
  <script defer src="app.js"></script><script defer src="app.js"></script></head>
  <body>
    <h1>Index.php</h1>
  </body>
</html>
