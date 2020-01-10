<?php

class DocumentService
{

    public function getDocuments()
    {
        $documents = [];
   
        $dataBaseService = new DataBaseService();
        $documents = $dataBaseService->getDocuments();

        return $documents;
    }

}
?>