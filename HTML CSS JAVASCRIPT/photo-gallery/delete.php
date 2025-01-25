<?php


include './db.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $id = intval($_POST['id']);
    // getting by image from db by id 
    $result = $conn->query("SELECT image_path FROM photos WHERE id = $id");
    // check if a photo found 
    if($result->num_rows>0){
        // fetch the image array 
        $row = $result->fetch_assoc();

        // delete from the folder 
        unlink($row['image_path']);
    }
    // delete from the db 

    $conn->query("DELETE FROM photos WHERE id = $id");

    // redirect to the index .php 
    header('Location:index.php');
    exit;
}

?>