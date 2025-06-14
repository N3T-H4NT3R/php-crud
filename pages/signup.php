<?php

require "../config/config.php";

$uname = "";
$email = "";
$phone = "";
$pwd = "";
$pwd2 = "";

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $uname = $_POST["uname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $pwd = $_POST["pwd"];
    $pwd2 = $_POST["pwd2"];

    if (empty($uname) || empty($email) ||empty($phone) ||empty($pwd) || empty($pwd2)){
        $msg = "All Fields are Mandatory !";
    }else{
        if($pwd != $pwd2){
            $msg = "Two Passwords are Not Match !";
        }else{
            $sql = "INSERT INTO user_login (username, email, phone, password)
            VALUES('$uname', '$email', '$phone', '$pwd')";

            if ($conn->query($sql)){
                header("Location: ../index.php");
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
    <title>Sign UP</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <div class="container">

        <div class="login-signup-form">

            <form action="./signup.php" method="post">
                <h1>Sign UP Here</h1>
                <p><?php print($msg); ?></p>
                
                <div class="user-form">
                    <span>Username</span>
                    <input type="text" name="uname">
                </div>
                
                <div class="user-form">
                    <span>Email Address</span>
                    <input type="email" name="email">
                </div>
                
                <div class="user-form">
                    <span>Phone Number</span>
                    <input type="number" name="phone">
                </div>

                <div class="user-form">
                    <span>Password</span>
                    <input type="password" name="pwd">
                </div>

                <div class="user-form">
                    <span>Comfirm</span>
                    <input type="password" name="pwd2">
                </div>

                <div class="user-form">
                    <input type="submit" value="Sign UP">
                    <span>if you have an account <a href="../index.php">Log In</a></span>
                </div>
                
            </form>
            
        </div>

    </div>
</body>
</html>