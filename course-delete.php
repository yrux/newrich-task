<?php 
include 'handleauth.php';
include 'adminonly.php';
include("connection.php");
if(!empty($_GET['id'])){
    $id = intval($_GET['id']);
    $sql = "DELETE FROM `courses` WHERE id=$id ";
    if (mysqli_query($mysqli, $sql)) {
        header("location: courses.php?success=coursedelete");
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}