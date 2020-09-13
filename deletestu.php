<?php
                     include 'database.php';
                      $message="";
                   
                      $UID=$_GET['UID'];
                     $result = mysqli_query($conn ,"Delete from student where UID='$UID'");
                  
 if($result==FALSE)
      {
         yourErrorHandler(mysqli_error($mysqli));
      }
      
else
{
   header("location:editstu.php"); 
}

?>
