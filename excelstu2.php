<?php
      session_start();
     if(isset($_SESSION["User"]))
      {
$tag= "Welcome"." ".$_SESSION["Name"];      }
      else
      {
          header('location:staff.php');
      }
    ?>
 
<!doctype HTML>
<html>
    <head>
        <title>Add from Excel Sheet</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="css/footer-basic-centered2.css" type="text/css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
   <script src="js/bootstrap.js"></script>
     
  <link href='https://fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>
     
       
   <div class = "navbar navbar-default navbar-static-top">
      <div class="container ">
          <div class='navbar-header brand-name'>
              <a href="#" class="pull-left"><img src="img/logo.jpeg"></a>
              
         <button class = "navbar-toggle" data-toggle = "collapse" data-target=".navHeaderCollapse">
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>

         </button>
            </div>
              <div class="collapse navbar-collapse navHeaderCollapse">
             
                <ul class = "nav navbar-nav navbar-right">
                  
                  <li><a href = "sflogin.php">Home</a></li>
                  
                 
                   <li class="dropdown">
       <a href ="#" class="dropdown-toggle" data-toggle="dropdown">Manage<b class="caret"></b></a> 
                   <ul class="dropdown-menu">
                   <li><a href = "addstu2.php">Add student</a></li>
                               <li><a href = "editstu2.php">Edit student</a></li>
                             
                  
                               </ul>     
                       <li class="dropdown">
                  <a href ="#" class="dropdown-toggle" data-toggle="dropdown">Upload<b class="caret"></b></a> 
                   <ul class="dropdown-menu">
                   
                        <li><a href = "uploadf.php">Upload Notice</a></li>
                               <li class="active"><a href = "excelstu2.php">Upload student</a></li>
                               </ul>     
                     <li><a href = "sflogout.php">Log out</a></li>
          </div>
      </div>
       
   </div>    
    
    <div class="container">
           
            <div class="row">
             
                <div class="col-md-3 hidden-phone">
                    
                </div>
                <div class="col-md-6" id="form-login">
                    <form class="well" action="" method="post" name="upload_excel" enctype="multipart/form-data">
                        <fieldset>
                            <legend>Import CSV/Excel file</legend>
                            <div class="control-group">
                                <div class="control-label">
                                    <label>CSV/Excel File:</label>
                                </div>
                                <div class="controls form-group">
                                    <input type="file" name="file" id="file" class="input-large form-control">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <div class="controls">
                                <button type="submit" id="submit" name="Import" class="btn btn-success btn-flat btn-lg pull-right button-loading" data-loading-text="Loading...">Upload</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="col-md-3 hidden-phone"></div>
            </div>
            
    
            <table class="table table-bordered">
                <thead>
                        <tr>
                        <th>Name</th>
                     <th>Department</th>
                    <th>Sem</th>
                    <th>Email</th>
                       <th>UID</th>
                       
                        </tr> 
                      </thead>
                   <?php
              include 'database.php';


                 $sql = "select Name,Dept,Sem,Email,UID from student  where Dept= '".$_SESSION['Dept']."'";
               $result = mysqli_query($conn, $sql);
             if ($result) {
   


        while( $row = mysqli_fetch_array($result) )
                    {
                    ?>
                        <tr>
                        <td><?php echo $row["Name"]; ?></td>
                        <td><?php echo $row["Dept"]; ?></td>
                       
                        <td><?php echo $row["Sem"]; ?></td>
                        <td><?php echo $row["Email"]; ?></td>
                        <td><?php echo $row["UID"]; ?></td>
                      
                        </tr>
                    <?php
                    }
                }else
                    echo "<center>"."Please Upload a csv file"."</center>";
                ?>
            </table>
        </div>
        
        
        <?php
   include 'database.php'; 
   
               
$err1=0;$err2=0;$err3=0;$err4=0;
if(isset($_POST["Import"])){
                      
$file = $_FILES['file']['tmp_name'];
    
 if ($_FILES["file"]["size"] > 0)
 {
$handle = fopen($file, "r");
$c = 0;
                 
                $subject="Congratulations! Your account has been created!";
                $headers="From:BVIT<bvit0027@gmail.com>";   
while(($data = fgetcsv($handle, 1000, ",")) !== false)
{
    $email = $data[3];          
    $to=$email;
    $sql = "select UID from student where UID = '".$data[4]."'";
                    $result = mysqli_query($conn, $sql);
    if((mysqli_affected_rows($conn)>0)||$data[2]>6||(strlen($data[4]) != 10)||((!filter_var($data[3], FILTER_VALIDATE_EMAIL))))
                    {
                        if((mysqli_affected_rows($conn)>0))
                        {
                           $err1++;
                        }
                        if($data[2]>6)
                        {
                            $err2++;
                        }
                        if((strlen($data[4]) != 10))
                        {
                           $err3++;
                        }
                        if(((!filter_var($data[3], FILTER_VALIDATE_EMAIL))))
                        {
                            $err4++;
                        }
                    }
                    else{
$length = 8;
                         $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                         $charactersLength = strlen($characters);
                         $pass= '';
                          for ($i = 0; $i < $length; $i++) {
                           $pass .= $characters[rand(0, $charactersLength - 1)];
                          }
$sql = "insert into student(Name,Dept,Sem,Email,UID,Password) values ( '$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$pass')";
$stmt = mysqli_prepare($conn,$sql);
 $message="Hello $data[0],This Mail is from Bharti vidyapeeth,\n\nThanks for Registration.\n\nYour password is $pass";
                         mail($to, $subject,$message,$headers);
mysqli_stmt_execute($stmt);
$c = $c + 1;
}
}

if($err1>0||$err2>0||$err3>0||$err4>0)
                    {
                        if($err1>0)
                        {
                            echo '<script>
                                   alert("Some Rows were not inserted because UID was already taken!");
                                   </script>';
                        }
                        if($err2>0)
                        {
                            echo '<script>
                                   alert("Some Rows were not inserted due to an invalid Semester!");
                                   </script>';
                        }
                        if($err3>0)
                        {
                            echo '<script>
                                   alert("Some Rows were not inserted due to an invalid UID Number!");
                                   </script>';
                        }
                        if($err4>0)
                        {
                             echo '<script>
                                   alert("Some Rows were not inserted due to an invalid Email ID!");
                                   </script>';
                        }
                    }
fclose($handle);
//throws a message if data successfully imported to mysql database from excel file
echo "<script type=\"text/javascript\">
alert(\" CSV File has been successfully Imported ...............$c rows has been added..\");
window.location = \"excelstu2.php\"
</script>";
//close of connection
mysql_close($conn); 
 }

        else {
       
            echo "<script type=\"text/javascript\">
alert(\" Ohh Snap.....! You just hitten the submit button without selecting file.\");

</script>";
    }
}
?> 


	<?php
        include'footer.php';
        ?>
   
   </body>
    </html>
  

