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
      <?php
         include 'database.php'; 
         ?>

<!doctype HTML>
<html>
    <head>
        <title>View Staff Details</title>
      
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
                  
                  <li><a href = "ologin.php">Home</a></li>
                   <li class = "active"><a href = "editstaff.php">Edit staff</a></li>
                  <li class="dropdown">
                  <a href ="#" class="dropdown-toggle" data-toggle="dropdown">Student<b class="caret"></b></a> 
                   <ul class="dropdown-menu">
                   
                         <li><a class="hidden-sm hidden-xs" href = "excelstu.php">Add Through Excel Sheet</a></li>
                         <li><a href ="addstu.php" >Add Manually</a></li>
                         <li><a href = "editstu.php">Edit Details</a></li>
                     </ul>
                                     
                   
                  <li class = "dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle = "dropdown">Subject<b class="caret"></b></a>
                     <ul class="dropdown-menu">
                      
                         <li><a href = "allosub.php">Allocate subject</a></li>
                         <li><a href = "editsub.php">Edit Details</a></li>
                         <li><a href = "addsub.php">Add subjects</a></li>
                     </ul>
                                   
                   <li><a href = "ologout.php">Log out</a></li>
                 
              </ul>
              
          </div>
      </div>
       
   </div>   
  <?php echo $tag;?>
   <div class="container">
     
       <div class="row">
         
           <div class="col-md-3 col-sm-4 col-xs-12"></div>
            <div class="col-md-6 col-sm-4 col-xs-12"> 
   <form class="" form action="editstaff.php" method="post"><br>
    <div class="col-md-12 text-center">
        <fieldset>  <legend><h3>Manage Staff Detail:</h3></legend> <p></p>
          <p></p></div>
        
       </div>
     
     
    <?php
       
          $staff_name = filter_input(INPUT_POST,'Staff_Select');
    $sql = "SELECT * from staff where DEPARTMENT = '".$_SESSION['Dept']."'";
               $result = mysqli_query($conn, $sql);
           ?> <div class="form-group"> 
                 <input class="form-control" id="input" type="text" placeholder="Search..">
          <br></div>
          
                  <table class="table table-bordered">

                    <thead>
                     <tr>
                     <th>Name</th>
                     <th>Department</th>
                     <th>Gender</th>
                     <th>Email ID</th>
                     <th>Phone Number</th>
                     <th>Update</th> 
                     <th>Delete</th> 
                     </tr>
                     </thead>
                     <tbody id="myTable">
                     <script>
$(document).ready(function(){
  $("#input").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
           <?php
                if(mysqli_num_rows($result)===0){
        echo '<tr><td colspan="7"><center>No Data Found</center></td></tr>';
      }else{
        while( $row = mysqli_fetch_array($result) )
        {
            ?>
            <tr>     
<td><?php echo $row["Name"]; ?></td>
<td><?php echo $row["DEPARTMENT"]; ?></td>
<td><?php echo $row["GENDER"]; ?></td>
<td><?php echo $row["EMAIL_ID"]; ?></td>
<td><?php echo $row["PHONE_NUMBER"]; ?></td>
      
 <td><a  onclick="return confirm('Are you sure you want to update the entry..?')" href="updatestaff.php?Username=<?php echo $row['USERNAME']; ?>"class="btn btn-ptimary btn-warning">Update</a></td>
 
  <td> <a onclick="return confirm('Are you sure you want to delete the entry..?')" href="deletestaff.php?Username=<?php echo $row['USERNAME']; ?>"class="btn btn-ptimary btn-danger">Delete</a></td>     
      
      
       </tr>
       
        <?php  
        }
          }
       
                         ?>
   
     </table>
          
     

     
   
       </div></div></div></form></head>
	<?php
        include'footer.php';
        ?>
   
   </body>
    </html>

