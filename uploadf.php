<?php
session_start();
                    include 'database.php';

if(isset($_SESSION["User"]))
      {
$tag= "<center>Hello"." ".$_SESSION["Name"]."</center>";
      }
      else
      {
          header('location:staff.php');
      }
      ?> 
<!doctype HTML>
<html>
    <head>
        <title>Upload Files</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="css/footer-basic-centered2.css" type="text/css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
   <script src="js/bootstrap.js"></script>
       
  <link href='https://fonts.googleapis.com/css?family=Quattrocento+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
     
       
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
                   <li ><a href = "addstu2.php">Add student</a></li>
                               <li><a href = "editstu2.php">Edit student</a></li>
                              
                  
                               </ul>     
                       <li class="dropdown">
                  <a href ="#" class="dropdown-toggle" data-toggle="dropdown">Upload<b class="caret"></b></a> 
                   <ul class="dropdown-menu">
                   
                        <li class="active"><a href = "uploadf.php">Upload Notice</a></li>
                               <li><a href = "excelstu2.php">Upload student</a></li>
                               </ul>     
                     <li><a href = "sflogout.php">Log out</a></li>
              
              </ul>
          </div>
      </div>
       
   </div>    
   
   
</body>
</html>
<?php echo $tag;?>
  

     
  <div class="container">
           
            <div class="row">
             
                <div class="col-md-3 hidden-phone">
                    
                </div>
                <div class="col-md-6" id="form-login">
                    <form class="well" action="" method="post" name="upload_excel" enctype="multipart/form-data">
                        <fieldset>
                           <center> <legend>Notice</legend></center>
                            <div class="control-group">
                              
                                <label for="comment">Message</label>
  <textarea name="description_entered" class="form-control" rows="2" id="comment" placeholder="Write a notice here..." required></textarea>

                                      
        <label>Semester</label> 
      
    <select name="sem_select" id="sem" class="form-control" style="width:350px" required>
        <option value="">Select Semester</option>
   <option value="1">1</option>
   <option value="2">2</option>
   <option value="3">3</option>
   <option value="4">4</option><option value="5">5</option><option value="6">6</option>
   
      
    </select>
          </div>
                               
                               
                                <div class="control-label">
                                    <label>Upload a File:</label>
                                </div>
                                <div class="controls form-group">
                                    <input type="file" name="file" id="file" class="input-large form-control">
                                </div>
                           
                            
                            <div class="control-group">
                                <div class="controls">
                                <button type="submit" id="submit" name="submit" class="btn btn-success btn-flat btn-lg pull-right button-loading" data-loading-text="Loading...">Upload</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="col-md-3 hidden-phone"></div>
           
     
          <?php
if(isset($_POST["submit"])){
      $sem=  $_POST["sem_select"];
 $name= $_FILES['file']['name'];

$tmp_name= $_FILES['file']['tmp_name'];

$submitbutton= $_POST['submit'];

$position= strpos($name, "."); 

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension);

$description= $_POST['description_entered'];

if (isset($name)) {

$path= "testupload/";

    
    
    
if (!empty($name)){
if (move_uploaded_file($tmp_name, $path.$name))
{

            echo "<script type=\"text/javascript\">
alert(\"Uploaded...!\");

</script>";
}
    else {
       
            echo "<script type=\"text/javascript\">
alert(\" Ohh Snap.....! Something Went Wrong. Please select a file\");

</script>";
    }
}
}
}

?> 
          
  

<?php
$dbDatabase = "feed";

$dbServer = "localhost";

$dbUser = "root";

$dbPass = "";
$conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbDatabase) or die('Unable To connect');

$table = "table"; 


         
if(!empty($description)){
$sql="INSERT INTO files (Sem, description, filename, date)
VALUES ('$sem', '$description', '$name', NOW())";
    $result = mysqli_query($conn, $sql);
}


mysqli_close($conn);

?>
<?php
$dbDatabase = "feed";

$dbServer = "localhost";

$dbUser = "root";

$dbPass = "";
$conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbDatabase) or die('Unable To connect');
$table = "table"; 
 
// Connection to DBase 



$result= mysqli_query($conn, "SELECT sem,description, filename, date FROM files ORDER BY ID desc");
?>
<table class="table table-bordered">
                <thead>
                        <tr>
                       
                        <th>Semester</th>
                         <th>Notice</th>
                     <th>File</th>
                    <th>Action</th>
                    <th>Date</th>
                      
                       
                        </tr> 
                      </thead>
    
    
<?php
while ($row = mysqli_fetch_array($result)){ 
$files_field= $row['filename'];
$files_show= "testupload/$files_field";
$descriptionvalue= $row['description'];
    $date= $row['date'];
   $seme=$row['sem'];
    
print "<tr>\n"; 
    print "\t<td>\n"; 
echo "<font face=arial size=4/>$seme</font>";
print "</td>\n";
    
print "\t<td>\n"; 
echo "<font face=arial size=4/>$descriptionvalue</font>";
print "</td>\n";
print "\t<td>\n"; 
echo "<div align=center><a href='$files_show'>$files_field</a></div>";
print "</td>\n";
    ?>
      <td>  <a onclick="return confirm('Are you sure you want to delete the entry..?')" href="deletenotice.php?filename=<?php echo $row['filename']; ?>"class="btn btn-danger">Delete</a></td>
      <?php
print "\t<td>\n"; 
echo "<font face=arial size=4/>$date</font>";
print "</td>\n";;
print "</tr>\n"; 
} 
print "</table>\n"; 

?>         
          
       </div>
            </div>     
           

	<?php
        include'footer.php';
        ?>
   
   </body>
    </html>