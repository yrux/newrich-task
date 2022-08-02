<?php 
$isSuccess= false;
$isError = false;
$msg = '';
if(!empty($_GET['success'])){
    $isSuccess = true;
    switch ($_GET['success']) {
    case "judgeadd":
        $msg = "Judge Created Successfully";
        break;
    case "courseadd":
        $msg = "Course Created Successfully";
        break;
    case "coursedelete":
        $msg = "Course Deleted Successfully";
        break;
    case "coursemarked":
        $msg = "Course Marked Successfully, <b>Now When judges will login they will provide score against marked course</b>";
        break;
    case "scoregiven":
        $msg = "Score Updated, Request sent to admin";
        break;
    case "judgedelete":
        $msg = "Judge Deleted Successfully";
        break;
    default:
        $isSuccess=false;
    }
}
if(!empty($_GET['error'])){
    $isError = true;
}
if($isSuccess===true&&$msg!=''){
    ?>
<div class="alert alert-success" role="alert">
    <?=$msg?>
</div>
<?php } ?>
