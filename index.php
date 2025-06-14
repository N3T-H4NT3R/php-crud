<?php

require "./config/config.php";

$uname = "";
$pwd = "";

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $uname = $_POST["uname"];
    $pwd = $_POST["pwd"];

    if (empty($uname) || empty($pwd)){
        $msg = "Username and Password are Mandatory !";
    }else{
        $sql = "SELECT * FROM user_login WHERE username='$uname' AND password='$pwd'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1){
            header("Location: ./pages/home.php");
        }else{
            $msg = "Username or Password Incorrect !";
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
    <title>Log In</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <div class="container">

        <div class="login-signup-form">

            <form action="./index.php" method="post">
                <h1>Log In Here</h1>
                <p><?php print($msg); ?></p>
                
                <div class="user-form">
                    <span>Username</span>
                    <input type="text" name="uname">
                </div>

                <div class="user-form">
                    <span>Password</span>
                    <input type="password" name="pwd">
                </div>

                <div class="user-form">
                    <input type="submit" value="Log In">
                    <a href="" class="flex-vsion">Forget Password</a>
                    <span>if you don't have an account <a href="./pages/signup.php">Sign UP</a></span>
                </div>
                
            </form>
            
        </div>

    </div>
</body>
</html>