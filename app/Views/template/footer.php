    </div>
      

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

      // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
          document.documentElement.classList.add('dark')
        } else {
          document.documentElement.classList.remove('dark')
        }

        // Whenever the user explicitly chooses light mode
        localStorage.theme = 'light'

        // Whenever the user explicitly chooses dark mode
        localStorage.theme = 'dark'

        // Whenever the user explicitly chooses to respect the OS preference
        localStorage.removeItem('theme')
      </script>

  </body>
</html>
