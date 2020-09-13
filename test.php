<form action="#file" method='post' enctype="multipart/form-data">
Description of File: <input type="text" name="description_entered"/><br><br>
<input type="file" name="file"/><br><br>
	
<input type="submit" name="submit" value="Upload"/>

</form>
<?php 
include 'database.php';
if(isset($_POST["submit"])){
$name= $_FILES['file']['name'];

$tmp_name= $_FILES['file']['tmp_name'];

$submitbutton= $_POST['submit'];

$position= strpos($name, "."); 

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension);

$description= $_POST['description_entered'];

if (isset($name)) {

$path= "testupload/";

if (!empty($name)){
if (move_uploaded_file($tmp_name, $path.$name)) {
echo 'Uploaded!';
}
}
}
}
?>


<?php
$dbDatabase = "feed";

$dbServer = "localhost";

$dbUser = "root";

$dbPass = "";
$conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbDatabase) or die('Unable To connect');

$table = "table"; 




if(!empty($description)){
$sql="INSERT INTO files (description, filename)
VALUES ('$description', '$name')";
    $result = mysqli_query($conn, $sql);
}


mysqli_close($conn);

?>

<?php
$dbDatabase = "feed";

$dbServer = "localhost";

$dbUser = "root";

$dbPass = "";
$conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbDatabase) or die('Unable To connect');
$table = "table"; 
 
// Connection to DBase 



$result= mysqli_query($conn, "SELECT description, filename FROM files ORDER BY ID desc");


print "<table border=1>\n"; 
while ($row = mysqli_fetch_array($result)){ 
$files_field= $row['filename'];
$files_show= "testupload/$files_field";
$descriptionvalue= $row['description'];
print "<tr>\n"; 
print "\t<td>\n"; 
echo "<font face=arial size=4/>$descriptionvalue</font>";
print "</td>\n";
print "\t<td>\n"; 
echo "<div align=center><a href='$files_show'>$files_field</a></div>";
print "</td>\n";
print "</tr>\n"; 
} 
print "</table>\n"; 

?> 
