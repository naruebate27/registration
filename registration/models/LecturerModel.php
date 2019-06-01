<?php
require_once '/../include/dbConnect.php';

class CourseModel {
    private $con;
    private $col;

    function __construct() {
        $db = new dbConnect();
        $this->con = $db->connect();
        $this->col = new MongoCollection($this->con, "course");
    }

    public function getAllcourse() {
        $cursor = $this->col->find();
        return $cursor;
    }
}