<?php include 'handleauth.php';
include 'adminonly.php';
?>
<?php include 'layout/header.php'; ?>
<div class="login-screen">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="judges.php">Judges</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
    </nav>
    <?php
    if(isset($_POST['submit'])){
        if(!empty($_POST['name'])&&!empty($_POST['email'])&&!empty($_POST['username'])&&!empty($_POST['password'])){
            include("connection.php");
            $name = $_POST['name'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql = "INSERT INTO `login`( `name`, `email`,`username`,`password`,`user_type`) 
            VALUES ('$name','$email','$username',md5('$password'),1)";
            if (mysqli_query($mysqli, $sql)) { ?>
                <script>window.location.href='judges.php?success=judgeadd';</script>
            <?php } 
            else {
                echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
            }
            mysqli_close($mysqli);
        }else{
            echo "Fields are empty";
            echo "<br/>";
            echo "<a href='judge-add.php'>Go back</a>";
        }
    }else {
    ?>
    <div id="formContent">
        <form method="POST">
            <input type="text" class="form-control" name="name" placeholder="Name" />
            <input type="text" class="form-control" name="email" placeholder="Email" />
            <input type="text" class="form-control" name="username" placeholder="UserName" />
            <input type="password" class="form-control" name="password" placeholder="Password" />
            <input  type="submit" value="Save" name="submit" />
        </form>
    </div>
    <?php } ?>
</div>
<?php include 'layout/footer.php'; ?>