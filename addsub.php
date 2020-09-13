<?php
session_start();
 if(isset($_SESSION["Username"])) 
      {
$tag= "<center>Hello"." ".$_SESSION["Username"]." "."Sir</center>";
      }
      else
      {
          header('location:operator.php');
      }
      ?>
<!doctype HTML>
<html>
    <head>
        <title>Add Subject</title>
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
                  
                  <li><a href = "ologin.php">Home</a></li>
                   <li><a href = "editstaff.php">Edit staff</a></li>
                  <li class="dropdown">
                  <a href ="#" class="dropdown-toggle" data-toggle="dropdown">Student<b class="caret"></b></a> 
                   <ul class="dropdown-menu">
                   
                         <li><a class="hidden-sm hidden-xs" href = "excelstu.php">Add Through Excel Sheet</a></li>
                         <li><a href ="addstu.php" >Add Manually</a></li>
                         <li><a href ="editstu.php">Edit Details</a></li>
                     </ul>
                                     
                   
                       
                  <li class = "active" class = "dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle = "dropdown">Subject<b class="caret"></b></a>
                     <ul class="dropdown-menu">
                       
                         <li><a href = "allosub.php">Allocate subject</a></li>
                         <li><a href = "editsub.php">Edit Details</a></li>
                         <li class = "active"><a href = "addsub.php">Add subject</a></li>
                     </ul>
                                   
                   <li><a href = "ologout.php">Log out</a></li>
                 
              </ul>
              
          </div>
      </div>
       
   </div>    
   
   
</body>
</html>
    
            <?php
          include 'database.php';
            $msg='';
       echo  $tag;
              $sql;
                $coderror='';
   if(isset($_POST['submit']))
   {
               $subcode = $_POST['subcode'];
               $subname = strtoupper($_POST['subname']);
               $scheme = $_POST['scheme'];
               $dept = $_POST['Dept_Select'];
               $sem =$_POST['sem'];

               $sql = "select Subcode from subject where Subcode='".$subcode."'";
               $result = mysqli_query($conn,$sql);
                if((mysqli_affected_rows($conn)>0)||(strlen($subcode) != 5))
                {
                    
                    if(mysqli_affected_rows($conn)>0)
               {
                    echo '<script language="javascript">';
                    echo 'alert("Subject already exists!");';
                    echo '</script>';
               }
                  if(strlen($subcode) != 5)
                  {
                      $coderror="Subject code must be of 5 digits";
                  }
                }
               else
               {
                    $sql = "insert into subject values('".$subcode."','".$subname."','".$scheme."','".$dept."','".$sem."')";
                    mysqli_query($conn, $sql);
                    $msg='Data inserted successfully'; 
               }
   }
               
            ?>
            <div class="container">
   <div class="row">
       <div class="col-md-4 col-sm-4 col-xs-12"></div>
       
   <div class="col-md-4 col-sm-4 col-xs-12">
                         <!---form start-->
<form class="" form action="" method="post" >
                   
        <?php 
                 if(!empty($msg)) 
                  { ?> <div class="alert alert-success alert-dismissible fade in"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                <?php   echo $msg; ?> </div><?php } ?>
                
            
           <div class="col-md-12 text-center">
               <fieldset>  <legend><h2>ADD SUBJECTS</h2></legend> <p></p>
          <p></p></div>

            <div class="form-group">

                
     <label  name="Subcode">Subject code</label><label>*:</label>
     <input id="1" type="number" class="form-control" name="subcode" placeholder="Enter Subject code" required>
                    <div class="error"><?php echo $coderror ; ?></div>
                    </div>
           
            
             
                 <div class="form-group">

                
     <label  name="Subname">Subject name</label><label>*:</label>
     <input id="2" type="text" class="form-control" name="subname" placeholder="Enter Subject name" required>
                   
                    </div>
               
                
                 
                
                                                <div class="form-group">

                
     <label  name="Scheme" >Scheme</label><label>*:</label>
       <select id="3" name="scheme" style="width:350px" class="form-control" required>
           
                <option value="" selected disabled>Select Scheme</option>
              <option value="A">A</option>
              <option value="C">C</option>
              <option value="G">G</option>
              <option value="H">H</option>
              <option value="I">I</option>
       </select></div>       
         
                   
                    
                     
                      
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
       <select id="5" name="sem" style="width:350px" class="form-control" required>
         
                <option value="" selected disabled>Select Semester</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
       </select></div>
                                                
      
                     
 
                      <div class="col-md-2 col-sm-4 col-xs-12">  </div>
                              
                               <div class="col-md-8 col-sm-4 col-xs-12">       
                                   <button type="submit" class="btn btn-success btn-block" name="submit"  >Submit</button></div>
        </form></div>
                     </div>
</div></div>


	<?php
        include'footer.php';
        ?>
   
   </body>
    </html>