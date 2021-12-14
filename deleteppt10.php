<?php 
include("db.php");
$msg;
	$file_name=$_GET['fname'];
	$file=str_replace("'", "", $file_name);
	$path="uploadp10/".$file;
	//echo $path."<br>";

if (!unlink($path)) {
	echo "Error while removing file";
}
else
{
	mysqli_query($conn,"delete from video where vname='$file'");
	header("Location:M3ppt.php");
	
}
?>
