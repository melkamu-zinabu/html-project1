<?php
$fname = "";
$password   = "";
$err ="";
$conn= mysqli_connect("localhost","root","","db");

if(isset($_POST['LOGIN'])){
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $sql="SELECT * FROM admin WHERE fristname='".$fname."' AND password='".$password."' limit 1";

  $result = mysqli_query($conn,$sql);
  if (empty($fname)) {
    $err= "Username is required";
  }
  else if (empty($password)) {
    $err="Password is required";
  }
  else if(mysqli_num_rows($result)==1){
    header('location: adminhome.php ');	
  }else{
    $err="Invalid entry";
  }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title> Admin Login </title>
  <link rel="stylesheet" href="adminloginstyle.css">
</head>
<body>
  <div class="box">
    <h1>admin Login Here</h1>
    <div class="err">
      <?php echo $err; ?>
    </div>
    <form action="adminlogin.php" method="post" >
      <input type="text" name="fname" id="" placeholder="Enter username">
      <input type="password" name="password" id="" placeholder="Enter Password">
      <input type="submit" name="LOGIN" value="LOGIN">
     
    </form>
  </div>
</body>
</html>