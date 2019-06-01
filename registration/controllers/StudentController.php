<?php
require_once '/../models/StudentModel.php';
class StudentController
{
   function index(){
        $db = new StudentModel();
        $cursor = $db->getAllStudent();
        
        $arrStudent = array();
        foreach ($cursor as $key => $value) {
            $studentData = array(
               "id" => $value["_id"],
               "stu_id" => $value["stu_id"],
               "name" => $value["name"],
               "gender" => $value["gender"],
               "phone_number" => $value["phone_number"],
               "dob" => $value["dob"],
               "address" => $value["address"],
               "email" => $value["email"],
               "register" => $value["register"]
            );
            array_push($arrStudent,$studentData);
        }  
        response(200, $arrStudent);
   }

   // function findByName($name){
   //    $db = new StudentModel();
   //    $cursor = $db->findByName($name);
   //    response(200, $cursor);
   // }

//    function findById($Id){
//       $db = new StudentModel();
//       $cursor = $db->findById($Id);
//       response(200, $cursor);
//    }

//    function search($request){
//       $name = $request->post('name');
//       $age = $request->post('age');
//       $db = new StudentModel();
//       $cursor = $db->search($name, $age);

//       $arrStudent = array();
//       foreach ($cursor as $key => $value) {
//           $studentData = array(
//              "id" => $value['_id']->{'$id'},
//              "name" => $value["name"],
//              "age" => $value["age"],
//              "address" => $value["address"],
//              "education" => $value["education"]
//           );
//           array_push($arrStudent,$studentData);
//       }  
//       response(200, $arrStudent);
//    }

//    function insert($request){
//       $name = $request->post('name');
//       $age = $request->post('age');
//       $education[0] = $request->post('education0');
//       $education[1] = $request->post('education1');
//       $education[2] = $request->post('education2');
//       $address['hno'] = $request->post('hno');
//       $address['subdistrict'] = $request->post('subdistrict');
//       $address['district'] = $request->post('district');
//       $address['province'] = $request->post('province');

//       $db = new StudentModel();
//       $result = $db->insert($name, $age, $education, $address);
//       response(200, $result);
//    }

//    function update($request){
//       $id = $request->post('id');
//       $name = $request->post('name');
//       $age = $request->post('age');
//       $education[0] = $request->post('education0');
//       $education[1] = $request->post('education1');
//       $education[2] = $request->post('education2');
//       $address['hno'] = $request->post('hno');
//       $address['subdistrict'] = $request->post('subdistrict');
//       $address['district'] = $request->post('district');
//       $address['province'] = $request->post('province');

//       $db = new StudentModel();
//       $result = $db->update($id, $name, $age, $education, $address);
//       response(200, $result);
//    }

//    function delete($id){
//       $db = new StudentModel();
//       $result = $db->delete($id);
//       response(200, $result);
//    }
}