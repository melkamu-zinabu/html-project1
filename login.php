<?php
$fname = "";
$password   = "";
$err ="";
$conn= mysqli_connect("localhost","root","","db");

if(isset($_POST['LOGIN'])){
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  
$sql="SELECT * FROM users WHERE firstname='".$fname."' AND password='".$password."' limit 1";

$result = mysqli_query($conn,$sql);
if (empty($fname)) {
  $err= "Username is required";
}
else if (empty($password)) {
  $err="Password is required";
}
else if(mysqli_num_rows($result)==1){
  header('location: home.php ');	
}else{
  $err="Invalid entry";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Login System</title>
  <link rel="stylesheet" href="css/login_style.css">
</head>
<body>
  <div class="box">
    <h1>Login Here</h1>
    <div class="err">
      <?php echo $err; ?>
    </div>
    <form action="login.php" method="post" >
      <input type="text" name="fname" id="" placeholder="Enter username">
      <input type="password" name="password" id="" placeholder="Enter Password">
      <input type="submit" name="LOGIN" value="LOGIN">
      Not yet a memeber?<a href="signup.php" style=" color: #ffc107;">SIGNUP</a>
    </form>
  </div>
</body>
</html>