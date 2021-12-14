<?php
    include("db.php");
    extract($_POST);
        $pass="shivraj123";
        if(isset($upload))
        {
            if(!empty($_FILES['file']['name']))
            {
            if($p=="")
            {
                $text="<font color='white'>Please Enter Password Before Uploading Files</font>";
            }
            elseif($p==$pass)
            {
                $text="<font color='green'>Entered password is Correct</font>";
                $file_name=$_FILES['file']['name'];
                $file_type=$_FILES['file']['type'];
                $file_size=$_FILES['file']['size'];
                $file_tem_Loc=$_FILES['file']['tmp_name'];
                $file_store="uploadq4/".$file_name;
                
                if(move_uploaded_file($file_tem_Loc, $file_store)){
                $q="INSERT INTO video(vname) VALUES ('$file_name')";
                
                if(mysqli_query($conn,$q)){
                    $success="File uploaded successfully";
                }
                else{
                    $failed="Something went wrong";
                }
                }
            }
            else
            {
                $text="<font color='white'>Entered Password is Wrong</font>"; 
            
            }
            }
            else
            {
                $text="<font color='white'>Please select a file to upload</font>";
            }
        
           
        }
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
        <style type="text/css">
        table,tr,td{
        border:1px solid black;
        }
        table{
        border-collapse:collapse;
        }
        td{
        padding:5px;
        }
        
        </style>
        </head>
        <body>
        <table border width="100%" height="17%">
        <tr>
        <td width="91%"  style="background-color:#FF1493; color:white; font-family:algerian">
        <h1><center>Vidya &nbsp;Pratishthan's &nbsp;Kamalnayan &nbsp;Bajaj &nbsp;Institute &nbsp;of &nbsp;Engineering &nbsp;& &nbsp;Technology</center></h1>
        </td>
        <td width="10%" style="background-image: url('logo.jpg');">
        </td>
        </tr>
        </table>
        
        <table width="100%" style="background-color:rgb(243, 189, 12);">
            <tr><td><button onclick="window.location.href='courses.html'" style="background-color: red; color:white"><h3>Home</h3></button></td></tr>
        </table>
        <table width="100%" height="75%">
            <td width="70%"> 
            <table border>
        <?php
        $files=scandir("uploadq4");
		$a=0;
		for ($i=2; $i<count($files);$i++)
		{
			$a++;
		?>
	<tr>
		<td><?php echo $a; ?></td>
		
			<td>
            <a href="uploadq4/<?php echo $files[$i] ?>"><?php echo $files[$i] ?></a>
            </td>
            <td>
            <a href="deletequiz4.php?fname='<?php echo $files[$i] ?>'"><button style="background-color:red; border-color:green; border-width:4px; color:white;">Delete</button></a>
		<?php  
		} 
        ?>
        </tr>
        </table>
    </td>
            <td width="25%" style="position:absolute; background-color:red;">
    <form action="?" method="POST" enctype="multipart/form-data">
    <label>Teachers May Upload Videos Here,</label>
    <p><input type="file" name="file"/></p>
    <p> Password : <input type="password" name="p" placeholder="Enter Password"></p>
    <div>
        <?php
            if(isset($success))
            { 
                ?>
                <div>
                <span><h4 style="color:green"><?php echo $success;?></h4></span>
                </div>
                <?php
            }
        ?>
    </div>

     <div>
        <?php
            if(isset($failed))
            { 
                ?>
                <div>
                <span><h4 style="color:white"><?php echo $failed;?></h4></span>
                </div>
                <?php
            }
        ?>
    </div>

    <div>
    <?php
    if(isset($text))
    {
    ?>
    <div>
    <span><h4><?php echo $text;?></h4></span>
    </div>
    <?php
    }
    ?>
    </div>
    <p><input type="submit" name="upload" value="Upload"></p>
   </form>
     </td>
    </table> 
    </body>
</html>