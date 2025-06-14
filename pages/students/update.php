<?php

require "../../config/config.php";


if (isset($_GET["id"])){
    $id = $_GET["id"];

    $sql = "SELECT * FROM students WHERE stud_id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $stud_id = $row["stud_id"];
    $fname = $row["fullname"];
    $age = $row["age"];
    $sex = $row["sex"];
    $year = $row["year"];
}

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST["stud_id"])){

        $id = $_POST["id"];

        $stud_id = $_POST["stud_id"];
        $fname = $_POST["fname"];
        $sex = $_POST["sex"];
        $age = $_POST["age"];
        $year = $_POST["year"];

        if (empty($stud_id) || empty($fname) ||empty($sex) ||empty($age) || empty($year)){
            $msg = "All Fields are Mandatory !";
        }else{
            $sql = "UPDATE students SET
            stud_id='$stud_id',
            fullname='$fname',
            age='$age',
            sex='$sex',
            year='$year'
            WHERE stud_id='$id'";

        if ($conn->query($sql)){
            header("Location: ../student.php");
        }else{
            $msg = "Somethongs went Wrong !";
            }
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
    <title>Update Student</title>
    <link rel="stylesheet" href="../../../css/form.css">
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="../../../css/main.css">
</head>
<body>
    <div class="container">

        <div class="login-signup-form">

            <form action="./update.php" method="post">
                <input type="hidden" name="id" value="<?php print($stud_id); ?>">
                <h1>Update Student</h1>
                <p><?php print($msg); ?></p>
                
                <div class="user-form">
                    <span>Student ID</span>
                    <input type="text" value="<?php print($stud_id); ?>" name="stud_id">
                </div>
                
                <div class="user-form">
                    <span>Fullname</span>
                    <input type="text" value="<?php print($fname); ?>" name="fname">
                </div>
                
                <div class="user-form">
                    <span>Gender</span>
                    <input type="text" value="<?php print($sex); ?>" name="sex">
                </div>
                
                <div class="user-form">
                    <span>Student Age</span>
                    <input type="number" value="<?php print($age); ?>" name="age">
                </div>
                
                <div class="user-form">
                    <span>Year</span>
                    <input type="number" value="<?php print($year); ?>" name="year">
                </div>


                <div class="user-form">
                    <input type="submit" value="Update Student">
                    <a href="../student.php" style="background-color: transparent; text-align: center; color: #000;">Back</a>
                </div>
                
            </form>
            
        </div>

    </div>
</body>
</html>