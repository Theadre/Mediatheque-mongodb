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

<b>Les auteurs de tous les documents dont le titre commence par la lettre N</b><br/><br/>
<?php
require 'Collection.php';

$filter = ["fields.auteur" => array('$regex' => '^N')];
$options = [
    'projection' => [
        '_id' => 0,
        'fields.auteur' => true,
    ],
];

$index = 0;

$collection = new Collection('documents');

$rows = $collection->find($filter, $options);

foreach ($rows as $r) {
    $index++;
    echo isset($r->fields->auteur) ? "Auteur-{$index} : {$r->fields->auteur}<br>"  : "Auteur-{$index} : pas d'auteur<br>" ;
}
