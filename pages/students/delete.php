<?php

require "../../config/config.php";

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql = "DELETE FROM students WHERE stud_id='$id'";
    if ($conn->query($sql)){
        header("Location: ../student.php");
    }else{
        header("Location: ../student.php");
    }
}else{
    header("Location: ../student.php");
}

$conn->close();

?>