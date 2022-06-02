<?php
$fname = "";
$fname = "";
$email = "";
$sex = "";
$pass1   = "";
$pass2   = "";
$err= array(); 
$congra="";

$conn= mysqli_connect("localhost","root","","db");

if(isset($_POST['SIGNUP'])){
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $lname = mysqli_real_escape_string($conn, $_POST['lname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $sex = mysqli_real_escape_string($conn, $_POST['sex']);
  $pass1= mysqli_real_escape_string($conn, $_POST['pass1']);
  $pass2 = mysqli_real_escape_string($conn, $_POST['pass2']);

  //validation
  if ($pass1 != $pass2) {
    
    array_push($err, "The two passwords do not match");
    }
  
    $user_check_query = "SELECT * FROM users WHERE firstname='$fname' OR email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
      if ($user['firstname'] === $fname) {
        array_push($err, "user name already exist!");
       
      }
  
     else if ($user['email'] === $email) {
       array_push($err, "Email already exist!");
      
      }}

    
  
     // Finally, register user if there are no errors in the form
  if (count($err) == 0) {
      $query = "INSERT INTO users ( firstname, lastname, sex, email, password) 
            VALUES('$fname', '$lname', '$sex','$email',  '$pass1')";
      mysqli_query($conn, $query);
        //echo "You are successfully registerd! login please!";
        $congra="You are successfully registerd! login please!";
}}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Sign up system</title>
  <link rel="stylesheet" href="css/signup_style.css">
</head>
<body>
  <div class="box2">
    <h1>SIGN UP Here</h1>
    <div class="err">
    <?php include('err.php'); 
    ?>
    </div>
    <?php
    echo $congra;
    ?>
    <form action="signup.php" method="post" >
      <input type="text" name="fname" id="" placeholder="Enter First name"required >
      <input type="text" name="lname" id="" placeholder="Enter Last name"required>
      <input type="email" name="email" id="" placeholder="Enter Email"required>
      <label>Sex</label>
      <input type="radio" name="sex" id="" value="Male"required>Male
      <input type="radio" name="sex" id="" value="Female"required>Female
      <input type="password" name="pass1" id="" placeholder="Enter Password"required>
      <input type="password" name="pass2" id="" placeholder="confirm Password"required>
      <input type="submit" name="SIGNUP" value="SIGNUP">
      Already a member?<a href="login.php" style=" color: #ffc107;">LOGIN</a>
    </form>
  </div>
</body>
</html>