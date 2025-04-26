<?php
$database = "student_data_info";
$server="localhost";
$username="root";
$password="";

$conn= mysqli_connect($server,$username,$password,$database);

if(!$conn){
    die("Database error".mysqli_connect_errno());
}else{
    echo "Connection successful!";
}

$sql="SELECT * FROM `students_info`";
$result = mysqli_query($conn,$sql);
$rowNum = mysqli_num_rows($result);
echo "<br>";
echo "Data found of $rowNum students";
echo "<br>Students Data:<br>";
if ($rowNum > 0) {
 while($row=mysqli_fetch_assoc($result)){
     echo $row["sl_no"] . " Hello" . $row["Name"] . "&nbsp;" . $row["Email"]. "&nbsp;" . $row["Roll"];
     echo "<br>";
 }
}
?>