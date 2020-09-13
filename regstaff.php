
<!doctype HTML>
<html>
    <head>
        <title>Register Staff</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link href="css/index.css" type="text/css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.js"></script>
      
      

  <link href='https://fonts.googleapis.com/css?family=Quattrocento+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    
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
                  <li><a href = "admin.php">Admin</a></li>  
                  <li class = "active"><a href = "staff.php">Staff</a></li>
                   <li><a href = "student.php">Student</a></li>
                  <li><a href = "ologout.php">Operator</a></li>
              
              </ul>
          </div>
      </div>
       
   </div>    
 
 <?php
  include 'database.php';
       
            
           $msg='';
    $nameErr = $emailError = $mobileError = $passError ="";
$name = $email = $number = "";
     if(isset($_POST['submit']))
   {
        $name = $_POST['name'];
   $dept = $_POST['dept'];
  
  if(!empty($_POST['gender'])) 
     {
   
     $gender =  $_POST['gender'];
    }
      $mobile = test_input($_POST["number"]);   
   $email =test_input($_POST['email']);
   $username = test_input($_POST['username']);
   $pass_1 = test_input($_POST['password_1']);
   $pass_2 = $_POST['password_2'];
                 $to=$email;
                $subject="Congratulations! Your Account has been created!";
                $message="Hello $name,This Mail is from Bharti vidyapeeth\n\nThanks for Registration.\n\n";
                $headers="From:BVIT<bvit0027@gmail.com>";
               
   $sql = "select username from staff where username = '".$username."'";
   $result = mysqli_query($conn, $sql);
      if(((!filter_var($email, FILTER_VALIDATE_EMAIL)))||(mysqli_affected_rows($conn)>0)||(!preg_match('/^[0-9]{10}+$/', $mobile))||(!($pass_1===$pass_2)))
      {
// check if name only contains letters and whitespace
if (!preg_match('/^[0-9]{10}+$/', $mobile)) {
$mobileError = "10 digit Number"; 
}
   
      
// check if e-mail address is well-formed
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$emailError = "Invalid email format"; 
}
       
   if(mysqli_affected_rows($conn)>0)
   {
    echo '<script language="javascript">';
    echo 'alert("Username already exists!");';
    echo '</script>';
   }
  
   if(!($pass_1===$pass_2))
   {
     $passError ="Password do not match";
   }
        
     }else
     {  mail($to, $subject,$message,$headers);
       $sql = "insert into staff values('".$name."','".$dept."','".$mobile."','".$gender."','".$email."','".$username."','".$pass_1."')";
       mysqli_query($conn, $sql);
      $msg='Your Account Has Been Created..';
      
     }
     }
    function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
 
     
	?>	  	
	
	
	          
<div class="container">
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12"></div>
 <div class=" col-md-6 col-sm-6 col-xs-12">
 <?php
   if(!empty($msg)) 
     { ?> <div class="alert alert-success alert-dismissible fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
<center>    <?php   echo $msg; ?></center>  </div><?php } ?>
</div></div>
 <div class="row">
      <div class="col-md-12 text-center">
          <legend><h2>Create Your Account</h2></legend></div>
            <div class=" col-md-6 col-sm-6 col-xs-12">
               <!---form start-->
<form class="" form action="" method="post" >

 <div class="form-group">
               
                   <label for="Name">Name</label>
<input type="text" class="form-control" name="name" placeholder="Your name.." required>

    </div>  
    
          		<div class="form-group">
		 
    <label>Department</label>
           <?php    
 $results=mysqli_query($conn, "SELECT * FROM operator");
    //Count total number of rows
    $rowCount =  $results->num_rows;
    ?>
    <select name="dept" class="form-control" style="width:350px" required>
        <option value="">Select Department</option>
        <?php
        if($rowCount > 0){
            while($row = mysqli_fetch_assoc($results)){ 
                echo '<option value="'.$row['Dept'].'">'.$row['Dept'].'</option>';
            }
        }else{
            echo '<option value="">Department not available</option>';
        }
        ?>
    </select>       	
                

    </div>  

    
        
                               <div class="form-group" required>
                                 
                                  <label for="gender">Gender</label>
                               <br>
                              
                    <input type="radio" value="Male" name="gender">
                    <label>Male</label>
                    <input type="radio" value="Female" name="gender">
                    <label for="">Female</label>
                                   


    </div>  
                                                   <div class="form-group">
   
    <label for="phone no">Phone No</label>
    <input type="number" class="form-control" name="number" placeholder="Phone no.." required>
       <div class="error"><?php echo $mobileError;?></div>
  </div>   
                                   
                                   
                                                   </div>
                           		    
                           		    <div class=" col-md-6 col-sm-6 col-xs-12">

             
     <div class="form-group">
	    <label class="email">Email</label>
	   <input type="text" name="email" placeholder="Email..." class="form-control" required  >
         <div class="error" ><?php echo $emailError;?></div>
	                        </div>
               
          		<div class="form-group">
		 
    <label for="InputUser1">username</label>
<input type="Username" class="form-control" name="username" placeholder="create Username" required>

    </div>         
                  
       <div class="form-group">
    <label for="InputPassword1">Password</label>
    <input type="password" class="form-control" name="password_1" placeholder="Create Password" required>
    <span class="error"><?php echo $passError;?></span>
  </div>
            <div class="form-group">
    <label for="InputPassword1">Password</label>
    <input type="password" class="form-control" name="password_2" placeholder="Confirm Password.."><br>
  </div>
                                       
           
          
    </div>
                <br>
                 <br>
                                     
             <div class="col-md-4 col-sm-4 col-xs-12">  </div>
                              
                               <div class="col-md-4 col-sm-4 col-xs-12">       
                                   <button type="submit" class="btn btn-success btn-block" name="submit">Submit</button></div>
    
         </form>



        </div>
         </div>

        
<?php
        include'footer.php';
        ?>
   
   </body>
    </html>