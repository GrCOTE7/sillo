<?php
// Désactiver l'affichage des erreurs pour la production
// ini_set('display_errors', 0);
// ini_set('log_errors', 1);
error_reporting(E_ALL);

// Chemin vers le dossier du projet
$projectPath = 'C:\\laragon\\www\\sillo\\public\\z\\codeium';

// Commande à exécuter
$command = 'cd /d ' . $projectPath . ' && npm run dev';
$output = fr_shell_exec('echo shell_exec est activé 2');

// Exécution de la commande
// $output = shell_exec($command . ' 2>&1');

// Affichage du résultat
echo "<pre>$output</pre>";

// Vous pouvez également enregistrer la sortie dans un fichier log
file_put_contents('npm_run_dev.log', $output, FILE_APPEND);
