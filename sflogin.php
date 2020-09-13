<?php
      session_start();
     if(isset($_SESSION["User"]))
      {
$tags_head= "Welcome"." ".$_SESSION["Name"];      }
      else
      {
          header('location:staff.php');
      }
    ?>
<!doctype HTML>
<html>
    <head>
        <title>Staff Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="css/footer-basic-centered.css" type="text/css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
   <script src="js/bootstrap.js"></script>
       <link href='http://fonts.googleapis.com/css?family=Josefin+Slab:400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Lily+Script+One' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Quattrocento:400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
     
       
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
 
                  <li class = "active"><a href = "sflogin.php">Home</a></li>

                   <li class="dropdown">
                  <a href ="#" class="dropdown-toggle" data-toggle="dropdown">Manage<b class="caret"></b></a> 
                   <ul class="dropdown-menu">
                   <li><a href = "addstu2.php">Add student</a></li>
                               <li><a href = "editstu2.php">Edit student</a></li>
                  
                               </ul>     
                       <li class="dropdown">
                  <a href ="#" class="dropdown-toggle" data-toggle="dropdown">Upload<b class="caret"></b></a> 
                   <ul class="dropdown-menu">
                   
                        <li><a href = "uploadf.php">Upload Notice</a></li>
                               <li><a href = "excelstu2.php">Upload student</a></li>
                               </ul>     
                     <li><a href = "sflogout.php">Log out</a></li>
                 
              
              </ul>
          </div>
      </div>
       
   </div>    
   
   
</body>
</html>

 
<div class="container-fluid">
    <div class="jumbotron">
  <h1 class='tag-line1'> <?php echo $tags_head ?> </h1>
  
  
  <h2 class='tag-line2' >----></h2>
  
</div>
</div>

	<?php
        include'footer.php';
        ?>
   
   </body>
    </html>
    
   
  
 




