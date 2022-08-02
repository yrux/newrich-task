<?php 
include 'handleauth.php';
include 'adminonly.php';
include("connection.php");
if(!empty($_GET['id'])){
    $id = intval($_GET['id']);
    $sql = "Update `courses` set marked_for_scoring = 1 WHERE id=$id";
    if (mysqli_query($mysqli, $sql)) {
        $sql = "Update `courses` set marked_for_scoring = 0 WHERE id<>$id";
        if (mysqli_query($mysqli, $sql)) {}
        header("location: courses.php?success=coursemarked");
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}