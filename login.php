<?php session_start(); ?>
<?php include 'layout/header.php'; ?>
    <?php
    if(isset($_SESSION['valid'])) { ?>
        <script>window.location.href='index.php';</script>
    <?php 
    } else { ?>
      <?php
include("connection.php");
if(isset($_POST['submit'])) {
  ?>
  <div class="login-screen">
        <div id="formContent">
          <?php 
    $user = mysqli_real_escape_string($mysqli, $_POST['username']);
    $pass = mysqli_real_escape_string($mysqli, $_POST['password']);

    if($user == "" || $pass == "") {
        echo "Either username or password field is empty.";
        echo "<br/>";
        echo "<a href='login.php'>Go back</a>";
    } else {
        $result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
        or die("Could not execute the select query.");
    
        $row = mysqli_fetch_assoc($result);
    
        if(is_array($row) && !empty($row)) {
            $validuser = $row['username'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['details'] = $row;
        } else {
            echo "Invalid username or password.";
            echo "<br/>";
            echo "<a href='login.php'>Go back</a>";
        }

        if(isset($_SESSION['valid'])) { ?>
            <script>window.location.href='index.php';</script>
        <?php }
    }
    ?>
        </div>
      </div>
      <?php
} else {?>  
      <div class="login-screen">
        <div id="formContent">
          <!-- Login Form -->
          <h1>Welcome to Portal</h1>
          <form method="POST" action="">
            <input type="text" id="login" class="fadeIn second" name="username" placeholder="UserName">
            <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
            <input type="submit" name="submit" class="fadeIn fourth" value="Log In">
          </form>
        </div>
      </div>
    <?php } }
    ?>
<?php include 'layout/footer.php'; ?>