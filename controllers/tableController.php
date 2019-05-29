<?php
require_once '/../models/tableModel.php';
class tableController
{
   function index(){
         $db = new tableModel();
         $cursor = $db->getAlltable();
      
         $arrRest = [];
         foreach( $cursor as $key => $value){         
            $restData = [
               "id" => $value["_id"],
               "number" => $value["number"],
               "type" => $value["type"]
             ];
            array_push($arrRest,$restData);
         }

        response(200, $arrRest);
   }
} 