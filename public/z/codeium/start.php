<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lancer npm run dev</title>
</head>

<body>
  <div class='x-auto w-full text-center pr-3'>
    <small>
      <a href="#" id="executeScript">Lancer npm run dev</a>
    </small>
  </div>

  <div id="output"></div>

  <?php
header('Content-Type: text/html; charset=utf-8');
  if (function_exists('shell_exec')) {
    function fr_shell_exec($str){
      return shell_exec($str .'| iconv -f CP850 -t UTF-8');
    }
  	$output = fr_shell_exec('echo shell_exec est activé');
  	echo "<pre>{$output}</pre>";
  } else {
  	echo "shell_exec n'est pas disponible";
  }
  ?>

  <script>
  document.getElementById('executeScript').addEventListener('click', function(e) {
    e.preventDefault();
    fetch('run_dev.php')
      .then(response => response.text())
      .then(data => {
        document.getElementById('output').innerHTML = data;
      })
      .catch(error => console.error('Erreur:', error));
  });
  </script>
</body>

</html>
