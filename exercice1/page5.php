<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php

echo'<b>Les différents types de document qui apparaissent dans cette base</b><br/><br/>';


$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");

$qwery = new MongoDB\Driver\Command([
    'distinct' => 'documents', 
    'key' => 'fields.type_de_document', 
]);

$cursor = $mng->executeCommand('groupe_f', $qwery); 

$rows = current($cursor->toArray())->values; 

$index = 0;

foreach ($rows as $row) {
    $index ++;
    echo "type-{$index} : {$row}<br>";
}
?>
</body>
</html>
