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
                  <a href ="#" class="dropdown-toggle" data-toggle="dropdown">Upload marks<b class="caret"></b></a> 
                   <ul class="dropdown-menu">
                   
                           <li><a href = "excelmarks.php">Upload marks</a></li>
                             <li><a href = "viewmarks.php">view marks</a></li>
                               </ul>     
                       <li class="dropdown">
                  <a href ="#" class="dropdown-toggle" data-toggle="dropdown">Upload<b class="caret"></b></a> 
                   <ul class="dropdown-menu">
                   
                          <li class="active"><a href = "uploadf.php">Upload file</a></li>
                             <li><a href = "deletef.php">Delete file</a></li>
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
                            <legend>Upload Timetable</legend>
                            <div class="control-group">
                                <div class="control-label">
                                    <label>Upload a File:</label>
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
            </div>
     
          <?php
if(isset($_POST["Import"])){
 $targetfolder = "testupload/";


 $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;

 $ok=1;

$file_type=$_FILES['file']['type'];

if ($file_type=="application/pdf" || $file_type=="image/gif" || $file_type=="image/jpeg") {


    
//throws a message if data successfully imported to mysql database from excel file
echo "<script type=\"text/javascript\">
alert(\"The file ". basename( $_FILES['file']['name']). " is uploaded\");
window.location = \"uploadf.php\"
</script>";
//close of connection
mysql_close($conn); 
 }

        else {
       
            echo "<script type=\"text/javascript\">
alert(\" Ohh Snap.....! Something Went Wrong. Please select PDF or Jpeg file\");

</script>";
    }
}
?> 
          
          
          
           
           

	<?php
        include'footer.php';
        ?>
   
   </body>
    </html>