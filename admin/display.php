<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="post.php">post image</a>
<?php
$conn= mysqli_connect("localhost","root","","db");
$sql="select * from upload";
$result=mysqli_query($conn,$sql);
   while($rows=mysqli_fetch_assoc($result)) {
    echo'<img height="300" width="300" src="'.$rows['image'].'">';
       echo "<a href=''>update</a>";
       echo "<a href=''>update</a>";
   }
    

?>
</body>
</html>
