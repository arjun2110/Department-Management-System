<!doctype HTML>
<html>
    <head>
        <title>Contact us</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="css/contact2.css" type="text/css" rel="stylesheet">
   

      

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
   <script src="js/bootstrap.js"></script>
   
 <link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans|Squada+One|Quando" rel="stylesheet">
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
                  
               <li class="active"><a href = "contactus.php">Contact</a></li>
                  <li><a href = "index.php">Back</a></li>  
         
              
              </ul>
          </div>
      </div>
       
   </div>    

<?php           
                
                if(isset($_POST['submit']))
                
                {
               
                $email=$_POST['email'];
                $name=$_POST['name'];
               
                $to="mgmcetmumbai@gmail.com";
                $subject=$_POST['subject'];
               $message=$_POST['comment'];
                $headers="From:$email<$email>";
                if(mail($to, $subject,$message,$headers))
                {
                    $msg='Thank You For Contacting Us';
                }
                else
                {
                    echo "please try again";
                    
                }
                }
                ?>
          
                

           
            <div class="container">
                             <?php 
              if(!empty($msg)) 
                  { ?> <div class="alert alert-success alert-dismissible fade in"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                <?php   echo $msg; ?> </div><?php } 
                ?>
          
       <h1>Let's Keep In Touch!</h1>
       <p class="tagline">Thank you for visiting our little slice of internet.If you would like to get into contact with our team simply  fill the following form.Cheers!</p>
                
            <br>
              
               
                <div class="row">
                    <div class="col-md-5 col-sm-4 col-xs-12">
          
   

       <form action="contactus.php" method="post">
           
          <div class="form-group">
   <span class="glyphicon glyphicon-user"></span>
    <label for="Name">Full Name</label>
    <input type="text" class="form-control" name="name" placeholder="Name" required>
  </div>
           
                      <div class="form-group">
   <span class="glyphicon glyphicon-envelope"></span>
  
    <label for="Name">Email Id</label>
    <input type="text" class="form-control" name="email" placeholder="example@gmail.com" required>
           </div>
           
         <div class="form-group">
              <span class="glyphicon glyphicon-question-sign"></span>
    <label for="Name">Subject</label>
   
    <input type="text" class="form-control" name="subject" placeholder="what's up?" required>
           </div>
           
           
     <div class="form-group">
     <span class="glyphicon glyphicon-pencil"></span>
  <label for="comment">Message</label>
  <textarea name="comment" class="form-control" rows="5" id="comment" placeholder="what's in your mind?" required></textarea>
</div>
           
            <div class="control-group">
             <div class="controls">
             <button name="submit"  type="submit" class="btn btn-success">Send Message</button>
                </div>
                
           </div>

           
           
       </form>
           
            </div>    
               
                 <div class="col-md-5 col-sm-4 col-xs-12">
             
                <div class="well">
                  
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3772.0755481166866!2d73.10246911405261!3d19.016392358786998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7e9cc90bd80b7%3A0xdf4fc9424f9d7f73!2sMGM%20College%20of%20Engineering!5e0!3m2!1sen!2sin!4v1569476503051!5m2!1sen!2sin" width="100%" height="300" frameborder="0" style="border:0;"></iframe>
                </div>
               </div>
       

               
                </div>
                
                
            </div>
               
          
          
          
          
          
          
          
          

        </div>
         </div>
	<?php
        include'footer.php';
        ?>
   
   </body>
    </html>