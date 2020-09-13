<?php
session_start();
                    include 'database.php';

if(isset($_SESSION["User"]))
      {
$tag= "<center>Hello"." ".$_SESSION["Name"]." "."Sir</center>";
      }
      else
      {
          header('location:staff.php');
      }
      ?> 
<!doctype HTML>
<html>
    <head>
        <title>Read Comments</title>
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
                  
                  <li><a href = "sflogin.php">Home</a></li>
                  
                  <li><a href = "chfeeds.php">check feedback</a></li>
                    <li class = "active"><a href = "rdcmnts.php">read comments</a></li>
                                   
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
         
           <div class="col-md-3 col-sm-4 col-xs-12"></div>
            <div class="col-md-6 col-sm-4 col-xs-12"> 
             <form class="" form action="rdcmnts.php" method="post">
  <br>
    <div class="col-md-12 text-center">
        <legend><h3>Manage Staff Detail:</h3></legend> <p></p>
          <p></p></div>
        <div class="controls form-group">
            
       <?php
         $sql = "SELECT Subname from allosub where Teacher = '".$_SESSION['Name']."'";
            $result = mysqli_query($conn , $sql);  
            
      ?>
      <div class="control-group">
       <center> <select class="form-control" name ="Sub_Select" style="width:300px"></center> </div>
       <option value="">Select Subject</option> 
        <?php 
         
          while($row = mysqli_fetch_assoc($result)) {
  
             
           
           echo '<option value="'.$row['Subname'].'"';
              if (@$_POST['Sub_Select'] ==  $row['Subname']) echo 'selected="selected"';
 
    echo '>'.$row['Subname'].'</option>';
                
             
         }
          
echo '</select>';
             ?>
              <br></div>    <div class="control-group">
             <button name="submit" type="submit" class="btn btn-info btn-flat btn-lg center-block">Submit</button></div></div>
                 
           
            
    </div></div>
          <?php
          if(isset($_POST['submit'])){
              $sub_name = $_POST['Sub_Select'];
          
            $sql="select * from feedback_data where Subname='$sub_name'";
            $result = mysqli_query($conn, $sql); 
  ?>  
                 
          <br>
                   <table class="table table-bordered">
               
                  
                    <thead>
                     <tr>
                     <th>Anonymous</th>
                     <th>Comments</th>
                      </tr>
                     </thead>
                     <tbody>
                     <?php
                         $i=1;
           while( $row = mysqli_fetch_array($result) )
           { if($row['Eighth']!== ""){?>
                <tr>     
              <td><?php echo $i++ ?></td>
            <td><?php echo $row["Eighth"]; ?></td>
                         </tr>
                         

              
           <?php 
           }}
          }
           
           ?>
           
                      
                       </tbody>
</table>
           
           
      </div>     </div>
           
           
           
           
           
           
           
           
           
           
           
           

	<?php
        include'footer.php';
        ?>
   
   </body>
    </html>