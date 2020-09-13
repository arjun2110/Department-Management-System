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
        <title>Add Student</title>
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
                   <li class="active"><a href = "addstu2.php">Add student</a></li>
                               <li><a href = "editstu2.php">Edit student</a></li>
                  
                               </ul>     
                       <li class="dropdown">
                  <a href ="#" class="dropdown-toggle" data-toggle="dropdown">Upload<b class="caret"></b></a> 
                   <ul class="dropdown-menu">
                   
                        <li><a href = "uploadf.php">Upload Notice</a></li>
                               <li><a href = "excelstu2.php">Upload student</a></li>
                               </ul>     
                     <li><a href = "sflogout.php">Log out</a></li>
          </div>
      </div>
       
   </div>    
 
 
 
   
</body>
</html>


  <form action ="" method="post">
    <?php
 include 'database.php';
                $msg='';
         echo $tag;    
             
      $enrollerror="";
      $emailerror="";
               if(isset($_POST['submit']))
               {
                    
                    $name = $_POST['name'];
                    $dept = $_POST['Dept_Select'];
                   
                    $sem =  $_POST['sem'];
                    
                    $enroll = $_POST['UID'];
                    $email = test_input($_POST['email']);
                    $sql = "select Username from student where Username = '".$enroll."'";
                    $result = mysqli_query($conn, $sql);
                    $to=$email;
                    $subject="Congratulations! Your account has been created!";
                    
                    $headers="From:BVIT<bvit0027@gmail.com>";
               
                    if((mysqli_affected_rows($conn)>0)||(strlen($enroll) != 10)||((!filter_var($email, FILTER_VALIDATE_EMAIL))))
                    {
                    if(mysqli_affected_rows($conn)>0)
                    {
                        echo '<script language="javascript">';
                        echo 'alert("Username already exists!");';
                        echo '</script>';
                    }
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                    {
                    $emailerror = "Invalid email format"; 
                    }
                    if(strlen($enroll) != 10)
                    {
                        $enrollerror="UID number must be of 10 digits";
                    }
                  
                    }
                    else
                    {
                        $length = 8;
                         $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                         $charactersLength = strlen($characters);
                         $pass= '';
                          for ($i = 0; $i < $length; $i++) {
                           $pass .= $characters[rand(0, $charactersLength - 1)];
                            }
                        $sql = "insert into student values('".$name."','".$dept."','".$sem."','".$email."','".$enroll."','".$pass."')";
                        mysqli_query($conn, $sql);
                        $message="Hello $name,This Mail is from Bharti Vidyapeeth Institute of Technology\n\nThanks for Registration.\n\nYour password is $pass";
                         mail($to, $subject,$message,$headers);
                $msg='Data inserted successfully';
                    }
               
                    
               }
    
     function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
    ?>
                  
<div class="container-fluid">
   <div class="row">
   <div class="col-md-4 col-sm-6 col-xs-12"></div>
    <div class="col-md-4 col-sm-6 col-xs-12">
                   <!---form start-->
<form class="" form action="" method="post" >
             
               
        <?php 
                 if(!empty($msg)) 
                  { ?> <div class="alert alert-success alert-dismissible fade in"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                <?php   echo $msg; ?> </div><?php } ?>
                
                  
            <div class="col-md-12 text-center">
      <fieldset>  <legend><h2>ADD STUDENTS<h2></legend> <p></p>
          <p></p></div>
               
                  
                   
                    <div class="form-group">

         <label  name="Name" for="Name">Name</label><label>*:</label>
     <input id="1" type="text" class="form-control"  name="name" placeholder="Student Name" required>
                    </div>
                   <div class="controls form-group">
	    <label id="4" name="Dept"  class="">Department</label><label>*:</label>
            
            
 <?php
         
         $sql = "SELECT Dept FROM operator where Dept= '".$_SESSION['Dept']."'";
                     $result = mysqli_query($conn, $sql);
?>
           <select class="form-control" name ="Dept_Select" style="width:350px" >
  <?php     
       
            while($row = mysqli_fetch_assoc($result)) {
       
         echo '<option value="'.$row['Dept'].'">'.$row['Dept'].'</option>';
}?>

</select>
                     </div>
                 
                    <div class="form-group">

                
     <label  name="Sem" for="Name">Semester</label><label>*:</label>
       <select id="5" name="sem" style="width:300px" class="form-control" required>
                <option value="" selected disabled>Select Semester</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
       </select></div>
        <div class="form-group">

         <label  name="UID" for="UID">UID No.</label><label>*:</label>
     <input id="6" type="number" class="form-control" name="UID" placeholder="Student's UID Number" required>
        <div class="error"><?php echo $enrollerror;?></div>
        </div>
             <div class="form-group">

         <label  name="Email">Email Id</label><label>*:</label>
     <input type="text" class="form-control" name="email" style="width:350px" placeholder="Student's Email Id" required>
        <div class="error"><?php echo $emailerror;?></div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-12">  </div>
                              
                               <div class="col-md-8 col-sm-4 col-xs-12">       
                                   <button type="submit" class="btn btn-success btn-block" name="submit"  >Submit</button></div>
           </div>
    </div>
    </div>
    <br><br>
        </form>
</div>











	<?php
        include'footer.php';
        ?>
   
   </body>
    </html>