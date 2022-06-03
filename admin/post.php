<?php
$file = "";
$password   = "";
$err= array(); 
$congra="";

$conn= mysqli_connect("localhost","root","","db");

if(isset($_POST['upload'])){
  $file =$_FILES['image']['name'];
  $user_check_query = "SELECT * FROM upload WHERE image='$file' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['image'] === $file) {
      array_push($err, "image name already exist!");
     
    }

   }
   // Finally, register user if there are no errors in the form
if (count($err) == 0) {
    $query = "INSERT INTO upload ( image) 
          VALUES('$file')";
    mysqli_query($conn, $query);
      //echo "You are successfully registerd! login please!";
      $congra="You are successfully";
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styhoooolepost.css">
</head>
<body>
    <div class="row">

<div class="box">
    <h1>post Here</h1>
    <div class="err">
      <?php echo $congra; ?>
    </div>
    <form action="post.php" method="post" enctype="multipart/form-data">
      <input type="file" name="image" id="" placeholder="Enter image here" class="form-control">
      
      <input type="submit" name="upload" value="upload" class="btn">
    </form>
  </div>
  <h3>display image </h3>
  <?php
  $rel="select * from upload";
  $que=mysqli_query($conn,$rel);
  $output="";
  if(mysqli_num_rows($que)<1){
     $output .="<h3>no image uploaded</h3>";

  }
  while($row=mysqli_fetch_array($que)){
      $output="<image src='".$row['image']."'fstyle='width:400px;height:400px;'>";
  }
  ?>
  </div>
</body>
</html>