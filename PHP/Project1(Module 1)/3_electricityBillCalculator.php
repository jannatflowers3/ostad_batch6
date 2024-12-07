<?php

// Simple Electricity Bill Calculator

// 1-100($5) , 101-200($10), 201 to above($15)

echo "Enter units you consumed : ";
$units = (int)readline();

if( $units <=100){
     $bill = $units *5;
}

elseif($units <=200){
    $bill  = 100 * 5 + ($units - 100)*10;
}

// elseif($units <=300){
//     $bill = 100 * 5 +100 * 10 + 100 * 15+($units-300);

// }


else{
    $bill = 100*5 + 100*10 + ($units-200)*15;
}
 echo "Total bills  $".$bill;

 