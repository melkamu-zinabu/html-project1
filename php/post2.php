
<?php
$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
		$folder = "image/".$filename;
		
	$conn = mysqli_connect("localhost", "root", "", "db");

		// Get all the submitted data from the form
		$sql = "INSERT INTO upload (image) VALUES ('$filename')";

		// Execute query
		mysqli_query($conn, $sql);
		
		// Now let's move the uploaded image into the folder: image
		if (move_uploaded_file($tempname, $folder)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<link rel="stylesheet" type= "text/css" href ="style.css"/>
<div id="content">

<form  method="POST" action="post2.php" enctype="multipart/form-data">
	<input type="file" name="uploadfile" value=""/>
	
	<div>
		<button type="submit" name="upload">UPLOAD</button>
		</div>
</form>
</div>
</body>
</html>
