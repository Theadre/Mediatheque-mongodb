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
$filter = ["fields.titre_avec_lien_vers_le_catalogue" => array('$regex' => '^N')];
$query = new MongoDB\Driver\Query($filter);

$rows = $mng->executeQuery('groupe_f.documents', $query);

echo'<b>Les auteurs de tous les documents dont le titre commence par la lettre N</b><br/><br/>';


foreach ($rows as $row) {

echo "titre: ".$row->fields->titre_avec_lien_vers_le_catalogue." -- ";
if (empty($row->fields->auteur)) {echo "";} else { echo "auteur: ".$row->fields->auteur."<br>";}

 
}

?>
</body>
</html>

