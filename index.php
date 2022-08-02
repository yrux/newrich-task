<?php session_start(); ?>
<?php include 'layout/header.php'; ?>
<div class="login-screen">
        <div id="formContent">
    <h1>Welcome</h1>
    <?php
    if(isset($_SESSION['valid'])) { ?>
        Welcome <?php echo $_SESSION['details']['name'] ?> ! <a href='logout.php'>Logout</a><br/>
        <br/>
        <?php if(intval($_SESSION['details']['user_type'])==0){ ?>
        <a href='judges.php'>Judges</a></br>
        <a href='courses.php'>Courses</a>
        <?php } else{
        include("connection.php");
        $result = mysqli_query($mysqli, "SELECT * FROM courses WHERE marked_for_scoring = 1 order by id desc")
        or die("Could not execute the select query.");
        $row = mysqli_fetch_assoc($result);
        if(is_array($row) && !empty($row)) { ?>
        <a href='givescore.php'>Give Score</a>
        <?php }else{
            echo 'No Score is marked for results yet,';
        }    
        ?>
        <?php } ?>
        <br/><br/>
    <?php
    } else {
        echo "You must be logged in to view this page.<br/><br/>";
        echo "<a href='login.php'>Login</a>";
    }
    ?>
    </div>
      </div>
<?php include 'layout/footer.php'; ?>