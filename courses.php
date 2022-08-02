<?php include 'handleauth.php'; ?>
<?php include 'adminonly.php'; ?>
<?php include 'layout/header.php'; ?>
<div class="login-screen">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Courses Listing</li>
        </ol>
    </nav>
    <?php
    include("connection.php");
    $judges = mysqli_query($mysqli, "SELECT * FROM courses order by id desc")
    or die("Could not execute the select query.");
    ?>
    <div id="formContent">
        <?php include("alerts.php"); ?>
        <a class="btn btn-success" href="course-add.php">Add Course</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Marked for Scoring?</th>
                    <th>Average Score</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while($row = mysqli_fetch_assoc($judges)) { ?>
                <tr>
                    <td><?=$row['course_name']?></td>
                    <td><?=$row['marked_for_scoring']==0?'No':'Yes'?></td>
                    <td>
                    <?php 
                    $avg_result = mysqli_query($mysqli, "SELECT IFNULL(AVG(course_scores.total),0) AS average_total FROM course_scores WHERE course_id = ".$row['id'])
                    or die("Could not execute the select query.");
                    $avg_result_row = mysqli_fetch_assoc($avg_result);
                    echo $avg_result_row['average_total'];
                    ?>
                    </td>
                    <td>
                        <?php if(intval($row['marked_for_scoring'])==0){ ?>
                        <a href="course-mark.php?id=<?=$row['id']?>" class="btn btn-info">Mark For Scoring</a>
                        <?php } ?>
                        <a href="course-delete.php?id=<?=$row['id']?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'layout/footer.php'; ?>