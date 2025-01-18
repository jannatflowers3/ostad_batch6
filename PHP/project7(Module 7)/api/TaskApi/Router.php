<?php


namespace Api\TaskApi;
class Router{
    private $task;


    public function __construct($task)  {
        $this->task= $task;

    }

    public function handleGetRequest($id){
        if($id){
            $task = $this->task->getAllTasks($id);
            if($task){
                echo json_encode($task);
            }
            else{
                http_response_code(404);
                echo json_encode(['error'=>"Task not found"]);
            }

        }
        else{
            $task = $this->task->getAllTasks();
            if(empty($tasks)){
                http_response_code();
            }
            
        }
    }


    // handle post request 

    private function handlePostRequest(){
        $data = json_decode(file_get_contents("php://input"),true);
        // validated type 

        if(!isset($data['title'])|| trim($data['title']) ===""){
            http_response_code(404);
            echo json_encode((['error'=>"Title is required"]));
            return;
        }
        $validPriorities = ["low","medium","high"];
        if(isset($data['priority'])&& !in_array($data['priority'],$validPriorities)){
            http_response_code(400);
            echo json_encode((['error'=>"invalid priority"]));
            return;
            
        
        }


    }



        // handle put request 

        private function handlePutRequest($id){
            $mehod
        }





 // handle put request 

 private function handleDeleteRequest($id){
    $method  = $_
            
 }



}