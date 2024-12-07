<?php

// Basic Authentication System 

define("USERNAME","Admin");
define("PASSWORD","12345");
// Enter username 
echo "Enter your username : ";
$inputUsername = readline();
// Enter password 
echo "Enter your password : ";
$inputPassword = readline();

if($inputUsername === USERNAME && $inputPassword === PASSWORD){
    echo "Login Successful!";
}

// Indivisual check username and passwrod 

// elseif($inputUsername !==USERNAME && $inputPassword !== PASSWORD){
//     echo " Invalid Username and Userpassword";
// }
// elseif($inputUsername !== USERNAME){
//     echo "Invalid Username";
// }
// elseif($inputPassword !== PASSWORD){
//     echo "Invalid Password";
// }


else{
    echo "Invalid username or password";
}