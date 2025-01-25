<?php


include './db.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $title = $_POST['title'];
    $image  = $_FILES['image'];
//     echo "<pre>";
//    print_r($image);
//    echo "</pre>";

// check if the image uploaded 
if(isset($image)&& $image['tmp_name']!==""){
$uploadDir = 'uploads/';
$filePath = $uploadDir .basename($image['name']);
// echo $filePath;
// upload the file 
if(move_uploaded_file($image['tmp_name'],$filePath)){
    //  insert the file path in db 
    $conn->query("INSERT INTO photos(title,image_path)VALUES('$title','$filePath')");
    header('Location:index.php');
    exit;
}
else{
    echo "file upload failed";
}
}
else{
  echo 'pleaes select a file';  
}
}