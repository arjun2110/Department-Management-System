<?php

session_start();


include 'database.php';
$message="";

if(count($_POST)>0) {
    $username=mysqli_real_escape_string($conn,$_POST['username']);
$password=mysqli_real_escape_string($conn,$_POST['password']);
$con = mysqli_connect($dbServer, $dbUser, $dbPass, $dbDatabase) or die('Unable To connect');
$result = mysqli_query($conn,"select * from staff where USERNAME='$username' && PASSWORD='$password'");
$row = mysqli_fetch_array($result);
if(is_array($row)) {
   $_SESSION['Name'] = $row['Name'];
    $_SESSION['User']=$row['USERNAME'];
    
       $_SESSION['Dept']=  $row['DEPARTMENT'];

     

} else {
$msg = "Invalid Username or Password!";
}
}
if(isset($_SESSION["User"])) {
header("Location:sflogin.php");
}
?>
<!doctype HTML>
<html>
    <head>
        <title>Staff Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="css/index.css" type="text/css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script src="js/bootstrap.js"></script>
   <script src="js/bootstrap.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans" rel="stylesheet">
 
     <body>
       
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
                  
               <li><a href = "index.php">Home</a></li>
      
                  <li class = "active"><a href = "staff.php">Staff</a></li>
                   <li><a href = "student.php">Student</a></li>
                  <li><a class="" href = "operator.php">Operator</a></li>
              
              </ul>
          </div>
      </div>
       
   </div>    


<div class="container-fluid">

 <div class="row">
        <div class="col-md-4 col-sm-3 col-xs-12"></div>
            <div class="col-md-4 col-sm-6 col-xs-12">
               <!---form start-->
<form class="form-container" form action="" method="post">
<h1>Staff Login</h1><br>
	     
	     <?php
   if(!empty($msg)) 
            { ?> 
             <div class="alert alert-danger alert-dismissible fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
        <?php  
             echo $msg; ?> </div><?php } ?>
    
		<div class="form-group">
		 <span class="glyphicon glyphicon-user"></span>
    <label for="InputUser1">Username</label>
<input type="Username" class="form-control" name="username" placeholder="Username" required>

    </div>   
		  	
 <div class="form-group">
   <span class="glyphicon glyphicon-lock"></span>
    <label for="InputPassword1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password" required>
  </div>
         <button type="submit" class="btn btn-success btn-block">Submit</button>
    <br>  <center>  <a href="regstaff.php">New Register</a> </center><br>
         </form>
         </div>
          <div class="col-md-4 col-sm-4 col-xs-12"></div>

        </div>
         </div>
        
<?php
        include'footer.php';
        ?>
   
   </body>
    </html>