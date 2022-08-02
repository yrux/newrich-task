<?php include 'handleauth.php';
include 'adminonly.php';
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
?>
<?php include 'layout/header.php'; ?>
<div class="login-screen">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="courses.php">Courses</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
    </nav>
    <?php
    if(isset($_POST['submit'])){
        if(!empty($_POST['course_name'])){
            include("connection.php");
            $course_name = $_POST['course_name'];
            $sql = "INSERT INTO `courses`( `course_name`) 
            VALUES ('$course_name')";
            if (mysqli_query($mysqli, $sql)) {
            ?>
                <script>window.location.href='courses.php?success=courseadd';</script>
            <?php } 
            else {
                echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
            }
            mysqli_close($mysqli);
        }else{
            echo "Fields are empty";
            echo "<br/>";
            echo "<a href='course-add.php'>Go back</a>";
        }
    }else {
    ?>
    <div id="formContent">
        <form method="POST">
            <input type="text" class="form-control" name="course_name" placeholder="Name" />
            <input  type="submit" value="Save" name="submit" />
        </form>
    </div>
    <?php } ?>
</div>
<?php include 'layout/footer.php'; ?>