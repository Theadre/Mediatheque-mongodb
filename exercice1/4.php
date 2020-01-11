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

<b>Toutes les informations vers les documents n\'ayant pas de champ type_de_document</b><br/><br/>
<?php
require 'Collection.php';

$filter = ["fields.type_de_document" => array('$exists' => false)]; // { $nin: [ "appliances", "school" ] }
$options = [ ];

$index = 0;

$collection = new Collection('documents');

$rows = $collection->find($filter);

foreach ($rows as $r) {
    $index++;


    echo "info-{$index} : {$r->fields->titre_avec_lien_vers_le_catalogue} ";
    if (!isset($r->fields->type_de_document)) {
        echo " pas de doocument <br>";
    }
}
