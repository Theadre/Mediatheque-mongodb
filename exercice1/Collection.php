<?php

class Collection {
    // proprietes
    private $databaseName = "groupe_f";
	private $collectionName;
	private $mongo;
    
    // constructeur
    public function __construct($collectionName) {
        $this->mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $this->collectionName = "{$this->databaseName}.{$collectionName}";
    }

    // methode
    public function find( $filter = [],  $options = []) {

        $query = new MongoDB\Driver\Query($filter, $options);
      
        return $this->mongo->executeQuery($this->collectionName, $query);
    }
}