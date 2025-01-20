<?php


namespace Api\TaskApi;
class Router{
    private $task;


    public function __construct($task)  {
        $this->task= $task;

    }

    // checking request type 
    public function handleRequest(){
        $method = $_SERVER['REQUEST_METHOD'];
        $path = isset($_GET['id']) ? intval($_GET['id']):null;
        switch($method){
            case "GET":
                $this->handleGetRequest($path);
                break;
              case "POST":
              $this->handlePostRequest();
              break;
             case "PUT":
             $this->handlePutRequest($path);
             break;
            case "DELETE" :
             $this->handleDeleteRequest($path);
            break;

             default:
                    http_response_code(405);
                   echo json_encode((['error'=>"Method not allowed"]));
                


        }
    }
// Handle get request 
    private function handleGetRequest($id){
        if($id){
          $task = $this->task->getTask($id);

            if($task){
                echo json_encode($task);
            }
            else{
                http_response_code(404);
                echo json_encode(['error'=>" get task not found"]);
            }

        }
        else{
            // fetch all task 
            $task = $this->task->getAllTasks();
            if(empty($tasks)){
                http_response_code(404);
                echo json_encode(['error'=>"No Tasks found"]);
            }
            else{
                echo  json_encode($task);
            }
            
        }
    }


    // handle post request 

    private function handlePostRequest(){
        $data = json_decode(file_get_contents("php://input"),true);
        // validated type 

        if(!isset($data['title'])|| trim($data['title']) ===""){
            http_response_code(400);
            echo json_encode((['error'=>"Title is required"]));
            return;
        }
        $validPriorities = ["low","medium","high"];
        if(isset($data['priority'])&& !in_array($data['priority'],$validPriorities)){
            http_response_code(400);
            echo json_encode((['error'=>"invalid priority . Valid priorityies are:low,medium,high."]));

            return; 
        }

        // Create Task 
        $response = $this->task->createTask($data);
        echo json_encode($response);
    }



        // handle put request 

        private function handlePutRequest($id){
        if(!$id){
            echo json_encode((['error'=>"Task Id is required"]));
            return;
        }
        else{
            $data = json_decode(file_get_contents("php://input"),true);
            echo json_encode($this->task->updateTask($id,$data));

        }
        }





 // handle Delete request 

 private function handleDeleteRequest($id){
    if(!$id){
        echo json_encode((['error'=>"Task Id is required"]));
        http_response_code(400);
        return;
    }
    echo json_encode($this->task->deleteTask($id));
            
 }



}