<?php session_start(); 
if(!isset($_SESSION['valid'])) { ?>
    <script>window.location.href='index.php';</script>
<?php }
?>