<?php
require_once '/../models/Model.php';
class StudentController
{
   function student(){
         $db = new Model();
         $cursorSTD = $db->getAllStudent();
         $cursorCourse = 

         $arrStudent = [];
         foreach( $cursorSTD as $key => $value){         
               $studentData = [
                  "id" => $value["_id"],
                  "STDid" => $value["stuid"],
                  "name" => $value["name"],
                  "gender" => $value["gender"]
                ];
               array_push($arrStudent,$studentData);
            }

        response(200, $arrStudent);

        
   }
   function course(){
      $db = new Model();
      $cursorCourse = $db->getAllCourse();

      $arrCourse = [];
      foreach( $cursorCourse as $key => $value){         
            $CourseData = [
              "id" => $value["_id"],
              "Course" => $value["subject_id"],
              "name" => $value["name"],
            ];
            array_push($arrCourse,$CourseData);
        }

    response(200, $arrCourse);

    
  }

   /*function findByName($name){
      $db = new StudentModel();
      $cursorSTD = $db->findByName($name);
      response(200, $cursorSTD);
   }

   function search($request){
      $name = $request->post('name');
      $age = $request->post('age');
      $db = new StudentModel();
      $cursorSTD = $db->search($name, $age);

      $arrStudent = [];
      foreach( $cursorSTD as $key => $value){         
         $studentData = [
            "id" => $value["_id"],
            "name" => $value["name"],
            "age" => $value["age"]
          ];
         array_push($arrStudent,$studentData);
      }
      response(200, $arrStudent);
   }

   public function insert($request){
      $name = $request->post('name');
      $age = $request->post('age');
      $education[0] = $request->post('education0');
      $education[1] = $request->post('education1');
      $education[2] = $request->post('education2');
      $address['hno'] = $request->post('hno'); 
      $address['subdistrict'] = $request->post('subdistrict');
      $address['district'] = $request->post('district');
      $address['province'] = $request->post('province');
      
      $db = new StudentModel();
      $result = $db->insert($name , $age, $education , $address);
      // $arrStudent = array();
      // if($result) {
      //     $res["error"] = FALSE;
      //     $res["message"] = "Success to insert a new friend";
      // } else {
      //     $res["error"] = TRUE;
      //     $res["message"] = "Failed to add a new friend";
      // }
      response(200, $result);
  }

*/
}
