<div class="container-fluid p-5">
  <br>
  <h2>Lista de Usuarios</h2>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user): ?>
        <tr>
          <th scope="row"><?= $user->id ?></th>
          <td><?= $user->name ?></td>
          <td><?= $user->email ?></td>
          <td>
            <div class="containr-fluid">
              <a href="#">a</a>
              <a href="#">b</a>
            </div>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
    <ul>
      <h2>Lista de Usuarios</h2>
      <?php foreach ($users as $user => $field): ?>
        <li>Id: <?= $field->id ?></li>
        <li>Nome: <?= $field->name ?></li>
        <hr>
      <?php endforeach ?>
