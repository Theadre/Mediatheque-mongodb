<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'autoloader.php';
Autoloader::register();
?>


<!DOCTYPE html>
<html>
<head>
<title>Page d'accueil</title>
</head>
<body>
<h2><p>menu :</p><h2>
<p>Tous les titres</p>
<p>Les titres des documents ayant les rangs 1 à 10</p>
<p>Les auteurs de tous les documents dont le titre commence par la lettre N</p>
<p>Toutes les informations vers les documents n'ayant pas de champ "type_de_document"</p>
<p>Les différents types de document qui apparaissent dans cette base</p>

</body>
</html>


<?php
?>