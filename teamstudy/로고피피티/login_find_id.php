<?php
    session_start();
    
    $con = mysqli_connect("localhost", "root", "qwer", "pickup");
    mysqli_query($con,'SET NAMES utf8');
	//세션 시작

    if($_POST["name"] == "" || $_POST["hp"] == ""){
		echo '<script> alert("항목을 입력하세요"); history.back(); </script>';
	}else{

	$name = $_POST['name'];
	$hp = $_POST['hp'];
   // var_dump($name, $hp); 로그값 확인하기
    

    $query = mysqli_query($con, "select id from member where name = '{$name}' and hp = '{$hp}'");
    $result = mysqli_fetch_array($query);

    if ($result) {
        $id = $result['id'];
        echo "<script>alert('회원님의 ID는 " . $id . "입니다.'); history.back();</script>";
    } else {
        echo "<script>alert('없는 계정입니다.'); history.back();</script>";
    }
}
?>