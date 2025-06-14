<?php

require "../../config/config.php";

if (isset($_GET["query"])){

    $query = $_GET["query"];
    
    $sql = "SELECT * FROM students WHERE stud_id LIKE '%$query%'";
    $result = $conn->query($sql);
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/nav.css">
    <link rel="stylesheet" href="../../css/home.css">
    <title>School Management</title>
</head>
<body>

    <div class="container">

        <nav class="navbar">

            <div class="left-side">
                <ul>
                    <li><a href="./student.php">Students</a></li>
                    <li><a href="">Teachers</a></li>
                    <li><a href="">Course</a></li>
                    <li><a href="">Rooms</a></li>
                </ul>
            </div>
            
            <div class="right-side">
                <p>School<span>Management</span></p>
            </div>

        </nav>
        
        <section>
            <a style="padding-left: 40px; width: 100%; background-color: #fff; position: sticky; z-index: 1; top: 80px; margin-top: -40px; color: #16855a; font-size: 20px;" href="./student.php">Back</a>

            <header>
                <h2>Filtered Student</h2>
                <form action="./search.php" method="get">
                    <input type="text" name="query" required>
                    <input type="submit" value="search">
                </form>
            </header>

            <?php
            if($result->num_rows > 0){
                print("
                    <table>
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Full Name</td>
                                <td>Gender</td>
                                <td>Age</td>
                                <td>Year</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <body>
                    ");
                

                while($row = $result->fetch_assoc()){
                    print("
                        
                        <tr>
                        <td>{$row['stud_id']}</td>
                        <td>{$row['fullname']}</td>
                        <td>{$row['sex']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['year']}</td>
                        <td class='flex-vsion col-gap'>
                        <li><a class='col-green' href='./update.php/?id={$row['stud_id']}'>Update</a></li>
                        <li><a class='col-red' href='./delete.php/?id={$row['stud_id']}'>Delete</a></li>
                        </td>
                        </tr>
                        ");
                    }

                print("
                    </body>
                    </table>
                ");

            }else{
                print("<center><h1>There is No Student</h1></center>");
            }

            ?>

        </section>

    </div>
    
</body>
</html>