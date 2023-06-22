<?php
    session_start();
        $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
    mysqli_query($con,'SET NAMES utf8');
    $id = $_SESSION['user_id'];

    $pw = $_POST['pw'];
    $name = $_POST['name'];
    $hp = $_POST['hp'];
    $email_id = $_POST['email_id'];
	$email_domain = $_POST['email_domain'];

	$email = $email_id . "@" . $email_domain;

    $sql = "UPDATE member SET pw='$pw', name='$name', hp='$hp', email='$email' WHERE id='$id'";
    $res = mysqli_query($con, $sql);

    if($res){
        echo "<script>alert('수정완료!');";
        echo "window.location.href='member_edit_ok.php';</script>";
    }
?>
<meta http-equiv="refresh" content="3;url=mypage.php">