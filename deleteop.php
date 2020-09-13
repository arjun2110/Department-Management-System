<?php
      session_start();
      if(isset($_SESSION["username"])) 
      {
       $tags_head= "<center>Hello"." ".$_SESSION["username"]." "."</center>";
      }
      else
      {
          header('location:admin.php');
      }
    ?>
<!doctype HTML>

<html>
    <head>
        <title>Add Operator</title>
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
              <a href="#" class="pull-left"><img src="img/bvit.png"></a>
              
         <button class = "navbar-toggle" data-toggle = "collapse" data-target=".navHeaderCollapse">
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>

         </button>
            </div>
             <div class="collapse navbar-collapse navHeaderCollapse">
             
                <ul class = "nav navbar-nav navbar-right">
                  
                 <li><a href = "alogin.php">Home</a></li>
                 
                  <li><a href = "stafffeed.php">Staff Feedback</a></li>
                 
                     <li><a href = "amanage.php">Other Feedback</a></li>
                 
                                     
                   
                  <li  class="active" class = "dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle = "dropdown">Operator<b class="caret"></b></a>
                     <ul class="dropdown-menu">
                         
                         <li><a href = "addop.php">Add Operator</a></li>
                         <li class="active"><a href = "deleteop.php">Edit Operator</a></li>
                        
                     </ul>
                                   
                   <li><a href = "alogout.php">Log out</a></li>
                 
              </ul>
              
          </div>
      </div>
       
   </div>    
   
   
</body>
</html>



    <?php
 include 'database.php';
                $msg='';
         echo $tags_head;    
             
  
                    
               
    

    ?>
                  
<div class="container-fluid">
   <div class="row">
   <div class="col-md-4 col-sm-6 col-xs-12"></div>
    <div class="col-md-4 col-sm-6 col-xs-12">
                   <!---form start-->
<form class="" form action="" method="post" >
             
      
                
                  
            <div class="col-md-12 text-center">
      <fieldset>  <legend><h2>DELETE OPERATOR<h2></legend> <p></p>
          <p></p></div>
                 <form class="" form action="" method="post">
                   <?php 
                 if(!empty($msg)) 
                  { ?> <div class="alert alert-success alert-dismissible fade in"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                <?php   echo $msg; ?> </div><?php } ?>
      
                     
                     
                     
             
        <div class="controls form-group">
        <label>Department</label> 
         
     <?php    
         
       include 'database.php';
    $results=mysqli_query($conn, "SELECT * FROM operator");
    //Count total number of rows
    $rowCount =  $results->num_rows;
    ?>
    <select name="dept_select"  class="form-control" style="width:350px" onchange="getId(this.value)">
        <option value="">Select Department</option>
        <?php
        if($rowCount > 0){
            while($row = mysqli_fetch_assoc($results)){ 
                echo '<option value="'.$row['Username'].'">'.$row['Dept'].'</option>';
            }
        }else{
            echo '<option value="">Department not available</option>';
        }
        ?>
    </select>
          </div>            
                     
                     
         
                     
                     
                      <div class="controls form-group">
      
            <label>Username</label>
            
            <select name="Username_select" id="User"  class="form-control" style="width:350px" >
                <option>Select Department First</option>
            </select>
            </div>
                 
         
      
  
        <div class="col-md-1 col-sm-4 col-xs-12">  </div>
                              
                               <div class="col-md-8 col-sm-4 col-xs-12">       
                                   <button type="submit" class="btn btn-danger btn-block" name="submit"  >Remove</button>
                                   </div>
           </div>
    </div>
    </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    
       <script type="text/javascript">
        function getId(val){
            //We create ajax function
            $.ajax({
                type: "POST",
            
                data: "Username="+val,
                success: function(data){
                    $("#User").html(data);
                }
              
            });
        }
                
    </script>
         <?php
                  include 'database.php';
 if (!empty($_POST["Username"])) {
        $user = $_POST['Username']; 
    
        $results = mysqli_query($conn, "SELECT * FROM operator WHERE Username='$user'");
        $rowCount =  $results->num_rows;
         if($rowCount > 0){
             
        while($row = mysqli_fetch_assoc($results)){ 
?>
            <option value="<?php echo $row["Username"];?>"><?php echo $row["Username"];?>
    </option>       
<?php
        }
         }else{
        echo '<option>Operator not available</option>';
    }
    }

?>




         
       






<?php
                
                

               if(isset($_POST['submit']))
               {
                    
                    $username = $_POST['Username_select'];
                   
                   
                    $result = mysqli_query($conn, "delete from operator where Username = '".$username."'");
                
                
                $msg='Data Deleted successfully';
                
               }
                ?>
               
	<?php
        include'footer.php';
        ?>
   
   </body>
    </html>