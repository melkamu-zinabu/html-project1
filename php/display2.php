<?php
$conn = mysqli_connect("localhost", "root", "", "db");
$result = mysqli_query($conn, "SELECT * FROM upload");
while($row = mysqli_fetch_array($result))
{?>
<?php
echo '<img src="data:image;base64,'.base64_encode($row['image']).'"  alt="image" style="width:100px; height:100px;">';
?>
<?php

}
?>