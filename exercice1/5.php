<style>
        a {
            padding: 15px;
            margin: 0 15px 10px;
            background: green;
            display: flex;
            flex-direction: column;
            color: white;
        }
    </style>
<a href="index.php">Retour au page d'accueil</a>

<b>Les différents types de document qui apparaissent dans cette base</b><br/><br/>
<?php

$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");

$cmd = new MongoDB\Driver\Command([
    'distinct' => 'documents', // specify the collection name
    'key' => 'fields.type_de_document', // specify the field for which we want to get the distinct values
]);

$cursor = $mng->executeCommand('groupe_f', $cmd); // retrieve the results

$rows = current($cursor->toArray())->values; // get the distinct values as an array

$index = 0;

foreach ($rows as $r) {
    $index ++;
    echo "type-{$index} : {$r}<br>";
}