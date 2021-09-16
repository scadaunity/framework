<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <br>
    <ul>
      <h2>Lista de Usuarios</h2>
      <?php foreach ($users as $user => $field): ?>
        <li>Id: <?= $field->id ?></li>
        <li>Nome: <?= $field->name ?></li>
        <hr>
      <?php endforeach ?>

  </body>
</html>
