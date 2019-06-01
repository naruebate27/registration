<?php
require_once '/../include/dbConnect.php';

class CourseModel {
    private $con;
    private $col;

    function __construct() {
        $db = new dbConnect();
        $this->con = $db->connect();
        $this->col = new MongoCollection($this->con, 'course');
    }
    public function getAllcourse() {
        $cursor = $this->col->find();
        return $cursor;
    }
// public function findByName($name){  //findOne
//     $query = array("name"=>$name);
//     $cursor = $this->col->findOne($query);
//     return $cursor;
// }

//     public function findById($id){  //findOne
//         $query =  array("_id" => new MongoId($id));
//         $cursor = $this->col->findOne($query);
//         return $cursor;
//     }

//     public function search($name, $age){
//         $query["name"] = array('$regex'=>new MongoRegex("/$name/"));
//         if(!empty($age)){
//             $query["age"] = (int)$age;
//         }
//         $cursor = $this->col->find($query);
//         return $cursor;
//     }

//     public function insert($name, $age, $education, $address){
//         $document = [
//             "name" => $name,
//             "age" => $age,
//             "education" => $education,
//             "address" => $address
//         ];

//         try {
//             $cur = $this->col->insert($document);
//             return $cur;
//         }
//         catch (MongoCursorException $e) {
//             return false;
//         }
//     }

//     public function update($id, $name, $age, $education, $address){
//         $document = [
//             "name" => $name,
//             "age" => $age,
//             "education" => $education,
//             "address" => $address
//         ];

//         $newdata = array('$set' => $document);
//         $query = array("_id" => new MongoId($id)); //เงื่อนไข
        
//         try {
//             $cur = $this->col->update($query, $newdata);
//             return $cur;
//         }
//         catch (MongoCursorException $e) {
//             return false;
//         }
//     }

//     public function delete($id){
//         $query = array("_id" => new MongoId($id) ); //เงื่อนไข

//         try {
//             $cur = $this->col->remove($query);
//             return $cur;
//         }
//         catch (MongoCursorException $e) {
//             return false;
//         }
//     }

}