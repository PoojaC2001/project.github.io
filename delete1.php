<?php
$inputfile=$_FILES['file'];
unlink($_GET['upload/'.$inputfile]);
header("Location:DMvideolectures.php");
?>