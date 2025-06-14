<?php

require "../../config/config.php";

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql = "DELETE FROM teachers WHERE tech_id='$id'";
    if ($conn->query($sql)){
        header("Location: ../teacher.php");
    }else{
        header("Location: ../teacher.php");
    }
}else{
    header("Location: ../teacher.php");
}

$conn->close();

?>