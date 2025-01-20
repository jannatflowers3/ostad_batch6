<?php
namespace Api\TaskApi;


class Task{
private $conn;
    public function __construct($dbConnection){
        $this->conn = $dbConnection;

    }

    public function getAllTasks() {
        $result = $this->conn->query("SELECT * FROM tasks");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    // GET Single Task
    public function getTask($id){
        $id = intval($id);
        $query = "SELECT *FROM tasks WHERE ID = $id";
        $result  = $this->conn->query($query);
        return $result->fetch_assoc();
    }


    // Create a new Task 
    public function createTask($data){
        $title = $data['title'];
        $description = $data['description']??"";

        $priority = $data['priority']??"low";
        $query = "INSERT INTO tasks(title,description,priority)VALUES('$title','$description','$priority')";


        if($this->conn->query($query)){
            return ["message"=>"Task created successfully"];
        }
        else{
            return ["error"=>"failet to  created a task."];
        }
      

    }


        // update a task 

        public function updateTask($id,$data){
            $id = intval($id);
            $result= $this->conn->query("SELECT* FROM tasks WHERE id = $id");
            if($result->num_rows ===0){
                http_response_code(400);
                return['error'=>"Task not found."];

            }

            $existingTask = $result->fetch_assoc();


            // updating task 

            $title =isset($data['title']) ? $data['title']:$existingTask['title'];
            $description =isset($data['description'])?$data['description']:$existingTask['description'];
            $priority =isset($data['priority'])?$data['priority']:$existingTask['priority'];
            $is_completed =isset($data['is_completed'])?$data['is_completed']:$existingTask['is_completed'];

            $query = "UPDATE tasks SET title = '$title',
                    description = '$description',
                    priority = '$priority',
                    is_completed = '$is_completed' 
                    WHERE id = $id";

            if($this->conn->query($query)){
                return ["message"=>"Task update successfully"];
        }
      
            return ["error"=>"failet to  created a task."];

 }
        


        // delete task 
        public function deleteTask($id){
            $id = intval($id);
            $query = "DELETE FROM tasks WHERE id = $id";
            if($this->conn->query($query)){
                return ["message"=>"Task delete successfully"];
            }
            else{
                return ["error"=>"failet to  delete  task."];
            }
            
        }





    }



 

