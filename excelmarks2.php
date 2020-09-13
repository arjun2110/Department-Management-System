<?php
session_start();
                 include 'database.php';

  if(isset($_SESSION["User"]))
      {
$tag= "<center>Hello"." ".$_SESSION["Name"]." "."</center>";
      }
      else
      {
          header('location:staff.php');
      }
      ?>
<html>
    <head>
        <title>upload marks</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="css/footer-basic-centered2.css" type="text/css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


   
  <link href='https://fonts.googleapis.com/css?family=Quattrocento+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
 


      
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
                  
                  <li><a href = "sflogin.php">Home</a></li>
                  
                  <li class = "active"><a href = "excelmarks.php">Upload marks</a></li>
                  
                       <li class="dropdown">
                  <a href ="#" class="dropdown-toggle" data-toggle="dropdown">Upload<b class="caret"></b></a> 
                   <ul class="dropdown-menu">
                   
                          <li class = "active"><a href = "uploadf.php">Upload file</a></li>
                             <li><a href = "deletef.php">Delete file</a></li>
                               </ul>     
                   <li><a href="sflogout.php">Log out</a></li>
                 
              
              </ul>
          </div>
      </div>
       
   </div>    
 
 
 
 
 
 
            <?php
             include 'database.php';
             include 'database2.php';
             echo $tag;
              $sql;
 

              
if(isset($_POST['submit']))
{
    $marks=array();
$sem=$_POST['sem'];
$UID=$_POST['student']; 

    $mark = filter_input(INPUT_POST,'marks');
 $stmt = $dbh->prepare("SELECT Subname,Sem FROM subject WHERE Sem=:seid");
 $stmt->execute(array(':seid' => $sem));
  $sid1=array();
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {

array_push($sid1,$row['Subname']);
     print_r($sid1);
     print_r($mark);
   } 
  
for($i=0;$i<count($mark);$i++){
    $mar=$mark[$i];
  $sid=$sid1[$i];
$query=$dbh->prepare("INSERT INTO result(Name,Sem,Subname,marks) VALUES(:UID,:sem,:subname,:marks)");

$query->bindParam(':UID',$UID);
$query->bindParam(':sem',$sem);
$query->bindParam(':subname',$sid);
$query->bindParam(':marks',$mar);
$query->execute();

}
}
?>
              
              
               
           
            <div class="container">
   <div class="row">
      <div class="col-md-12 text-center">
               <fieldset>  <legend><h2>Declare Result</h2></legend> <p></p>
          <p></p></div>
       <div class="col-md-1 col-sm-6 col-xs-12"></div>
        
   <div class="col-md-4 col-sm-6 col-xs-12">
     

                  
                   
                   <?php
                    if(!empty($msg)) 
                  { ?> <div class="alert alert-success alert-dismissible fade in"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                <?php   echo $msg; ?> </div><?php } ?>
        <form class="" form action="" method="post">
   
                    
                   
            
        
                    
                     <div class="controls form-group">
	   
             <label>Department</label>
 <?php
         
         $sql = "SELECT DEPARTMENT FROM staff where DEPARTMENT= '".$_SESSION['Dept']."'";
                     $result = mysqli_query($conn, $sql);
?>
           <select id="2" name="Dept_Select"  class="form-control" required>
  <?php     
       
            while($row = mysqli_fetch_assoc($result)) {
       
         echo '<option value="'.$row['DEPARTMENT'].'">'.$row['DEPARTMENT'].'</option>';
}?>

</select>
                     </div>

                           		   
   
           
                        
      
                         
                                                       
       <div class="controls form-group">
	    <label id="" name="sem"  class="">Semester</label><label>*:</label>
                 
 <?php
         
         $sql = "SELECT * FROM semester";
                     $result = mysqli_query($conn, $sql);
            $rowCount =  $result->num_rows;
?>
            <select name ="sem" required id="semid" class="form-control seid" onChange="getStudent(this.value);">
    
           <option value="">Select Sem</option>;
     
        <?php
        if($rowCount > 0){  
             
                           while($row = mysqli_fetch_assoc($result)) {
       
         echo '<option value="'.$row['semid'].'">'.$row['sem'].'</option>';
}
          
        }else{
            echo '<option value="">Semester not available</option>';
          
        }
               ?>


</select>

                 </div> 
                       
                        
                        
                        
                   
                                                       
       <div class="controls form-group">
	    <label id="" name="UID"  class="">Student UID</label><label>*:</label>
                 
 <?php
         
         $sql = "SELECT * FROM student";
                     $result = mysqli_query($conn, $sql);
            $rowCount =  $result->num_rows;
?>
            <select name ="student" required id="studentid" class="form-control stid" onChange="getresult(this.value);">
    
           <option value="">Select Student</option>;
     
        <?php
        if($rowCount > 0){  
             
                           while($row = mysqli_fetch_assoc($result)) {
       
         echo '<option value="'.$row['UID'].'">'.$row['UID'].'</option>';
}
          
        }else{
            echo '<option value="">not available</option>';
        }
               ?>


</select>

                     
                        
                            <div class="form-group">
                                                      
                                                        <div class="col-sm-10">
                                                    <div  id="reslt">
                                                    </div>
                                                        </div>
                                                    </div>
                        
            
           </div> </div>  
                       
                  <div class="col-md-4 col-sm-6 col-xs-12">                    
                                                <div class="form-group">
                                                        <label for="date" class="control-label">Subjects:</label>
                                                     
                                                    <div id="subject">
                                                    </div>
                                                        </div>
                                                    </div>
           
       
                   
         
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
       
       
       
        <script>
function getStudent(val) {
    $.ajax({
    type: "POST",
    url: "sem.php",
    data:'semid='+val,
    success: function(data){
        $("#studentid").html(data);
        
    }
    });
$.ajax({
        type: "POST",
        url: "sem.php",
        data:'semid1='+val,
        success: function(data){
            $("#subject").html(data);
            
        }
        });
}
    </script>
<script>

function getresult(val,clid) 
{    
var clid=$(".seid").val();
var val=$(".stid").val();
var abh=seid+'$'+val;
//alert(abh);
    $.ajax({
        type: "POST",
        url: "sem.php",
        data:'studsem='+abh,
        success: function(data){
            $("#reslt").html(data);
            
        }
        });
}
</script>
        </div>
        
       
       
       
       
       
          </div>
        
 
                      <div class="col-md-4 col-sm-4 col-xs-12">  </div>
                              
                               <div class="col-md-4 col-sm-4 col-xs-12">       
                                   <button type="submit" class="btn btn-success btn-block" name="submit"  >Submit</button></div>
        </form></div>
                     </div>
</div></div>

 
 
 
 
 
 
 

	<?php
        include'footer.php';
        ?>
   
   </body>
    </html>