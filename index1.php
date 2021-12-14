
<!DOCTYPE html>
<html>
<head>
	<title>File Upload</title>
</head>
<body>
	<h1>Upload Files</h1>
	<form method="POST" enctype="multipart/form-data" action="upload.php">
		<input type="file" name="myfile">
		<input type="submit" name="Upload">
	</form> <br><br>
	<table border="1" >
		<tr>
			<th>Sr.No</th><th>Download</th>
		</tr>
		
	<?php
		$files=scandir("upload");
		$a=0;
		for ($i=2; $i<count($files);$i++)
		{
			$a++;
		?>
		<tr>
		<td><?php echo $a; ?></td>
		<td>
			<a href="upload/<?php echo $files[$i] ?>"><?php echo $files[$i] ?></a>
		</td>
		<?php  
		}
		?>
		</tr>
		</table>
</body>
</html>