<?php 

namespace Core\Controller;
use Core\Database\DB;
use Exception;

class Items 
{
      protected $request_body;
      protected $db;
      protected $http_code = 404;
      protected $response_schema = array(
        "success"      => true, // to provide the reponse status.
        "message_code" =>""   , // to provide message code for the front-end developer for a better error handling.
        "body"         => []
      );

      public function __construct()
      {
        $this->db = new DB();
        $this->request_body = json_decode(file_get_contents("php://input"));
    
      }

      public function render()
      {
        header("Content-Type: application json");
        http_response_code($this->http_code); // set the HTTP code for the response
        echo json_encode($this->response_schema);
        }

      /**
       * Get all items
       */
      public function index()
      {  
        $items = array(); 
        try{          
          $result = $this->db->send_query("SELECT * FROM aitems");
          if(!$result){
            throw new \Exception("sql_response_error"); 
          }else{
          if($result->num_rows > 0){
              while($row = $result->fetch_object()){
                $items[] = $row;
              }
          }
          $this->response_schema['body'] = $items;
          $this->response_schema['message_code'] = "items collected successfully";
          }

        }catch(\Exception $error){
          $this->response_schema['success'] = false;
          $this->response_schema['message_code'] = $error->getMessage();
        }
      }
      
      /**
       * Get all items
       */
      public function single()
      {
     
      }

      /**
       * create an items
       */
      public function create()
      {

        try {
          if (!isset($this->request_body->name)){
            throw new \Exception("Error not found name");
          }else{
            $items = $this->request_body->name;
            $this->db->send_query("INSERT INTO items (name) VALUES ('$items')");
          }
          $this->response_schema['success'] = true;
          $this->response_schema['body'] = $items;
          
        } catch (\Exception $error) {
            $this->response_schema['success'] = false;
            $this->response_schema['message_code'] = $error->getMessage(); 
        }

        
              

     
        
      }

      /**
       * Updates an item
       */
      public function update()
      {
        try {
          if (!isset($this->request_body->id)){
            throw new \Exception("id not found");
          }
          $items = $this->get_item_by_id($this->request_body->id);

          if(empty($items)){
              throw new \Exception("item not found");
          }
          
            $completed_status =!(bool) $items->completed;
            $sql = $this->request_body->id;
            $this->db->send_query("UPDATE items SET completed='$completed_status' WHERE id='$sql'");
          }
         catch (\Exception $error) {
          $this->response_schema['message_code']  =$error->getMessage();
          $this->response_schema['success']  = false;
        }
        


      }

      /**
       * Delete an item
       */
      public function delete()
      { 
        if (!isset($this->request_body->id))
        $result = $this->db->send_query("DELETE FROM items WHERE id={$this->request_body->id}");
      }
      
      public function get_item_by_id($id)
      {
        $result = $this->db->send_query("SELECT * FROM items WHERE id='$id'");
        return $result->fetch_object();
      }

}     

// php://input : like file in php store everything in body in request 