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

$collection = $client->groupe_f->fields;

$options = [
    'allowDiskUse' => TRUE
];

$pipeline = [
    [
        '$group' => [
            '_id' => [
                'fields᎐type_de_document' => '$fields.type_de_document'
            ]
        ]
    ],
    [
        '$project' => [
            'fields.type_de_document' => '$_id.fields᎐type_de_document',
            '_id' => 0
        ]
    ]
];

$cursor = $collection->aggregate($pipeline, $options);


$query = new MongoDB\Driver\Query($cursor);

$rows = $mng->executeQuery('groupe_f.documents', $query);

echo'<b>Toutes les informations vers les documents n\'ayant pas de champ type_de_document</b><br/><br/>';


foreach ($rows as $row) {

echo $row->fields->nombre_de_reservations . " -- ";
echo $row->fields->rang . " -- ";
echo $row->fields->titre_avec_lien_vers_le_catalogue . " (";
if (empty($row->fields->auteur)) {echo ") -- ";} else { echo $row->fields->auteur.") <br> ";}

 
}

?>
</body>
</html>

