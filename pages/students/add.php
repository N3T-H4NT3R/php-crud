<?php

require "../../config/config.php";

$stud_id = "";
$fname = "";
$sex = "";
$age = "";
$year = "";

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $stud_id = $_POST["stud_id"];
    $fname = $_POST["fname"];
    $sex = $_POST["sex"];
    $age = $_POST["age"];
    $year = $_POST["year"];

    if (empty($stud_id) || empty($fname) ||empty($sex) ||empty($age) || empty($year)){
        $msg = "All Fields are Mandatory !";
    }else{
        $sql = "INSERT INTO students (stud_id, fullname, age, sex, year)
        VALUES('$stud_id', '$fname', '$age', '$sex', '$year')";

        if ($conn->query($sql)){
            header("Location: ./student.php");
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
    <title>Add New Student</title>
    <link rel="stylesheet" href="../../css/form.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/main.css">
</head>
<body>
    <div class="container">

        <div class="login-signup-form">

            <form action="./add.php" method="post">
                <h1>Add New Student</h1>
                <p><?php print($msg); ?></p>
                
                <div class="user-form">
                    <span>Student ID</span>
                    <input type="text" name="stud_id">
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
                    <span>Student Age</span>
                    <input type="number" name="age">
                </div>
                
                <div class="user-form">
                    <span>Year</span>
                    <input type="number" name="year">
                </div>


                <div class="user-form">
                    <input type="submit" value="Add New Student">
                    <a href="./student.php" style="background-color: transparent; text-align: center; color: #000;">Back</a>
                </div>
                
            </form>
            
        </div>

    </div>
</body>
</html>