<?php
                include 'database.php';
                      $message="";
                   
                     

                      $Subname=$_GET['Subname'];
                     $result = mysqli_query($conn ,"Delete from allosub where Subname='$Subname'");
           if($result==FALSE)
      {
         yourErrorHandler(mysqli_error($mysqli));
      }
      
else
{
   header("location:editsub.php"); 
}

?>
