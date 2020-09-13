
<html>
    <head>
        <title>:::::::Welcome::::::</title>
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
     


  <form action ="" method="post">
    <?php

                $msg='';
           
             
      
      $emailerror1="";
      $emailerror2="";
               if(isset($_POST['submit']))
               {
                    
                    $name = $_POST['name'];
                   
                   
                
                    
                  
                    $femail = test_input($_POST['femail']);
                  $temail = test_input($_POST['temail']);
                   
                    $to=$temail;
                    $subject=$_POST['subject'];
                  
                    $headers="From:$name<$femail>";
               
                    if((!filter_var($femail, FILTER_VALIDATE_EMAIL))||(!filter_var($temail, FILTER_VALIDATE_EMAIL)))
                    {
                    
                    if (!filter_var($femail, FILTER_VALIDATE_EMAIL)) 
                    {
                    $emailerror1 = "Invalid email format"; 
                    }
                  if (!filter_var($temail, FILTER_VALIDATE_EMAIL)) 
                    {
                    $emailerror2 = "Invalid email format"; 
                    }
                    }
                    else
                    {
                   
                        
                        
                        $message=$_POST['message'];
                         mail($to, $subject,$message,$headers);
                $msg='Mail Sent successfully';
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
      <fieldset>  <legend><h2>Send mail<h2></legend> <p></p>
          <p></p></div>
               
                        <div class="form-group">

         <label  name="Email">from</label><label>*:</label>
     <input type="text" class="form-control" name="femail" style="width:350px" placeholder="from@gmail.com" required>
        <div class="error"><?php echo $emailerror1;?></div>
        </div>
            <div class="form-group">

         <label  name="Name" for="Name">Header Name</label><label>*:</label>
     <input id="1" type="text" class="form-control"  name="name" placeholder="example" required>
                    </div>
                  <div class="form-group">

         <label  name="Email">to</label><label>*:</label>
     <input type="text" class="form-control" name="temail" style="width:350px" placeholder="to@gmail.com" required>
        <div class="error"><?php echo $emailerror2;?></div>
        </div>
                   
                
         <div class="form-group">

         <label  name="Name" for="Name">Mail Subject</label><label>*:</label>
     <input id="1" type="text" class="form-control"  name="subject" placeholder="example w.r.e.f" required>
                    </div>
                 
                                           <div class="form-group">
  <label for="message">Message:</label>
  <textarea class="form-control" rows="5" name="message" required></textarea>
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


















  