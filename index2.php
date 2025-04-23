<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            width: 100px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<?php
$isSubmit = false;

if(isset($_POST["Name"])){
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
        // echo "Data Inserted Success";
        $isSubmit = true;
    }else{
        echo "Error inserting data: " . $con->error;
    }
    
    $con ->close();
}

?>
    
    <h1>Student Registration</h1>
    <form action="index2.php" method="post">
        <div>
            <label for="name">Name:</label>
            <input type="text" name="Name" id="name" required>
        </div>
        
        <div>
            <label for="email">Email:</label>
            <input type="email" name="Email" id="email" required>
        </div>
        
        <div>
            <label for="roll">Roll Number:</label>
            <input type="text" name="Roll" id="roll" required>
        </div>

        <input type="submit" value="Submit">
    </form>

    <?php
    if($isSubmit == true){
        echo "Form subimitted success!";
    }   
    ?>
</body>
</html>