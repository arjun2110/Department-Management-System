  <?php
session_start();
                 include 'database.php';

  if(isset($_SESSION["User"]))
      {
$tag= "<center>Hello"." ".$_SESSION["Name"]." "."</center>";
      }
      else
      {
          header('location:staff.php');
      }
      ?>
<html>
    <head>
        <title>manage fee</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="css/footer-basic-centered2.css" type="text/css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


   
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
                   <li><a href = "addstu2.php">Add student</a></li>
                               <li><a href = "editstu2.php">Edit student</a></li><li class="active"><a href = "managefee.php">Manage fee</a></li>
                  
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
 
 
 
             <?php
include 'database.php';
$message="";
echo $tag;
     
?>
 <div class="container">
  <div class="row">
       <div class="col-md-4 col-sm-4 col-xs-12"></div>
       
   <div class="col-md-4 col-sm-4 col-xs-12">
           
            <div class="col-md-12 text-center">
                <fieldset>  <legend><h2>Fees activity</h2></legend> <p></p>
          <p></p></div>
               
      <form class="" form action="" method="post">
        <div class="controls form-group">
        <label>Semester</label> 
         
    <select name="dept_select" id="dept" class="form-control" style="width:350px">
        <option value="" selected>Select Semester</option>  
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
    </select>
          </div>
  
 
                    
            <button type="submit" name="submit" class="btn btn-success btn-block" style="width:350px" >Submit</button></div>
         <?php
                       if(isset($_POST['submit']))
      {         
         
    ?>
            <table class="table table-bordered">
                <thead>
                        <tr>
                        <th>Name</th>
                     <th>Department</th>
                    <th>Sem</th>

                       <th>UID</th>
                       
                        </tr> 
                      </thead>
                   <?php
              include 'database.php';

                           $sem=$_POST['dept_select'];
                 $sql = "select Name,Dept,Sem,UID from student  where Dept= '".$_SESSION['Dept']."' and Sem='$sem'";
               $result = mysqli_query($conn, $sql);
             if ($result) {
   


        while( $row = mysqli_fetch_array($result) )
                    {
                    ?>
                        <tr>
                        <td><?php echo $row["Name"]; ?></td>
                        <td><?php echo $row["Dept"]; ?></td>
                       
                        <td><?php echo $row["Sem"]; ?></td>
                     
                        <td><?php echo $row["UID"]; ?></td>
                      
                        </tr>
                    <?php
                    }
                }else
                    echo "<center>".""."</center>";
                ?>
            </table>
            
    <?php    }    ?>
       </div></div>
       

 

	<?php
        include'footer.php';
        ?>
   
   </body>
    </html>
    