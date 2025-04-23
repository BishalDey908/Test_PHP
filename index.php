<?php
$server = 'localhost';
$username = "root";
$password="";
$dbname = "student_data_info";

$con = mysqli_connect($server,$username,$password,$dbname);

if(!$con){
    die("Connection to the database error" .mysqli_connect_error());
}

echo "Connection Established Success";

$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Roll = $_POST['Roll']; 

$sql = "INSERT INTO `students_info` (`Name`, `Email`, `Roll`) VALUES ('$Name', '$Email', '$Roll');";


if($con ->query($sql) == true){
    echo "Data Inserted Success";
    $isSubmit = true;
}else{
    echo "Error inserting data: " . $con->error;
}

$con ->close();

?>