<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$filter = array('fields.rang' => ['$gte' => 1, '$lte' => 10] );
$query = new MongoDB\Driver\Query($filter);

$rows = $mng->executeQuery('groupe_f.documents', $query);

echo'Les titres des documents ayant les rangs 1 à 10:<br/>';


foreach ($rows as $row) {

    echo $row->fields->titre_avec_lien_vers_le_catalogue . " (";
    if (empty($row->fields->auteur)) {echo ") -- ";} else { echo $row->fields->auteur.") -- ";}
	if (empty($row->fields->type_de_document)) {echo "<br>";} else { echo $row->fields->type_de_document ."<br>";}
 
}

?>
</body>
</html>

