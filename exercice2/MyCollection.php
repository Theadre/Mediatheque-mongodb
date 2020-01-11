<?php

class MyCollection
{
    // proprietes
	private $databaseName = 'groupe_f';
	private $collectionName;
	private $manager;
    
    // constructeur
    public function __construct($collectionName) {
        $this->manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

        $this->collectionName = "{$this->databaseName}.{$collectionName}";
    }

    // methode
    public function query( $filter = [],  $options = ['limit' => 5]): array {

        $query = new MongoDB\Driver\Query($filter, $options);
      
        $cursor = $this->manager->executeQuery($this->collectionName, $query);

        return $cursor->toArray();
    }

     // insert
     public function insert(array $obj): int {
         
        $bulk = new MongoDB\Driver\BulkWrite;

        $bulk->insert($obj);

        $result = $this->manager->executeBulkWrite($this->collectionName, $bulk);

        return $result->getInsertedCount();
    }

    // insert
    public function update($obj): int {
         
        $bulk = new MongoDB\Driver\BulkWrite;

        $bulk->update(array('_id' => $obj->_id),
            array('$set' => array('idBorrower' => $obj->idBorrower),
            ));

        $result = $this->manager->executeBulkWrite($this->collectionName, $bulk);

        return $result->getModifiedCount();
    }
}
