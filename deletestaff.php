<?php
session_start();
          include 'database.php';

                      $Username=$_GET['Username'];
                     $result = mysqli_query($conn ,"Delete from staff where USERNAME='$Username'");
                  
  if($result==FALSE)
      {
         yourErrorHandler(mysqli_error($mysqli));
      }
      
else
{
   header("location:editstaff.php"); 
}

?>
