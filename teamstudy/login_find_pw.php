<?php
    session_start();
    
        $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
    mysqli_query($con,'SET NAMES utf8');
	//세션 시작

    if($_POST["id"] == ""){
		echo '<script> alert("항목을 입력하세요"); history.back(); </script>';
	}else{

	$id = $_POST['id'];

    $query = mysqli_query($con, "select pw from member where id = '{$id}'");
    $result = mysqli_fetch_array($query);
    
    if ($result) {
        $pw = $result['pw'];
        echo "<script>alert('회원님의 ID는 ".$pw."입니다.'); history.back();</script>";
    } else {
        echo "<script>alert('없는 계정입니다.'); history.back();</script>";
    }
}
?>