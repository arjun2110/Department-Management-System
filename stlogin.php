






<?php
      session_start();
     if(isset($_SESSION["Username"]))
      {
$tags_head= "Welcome"." ".$_SESSION["Name"];      }
      else
      {
          header('location:student.php');
      }
    ?>
<html>
    <head>
        <title>Student Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="css/footer-basic-centered1.css" type="text/css" rel="stylesheet">
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
                  
                  <li class = "active"><a href = "stlogin.php">Home</a></li>
                  
              
              
                   
                                                        
        
                 
                                   
                   <li><a href = "stlogout.php">Log out</a></li>
                 
              
              </ul>
              
              
          </div>
      </div>
       
   </div>    
   
   
</body>
</html>

 
 

  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
   

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<div class="container-fluid">
 
  <div class="row content">
   
    <div class="col-sm-3 sidenav">
      <h4></h4>
      <ul class="nav nav-pills nav-stacked" id="nav">
         <li class="active"><a href="">Syllabus</a></li>
        <li><a href="deptnotice.php">Department Notice</a></li>
        
        
      </ul><br>
     
    </div>
  
      
      

         
         
          <div class="col-sm-9">
                      <div class="row">
             <br><br>
                <div class="col-md-3 hidden-phone">
                    
                </div>
                
                <div class="col-md-6" id="form-login">
                    <form class="form-container" action="" method="post" name="upload_excel" enctype="multipart/form-data">
                        <fieldset>
                    
                       <h3> <span class="glyphicon glyphicon-pushpin"></span>&nbsp<a href="pdf_server.php?file=syllabus/sem1">SEM I & II</a><br></h3>
                       
        <h3> <span class="glyphicon glyphicon-pushpin"></span> &nbsp<a href="pdf_server.php?file=syllabus/syllabus/sem1">SEM III & IV</a><br></h3>      
          <h3> <span class="glyphicon glyphicon-pushpin"></span>&nbsp<a href="pdf_server.php?file=syllabus/syllabus/sem1">SEM V & VI</a><br></h3>
          <h3> <span class="glyphicon glyphicon-pushpin"></span>&nbsp<a href="pdf_server.php?file=syllabus/sem1">SEM VI & VII</a><br></h3>
        
   
                        
                        </fieldset>
                    </form>
                </div>
                <div class="col-md-3 hidden-phone"></div>
            </div>
          </div>
        </div>
    </div>


	<?php
        include'footer.php';
        ?>
   
   </body>
    </html>






