<?php session_start(); ?>
<?php include 'layout/header.php'; ?>
<?php 
include 'Helpers/Form.php';
$formGenerator = new Form();
?>
<div class="login-screen">
        <div id="formContent">
    <h1>Welcome</h1>
    <?php
    if(isset($_SESSION['valid'])) { ?>
        Welcome <?php echo $_SESSION['details']['name'] ?> ! <a href='logout.php'>Logout</a><br/>
        <br/>
        <?php 
        $formGenerator->printForm(file_get_contents('test.json'));
        ?>
    <?php
    } else {
        echo "You must be logged in to view this page.<br/><br/>";
        echo "<a href='login.php'>Login</a>";
    }
    ?>
    </div>
      </div>
<script>
function handleForm(e){
    e.preventDefault();
    var form = $('form').eq(0);
    
    $.ajax({
        type: "POST",
        url: '/handleForm.php',
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
          alert(data); // show response from the php script.
        //   location.reload();
        }
    });
}
document.querySelector('form').addEventListener("submit", handleForm);
</script>
<?php include 'layout/footer.php'; ?>