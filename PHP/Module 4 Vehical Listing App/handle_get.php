<?php



if(isset($_GET['name']) && isset($_GET['age'])){
 $name = $_GET['name'];
 $age = $_GET['age'];

 echo "<h1>Get method result</h1>";
 echo "Name : $name";
 echo "age : $age";

}
else{
    echo "<p>Invalid request ! please submit the form properly </p>";

}

