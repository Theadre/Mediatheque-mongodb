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

<b>Les titres des documents</b><br/><br/>
<?php
require('Collection.php');

$filter = [];
$options = [
    'projection' => [
        '_id' => 0,
        'fields.titre_avec_lien_vers_le_catalogue' => true,
    ],
];

$index = 0;

$collection = new Collection('documents');
$rows = $collection->find($filter, $options);

foreach ($rows as $r) {
    $index++;
    echo "titre-{$index} : {$r->fields->titre_avec_lien_vers_le_catalogue} <br>";
}
