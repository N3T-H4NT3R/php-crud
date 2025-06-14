<?php

require "../../config/config.php";

$tech_id = "";
$fname = "";
$sex = "";
$age = "";
$department = "";

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $tech_id = $_POST["tech_id"];
    $fname = $_POST["fname"];
    $sex = $_POST["sex"];
    $age = $_POST["age"];
    $department = $_POST["department"];

    if (empty($tech_id) || empty($fname) ||empty($sex) ||empty($age) || empty($department)){
        $msg = "All Fields are Mandatory !";
    }else{
        $sql = "INSERT INTO teachers (tech_id, fullname, age, sex, department)
        VALUES('$tech_id', '$fname', '$age', '$sex', '$department')";

        if ($conn->query($sql)){
            header("Location: ./teacher.php");
        }else{
            $msg = "Somethongs went Wrong !";
        }
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Teacher</title>
    <link rel="stylesheet" href="../../css/form.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/main.css">
</head>
<body>
    <div class="container">

        <div class="login-signup-form">

            <form action="./add.php" method="post">
                <h1>Add New Teacher</h1>
                <p><?php print($msg); ?></p>
                
                <div class="user-form">
                    <span>Teacher ID</span>
                    <input type="text" name="tech_id">
                </div>
                
                <div class="user-form">
                    <span>Fullname</span>
                    <input type="text" name="fname">
                </div>
                
                <div class="user-form">
                    <span>Gender</span>
                    <input type="text" name="sex">
                </div>
                
                <div class="user-form">
                    <span>Age</span>
                    <input type="number" name="age">
                </div>
                
                <div class="user-form">
                    <span>Department</span>
                    <input type="tex" name="department">
                </div>


                <div class="user-form">
                    <input type="submit" value="Add New Teacher">
                    <a href="./teacher.php" style="background-color: transparent; text-align: center; color: #000;">Back</a>
                </div>
                
            </form>
            
        </div>

    </div>
</body>
</html>