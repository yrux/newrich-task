<?php include 'handleauth.php'; ?>
<?php include 'adminonly.php'; ?>
<?php include 'layout/header.php'; ?>
<div class="login-screen">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Judges Listing</li>
        </ol>
    </nav>
    <?php
    include("connection.php");
    $judges = mysqli_query($mysqli, "SELECT * FROM login WHERE user_type=1  order by id desc")
    or die("Could not execute the select query.");
    ?>
    <div id="formContent">
        <?php include("alerts.php"); ?>
        <a class="btn btn-success" href="judge-add.php">Add Judge</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>UserName</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while($row = mysqli_fetch_assoc($judges)) { ?>
                <tr>
                    <td><?=$row['name']?></td>
                    <td><?=$row['email']?></td>
                    <td><?=$row['username']?></td>
                    <td>
                        <!--<a href="judge-edit.php?id=<?=$row['id']?>" class="btn btn-info">Edit</a>-->
                        <a href="judge-delete.php?id=<?=$row['id']?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'layout/footer.php'; ?>