<?php
session_start();
  include 'database.php';
if(isset($_SESSION["Username"])) 
      {
       
                       mysqli_query($conn,"update counter set count='1' where Username ='".$_SESSION['Username']."'");
                       mysqli_query($conn,"delete from temp_feed where Username = '".$_SESSION['Username']."'");
      }
session_destroy();
header("Location:student.php");

?>