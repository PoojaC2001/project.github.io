

<script type="text/javascript">
function deletes(subname)
{
	a=confirm('Are You Sure To Remove This Subject ?')
	 if(a)
     {
        window.location.href='deletesubject.php?fname='+subname;
     }
}
</script>	

<?php
    include("dbconfig.php");
    extract($_POST);
       
        if(isset($add))
        {
            
            if($sub=="")
            {
                $subfailed="<font color='red'>Please Enter subject name</font>";
            }
            else
            {
                $query="INSERT INTO `subject`( `subject_name`) VALUES ('$sub') ";
                $r=mysqli_query($conn,$query);
                if ($r) {
                    # code...

                    $subsuccess="Subject added successfully";
                }
                else{
                    $subfailed="Something went wrong";
                }
             
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
            <tr><td><button onclick="window.location.href='DMvideolectures.php'" style="background-color: red; color:white"><h3>Home</h3></button></td>
            <td><button onclick="window.location.href='addsubject.php'" style="background-color: red; color:white"><h3>Add Subject</h3></button></td>
            </tr>
        </table>
        <form method="POST" action="addsubject.php">
        <table width="100%" height="15%">
            <td width="70%"> 
            <table border>
        
	     <tr>
		      <H1>Add Subject</H1>
        </tr>
        <tr>
            <td>Enter Subject Name</td>
            <td><input type="text" name="sub"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="add" value="Add Subject"></td>
        </tr>
        <tr></tr>
        <tr></tr>
        </table>
        </form>
        <div>
        <?php
            if(isset($subsuccess))
            { 
                ?>
                <div>
                <span><h4 style="color:green"><?php echo $subsuccess;?></h4></span>
                </div>
                <?php
            }
        ?>
    </div>
    <div>
        <?php
            if(isset($subfailed))
            { 
                ?>
                <div>
                <span><h4 style="color:red"><?php echo $subfailed;?></h4></span>
                </div>
                <?php
            }
        ?>
    </div>
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

   
       
            <?php
    
    echo "<table  style=margin:15px; border=1;>";
    echo "<tr>";
    
    echo "<th>Sr.No.</th>";
    echo "<th>Subject ID</th>";
    echo "<th> Subject Name</th>";
    echo "<th> Action</th>";
    echo "</tr>";
    
    $i=1;
    $que=mysqli_query($conn,"select * from subject");
    
    while($row=mysqli_fetch_array($que))
    {
        echo "<tr>";
        echo "<td>".$i."</td>";
        echo "<td>".$row['subid']."</td>";
        echo "<td>".$row['subject_name']."</td>";
       echo "<td class='text-center'><a title=\"Delete  ".$row['subject_name']."\" href='#' onclick='deletes($row[subid]);'>Delete</a></td>";
       
        echo "</tr>";
        $i++;
    }
    
?>
        
    </table>
    </body>
</html>