<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1><?= $title ?></h1>
    <br>
    <ul>
      <?php foreach ($users as $user): ?>
        <li><?= $user ?></li>
      <?php endforeach ?>

  </body>
</html>
