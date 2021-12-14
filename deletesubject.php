<?php
include("dbconfig.php");
$subid=$_GET['fname'];
$r=mysqli_query($conn,"delete from subject where subid='$subid'");	
if (!$r) {
	echo "Error while removing file";
}
else
{
	//mysqli_query($conn,"delete from video where vname='$file'");
	header("Location:addsubject.php?SubjectRemovedsuccessfully");
}

?>