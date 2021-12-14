<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
if(isset($_POST['upload']))
{
	$file1 = $_FILES['file'];
	print_r($file1);
}
?>
<form action="?" method="_POST" enctype="multipart/form-data">
<input type="file" name="file">
<input type="submit" name="s" value="Upload Image">
</form>
</body>
</html>>