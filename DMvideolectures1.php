

<script type="text/javascript">
function deletes(fname)
{
	a=confirm('Are You Sure To Remove This File ?')
	 if(a)
     {
        window.location.href='deletevideo.php?fname='+fname;
     }
}
</script>	

<?php
    include("dbconfig.php");
    extract($_POST);
        $pass="s";
        if(isset($upload))
        {
            if(!empty($_FILES['file']['name']))
            {
            if($p=="")
            {
                $text="<font color='white'>Please Enter Password Before Uploading Files</font>";
            }
            if($catagory==''){
			$text = 'Please select catagory.';
		}
            elseif($p==$pass)
            {
                $text="<font color='green'>Entered password is Correct</font>";
                $file_name=$_FILES['file']['name'];
                $file_type=$_FILES['file']['type'];
                $file_size=$_FILES['file']['size'];
                $file_tem_Loc=$_FILES['file']['tmp_name'];
                $file_store="upload/".$file_name;
                
                if(move_uploaded_file($file_tem_Loc, $file_store)){
                $q="INSERT INTO video(vname) VALUES ('$file_name')";
                if(mysqli_query($conn,$q)){
                    $success="Video uploaded successfully";
                }
                else{
                    $failed="Something went wrong";
                }
              //  }
            }
            else
            {
                $text="<font color='white'>Entered Password is Wrong</font>"; 
            
            }
            }
            else
            {
                $text="<font color='white'>Please select a video to upload</font>";
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
        
        <table  style="background-color:rgb(243, 189, 12);">
            <tr><td><button onclick="window.location.href='courses.html'" style="background-color: red; color:white"><h3>Home</h3></button></td>
            <td><button onclick="window.location.href='addsubject.php'" style="background-color: red; color:white"><h3>Add Subject</h3></button></td>
            </tr>
        </table>
        <table width="100%" height="75%">
            <td width="70%"> 
            <table border>
        <?php
        $files=scandir("uploads");
		$a=0;
		for ($i=2; $i<count($files);$i++)
		{
			$a++;
		?>
	<tr>
		<td><?php echo $a; ?></td>
		
			<td>
            <a href="upload/<?php echo $files[$i] ?>"><video controls="" width="150px" height="80px" src="uploads/<?php echo $files[$i]?>"></video></a>
            
            <a href="upload/<?php echo $files[$i] ?>"><?php echo $files[$i] ?></a>
            </td>
            <td>
            <a href="deletevideo.php?fname='<?php echo $files[$i] ?>'">delete</a>
            <a href="#" onclick="deletes('<?php echo $files[$i]?>')"><button style="background: red; font: 12pt;border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;">Delete</button></a>
            </td>
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
    <p>Select Subject</label></p><br>
		<select name="subject">
		<?php
			$query=mysqli_query($conn,"select * from subject");
			while($row=mysqli_fetch_assoc($query))
			{
				echo "<option value='".$row['subid']."'>".$row['subject_name']."</option>";
			}
		?>
		</select></p><br>
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