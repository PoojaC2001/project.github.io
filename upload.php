<?php
	$input_file=$_FILES["myfile"];

	move_uploaded_file($input_file["tmp_name"], "upload/".$input_file["name"]);
	//echo "File uploaded successfully";
	header("Location:index1.php");
?>