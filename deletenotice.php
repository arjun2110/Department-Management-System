<?php
                     include 'database.php';
                      $message="";
                   
                    


   $data=$_GET['filename'];
    $dir = "testupload";
$dirHandle = opendir($dir);
    while ($file = readdir($dirHandle)) {
                                         if($file==$data) {
                                                    unlink($dir.'/'.$file);
                                         }
    }
                     $result = mysqli_query($conn ,"Delete from files where filename='$data'");
                    
 if($result==FALSE)
      {
         yourErrorHandler(mysqli_error($mysqli));
      }
      
else
{
   header("location:uploadf.php"); 
}

?>
