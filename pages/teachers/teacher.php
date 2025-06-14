<?php

require "../../config/config.php";

$sql = "SELECT * FROM teachers";
$result = $conn->query($sql);

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
    <title>Teacher</title>
</head>
<body>

    <div class="container">

        <nav class="navbar">

            <div class="left-side">
                <ul>
                    <li><a href="./teacher.php">Teachers</a></li>
                    <li><a href="../students/student.php">Students</a></li>
                    <li><a href="">Course</a></li>
                    <li><a href="">Rooms</a></li>
                </ul>
            </div>
            
            <div class="right-side">
                <p>School<span>Management</span></p>
            </div>

        </nav>
        
        <section>
            <a style="padding-left: 40px; width: 100%; background-color: #fff; position: sticky; z-index: 1; top: 80px; margin-top: -40px; color: #16855a; font-size: 20px;" href="./add.php">Add New Teacher</a>

            <header>
                <h2>Teacher List</h2>
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
                                <td>Department</td>
                                <td>Age</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <body>
                    ");
                

                while($row = $result->fetch_assoc()){
                    print("
                        
                        <tr>
                        <td>{$row['tech_id']}</td>
                        <td>{$row['fullname']}</td>
                        <td>{$row['sex']}</td>
                        <td>{$row['department']}</td>
                        <td>{$row['age']}</td>
                        <td class='flex-vsion col-gap'>
                        <li><a class='col-green' href='./update.php/?id={$row['tech_id']}'>Update</a></li>
                        <li><a class='col-red' href='./delete.php/?id={$row['tech_id']}'>Delete</a></li>
                        </td>
                        </tr>
                        ");
                    }

                print("
                    </body>
                    </table>
                ");

            }else{
                print("<center><h1>There is No Teacher</h1></center>");
            }

            ?>

        </section>

    </div>
    
</body>
</html>