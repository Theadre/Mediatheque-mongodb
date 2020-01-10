<?php

class DataBaseService
{


    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");


	public function getDocument()
    {
        $document = [];

        $filter = array('level' => 1);
		$query = new MongoDB\Driver\Query($filter);
		
		$results = $query->fetchAll(PDO::FETCH_ASSOC);
		
        if (!empty($results)) {
            $users = $results;
        }
        
        return $users;
    }

}
?>