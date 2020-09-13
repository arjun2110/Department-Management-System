       <?php
include 'database.php';
include 'database2.php';

     


if(isset($_POST["semid"]) && !empty($_POST["semid"])){
    //Get all student data
   


    
    $sql= "SELECT * FROM student WHERE Sem = ".$_POST["semid"]."";
     $results=mysqli_query($conn,$sql);
    //Count total number of rows
   
    
    //Display list
   
        echo '<option value="">Select student</option>';
        while($row = mysqli_fetch_assoc($results)){ 
            echo '<option value="'.$row['UID'].'">'.$row['UID'].'</option>';
        }
    
}






if(isset($_POST["semid1"])){
    //Get all subject data


     $sql="SELECT * FROM subject WHERE Sem=".$_POST["semid1"]."";
    
    //Count total number of rows
     $results = mysqli_query($conn, $sql);

     
               if(mysqli_affected_rows($conn)>0)
               {
       
        while($row = mysqli_fetch_assoc($results)){ 
           echo htmlentities($row['Subname']); ?>
         <p>    <input type="text"  name="marks[]" value="" class="form-control" required="" placeholder="Enter marks out of 100" autocomplete="off"></p>
  <?php
        } 
    }else{
        echo 'subject not available';
    }
}

?>
        

      