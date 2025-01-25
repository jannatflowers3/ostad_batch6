<?php
include './db.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <?php  include './css.php'?>

  
    <title>Document</title>
</head>
<body>
    
   <div class="container">
    <!-- photo uploading section  -->
    <h1>photo gallery</h1>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Photo title" required>
        <input type="file" name="image" accept="image/*" required>
        <button type="submit"> Upload</button>
    </form>
    <hr>
<!-- photo gallery section start  -->
<div>
    <!-- photo details  -->
     <?php 
     $result = $conn->query("SELECT * FROM photos ORDER BY create_at DESC");
     
     if($result->num_rows>0):
        while($row=$result->fetch_assoc()):
     ?>

    <div>
    <h2><?php echo $row['title'];?></h2>
        <img src="<?= $row['image_path'] ?>" width="200px" alt="photo image">
       
        <form action="delete.php" method="POST">
            <input type="hidden" name="id" 
            value="<?= $row['id'] ?>">
            <button type="submit">Delete</button>
        </form>
    </div>
    <?php endwhile; 
    else:
        echo "No photos uploaded yet.";
    
endif;
    ?>
</div>
<!-- photo gallery section end  -->
   </div>
</body>
</html>