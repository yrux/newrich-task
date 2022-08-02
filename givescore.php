<?php include 'handleauth.php';
include("connection.php");
?>
<?php include 'layout/header.php'; ?>
<div class="login-screen">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Give Score</li>
        </ol>
    </nav>
    <?php
    if(isset($_POST['submit'])){
        if(!empty($_POST['group_members'])&&!empty($_POST['project_title'])&&!empty($_POST['group_number'])&&!empty($_POST['comments'])){
            $group_members = $_POST['group_members'];
            $project_title = $_POST['project_title'];
            $group_number = $_POST['group_number'];
            $comments = $_POST['comments'];
            $course_id = $_POST['course_id'];
            $judge_id = $_SESSION['details']['id'];
            $inp1 = intval($_POST['inp1']);
            $inp2 = intval($_POST['inp2']);
            $inp3 = intval($_POST['inp3']);
            $inp4 = intval($_POST['inp4']);
            $inp5 = intval($_POST['inp5']);
            $inp6 = intval($_POST['inp6']);
            $inp7 = intval($_POST['inp7']);
            $inp8 = intval($_POST['inp8']);
            $total = floatval($_POST['total']);
            $sql = "INSERT INTO `course_scores`( `group_members`, `project_title`,`group_number`,`comment`,`course_id`,`judge_id`,`inp1`,`inp2`,`inp3`,`inp4`,`inp5`,`inp6`,`inp7`,`inp8`,`total`) 
            VALUES ('$group_members','$project_title','$group_number','$comments',$course_id,$judge_id,$inp1,$inp2,$inp3,$inp4,$inp5,$inp6,$inp7,$inp8,$total)";
            if (mysqli_query($mysqli, $sql)) { ?>
                <script>window.location.href='givescore.php?success=scoregiven';</script>
            <?php } 
            else {
                echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
            }
            mysqli_close($mysqli);
        }else{
            echo "Fields are empty";
            echo "<br/>";
            echo "<a href='givescore.php'>Go back</a>";
        }
    }else {
    ?>
    <div id="formContent">
        <?php include("alerts.php"); ?>
        <form method="POST">
            <?php
            $result = mysqli_query($mysqli, "SELECT * FROM courses WHERE marked_for_scoring = 1 order by id desc")
            or die("Could not execute the courses query.");
            $row = mysqli_fetch_assoc($result);
            if(is_array($row) && !empty($row)) { ?>
            <?php 
            $checkIfAlreadySubmit = mysqli_query($mysqli, "SELECT * FROM course_scores WHERE course_id = ".$row['id']." AND judge_id=".$_SESSION['details']['id'])
            or die("Could not execute the course_scores query.");
            $checkIfAlreadySubmitRow = mysqli_fetch_assoc($checkIfAlreadySubmit);
            if(!is_array($checkIfAlreadySubmitRow) && empty($checkIfAlreadySubmitRow)) {
            ?>
            <h4><?=$row['course_name']?></h4>
            <input type="hidden" value="<?=$row['id']?>" required name="course_id" />
            <input type="hidden" value="0" required name="total" id="total_score" />
            <input type="text" required name="group_members" class="form-control" placeholder="Group Members" />
            <input type="text" required name="project_title" class="form-control" placeholder="Project Title" />
            <input type="text" required name="group_number" class="form-control" placeholder="Group Number" />
            <table class="table">
                <thead>
                    <tr>
                        <th>Criteria</th>
                        <th>Developing(0-10)</th>
                        <th>Accomplished(10-15)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b>Articulate Requirements</b></td>
                        <td><input name="inp1" onkeyup="resetNext(this)" value="0" type="number"  /></td>
                        <td><input name="inp2" onkeyup="resetPrev(this)" value="0" type="number"  /></td>
                    </tr>
                    <tr>
                        <td><b>Choose appropriate tools and methods for reach task</b></td>
                        <td><input name="inp3" onkeyup="resetNext(this)" value="0" type="number"  /></td>
                        <td><input name="inp4" onkeyup="resetPrev(this)" value="0" type="number"  /></td>
                    </tr>
                    <tr>
                        <td><b>Give clear and coherent oral presentation</b></td>
                        <td><input name="inp5" onkeyup="resetNext(this)" value="0" type="number"  /></td>
                        <td><input name="inp6" onkeyup="resetPrev(this)" value="0" type="number"  /></td>
                    </tr>
                    <tr>
                        <td><b>Functioned well as a team</b></td>
                        <td><input name="inp7" onkeyup="resetNext(this)" value="0" type="number"  /></td>
                        <td><input name="inp8" onkeyup="resetPrev(this)" value="0" type="number"  /></td>
                    </tr>
                    <tr>
                        <td><b>Total</b></td>
                        <td colspan="2" id="total-div"></td>
                    </tr>
                    <tr>
                        <td><b>Judge Name</b></td>
                        <td colspan="2"><?=$_SESSION['details']['name']?></td>
                    </tr>
                    <tr>
                        <td><b>Comments</b></td>
                        <td colspan="2"><textarea required class="form-control" rows="4" cols="4" name="comments"></textarea></td>
                    </tr>
                </tbody>
            </table>
            <input  type="submit" value="Save" name="submit" />
            <?php }else{
                echo 'You have already submitted the scores';
            }
            } else{
                echo 'No Course is marked for scoring yet,';
            } ?>
        </form>
    </div>
    <?php } ?>
</div>
<script>
function resetNext(obj){
    var val = parseInt($(obj).val())
    console.log((val>=0&&val<=10))
    if(val>=0&&val<=10){
        $(obj).parent().next().children().eq(0).val(0)
    }else{
        $(obj).val(0)
    }
}
function resetPrev(obj){
    var val = parseInt($(obj).val())
    if(val>=10&&val<=15){
        $(obj).parent().prev().children().eq(0).val(0)
    }else{
        $(obj).val(0)
    }
}
function calculateTotal(){
    var total = 0
    for(let i = 0; i < 8;i++){
        let val = parseInt($('[name="inp'+(i+1)+'"]').val());
        if(val>=0){
            total += val
        }
    }
    $('#total_score').val(total)
    $('#total-div').html(total)
}
setInterval(calculateTotal,1000)
</script>
<?php include 'layout/footer.php'; ?>