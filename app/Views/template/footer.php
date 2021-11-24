
      <!-- Bootstrap -->
      <?php js([
          'popper.min',
          'bootstrap.min',
          'axios.min',
          'app'
        ]);
      ?>
      <script src="js.php" charset="utf-8"></script>

      <script>
      console.log(
        '%c app ' +
        '%cLEVEL ' +
        '%ctext',
        'font-weight: bold;',
        'color:white;background-color:GREEN;font-weight: bold; border-radius: 5px; padding: 2px 2px 2px 8px',
        'font-weight: bold;padding-left:5px;',
      );

      console.group('<?php echo APP_TITLE ?>');
          console.group('routes');
            console.log('\home')
          console.groupEnd('routes');
      console.groupEnd('<?php echo APP_TITLE ?>');
      

      </script>

  </body>
</html>
