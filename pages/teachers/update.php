<?php

require "../../config/config.php";


if (isset($_GET["id"])){
    $id = $_GET["id"];

    $sql = "SELECT * FROM teachers WHERE tech_id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $tech_id = $row["tech_id"];
    $fname = $row["fullname"];
    $age = $row["age"];
    $sex = $row["sex"];
    $department = $row["department"];
}

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST["tech_id"])){

        $id = $_POST["id"];

        $tech_id = $_POST["tech_id"];
        $fname = $_POST["fname"];
        $sex = $_POST["sex"];
        $age = $_POST["age"];
        $department = $_POST["department"];

        if (empty($tech_id) || empty($fname) ||empty($sex) ||empty($age) || empty($department)){
            $msg = "All Fields are Mandatory !";
        }else{
            $sql = "UPDATE teachers SET
            tech_id='$tech_id',
            fullname='$fname',
            age='$age',
            sex='$sex',
            department='$department'
            WHERE tech_id='$id'";

        if ($conn->query($sql)){
            header("Location: ../teacher.php");
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
    <title>Update Teacher</title>
    <link rel="stylesheet" href="../../../css/form.css">
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="../../../css/main.css">
</head>
<body>
    <div class="container">

        <div class="login-signup-form">

            <form action="./update.php" method="post">
                <input type="hidden" name="id" value="<?php print($tech_id); ?>">
                <h1>Update Teacher</h1>
                <p><?php print($msg); ?></p>
                
                <div class="user-form">
                    <span>Teacher ID</span>
                    <input type="text" value="<?php print($tech_id); ?>" name="tech_id">
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
                    <span>Age</span>
                    <input type="number" value="<?php print($age); ?>" name="age">
                </div>
                
                <div class="user-form">
                    <span>Department</span>
                    <input type="text" value="<?php print($department); ?>" name="department">
                </div>


                <div class="user-form">
                    <input type="submit" value="Update Teacher">
                    <a href="../teacher.php" style="background-color: transparent; text-align: center; color: #000;">Back</a>
                </div>
                
            </form>
            
        </div>

    </div>
</body>
</html>