<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<html>
  <head>
    <title>Exercice 2</title>
    
  </head>
  <body> 
<?php
if (isset($_SESSION['login']))
{
		print "<script>window.location='index.php';</script>";
}

$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");

$query = new MongoDB\Driver\Query([]);

$rows = $mng->executeQuery("groupe_f.documents", $query);

echo "<form action='' method='post'>";

echo'<b><h1>Les titres des documents</h1></b><br/><br/>';

echo "<table class='table'>";
echo "<thead class='thead-dark'>";
echo "<th scope='col'>Titre</th>";
echo "<th scope='col'>Auteur</th>";
echo "<th scope='col'>Type</th>";
echo "<th scope='col'>Action</th>";
echo "</thead>";

foreach ($rows as $row) {
	
	echo "<tr><td>".$row->fields->titre_avec_lien_vers_le_catalogue."</td>";
  if (empty($row->fields->auteur)) { echo "<td></td>"; } else { echo "<td>".$row->fields->auteur. "</td>";}
	if (empty($row->fields->type_de_document)) { echo "<td></td>"; } else { echo "<td>".$row->fields->type_de_document ."</td>";}
  echo "<td><input type='submit' name='b1' id='b1' value='emprunter'></td></tr>";
}

echo "</table>";

echo'<b><h1>Vos emprunts</h1></b><br/><br/>';
echo "<table class='table'>";
echo "<thead class='thead-dark'>";
echo "<th scope='col'>Titre</th>";
echo "<th scope='col'>Auteur</th>";
echo "<th scope='col'>Type</th>";
echo "<th scope='col'>Action</th>";
echo "<th scope='col'></th>";
echo "</thead>";

echo "</table>";
echo "</form>";

if( isset($_POST['b1']) ){

}
if( isset($_POST['b2']) ){
}

?>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
  </html>