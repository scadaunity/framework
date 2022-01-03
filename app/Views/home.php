<h1 class="mt-10 ml-10 text-5xl text-bold">Home</h1>
<?php
  $props = [
    'title'=>'Excluir Arquivo.',
    'description'=>'Tem certeza com a exclusão',
    'confirmation'=>'Sim',
    'cancel'=>'Cancelar'
  ];
  component('alerts/Confirmation',$props)
?>
