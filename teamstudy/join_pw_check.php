<?php
    $con = mysqli_connect("localhost", "dbfld123", "dbfld387077!", "dbfld123");
mysqli_query($con, 'SET NAMES utf8');

// 세션 시작
session_start();

// 데이터 ajax리턴할 변수
$num = 0;
$num1 = 1; //자릿수
$num2 = 2; //공백
$num3 = 3; //혼합

$id = $_POST['userid'];
$pw = $_POST['pw'];

$usenum = preg_match('/[0-9]/u', $pw);
$eng = preg_match('/[a-zA-Z]/u', $pw);
$spe = preg_match("/[@$!%*#?&]/u", $pw);

if ($con) {
    $id_check = mysqli_query($con, "SELECT * FROM member WHERE id='$id'");
    $row_count = mysqli_num_rows($id_check);

    if (strlen($pw) < 8 || strlen($pw) > 14) {
        echo $num1; // 비밀번호는 영문, 숫자, 특수문자를 혼합하여 최소 8자리 ~ 최대 14자리 이내로 입력해주세요.
        return;
    } elseif (preg_match("/\s/u", $pw) == true) {
        echo $num2; // 비밀번호는 공백 없이 입력해주세요.
        return;
    } elseif ($usenum == 0 || $eng == 0 || $spe == 0) {
        echo $num3; // 영문, 숫자, 특수문자를 혼합하여 입력해주세요.
        return;
    } else {
        echo $num; // 유효한 비밀번호
    }
} else {
    echo $num1; // 데이터베이스 연결 오류
    return;
}

?>