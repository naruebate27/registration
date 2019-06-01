<?php
require_once '/../include/dbConnect.php';

class Model {
    public $con;
    public $col;
    public $col1;

    function __construct() {
        $db = new dbConnect();
        $this->con = $db->connect();
        $this->col = new MongoCollection($this->con, "student");
        $this->col1 = new MongoCollection($this->con, "course");
    }

    public function getAllStudent() {
        $cursor = $this->col->find();
        return $cursor;
    }
    public function getAllCourse() {
        $cursor = $this->col1->find();
        return $cursor;
    }

    /*public function findByName($name){
        $query = array("name"=>"$name");
        $cursor = $this->col->findOne($query);
        return $cursor;
    }

    public function search($name, $age){
        $query["name"] = array('$regex'=> new MongoRegex("/$name/"));
        if(!empty($age)){
            $query["age"] = (int)$age;
        }
        $cursor = $this->col->find($query);
        return $cursor;
    }

    public function insert($name , $age, $education , $address){
        $document = [
            "name" => $name,
            "age" => $age,
            "education" => $education,
            "address" => $address
        ];
        
    
        try {
            $cur = $this->col->insert($document);
            return $cur;
        }
        catch (MongoCursorException $e) {
            return false;
        }
    }

 */   
}    