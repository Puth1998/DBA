<?php 
require_once '/../include/dbConnect.php';

class tableModel {
    private $con;
    private $col;

    function __construct() {
        $db = new dbConnect();
        $this->con = $db->connect();
        $this->col = new MongoCollection($this->con, "table");
    }

    public function getAlltable() {
        $cursor = $this->col->find();
        return $cursor;
    }

    
}