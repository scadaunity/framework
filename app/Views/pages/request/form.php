<form action="<?php route('/request/save') ?>" method="POST">
    
    <?php csrf()?>
    <input type="text" name="name">
    <input type="submit" value="Enviar">
</form>