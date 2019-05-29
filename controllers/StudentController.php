<?php
require_once '/../models/StudentModel.php';
class StudentController
{
   function index(){
         $db = new StudentModel();
         $cursor = $db->getAllStudent();
      
         $arrStudent = [];
         foreach( $cursor as $key => $value){         
               $studentData = [
                  "id" => $value["_id"],
                  "name" => $value["name"]
                ];
               array_push($arrStudent,$studentData);
            }

        response(200, $arrStudent);
   }

   function findByName($name){
      $db = new StudentModel();
      $cursor = $db->findByName($name);
      response(200, $cursor);
   }

   function search($request){
      $name = $request->post('name');
      $age = $request->post('age');
      $db = new StudentModel();
      $cursor = $db->search($name, $age);

      $arrStudent = [];
      foreach( $cursor as $key => $value){         
         $studentData = [
            "id" => $value["_id"]->{'$id'},
            "name" => $value["name"],
            "age" => $value["age"],
            "education" => $value["education"],
            "address" => $value["address"]
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

   function findById($id){
      $db = new StudentModel();
      $cursor = $db->findById($id);
      response(200, $cursor);
   }

   public function update($request){
      $id = $request->post('id');
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
      $result = $db->update($id, $name , $age, $education , $address);
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

   public function delete($id){
   
      
      $db = new StudentModel();
      $result = $db->delete($id);
      response(200, $result);
   }
   


}
